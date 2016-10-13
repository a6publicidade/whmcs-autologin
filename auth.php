<?php
/**
 * Auto login auth for WHMCS
 * @author     Mauricio Gofas | gofas.net
 * @copyright  Copyright (c) 2016 Gofas.net
 *
 * Exemplo de URL para colar no template de email "Invoice Created" que leva o usuário para a visualização da fatura após o login:
 * {$whmcs_url}auth.php?email={$client_email}&hash={$hash}&whmcsurl={$whmcs_url}&goto=viewinvoice.php?id={$invoice_id}
 * 
 * Exemplo de URL para que leva o usuário para a visualização de um ticket respondido após o login:
 * {$whmcs_url}auth.php?email={$client_email}&hash={$hash}&whmcsurl={$whmcs_url}&goto={$ticket_link}
 *
 * Para endpoints personalizados altere o valor do parâmetro "goto", mais exemplos.: goto=&goto=viewinvoice.php?id={$invoice_id} | goto={$ticket_link} | goto={$whmcs_link}
 */
$whmcsurl = $_GET["whmcsurl"].'dologin.php';
$autoauthkey = "xxxxxxxxxxxxxxxxxxxxx_autoauthkey_xxxxxxxxxxxxxxxxxxxxx"; // chave igual à inserida no /configuration.php
$secret_key =  "xxxxxxxxxxxxxxxxxxxxx_secret_key_xxxxxxxxxxxxxxxxxxxxx"; // chave igual à inserida no /includes/hooks/gofas_hash_email.php
if (md5($secret_key) != $_GET["hash"]){
die('Erro :(');
}
$timestamp = time();
$email = $_GET["email"];
$goto = $_GET["goto"];
$hash = sha1($email.$timestamp.$autoauthkey);
$url = $whmcsurl."?email=$email&timestamp=$timestamp&hash=$hash&goto=".urlencode($goto);
header("Location: $url");
exit;
?>