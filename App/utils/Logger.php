<?php
namespace App\Utils;

class Logger {
    public static function log($message) {
       
        $logFile = __DIR__ . '/../../logs/error.log';
  
        $date = date('Y-m-d H:i:s');
        $formattedMessage = "[$date] ERREUR : $message" . PHP_EOL;

     
        file_put_contents($logFile, $formattedMessage, FILE_APPEND);
    }
}
