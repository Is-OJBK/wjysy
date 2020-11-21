<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018-12-29
 * Time: 22:32
 */

namespace WanJing\Ys7\Utility;

use EasySwoole\HttpClient\HttpClient;

/**
 * 协程客户端封装
 * Class HttpClient
 * @package EasySwoole\WeChat\Utility
 */
class NetWork
{
    /*
     * 一个应用内，基本没有必要实现不同的APP_ID 超时不同
     */
    static $TIMEOUT = 15;

    static function postJson(string $url, array $data)
    {
        $client = new HttpClient($url);

        $client->setTimeout(self::$TIMEOUT);

        return $client->post($data)->json(true);
    }
}
