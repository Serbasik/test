<?php

namespace app\modules\v1\controllers;

use app\models\Links;
use yii\rest\ActiveController;

/**
 * Country Controller API
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class LinkController extends ActiveController
{
    public $modelClass = 'app\models\Links';


    public function actionGeturl()
    {
        $requestParams = \Yii::$app->getRequest()->post();
        $is_uid = Links::find()->where(['short_link' => $requestParams['url']])->one();
        if ($is_uid)
        {
            $is_uid->count = $is_uid->count + 1;
            $is_uid->save();
            return
                [
                    'link' => $is_uid->real_link,
                    'count' => $is_uid->count
                ];

        }
        if (!$is_uid)
            return 'No links';



    }
    public function actionCreat(){
        $requestParams = \Yii::$app->getRequest()->post();
        $url = parse_url($requestParams['url']);
        $uid = \Yii::$app->security->generateRandomString(6);
        $is_uid = Links::find()->where(['short_link' => $uid])->one();
        if (!$is_uid)
        {
            $link = new Links();
            $link->real_link = $requestParams['url'];
            $link->short_link = $uid;
            $link->save();
        }
        else
        {
           $uid = $is_uid->short_link;
        }

        return $url['scheme'] . '://' . $url['host'] . '/' . $uid;
    }

}


