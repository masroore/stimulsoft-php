<?php

namespace Stimulsoft;

class StiDataResult extends StiResult
{
    public $types;
    public $columns;
    public $rows;
    public $count;

    public static function success($notice = null, $object = null)
    {
        $result = new self();
        $result->success = true;
        $result->notice = $notice;
        $result->object = $object;

        $result->types = [];
        $result->columns = [];
        $result->rows = [];

        return $result;
    }
}
