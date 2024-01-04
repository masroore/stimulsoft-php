<?php

namespace Stimulsoft\Report;

use Stimulsoft\StiHtmlComponent;

class StiDictionary extends StiHtmlComponent
{
    public StiReport $report;

    public array $variables;

    /** Get the HTML representation of the component. */
    public function getHtml(): string
    {
        $result = '';

        /** @var StiVariable $variable */
        foreach ($this->variables as $variable) {
            $result .= $variable->getHtml();
            $result .= "{$this->report->id}.dictionary.variables.add({$variable->id});\n";
        }

        return $result;
    }

    public function __construct(StiReport $report)
    {
        $this->report = $report;
        $this->variables = [];
    }
}
