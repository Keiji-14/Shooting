using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class RollShot : MonoBehaviour
{
    [SerializeField] GameObject BulletPrefab;

    public float bulletSpeed = 10f; //弾の速度
    public int numRotations = 3; //回転数
    public float rotationSpeed = 180f; //回転速度
    private float rotationAngle = 0f; //現在の回転角度
    private int rotationsCompleted = 0; //完了した回転数
    private float timeSinceLastShot = 0f; //最後に弾を発射してからの経過時間

    private void Update()
    {
        if (rotationsCompleted < numRotations)
        {
            timeSinceLastShot += Time.deltaTime;//経過時間を更新
            if (timeSinceLastShot >= 0.2f)
            {
                GameObject bullet = Instantiate(BulletPrefab, transform.position, Quaternion.identity);
                bullet.GetComponent<Rigidbody>().velocity = transform.right * bulletSpeed;
                timeSinceLastShot = 0f;
            }
            //回転
            rotationAngle += rotationSpeed * Time.deltaTime;
            transform.rotation = Quaternion.Euler(0f, 0f, rotationAngle);
            //回転が1周したら、回転数をカウントアップする
            if (rotationAngle >= 360f)
            {
                rotationAngle = 0f;
                rotationsCompleted++;
            }
        }
        else if (rotationsCompleted >= numRotations)
        {
            Destroy(gameObject);
        }
    }
}
