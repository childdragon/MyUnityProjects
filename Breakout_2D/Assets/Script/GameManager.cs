using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class GameManager : MonoBehaviour
{
    [SerializeField] private Text targetText;
    [SerializeField] private GameObject targetYouWin;
    [SerializeField] private GameObject targetResetButton;

    // Start is called before the first frame update
    void Start()
    {
        
    }

    // Update is called once per frame
    void Update()
    {
        int BlockCount = GameObject.FindGameObjectsWithTag("Block").Length;
        targetText.text = BlockCount.ToString();


        if (BlockCount <= 0)
        {
            targetYouWin.SetActive(true);
            targetResetButton.SetActive(true);
        }
    }
}
