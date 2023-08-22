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
		//Component���擾
		//audioSource = GetComponent<AudioSource>();
		pauseMenu.SetActive(false);
	}

	void Update()
	{
		// �|�[�Y��ʂ��I�v�V������ʂ���Ȃ������ꍇ��Esc�L�[����͂Ń|�[�Y��ʂ�\��
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

	// �|�[�Y��ʂ��J��
	public void OpenPauseWindow()
    {
		pauseNow = true;
		pauseMenu.SetActive(true);
		Time.timeScale = 0.0f;
		//audioSource.PlayOneShot(cursorSE);
	}

	// �|�[�Y��ʂ����
	public void ClosePauseWindow()
    {
		pauseNow = false;
		pauseMenu.SetActive(false);
		Time.timeScale = 1.0f;
		//audioSource.PlayOneShot(decisionSE);
	}

	// �Q�[���ɖ߂鏈��
	public void GameBack()
	{
		pauseNow = false;
		pauseMenu.SetActive(false);
		Time.timeScale = 1.0f;
	}
}
