<?php

namespace Stimulsoft;

class StiJavaScript
{
    public $componentType;
    public $options;
    public $usePacked = false;
    public $useRelativeUrls = true;

    public function getHtml()
    {
        $dashboards = class_exists('\Stimulsoft\Report\StiDashboard');
        $extension = $this->usePacked ? 'pack.js' : 'js';

        $scripts = [];
        if ($this->options->reports) {
            $scripts[] = "stimulsoft.reports.$extension";
        } else {
            if ($this->options->reportsChart) {
                $scripts[] = "stimulsoft.reports.chart.$extension";
            }
            if ($this->options->reportsExport) {
                $scripts[] = "stimulsoft.reports.export.$extension";
            }
            if ($this->options->reportsMaps) {
                $scripts[] = "stimulsoft.reports.maps.$extension";
            }
            if ($this->options->reportsImportXlsx) {
                $scripts[] = "stimulsoft.reports.import.xlsx.$extension";
            }
        }

        if ($dashboards) {
            $scripts[] = "stimulsoft.dashboards.$extension";
        }

        if (StiComponentType::Viewer == $this->componentType || StiComponentType::Designer == $this->componentType) {
            $scripts[] = "stimulsoft.viewer.$extension";
        }

        if (StiComponentType::Designer == $this->componentType) {
            $scripts[] = "stimulsoft.designer.$extension";

            if ($this->options->blocklyEditor) {
                $scripts[] = "stimulsoft.blockly.editor.$extension";
            }
        }

        $result = '';
        foreach ($scripts as $name) {
            /*
            $product = strpos($name, 'dashboards') > 0 ? 'dashboards-php' : 'reports-php';
            $root = $this->useRelativeUrls ? 'scripts/' : '/scripts/';
            $result .= "<script src=\"{$root}$name\" type=\"text/javascript\"></script>\n";
            */
            $path = asset("scripts/{$name}");
            $result .= "<script src=\"$path\" type=\"text/javascript\"></script>\n";
        }

        return $result;
    }

    public function renderHtml()
    {
        echo $this->getHtml();
    }

    public function __construct($componentType, $options = null)
    {
        $this->componentType = $componentType;
        $this->options = null != $options ? $options : new StiJavaScriptOptions();
    }
}
