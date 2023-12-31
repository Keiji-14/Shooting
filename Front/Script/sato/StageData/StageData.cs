using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public enum Type
{
    Enemy,//出現後その場に留まり、一定時間後消滅する敵
    FallEnemy,//画面上から徐々に南下する敵
    RocketEnemy,//画面外からplayerめがけて一直線に飛んでくる敵
    ShootEnemy,//弾を撃つ敵
    DontBreak,//破壊不可の落下障害物(画面外で消滅)
    Boss
}

[CreateAssetMenu(menuName = "MyScriptable/Create StageData")]
public class StageData : ScriptableObject
{
    [System.Serializable]
    public class StageDatas
    {
        public Vector3 Positions;
        public int HPs;
        public int Scores;
        public Color Colors;
        public Type type;
    }

    public List<NewDatas> newDatas;
    [System.Serializable]
    public class NewDatas
    {
        public StageDatas[] StageDatas;
    }
}
