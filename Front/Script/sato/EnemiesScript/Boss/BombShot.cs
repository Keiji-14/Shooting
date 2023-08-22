using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class BombShot : MonoBehaviour
{
    const float MIN_ROTATE = 150.0f;
    const float MAX_ROTATE = 210.0f;
    const float MIN_BOMB_SPEED = 1.2f;
    const float MAX_BOMB_SPEED = 3.6f;
    [SerializeField] GameObject BombBulletPrefab;
    float bombBulletSpeed;
    void Start()
    {
        StartCoroutine(BombShots());
    }
    IEnumerator BombShots()
    {
        for (int i = 0; i < 2; i++)
        {
            float randomAngle = Random.Range(MIN_ROTATE, MAX_ROTATE);
            transform.rotation = Quaternion.Euler(0, 0, randomAngle);
            GameObject bombBullet = Instantiate(BombBulletPrefab, transform.position, transform.rotation);
            bombBulletSpeed = Random.Range(MIN_BOMB_SPEED, MAX_BOMB_SPEED);
            bombBullet.GetComponent<Rigidbody>().velocity = transform.up * bombBulletSpeed;
            yield return new WaitForSeconds(0.2f);
        }
        Destroy(gameObject);
    }
}
