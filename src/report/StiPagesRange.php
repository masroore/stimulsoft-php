<?php

namespace Stimulsoft\Report;

use Stimulsoft\StiHtmlComponent;

class StiPagesRange extends StiHtmlComponent
{
    public string $rangeType;

    public ?string $pageRanges = '';

    public int $currentPage = 0;

    /** Get the HTML representation of the component. */
    public function getHtml(): string
    {
        $result = "let $this->id = new Stimulsoft.Report.StiPagesRange();\n";
        if ($this->rangeType != StiRangeType::All->value) {
            $result .= "$this->id.rangeType = $this->rangeType;\n";

            if ($this->pageRanges !== null && $this->pageRanges !== '') {
                $result .= "$this->id.pageRanges = '$this->pageRanges';\n";
            }

            if ($this->currentPage > 0) {
                $result .= "$this->id.currentPage = $this->currentPage;\n";
            }
        }

        $this->isHtmlRendered = true;

        return $result;
    }

    public function __construct(StiRangeType $rangeType = StiRangeType::All, string $pageRanges = '', int $currentPage = 0)
    {
        $this->id = 'pagesRange';

        $this->rangeType = $rangeType->value;
        $this->pageRanges = $pageRanges;
        $this->currentPage = $currentPage;
    }
}
