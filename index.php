<?php

require_once __DIR__ . '/vendor/autoload.php';

require_once 'route/routes.php';

function msg($txt, $type)
{
    switch ($type) {
        case 'warning':
            $element = "<p class='msgWaring'>$txt</p>";
            return $element;
            break;

        case 'error':
            $element = "<p class='msgErro'>$txt</p>";
            return $element;
            break;

        case 'success':
            $element = "<p class='msgSuccess'>$txt</p>";
            return $element;
            break;

        default:
            $element = "<p class='msgInformation'>$txt</p>";
            return $element;
            break;
    }
}
