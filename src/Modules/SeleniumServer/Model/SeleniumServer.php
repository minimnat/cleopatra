<?php

Namespace Model;

class SeleniumServer extends BaseLinuxApp {

  public function __construct($params) {

    parent::__construct($params);
    $this->autopilotDefiner = "SeleniumServer";
    $this->installCommands = array(
      "cd /tmp" ,
      "git clone https://github.com/phpengine/cleopatra-selenium selenium",
      "mkdir -p ****PROGDIR****",
      "mv /tmp/selenium/* ****PROGDIR****",
      "rm -rf /tmp/selenium/",
      "cd ****PROGDIR****",
      "java -jar selenium-server.jar >/dev/null 2>&1 </dev/null &" );
    $this->uninstallCommands = array("rm -rf ****PROGDIR****");
    $this->programDataFolder = "/opt/selenium"; // command and app dir name
    $this->programNameMachine = "selenium"; // command and app dir name
    $this->programNameFriendly = "Selenium Srv"; // 12 chars
    $this->programNameInstaller = "Selenium Server";
    $this->programExecutorFolder = "/usr/bin";
    $this->programExecutorTargetPath = "firefox-bin";
    $this->programExecutorCommand = 'java -jar ' . $this->programDataFolder .
      '/selenium-server.jar';
    $this->registeredPostInstallFunctions = array("deleteExecutorIfExists",
      "saveExecutorFile");
    $this->initialize();
  }

}