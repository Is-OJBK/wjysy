<?php
/**
 * Created by : PhpStorm
 * User: tyd
 * Date: 2020/11/21
 * Time: 10:32 上午
 */

namespace WanJing\Ys7\Client\Device;

use WanJing\Ys7\Bean\Device\Add;
use WanJing\Ys7\Exception\Exception;
use WanJing\Ys7\Utility\NetWork;
use WanJing\Ys7\Ys7;

class Device
{
    private $ys7;

    public function __construct(Ys7 $ys7)
    {
        $this->ys7 = $ys7;
    }

    public function add($deviceSerial, $validateCode): Add
    {
        $url = ApiUrl::ADD;
        $response = NetWork::postJson($url, [
            'accessToken' => $this->ys7->accessToken()->getToken(),
            'deviceSerial' => $deviceSerial,
            'validateCode' => $validateCode
        ]);
        $ex = Exception::hasException($response);
        if ($ex) {
            throw $ex;
        }
        return new Add($response);
    }
}
