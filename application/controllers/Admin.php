<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $file = file_get_contents("/var/www/html/echosystem/administration/application/logs/log-2017-06-19.php");
        $a = explode("\n", $file);

        foreach ($a as $b) {
            $t = explode(" ", $b);
            switch ($t[0]) {
                case "DEBUG":
                    echo "<p style='color:yellow;'>" . $b . "</p>";
                    break;
                case "ERROR":
                    echo "<p style='color:red;'>" . $b . "</p>";
                    break;
            }
        }
    }

    /*
     * Lists all the log files
     */
    public function logs()
    {
        #Loading all logs
        $log_path = $this->config->item('log_path') != '' ? $this->config->item('log_path') : APPPATH.'logs/';
        $files = array();
        $dir = opendir($log_path);
        while (false != ($file = readdir($dir))) {
            if (($file != ".") && ($file != "..") && ($file != "index.php") && ($file != "index.html")) {
                $files[] = array(
                        'name'      => str_replace(".php", "", $file),
                        'time'      => date("d/m/Y H:i:s", filemtime($log_path . $file)),
                        'date'      => date("d F Y", filemtime($log_path . $file)),
                        'size'      => $this->_fileSizeConvert(filesize($log_path . $file))
                ); // put in array.
            }
        }

        $this->twig->display("admin/logs", ['logs' => $files]);
    }

    /*
     * Shows log
     */
    public function logView(string $log)
    {
        $log_path = $this->config->item('log_path') != '' ? $this->config->item('log_path') : APPPATH.'logs/';
        
        #does the log exists?
        $thefile = $log_path . $log . ".php";
        if (!file_exists($thefile)) {
            show_error("Log File not Found: " . $thefile);
            exit;
        }

        #loading the file
        $file = file_get_contents($thefile);
        $a = explode("\n", $file);

        #parsing the log file
        $fileToShow = array();
        foreach ($a as $b) {
            $t = explode(" ", $b);
            switch ($t[0]) {
                case "DEBUG":
                    $nolevel = explode("-->", str_replace("DEBUG - ", "", $b));
                    $time = trim($nolevel[0]);
                    $text = trim($nolevel[1]);
                    $fileToShow[] = array(
                        'text'  => $text,
                        'level' => 'debug',
                        'time'  => $time
                    );
                    break;
                case "ERROR":
                    $nolevel = explode("-->", str_replace("ERROR - ", "", $b));
                    $time = trim($nolevel[0]);
                    $text = trim($nolevel[1]);
                    $fileToShow[] = array(
                        'text'  => $text,
                        'level' => 'error',
                        'time'  => $time
                    );
                    break;
                case "INFO":
                    $nolevel = explode("-->", str_replace("INFO - ", "", $b));
                    $time = trim($nolevel[0]);
                    $text = trim($nolevel[1]);
                    $fileToShow[] = array(
                        'text'  => $text,
                        'level' => 'info',
                        'time'  => $time
                    );
                    break;
            }
        }

        $this->twig->display("admin/logView", ['log' => array_reverse($fileToShow), 'logname' => $log]);
    }

    /**
    * Converts bytes into human readable file size.
    *
    * @param string $bytes
    * @return string human readable file size (2,87 Мб)
    * @author Mogilev Arseny
    */
    private function _fileSizeConvert($bytes)
    {
        $bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

        foreach ($arBytes as $arItem) {
            if ($bytes >= $arItem["VALUE"]) {
                $result = $bytes / $arItem["VALUE"];
                $result = str_replace(".", ",", strval(round($result, 2)))." ".$arItem["UNIT"];
                break;
            }
        }
        return $result;
    }
}
