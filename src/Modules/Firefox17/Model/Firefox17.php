<?php

Namespace Model;

class Firefox17 extends BaseLinuxApp {

  public function __construct($params) {
    parent::__construct($params);
    $this->autopilotDefiner = "Firefox17";
    $this->installCommands = array(
      "cd /tmp" ,
      "git clone https://github.com/phpengine/cleopatra-firefox17 firefox17",
      "rm -rf ****PROGDIR****",
      "mkdir -p ****PROGDIR****",
      "mv /tmp/firefox17/* ****PROGDIR****",
      "rm -rf /tmp/firefox17" );
    $this->uninstallCommands = array(
      "rm -rf ****PROGDIR****",
      "rm -rf ****PROG EXECUTOR****", );
    $this->programDataFolder = "/opt/firefox17"; // command and app dir name
    $this->programNameMachine = "firefox17"; // command and app dir name
    $this->programNameFriendly = " Firefox 17 "; // 12 chars
    $this->programNameInstaller = "Firefox 17";
    $this->programExecutorFolder = "/usr/bin";
    $this->programExecutorTargetPath = "firefox-bin";
    $this->programExecutorCommand = $this->programDataFolder.'/'.$this->programExecutorTargetPath;
    $this->registeredPostInstallFunctions = array("deleteExecutorIfExists",
      "saveExecutorFile");
    $this->initialize();
  }

}