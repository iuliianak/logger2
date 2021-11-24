<?php
namespace Yulia\Logger;

class Formater implements FormaterInterface
{

    public function format($text, $url)
    {
        return date("Y-m-d") . ", " . date("H:i") . " - url: $url - код ответа HTTP: $text\n";

    }
}