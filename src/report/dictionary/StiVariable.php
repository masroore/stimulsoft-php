<?php

namespace Stimulsoft\Report;

use Stimulsoft\StiHtmlComponent;

class StiVariable extends StiHtmlComponent
{
    /** @var string The name of the variable. */
    public string $name;

    /** @var ?StiVariableType The type of the variable. Is equal to one of the values of the StiVariableType enumeration. */
    public string $type;

    /** @var object The value of the variable. The type of object depends on the type of variable. */
    public string $value;

    /** Get the HTML representation of the component. */
    public function getHtml(): string
    {
        $result =
            "let $this->id = new Stimulsoft.Report.Dictionary.StiVariable".
            "('', '{$this->name}', '{$this->name}', '', Stimulsoft.System.{$this->type}, '{$this->value}');\n";

        $this->isHtmlRendered = true;

        return $result;
    }

    public function __construct(string $name = '', string $type = 'String', string $value = '')
    {
        $this->name = $name !== null && \strlen($name) > 0 ? $name : 'variable';
        $this->type = $type;
        $this->value = $value;

        $this->id = $this->name;
    }
}
