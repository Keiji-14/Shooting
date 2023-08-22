using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class RandomShotSpawner : MonoBehaviour
{
    [SerializeField] GameObject bulletPrefab; // �e�v���n�u
    public float bulletSpeed = 10f; // �e�̑��x
    public int bulletCount = 3; // �e�̔��ː�
    public float destroyDelay = 1f; // �I�u�W�F�N�g�̍폜�܂ł̎���

    void Start()
    {
        for (int i = 0; i < bulletCount; i++)
        {
            // �e�̃C���X�^���X�𐶐�
            GameObject bullet = Instantiate(bulletPrefab, transform.position, Quaternion.identity);
            // �e�̃����_���ȕ�����ݒ�
            Vector3 randomDirection = new Vector3(Random.Range(-1f, 1f), Random.Range(-1f, 1f), 0f);
            // �e�̑��x�ƕ�����ݒ�
            bullet.GetComponent<Rigidbody>().velocity = randomDirection.normalized * bulletSpeed;
        }

        // �I�u�W�F�N�g���폜����
        Destroy(gameObject, destroyDelay);
    }
}
