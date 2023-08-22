using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Homing : MonoBehaviour
{
    [SerializeField] Transform target;
    [SerializeField] public float speed = 10f;
    [SerializeField] float rotateSpeed = 5f;

    GameManager gameManager;
    Rigidbody rb;
    float damage;

    void Start()
    {
        gameManager = GameObject.Find("GameManager").GetComponent<GameManager>();
        damage = gameManager.playerAttack;
        rb = GetComponent<Rigidbody>();
        Destroy(gameObject, 2.0f);
    }

    void FixedUpdate()
    {
        if (target == null)
        {
            Destroy(gameObject);
            return;
        }

        Vector3 direction = (target.position - transform.position).normalized;
        Quaternion lookRotation = Quaternion.LookRotation(direction);
        rb.MoveRotation(Quaternion.RotateTowards(transform.rotation, lookRotation, rotateSpeed));

        rb.velocity = transform.forward * speed;
    }

    public Transform Target
    {
        set
        {
            target = value;
        }
        get
        {
            return target;
        }
    }
    public void OnTriggerEnter(Collider other)
    {
        if (other.gameObject.tag == TypeDefine.ENEMY)
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
}
