<?php

namespace Stimulsoft;

class StiResult
{
    public $handlerVersion;
    public $adapterVersion;
    public $checkVersion = true;

    public $success = false;
    public $notice;
    public $object;
    public $variables;
    public $report;

    public static function success($notice = null, $object = null)
    {
        $result = new self();
        $result->success = true;
        $result->notice = $notice;
        $result->object = $object;

        return $result;
    }

    public static function error($notice = null)
    {
        $result = new self();
        $result->success = false;
        $result->notice = $notice;

        return $result;
    }
}
