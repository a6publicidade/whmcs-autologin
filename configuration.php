<?php
/**
 * Exemplo de configuração do WHMCS para exemplificar a inserção da variável $autoauthkey
 */
$license = 'Leased-xxxxxxxxxxxxxxxxxxxx';
$db_host = 'db.host.com';
$db_port = '1234';
$db_username = 'nomedeusuariododb';
$db_password = 'senhadodb';
$db_name = 'nomedodb';
$cc_encryption_hash = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
$templates_compiledir = 'templates_c';
$mysql_charset = 'utf8';
date_default_timezone_set('America/Sao_Paulo');
$autoauthkey = "xxxxx_autoauthkey_xxxxx"; // chave igual à inserida no /auth.php
?>
