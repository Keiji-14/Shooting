using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class LaserShot : MonoBehaviour
{
    [SerializeField] GameObject BulletPrefab;
    public float minRotationZ = 210f;
    public float maxRotationZ = 330f;
    float laserShotSpeed = 10.0f;
    float waitTime = 2.0f;
    float rotateTime = 2.0f;
    float bulletSpan = 0.05f;
    int finishCount = 0;
    void Start()
    {
        RandomizeRotation();// 最初の回転角度を設定する
    }
    void Update()
    {
        if (finishCount >= 5)
        {
            Destroy(gameObject);
            Debug.Log("消えた");
        }

        float timeRemaining = Mathf.Repeat(Time.time, rotateTime);// 残り時間を計算する
        // 残り時間が2秒未満の場合は、回転角度を変えない
        if (timeRemaining >= waitTime - Time.deltaTime)
        {
            RandomizeRotation();
        }
    }
    // ランダムな回転角度を設定する
    void RandomizeRotation()
    {
        float randomRotationZ = Random.Range(minRotationZ, maxRotationZ);
        transform.rotation = Quaternion.Euler(0f, 0f, randomRotationZ);
        StartCoroutine(ShotBullets());
    }
    public void ShootBullet()
    {
        GameObject bullet = Instantiate(BulletPrefab, transform.position, Quaternion.identity);
        bullet.GetComponent<Rigidbody>().velocity = transform.right * laserShotSpeed;
    }
    IEnumerator ShotBullets()
    {
        for (int i = 0; i < 20; i++)
        {
            ShootBullet();
            yield return new WaitForSeconds(bulletSpan);
        }
        finishCount++;
        Debug.Log(finishCount);
    }
}