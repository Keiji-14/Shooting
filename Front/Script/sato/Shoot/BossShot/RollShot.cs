using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class RollShot : MonoBehaviour
{
    [SerializeField] GameObject BulletPrefab;

    public float bulletSpeed = 10f; //�e�̑��x
    public int numRotations = 3; //��]��
    public float rotationSpeed = 180f; //��]���x
    private float rotationAngle = 0f; //���݂̉�]�p�x
    private int rotationsCompleted = 0; //����������]��
    private float timeSinceLastShot = 0f; //�Ō�ɒe�𔭎˂��Ă���̌o�ߎ���

    private void Update()
    {
        if (rotationsCompleted < numRotations)
        {
            timeSinceLastShot += Time.deltaTime;//�o�ߎ��Ԃ��X�V
            if (timeSinceLastShot >= 0.2f)
            {
                GameObject bullet = Instantiate(BulletPrefab, transform.position, Quaternion.identity);
                bullet.GetComponent<Rigidbody>().velocity = transform.right * bulletSpeed;
                timeSinceLastShot = 0f;
            }
            //��]
            rotationAngle += rotationSpeed * Time.deltaTime;
            transform.rotation = Quaternion.Euler(0f, 0f, rotationAngle);
            //��]��1��������A��]�����J�E���g�A�b�v����
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
