<?php

if (isset($_GET["churchid"])){
    $loginurl = 'http://api.blserver.nl/login.js?a='. $_GET["churchid"] .'&s=&g=&v=3.24';
    $logindata = json_decode(file_get_contents($loginurl));
    $apiurl = "http://". $logindata->host ."/data-". $logindata->w .".js";
    $apidata = json_decode(file_get_contents($apiurl));
    $url = "http://". $apidata->live[0]->host ."/". $apidata->live[0]->tag ."?w=". $logindata->w;
    header("Location: ". $url);
}
else {
    header("Location: http://assets.kerkdienstgemist.nl/static/messages/no_broadcast.mp3/");
}

