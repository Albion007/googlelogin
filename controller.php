<?php
require_once('core/controller.Class.php');
require_once('config.php');
if(isset($_GET["code"])){
    $token = $gClient->fetchAccessTokenWithAuthCode($_GET["code"]);
}else{
    header('Location: login.php');
    exit();
}

if (isset($token["error"]) != "invalid_grant") {
    $oAuth = new Google_Service_Oauth2($gClient);
    $userData = $oAuth->userinfo_v2_me->get();

    //insert data
    $Controller = new Controller;
    echo $Controller->insertData(array(
            'email' => $userData['email'],
            'avatar' => $userData['picture'],
            'familyName' => $userData['familyName'],
            'givenName' => $userData['givenName']
        ));

}else{
    header('Location: index.php');
    exit();
}
?>