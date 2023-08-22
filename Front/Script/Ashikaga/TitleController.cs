using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.Networking;

public class TitleController : MonoBehaviour
{
    [Header("Window")]
    [SerializeField] GameObject skinWindow;
    [SerializeField] GameObject gachaWindow;
    [SerializeField] GameObject optionWindow;
    [SerializeField] GameObject rankingWindow;
    [SerializeField] GameObject selectRankingView;
    [SerializeField] GameObject rankingView;

    [Header("UserID")]
    [SerializeField] Text userID;

    [Header("GetComponent")]
    GameObject userDataObj;
    GetUserData getUserData;
    [SerializeField] SelectSkin selectSkin;
    [SerializeField] GachaController gachaController;

    void Start()
    {
        userDataObj = GameObject.Find("UserData");
        getUserData = userDataObj.GetComponent<GetUserData>();
    }

    void Update()
    {
        if (getUserData.getUser)
        {
            userID.text = "UID : " + getUserData.getUserID.ToString("000000");
        }
    }

    // オプション画面を開く処理
    public void OpenOptionWindow()
    {
        optionWindow.SetActive(true);
    }

    // オプション画面を閉じる処理
    public void CloseOptionWindow()
    {
        optionWindow.SetActive(false);
    }

    // スキン変更画面を開く処理
    public void OpenSkinWindow()
    {
        StartCoroutine(GetSkinDataCoroutine());
    }

    // スキン変更画面を閉じる処理
    public void CloseSkinWindow()
    {
        skinWindow.SetActive(false);
    }

    private IEnumerator GetSkinDataCoroutine()
    {
        string uri = "http://localhost:8080/scrollshooting/skin-infors/get-skin-infor/" + getUserData.getUserID;

        UnityWebRequest request = UnityWebRequest.Get(uri);
        yield return request.SendWebRequest();

        if (request.result == UnityWebRequest.Result.ConnectionError || request.result == UnityWebRequest.Result.ProtocolError)
        {
            //loginFailed.SetActive(true);
        }
        else
        {
            Debug.Log("成功");
            Debug.Log(request.downloadHandler.text);

            selectSkin.inputSkinData = request.downloadHandler.text;
            selectSkin.GetSkinJsonData();
            skinWindow.SetActive(true);
            /*Debug.Log(request.downloadHandler.text);

            string inputUserData = request.downloadHandler.text;
            JsonData inputData = JsonUtility.FromJson<JsonData>(inputUserData);

            getUserData.getUser = true;
            getUserData.getID = inputData.users.id;
            getUserData.getUserName = inputData.users.user_name;
            getUserData.getCurrentCoin = inputData.users.current_coin;*/
        }
    }



    // ガチャ画面を開く処理
    public void OpenGachaWindow()
    {
        gachaWindow.SetActive(true);
        skinWindow.SetActive(false);
        gachaController.SetCoinData();
    }

    // ガチャ画面を閉じる処理
    public void CloseGachaWindow()
    {
        gachaWindow.SetActive(false);
        StartCoroutine(GetSkinDataCoroutine());
    }

    // ランキング選択画面を開く処理
    public void OpenSelectRankingWindow()
    {
        rankingWindow.SetActive(true);
        selectRankingView.SetActive(true);
        rankingView.SetActive(false);
    }

    // ランキング選択画面を閉じる処理
    public void CloseSelectRankingWindow()
    {
        rankingWindow.SetActive(false);
    }

    // ランキング表示画面を開く処理
    public void OpenRankingView()
    {
        rankingView.SetActive(true);
        selectRankingView.SetActive(false);
    }

    // ランキング表示画面を閉じる処理
    public void CloseRankingView()
    {
        rankingView.SetActive(false);
        selectRankingView.SetActive(true);
    }
}
