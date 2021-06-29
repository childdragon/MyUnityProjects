using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class PlayerControl : MonoBehaviour
{
    public float speed;

    private Rigidbody2D rb;

    void Start()
    {
        //自分のゲームオブジェクトからRigidbodyコンポーネント を取得
        rb = GetComponent<Rigidbody2D>();
    }

    void FixedUpdate()
    {
        float x = Input.GetAxis("Horizontal"); //左右
        

        Vector3 movement = new Vector2(x, 0.0f);

        //Rigidbodyコンポーネントに力を加える。
        rb.AddForce(movement * speed);
    }
}
