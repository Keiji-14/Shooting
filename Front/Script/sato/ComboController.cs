using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class ComboController : MonoBehaviour
{
    //敵に弾がHitするたびにcombo++(上限1000combo)
    //score獲得時score+(score*combo数*0.01)最大1000comboで獲得スコア10倍
    //playerがダメージを受けるor一定時間敵に弾がHitしなかった時comboは途切れ0に戻る
    //ステージクリア時に、最大コンボ数も記録する？
    //GameManagerでやったほうが楽かも(とりあえず余裕ができた場合)
    void Start()
    {
        
    }
    void Update()
    {
        
    }
}
