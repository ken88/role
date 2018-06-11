<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/17
 * Time: 14:16
 */

namespace backend\models;


use common\models\User;
use yii\data\Pagination;
use Yii;

class UserLogic extends  BaseLogic
{
    public static function getUserInfo($session)
    {

        $userSql = User::find()->where("path like '{$session['path']}%'");

        // 总数
        $count = $userSql->count();

        // 使用总数来创建一个分页对象
        $pagination = new Pagination(['totalCount' => $count,'pageSize'=> 20]);
        $info = $userSql->offset($pagination->offset)
            ->limit($pagination->limit)
            ->asArray()
            ->all();
        $data = [
            'info'=> $info,
            'pages' => $pagination,
        ];
        return $data;
    }

    /**
     * @param $info  array 录入信息
     * @param $level Internet 级别
     * @return bool 返回信息
     */
    public static function add($info,$level)
    {
        $session = self::getSession();
        $arrRole = explode(',',$info['role']);
        $user = new User();
        $user->username = $info['username'];
        $user->password = md5(123456);
        $user->departmentId = $info['departmentId'];
        $user->departmentName = $info['departmentName'];
        $user->realName = $info['realName'];
        $user->createDate = date('Y-m-d H:i:s');
        $user->level = $level - 1;
        $user->roleId = $arrRole[0];
        $user->roleName = $arrRole[1];
        $user->path = $session['path'];
        $tr  = Yii::$app->db->beginTransaction();
        $redis = Yii::$app->redis;
        try {
            if ($user->save()) {
                $id = $user->id;
                $user->path = $user->path.'-'.$id;
                if ($user->save()) {
                    $user = User::find()->where(['id'=>$id])->asArray()->one();
                    if($redis->set($user['realName'],json_encode($user))) {
                        $tr->commit();
                        return true;
                    }else {
                        $tr->rollBack();
                        return false;
                    }
                } else {
                    $tr->rollBack();
                    return false;
                }
            }else {
                $tr->rollBack();
                return false;
            }
        } catch (\Exception $e) {
            $tr->rollBack();
            return false;
        }

    }
}