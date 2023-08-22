using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.Networking;

[System.Serializable]
public class JsonData
{
    public UserData users;
    public RankingData[] playlogs;
    public ResultGacha[] resultgachas;
    public SkinInforList skinInforList;
}

[System.Serializable]
public class UserData
{
    public int id;
    public string user_name;
    public string passward;
    public int current_coin;
    public string update_date;
    public string create_date;
}

[System.Serializable]
public class RankingData
{
    public int id;
    public int scoreType;
    public int score;
}

[System.Serializable]
public class ResultGacha
{
    public string gacha_id;
    public string user_id;
    public string skin_id;
    public string create_date;
    public string update_date;
    public int id;
}

[System.Serializable]
public class ResponseData
{
    public List<ResultGacha> resultgachas;
    public Dictionary<string, string> coinwhenowned;
    public string message;
    public string skininformessage;
}

[System.Serializable]
public class SkinInfor
{
    public int id;
    public string user_id;
    public string skin_id;
    public string gacha_log_id;
    public string update_date;
    public string create_date;
    public Skin skin;
}

[System.Serializable]
public class Skin
{
    public int id;
    public string skin_name;
    public string address;
    public string update_date;
    public string create_date;
}

[System.Serializable]
public class SkinInforList
{
    public List<SkinInfor> skininfors;
    public string message;
}

public class Connect : MonoBehaviour
{
}
