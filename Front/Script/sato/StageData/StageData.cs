using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public enum Type
{
    Enemy,//�o���セ�̏�ɗ��܂�A��莞�Ԍ���ł���G
    FallEnemy,//��ʏォ�珙�X�ɓ쉺����G
    RocketEnemy,//��ʊO����player�߂����Ĉ꒼���ɔ��ł���G
    ShootEnemy,//�e�����G
    DontBreak,//�j��s�̗�����Q��(��ʊO�ŏ���)
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
