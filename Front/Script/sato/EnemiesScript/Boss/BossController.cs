using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class BossController : MonoBehaviour
{
    const float BOSS_START_POS_Y=5f;
    [SerializeField] GameObject NormalShotPrefab;
    [SerializeField] GameObject RandomShotSpawner;
    [SerializeField] GameObject RollShotSpawner;
    [SerializeField] GameObject BombShotPrefab;
    [SerializeField] GameObject LaserShotSpawner;
    [SerializeField] GameObject SideShotPrefab;
    [System.NonSerialized] public bool isBattle = false;
    [System.NonSerialized] public bool isFinish = false;
    [System.NonSerialized] public float BossHP;
    [System.NonSerialized] public float score;
    public enum AttackPatarn
    {
        Standard=0,
        RandumShot=1,
        SideShot=2,
        RollShot=3,
        BombShot=4,
        LaserShot=5
    }
    public AttackPatarn attackPatarn;
    GameManager gameManager;
    PlayerController playerController;
    GameController gameController;
    //BossShot関連変数
    float activeTime = 0;
    public Vector3[] sideshotPos;
    public Quaternion[] sideshotRotates;
    int bossShotCase;
    void Start()
    {
        playerController = GameObject.Find(LayerDefine.PLAYER).GetComponent<PlayerController>();
        gameManager = GameObject.Find("GameManager").GetComponent<GameManager>();
        gameController = GameObject.Find("GameController").GetComponent<GameController>();
    }

    void Update()
    {
        if (!isBattle && !isFinish)//ボス規定位置まで移動処理
        {
            if (transform.position.y > BOSS_START_POS_Y)
            {
                transform.position -= new Vector3(0f, Time.deltaTime, 0f);
            }
            else if (transform.position.y <= BOSS_START_POS_Y)
            {
                gameObject.layer = LayerMask.NameToLayer(LayerDefine.BATTLE_BOSS);
                isBattle = true;
            }
        }

        if (isBattle&&!isFinish)
        {
            activeTime += Time.deltaTime;
            if (activeTime >= 5.0f)
            {
                activeTime = 0;
                switch (gameManager.stageLevel)
                {
                    case 1:bossShotCase = 4;
                        break;
                    case 2:bossShotCase = 5;
                        break;
                    case 3: bossShotCase = 6;
                        break;
                }
                attackPatarn = (AttackPatarn)Random.Range(0, bossShotCase);
                if (attackPatarn == AttackPatarn.Standard)
                {
                    gameObject.GetComponent<Renderer>().material.color = Color.white;
                    Instantiate(NormalShotPrefab, transform.position, Quaternion.identity);
                }
                else if (attackPatarn == AttackPatarn.RandumShot)
                {
                    gameObject.GetComponent<Renderer>().material.color = Color.red;
                    Vector3 randomPosition = new Vector3(Random.Range(-3f, 3f), Random.Range(-3f, 6f), 0);
                    Instantiate(RandomShotSpawner, randomPosition, Quaternion.identity);
                }
                else if (attackPatarn == AttackPatarn.SideShot)
                {
                    gameObject.GetComponent<Renderer>().material.color = Color.blue;
                    for (int i = 0; i < sideshotPos.Length; i++)
                    {
                        Instantiate(SideShotPrefab, sideshotPos[i], sideshotRotates[i]);
                    }
                }
                else if (attackPatarn == AttackPatarn.RollShot)
                {
                    gameObject.GetComponent<Renderer>().material.color = Color.yellow;
                    Instantiate(RollShotSpawner, transform.position, Quaternion.identity);
                }
                else if (attackPatarn == AttackPatarn.BombShot)
                {
                    gameObject.GetComponent<Renderer>().material.color = Color.green;
                    Instantiate(BombShotPrefab, transform.position, Quaternion.identity);
                }
                else if (attackPatarn == AttackPatarn.LaserShot)
                {
                    gameObject.GetComponent<Renderer>().material.color = Color.black;
                    Instantiate(LaserShotSpawner, transform.position, Quaternion.identity);
                }
            }
        }
        if (BossHP <= 0)//HP0時処理
        {
            isFinish = true;
            switch (gameManager.stageLevel)
            {
                case 1:
                    gameManager.Score += score;
                    gameManager.sendScore = gameManager.Score;
                    gameController.getCoin = 10;
                    break;
                case 2:
                    gameManager.Score2 += score;
                    gameManager.sendScore = gameManager.Score2;
                    gameController.getCoin = 20;
                    break;
                case 3:
                    gameManager.Score3 += score;
                    gameManager.sendScore = gameManager.Score3;
                    gameController.getCoin = 30;
                    break;
            }
            gameController.PlayLogSet();
            Destroy(gameObject);
        }
    }
}
