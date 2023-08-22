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

    // �I�v�V������ʂ��J������
    public void OpenOptionWindow()
    {
        optionWindow.SetActive(true);
    }

    // �I�v�V������ʂ���鏈��
    public void CloseOptionWindow()
    {
        optionWindow.SetActive(false);
    }

    // �X�L���ύX��ʂ��J������
    public void OpenSkinWindow()
    {
        StartCoroutine(GetSkinDataCoroutine());
    }

    // �X�L���ύX��ʂ���鏈��
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
            Debug.Log("����");
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



    // �K�`����ʂ��J������
    public void OpenGachaWindow()
    {
        gachaWindow.SetActive(true);
        skinWindow.SetActive(false);
        gachaController.SetCoinData();
    }

    // �K�`����ʂ���鏈��
    public void CloseGachaWindow()
    {
        gachaWindow.SetActive(false);
        StartCoroutine(GetSkinDataCoroutine());
    }

    // �����L���O�I����ʂ��J������
    public void OpenSelectRankingWindow()
    {
        rankingWindow.SetActive(true);
        selectRankingView.SetActive(true);
        rankingView.SetActive(false);
    }

    // �����L���O�I����ʂ���鏈��
    public void CloseSelectRankingWindow()
    {
        rankingWindow.SetActive(false);
    }

    // �����L���O�\����ʂ��J������
    public void OpenRankingView()
    {
        rankingView.SetActive(true);
        selectRankingView.SetActive(false);
    }

    // �����L���O�\����ʂ���鏈��
    public void CloseRankingView()
    {
        rankingView.SetActive(false);
        selectRankingView.SetActive(true);
    }
}
