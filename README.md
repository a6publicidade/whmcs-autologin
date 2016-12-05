# Gofas WHMCS Autologin
Auto Login compatível com WHMCS7, escolha de destino após o login configurado diretamente na _merge tag_ do template de e-mail.
Ideal para redirecionar o cliente diretamente para o Boleto gerado pelo módulo [Gofas Gerencianet Boleto para WHMCS](https://github.com/gofas/whmcs-gerencianet-boleto/).

## Instalação
1) Ative a opção [_AutoAuth_](http://docs.whmcs.com/AutoAuth) do WHMCS adicionando a variável `$autoauthkey` com uma chave única ao arquivo configuration.php, localizado na raíz da instalação do WHMCS. Como no exemplo da [linha 15](https://github.com/gofas/whmcs-autologin/blob/master/configuration.php#L15) do nosso configuration.php, adicione uma senha única que será usada nos próximos passos, se a sua chave _autoauthkey_ for por exemplo 123456abcdef, a linha da variável `$autoauthkey` vai ficar assim:
>$autoauthkey = "123456abcdef";

2) Adicione a mesma chave `$autoauthkey` do arquivo `configuration.php` na [linha 11](https://github.com/gofas/whmcs-autologin/blob/master/auth.php#L11) do arquivo `auth.php`. Exemplo: Se a sua chave for `123456abcdef`, a linha 16 do arquivo `auth.php` vai ficar desta forma:
>$autoauthkey = "123456abcdef"; // chave igual à inserida no /configuration.php

3) Crie uma nova chave (diferente da atribuída à $autoauthkey) e atribua à variável `$secret_key` na [linha 12](https://github.com/gofas/whmcs-autologin/blob/master/auth.php#L12) do arquivo `auth.php`. Exemplo: Se a sua secret_key for `abcdef123456`, a linha 17 do `auth.php`vai ficar assim:
> $secret_key =  "abcdef123456"; // chave igual à inserida no /includes/hooks/gofas_hash_email.php

4) Adicione a mesma chave atribuída à `$secret_key` no arquivo auth.php (descrito no passo anterior) na [linha 21](https://github.com/gofas/whmcs-autologin/blob/master/includes/hooks/gofas_hash_email.php#L21) do arquivo `/includes/hooks/gofas_hash_email.php`. Exemplo: Se a sua `secret_key` é `abcdef123456`, a linha 21 do arquivo gofas_hash_email.php vai ficar assim:
> 	$secret_key = `'abcdef123456'`; // chave igual à inserida no /auth.php

5) Após concluir esses passos, ao adicionar a tag dinâmica `{hash}` a um template de email, ela será substituída por uma senha que será utilizada para identificar o usuário e conceder acesso à área do cliente do WHMCS após o login. Para gerar os URLs com o `hash`, adicione as tags seguindo a lógica dos exemplos a seguir:

URL dinâmico para colar no template de email "Invoice Created" que leva o usuário para a visualização da fatura após o login:
> {$whmcs_url}auth.php?email={$client_email}&uid={$client_id}&uname={$client_first_name}{$client_last_name}&hash={$hash}&whmcsurl={$whmcs_url}&goto=viewinvoice.php?id={$invoice_id}

URL dinâmico que leva o usuário para a edição do perfil após o login:
> {$whmcs_url}auth.php?email={$client_email}&uid={$client_id}&uname={$client_first_name}{$client_last_name}&hash={$hash}&whmcsurl={$whmcs_url}&goto=clientarea.php?action=details

Exemplo de URL para que leva o usuário para a visualização de um ticket respondido após o login:
> {$whmcs_url}auth.php?email={$client_email}&uid={$client_id}&uname={$client_first_name}{$client_last_name}&hash={$hash}&whmcsurl={$whmcs_url}&goto={$ticket_link}

&copy;2016 [Gofas](https://gofas.net)
