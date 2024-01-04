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

    public static function getFileExtension($format)
    {
        switch ($format) {
            case self::Pdf:
                return 'pdf';

            case self::Xps:
                return 'xps';

            case self::Text:
                return 'txt';

            case self::Excel2007:
                return 'xlsx';

            case self::Word2007:
                return 'docx';

            case self::Csv:
                return 'csv';

            case self::ImageSvg:
                return 'svg';

            case self::Html:
            case self::Html5:
                return 'html';

            case self::Ods:
                return 'ods';

            case self::Odt:
                return 'odt';

            case self::Ppt2007:
                return 'pptx';

            case self::Document:
                return 'mdc';
        }

        return strtolower($format);
    }

    public static function getMimeType($format)
    {
        switch ($format) {
            case self::Pdf:
                return 'application/pdf';

            case self::Xps:
                return 'application/vnd.ms-xpsdocument';

            case self::Text:
                return 'text/plain';

            case self::Excel2007:
                return 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';

            case self::Word2007:
                return 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';

            case self::Csv:
                return 'text/csv';

            case self::ImageSvg:
                return 'image/svg+xml';

            case self::Html:
            case self::Html5:
                return 'text/html';

            case self::Ods:
                return 'application/vnd.oasis.opendocument.spreadsheet';

            case self::Odt:
                return 'application/vnd.oasis.opendocument.text';

            case self::Ppt2007:
                return 'application/vnd.ms-powerpoint';

            case self::Document:
                return 'text/xml';
        }

        return 'text/plain';
    }

    public static function getFormatName($format)
    {
        $class = new \ReflectionClass('\Stimulsoft\StiExportFormat');
        $constants = $class->getConstants();
        $names = array_flip($constants);

        return $names[$format];
    }
}
