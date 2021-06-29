using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Ball : MonoBehaviour
{
    public float speed;

    private Rigidbody2D rb;

    private Canvas cb;

    private Vector2 direction;

    // Start is called before the first frame update
    void Start()
    {
        rb = GetComponent<Rigidbody2D>();
        cb = GetComponentInParent<Canvas>();
        // 右斜めに進む
        direction = new Vector2(speed, speed).normalized;
        rb.velocity = direction * 100 * cb.transform.localScale.x;
    }

    // Update is called once per frame
    void Update()
    {
        
    }
}
