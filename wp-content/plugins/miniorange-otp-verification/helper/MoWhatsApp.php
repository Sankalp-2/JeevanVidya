<?php

namespace OTP\Helper;
use OTP\Traits\Instance;
use OTP\Helper\MoConstants;
use OTP\Helper\MoMessages;
use OTP\Helper\MoUtility;
use OTP\Helper\MocURLOTP;
use OTP\Helper\MoPHPSessions;

if(! defined( 'ABSPATH' )) exit;

class MoWhatsApp
{
    use Instance;

    function __construct(){
        
        add_action('wp_ajax_miniorange_generate_QR',array($this, 'miniorange_generate_QR'));
        add_filter('mo_wa_send_otp_token',array($this,'mo_wa_send_otp_token'),99,3);
        add_filter('mo_wa_validate_otp_token',array($this,'mo_wa_validate_otp_token'),99,2);
    }

    public function miniorange_generate_QR()
    {
        wp_send_json(MoUtility::createJson($mo_wa_instanceID,MoConstants::SUCCESS_JSON_TYPE));
    }

    public function mo_wa_send_otp_token($authType, $email, $phone)
    {   
        $content = $this->send_otp_token($authType,$email,$phone);
        return $content;
    }

    public function send_otp_token($authType,$email,$phone)
    {   
        $mo_otp_length  = get_mo_option('otp_length') ? get_mo_option('otp_length') : 5;
        $otp             = wp_rand(pow(10,$mo_otp_length-1),pow(10,$mo_otp_length)-1);
        $otp            = apply_filters("mo_alphanumeric_otp_filter",$otp);


        $customerKey    = get_mo_option('admin_customer_key');
        $stringToHash   = $customerKey . $otp;
        $transactionId  = hash("sha512", $stringToHash);
        $message  =     "Dear Customer, Your OTP is ##otp##. Use this Passcode to complete your transaction. Thank you.";
        $message  =      str_replace('##otp##', $otp, $message);
        $response       = $this->send_notif($message,$phone,$otp);
        if($response)
        {   
            MoPHPSessions::addSessionVar('mo_otptoken',true);
            MoPHPSessions::addSessionVar('sent_on',time());
            $content = array('status' => 'SUCCESS','txId' => $transactionId);
        }
        else
        {
            $content = array('status' => 'FAILURE');
        }
        if(isset($_POST['action']) && $_POST['action']=='wa_miniorange_get_test_response')
        {
            return json_encode($response);
        }

        return json_encode($content);
    }

    public function send_notif($message,$phone,$otp)
    {   
        $message     = str_replace(" ","+",$message);
        $url         = MoConstants::HOSTNAME.'/moas/api/plugin/whatsapp/send';
        $customerKey = get_mo_option('admin_customer_key');
        $siteName = get_bloginfo('name');
            
        /*only to send otp via whatsapp on miniOrange and/or custom gateway*/
        $message = 'otp_test_whatsapp';
        $fields     = [
            'customerId' => $customerKey,
            'variable'   => ["var1" => $siteName,
                "var2" => $otp],
            'isDefault'  => true,
            'templateId' => $message,
            'phoneNumber' => $phone,
            'templateLanguage' => 'en',
            'customerEmail' => get_mo_option( 'admin_email')
        ];
        $arr = array();
        array_push($arr,$siteName,$otp); 
        $json        = json_encode ( $fields );
        $response    = MocURLOTP::callAPI($url, $json);
        return $response;
    }

    public function mo_wa_validate_otp_token($transactionId,$otpToken)
    {
         $customerKey = get_mo_option('admin_customer_key');
        if(MoPHPSessions::getSessionVar('mo_otptoken'))
        {
            $pass = $this->checkTimeStamp(MoPHPSessions::getSessionVar('sent_on'),time());
            $pass = $this->checkTransactionId($customerKey,$otpToken,$transactionId,$pass);
            if($pass)
                $content = json_encode(['status' => MoConstants::SUCCESS]);
            else
                $content = json_encode(['status' => MoConstants::FAILURE]);
            MoPHPSessions::unsetSession('$mo_otptoken');
        }
        else
            $content = json_encode(['status' => MoConstants::FAILURE]);
        return $content;
    }

    private function checkTimeStamp($sentTime,$validatedTime)
    {
        $mo_otp_validity = get_mo_option('otp_validity') ? get_mo_option('otp_validity') : 5;
        $diff = round(abs($validatedTime - $sentTime) / 60,2);
        return $diff > $mo_otp_validity ? false : true;
    }
    private function checkTransactionId($customerKey,$otpToken,$transactionId,$pass)
    {
        if(!$pass) return false;
        $stringToHash   = $customerKey . $otpToken;
        $txtID          = hash("sha512", $stringToHash);
        return $txtID===$transactionId;
    }
}