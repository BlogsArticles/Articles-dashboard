<?php

namespace Core;

class Logger
{
    private static $log_file;


    public static function debug($message)
    {
        static::add($message, 'debug');
    }

    public static function error(\Exception $exception)
    {
        static::add($exception, 'error');
    }

    public static function warning($message)
    {
        static::add($message, 'warning');
    }

    public static function info($message)
    {
        static::add($message, 'info');
    }

    public static function add($exception, $level = 'debug')
    {

        $log_entry = self::formatLogEntry($exception,$level);

        $file = self::openFile();

        fwrite($file, $log_entry);

        fclose($file);
    }

    public static function formatLogEntry($exception, $level):string
    {
        $log_entey =  [
            'timestamp' => self::getDate(),
            'ip' => self::getIpAddress(),
            'browser' => self::getBrowser(),
            'level' => self::fomatLevel($level),
            'message' => self::formatMessage($exception->getMessage()),
            'line' => self::getErrorLine($exception),
            'file' => self::getCallFile($exception)
        ];

        return implode(', ', $log_entey) . PHP_EOL;
    }

    public static function getDate()
    {
        return date('d-m-y h:i:s');
    }

    public static function getIpAddress()
    {
        return $_SERVER['REMOTE_ADDR'];
    }

    public static function getBrowser()
    {
        return $_SERVER['HTTP_SEC_CH_UA'];
    }

    public static function fomatLevel($level)
    {
        return '[' . strtoupper($level) . ']';
    }

    public static function formatMessage($message)
    {
        return '"' . $message . '"';
    }

    public static function getErrorLine($exception)
    {
        return 'In line ' . $exception->getTrace()[0]['line'];
    }

    public static function getCallFile($exception)
    {
        return 'In file ' . $exception->getTrace()[0]["file"];
    }

    public static function openFile()
    {
        $file = fopen(self::getLogFile(), 'a+');
        return $file;
    }

    public static function getLogFile()
    {
        self::$log_file = (require base_path('config.php'))['logs']['file'];
        return self::$log_file;
    }



    public static function test()
    {
        throw new \Exception('There is an error');
    }

}