using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class ChargeBullet : MonoBehaviour
{
    PlayerController playerController;
    public float damage;
    public int chargeCount;
    private void Start()
    {
        playerController = GameObject.Find(LayerDefine.PLAYER).GetComponent<PlayerController>();
        damage = playerController.attack;
        Destroy(gameObject, 2.0f);
    }
    public void OnTriggerEnter(Collider other)
    {
        switch (chargeCount)
        {
            case 0:damage *= 1;
                break;
            case 1:damage *= 3;
                break;
            case 2:damage *= 6;
                break;
        }
        if (other.gameObject.layer == LayerMask.NameToLayer(LayerDefine.ENEMY))
        {
            other.gameObject.GetComponent<EnemyController>().HP -= damage;
        }
        else if (other.gameObject.layer == LayerMask.NameToLayer(LayerDefine.BATTLE_BOSS))
        {
            other.gameObject.GetComponent<BossController>().BossHP -= damage;
        }
        if (chargeCount != 2)
        {
            Destroy(gameObject);
        }
    }
}
