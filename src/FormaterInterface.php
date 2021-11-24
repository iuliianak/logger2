<?php
namespace Yulia\Logger;

interface FormaterInterface
{
    public function format($text,$url);
}