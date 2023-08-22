using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.Networking;

public class RankingContoller : MonoBehaviour
{
    [SerializeField] Text rankingMainText;
    [SerializeField] Text[] rankingText;
    private int scoreType;

    [SerializeField] TitleController titleController;

    public void TotalRankingView()
    {
        rankingMainText.text = "�g�[�^��";
        scoreType = 4;
        StartCoroutine(GetRankingDataCoroutine());
    }

    public void Stage1RankingView()
    {
        rankingMainText.text = "�X�e�[�W1";
        scoreType = 1;
        StartCoroutine(GetRankingDataCoroutine());
    }

    public void Stage2RankingView()
    {
        rankingMainText.text = "�X�e�[�W2";
        scoreType = 2;
        StartCoroutine(GetRankingDataCoroutine());
    }

    public void Stage3RankingView()
    {
        rankingMainText.text = "�X�e�[�W3";
        scoreType = 3;
        StartCoroutine(GetRankingDataCoroutine());
    }

    private IEnumerator GetRankingDataCoroutine()
    {
        string uri = "http://localhost:8080/scrollshooting/play-logs/get-ranking/" + scoreType;
        UnityWebRequest request = UnityWebRequest.Get(uri);
        yield return request.SendWebRequest();

        if (request.result == UnityWebRequest.Result.ConnectionError || request.result == UnityWebRequest.Result.ProtocolError)
        {

        }
        else
        {
            Debug.Log(request.downloadHandler.text);

            string inputRanking = request.downloadHandler.text;
            JsonData jsonRankingData = JsonUtility.FromJson<JsonData>(inputRanking);
            
            // �����L���O���ēx�ǂݍ��ގ��ɑO�ɕ\�������X�R�A��0�ɂ���
            var resetZero = 0;
            for (int i = 0; i < rankingText.Length; i++)
            {
                rankingText[i].text = (i + 1) + ". " + resetZero.ToString("000000");

                var rankingScore = jsonRankingData.playlogs[i].score;
                rankingText[i].text = (i + 1) + ". " + rankingScore.ToString("000000");
            }

            titleController.OpenRankingView();
        }
    }
}
