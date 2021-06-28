using UnityEngine;
using UnityEngine.UI;

public class TankShooting : MonoBehaviour
{
    public int m_PlayerNumber = 1;       
    public Rigidbody m_Shell;
    //弾を飛ばす方向を設定
    public Transform m_FireTransform;
    public Transform m_FireTransform2;
    public Transform m_FireTransform3;
    public Slider m_AimSlider;
    public Slider m_AimSlider2;
    public Slider m_AimSlider3;
    public AudioSource m_ShootingAudio;  
    public AudioClip m_ChargingClip;     
    public AudioClip m_FireClip;         
    public float m_MinLaunchForce = 15f; 
    public float m_MaxLaunchForce = 30f; 
    public float m_MaxChargeTime = 0.75f;

    
    private string m_FireButton;         
    private float m_CurrentLaunchForce;  
    private float m_ChargeSpeed;         
    private bool m_Fired;                


    private void OnEnable()
    {
        m_CurrentLaunchForce = m_MinLaunchForce;
        //弾を飛ばす方向の値の初期値を設定
        m_AimSlider.value = m_MinLaunchForce;
        m_AimSlider2.value = m_MinLaunchForce;
        m_AimSlider3.value = m_MinLaunchForce;
    }


    private void Start()
    {
        m_FireButton = "Fire" + m_PlayerNumber;

        m_ChargeSpeed = (m_MaxLaunchForce - m_MinLaunchForce) / m_MaxChargeTime;
    }
    

    private void Update()
    {
        // Track the current state of the fire button and make decisions based on the current launch force.
        m_AimSlider.value = m_MinLaunchForce;
        m_AimSlider2.value = m_MinLaunchForce;
        m_AimSlider3.value = m_MinLaunchForce;

        if (m_CurrentLaunchForce >= m_MaxLaunchForce && !m_Fired)
        {
            m_CurrentLaunchForce = m_MaxLaunchForce;
            Fire();
        }
        else if (Input.GetButtonDown(m_FireButton))
        {
            m_Fired = false;
            m_CurrentLaunchForce = m_MinLaunchForce;

            m_ShootingAudio.clip = m_ChargingClip;
            m_ShootingAudio.Play();
        }
        else if (Input.GetButton(m_FireButton) && !m_Fired)
        {
            m_CurrentLaunchForce += m_ChargeSpeed * Time.deltaTime;

            m_AimSlider.value = m_CurrentLaunchForce;
            m_AimSlider2.value = m_CurrentLaunchForce;
            m_AimSlider3.value = m_CurrentLaunchForce;
        }
        else if (Input.GetButtonUp(m_FireButton) && !m_Fired)
        {
            Fire();
        }
    }


    private void Fire()
    {
        // Instantiate and launch the shell.
        m_Fired = true;

        //3方向に飛ぶ弾を生成
        Rigidbody shellInstance = Instantiate(m_Shell, m_FireTransform.position, m_FireTransform.rotation) as Rigidbody;
        Rigidbody shellInstance2 = Instantiate(m_Shell, m_FireTransform2.position, m_FireTransform2.rotation) as Rigidbody;
        Rigidbody shellInstance3 = Instantiate(m_Shell, m_FireTransform3.position, m_FireTransform3.rotation) as Rigidbody;

        //3方向に飛ばす力を計算
        shellInstance.velocity = m_CurrentLaunchForce * m_FireTransform.forward;
        shellInstance2.velocity = m_CurrentLaunchForce * m_FireTransform2.forward;
        shellInstance3.velocity = m_CurrentLaunchForce * m_FireTransform3.forward;

        m_ShootingAudio.clip = m_FireClip;
        m_ShootingAudio.Play();

        m_CurrentLaunchForce = m_MinLaunchForce;
    }
}