<?php
use OTP\Helper\MoConstants;
use OTP\Helper\MoMessages;
use OTP\Helper\MoAddonListContent;
use OTP\Helper\MoOffer;

echo MoOffer::showOfferPricing('div.mo_charges',['$39','$59','$119'],'New Season');

    $checkmark = '
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
          <g id="1387d83e997b6367c4b5c211e15559b8">
            <path id="fe1f8306c6f43f39ceff3a68bab46acd" d="M7 12.2857L11.4742 15.0677C11.5426 15.1103 11.6323 15.0936 11.6809 15.0293L17 8" stroke="#00D3BA" stroke-width="2" stroke-linecap="round"></path>
          </g>
        </svg>
    ';

    $redCross = '
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
          <g id="bb49a1baa8f2b053c609302287f4c5cb">
            <g id="2c67efdbf97e2a5d9233fce69c6c90ce">
              <path id="0a218d13db926129cd6c078df4b7e91c" d="M8 8L16 16" stroke="#FF6060" stroke-width="2" stroke-linecap="round"></path>
              <path id="659efa9552d3f2b3706cd5cc59cad8c9" d="M16 8L8 16" stroke="#FF6060" stroke-width="2" stroke-linecap="round"></path>
            </g>
          </g>
        </svg>
    ';

    $questionMarkIcon = '
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
          <g id="5d83e4b88b8d72fdf7f1242c6e1a2758">
            <path id="1a33d648b537e4b5428ead7c276e4e43" fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM13 7C13 7.55228 12.5523 8 12 8C11.4477 8 11 7.55228 11 7C11 6.44772 11.4477 6 12 6C12.5523 6 13 6.44772 13 7ZM11 9.25C10.5858 9.25 10.25 9.58579 10.25 10C10.25 10.4142 10.5858 10.75 11 10.75H11.25V17C11.25 17.4142 11.5858 17.75 12 17.75C12.4142 17.75 12.75 17.4142 12.75 17V10C12.75 9.58579 12.4142 9.25 12 9.25H11Z" fill="#28303F"></path>
          </g>
        </svg>
    ';

    $circleIcon = '
        <svg class="min-w-[8px] min-h-[8px]" width="8" height="8" viewBox="0 0 18 18" fill="none">
            <circle id="a89fc99c6ce659f06983e2283c1865f1" cx="9" cy="9" r="7" stroke="rgb(99 102 241)" stroke-width="4"></circle>
        </svg>
    ';

    $addonCard = 'p-5 rounded-md bg-white relative flex flex-col shadow-md';
    $addonPriceTag = 'rounded-md';

echo '
<div>
    <div id="mo-new-pricing-page" class="mo-new-pricing-page mt-mo-4 bg-white rounded-md">

        <!--  TABS  -->
        <div class="mo-tab-container">
            <div class="mo-tabs-wrapper">
                <a id="pricingtabitem" class="mo-tab-item active">Licensing Plans</a>
                <a id="addonstabitem"  class="mo-tab-item">Premium Addons</a>
            </div>           
        </div>

        <!--  TABS CONTENT  -->
        <div>
            <div class="mo-section-header bg-slate-100">
                <h6 id="mo-section-heading" class="grow">Licensing Page</h6>
                <a class="mo-button secondary" href="#mo_registration_firebase_layout">Firebase Gateway Plan</a>
                <a class="mo-button secondary" href="#otp_pay_method">Supported Payments Methods</a>
                <input class="mo-button secondary" type="button" '.mo_esc_string($disabled,"attr").' name="check_btn" id="check_btn" value="'.mo_esc_string(mo_("Check License"),"attr").'"/>
            </div>
            <!--  PRICING SECTION  -->
            <section id="mo_otp_plans_pricing_table">
                <div class="bg-slate-50">
                    

                    <div class="gateway-plan-section">
                        <div class="grow">
                            <h5 class="m-mo-0">Miniorange Gateway Plan</h5>
                            <p class="m-mo-0 mt-mo-1">Require more SMSs and Emails? Continue using our plugin and free addons with more transactions.</p>
                            <p class="m-mo-0">Hassle-Free Setup, Just recharge and Enjoy!</p>
                        </div>
                        <a class="w-full mo-button inverted" href="https://login.xecurify.com/moas/login?redirectUrl=https://login.xecurify.com/moas/initializepayment&requestOrigin=wp_otp_verification_basic_plan" target="_blank">Check Pricing &amp; Recharge</a>
                    </div>
                    

                    <div class="mo-pricing-snippet-grid">

                        <div class="mo-pricing-card" >
                            <div>
                                <h5>Custom Gateway<br>with addons</h5>
                                <div class="my-mo-4 flex gap-mo-4">
                                    <h2 class="m-mo-0">$29</h2>
                                        <div class="box"><h2 class="m-mo-0">$39</h2>
                                            <div class="line"></div>
                                        </div>
                                </div>
                                <div class="font-bold">[One time payment]</div>
                            </div> 

                            <ul class="mt-mo-6 grow" >
                                <li class="feature-snippet">
                                    <span class="mt-mo-1">'.$circleIcon.'</span>
                                    <p class="m-mo-0">Passwordless Login</p>
                                </li>
                                
                                <li class="feature-snippet">
                                    <span class="mt-mo-1">'.$circleIcon.'</span>
                                    <p class="m-mo-0">Login with Phone</p>
                                </li> 
                                
                                <li class="feature-snippet">
                                    <span class="mt-mo-1">'.$circleIcon.'</span>
                                    <p class="m-mo-0">Woocommerce Notifications</p>
                                </li> 

                                <li class="feature-snippet">
                                    <span class="mt-mo-1">'.$circleIcon.'</span>
                                    <p class="m-mo-0">Ultimate Member Notifications</p>
                                </li> 
                                
                                <li class="feature-snippet">
                                    <span class="mt-mo-1">'.$circleIcon.'</span>
                                    <p class="m-mo-0">All Forms Supported</p>
                                </li> 

                                <li class="feature-snippet">
                                    <span class="mt-mo-1">'.$circleIcon.'</span>
                                    <p class="m-mo-0 font-bold">Custom SMTP/HTTP SMS Gateway</p>
                                </li>                            
                            </ul>

                            <button class="w-full mo-button primary" onclick="mo2f_upgradeform(\'wp_email_verification_intranet_basic_plan\')">Upgrade Now</button>
                        </div>

                        <div class="mo-pricing-card">
                            <div>
                                <h5>Twilio Gateway <br>with addons + MSG91</h5>
                                <div class="my-mo-4 flex gap-mo-4">
                                    <h2 class="m-mo-0">$49</h2>
                                     <div class="box"><h2 class="m-mo-0">$69</h2>
                                            <div class="line"></div>
                                        </div>
                                </div>
                                <div class="font-bold">[One time payment]</div>
                            </div>    
                            
                            <ul class="mt-mo-6 grow" >
                                <li class="flex gap-mo-4">
                                    <span class="mt-mo-1">
                                        <span class="mt-mo-1">'.$circleIcon.'</span>
                                    </span> 
                                    <p class="m-mo-0"><b>All features</b> from <b>Custom Gateway with Addons Plan</b></p>
                                </li>
                                
                                <li class="feature-snippet">
                                    <span class="mt-mo-1">'.$circleIcon.'</span>
                                    <p class="m-mo-0">Twilio Gateway Support</p>
                                </li> 
                                
                                <li class="feature-snippet">
                                    <span class="mt-mo-1">'.$circleIcon.'</span>
                                    <p class="m-mo-0">MSG91 Support</p>
                                </li> 

                                <li class="feature-snippet">
                                    <span class="mt-mo-1">'.$circleIcon.'</span>
                                    <p class="m-mo-0">OTP Over Call with <b>Twilio</b></p>
                                </li> 
                                
                                <li class="feature-snippet">
                                    <span class="mt-mo-1">'.$circleIcon.'</span>
                                    <p class="m-mo-0">WP Everest Form Support</p>
                                </li> 

                                <li class="feature-snippet">
                                    <span class="mt-mo-1">'.$circleIcon.'</span>
                                    <p class="m-mo-0">Forminator Form Support</p>
                                </li>                            
                            </ul>

                            <button class="w-full mo-button primary" onclick="mo2f_upgradeform(\'wp_email_verification_intranet_twilio_basic_plan\')">Upgrade Now</button>

                        </div>

                        <div class="mo-pricing-card premium">
                            <div>
                                <h5>Enterprise All Inclusive<br>& AWS SNS</h5>
                                <div class="my-mo-4 flex gap-mo-4">
                                    <h2 class="m-mo-0 text-white">$99</h2>
                                     <div class="box"><h2 class="m-mo-0 text-white">$129</h2>
                                            <div class="line" style="border-top:2.5px solid white;"></div>
                                        </div>
                                </div>
                                <div class="font-bold">[One time payment]</div>
                            </div>    
                            
                            <ul class="mt-mo-6 grow" >
                                <li class="flex gap-mo-4">
                                    <span class="mt-mo-1">
                                        <span class="mt-mo-1">'.$circleIcon.'</span>
                                    </span> 
                                    <p class="m-mo-0"><b>All features</b> from <b>Twilio Gateway with Addons Plan</b></p>
                                </li>
                                
                                <li class="feature-snippet">
                                    <span class="mt-mo-1">'.$circleIcon.'</span>
                                    <p class="m-mo-0">Elementor Form Support</p>
                                </li> 
                                
                                <li class="feature-snippet">
                                    <span class="mt-mo-1">'.$circleIcon.'</span>
                                    <p class="m-mo-0">WCFM Form Support</p>
                                </li> 

                                <li class="feature-snippet">
                                    <span class="mt-mo-1">'.$circleIcon.'</span>
                                    <p class="m-mo-0">AWS SNS Gateway</p>
                                </li> 
                                
                                <li class="feature-snippet">
                                    <span class="mt-mo-1">'.$circleIcon.'</span>
                                    <p class="m-mo-0">Backup SMS Gateway</p>
                                </li> 

                                <li class="feature-snippet">
                                    <span class="mt-mo-1">'.$circleIcon.'</span>
                                    <p class="m-mo-0">Master OTP Feature</p>
                                </li>

                                <li class="feature-snippet">
                                    <span class="mt-mo-1">'.$circleIcon.'</span>
                                    <p class="m-mo-0">Allow OTP For Selected Countries</p>
                                </li>                            
                            </ul>
                            <button class="w-full mo-button primary" onclick="mo2f_upgradeform(\'wp_email_verification_intranet_enterprise_plan\')">Upgrade Now</button>
                        </div>


                        <div class="mo-pricing-card" style="border:none;">
                            <div>
                                <h5>Woocommerce OTP & Notification Plan</h5>
                                <div class="my-mo-4 flex gap-mo-4">
                                    <h2 class="m-mo-0">$149</h2>
                                     <div class="box"><h2 class="m-mo-0">$199</h2>
                                            <div class="line"></div>
                                        </div>
                                </div>
                                <div class="font-bold">[One time payment]</div>
                            </div>    
                            
                            <ul class="mt-mo-6 grow">
                                <li class="feature-snippet">
                                    <span class="mt-mo-1">'.$circleIcon.'</span>
                                    <p class="m-mo-0">OTP verification on WooCommerce Forms</p>
                                </li>  
                                <li class="feature-snippet">
                                    <span class="mt-mo-1">'.$circleIcon.'</span>
                                    <p class="m-mo-0">OTP verification on WCFM form</p>
                                </li> 
                                 <li class="feature-snippet">
                                    <span class="mt-mo-1">'.$circleIcon.'</span>
                                    <p class="m-mo-0">Woocommerce Order Notifications</p>
                                </li>      
                                <li class="feature-snippet">
                                    <span class="mt-mo-1">'.$circleIcon.'</span>
                                    <p class="m-mo-0">WCFM Vendor Notifications</p>
                                </li>      
                                <li class="feature-snippet">
                                    <span class="mt-mo-1">'.$circleIcon.'</span>
                                    <p class="m-mo-0">Start-to-end Order Status Updates over SMS</p>
                                </li>      
                                
                                <li class="feature-snippet">
                                    <span class="mt-mo-1">'.$circleIcon.'</span>
                                    <p class="m-mo-0">Passwordless Login</p>
                                </li>                           
                            </ul>
                            <a class="w-full mo-button primary" href="https://wordpress.org/plugins/miniorange-sms-order-notification-otp-verification/" target="_blank">Try The Free Plan Now!</a><br>
                            <a class="w-full mo-button primary" href="https://login.xecurify.com/moas/login?redirectUrl=https://login.xecurify.com/moas/initializepayment&requestOrigin=wp_email_verification_intranet_woocommerce_plan" target="_blank">Upgrade Now</a>

                        </div>

                    </div>
                </div>

                <!--  DETAILED PLAN  -->

                <div class="overflow-x-auto relative rounded-b-lg">
                    <table id="pricing-table" class="mo-table">
                        <thead class="text-xs text-gray-700 bg-gray-50">
                            <tr class="even:bg-slate-300">
                                <th scope="col" class="py-mo-3 px-mo-6">
                                    Features
                                </th>
                                <th scope="col" class="mo-table-block">
                                    Miniorange Gateway with Addons
                                </th>
                                <th scope="col" class="mo-table-block">
                                    Custom Gateway with Addons
                                </th>
                                <th scope="col" class="mo-table-block">
                                    Twilio Gateway with Addons + MSG91
                                </th>
                                <th scope="col" class="mo-table-block">
                                    Enterprise All Inclusive + AWS SNS
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr class="bg-white border-b">
                                <th scope="row" class="mo-caption py-mo-2 px-mo-6 ">
                                    50+ popular Wordpress Forms and Themes supported
                                </th>
                                <td class="flex flex-row items-center justify-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">                                
                                    '.$checkmark.'
                                </td>
                            </tr>

                            <tr class="bg-white border-b">
                                <th scope="row" class="mo-caption py-mo-2 px-mo-6 ">
                                    WooCommerce Forms
                                </th>
                                <td class="flex flex-row items-center justify-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                            </tr>

                            <tr class="bg-white border-b">
                                <th scope="row" class="mo-caption py-mo-2 px-mo-6 ">
                                    WooCommerce & Ultimate Member SMS Notifications
                                </th>
                                <td class="flex flex-row items-center justify-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                            </tr>

                            <tr class="bg-white border-b">
                                <th scope="row" class="mo-caption py-mo-2 px-mo-6 ">
                                    Contact Form 7
                                </th>
                                <td class="flex flex-row items-center justify-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                            </tr>

                            <tr class="bg-white border-b">
                                <th scope="row" class="mo-caption py-mo-2 px-mo-6 ">
                                    Passwordless Login
                                </th>
                                <td class="flex flex-row items-center justify-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                            </tr>

                            <tr class="bg-white border-b">
                                <th scope="row" class="mo-caption py-mo-2 px-mo-6 ">
                                    Password Reset Over OTP
                                </th>
                                <td class="flex flex-row items-center justify-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                            </tr>

                            <tr class="bg-white border-b">
                                <th scope="row" class="mo-caption py-mo-2 px-mo-6 ">
                                    Enable Country Code Dropdown
                                </th>
                                <td class="flex flex-row items-center justify-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                            </tr>

                            <tr class="bg-white border-b">
                                <th scope="row" class="mo-caption py-mo-2 px-mo-6 ">
                                    Custom SMS & Email Template
                                </th>
                                <td class="flex flex-row items-center justify-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                            </tr>

                            <tr class="bg-white border-b">
                                <th scope="row" class="mo-caption py-mo-2 px-mo-6 ">
                                    Custom OTP Length & Validity
                                </th>
                                <td class="flex flex-row items-center justify-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                            </tr>
                            
                            <tr class="bg-white border-b">
                                <th scope="row" class="mo-caption py-mo-2 px-mo-6 ">
                                    Custom Messages
                                </th>
                                <td class="flex flex-row items-center justify-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                            </tr>

                            <tr class="bg-white border-b">
                                <th scope="row" class="mo-caption py-mo-2 px-mo-6 ">
                                    Block Email Domains & Phone Numbers
                                </th>
                                <td class="flex flex-row items-center justify-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                            </tr>
                            
                            <tr class="bg-white border-b">
                                <th scope="row" class="mo-caption py-mo-2 px-mo-6 ">
                                    OTP Over Call - Twilio
                                </th>
                                <td class="flex flex-row items-center justify-center py-mo-2 px-mo-6">
                                    '.$redCross.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$redCross.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                            </tr>
                            
                            <tr class="bg-white border-b">
                                <th scope="row" class="mo-caption py-mo-2 px-mo-6 ">
                                    Elementor Pro
                                </th>
                                <td class="flex flex-row items-center justify-center py-mo-2 px-mo-6">
                                    '.$redCross.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$redCross.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$redCross.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                            </tr>
                            
                            <tr class="bg-white border-b">
                                <th scope="row" class="mo-caption py-mo-2 px-mo-6 ">
                                    Woocommerce Frontend Manager
                                </th>
                                <td class="flex flex-row items-center justify-center py-mo-2 px-mo-6">
                                    '.$redCross.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$redCross.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$redCross.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                            </tr>
                            
                            <tr class="bg-white border-b">
                                <th scope="row" class="mo-caption py-mo-2 px-mo-6 ">
                                    Social Login with OTP
                                </th>
                                <td class="flex flex-row items-center justify-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$redCross.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$redCross.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                            </tr>
                            
                            <tr class="bg-white border-b">
                                <th scope="row" class="mo-caption py-mo-2 px-mo-6 ">
                                    Miniorange SMS Gateway
                                </th>
                                <td class="flex flex-row items-center justify-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$redCross.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$redCross.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                            </tr>
                            
                            <tr class="bg-white border-b">
                                <th scope="row" class="mo-caption py-mo-2 px-mo-6 ">
                                    Custom SMS/SMTP Gateway
                                </th>
                                <td class="flex flex-row items-center justify-center py-mo-2 px-mo-6">
                                    '.$redCross.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                            </tr>
                            
                            <tr class="bg-white border-b">
                                <th scope="row" class="mo-caption py-mo-2 px-mo-6 ">
                                    Twilio SMS Gateway
                                </th>
                                <td class="flex flex-row items-center justify-center py-mo-2 px-mo-6">
                                    '.$redCross.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$redCross.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                            </tr>
                            
                            <tr class="bg-white border-b">
                                <th scope="row" class="mo-caption py-mo-2 px-mo-6 ">
                                    AWS Gateway
                                </th>
                                <td class="flex flex-row items-center justify-center py-mo-2 px-mo-6">
                                    '.$redCross.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$redCross.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$redCross.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                            </tr>
                            
                            <tr class="bg-white border-b">
                                <th scope="row" class="mo-caption py-mo-2 px-mo-6 ">
                                    Test SMS Configuration
                                </th>
                                <td class="flex flex-row items-center justify-center py-mo-2 px-mo-6">
                                    '.$redCross.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                            </tr>
                            
                            <tr class="bg-white border-b">
                                <th scope="row" class="mo-caption py-mo-2 px-mo-6 ">
                                    Backup SMS Gateway
                                </th>
                                <td class="flex flex-row items-center justify-center py-mo-2 px-mo-6">
                                    '.$redCross.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$redCross.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$redCross.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                            </tr>
                            
                            <tr class="bg-white border-b">
                                <th scope="row" class="mo-caption py-mo-2 px-mo-6 ">
                                    Woocommerce Password Reset OTP
                                </th>
                                <td class="flex flex-row items-center justify-center py-mo-2 px-mo-6">
                                    '.$redCross.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$redCross.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$redCross.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                            </tr>
                            
                            <tr class="bg-white border-b">
                                <th scope="row" class="mo-caption py-mo-2 px-mo-6 ">
                                    Allow OTP for Selected Country
                                </th>
                                <td class="flex flex-row items-center justify-center py-mo-2 px-mo-6">
                                    '.$redCross.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$redCross.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$redCross.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                            </tr>
                            
                            <tr class="bg-white border-b">
                                <th scope="row" class="mo-caption py-mo-2 px-mo-6 ">
                                    Enable Alphanumeric OTP Format
                                </th>
                                <td class="flex flex-row items-center justify-center py-mo-2 px-mo-6">
                                    '.$redCross.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$redCross.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$redCross.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                            </tr>
                            
                            <tr class="bg-white border-b">
                                <th scope="row" class="mo-caption py-mo-2 px-mo-6 ">
                                    Globally Banned Phone Numbers Blocking
                                </th>
                                <td class="flex flex-row items-center justify-center py-mo-2 px-mo-6">
                                    '.$redCross.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$redCross.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$redCross.'
                                </td>
                                <td class="text-center py-mo-2 px-mo-6">
                                    '.$checkmark.'
                                </td>
                            </tr>                            

                        </tbody>
                    </table>
                </div>        
            </section> 
            
            <section id="mo_otp_addons_pricing" style="display: none;">
                <div id="addons-grid" class="mo-addon-section-container ">
                    <div class="mo-addon-card">
                        <div class="grow">
                            <svg width="50" height="50" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g id="563f69671e04ffeef3b83ea51e866208">
                                <rect width="100" height="100" rx="10" fill="url(#7df1013e6d8f719f861e1022a164bc7d)"></rect>
                                <g id="34454dd908cc56c9684f81974317ce7c">
                                  <g id="38645efbc9a6fbc2f72deb9c7ceb7067">
                                    <path id="0db6786045b6f3ac2f30450d4a1abca3" fill-rule="evenodd" clip-rule="evenodd" d="M50 75C63.8071 75 75 63.8071 75 50C75 36.1929 63.8071 25 50 25C36.1929 25 25 36.1929 25 50C25 63.8071 36.1929 75 50 75ZM56.2069 34.308C55.8248 33.3455 54.7348 32.8751 53.7724 33.2572C52.8099 33.6394 52.3395 34.7294 52.7216 35.6918L53.156 36.7858C52.139 36.5712 51.0827 36.4582 50 36.4582C42.1848 36.4582 35.625 42.4013 35.625 49.9999C35.625 51.2128 35.7947 52.3909 36.1136 53.5126C36.3968 54.5087 37.4338 55.0866 38.4299 54.8034C39.4259 54.5203 40.0038 53.4832 39.7207 52.4872C39.4953 51.6944 39.375 50.8613 39.375 49.9999C39.375 44.7118 44.008 40.2082 50 40.2082C52.035 40.2082 53.9261 40.7342 55.5312 41.6388C56.2234 42.0288 57.0864 41.9402 57.6849 41.4176C58.2834 40.895 58.4875 40.0519 58.1943 39.3133L56.2069 34.308ZM63.8864 46.4872C63.6032 45.4911 62.5662 44.9132 61.5701 45.1964C60.5741 45.4795 59.9962 46.5165 60.2793 47.5126C60.5047 48.3054 60.625 49.1385 60.625 49.9999C60.625 55.2879 55.992 59.7916 50 59.7916C47.965 59.7916 46.0739 59.2655 44.4688 58.361C43.7766 57.9709 42.9136 58.0595 42.315 58.5821C41.7165 59.1048 41.5124 59.9479 41.8056 60.6864L43.7931 65.6918C44.1752 66.6543 45.2652 67.1247 46.2276 66.7425C47.1901 66.3604 47.6605 65.2704 47.2784 64.308L46.844 63.2139C47.861 63.4286 48.9173 63.5416 50 63.5416C57.8152 63.5416 64.375 57.5985 64.375 49.9999C64.375 48.787 64.2053 47.6089 63.8864 46.4872Z" fill="white"></path>
                                  </g>
                                </g>
                              </g>
                              <defs>
                                <linearGradient id="7df1013e6d8f719f861e1022a164bc7d" x1="0" y1="0" x2="100" y2="100" gradientUnits="userSpaceOnUse">
                                  <stop stop-color="#FF7AB2"></stop>
                                  <stop offset="1" stop-color="#EA6CFF"></stop>
                                </linearGradient>
                              </defs>
                            </svg>

                            <p class="mt-mo-6 font-bold">WooCommerce Password Reset Over OTP</p>

                            <li class="feature-snippet">
                                <span class="mt-mo-1">'.$circleIcon.'</span>
                                <p class="m-mo-0">Reset password using OTP</p>
                            </li>

                            <li class="feature-snippet">
                                <span class="mt-mo-1">'.$circleIcon.'</span>
                                <p class="m-mo-0">OTP Over Phone</p>
                            </li>

                            <li class="feature-snippet">
                                <span class="mt-mo-1">'.$circleIcon.'</span>
                                <p class="m-mo-0">OTP Over Email</p>
                            </li>
                            
                            <li class="feature-snippet">
                                <span class="mt-mo-1">'.$circleIcon.'</span>
                                <p class="m-mo-0">User Friendly Password Reset</p>
                            </li>

                        </div>
                        <button class="w-full mo-button secondary mt-mo-4" onclick="otpSupportOnClick(\'Hi! I am interested in the WooCommerce Password Reset Over OTP addon, could you please tell me more about this addon?\');">Get Addon | $19</button>
                    </div>

                    <div class="mo-addon-card">
                        <div class="grow">
                           
                                <svg width="50" height="50" viewBox="0 0 100 100" fill="none">
                                  <g id="033b90d886830bac50b11c6b379dcafe">
                                    <rect width="100" height="100" rx="10" fill="url(#3495f85936cfe87c48ae6be73d1ec048)"></rect>
                                    <g id="910adee180532c09d094ca011b854458">
                                      <path id="88000f903c64892e337b114c0f69607c" fill-rule="evenodd" clip-rule="evenodd" d="M50 72.5C62.4264 72.5 72.5 62.4264 72.5 50C72.5 37.5736 62.4264 27.5 50 27.5C37.5736 27.5 27.5 37.5736 27.5 50C27.5 62.4264 37.5736 72.5 50 72.5ZM59 51.6875C59.932 51.6875 60.6875 50.932 60.6875 50C60.6875 49.068 59.932 48.3125 59 48.3125H41C40.068 48.3125 39.3125 49.068 39.3125 50C39.3125 50.932 40.068 51.6875 41 51.6875H59Z" fill="white"></path>
                                    </g>
                                  </g>
                                  <defs>
                                    <linearGradient id="3495f85936cfe87c48ae6be73d1ec048" x1="0" y1="0" x2="100" y2="100" gradientUnits="userSpaceOnUse">
                                      <stop stop-color="#FF8C8C"></stop>
                                      <stop offset="1" stop-color="#FF3F3F"></stop>
                                    </linearGradient>
                                  </defs>
                                </svg>
                    

                            <p class="mt-mo-6 font-bold">Limit OTP Request</p>

                            <li class="feature-snippet">
                                <span class="mt-mo-1">'.$circleIcon.'</span>
                                <p class="m-mo-0">Set timer to resend OTP</p>
                            </li>

                            <li class="feature-snippet">
                                <span class="mt-mo-1">'.$circleIcon.'</span>
                                <p class="m-mo-0">Block Sending OTP Until set timer out</p>
                            </li>

                            <li class="feature-snippet">
                                <span class="mt-mo-1">'.$circleIcon.'</span>
                                <p class="m-mo-0">Block User after OTP request limit is reached</p>
                            </li>                            

                        </div>
                        <button class="w-full mo-button secondary" onclick="otpSupportOnClick(\'Hi! I am interested in the Limit OTP Request addon, could you please tell me more about this addon?\');">Get Addon | $49</button>     
                    </div> 

                    <div class="mo-addon-card">
                        <div class="grow">
                            <svg width="50" height="50" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g id="7964060c44d36a8760d399f2c150d191">
                                <rect width="100" height="100" rx="10" fill="url(#3af86c1638de5d9ea6254087fc809a51)"></rect>
                                <g id="92dda51326a520489a53d8be9018dd82">
                                  <g id="f87bc7354c18ce973747fc33f012f5cf">
                                    <path id="667687f78268e2dd1ba66e3b8af6f5c7" fill-rule="evenodd" clip-rule="evenodd" d="M37.0013 63.5005H62.9987C67.1125 63.5005 69.4608 59.3625 66.9925 56.4628C65.8998 55.1791 65.2263 53.6565 65.0451 52.0599L64.676 48.8074C64.2901 48.8521 63.8977 48.875 63.4999 48.875C57.908 48.875 53.3749 44.3419 53.3749 38.75C53.3749 36.5655 54.0666 34.5427 55.2431 32.8885C55.198 32.8725 55.1527 32.8568 55.1074 32.8413V32.6079C55.1074 29.7872 52.8207 27.5005 50 27.5005C47.1793 27.5005 44.8926 29.7872 44.8926 32.6079V32.8413C40.0722 34.4917 36.5036 38.4145 35.961 43.1947L34.9549 52.0599C34.7737 53.6565 34.1002 55.1791 33.0075 56.4628C30.5392 59.3625 32.8875 63.5005 37.0013 63.5005ZM70.25 38.75C70.25 42.4779 67.2279 45.5 63.5 45.5C59.7721 45.5 56.75 42.4779 56.75 38.75C56.75 35.0221 59.7721 32 63.5 32C67.2279 32 70.25 35.0221 70.25 38.75ZM50 72.5005C53.0522 72.5005 55.6581 70.6988 56.6872 68.1615C56.7301 68.0557 56.75 67.9421 56.75 67.8279C56.75 67.3016 56.3234 66.875 55.7971 66.875H44.2029C43.6766 66.875 43.25 67.3016 43.25 67.8279C43.25 67.9421 43.2699 68.0557 43.3128 68.1615C44.3419 70.6988 46.9478 72.5005 50 72.5005Z" fill="white"></path>
                                  </g>
                                </g>
                              </g>
                              <defs>
                                <linearGradient id="3af86c1638de5d9ea6254087fc809a51" x1="0" y1="0" x2="100" y2="100" gradientUnits="userSpaceOnUse">
                                  <stop stop-color="#4790FF"></stop>
                                  <stop offset="1" stop-color="#896CFF"></stop>
                                </linearGradient>
                              </defs>
                            </svg>
                                                    
                            <p class="mt-mo-6 font-bold">WordPress SMS Notification to Admin & User on Registration</p>
                            
                            <li class="feature-snippet">
                                <span class="mt-mo-1">'.$circleIcon.'</span>
                                <p class="m-mo-0">SMS Notification on User Registration</p>
                            </li>

                            <li class="feature-snippet">
                                <span class="mt-mo-1">'.$circleIcon.'</span>
                                <p class="m-mo-0">Customizable SMS Template</p>
                            </li>

                            <li class="feature-snippet">
                                <span class="mt-mo-1">'.$circleIcon.'</span>
                                <p class="m-mo-0">Notification to Multiple Admins</p>
                            </li>

                        </div>
                        <button class="w-full mo-button secondary mt-mo-4" onclick="otpSupportOnClick(\'Hi! I am interested in the WordPress SMS Notification to Admin & User on Registration addon, could you please tell me more about this addon?\');">Get Addon | $19</button>    
                    </div> 

                    <div class="mo-addon-card">
                        <div class="grow">
                                <svg width="50" height="50" viewBox="0 0 100 100" fill="none">
                                  <g id="c804ab86e06907df4ede7c5996a51eee">
                                    <rect width="100" height="100" rx="10" fill="url(#c631fb2424936253666f90eb3c760e43)"></rect>
                                    <g id="215da64cca5e778eae54f3e9be6f6171">
                                      <g id="255431f8fe3786cf28667958c83417de">
                                        <path id="103e2c5498800c8069ab033c4ae3fd13" opacity="0.4" d="M61.25 50C61.25 52.4853 59.2353 54.5 56.75 54.5H38.75V61.25C38.75 63.7353 40.7647 65.75 43.25 65.75H65.75C68.2353 65.75 70.25 63.7353 70.25 61.25V43.25C70.25 40.7647 68.2353 38.75 65.75 38.75H61.25V50Z" fill="white"></path>
                                        <path id="e12d10051d83e3666c506d0426968ce2" d="M31.4375 56.75H56.9912C59.3434 56.75 61.2502 54.7353 61.2502 52.25V34.25C61.2502 31.7647 59.3434 29.75 56.9912 29.75H31.4375V56.75Z" fill="white"></path>
                                        <path id="96d243b1d831672d9fb31e0117b0435b" opacity="0.4" fill-rule="evenodd" clip-rule="evenodd" d="M29.75 25.8125C30.682 25.8125 31.4375 26.568 31.4375 27.5V72.5C31.4375 73.432 30.682 74.1875 29.75 74.1875C28.818 74.1875 28.0625 73.432 28.0625 72.5V27.5C28.0625 26.568 28.818 25.8125 29.75 25.8125Z" fill="white"></path>
                                      </g>
                                    </g>
                                  </g>
                                  <defs>
                                    <linearGradient id="c631fb2424936253666f90eb3c760e43" x1="0" y1="0" x2="100" y2="100" gradientUnits="userSpaceOnUse">
                                      <stop stop-color="#EDEF83"></stop>
                                      <stop offset="1" stop-color="#00D6AF"></stop>
                                    </linearGradient>
                                  </defs>
                                </svg>
                                <span class="grow"></span>                        
                            

                            <p class="mt-mo-6 font-bold">OTP Verification for Selected Countries Only</p>

                            <li class="feature-snippet">
                                <span class="mt-mo-1">'.$circleIcon.'</span>
                                <p class="m-mo-0">Add countries for which you wish to enable OTP Verification</p>
                            </li>

                            <li class="feature-snippet">
                                <span class="mt-mo-1">'.$circleIcon.'</span>
                                <p class="m-mo-0">Country code dropdown will be altered accordingly</p>
                            </li> 

                            <li class="feature-snippet">
                                <span class="mt-mo-1">'.$circleIcon.'</span>
                                <p class="m-mo-0">Block other countries</p>
                            </li>                            

                        </div>
                        <button class="w-full mo-button secondary" onclick="otpSupportOnClick(\'Hi! I am interested in the OTP Verification for Selected Countries Only addon, could you please tell me more about this addon?\');">Get Addon | $39</button>                       
                    </div> 

                    <div class="mo-addon-card">
                        <div class="grow">
                            <svg width="50" height="50" viewBox="0 0 100 100" fill="none">
                              <g id="5702c03fcabb879bfe0641db68c0bd60">
                                <g id="fc53fd539e2f2cc4097cb8e3ecf1606d">
                                  <path id="0b5274ab205e435baa8eb19539234e50" d="M90 0H10C4.47715 0 0 4.47715 0 10V90C0 95.5229 4.47715 100 10 100H90C95.5229 100 100 95.5229 100 90V10C100 4.47715 95.5229 0 90 0Z" fill="url(#b166b3f6e9757cea71b85b13ea51b3dd)"></path>
                                </g>
                                <g id="a68f7d5e1a6388ee04e4eaab3bdff766">
                                  <g id="7f362f4b2891cb2c9c684ac05e53bb73">
                                    <path id="b6f186ef9482fd3626edade6146f28c7" fill-rule="evenodd" clip-rule="evenodd" d="M70.25 62.0466V65.75C70.25 68.2353 68.2353 70.25 65.75 70.25C45.8678 70.25 29.75 54.1322 29.75 34.25C29.75 31.7647 31.7647 29.75 34.25 29.75H37.9534C39.7934 29.75 41.4481 30.8703 42.1315 32.5787L43.9622 37.1556C44.8314 39.3286 43.8899 41.8051 41.7965 42.8517L41 43.25C41 43.25 42.125 48.875 46.625 53.375C51.125 57.875 56.75 59 56.75 59L57.1483 58.2035C58.1949 56.1101 60.6714 55.1686 62.8444 56.0378L67.4213 57.8685C69.1297 58.5519 70.25 60.2066 70.25 62.0466ZM66.875 34.25C66.875 36.7353 64.8603 38.75 62.375 38.75C59.8897 38.75 57.875 36.7353 57.875 34.25C57.875 31.7647 59.8897 29.75 62.375 29.75C64.8603 29.75 66.875 31.7647 66.875 34.25ZM66.2 41C68.4368 41 70.25 42.8132 70.25 45.05C70.25 46.5412 69.0412 47.75 67.55 47.75H57.2C55.7088 47.75 54.5 46.5412 54.5 45.05C54.5 42.8132 56.3132 41 58.55 41H66.2Z" fill="white"></path>
                                  </g>
                                </g>
                              </g>
                              <defs>
                                <linearGradient id="b166b3f6e9757cea71b85b13ea51b3dd" x1="0" y1="0" x2="100" y2="100" gradientUnits="userSpaceOnUse">
                                  <stop stop-color="#EB57E5"></stop>
                                  <stop offset="1" stop-color="#3FFFFF"></stop>
                                </linearGradient>
                              </defs>
                            </svg>                                             
                            <p class="mt-mo-6 font-bold">Register Using Only Phone Number</p>

                            <li class="feature-snippet">
                                <span class="mt-mo-1">'.$circleIcon.'</span>
                                <p class="m-mo-0">Register with phone number and OTP</p>
                            </li>
                            
                            <li class="feature-snippet">
                                <span class="mt-mo-1">'.$circleIcon.'</span>
                                <p class="m-mo-0">No email required</p>
                            </li>
                            
                            <li class="feature-snippet">
                                <span class="mt-mo-1">'.$circleIcon.'</span>
                                <p class="m-mo-0">Supported Login forms: Woocommerce, Ultimate Member, Default Login</p>
                            </li>

                        </div>
                        <button class="w-full mo-button secondary" onclick="otpSupportOnClick(\'Hi! I am interested in the Register Using Only Phone Number addon, could you please tell me more about this addon?\');">Get Addon | $49</button>
                    </div>

                    <div class="mo-addon-card">
                        <div class="grow">
                        
                                <svg width="50" height="50" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <g id="563f69671e04ffeef3b83ea51e866208">
                                    <rect width="100" height="100" rx="10" fill="url(#7df1013e6d8f719f861e1022a164bc7d)"></rect>
                                    <g id="34454dd908cc56c9684f81974317ce7c">
                                      <g id="38645efbc9a6fbc2f72deb9c7ceb7067">
                                        <path id="0db6786045b6f3ac2f30450d4a1abca3" fill-rule="evenodd" clip-rule="evenodd" d="M50 75C63.8071 75 75 63.8071 75 50C75 36.1929 63.8071 25 50 25C36.1929 25 25 36.1929 25 50C25 63.8071 36.1929 75 50 75ZM56.2069 34.308C55.8248 33.3455 54.7348 32.8751 53.7724 33.2572C52.8099 33.6394 52.3395 34.7294 52.7216 35.6918L53.156 36.7858C52.139 36.5712 51.0827 36.4582 50 36.4582C42.1848 36.4582 35.625 42.4013 35.625 49.9999C35.625 51.2128 35.7947 52.3909 36.1136 53.5126C36.3968 54.5087 37.4338 55.0866 38.4299 54.8034C39.4259 54.5203 40.0038 53.4832 39.7207 52.4872C39.4953 51.6944 39.375 50.8613 39.375 49.9999C39.375 44.7118 44.008 40.2082 50 40.2082C52.035 40.2082 53.9261 40.7342 55.5312 41.6388C56.2234 42.0288 57.0864 41.9402 57.6849 41.4176C58.2834 40.895 58.4875 40.0519 58.1943 39.3133L56.2069 34.308ZM63.8864 46.4872C63.6032 45.4911 62.5662 44.9132 61.5701 45.1964C60.5741 45.4795 59.9962 46.5165 60.2793 47.5126C60.5047 48.3054 60.625 49.1385 60.625 49.9999C60.625 55.2879 55.992 59.7916 50 59.7916C47.965 59.7916 46.0739 59.2655 44.4688 58.361C43.7766 57.9709 42.9136 58.0595 42.315 58.5821C41.7165 59.1048 41.5124 59.9479 41.8056 60.6864L43.7931 65.6918C44.1752 66.6543 45.2652 67.1247 46.2276 66.7425C47.1901 66.3604 47.6605 65.2704 47.2784 64.308L46.844 63.2139C47.861 63.4286 48.9173 63.5416 50 63.5416C57.8152 63.5416 64.375 57.5985 64.375 49.9999C64.375 48.787 64.2053 47.6089 63.8864 46.4872Z" fill="white"></path>
                                      </g>
                                    </g>
                                  </g>
                                  <defs>
                                    <linearGradient id="7df1013e6d8f719f861e1022a164bc7d" x1="0" y1="0" x2="100" y2="100" gradientUnits="userSpaceOnUse">
                                      <stop stop-color="#FF7AB2"></stop>
                                      <stop offset="1" stop-color="#EA6CFF"></stop>
                                    </linearGradient>
                                  </defs>
                                </svg>
                                <span class="grow"></span>
                            <p class="mt-mo-6 font-bold">Wordpress Password Reset Over OTP</p>
                            
                            <li class="feature-snippet">
                                <span class="mt-mo-1">'.$circleIcon.'</span>
                                <p class="m-mo-0">Reset password using OTP instead of email links</p>
                            </li>

                            <li class="feature-snippet">
                                <span class="mt-mo-1">'.$circleIcon.'</span>
                                <p class="m-mo-0">OTP Over Phone Supported</p>
                            </li>

                            <li class="feature-snippet">
                                <span class="mt-mo-1">'.$circleIcon.'</span>
                                <p class="m-mo-0">OTP Over Email Supported</p>
                            </li>
                            

                        </div>
                        <button class="w-full mo-button secondary" onclick="otpSupportOnClick(\'Hi! I am interested in the WordPress Password Reset Over OTP addon, could you please tell me more about this addon?\');">Get Addon | $19</button>
                    </div>

                    <div class="mo-addon-card">
                        <div class="grow">
                                <svg width="50" height="50" viewBox="0 0 100 100" fill="none">
                                  <g id="bc0e8f986a2ec8b31050a44d5b1b2afb">
                                    <rect width="100" height="100" rx="10" fill="url(#5151e7ec67142d62c055f74248b0a28e)"></rect>
                                    <g id="87883360d9a72962dedfce91344b024f">
                                      <g id="3e3ed55deb713f59daf09bd3365974b6">
                                        <path id="a21502646450931d25a993ee6ac0962b" d="M70.25 65.75V62.0466C70.25 60.2066 69.1297 58.5519 67.4213 57.8685L62.8444 56.0378C60.6714 55.1686 58.1949 56.1101 57.1483 58.2035L56.75 59C56.75 59 51.125 57.875 46.625 53.375C42.125 48.875 41 43.25 41 43.25L41.7965 42.8517C43.8899 41.8051 44.8314 39.3286 43.9622 37.1556L42.1315 32.5787C41.4481 30.8703 39.7934 29.75 37.9534 29.75H34.25C31.7647 29.75 29.75 31.7647 29.75 34.25C29.75 54.1322 45.8678 70.25 65.75 70.25C68.2353 70.25 70.25 68.2353 70.25 65.75Z" fill="#28303F"></path>
                                      </g>
                                    </g>
                                  </g>
                                  <defs>
                                    <linearGradient id="5151e7ec67142d62c055f74248b0a28e" x1="0" y1="0" x2="100" y2="100" gradientUnits="userSpaceOnUse">
                                      <stop stop-color="#8CFFAC"></stop>
                                      <stop offset="1" stop-color="#3FFFFF"></stop>
                                    </linearGradient>
                                  </defs>
                                </svg>

                            <p class="mt-mo-6 font-bold">OTP Over Call</p>

                            <li class="feature-snippet">
                                <span class="mt-mo-1">'.$circleIcon.'</span>
                                <p class="m-mo-0">Send OTP Over Call insted of SMS</p>
                            </li>
                            
                            <li class="feature-snippet">
                                <span class="mt-mo-1">'.$circleIcon.'</span>
                                <p class="m-mo-0">Hassle-Free Setup</p>
                            </li>                            

                        </div>
                        <button class="w-full mo-button secondary" onclick="otpSupportOnClick(\'Hi! I am interested in the OTP Over Phone Call addon, could you please tell me more about this addon?\');">Get Addon | $49</button>                       
                    </div> 

                    <div class="mo-addon-card">
                        <div class="grow">
                            
                                <svg width="50" height="50" viewBox="0 0 100 100" fill="none">
                                  <g id="08cefd4fa19f0717074e4fc57bc48504">
                                    <rect width="100" height="100" rx="10" fill="url(#5988db2d005a8118b81906807593b68e)"></rect>
                                    <g id="e48dc9d97d17b4c9f6ac59928bd02728">
                                      <g id="e38251e1d5149b124578b5ec60d2a68d">
                                        <path id="3f4ac12419c6ede386891125add0d316" d="M31.25 46.25C27.7982 46.25 25 43.4518 25 40C25 36.5482 27.7982 33.75 31.25 33.75C34.7018 33.75 37.5 36.5482 37.5 40C37.5 43.4518 34.7018 46.25 31.25 46.25Z" fill="white"></path>
                                        <path id="908fde78edfb00996e6f69192a98c613" opacity="0.4" d="M31.25 66.25C27.7982 66.25 25 63.4518 25 60C25 56.5482 27.7982 53.75 31.25 53.75C34.7018 53.75 37.5 56.5482 37.5 60C37.5 63.4518 34.7018 66.25 31.25 66.25Z" fill="white"></path>
                                        <path id="63d7481f43c66fdf2e48dad539cd5285" opacity="0.4" fill-rule="evenodd" clip-rule="evenodd" d="M43.125 35.625C43.125 34.5895 43.9645 33.75 45 33.75H60C61.0355 33.75 61.875 34.5895 61.875 35.625C61.875 36.6605 61.0355 37.5 60 37.5H45C43.9645 37.5 43.125 36.6605 43.125 35.625Z" fill="white"></path>
                                        <path id="ac4b2e3e5992a6f9f735439c59649df5" fill-rule="evenodd" clip-rule="evenodd" d="M43.125 55.625C43.125 54.5895 43.9645 53.75 45 53.75H60C61.0355 53.75 61.875 54.5895 61.875 55.625C61.875 56.6605 61.0355 57.5 60 57.5H45C43.9645 57.5 43.125 56.6605 43.125 55.625Z" fill="white"></path>
                                        <path id="4adc2ca37258b425706c69f37bfba3e9" opacity="0.4" fill-rule="evenodd" clip-rule="evenodd" d="M43.125 44.375C43.125 43.3395 43.9645 42.5 45 42.5L75 42.5C76.0355 42.5 76.875 43.3395 76.875 44.375C76.875 45.4105 76.0355 46.25 75 46.25L45 46.25C43.9645 46.25 43.125 45.4105 43.125 44.375Z" fill="white"></path>
                                        <path id="0e13eb575cdb0d9e5ebb72e3d301b6b0" fill-rule="evenodd" clip-rule="evenodd" d="M43.125 64.375C43.125 63.3395 43.9645 62.5 45 62.5H75C76.0355 62.5 76.875 63.3395 76.875 64.375C76.875 65.4105 76.0355 66.25 75 66.25H45C43.9645 66.25 43.125 65.4105 43.125 64.375Z" fill="white"></path>
                                      </g>
                                    </g>
                                  </g>
                                  <defs>
                                    <linearGradient id="5988db2d005a8118b81906807593b68e" x1="0" y1="0" x2="100" y2="100" gradientUnits="userSpaceOnUse">
                                      <stop stop-color="#5D94FF"></stop>
                                      <stop offset="1" stop-color="#1CE7E7"></stop>
                                    </linearGradient>
                                  </defs>
                                </svg>
                                <span class="grow"></span>                      
                            <p class="mt-mo-6 font-bold">Country Code Dropdown</p>

                            <li class="feature-snippet">
                                <span class="mt-mo-1">'.$circleIcon.'</span>
                                <p class="m-mo-0">Enable country dropdown on any phone field</p>
                            </li>

                            <li class="feature-snippet">
                                <span class="mt-mo-1">'.$circleIcon.'</span>
                                <p class="m-mo-0">Enter ID selector of the phone field</p>
                            </li>

                            <li class="feature-snippet">
                                <span class="mt-mo-1">'.$circleIcon.'</span>
                                <p class="m-mo-0">Country Code with Flags</p>
                            </li>                         

                        </div>
                        <button class="w-full mo-button secondary" onclick="otpSupportOnClick(\'Hi! I am interested in the Country Code Dropdown addon, could you please tell me more about this addon?\');">Get Addon | $19</button>
                    </div>

                    <div class="mo-addon-card">
                        <div class="grow">
                            <svg width="50" height="50" viewBox="0 0 100 100" fill="none">
                              <g id="7e95c2d921a95088816629c37b6984aa">
                                <rect width="100" height="100" rx="10" fill="url(#6883cbcb1edf8e76de86908e841df169)"></rect>
                                <g id="e7c3768e5f96e7ff7b6e3ecc4f149e28">
                                  <g id="edd8777e157c12a43d313e76c141f96c">
                                    <path id="86428f1dfb81a502ab48f6dd9ff2420e" fill-rule="evenodd" clip-rule="evenodd" d="M32 27.5C29.5147 27.5 27.5 29.5147 27.5 32V41C27.5 43.4853 29.5147 45.5 32 45.5H41C43.4853 45.5 45.5 43.4853 45.5 41V32C45.5 29.5147 43.4853 27.5 41 27.5H32ZM36.5 72.5C41.4706 72.5 45.5 68.4706 45.5 63.5C45.5 58.5294 41.4706 54.5 36.5 54.5C31.5294 54.5 27.5 58.5294 27.5 63.5C27.5 68.4706 31.5294 72.5 36.5 72.5ZM54.5 59C54.5 56.5147 56.5147 54.5 59 54.5H68C70.4853 54.5 72.5 56.5147 72.5 59V68C72.5 70.4853 70.4853 72.5 68 72.5H59C56.5147 72.5 54.5 70.4853 54.5 68V59ZM64.625 29.1875C64.625 28.2555 63.8695 27.5 62.9375 27.5C62.0055 27.5 61.25 28.2555 61.25 29.1875V35.375H55.0625C54.1305 35.375 53.375 36.1305 53.375 37.0625C53.375 37.9945 54.1305 38.75 55.0625 38.75H61.25V44.9375C61.25 45.8695 62.0055 46.625 62.9375 46.625C63.8695 46.625 64.625 45.8695 64.625 44.9375V38.75H70.8125C71.7445 38.75 72.5 37.9945 72.5 37.0625C72.5 36.1305 71.7445 35.375 70.8125 35.375H64.625V29.1875Z" fill="white"></path>
                                  </g>
                                </g>
                              </g>
                              <defs>
                                <linearGradient id="6883cbcb1edf8e76de86908e841df169" x1="0" y1="0" x2="100" y2="100" gradientUnits="userSpaceOnUse">
                                  <stop stop-color="#47DEFF"></stop>
                                  <stop offset="1" stop-color="#1653EF"></stop>
                                </linearGradient>
                              </defs>
                            </svg>
                            <p class="mt-mo-6 font-bold">OTP Verification for Android/IOS Application</p>

                            <li class="feature-snippet">
                                <span class="mt-mo-1">'.$circleIcon.'</span>
                                <p class="m-mo-0">Get APIs to connect Wordpress site and mobile application</p>
                            </li>

                            <li class="feature-snippet">
                                <span class="mt-mo-1">'.$circleIcon.'</span>
                                <p class="m-mo-0">API for Send OTP</p>
                            </li>

                            <li class="feature-snippet">
                                <span class="mt-mo-1">'.$circleIcon.'</span>
                                <p class="m-mo-0">API for Verify OTP</p>
                            </li>                            

                        </div>
                        <button class="w-full mo-button secondary" onclick="otpSupportOnClick(\'Hi! I am interested in the OTP Verification for Android/IOS Application addon, could you please tell me more about this addon?\');">Get Addon | $89</button>
                    </div>

                    <div class="mo-addon-card">
                        <div class="grow">                            
                            <svg width="50" height="50" viewBox="0 0 100 100" fill="none">
                              <g id="bdc921d4bff338c999c25cb7f7676a4d">
                                <g id="a674357caf83f9024dba8f0d2829d650">
                                  <path id="aecaee670e9cd3942e0cab0f00858627" d="M90 0H10C4.47715 0 0 4.47715 0 10V90C0 95.5229 4.47715 100 10 100H90C95.5229 100 100 95.5229 100 90V10C100 4.47715 95.5229 0 90 0Z" fill="url(#53015cb3ee762013c785e00d8d673d9b)"></path>
                                  <g id="5d38c302f1f779775e8cb283f9d116ad">
                                    <g id="4d60257e005adf16df3159d4e47fbc83">
                                      <path id="3d1e870026f4185563bc93ab3e256a74" d="M70.25 65.75V62.0466C70.25 60.2066 69.1297 58.5519 67.4213 57.8685L62.8444 56.0378C60.6714 55.1686 58.1949 56.1101 57.1483 58.2035L56.75 59C56.75 59 51.125 57.875 46.625 53.375C42.125 48.875 41 43.25 41 43.25L41.7965 42.8517C43.8899 41.8051 44.8314 39.3286 43.9622 37.1556L42.1315 32.5787C41.4481 30.8703 39.7934 29.75 37.9534 29.75H34.25C31.7647 29.75 29.75 31.7647 29.75 34.25C29.75 54.1322 45.8678 70.25 65.75 70.25C68.2353 70.25 70.25 68.2353 70.25 65.75Z" fill="#28303F"></path>
                                    </g>
                                  </g>
                                </g>
                              </g>
                              <defs>
                                <linearGradient id="53015cb3ee762013c785e00d8d673d9b" x1="0" y1="0" x2="100" y2="100" gradientUnits="userSpaceOnUse">
                                  <stop stop-color="#8CFFAC"></stop>
                                  <stop offset="1" stop-color="#3FFFFF"></stop>
                                </linearGradient>
                              </defs>
                            </svg>

                            <p class="mt-mo-6 font-bold">Login Using Only Phone Number</p>

                            <li class="feature-snippet">
                                <span class="mt-mo-1">'.$circleIcon.'</span>
                                <p class="m-mo-0">Login using Phone Number</p>
                            </li>

                            <li class="feature-snippet">
                                <span class="mt-mo-1">'.$circleIcon.'</span>
                                <p class="m-mo-0">Customizable as per Login Form</p>
                            </li>

                        </div>
                        <button class="w-full mo-button secondary" onclick="otpSupportOnClick(\'Hi! I am interested in the Login Using Only Phone Number addon, could you please tell me more about this addon?\');">Get Addon | $49</button>
                    </div>

                    <div class="mo-addon-card">
                        <div class="grow">
                                <svg width="50" height="50" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <g id="d793a5c7f1276bb8bd96ed3a45fc2ba1">
                                    <rect width="100" height="100" rx="10" fill="url(#429fd1d4aa4ecddb39c430be9baf1ab8)"></rect>
                                    <g id="39642c8164731a0c117c0148c6bf5978">
                                      <path id="8f236ae67414afd6bb621c61fb227f5e" fill-rule="evenodd" clip-rule="evenodd" d="M56.629 43.3717C57.3613 44.104 57.3613 45.2911 56.629 46.0234L46.0224 56.63C45.2902 57.3622 44.103 57.3622 43.3708 56.63C42.6386 55.8977 42.6386 54.7106 43.3708 53.9783L53.9774 43.3717C54.7096 42.6395 55.8968 42.6395 56.629 43.3717Z" fill="black"></path>
                                      <path id="aba512741839dadd8362e312019f69c0" fill-rule="evenodd" clip-rule="evenodd" d="M65.3408 34.6595C61.4706 30.7893 55.1959 30.7893 51.3257 34.6595L47.159 38.8262C46.4268 39.5584 45.2396 39.5584 44.5074 38.8262C43.7751 38.094 43.7751 36.9068 44.5074 36.1745L48.674 32.0078C54.0087 26.6732 62.6578 26.6732 67.9925 32.0078C73.3271 37.3425 73.3271 45.9916 67.9925 51.3263L63.8258 55.493C63.0935 56.2252 61.9064 56.2252 61.1741 55.493C60.4419 54.7607 60.4419 53.5735 61.1741 52.8413L65.3408 48.6746C69.211 44.8044 69.211 38.5297 65.3408 34.6595Z" fill="black"></path>
                                      <path id="2041639debf797014dd7a0c568732528" fill-rule="evenodd" clip-rule="evenodd" d="M34.6589 65.3405C38.5291 69.2107 44.8039 69.2107 48.6741 65.3405L52.8408 61.1738C53.573 60.4416 54.7602 60.4416 55.4924 61.1738C56.2246 61.906 56.2246 63.0932 55.4924 63.8255L51.3257 67.9922C45.9911 73.3268 37.3419 73.3268 32.0073 67.9922C26.6727 62.6575 26.6727 54.0084 32.0073 48.6737L36.174 44.507C36.9062 43.7748 38.0934 43.7748 38.8256 44.507C39.5579 45.2393 39.5579 46.4265 38.8256 47.1587L34.6589 51.3254C30.7888 55.1956 30.7888 61.4703 34.6589 65.3405Z" fill="black"></path>
                                    </g>
                                  </g>
                                  <defs>
                                    <linearGradient id="429fd1d4aa4ecddb39c430be9baf1ab8" x1="0" y1="0" x2="100" y2="100" gradientUnits="userSpaceOnUse">
                                      <stop stop-color="#5DECFF"></stop>
                                      <stop offset="1" stop-color="#1CE7C2"></stop>
                                    </linearGradient>
                                  </defs>
                                </svg>
                                <span class="grow"></span>                       
                   
                            <p class="mt-mo-6 font-bold">Verification via Email Link instead of One time Passcode</p>

                            <li class="feature-snippet">
                                <span class="mt-mo-1">'.$circleIcon.'</span>
                                <p class="m-mo-0">Verification via email links</p>
                            </li>

                            <li class="feature-snippet">
                                <span class="mt-mo-1">'.$circleIcon.'</span>
                                <p class="m-mo-0">Secure Verification</p>
                            </li>

                        </div>
                        <button class="w-full mo-button secondary" onclick="otpSupportOnClick(\'Hi! I am interested in the Verification via Email Link instead of One time Passcode addon, could you please tell me more about this addon?\');">Get Addon | $49</button>
                    </div>
            </section>

        </div>
    </div>
';

echo '
    <script>

        const {origin,pathname} = window.location;
        const moSectionHeading = document.getElementById("mo-section-heading");
       
        function toggleClasses(node,add,remove) {
            add.forEach(className => {
                node.classList.add(className)
            })
            remove.forEach(className => {
                node.classList.remove(className)
            })
        }

        const urlParams = new URLSearchParams(location.search);
        let params = {};
        for (const [key, value] of urlParams) {
            params[key] = value
        }
        
        const pricingPage = document.getElementById("mo_otp_plans_pricing_table");
        const addonsPage = document.getElementById("mo_otp_addons_pricing");


        const pricingTabItem = document.getElementById("pricingtabitem");
        const addonsTabItem = document.getElementById("addonstabitem");
        
        pricingTabItem.addEventListener("click",function(){
            window.open(`${origin}${pathname}?page=pricing`,\'_self\');
        })
        addonsTabItem.addEventListener("click",function(){
            window.open(`${origin}${pathname}?page=pricing&subpage=premaddons`,\'_self\');
        })

        if ("subpage" in params && params.subpage === "premaddons"){

            addonsPage.style.display = "block";
            pricingPage.style.display = "none";
            
            addonsTabItem.classList.add("active")
            pricingTabItem.classList.remove("active")

            moSectionHeading.textContent = "Premium Addons"

        }

        else {

            addonsPage.style.display = "none";
            pricingPage.style.display = "block";

            pricingTabItem.classList.add("active")
            addonsTabItem.classList.remove("active")

            moSectionHeading.textContent = "Licensing Plans"
        }
        
    </script>
';

echo '
  <div id="mo_otp_addons_pricing" hidden>
  <table class="mo_registration_pricing_table">
      <h2>'.mo_esc_string(mo_("PREMIUM ADDONS"),"attr").'
          <span style="float:right">
          <input type="button"  name="Supported_payment_methods" id="pmt_btn_addon"
                      class="button button-primary button-large" value="'.mo_esc_string(mo_("Supported Payment Methods"),"attr").'"/>
              <input type="button" '.mo_esc_string($disabled,"attr").' name="check_btn" id="check_btn"
                      class="button button-primary button-large" value="'.mo_esc_string(mo_("Check License"),"attr").'"/>
          </span>
      <h2>
      <hr></table>';

MoAddonListContent::showAddonsContent();

echo'
            </div>
            </div></div>
            <div style="margin-top:24px;" class="mo_registration_divided_layout mo-otp-full" >
                <div class="mo_registration_firebase_layout mo-otp-center" id="mo_registration_firebase_layout">
                    <div class="mo_firebase_adv_header" style="text-align:center;padding-top:0.5%;">
                        <img src="'.mo_esc_string(MOV_FIREBASE,"attr").'" style="height:40px;width:40px;" >
                        <span style="font-family: ui-serif;font-size: 30px;padding-left: 10px;vertical-align: super;">Firebase Gateway Plan</span>
                    </div>
                    <br>
                    <div class="mo_firebase_adv_content" style="font-size: 15px!important;">
                        <div>
                            <b style="margin-left: 3%;">Use Firebase as your custom SMS gateway with <a href="https://firebase.google.com/pricing"target="_blank">10K free transactions</a> to send One Time Passcodes (OTP).</b>
                            <a href="https://wordpress.org/plugins/miniorange-firebase-sms-otp-verification/" style="float:right;margin-right:4%;width:10%;" class="mo-button inverted" target="_blank" id="mo_firebase_plan_download">Get this Plugin</a>
                        </div>
                        <br><br><br>
                        <div class="mo_firebase_feature_container" style="display:flex;border-radius: 7px;margin-left: 3%;line-height: 175%;">
                            <div style="width:46%;background: #e0eeee99;margin-right: 1%;padding: 1%;border-radius: 8px;">
                                <b>&#9733; Login With Phone</b><br>
                                <b>&#9733; Custom Redirection on Login Form & Registration Form</b><br>
                                <b>&#9733; Custom CSS for Login and Registration Forms</b>
                            </div>
                            <div style="width:46%;background: #e0eeee99;padding: 1%;border-radius: 8px;">
                                <b>&#9733; Password Less Login</b><br>
                                <b>&#9733; OTP Verification on Registration Form</b><br>
                                <b>&#9733; User role Selection on registration</b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  ';

echo'  
    <div class="mo_registration_divided_layout mo-otp-full">
        <div class="mo_registration_pricing_layout mo-otp-center">

            <!-----------------------------------------------------------------------------------------------------------------
                                                    EXTRA INFORMATION ABOUT THE PLANS
            ------------------------------------------------------------------------------------------------------------------->

            <br>
            <div id="disclaimer" style="margin-bottom:15px;">
                <span style="font-size:15px;">
                    <b>'.mo_esc_string(mo_("SMS gateway"),"attr").'</b>
                        '.mo_esc_string(mo_(" is a service provider for sending SMS on your behalf to your users."),"attr").'<br>
                    <b>'.mo_esc_string(mo_("SMTP gateway"),"attr").'</b>
                        '.mo_esc_string(mo_(" is a service provider for sending Emails on your behalf to your users."),"attr").'<br><br>
                    *'.mo_esc_string(mo_("Transaction prices may very depending on country. If you want to use more than 50k transactions, mail us at"),"attr").'
                        <a href="mailto:'.mo_esc_string(MoConstants::SUPPORT_EMAIL,"attr").'"><b>'.mo_esc_string(MoConstants::SUPPORT_EMAIL,"attr").'</b></a>
                        '.mo_("or submit a support request using the Need Help button.").'<br/><br/>
                    **'.mo_("If you want to <b>use miniorange SMS/SMTP gateway</b>, and your country is not in list, mail us at").' <a href="mailto:'.mo_esc_string(MoConstants::SUPPORT_EMAIL,"attr").'">
                            <b>'.mo_esc_string(MoConstants::SUPPORT_EMAIL,"attr").'</b></a>
                            '.mo_esc_string(mo_("or submit a support request using the Need Help button."),"attr").'
                            '.mo_esc_string(mo_("We will get back to you promptly."),"attr").'<br><br>
                    ***<b>'.mo_esc_string(mo_("Custom integration charges"),"attr").'</b>'.mo_esc_string(mo_(" will be applied for supporting a registration form which is not already supported
                            by our plugin. Each request will be handled on a per case basis."),"attr").'<br>
                </span>
            </div>
        </div>
    </div>
     <div class="mo_registration_divided_layout mo-otp-full" id="otp_payment">
       <div class="mo_registration_pricing_layout mo-otp-center" id="otp_pay_method">
           <h3>'.mo_esc_string(mo_("Supported Payment Methods :"),"attr").'</h3><hr>
            <div class="mo-pricing-container">
           <div class="mo-card-pricing-deck">
           <div class="mo-card-pricing mo-animation">
                <div class="mo-card-pricing-header">
                <img  src="'.mo_esc_string(MOV_CARD,"attr").'"  style="size: landscape;width: 100px;
           height: 27px; margin-bottom: 4px;margin-top: 4px;opacity: 1;padding-left: 8px;">
                </div>
                <hr style=" margin-left: -26px; margin-right: -26px;border-top: 4px solid #fff;">
                <div class="mo-card-pricing-body">
                <p>If payment is made through Credit Card/Intenational debit card, the license will be created automatically once payment is completed.</p>
                <p><i><b>For guide <a href='.mo_esc_string(MoConstants::FAQ_PAY_URL,"attr").' target="blank">Click Here.</a></b></i></p>
                </div>
            </div>
          <div class="mo-card-pricing mo-animation">
                <div class="mo-card-pricing-header">
                <img  src="'.mo_esc_string(MOV_PAYPAL,"attr").'"  style="size: landscape;width: 100px;
           height: 27px; margin-bottom: 4px;margin-top: 4px;opacity: 1;padding-left: 8px;">
                </div>
                <hr style=" margin-left: -26px; margin-right: -26px;border-top: 4px solid #fff;">
                <div class="mo-card-pricing-body">
                <p>Use the following PayPal ID for payment via PayPal.</p><p><i><b style="color:#1261d8">'.mo_esc_string(MoConstants::SUPPORT_EMAIL,"attr").'</b></i></p>
                 <p style="margin-top: 35%;"><i><b>Note:</b> There is an additional 18% GST applicable via PayPal.</i></p>

                </div>
            </div>
          <div class="mo-card-pricing mo-animation">
                <div class="mo-card-pricing-header">
                <img  src="'.mo_esc_string(MOV_NETBANK,"attr").'"  style="size: landscape;width: 100px;
           height: 27px; margin-bottom: 4px;margin-top: 4px;opacity: 1;padding-left: 8px;">
                </div>
                <hr style=" margin-left: -26px; margin-right: -26px;border-top: 4px solid #fff;">
                <div class="mo-card-pricing-body">
                <p>If you want to use net banking for payment then contact us at <i><b style="color:#1261d8">'.mo_esc_string(MoConstants::SUPPORT_EMAIL,"attr").'</b></i> so that we can provide you bank details. </i></p>
                <p style="margin-top: 32%;"><i><b>Note:</b> There is an additional 18% GST applicable via Bank Transfer.</i></p>
                </div>
                </div>
              </div>
          </div>
             <div class="mo-supportnote">
                <p><b>Note :</b> Once you have paid through PayPal/Net Banking, please inform us so that we can confirm and update your License.</p>
                <p>For more information about payment methods visit <a href='.mo_esc_string(MoConstants::FAQ_PAY_URL,"attr").' target="blank">Supported Payment Methods.</a></p></p> 
                </div>
     </div>
 </div>
    <div class="mo_registration_divided_layout mo-otp-full">
        <div class="mo_registration_pricing_layout mo-otp-center">
            <h3>'.mo_esc_string(mo_("Return Policy (Please read the refund policy before upgrading to any plan)"),"attr").'</h3>
            <p>'.mo_("At miniOrange, we want to ensure you are 100% happy with your purchase.".
                    " You will only be able to receive the refund under all the following circumstances <ol><li>You have raised the request within 10 working days from the date of the purchase</li> <li> If the plugin or the features you have have purchased is not working as advertised on the website/ marketplace</li><li> You have attempted to resolve the issues with our support team</li><li> You have purchased the wrong license or Xecurify/miniOrange product.</li></ol>").'
            </p>
            <h3>'.mo_esc_string(mo_("What is not covered?"),"attr").'</h3>
            <p>
                <ol>
                    <li>'.mo_esc_string(mo_("The plugin or the software is not working due to customer environmental changes"),"attr").'</li>
                    <li>'.mo_esc_string(mo_("You no longer require the plugin after the purchase"),"attr").'</li>
                    <li>
                        '.mo_esc_string(mo_("You are not able to make any custom changes into the licensed plugin"),"attr").
                    '</li>
                    <li>
                        '.mo_esc_string(mo_("You have willingly purchased the plugin after taking the demo/trial from support team and if does not fit into your requirements"),"attr").
                    '</li>
                </ol>
                Please email us at <a href="mailto:'.mo_esc_string(MoConstants::SUPPORT_EMAIL,"attr").'">'.mo_esc_string(MoConstants::SUPPORT_EMAIL,"attr").'</a> for any queries regarding the return policy. If you have any doubts regarding the licensing plans, you can mail us at <a href="mailto:'.mo_esc_string(MoConstants::SUPPORT_EMAIL,"attr").'">'.mo_esc_string(MoConstants::SUPPORT_EMAIL,"attr").'</a> or submit a query using the support form.
            </p>
        </div>
    </div>

    <form style="display:none;" id="mocf_loginform" action="'.mo_esc_string($form_action,"url").'" target="_blank" method="post">
        <input type="email" name="username" value="'.mo_esc_string($email,"attr").'" />
        <input type="text" name="redirectUrl" value="'.mo_esc_string($redirect_url,"url").'" />
        <input type="text" name="requestOrigin" id="requestOrigin"  />
    </form>
    <form id="mo_ln_form" style="display:none;" action="" method="post">';

        wp_nonce_field($nonce);

    echo'<input type="hidden" name="option" value="check_mo_ln" />
    </form>
    <script>
    $mo = jQuery;
    $mo(document).ready(function () {
        var subPage = window.location.href.split("subpage=")[1];
            if(subPage !== "undefined")
            {
                if(subPage=="premaddons"){
                   mo_otp_show_addons()
                }
                //else if(subPage=="monthlyplan"){
                   //mo_otp_show_monthly_plan()
                //}
                
            }
        })
        function mo2f_upgradeform(planType){
            jQuery("#requestOrigin").val(planType);
            jQuery("#mocf_loginform").submit();
        }
        function mo_otp_show_plans(){
            $mo("#mo_otp_plans_pricing_table").show();
            $mo("#mo_otp_addons_pricing").hide();
            $mo("#mo_otp_show_monthly_plan").hide();
        }
        function mo_otp_show_addons(){
            $mo("#premium_addons").prop("checked",true);
            $mo("#mo_otp_addons_pricing").show();
            $mo("#mo_otp_plans_pricing_table").hide();
            $mo("#mo_otp_show_monthly_plan").hide();
        }
        function mo_otp_show_monthly_plan(){
            $mo("#monthly_plan").prop("checked",true);
            $mo("#mo_otp_addons_pricing").hide();
            $mo("#mo_otp_plans_pricing_table").hide();
            $mo("#mo_otp_show_monthly_plan").show();
        }
        function mo_get_montly_plan_data()
        {
            var monthly_sms = $mo("#mo_monthly_sms").val();
            var monthly_email = $mo("#mo_monthly_email").val();
            var monthly_country = $mo("#mo_country_code option:selected" ).text();
            var queryBody = "Hi! I am interested in the miniOrange monthly subscription module, My target country is monthly_country, Please provide a quote for monthly_sms SMS and monthly_email Emails per month.";
            var mapObj = {
               monthly_country:monthly_country,
               monthly_sms:monthly_sms,
               monthly_email:monthly_email
            };
            var queryReplaced = queryBody.replace(/monthly_country|monthly_sms|monthly_email/gi, function(matched){
              return mapObj[matched];
            });
            otpSupportOnClick(queryReplaced);
        }
    </script>';

?>