using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class HealthItemController : MonoBehaviour
{
    private PlayerHealth ph;
    private int reward = 20;
    public GameObject ItemGet;

    void Start()
    {
        Destroy(gameObject, 7.5f);
    }

    private void OnTriggerEnter(Collider hit)
    {
        if (hit.gameObject.tag == "Player")
        {
            ph = GameObject.Find("Player").GetComponent<PlayerHealth>();

            ph.AddHealth(reward);

            Instantiate(ItemGet, transform.position, transform.rotation);

            Destroy(gameObject);

        }
    }
}
