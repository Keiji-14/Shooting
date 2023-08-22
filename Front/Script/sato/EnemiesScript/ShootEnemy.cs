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
            //âEéŒÇﬂå„ÇÎÇ…íeÇê∂ê¨Çµî≠éÀ
            GameObject rightBullet = Instantiate(EnemyBullet, transform.position - transform.up
                - transform.right, transform.rotation);
            rightBullet.GetComponent<Rigidbody>().velocity = (-transform.up - transform.right).normalized * 10;
            //ç∂éŒÇﬂå„ÇÎÇ…íeÇê∂ê¨Çµî≠éÀ
            GameObject leftBullet = Instantiate(EnemyBullet, transform.position - transform.up
                + transform.right, transform.rotation);
            leftBullet.GetComponent<Rigidbody>().velocity = (-transform.up + transform.right).normalized * 10;
            //ê^å„ÇÎÇ…íeÇê∂ê¨Çµî≠éÀ
            GameObject backBullet = Instantiate(EnemyBullet, transform.position - transform.up, transform.rotation);
            backBullet.GetComponent<Rigidbody>().velocity = (-transform.up).normalized * 10;
        }
    }
}
