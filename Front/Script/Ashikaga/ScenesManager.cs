using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.SceneManagement;

public class ScenesManager : MonoBehaviour
{
    [SerializeField] float loadingTime;
    /*private AsyncOperation async;
    [SerializeField] GameObject loadUi;
    [SerializeField] Slider slider;
    [SerializeField] FadeController fadeController;

    public bool changeScene;*/

    // タイトル画面に遷移するコルーチン呼び出し
    public void TitleScene()
    {
        Time.timeScale = 1.0f;
        //changeScene = true;
        //fadeController.StartFadeOut();
        StartCoroutine(ChangeTitleScene());
    }

    // ホーム画面に遷移
    private IEnumerator ChangeTitleScene()
    {
        yield return new WaitForSeconds(loadingTime);
        SceneManager.LoadScene("TitleScene");
    }

    // ゲーム画面に遷移するコルーチン呼び出し
    public void GameScene()
    {
        Time.timeScale = 1.0f;
        StartCoroutine(ChangeGameScene());
    }

    // ゲーム画面に遷移
    private IEnumerator ChangeGameScene()
    {
        yield return new WaitForSeconds(loadingTime);
        SceneManager.LoadScene("GameScene");
    }


    /*// ガチャ画面に遷移するコルーチン呼び出し
    public void GachaScene()
    {
        Time.timeScale = 1.0f;
        changeScene = true;
        fadeController.StartFadeOut();
        StartCoroutine(ChangeGachaScene());
    }

    // ガチャ画面に遷移
    private IEnumerator ChangeGachaScene()
    {
        yield return new WaitUntil(() => fadeController.isFinishFadeOut);
        yield return new WaitForSeconds(loadingTime);
        loadUi.SetActive(true);
        async = SceneManager.LoadSceneAsync("GachaScene");

        StartCoroutine(Loading());
    }

    // 武器画面に遷移するコルーチン呼び出し
    public void WeaponScene()
    {
        Time.timeScale = 1.0f;
        changeScene = true;
        fadeController.StartFadeOut();
        StartCoroutine(ChangeWeaponScene());
    }

    // 武器画面に遷移
    private IEnumerator ChangeWeaponScene()
    {
        yield return new WaitUntil(() => fadeController.isFinishFadeOut);
        yield return new WaitForSeconds(loadingTime);
        loadUi.SetActive(true);
        async = SceneManager.LoadSceneAsync("WeaponScene");

        StartCoroutine(Loading());
    }

    // タイトル画面に遷移するコルーチン呼び出し
    /*public void TitleScene()
    {
        Time.timeScale = 1.0f;
        changeScene = true;
        StartCoroutine(ChangeTitleScene());
    }

    // タイトル画面に遷移
    private IEnumerator ChangeTitleScene()
    {
        yield return new WaitUntil(() => fadeController.isFinishFadeOut);
        yield return new WaitForSeconds(loadingTime);
        loadUi.SetActive(true);
        loadingUi.SetActive(true);
        async = SceneManager.LoadSceneAsync("TitleScene");

        StartCoroutine(Loading());
    }

    // 画面遷移時にロードを挿む
    private IEnumerator Loading()
    {
        async.allowSceneActivation = false;
        while (!async.isDone)
        {
            slider.value = async.progress;
            if (async.progress >= 0.9f)
            {
                yield return new WaitForSeconds(1.0f);
                async.allowSceneActivation = true;
            }
            yield return null;
        }
    }*/
}
