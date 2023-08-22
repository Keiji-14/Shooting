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

    // �^�C�g����ʂɑJ�ڂ���R���[�`���Ăяo��
    public void TitleScene()
    {
        Time.timeScale = 1.0f;
        //changeScene = true;
        //fadeController.StartFadeOut();
        StartCoroutine(ChangeTitleScene());
    }

    // �z�[����ʂɑJ��
    private IEnumerator ChangeTitleScene()
    {
        yield return new WaitForSeconds(loadingTime);
        SceneManager.LoadScene("TitleScene");
    }

    // �Q�[����ʂɑJ�ڂ���R���[�`���Ăяo��
    public void GameScene()
    {
        Time.timeScale = 1.0f;
        StartCoroutine(ChangeGameScene());
    }

    // �Q�[����ʂɑJ��
    private IEnumerator ChangeGameScene()
    {
        yield return new WaitForSeconds(loadingTime);
        SceneManager.LoadScene("GameScene");
    }


    /*// �K�`����ʂɑJ�ڂ���R���[�`���Ăяo��
    public void GachaScene()
    {
        Time.timeScale = 1.0f;
        changeScene = true;
        fadeController.StartFadeOut();
        StartCoroutine(ChangeGachaScene());
    }

    // �K�`����ʂɑJ��
    private IEnumerator ChangeGachaScene()
    {
        yield return new WaitUntil(() => fadeController.isFinishFadeOut);
        yield return new WaitForSeconds(loadingTime);
        loadUi.SetActive(true);
        async = SceneManager.LoadSceneAsync("GachaScene");

        StartCoroutine(Loading());
    }

    // �����ʂɑJ�ڂ���R���[�`���Ăяo��
    public void WeaponScene()
    {
        Time.timeScale = 1.0f;
        changeScene = true;
        fadeController.StartFadeOut();
        StartCoroutine(ChangeWeaponScene());
    }

    // �����ʂɑJ��
    private IEnumerator ChangeWeaponScene()
    {
        yield return new WaitUntil(() => fadeController.isFinishFadeOut);
        yield return new WaitForSeconds(loadingTime);
        loadUi.SetActive(true);
        async = SceneManager.LoadSceneAsync("WeaponScene");

        StartCoroutine(Loading());
    }

    // �^�C�g����ʂɑJ�ڂ���R���[�`���Ăяo��
    /*public void TitleScene()
    {
        Time.timeScale = 1.0f;
        changeScene = true;
        StartCoroutine(ChangeTitleScene());
    }

    // �^�C�g����ʂɑJ��
    private IEnumerator ChangeTitleScene()
    {
        yield return new WaitUntil(() => fadeController.isFinishFadeOut);
        yield return new WaitForSeconds(loadingTime);
        loadUi.SetActive(true);
        loadingUi.SetActive(true);
        async = SceneManager.LoadSceneAsync("TitleScene");

        StartCoroutine(Loading());
    }

    // ��ʑJ�ڎ��Ƀ��[�h��}��
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
