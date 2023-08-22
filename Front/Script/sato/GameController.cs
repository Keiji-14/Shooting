using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.AddressableAssets;
using UnityEngine.UI;
using UnityEngine.Networking;
using UnityEngine.SceneManagement;

public class GameController : MonoBehaviour
{
    const float WAVE_TIME = 20.0f;
    const string STAGE_DATA_URL = "http://localhost:8080/scrollshooting/stages/next-stage/";
    const string PLAYLOG_URL = "http://localhost:8080/scrollshooting/play-logs/create-play-log/";
    [SerializeField] GameObject EnemyPrefab;
    [SerializeField] GameObject fallEnemyPrefab;
    [SerializeField] GameObject shootEnemyPrefab;
    [SerializeField] GameObject rocketEnemyPrefab;
    [SerializeField] GameObject BossPrefab;
    [SerializeField] GameObject DontBreakPrefab;
    [SerializeField] GameObject PowerUpPrefab;
    [SerializeField] Text bossSpawnText;
    [SerializeField] GameObject resultPanel;
    [SerializeField] Text stage1text;
    [SerializeField] Text stage2text;
    [SerializeField] Text stage3text;
    [SerializeField] Text totaltext;
    [SerializeField] Text clearText;

    [SerializeField] ScenesManager scenesManager;

    GameManager gameManager;
    int waveCount = 0;
    private float timeSinceLastWave = 0;
    private bool allWavesCompleted = false;//全Wave完了フラグ
    int numNewDatas;//Wave数(-1)
    float autoSpawnCount;
    float currentCount = 0;
    Vector3 bossStartPos = new Vector3(0, 8, 0);
    public float getCoin;
    private void Start()
    {
        gameManager = GameObject.Find("GameManager").GetComponent<GameManager>();
        Addressables.LoadAssetAsync<StageData>(gameManager.stageAddress).Completed += handle =>
        {
            if (handle.Result == null)
            {
                Debug.Log("エラー");
                return;
            }
            var stageData = handle.Result;
            numNewDatas = stageData.newDatas.Count - 1;//読み込んだstageDataのWave数を取得し-1する(0から始まるため)
            var items = stageData.newDatas[0].StageDatas;
            foreach (var stage in items)
            {
                string type = stage.type.ToString();
                if (type == TypeDefine.ENEMY)
                {
                    GameObject enemy = Instantiate(EnemyPrefab, transform);
                    enemy.transform.position = stage.Positions;
                    EnemyController enemyController = enemy.GetComponent<EnemyController>();
                    enemy.tag = type;
                    enemyController.HP = stage.HPs;
                    enemyController.score = stage.Scores;
                }
                else if (type == TypeDefine.FALL_ENEMY)
                {
                    GameObject fallEnemy = Instantiate(fallEnemyPrefab, transform);
                    fallEnemy.transform.position = stage.Positions;
                    FallEnemy fall = fallEnemy.GetComponent<FallEnemy>();
                    fall.HP = stage.HPs;
                    fall.score = stage.Scores;
                }
                else if (type == TypeDefine.SHOOT_ENEMY)
                {
                    GameObject shootEnemy = Instantiate(shootEnemyPrefab, transform);
                    shootEnemy.transform.position = stage.Positions;
                    ShootEnemy shoot = shootEnemy.GetComponent<ShootEnemy>();
                    shoot.HP = stage.HPs;
                    shoot.score = stage.Scores;
                }
                else if (type == TypeDefine.ROCKET_ENEMY)
                {
                    GameObject rocketEnemy = Instantiate(rocketEnemyPrefab, transform);
                    rocketEnemy.transform.position = stage.Positions;
                    RocketEnemy rocket = rocketEnemy.GetComponent<RocketEnemy>();
                    rocket.HP = stage.HPs;
                    rocket.score = stage.Scores;
                }
                else if (type == TypeDefine.DONT_BREAK)
                {
                    GameObject dontBreak = Instantiate(DontBreakPrefab, transform);
                    dontBreak.transform.position = stage.Positions;
                    dontBreak.tag = type;
                }
            }
        };
        switch (gameManager.stageLevel)
        {
            case 1:
                autoSpawnCount = 5f;
                break;
            case 2:
                autoSpawnCount = 4f;
                break;
            case 3:
                autoSpawnCount = 5f;
                break;
        }
    }

    private void Update()
    {
        if (allWavesCompleted)
        {
            return;
        }

        timeSinceLastWave += Time.deltaTime;
        if (timeSinceLastWave >= WAVE_TIME)
        {
            Debug.Log((waveCount + 1) + "Wave目");
            StartWaveNext();
            timeSinceLastWave = 0;
            waveCount++;
        }

        if (!allWavesCompleted)
        {
            currentCount += Time.deltaTime;
            if (currentCount >= autoSpawnCount)
            {
                Vector3 spawnPosition = new Vector3(Random.Range(-3f, 3f), 8f, 0f);
                switch (gameManager.stageLevel)
                {
                    case 1:
                        GameObject fallEnemy = Instantiate(fallEnemyPrefab, spawnPosition, Quaternion.identity);
                        FallEnemy fall = fallEnemy.GetComponent<FallEnemy>();
                        fall.HP = Random.Range(20, 40);
                        break;
                    case 2:
                        Instantiate(DontBreakPrefab, spawnPosition, Quaternion.identity);
                        break;
                    case 3:
                        GameObject shotEnemy = Instantiate(shootEnemyPrefab, spawnPosition, Quaternion.identity);
                        ShootEnemy shoot = shotEnemy.GetComponent<ShootEnemy>();
                        shoot.HP = Random.Range(20, 40);
                        break;
                }
                currentCount = 0;
            }
        }
    }

    private void StartWaveNext()
    {
        if (waveCount >= numNewDatas - 1)//現状では3Wave目が出現して20秒後に発動している
        {
            Debug.Log("全てのウェーブがクリアされました！");
            allWavesCompleted = true;
            StartCoroutine(BossBattle());
            return;
        }

        Addressables.LoadAssetAsync<StageData>(gameManager.stageAddress).Completed += handle =>
        {
            if (handle.Result == null)
            {
                Debug.Log("error!");
                return;
            }
            var stageData = handle.Result;
            var items = stageData.newDatas[waveCount].StageDatas;
            foreach (var stage in items)
            {
                string type = stage.type.ToString();
                if (type == TypeDefine.ENEMY)
                {
                    GameObject enemy = Instantiate(EnemyPrefab, transform);
                    enemy.transform.position = stage.Positions;
                    EnemyController enemyController = enemy.GetComponent<EnemyController>();
                    enemy.tag = type;
                    enemyController.HP = stage.HPs;
                    enemyController.score = stage.Scores;
                }
                else if (type == TypeDefine.FALL_ENEMY)
                {
                    GameObject fallEnemy = Instantiate(fallEnemyPrefab, transform);
                    fallEnemy.transform.position = stage.Positions;
                    FallEnemy fall = fallEnemy.GetComponent<FallEnemy>();
                    fall.HP = stage.HPs;
                    fall.score = stage.Scores;
                }
                else if (type == TypeDefine.SHOOT_ENEMY)
                {
                    GameObject shootEnemy = Instantiate(shootEnemyPrefab, transform);
                    shootEnemy.transform.position = stage.Positions;
                    ShootEnemy shoot = shootEnemy.GetComponent<ShootEnemy>();
                    shoot.HP = stage.HPs;
                    shoot.score = stage.Scores;
                }
                else if (type == TypeDefine.ROCKET_ENEMY)
                {
                    GameObject rocketEnemy = Instantiate(rocketEnemyPrefab, transform);
                    rocketEnemy.transform.position = stage.Positions;
                    EnemyController rocket = rocketEnemy.GetComponent<EnemyController>();
                    rocket.HP = stage.HPs;
                    rocket.score = stage.Scores;
                }
                else if (type == TypeDefine.DONT_BREAK)
                {
                    GameObject dontBreak = Instantiate(DontBreakPrefab, transform);
                    dontBreak.transform.position = stage.Positions;
                    dontBreak.tag = type;
                }
            }
        };
    }

    IEnumerator BossBattle()
    {
        bossSpawnText.gameObject.SetActive(true);
        yield return new WaitForSeconds(3.0f);
        bossSpawnText.gameObject.SetActive(false);
        Addressables.LoadAssetAsync<StageData>(gameManager.stageAddress).Completed += handle =>
        {
            if (handle.Result == null)
            {
                Debug.Log("error！");
                return;
            }
            var stageData = handle.Result;
            var items = stageData.newDatas[waveCount].StageDatas;
            foreach (var stage in items)
            {
                string type = stage.type.ToString();
                if (type == TypeDefine.ENEMY)
                {
                    GameObject enemy = Instantiate(EnemyPrefab, transform);
                    enemy.transform.position = stage.Positions;
                    EnemyController enemyController = enemy.GetComponent<EnemyController>();
                    enemy.tag = type;
                    enemyController.HP = stage.HPs;
                    enemyController.score = stage.Scores;
                }
                else if (type == TypeDefine.FALL_ENEMY)
                {
                    GameObject fallEnemy = Instantiate(fallEnemyPrefab, transform);
                    fallEnemy.transform.position = stage.Positions;
                    FallEnemy fall = fallEnemy.GetComponent<FallEnemy>();
                    fall.HP = stage.HPs;
                    fall.score = stage.Scores;
                }
                else if (type == TypeDefine.SHOOT_ENEMY)
                {
                    GameObject shootEnemy = Instantiate(shootEnemyPrefab, transform);
                    shootEnemy.transform.position = stage.Positions;
                    ShootEnemy shoot = shootEnemy.GetComponent<ShootEnemy>();
                    shoot.HP = stage.HPs;
                    shoot.score = stage.Scores;
                }
                else if (type == TypeDefine.ROCKET_ENEMY)
                {
                    GameObject rocketEnemy = Instantiate(rocketEnemyPrefab, transform);
                    rocketEnemy.transform.position = stage.Positions;
                    EnemyController rocket = rocketEnemy.GetComponent<EnemyController>();
                    rocket.HP = stage.HPs;
                    rocket.score = stage.Scores;
                }
                else if (type == TypeDefine.DONT_BREAK)
                {
                    GameObject dontBreak = Instantiate(DontBreakPrefab, transform);
                    dontBreak.transform.position = stage.Positions;
                    dontBreak.tag = type;
                }
                else if (type == TypeDefine.BOSS)
                {
                    GameObject boss = Instantiate(BossPrefab, transform);
                    boss.transform.position = bossStartPos;
                    BossController bossController = boss.GetComponent<BossController>();
                    bossController.BossHP = stage.HPs;
                    bossController.score = stage.Scores;
                }
            }
        };
    }
    public void NextStage()
    {
        StartCoroutine(OpenResultPanel());
    }
    public IEnumerator OpenResultPanel()
    {
        UnityWebRequest request = UnityWebRequest.Get(STAGE_DATA_URL + gameManager.stageLevel);
        request.SetRequestHeader("Content-Type", "application/json");
        yield return request.SendWebRequest();
        if (request.result! != UnityWebRequest.Result.Success)
        {
            Debug.Log(request.error);
        }
        else
        {
            NEXT_STAGE next_stage = new NEXT_STAGE();
            next_stage.stage = new STAGE_DATA();
            string inputString = request.downloadHandler.text;
            NEXT_STAGE inputJson = JsonUtility.FromJson<NEXT_STAGE>(inputString);
            gameManager.stageAddress = inputJson.stage.address;
            gameManager.stageLevel = inputJson.stage.stage_level;
            yield return new WaitForSeconds(2.0f);
            SceneManager.LoadScene("GameScene");
        }
    }
    public void PlayLogSet()
    {
        StartCoroutine(PlaylogSet());
        if (gameManager.stageLevel == 3)
        {
            gameManager.totalScore = gameManager.Score + gameManager.Score2 + gameManager.Score3;
            StartCoroutine(PlaylogTotal());
        }
    }
    public IEnumerator PlaylogSet()//スコア結果保存用
    {
        UnityWebRequest request1 = UnityWebRequest.Get(PLAYLOG_URL
            + gameManager.loginID
            + "/" + gameManager.skinID
            + "/" + gameManager.stageLevel
            + "/" + gameManager.stageLevel
            + "/" + gameManager.sendScore
            + "/" + 0//playresult(一旦０で)
            + "/" + getCoin);
        //request1.SetRequestHeader("Content-Type", "application/json");
        yield return request1.SendWebRequest();
        if (request1.result != UnityWebRequest.Result.Success)
        {
            Debug.LogError("Request Error: " + request1.error);
        }
        else
        {
            if (gameManager.stageLevel < 3)
            {
                ResultTextSet();
                resultPanel.SetActive(true);
                NextStage();
            }
        }
    }
    public IEnumerator PlaylogTotal()
    {
        UnityWebRequest request1 = UnityWebRequest.Get(PLAYLOG_URL
            + gameManager.loginID
            + "/" + gameManager.skinID
            + "/" + 4
            + "/" + 4
            + "/" + gameManager.totalScore
            + "/" + 0//playresult(一旦０で)
            + "/" + 0);
        request1.SetRequestHeader("Content-Type", "application/json");
        yield return request1.SendWebRequest();
        if (request1.result != UnityWebRequest.Result.Success)
        {
            Debug.LogError("Request Error: " + request1.error);
        }
        else
        {
            clearText.gameObject.SetActive(true);
            yield return new WaitForSeconds(3.0f);
            ResultTextSet();
            resultPanel.SetActive(true);
            var resetStage = "StageData/stageData1.asset";
            gameManager.Score = 0;
            gameManager.Score2 = 0;
            gameManager.Score3 = 0;
            gameManager.stageLevel = 1;
            gameManager.stageAddress = resetStage;
            gameManager.totalScore = 0;

            yield return new WaitForSeconds(2.0f);
            scenesManager.TitleScene();
        }
    }

    public void ResultTextSet()
    {
        stage1text.text = "ステージ１：" + gameManager.Score.ToString();
        stage2text.text = "ステージ２：" + gameManager.Score2.ToString();
        stage3text.text = "ステージ３：" + gameManager.Score3.ToString();
        totaltext.text = "トータル：" + gameManager.totalScore.ToString();
    }
}
