<?php
/**
 * Created by : PhpStorm
 * User: tyd
 * Date: 2020/11/21
 * Time: 10:51 上午
 */

namespace WanJing\Ys7\Bean\Device;


use EasySwoole\Spl\SplBean;

class Add extends SplBean
{
    protected $code;

    protected $msg;

    public function setMsg($msg)
    {
        return $this->msg;
    }

    public function getMsg($msg)
    {
        return $this->msg;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function getCode()
    {
        return $this->code;
    }
}
