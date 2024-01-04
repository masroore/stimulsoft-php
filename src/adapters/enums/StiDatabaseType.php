<?php

namespace Stimulsoft;

class StiDatabaseType
{
    public const MySQL = 'MySQL';
    public const MSSQL = 'MS SQL';
    public const PostgreSQL = 'PostgreSQL';
    public const Firebird = 'Firebird';
    public const Oracle = 'Oracle';
    public const ODBC = 'ODBC';
    public const MongoDB = 'MongoDB';

    public static function getTypes()
    {
        $reflectionClass = new \ReflectionClass('\Stimulsoft\StiDatabaseType');
        $databases = $reflectionClass->getConstants();

        return array_values($databases);
    }
}
