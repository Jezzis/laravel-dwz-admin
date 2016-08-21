<?php

namespace App\Http\Responses;

class AjaxResponse extends \ArrayObject
{
    const STATUS_SUCCESS = 200; // 操作成功

    const STATUS_ERROR = 300; // 操作失败

    const STATUS_SESSION_OUT_STATUS_CODE = 301; // 回话超时

    const CALLBACK_TYPE_FORWARD = 'forward';

    const CALLBACK_TYPE_CLOSE_CURRENT = 'closeCurrent';

    public function __construct($statusCode, $message, $navTabId = "", $forwardUrl = '', $callbackType = '') {
        $arr = array(
            'statusCode' => $statusCode,
            'message' => $message,
            'navTabId' => $navTabId,
            'forwardUrl' => $forwardUrl,
            'callbackType' => $forwardUrl ? self::CALLBACK_TYPE_FORWARD : $callbackType,
        );
        parent::__construct($arr);
    }
}