using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class InputFieldAction : MonoBehaviour
{
    private InputField _inputField;

    void Start()
    {
        _inputField = GetComponent<InputField>();
    }

    public void OnEditComplete()
    {
        Debug.Log(_inputField.text);
    }
}
