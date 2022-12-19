<?php

$currentDate 	= date('Y-m-d H:i');
$time           = (int)$currentDate - (60*60);
$fromDate       =  date('Y-m-d H:i',strtotime("-1 days"));
$disabled = !file_exists(MOV_DIR."helper/MoReporting.php")? "disabled":"";
$showNotice = !file_exists(MOV_DIR."helper/MoReporting.php")? "true":"";

include MOV_DIR . 'views/moreport.php';