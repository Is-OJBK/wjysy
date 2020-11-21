<?php
/**
 * Created by : PhpStorm
 * User: tyd
 * Date: 2020/11/21
 * Time: 10:23 上午
 */

namespace WanJing\Ys7;


use WanJing\Ys7\AbstractInterface\AccessTokenInterface;
use WanJing\Ys7\Client\Device\Device;
use WanJing\Ys7\Client\Live\Live;

class Ys7
{
    private $config;

    private $accessToken;

    private $device;

    private $live;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function getConfig(): Config
    {
        return $this->config;
    }

    public function accessToken(): AccessTokenInterface
    {
        if (!isset($this->accessToken)) {
            $this->accessToken = new AccessToken($this);
            $this->accessToken->refresh();
        }
        return $this->accessToken;
    }

    public function getDevice(): Device
    {
        if (is_null($this->device)) {
            $this->device = new Device($this);
        }
        return $this->device;
    }

    public function getLive(): Live
    {
        if (is_null($this->live)) {
            $this->live = new Live($this);
        }
        return $this->live;
    }
}
