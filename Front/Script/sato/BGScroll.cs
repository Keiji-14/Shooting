using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class BGScroll : MonoBehaviour
{
    [SerializeField] private float scrollSpeed; //背景をスクロールさせるスピード
    [SerializeField] private float startLine;//背景のスクロールを開始する位置
    [SerializeField] private float deadLine; //背景のスクロールが終了する位置

    private void Update()
    {
        Scroll();
    }
    public void Scroll()//52下限-32
    {
        transform.Translate(0,scrollSpeed,0); //y座標をscrollSpeed分動かす

        if (transform.position.y < deadLine) //背景のy座標よりdeadLineが大きくなったら
        {
            transform.position = new Vector3(0, startLine, 5);//背景をstartLineまで戻す
        }
    }
}
