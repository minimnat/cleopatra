<?php

Namespace Model;

class Base {

    public $params ;

    public $autopilotDefiner ;
    public $programNameFriendly;
    public $programNameInstaller;

    protected $programNameMachine ;
    protected $programDataFolder;
    protected $startDirectory;
    protected $titleData;
    protected $completionData;
    protected $bootStrapData;
    protected $extraBootStrap;
    protected $programExecutorFolder;
    protected $programExecutorTargetPath;
    protected $extraCommandsArray;
    protected $tempDir;

    public function __construct($params) {
      $this->tempDir =  DIRECTORY_SEPARATOR.'tmp';
      $this->setCmdLineParams($params);
    }

    protected function setAutoPilotVariables($autoPilot) {
        foreach ( $autoPilot as $step ) { // this should only happen once
            $keys = array_keys($step);
            foreach ($keys as $property) {
                $this->$property = $step[$property] ; } }
    }

    protected function executeAsShell($multiLineCommand, $message=null) {
        $tempFile = $this->tempDir."/cleopatra-temp-script-".mt_rand(100, 99999999999).".sh";
        echo "Creating $tempFile\n";
        $fileVar = "";
        if (is_array($multiLineCommand) && count($multiLineCommand)>0) {
            foreach ($multiLineCommand as $command) { $fileVar .= $command."\n" ; } }
        file_put_contents($tempFile, $fileVar);
        echo "chmod 755 $tempFile 2>/dev/null\n";
        shell_exec("chmod 755 $tempFile 2>/dev/null");
        echo "Changing $tempFile Permissions\n";
        echo "Executing $tempFile\n";
        $outputText = shell_exec($tempFile);
        if ($message !== null) { $outputText .= "$message\n"; }
        echo $outputText;
        shell_exec("rm $tempFile");
        echo "Temp File $tempFile Removed\n";
    }

    protected function executeAndOutput($command, $message=null) {
        $outputText = shell_exec($command);
        if ($message !== null) {
          $outputText .= "$message\n"; }
        print $outputText;
        return true;
    }

    protected function executeAndLoad($command) {
        $outputText = shell_exec($command);
        return $outputText;
    }

    protected function setCmdLineParams($params) {
      $cmdParams = array();
      foreach ($params as $param) {
        if ( substr($param, 0, 2)=="--" && strpos($param, '=') != null ) {
          $equalsPos = strpos($param, "=") ;
          $paramKey = substr($param, 2, $equalsPos-2) ;
          $paramValue = substr($param, $equalsPos+1, strlen($param)) ;
          $cmdParams = array_merge($cmdParams, array($paramKey => $paramValue)); } }
      $this->params = $cmdParams;
    }

    protected function askYesOrNo($question) {
        print "$question (Y/N) \n";
        $fp = fopen('php://stdin', 'r');
        $last_line = false;
        while (!$last_line) {
            $inputChar = fgetc($fp);
            $yesOrNo = ($inputChar=="y"||$inputChar=="Y") ? true : false;
            $last_line = true; }
        return $yesOrNo;
    }

    protected function areYouSure($question) {
        print "!! Sure? $question (Y/N) !!\n";
        $fp = fopen('php://stdin', 'r');
        $last_line = false;
        while (!$last_line) {
            $inputChar = fgetc($fp);
            $yesOrNo = ($inputChar=="y"||$inputChar=="Y") ? true : false;
            $last_line = true; }
        return $yesOrNo;
    }

    protected function askForDigit($question) {
        $fp = fopen('php://stdin', 'r');
        $last_line = false;
        $i = 0;
        while ($last_line == false ) {
            print "$question\n";
            $inputChar = fgetc($fp);
            if (in_array($inputChar, array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9")) ) { $last_line = true; }
            else { echo "You must enter a single digit. Please try again\n"; continue; }
        $i++; }
        return $inputChar;
    }

    protected function askForInput($question, $required=null) {
        $fp = fopen('php://stdin', 'r');
        $last_line = false;
        while (!$last_line) {
            print "$question\n";
            $inputLine = fgets($fp, 1024);
            if ($required && strlen($inputLine)==0 ) {
                print "You must enter a value. Please try again.\n"; }
            else {$last_line = true;} }
        $inputLine = $this->stripNewLines($inputLine);
        return $inputLine;
    }

    protected function askForArrayOption($question, $options, $required=null) {
        $fp = fopen('php://stdin', 'r');
        $last_line = false;
        while ($last_line == false) {
            print "$question\n";
            for ( $i=0 ; $i<count($options) ; $i++) { print "($i) $options[$i] \n"; }
            $inputLine = fgets($fp, 1024);
            if ($required && strlen($inputLine)==0 ) { print "You must enter a value. Please try again.\n"; }
            elseif ( is_int($inputLine) && ($inputLine>=0) && ($inputLine<=count($options) ) ) {
                print "Enter one of the given options. Please try again.\n"; }
            else {$last_line = true; } }
        $inputLine = $this->stripNewLines($inputLine);
        return (isset($options[$inputLine])) ? $options[$inputLine] : null ;
    }

    protected function stripNewLines($inputLine) {
        $inputLine = str_replace("\n", "", $inputLine);
        $inputLine = str_replace("\r", "", $inputLine);
        return $inputLine;
    }

    protected function findStatusByDirectory($inputLine) {
        $inputLine = str_replace("\n", "", $inputLine);
        $inputLine = str_replace("\r", "", $inputLine);
        return $inputLine;
    }

    protected function setInstallFlagStatus($bool) {
        if ($bool) {
            AppConfig::setProjectVariable("installed-apps", $this->programNameMachine, true); }
        else {
            AppConfig::deleteProjectVariable("installed-apps", "any", $this->programNameMachine); }
    }

    public function askStatus() {
        return $this->getInstallFlagStatus($this->programNameMachine) ;
    }

    protected function getInstallFlagStatus($programNameMachine) {
        $installedApps = AppConfig::getProjectVariable("installed-apps");
        if (is_array($installedApps) && in_array($programNameMachine, $installedApps)) {
            return true ; }
        return false ;
    }

}
