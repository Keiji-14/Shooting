using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class BombBullet : MonoBehaviour
{
    [SerializeField] GameObject BulletPrefab;
    public float bulletSpeed = 10f;//’e‚Ì‘¬“x
    public int numBullets = 8;//”­ŽË‚·‚é’e‚Ì”
    private float timer = 0f;//Œo‰ßŽžŠÔ
    private bool hasFired = false;//’e‚ð”­ŽË‚µ‚½‚©‚Ç‚¤‚©‚Ìƒtƒ‰ƒO

    private void Update()
    {
        timer += Time.deltaTime;
        if (!hasFired && timer >= 2f)
        {
            FireBullets();
            hasFired = true;
        }
    }

    private void FireBullets()
    {
        float angleStep = 360f / numBullets;
        for (int i = 0; i < numBullets; i++)
        {
            float angle = i * angleStep;
            Vector3 direction = new Vector3(Mathf.Cos(angle * Mathf.Deg2Rad), Mathf.Sin(angle * Mathf.Deg2Rad), 0f);
            GameObject bullet = Instantiate(BulletPrefab, transform.position, Quaternion.identity);
            bullet.GetComponent<Rigidbody>().velocity = direction * bulletSpeed;
        }
        Destroy(gameObject);
    }
}
