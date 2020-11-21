<?php
/**
 * Created by : PhpStorm
 * User: tyd
 * Date: 2020/11/21
 * Time: 10:59 上午
 */

namespace WanJing\Ys7\AbstractInterface;


interface AccessTokenInterface
{
    public function getToken($refreshTimes = 1): ?string;

    public function refresh(): ?string;
}
