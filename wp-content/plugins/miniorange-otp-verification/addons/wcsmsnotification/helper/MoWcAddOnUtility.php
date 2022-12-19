<?php

namespace OTP\Addons\WcSMSNotification\Helper;

use OTP\Helper\MoUtility;
use WC_Order;
use \WP_User_Query;


class MoWcAddOnUtility
{

    
    public static function getAdminPhoneNumber()
    {
        $notification_settings =get_wc_option('notification_settings');
        if($notification_settings){
            $smsSettings    = $notification_settings->getWcAdminOrderStatusNotif();
            $recipientValue     = maybe_unserialize($smsSettings->recipient);
        }
         return ! empty( $recipientValue ) ? $recipientValue : "";
    }

    
    public static function getCustomerNumberFromOrder($order){
        $user_id 	= $order->get_user_id();
        $phone 		= $order->get_billing_phone();
        return !empty($phone) ? $phone : get_user_meta($user_id,'billing_phone',true);
    }


    
    public static function is_addon_activated()
    {
        MoUtility::is_addon_activated();
    }
}