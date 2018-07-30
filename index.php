<?php
    require_once './vendor/autoload.php';

    use Firebase\JWT\JWT;

    $currentTime = time();
    $limitTime = $currentTime + 3600;
    $privateKey = 'XAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9';

    $tokenContent = array(
        'iat' => $currentTime, // Tiempo que inició el token
        'exp' => $limitTime, // Tiempo que expirará el token (+1 hora)
        'userData' => [ // información del usuario
            'id' => 985,
            'login' => 'FELIPE1980',
            'email' => 'felipe1980@felipe1980.com',
            'role' => 'ROLE_USER'
        ]
    );

    $tokenJWT = JWT::encode($tokenContent, $privateKey);

    $dataObject = JWT::decode($tokenJWT, $privateKey, array('HS256', 'HS384', 'HS512', 'RS256', 'RS384', 'RS512'));

    echo 'El token codificado:';
    echo '<pre>';
    var_dump ($tokenJWT);
    echo '</pre><br>';
    echo 'El objeto descodificado a partir del token:';
    echo '<pre>';
    var_dump ($dataObject);
    echo '</pre><br>';

    $dataArray = json_decode(json_encode($dataObject), true);
    echo 'La matriz "natural":';
    echo '<pre>';
    var_dump ($dataArray);
    echo '</pre>';

