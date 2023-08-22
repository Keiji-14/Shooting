using System;
using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.AddressableAssets;

public class PlayerController : MonoBehaviour
{
    //player移動範囲定数
    const float MAX_Y = 6.35f;
    const float MAX_X = 2.85f;
    const float MIN_Y = -4.35f;
    const float MIN_X = -2.85f;

    const float CHARGE_UP = 1.0f;

    [SerializeField] Image playerImage;
    [SerializeField] GameObject bulletPrefab;
    [SerializeField] GameObject homingBulletPrefab;
    [SerializeField] GameObject xBulletPrefab;
    [SerializeField] GameObject[] chargeBulletPrefabs;
    [SerializeField] GameObject subBulletPrefab;
    [SerializeField] GameObject gameoverPanel;
    [SerializeField] Slider HPslider;
    [SerializeField] Image weaponImage;
    [SerializeField] Sprite[] weaponSprite;

    public enum shootType
    {
        Default,
        Homing,
        BackShoot,
        Xshoot,
        ChargeShoot//,
        //Length
    }
    public shootType playerShootType;

    GameManager gameManager;
    Vector3 startPos;
    Vector2 direction;
    int damagedFlushCount = 3;
    Color originalColor;
    bool isDragging;
    float timeSinceLastShot = 0.0f;
    public float speed = 5.0f;
    public float maxSpeed = 5.0f;
    public float attack_speed;
    public float attack;
    bool powerUP = false;
    bool isDamage = false;
    float chargeTime = 0;
    int chargeCount = 0;

    float HP = 3;
    float MaxHp;
    void Start()
    {
        gameManager = GameObject.Find("GameManager").GetComponent<GameManager>();
        attack_speed = gameManager.playerAttackSpeed;
        attack = gameManager.playerAttack;
        HPslider.value = HP;
        MaxHp = HP;
        Addressables.LoadAssetAsync<Sprite>(gameManager.imageAddress).Completed += handle =>
        {
            playerImage.sprite = handle.Result;
        };
        originalColor = playerImage.color;
    }
    void Update()
    {
        if (Input.GetMouseButtonDown(0))
        {
            startPos = Input.mousePosition;
            startPos.z = 1.0f;
            isDragging = true;
        }

        if (Input.GetMouseButtonUp(0))
        {
            if (playerShootType == shootType.ChargeShoot)
            {
                GameObject chargeBullet = Instantiate(chargeBulletPrefabs[chargeCount],
                    transform.position + transform.up, transform.rotation);
                chargeBullet.GetComponent<ChargeBullet>().chargeCount = chargeCount;
                chargeBullet.GetComponent<Rigidbody>().velocity = transform.up * 10;
            }
            isDragging = false;
            chargeCount = 0;
            chargeTime = 0;
        }

        if (isDragging)
        {
            direction = (Input.mousePosition - startPos).normalized;
            Vector3 currentPos = Input.mousePosition;
            currentPos.z = 1.0f;

            Vector3 velocity = new Vector3(direction.x, direction.y, 0) * speed * Time.deltaTime;
            float magnitude = velocity.magnitude;
            if (magnitude > maxSpeed)
            {
                velocity = velocity.normalized * maxSpeed;
            }

            Vector3 newPos = transform.position + velocity;
            newPos.x = Mathf.Clamp(newPos.x, MIN_X, MAX_X);
            newPos.y = Mathf.Clamp(newPos.y, MIN_Y, MAX_Y);
            transform.position = newPos;

            timeSinceLastShot += Time.deltaTime;
            if (timeSinceLastShot >= 1.0f / attack_speed)
            {
                timeSinceLastShot = 0.0f;
                if (playerShootType == shootType.Default)
                {
                    GameObject newBullet = Instantiate(bulletPrefab, transform.position + transform.up, transform.rotation);
                    newBullet.GetComponent<Rigidbody>().velocity = transform.up * 10;
                }
                else if (playerShootType == shootType.Homing)
                {
                    GameObject newBullet = Instantiate(homingBulletPrefab, transform.position + transform.up, transform.rotation);
                    GameObject[] enemies = GameObject.FindGameObjectsWithTag(TypeDefine.ENEMY);
                    GameObject closestEnemy = null;
                    float closestDistance = Mathf.Infinity;
                    foreach (GameObject enemy in enemies)
                    {
                        float distance = Vector3.Distance(transform.position, enemy.transform.position);
                        if (distance < closestDistance)
                        {
                            closestEnemy = enemy;
                            closestDistance = distance;
                        }
                    }
                    if (closestEnemy != null)
                    {
                        Homing homing = newBullet.GetComponent<Homing>();
                        homing.Target = closestEnemy.transform;
                        homing.speed = 10f;
                    }
                }
                else if (playerShootType == shootType.BackShoot)
                {
                    GameObject rightBullet = Instantiate(bulletPrefab, transform.position - transform.up
                        - transform.right, transform.rotation);
                    rightBullet.GetComponent<Rigidbody>().velocity = (-transform.up - transform.right).normalized * 10;

                    GameObject leftBullet = Instantiate(bulletPrefab, transform.position - transform.up
                        + transform.right, transform.rotation);
                    leftBullet.GetComponent<Rigidbody>().velocity = (-transform.up + transform.right).normalized * 10;

                    GameObject backBullet = Instantiate(bulletPrefab, transform.position - transform.up, transform.rotation);
                    backBullet.GetComponent<Rigidbody>().velocity = (-transform.up).normalized * 10;
                }
                else if (playerShootType == shootType.Xshoot)
                {
                    float bulletSpeed = 10f;
                    GameObject bullet1 = Instantiate(xBulletPrefab, transform.position + transform.up, transform.rotation);
                    bullet1.GetComponent<Rigidbody>().velocity = (transform.up + transform.right).normalized * bulletSpeed;

                    GameObject bullet2 = Instantiate(xBulletPrefab, transform.position + transform.up, transform.rotation);
                    bullet2.GetComponent<Rigidbody>().velocity = (transform.up - transform.right).normalized * bulletSpeed;

                    GameObject bullet3 = Instantiate(xBulletPrefab, transform.position + transform.up, transform.rotation);
                    bullet3.GetComponent<Rigidbody>().velocity = (-transform.up - transform.right).normalized * bulletSpeed;

                    GameObject bullet4 = Instantiate(xBulletPrefab, transform.position + transform.up, transform.rotation);
                    bullet4.GetComponent<Rigidbody>().velocity = (-transform.up + transform.right).normalized * bulletSpeed;
                }
                else if (playerShootType == shootType.ChargeShoot)
                {
                    GameObject subBullet = Instantiate(subBulletPrefab, transform.position + transform.up, transform.rotation);
                    subBullet.GetComponent<Rigidbody>().velocity = transform.up * 10;
                }
            }

            if (playerShootType == shootType.ChargeShoot)
            {
                chargeTime += Time.deltaTime;
                int chargeLength = chargeBulletPrefabs.Length - 1;
                //Debug.Log(chargeLength);
                if (chargeCount < chargeLength && chargeTime >= CHARGE_UP)
                {
                    chargeCount++;
                    chargeTime = 0;
                }
            }
        }
        // 武器切り替え
        if (Input.GetKeyDown(KeyCode.Space))
        {
            shootType[] values = (shootType[])Enum.GetValues(typeof(shootType));
            int currentIndex = Array.IndexOf(values, playerShootType);
            int nextIndex = (currentIndex + 1) % values.Length;
            playerShootType = values[nextIndex];
        }

        if (powerUP)
        {
            float timeLimit = 5.0f;
            timeLimit -= Time.deltaTime;
            if (timeLimit <= 0)
            {
                powerUP = false;
                attack = gameManager.playerAttack;
            }
        }
    }

    public void WeaponChange()//武器種切り替えボタンにアタッチ
    {
        shootType[] values = (shootType[])Enum.GetValues(typeof(shootType));
        int currentIndex = Array.IndexOf(values, playerShootType);
        int nextIndex = (currentIndex + 1) % values.Length;
        playerShootType = values[nextIndex];
        
        switch (playerShootType)
        {
            case shootType.Default:
                weaponImage.sprite = weaponSprite[0];
                break;
            case shootType.Homing:
                weaponImage.sprite = weaponSprite[1];
                break;
            case shootType.BackShoot:
                weaponImage.sprite = weaponSprite[2];
                break;
            case shootType.Xshoot:
                weaponImage.sprite = weaponSprite[3];
                break;
            case shootType.ChargeShoot:
                weaponImage.sprite = weaponSprite[4];
                break;
        }
    }

    public void OnCollisionEnter(Collision collision)
    {
        if (collision.gameObject.tag == TypeDefine.POWER_UP)
        {
            powerUP = true;
            Destroy(collision.gameObject);
            attack *= 2.0f;
        }
    }
    public void OnTriggerEnter(Collider other)
    {
        if (other.gameObject.layer == LayerMask.NameToLayer(LayerDefine.ENEMY_BULLET) && !isDamage)
        {
            StartCoroutine(LayerChange());
        }
        else if (other.gameObject.layer == LayerMask.NameToLayer(LayerDefine.ENEMY) && !isDamage)
        {
            StartCoroutine(LayerChange());
        }
        else if (other.gameObject.layer == LayerMask.NameToLayer(LayerDefine.DONT_BREAK) && !isDamage)
        {
            StartCoroutine(LayerChange());
        }
        HPslider.value = HP / MaxHp;
        if (HP <= 0)
        {
            var resetStage = "StageData/stageData1.asset";

            gameoverPanel.SetActive(true);
            gameManager.Score = 0;
            gameManager.Score2 = 0;
            gameManager.Score3 = 0;
            gameManager.stageLevel = 1;
            gameManager.stageAddress = resetStage;
            gameManager.sendScore = 0;
            Destroy(gameObject);
        }
    }
    IEnumerator LayerChange()
    {
        isDamage = true;
        gameObject.layer = LayerMask.NameToLayer(LayerDefine.DAMAGED_PLAYER);
        HP--;
        Debug.Log("HP" + HP);
        for (int i = 0; i < damagedFlushCount; i++)
        {
            playerImage.color = new Color(originalColor.r, 0, 0, originalColor.a);
            yield return new WaitForSeconds(0.25f);
            playerImage.color = originalColor;
            yield return new WaitForSeconds(0.25f);
        }
        gameObject.layer = LayerMask.NameToLayer(LayerDefine.PLAYER);
        isDamage = false;
    }
}