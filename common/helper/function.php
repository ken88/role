<?php
/**
 * Created by PhpStorm.
 * User: yukai
 * Date: 2018/3/30
 * Time: 14:52
 */
use moonland\phpexcel\Excel;
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

/**
 * @param $message string 输出信息
 * @param int $statusCode
 */
function returnJsonInfo($message,$statusCode = 200) {
    $data = [
        'message' => $message,
        'statusCode' => $statusCode
    ];
    echo json_encode($data);
    die();
}

/**
 * 检测exce文件 是否符合规则
 * @param array $excelName 所要验证的内容
 * @param array $file  上传的文件
 * @return bool
 */
function is_check_file_data($file)
{
    $fileName = $_FILES["file"]["name"];
    $type     = strstr($fileName, '.');  // 文件后缀

    if ($type != ".xls" && $type != ".xlsx") {
        return 'no';
    }

    $filePath = $file['file']['tmp_name']; // 要读取的文件的路径

    //导出excel内容
    $excel = Excel::import($filePath, [
        'setFirstRecordAsKeys' => false,
    ]);

    //更改下标从0开始
    return array_values($excel);

}