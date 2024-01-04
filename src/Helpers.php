<?php

namespace Stimulsoft;

final class Helpers
{
    public static function parseTemplate(string $tpl, array $vars): string
    {
        // Generate tokens for your variable keys;
        $keys = array_map(fn ($key) => '{{'.$key.'}}', array_keys($vars));

        // Substitute tokens:
        return str_replace($keys, $vars, $tpl);
    }
}
