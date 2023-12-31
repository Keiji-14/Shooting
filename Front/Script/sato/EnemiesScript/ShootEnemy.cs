using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class ShootEnemy : FallEnemy
{
    [SerializeField] GameObject EnemyBullet;
    float shootTime = 0;
    public override void Update()
    {
        base.Update();
        shootTime += Time.deltaTime;
        if (shootTime >= 1.0f)
        {
            shootTime = 0;
            //右斜め後ろに弾を生成し発射
            GameObject rightBullet = Instantiate(EnemyBullet, transform.position - transform.up
                - transform.right, transform.rotation);
            rightBullet.GetComponent<Rigidbody>().velocity = (-transform.up - transform.right).normalized * 10;
            //左斜め後ろに弾を生成し発射
            GameObject leftBullet = Instantiate(EnemyBullet, transform.position - transform.up
                + transform.right, transform.rotation);
            leftBullet.GetComponent<Rigidbody>().velocity = (-transform.up + transform.right).normalized * 10;
            //真後ろに弾を生成し発射
            GameObject backBullet = Instantiate(EnemyBullet, transform.position - transform.up, transform.rotation);
            backBullet.GetComponent<Rigidbody>().velocity = (-transform.up).normalized * 10;
        }
    }
}
