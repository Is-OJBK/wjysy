<?php
/**
 * Created by : PhpStorm
 * User: tyd
 * Date: 2020/11/21
 * Time: 10:32 上午
 */

namespace WanJing\Ys7\Client\Live;

use WanJing\Ys7\Exception\Exception;
use WanJing\Ys7\Utility\NetWork;
use WanJing\Ys7\Ys7;

class Live
{
    private $ys7;

    public function __construct(Ys7 $ys7)
    {
        $this->ys7 = $ys7;
    }

    public function videoList($pageStart, $pageSize)
    {
        $url = ApiUrl::VIDEO_LIST;
        $response = NetWork::postJson($url, [
            'accessToken' => $this->ys7->accessToken()->getToken(),
            'pageStart' => $pageStart,
            'pageSize' => $pageSize
        ]);
        $ex = Exception::hasException($response);
        if ($ex) {
            throw $ex;
        }
        return $response;
    }
}
