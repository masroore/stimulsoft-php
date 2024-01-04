<?php

namespace Stimulsoft;

class StiExportFormat
{
    public const Pdf = 1;

    public const Xps = 2;

    public const Text = 11;

    public const Excel2007 = 14;

    public const Word2007 = 15;

    public const Csv = 17;

    public const ImageSvg = 28;

    public const Html = 32;

    public const Ods = 33;

    public const Odt = 34;

    public const Ppt2007 = 35;

    public const Html5 = 36;

    public const Document = 1000;

    public static function getFileExtension(int $format): string
    {
        return match ($format) {
            self::Pdf => 'pdf',
            self::Xps => 'xps',
            self::Text => 'txt',
            self::Excel2007 => 'xlsx',
            self::Word2007 => 'docx',
            self::Csv => 'csv',
            self::ImageSvg => 'svg',
            self::Html, self::Html5 => 'html',
            self::Ods => 'ods',
            self::Odt => 'odt',
            self::Ppt2007 => 'pptx',
            self::Document => 'mdc',
            default => strtolower($format),
        };
    }

    public static function getMimeType(int $format): string
    {
        return match ($format) {
            self::Pdf => 'application/pdf',
            self::Xps => 'application/vnd.ms-xpsdocument',
            self::Text => 'text/plain',
            self::Excel2007 => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            self::Word2007 => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            self::Csv => 'text/csv',
            self::ImageSvg => 'image/svg+xml',
            self::Html, self::Html5 => 'text/html',
            self::Ods => 'application/vnd.oasis.opendocument.spreadsheet',
            self::Odt => 'application/vnd.oasis.opendocument.text',
            self::Ppt2007 => 'application/vnd.ms-powerpoint',
            self::Document => 'text/xml',
            default => 'text/plain',
        };
    }

    public static function getFormatName(int $format): string
    {
        $class = new \ReflectionClass(StiExportFormat::class);
        $constants = $class->getConstants();
        $names = array_flip($constants);

        return $names[$format];
    }
}
