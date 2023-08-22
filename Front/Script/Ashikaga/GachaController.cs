using System;
using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.Networking;

public class GachaController : MonoBehaviour
{
    [Header("GachaSprite")]
    [SerializeField] Sprite[] gachaSprite;
    [SerializeField] Image resultGachaImg;
    [SerializeField] Sprite resultDuplicationSprite;

    [Header("Button")]
    [SerializeField] Button gachaBtm;
    [Header("Coin")]
    [SerializeField] Text coinText;
    GameObject userDataObj;
    GetUserData getUserData;

    [Header("Json")]
    ResponseData responseData;

    void Start()
    {
        userDataObj = GameObject.Find("UserData");
        getUserData = userDataObj.GetComponent<GetUserData>();
    }

    public void SetCoinData()
    {
        coinText.text = getUserData.getCurrentCoin.ToString();
    }

    public void Gacha()
    {
        StartCoroutine(GetFromGacha());
    }

    IEnumerator GetFromGacha()
    {
        gachaBtm.interactable = false;

        string gachaUrl = "http://localhost:8080/scrollshooting/gacha-logs/gacha/" + "1/" + getUserData.getUserID;
        UnityWebRequest request = UnityWebRequest.Get(gachaUrl);

        yield return request.SendWebRequest();

        if (request.isNetworkError || request.isHttpError)
        {
            Debug.Log(request.error);
        }
        else
        {
            Debug.Log(request.downloadHandler.text);

            responseData = JsonUtility.FromJson<ResponseData>(request.downloadHandler.text);

            SetCoinData();
            ResultGacha();
        }

        yield return new WaitForSeconds(0.5f);

        gachaBtm.interactable = true;
    }

    private void ResultGacha()
    {
        if (responseData.resultgachas.Count != 0)
        {
            Debug.Log("skin_id:" + (Int32.Parse(responseData.resultgachas[0].skin_id) - 1));
            resultGachaImg.sprite = gachaSprite[Int32.Parse(responseData.resultgachas[0].skin_id) - 1];
        }
        else
        {
            Debug.Log("èdï°");
            resultGachaImg.sprite = resultDuplicationSprite;
        }
    }
}
