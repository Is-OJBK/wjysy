<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018-12-29
 * Time: 22:50
 */

namespace WanJing\Ys7\Exception;


class Exception extends \Exception
{
    private $errorCode;

    /**
     * @return mixed
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @param mixed $errorCode
     */
    public function setErrorCode($errorCode): void
    {
        $this->errorCode = $errorCode;
    }

    public static function hasException(array $jsonData): ?Exception
    {
        if (isset($jsonData['code']) && $jsonData['code'] != 200) {
            $ex = new Exception($jsonData['msg']);
            $ex->setErrorCode($jsonData['code']);
            return $ex;
        }
        return null;
    }
}
