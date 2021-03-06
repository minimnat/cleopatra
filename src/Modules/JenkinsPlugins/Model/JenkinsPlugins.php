<?php

Namespace Model;

class JenkinsPlugins extends BaseLinuxApp {

  public function __construct($params) {
    parent::__construct($params);
    $this->autopilotDefiner = "JenkinsPlugins";
    $this->installCommands = array(
        "cd /tmp" ,
        "git clone https://github.com/phpengine/jenkins-php-plugins jplugins",
        "rm -rf ****PROGDIR****",
        "mkdir -p ****PROGDIR****",
        "mv /tmp/jplugins/* ****PROGDIR****",
        "chmod -R 775 ****PROGDIR****/*",
        "chown -R jenkins ****PROGDIR****",
        "rm -rf /tmp/jplugins",
        "service jenkins restart"
    );
    $this->uninstallCommands = array(
        "rm -rf ****PROGDIR****".DIRECTORY_SEPARATOR."*",
        "service jenkins restart"
    );
    $this->programDataFolder = "/var/lib/jenkins/plugins"; // command and app dir name
    $this->programNameMachine = "jenkinsplugins"; // command and app dir name
    $this->programNameFriendly = "Jenkns Plgs!"; // 12 chars
    $this->programNameInstaller = "Jenkins Plugins";
    $this->initialize();
  }

}