<?php

namespace App\Http\Controllers;

use App\Http\Responses\AjaxResponse;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    protected function renderJson($status, $msg, $navTabId = null, $forwardUrl = null, $callbackType = '')
    {
        return response()->json(new AjaxResponse($status, $msg, $navTabId, $forwardUrl, $callbackType));
    }

    public function ajaxForwardSuccess($navTabId = null, $forwardUrl = null, $msg = '操作成功', $callbackType = AjaxResponse::CALLBACK_TYPE_CLOSE_CURRENT)
    {
        return $this->renderJson(AjaxResponse::STATUS_SUCCESS, $msg, $navTabId, $forwardUrl, $callbackType);
    }

    public function ajaxForwardDialogSuccess($navTabId = null, $forwardUrl = null, $msg = '操作成功')
    {
        return $this->renderJson(AjaxResponse::STATUS_SUCCESS, $msg, $navTabId, $forwardUrl, AjaxResponse::CALLBACK_TYPE_CLOSE_CURRENT);
    }

    public function ajaxForwardNavtabSuccess($navTabId = null, $forwardUrl = null, $msg = '操作成功')
    {
        return $this->renderJson(AjaxResponse::STATUS_SUCCESS, $msg, $navTabId, $forwardUrl, '');
    }

    public function ajaxForwardSessionOut($msg = '会话已过期，请重新登录')
    {
        $jo = $this->renderJson(AjaxResponse::STATUS_SESSION_OUT_STATUS_CODE, $msg);
        echo $jo->serialize();
        exit;
    }

    public function ajaxForwardError($msg)
    {
        return $this->renderJson(AjaxResponse::STATUS_ERROR, $msg);
    }
}
