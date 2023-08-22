using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class EnemyController : MonoBehaviour
{
    [System.NonSerialized] public float HP;
    [System.NonSerialized] public float score;
    GameManager gameManager;
    public GameObject powerUPprefab;

    public virtual void Start()
    {
        gameManager = GameObject.Find("GameManager").GetComponent<GameManager>();
        Debug.Log("HP:" + HP);
    }
    public virtual void Update()
    {
        if (HP <= 0)
        {
            switch (gameManager.stageLevel)
            {
                case 1:
                    gameManager.Score += score;
                    break;
                case 2:
                    gameManager.Score2 += score;
                    break;
                case 3:
                    gameManager.Score3 += score;
                    break;
            }
            int rand = Random.Range(0, 2);
            if (rand == 1)
            {
                Instantiate(powerUPprefab, transform.position,Quaternion.identity);
            }
            Destroy(gameObject);
        }
    }
}
