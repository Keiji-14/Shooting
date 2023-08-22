using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class NormalBossShot : MonoBehaviour
{
    const float MIN_ROTATE = 150.0f;
    const float MAX_ROTATE = 210.0f;
    [SerializeField] GameObject BulletPrefab;
    float standardBulletSpeed = 10.0f;
    // Start is called before the first frame update
    void Start()
    {
        StartCoroutine(NormalShot());
    }

    IEnumerator NormalShot()
    {
        for (int i = 0; i < 3; i++)
        {
            float randomAngle = Random.Range(MIN_ROTATE, MAX_ROTATE);
            transform.rotation = Quaternion.Euler(0, 0, randomAngle);// ZŽ²‰ñ“]‚ð•ÏX
            GameObject bullet = Instantiate(BulletPrefab, transform.position, transform.rotation);
            bullet.GetComponent<Rigidbody>().velocity = transform.up * standardBulletSpeed;
            GameObject leftBullet = Instantiate(BulletPrefab, transform.position + transform.up
                + transform.right, transform.rotation);
            leftBullet.GetComponent<Rigidbody>().velocity = transform.right * standardBulletSpeed;
            GameObject rightBullet = Instantiate(BulletPrefab, transform.position + transform.up
                - transform.right, transform.rotation);
            rightBullet.GetComponent<Rigidbody>().velocity = (-transform.right) * standardBulletSpeed;
            yield return new WaitForSeconds(1.0f);
        }
        Destroy(gameObject);
    }
}
