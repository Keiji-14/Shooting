using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.Networking;

public class tryServer : MonoBehaviour
{
    const string PLAYLOG_URL = "http://localhost:8080/scrollshooting/playlogs/createPlayLog/";
    
    public void Click()
    {
        StartCoroutine(PlaylogSet());
    }
    public IEnumerator PlaylogSet()
    {
        WWWForm form = new WWWForm();
        form.AddField("userid", 0);
        form.AddField("skinid", 0);
        form.AddField("stagelevel", 0);
        form.AddField("scoretype", 0);
        form.AddField("score", 0);
        form.AddField("playresult", 0);
        form.AddField("coinresult", 0);
        UnityWebRequest request1 = UnityWebRequest.Get(PLAYLOG_URL + form);
        request1.SetRequestHeader("Content-Type", "application/json");
        yield return request1.SendWebRequest();
        if (request1.result != UnityWebRequest.Result.Success)
        {
            Debug.LogError("Request Error: " + request1.error);
        }
        else
        {
            Debug.Log("Request Success: " + request1.downloadHandler.text);
        }
    }
}
