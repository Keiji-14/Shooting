using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class BillBoard : MonoBehaviour
{
	void Update()
	{
		Vector3 Mcamera = Camera.main.transform.position;
		Mcamera.y = transform.position.y;
		transform.LookAt(Mcamera);
	}
}
