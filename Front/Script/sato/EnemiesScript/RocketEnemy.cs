using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class RocketEnemy : EnemyController
{
    const float deadTime = 4.0f;
    public float speed = 10f; //���x
    private Vector3 direction; //�i�s����
    float time = 0;
    bool isRocket = false;

    public override void Start()
    {
        base.Start();
        // �v���C���[�̕���������
        direction = (GameObject.FindWithTag(LayerDefine.PLAYER).transform.position - transform.position).normalized;
        transform.rotation = Quaternion.LookRotation(direction);
    }

    public override void Update()
    {
        base.Update();
        time += Time.deltaTime;
        if (time <= deadTime)
        {
            direction = (GameObject.FindWithTag(LayerDefine.PLAYER).transform.position - transform.position).normalized;
            transform.rotation = Quaternion.LookRotation(direction);
        }

        if (time > deadTime)
        {
            transform.position += direction * speed * Time.deltaTime;
            //gameObject.GetComponent<Rigidbody>().velocity = transform.up * 10;
            Destroy_this();
        }

        if (HP <= 0)
        {
            Debug.Log("���P�b�g���S");
        }
    }
    public void Destroy_this()
    {
        if (!isRocket)
        {
            Destroy(gameObject, deadTime);
            isRocket = true;
        }
    }
}
