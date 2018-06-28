<?php

$URL = $argv[1] ?? null;
$Data = isset($argv[2]) ? json_decode(base64_decode($argv[2]), true) : false;
if (!$URL) die();

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, $Data);
curl_setopt($ch, CURLOPT_TIMEOUT_MS, 600000);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$data['output'] = curl_exec($ch);
//$data['info'] = curl_getinfo($ch);
//$data['error'] = curl_error($ch);
//$data['nerror'] = curl_errno($ch);
$data['data'] = $Data;
$data['argv'] = $argv[2];
curl_close($ch);
echo json_encode($data);