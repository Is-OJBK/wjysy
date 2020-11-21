# Swoole环境下 萤石开放平台SDK

[![Packagist Version](https://img.shields.io/packagist/v/wanjing/ys7)](https://packagist.org/packages/wanjing/ys7)

## 安装
    composer require wanjing/ys7
## 快速开始
    $ysConfig = new \WanJing\Ys7\Config();
    $ysConfig->setTempDir(Config::getInstance()->getConf('TEMP_DIR'));
    $ysConfig->setAppKey('你的APPKEY');
    $ysConfig->setSecret('你的SECRET');
    $ys7 = new \WanJing\Ys7\Ys7($ysConfig);
    $ys7->getDevice()->add('123', '123');
    //定时刷新accessToken
    $register->add(EventRegister::onWorkerStart, function (\swoole_server $server, $workerId) use ($ys7) {
        if ($workerId == 0) {
            \EasySwoole\Component\Timer::getInstance()->loop(86400 * 1000, function () use ($ys7) {
                $ys7->accessToken()->refresh();
            });
        }
    });
    


