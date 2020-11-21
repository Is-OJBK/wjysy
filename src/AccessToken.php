<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018/12/25
 * Time: 12:09 AM
 */

namespace WanJing\Ys7;


use WanJing\Ys7\AbstractInterface\AccessTokenInterface;
use WanJing\Ys7\Utility\NetWork;


class AccessToken extends Ys7Base implements AccessTokenInterface
{
    /**
     * getToken
     * 自带版本不刷新
     */
    function getToken($refreshTimes = 1): ?string
    {
        return $this->getYs7()->getConfig()->getStorage()->get('accessToken');
    }

    /**
     * @return string|null
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function refresh(): ?string
    {
        $config = $this->getYs7()->getConfig();

        $url = 'https://open.ys7.com/api/lapp/token/get';

        $json = NetWork::postJson($url, [
            'appKey' => $config->getAppKey(),
            'appSecret' => $config->getSecret()
        ]);
        //todo
//        $ex = OfficialAccountError::hasException($json);
//        if ($ex) {
//            throw $ex;
//        }
        $token = $json['data']['accessToken'];

        $config->getStorage()->set('accessToken', $token, time() + (86400 * 2));
        return $token;
    }
}
