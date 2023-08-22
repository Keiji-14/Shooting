using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class PauseController : MonoBehaviour
{
	[HideInInspector] public bool pauseNow = false;

	[Header("Pause")]
	[SerializeField] GameObject pauseMenu;
	//[Header("Option")]
	//[SerializeField] GameObject optionMenu;

	//[Header("SE")]
	//[SerializeField] AudioClip cursorSE;
	//[SerializeField] AudioClip decisionSE;

	[Header("Scene")]
	public ScenesManager scenesManager;

	AudioSource audioSource;

	void Start()
	{
		//Componentを取得
		//audioSource = GetComponent<AudioSource>();
		pauseMenu.SetActive(false);
	}

	void Update()
	{
		// ポーズ画面かオプション画面じゃなかった場合にEscキーを入力でポーズ画面を表示
		if (Input.GetKeyDown("escape"))
		{
			if (!pauseNow)
			{
				OpenPauseWindow();
			}
			else
			{
				ClosePauseWindow();
			}
		}
	}

	// ポーズ画面を開く
	public void OpenPauseWindow()
    {
		pauseNow = true;
		pauseMenu.SetActive(true);
		Time.timeScale = 0.0f;
		//audioSource.PlayOneShot(cursorSE);
	}

	// ポーズ画面を閉じる
	public void ClosePauseWindow()
    {
		pauseNow = false;
		pauseMenu.SetActive(false);
		Time.timeScale = 1.0f;
		//audioSource.PlayOneShot(decisionSE);
	}

	// ゲームに戻る処理
	public void GameBack()
	{
		pauseNow = false;
		pauseMenu.SetActive(false);
		Time.timeScale = 1.0f;
	}
}
