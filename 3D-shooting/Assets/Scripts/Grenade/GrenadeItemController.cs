using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class GrenadeItemController : MonoBehaviour
{
    private PlayerShotGrenade psg;
    private int reward = 1;
    public GameObject ItemGet;

    void Start()
    {
        Destroy(gameObject,7.5f);
    }

    private void OnTriggerEnter(Collider hit)
    {
        if (hit.gameObject.tag == "Player")
        {
            psg = GameObject.Find("GunBarrelEnd").GetComponent<PlayerShotGrenade>();

            psg.AddGrenade(reward);

            Instantiate(ItemGet, transform.position, transform.rotation);

            Destroy(gameObject);
        }
    }
}
