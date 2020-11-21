<?php
/**
 * Created by : PhpStorm
 * User: tyd
 * Date: 2020/11/21
 * Time: 11:02 上午
 */

namespace WanJing\Ys7;


class Ys7Base
{
    private $ys7;

    function __construct(Ys7 $ys7)
    {
        $this->ys7 = $ys7;
    }

    protected function getYs7(): Ys7
    {
        return $this->ys7;
    }

//    /**
//     * @param array $response
//     * @return mixed
//     * @throws OfficialAccountError
//     */
//    protected function hasException(array $response)
//    {
//        $ex = OfficialAccountError::hasException($response);
//        if ($ex) {
//            throw $ex;
//        }
//        return $response;
//    }
}
