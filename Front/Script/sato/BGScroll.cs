using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class BGScroll : MonoBehaviour
{
    [SerializeField] private float scrollSpeed; //�w�i���X�N���[��������X�s�[�h
    [SerializeField] private float startLine;//�w�i�̃X�N���[�����J�n����ʒu
    [SerializeField] private float deadLine; //�w�i�̃X�N���[�����I������ʒu

    private void Update()
    {
        Scroll();
    }
    public void Scroll()//52����-32
    {
        transform.Translate(0,scrollSpeed,0); //y���W��scrollSpeed��������

        if (transform.position.y < deadLine) //�w�i��y���W���deadLine���傫���Ȃ�����
        {
            transform.position = new Vector3(0, startLine, 5);//�w�i��startLine�܂Ŗ߂�
        }
    }
}
