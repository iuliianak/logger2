<?php
namespace Yulia\Logger;

class FileWriter implements WriterInterface
{

    public function write($text, $filename)
    {
        $handle=fopen($filename,'a');
        fwrite($handle, $text);
        fclose($handle);
    }
}