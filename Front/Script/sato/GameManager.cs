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


    //�Q�[���V�[���J�n�O��DB����擾����
    [System.NonSerialized] public int loginID;//���O�C��player��ID
    [System.NonSerialized] public int skinID = 1;
    [System.NonSerialized] public float playerAttack = 2.0f;//player�̒e1��������̍U����
    [System.NonSerialized] public float playerAttackSpeed = 10.0f;//player�U�����x(1�b�����茂�e�̐�)
    [System.NonSerialized] public string stageAddress = "StageData/stageData1.asset";//stageData�̃A�h���X
    [System.NonSerialized] public string imageAddress = "Assets/Image/player1.png";//player��sprite(2D�̏ꍇ)
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
