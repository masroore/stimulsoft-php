<?php

namespace Stimulsoft;

enum StiPrintAction: string
{
    case PrintPdf = 'PrintPdf';
    case PrintWithPreview = 'PrintWithPreview';
    case PrintWithoutPreview = 'PrintWithoutPreview';

}
