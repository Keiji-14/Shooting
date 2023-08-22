using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.Networking;
using UnityEngine.SceneManagement;

[System.Serializable]
public class STAGE_DATA
{
    public int id;
    public int stage_level;
    public int stage_level_level;
    public string address;
    public string update_date;
    public string create_date;
}
[System.Serializable]
public class NEXT_STAGE
{
    public STAGE_DATA stage;
}

public class GameManager : MonoBehaviour
{
    static public GameManager instance;


    //ゲームシーン開始前にDBから取得する
    [System.NonSerialized] public int loginID;//ログインplayerのID
    [System.NonSerialized] public int skinID = 1;
    [System.NonSerialized] public float playerAttack = 2.0f;//playerの弾1発あたりの攻撃力
    [System.NonSerialized] public float playerAttackSpeed = 10.0f;//player攻撃速度(1秒あたり撃つ弾の数)
    [System.NonSerialized] public string stageAddress = "StageData/stageData1.asset";//stageDataのアドレス
    [System.NonSerialized] public string imageAddress = "Assets/Image/player1.png";//playerのsprite(2Dの場合)
    [System.NonSerialized] public int stageLevel=1;
    GameController gameController;
    public int stageLevel_level;
    public float Score;
    public float Score2;
    public float Score3;
    public float totalScore;
    public float sendScore;

    private void Awake()
    {
        if (instance == null)
        {
            instance = this;
            DontDestroyOnLoad(gameObject);
        }
        else
        {
            Destroy(gameObject);
        }
        //gameController = GameObject.Find("GameController").GetComponent<GameController>();
    }
}
