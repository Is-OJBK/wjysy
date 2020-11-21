<?php
/**
 * Created by : PhpStorm
 * User: tyd
 * Date: 2020/11/21
 * Time: 10:47 上午
 */

namespace WanJing\Ys7\AbstractInterface;


interface StorageInterface
{
    public function __construct(string $tempDir,$appId);
    public function get($key);
    public function set($key,$value,int $expire = null);
}
