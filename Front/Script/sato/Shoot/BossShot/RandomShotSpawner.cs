using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class RandomShotSpawner : MonoBehaviour
{
    [SerializeField] GameObject bulletPrefab; // 弾プレハブ
    public float bulletSpeed = 10f; // 弾の速度
    public int bulletCount = 3; // 弾の発射数
    public float destroyDelay = 1f; // オブジェクトの削除までの時間

    void Start()
    {
        for (int i = 0; i < bulletCount; i++)
        {
            // 弾のインスタンスを生成
            GameObject bullet = Instantiate(bulletPrefab, transform.position, Quaternion.identity);
            // 弾のランダムな方向を設定
            Vector3 randomDirection = new Vector3(Random.Range(-1f, 1f), Random.Range(-1f, 1f), 0f);
            // 弾の速度と方向を設定
            bullet.GetComponent<Rigidbody>().velocity = randomDirection.normalized * bulletSpeed;
        }

        // オブジェクトを削除する
        Destroy(gameObject, destroyDelay);
    }
}
