using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class FallEnemy : EnemyController
{
    //[System.NonSerialized] public new float HP;
    //[System.NonSerialized] public new float score;
    const float deadLine = -4.8f;
    public float speed = 1.0f;
    
    public override void Update()
    {
        base.Update();
        transform.position -= new Vector3(0f, Time.deltaTime, 0f);

        if (transform.position.y < deadLine)
        {
            Destroy(gameObject);
        }
    }
}
