using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class GameOverManager : MonoBehaviour
{
    public PlayerHealth playerHealth;
    public GameObject targetReset;
    public GameObject targetClearDisplay;
    public GameObject targetInputField;
    public GameObject targetSetRanking;
    public GameObject targetGetRankings;

    Animator anim;

    void Awake()
    {
        anim = GetComponent<Animator>();
    }


    void Update()
    {
        if (playerHealth.currentHealth <= 0)
        {
            targetReset.SetActive(true);
            targetClearDisplay.SetActive(true);
            targetInputField.SetActive(true);
            targetSetRanking.SetActive(true);
            targetGetRankings.SetActive(true);
            anim.SetTrigger("GameOver");
            Cursor.visible = true;
            Cursor.lockState = CursorLockMode.None;
        }
    }
}
