using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class DontBreak : MonoBehaviour
{
    const float deadLine = -5f;
    public float speed = 1.0f;
    void Update()
    {
        transform.position -= new Vector3(0f, Time.deltaTime, 0f);

        if (transform.position.y < deadLine)
        {
            Destroy(gameObject);
        }
    }
}
