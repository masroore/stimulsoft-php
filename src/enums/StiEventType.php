<?php

namespace Stimulsoft;

enum StiEventType: string
{
    case BeginExportReport = 'BeginExportReport';
    case OpenReport = 'OpenReport';
    case PrintReport = 'PrintReport';
    case EmailReport = 'EmailReport';
    case PrepareVariables = 'PrepareVariables';
    case SaveAsReport = 'SaveAsReport';
    case EndExportReport = 'EndExportReport';
    case CreateReport = 'CreateReport';
    case SaveReport = 'SaveReport';
    case BeginProcessData = 'BeginProcessData';

}
