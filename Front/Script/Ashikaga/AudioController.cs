using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.Audio;
using UnityEngine.UI;

public class AudioController : MonoBehaviour
{
    [SerializeField] AudioMixer audioMixer;
    [SerializeField] Slider masterSlider;
    [SerializeField] Slider bgmSlider;
    [SerializeField] Slider seSlider;

    // �Q�[���N�����ɈȑO�ɐݒ肵�Ă��������擾
    void Start()
    {
        SetMasterSlider();
        SetBGMSlider();
        SetSESlider();

        //�X���C�_�[�𓮂��������̏�����o�^
        masterSlider.onValueChanged.AddListener(SetAudioMixerMaster);
        bgmSlider.onValueChanged.AddListener(SetAudioMixerBGM);
        seSlider.onValueChanged.AddListener(SetAudioMixerSE);
    }

    // �剹�ʂ̐ݒ�
    public void SetAudioMixerMaster(float value)
    {
        //5�i�K�␳
        value /= 5;
        //value /= PlayerPrefs.GetFloat("Master", 0);
        //-80~0�ɕϊ�
        var volume = Mathf.Clamp(Mathf.Log10(value) * 20f, -80f, 0f);
        //audioMixer�ɑ��
        audioMixer.SetFloat("Master", volume);
        PlayerPrefs.SetFloat("MasterVolume", volume);
        PlayerPrefs.SetFloat("Master", value);
    }

    public void SetMasterSlider()
    {
        var value = PlayerPrefs.GetFloat("Master", 0);
        masterSlider.value = value * 5;
    }

    // BGM�̐ݒ�
    public void SetAudioMixerBGM(float value)
    {
        //5�i�K�␳
        value /= 5;
        //value /= PlayerPrefs.GetFloat("BGM", 0);
        //-80~0�ɕϊ�
        var volume = Mathf.Clamp(Mathf.Log10(value) * 20f, -80f, 0f);
        //audioMixer�ɑ��
        audioMixer.SetFloat("BGM", volume);
        PlayerPrefs.SetFloat("BGMVolume", volume);
        PlayerPrefs.SetFloat("BGM", value);
    }

    public void SetBGMSlider()
    {
        var value = PlayerPrefs.GetFloat("BGM", 0);
        bgmSlider.value = value * 5;
    }

    //SE�̐ݒ�
    public void SetAudioMixerSE(float value)
    {
        //5�i�K�␳
        value /= 5;
        //value /= PlayerPrefs.GetFloat("SE", 0);
        //-80~0�ɕϊ�
        var volume = Mathf.Clamp(Mathf.Log10(value) * 20f, -80f, 0f);
        //audioMixer�ɑ��
        audioMixer.SetFloat("SE", volume);
        PlayerPrefs.SetFloat("SEVolume", volume);
        PlayerPrefs.SetFloat("SE", value);
    }

    public void SetSESlider()
    {
        var value = PlayerPrefs.GetFloat("SE", 0);
        seSlider.value = value * 5;
    }
}