<?php
/**
 * Created by : PhpStorm
 * User: tyd
 * Date: 2020/11/21
 * Time: 10:17 上午
 */

namespace WanJing\Ys7;


use WanJing\Ys7\AbstractInterface\StorageInterface;
use WanJing\Ys7\Utility\FileStorage;
use EasySwoole\Spl\SplBean;

/**
 * 全局配置
 * Class Config
 * @package WanJing\Ys7
 */
class Config extends SplBean
{
    protected $appKey;

    protected $secret;

    protected $tempDir;

    protected $storage;

    public function setAppKey($appKey): Config
    {
        $this->appKey = $appKey;
        return $this;
    }

    public function getAppKey()
    {
        return $this->appKey;
    }

    public function setSecret($secret): Config
    {
        $this->secret = $secret;
        return $this;
    }

    public function getSecret()
    {
        return $this->secret;
    }

    public function setTempDir($tempDir): Config
    {
        $this->tempDir = $tempDir;
        return $this;
    }

    public function getTempDir()
    {
        if (empty($this->tempDir)) {
            $this->tempDir = sys_get_temp_dir();
        }
        return $this->tempDir;
    }

    /**
     * 获取储存器
     *
     * @return mixed
     */
    public function getStorage(): StorageInterface
    {
        if (!isset($this->storage)) {
            $this->storage = new FileStorage($this->getTempDir(), $this->getAppKey());
        }
        return $this->storage;
    }


    public function setStorage($storage): Config
    {
        $this->storage = $storage;
        return $this;
    }
}
