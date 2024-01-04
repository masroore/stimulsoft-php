<?php

namespace Stimulsoft\Viewer;

enum StiPrintDestination: string
{
    case DefaultValue = 'Stimulsoft.Viewer.StiPrintDestination.Default';
    case Pdf = 'Stimulsoft.Viewer.StiPrintDestination.Pdf';
    case WithPreview = 'Stimulsoft.Viewer.StiPrintDestination.WithPreview';
    case Direct = 'Stimulsoft.Viewer.StiPrintDestination.Direct';
}
