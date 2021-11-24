<?php
namespace Yulia\Logger;

class Logger implements LoggerInterface
{
    protected $write;

    protected $format;

    protected $arrayAnswer = [
        'emergency'=>'',
        'alert'=>301,
        'critical'=>302,
        'error'=>401,
        'warning'=>403,
        'notice'=>404,
        'info'=>500,
        'debug'=>200];

    public function __construct($writer, $formater)
    {
        $this->write  = $writer;
        $this->format = $formater;
    }

    public function setArrayAnswer($key,$value)
    {
        $this->arrayAnswer[$key] = $value;
    }

    public function getArrayAnswer($key = 0)
    {
        if($key == 0){
        $arr = $this->arrayAnswer;
    } else{
        $arr = $this->arrayAnswer[$key];
    }
      return  $arr;
    }

    public function emergency($message, array $context = array())
    {
        $this->log($context['level'],$message, $context);
    }

    public function alert($message, array $context = array())
    {
        $this->log($context['level'], $message,$context);
    }

    public function critical($message, array $context = array())
    {
        $this->log($context['level'], $message,$context);
    }

    public function error($message, array $context = array())
    {
        $this->log($context['level'], $message, $context);
    }

    public function warning($message, array $context = array())
    {
        $this->log($context['level'], $message, $context);
    }

    public function notice($message, array $context = array())
    {
        $this->log($context['level'], $message, $context);
    }

    public function info($message, array $context = array())
    {
        $this->log($context['level'], $message, $context);
    }

    public function debug($message, array $context = array())
    {
        $this->log($context['level'], $message, $context);
    }

    public function log($level, $message, array $context = array())
    {
        echo "Статус ответа HTTP " . $message;

        $formatted = $this->format->format($message, $context['url']);

        $this->write->write($formatted, $context['filename']);
    }
}
