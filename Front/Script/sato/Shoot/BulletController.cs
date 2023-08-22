using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class BulletController : MonoBehaviour
{
    PlayerController playerController;
    float damage;
    private void Start()
    {
        playerController = GameObject.Find("Player").GetComponent<PlayerController>();
        damage = playerController.attack;
        Debug.Log("çUåÇóÕ:"+damage);
        Destroy(gameObject, 2.0f);
    }
    public void OnTriggerEnter(Collider other)
    {
        if (other.gameObject.layer == LayerMask.NameToLayer(LayerDefine.ENEMY))
        {
            other.gameObject.GetComponent<EnemyController>().HP -= damage;
        }
        else if (other.gameObject.layer == LayerMask.NameToLayer(LayerDefine.BATTLE_BOSS))
        {
            other.gameObject.GetComponent<BossController>().BossHP -= damage;
        }
        Destroy(gameObject);
    }
}
