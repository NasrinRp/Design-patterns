<?php

namespace App\DesingPatterns\Creational\Singleton;

use Illuminate\Support\Facades\File;

class LoggerService
{
    private static ?LoggerService $instance = null;


    private $logFile;

    // Private constructor to initialize the log file path
    private function __construct()
    {
        $this->logFile = storage_path('logs/app_log.log');
    }


    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function log($message)
    {
        $timestamp = now()->format('Y-m-d H:i:s');
        $logMessage = "[$timestamp] $message\n";

        // Append the message to the log file
        File::append($this->logFile, $logMessage);
    }
}
