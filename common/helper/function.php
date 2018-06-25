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

    if ($type != ".xls" && $type != ".xlsx" ) {
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

/**
 * 数据导出excel
 * @param string $title excel 标题
 * @param array $columns 列对应的字段名称 ['id' => 'ID']
 * @param array $data 需要导出的数据
 */
function arrayExcel($title, $columns, $data)
{

        $intCount = count($data);
        ob_end_clean();
        ob_start();

        $objPHPExcel = new \PHPExcel();
        if ($intCount > 3000) {
            ini_set('memory_limit', '1024M');
            $cacheMethod = \PHPExcel_CachedObjectStorageFactory:: cache_to_phpTemp;
            $cacheSettings = array('memoryCacheSize' => '8MB');
            \PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);
        }

        // 获取显示列的信息
        $intLength = count($columns);
        $arrLetter = range('A', 'Z');
        $arrLetter = array_slice($arrLetter, 0, $intLength);
        $keys = array_keys($columns);
        $values = array_values($columns);

        // 确定第一行信息
        foreach ($arrLetter as $key => $value) {
            $objPHPExcel->getActiveSheet()->setCellValue($value . '1', $values[$key]);
        }

        // 写入数据信息
        $intNum = 2;
        foreach ($data as $k => $v) {
            foreach ($arrLetter as $key => $val) {
                $tmpAttribute = $keys[$key];
                $objPHPExcel->getActiveSheet()->setCellValue($val . $intNum, $v[$tmpAttribute]);
            }

            $intNum++;
        }

        // 设置sheet 标题信息
        $objPHPExcel->getActiveSheet()->setTitle($title);
        $objPHPExcel->setActiveSheetIndex(0);

        // 设置头信息
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $title . '.xls"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');           // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');  // always modified
        header('Cache-Control: cache, must-revalidate');            // HTTP/1.1
        header('Pragma: public');                                   // HTTP/1.0

        // 直接输出文件
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');

    Yii::$app->end();
}

/**
 * 递归：生成目录
 */
function createDir($str)
{
    $arr = explode('/', $str);
    if(!empty($arr))
    {
        $path = '';
        foreach($arr as $k=>$v)
        {
            $path .= $v.'/';
            if (!file_exists($path)) {
                mkdir($path, 0777);
                chmod($path, 0777);
            }
        }
    }
}

