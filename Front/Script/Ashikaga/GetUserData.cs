using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class GetUserData : MonoBehaviour
{
    public static GetUserData instance;

    [Header("UserData")]
    public bool getUser;
    public int getUserID;
    public string getUserName;
    public string getPassward;
    public int getCurrentCoin;

    [Header("SkinData")]
    public int skinID;
    public int skinInfo;


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
    }
}
