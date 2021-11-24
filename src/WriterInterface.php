<?php
namespace Yulia\Logger;

interface WriterInterface
{
   public function write($text,$filename);

}