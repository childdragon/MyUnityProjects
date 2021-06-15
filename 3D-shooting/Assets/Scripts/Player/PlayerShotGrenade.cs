using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class PlayerShotGrenade : MonoBehaviour
{
    public GameObject grenadePrefab;
    public float shotSpeed=50.0f;
    public AudioClip shotSound;
    public int shotCount = 3;
    public Text grenadetext;

    private float timeBetweenShot = 0.35f;
    private float timer;

    AudioSource audiosource;

    // Start is called before the first frame update
    void Start()
    {
        grenadetext.text = "Grenade:" + shotCount;
        audiosource = GetComponent<AudioSource>();
    }

    // Update is called once per frame
    void Update()
    {
        timer += Time.deltaTime;
        if (Input.GetButton("Fire2") && timer > timeBetweenShot)
        {
            
            if (shotCount < 1)
            { 
                return;
            }

            shotCount -= 1;

            grenadetext.text = "Grenade:" + shotCount;

            timer = 0.0f;

            GameObject grenade = Instantiate(grenadePrefab, transform.position, Quaternion.identity);
            Rigidbody grenadeRb = grenade.GetComponent<Rigidbody>();
            grenadeRb.AddForce(transform.forward * shotSpeed);
            audiosource.PlayOneShot(shotSound);
        }
    }

    public void AddGrenade(int amount)
    {
        shotCount += amount;

        if (shotCount > 5)
        {
            shotCount = 5;
        }

        grenadetext.text = "Grenade:" + shotCount;
    }
}
