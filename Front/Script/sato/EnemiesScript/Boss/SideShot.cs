using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class SideShot : MonoBehaviour
{
    const float SHOT_TIME = 0.4f;
    [SerializeField] GameObject BulletPrefab;
    float sideShotSpeed = 10.0f;
    float countTime = 0;
    private void Start()
    {
        Destroy(gameObject, 3.0f);
    }
    private void Update()
    {
        //StartCoroutine(SideShotCol());
        countTime += Time.deltaTime;
        if (countTime >= SHOT_TIME)
        {
            GameObject bullet = Instantiate(BulletPrefab, transform.position, Quaternion.identity);
            bullet.GetComponent<Rigidbody>().velocity = transform.right * sideShotSpeed;
            countTime = 0;
        }

    }
    IEnumerator SideShotCol()
    {
        GameObject bullet = Instantiate(BulletPrefab, transform.position, Quaternion.identity);
        bullet.GetComponent<Rigidbody>().velocity = transform.right * sideShotSpeed;
        yield return new WaitForSeconds(1.0f);
    }
}
