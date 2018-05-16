<?php
/**
 * Created by PhpStorm.
 * User: yukai
 * Date: 2018/3/30
 * Time: 14:52
 */

function dump($data)
{
    echo "<pre>";
        var_dump($data);
    echo "</pre>";
    die();
}

function dd($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    exit;
}

function returnJsonInfo($message,$statusCode = 200) {
    $data = [
        'message' => $message,
        'statusCode' => $statusCode
    ];
    echo json_encode($data);
    die();
}