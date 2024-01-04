<?php

namespace Stimulsoft\Viewer;

enum StiHtmlExportMode: string
{
    case Div = 'Stimulsoft.Report.Export.StiHtmlExportMode.Div';
    case Table = 'Stimulsoft.Report.Export.StiHtmlExportMode.Table';
    case FromReport = 'Stimulsoft.Report.Export.StiHtmlExportMode.FromReport';
    case Span = 'Stimulsoft.Report.Export.StiHtmlExportMode.Span';

}
