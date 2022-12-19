<?php

namespace OTP\Addons\UmSMSNotification\Helper;

use OTP\Helper\MoUtility;
use \WP_User_Query;


class UltimateMemberSMSNotificationUtility {

	
	public static function getAdminPhoneNumber() {
		$notification_settings =get_umsn_option('notification_settings');
        if($notification_settings){
            $smsSettings    = $notification_settings->getUmNewUserAdminNotif();
            $recipientValue     = maybe_unserialize($smsSettings->recipient);
        }
        return ! empty( $recipientValue ) ? $recipientValue : "";
	}


	
	public static function is_addon_activated()
	{
	    MoUtility::is_addon_activated();
	}
}