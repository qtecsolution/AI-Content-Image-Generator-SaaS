<?php
function getWebURL()
{
    $base_url = (isset($_SERVER['HTTPS']) &&
        $_SERVER['HTTPS'] != 'off') ? 'https://' : 'http://';
    $tmpURL = dirname(__FILE__);
    $tmpURL = str_replace(chr(92), '/', $tmpURL);
    $tmpURL = str_replace($_SERVER['DOCUMENT_ROOT'], '', $tmpURL);
    $tmpURL = ltrim($tmpURL, '/');
    $tmpURL = rtrim($tmpURL, '/');
    $tmpURL = str_replace('install', '', $tmpURL);
    $base_url .= $_SERVER['HTTP_HOST'] . '/' . $tmpURL;
    if (substr("$base_url", -1 == "/")) {
        $base_url = substr("$base_url", 0, -1);
    }
    return $base_url;
}
function readEnv($key){
    $ENVURL = './core/.env';
    $envFile = file_get_contents($ENVURL);
    $envVars = explode("\n", $envFile);
    foreach ($envVars as $envVar) {
        $envVar = explode('=', $envVar);
        if (count($envVar) == 2 && $envVar[0] === $key) {
            return $envVar[1];
        }
    }
    return "";
}
$root_url = getWebURL();
$installUrl = "/install";
if(readEnv("INSTALLED")!=1 && readEnv("INSTALLED")!='"1"'){
    //echo readEnv("INSTALLED");
    header('Location: '.$root_url.$installUrl);
    exit;
}