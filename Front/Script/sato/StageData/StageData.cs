using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public enum Type
{
    Enemy,//oŒ»Œã‚»‚Ìê‚É—¯‚Ü‚èAˆê’èŠÔŒãÁ–Å‚·‚é“G
    FallEnemy,//‰æ–Êã‚©‚ç™X‚É“ì‰º‚·‚é“G
    RocketEnemy,//‰æ–ÊŠO‚©‚çplayer‚ß‚ª‚¯‚Äˆê’¼ü‚É”ò‚ñ‚Å‚­‚é“G
    ShootEnemy,//’e‚ğŒ‚‚Â“G
    DontBreak,//”j‰ó•s‰Â‚Ì—‰ºáŠQ•¨(‰æ–ÊŠO‚ÅÁ–Å)
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
