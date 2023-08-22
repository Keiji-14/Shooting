using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.Networking;

public class LoginController : MonoBehaviour
{
    public InputField userNameInput;
    public InputField passwordInput;
    [SerializeField] Button loginBtn;
    [SerializeField] GameObject loginWindow;
    [SerializeField] GameObject loginFailed;

    GameObject userDataObj;
    GetUserData getUserData;

    GameObject gamaManagerObj;
    GameManager gameManager;

    void Start()
    {
        userDataObj = GameObject.Find("UserData");
        getUserData = userDataObj.GetComponent<GetUserData>();
        gamaManagerObj = GameObject.Find("GameManager");
        gameManager = gamaManagerObj.GetComponent<GameManager>();

        if (!getUserData.getUser)
        {
            loginWindow.SetActive(true);
        }
    }

    void Update()
    {
        loginBtn.interactable = !userNameInput.text.Equals(string.Empty) || !passwordInput.text.Equals(string.Empty);
    }

    public void UserLoginButton()
    {
        StartCoroutine(GetUserDataCoroutine());
    }

    private IEnumerator GetUserDataCoroutine()
    {
        string uri = "http://localhost:8080/scrollshooting/users/userLogin/" + userNameInput.text + "/" + passwordInput.text;

        UnityWebRequest request = UnityWebRequest.Get(uri);
        yield return request.SendWebRequest();

        if (request.result == UnityWebRequest.Result.ConnectionError ||request.result == UnityWebRequest.Result.ProtocolError)
        {
            loginFailed.SetActive(true);
        }
        else
        {
            Debug.Log(request.downloadHandler.text);
            Debug.Log("ÉçÉOÉCÉì");
            loginWindow.SetActive(false);

            string inputUserData = request.downloadHandler.text;
            JsonData inputData = JsonUtility.FromJson<JsonData>(inputUserData);

            getUserData.getUser = true;
            getUserData.getUserID = inputData.users.id;
            getUserData.getUserName = inputData.users.user_name;
            //getUserData.getPassward = passwordInput.text;
            getUserData.getCurrentCoin = inputData.users.current_coin;
            gameManager.loginID = getUserData.getUserID;
        }
    }

    public void CloseLoginFailed()
    {
        loginFailed.SetActive(false);
        loginBtn.interactable = true;
    }
}
