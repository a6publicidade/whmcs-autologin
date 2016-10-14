<?php
/**
 * Auto Login Hash Merge Tag Email Template
 * @author     Mauricio Gofas | gofas.net
 * @copyright  Copyright (c) 2016 https://gofas.net
 */
 
 // Modelo de URL para colar no template de email:
// {$whmcs_url}auth.php?email={$client_email}&uid={$client_id}&uname={$client_first_name} {$client_last_name}&hash={$hash}&whmcsurl={$whmcs_url}&goto=viewinvoice.php?id={$invoice_id}

$whmcsurl = $_GET["whmcsurl"].'dologin.php';
$autoauthkey = "xxxxxxxxxxxxxxxxxxxxx_autoauthkey_xxxxxxxxxxxxxxxxxxxxx"; // chave no /configuration.php
$secret_key =  "xxxxxxxxxxxxxxxxxxxxx_secret_key_xxxxxxxxxxxxxxxxxxxxx"; // chave no /includes/hooks/gofas_hash_email.php

if (md5($_GET['email'].$_GET['uid'].$_GET['uname'].$secret_key) != $_GET['hash']){
die();
} 
$email	= $_GET['email'];
$timestamp = time();
$goto      = $_GET["goto"];
$hash      = sha1($email.$timestamp.$autoauthkey);
$url       = $whmcsurl."?email=$email&timestamp=$timestamp&hash=$hash&goto=".urlencode($goto);
header("Location: $url");
exit;
?>