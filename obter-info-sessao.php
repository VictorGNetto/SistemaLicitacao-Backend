<?php

$hash_sessao = $_GET["sessaoID"];   // Sessão
$hash_sistema = "bc1b07991f7a49331bf9c45b5baa3ec4";  // Sistema
$ip = "10.232.94.64";

// if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
//     $ip = $_SERVER['HTTP_CLIENT_IP'];
// } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
//     $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
// } else {
//     $ip = $_SERVER['REMOTE_ADDR'];
// }

$url = 'http://10.6.56.199/portal/servicos/serverbyserver/get-usuario-sessao.php';
$data = array('sisID' => $hash_sistema, 'hash' => $hash_sessao, 'ip' => $ip);

$fields_string = http_build_query($data);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
$dados = json_decode($result, true)["dados"][0];

echo json_encode(["infoSessao" => $dados]);