<?php
/**
 * Auto Login Hash for Email Template
 * @author     Mauricio Gofas | gofas.net
 * @copyright  Copyright (c) 2016 Gofas.net
 */
if (!defined("WHMCS")) die("This file cannot be accessed directly");
function gofas_hash_email_template($vars) {
    $merge_fields = array();
	$merge_fields['hash'] = md5('xxxxxxxxxxxxxxxxxxxxx_secret_key_xxxxxxxxxxxxxxxxxxxxx'); // chave igual à inserida no /auth.php
	return $merge_fields;
}
add_hook("EmailPreSend",1,"gofas_hash_email_template");
?>