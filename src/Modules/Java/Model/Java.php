<?php

Namespace Model;

class Java extends BaseLinuxApp {

  public function __construct() {

    parent::__construct();
    $this->autopilotDefiner = "Java";
    $this->installCommands = array(
      "git clone https://bitbucket.org/phpengine/cleopatra-oraclejava7jdk /tmp/oraclejdk" ,
      "mkdir -p ****PROGDIR****" ,
      "cp -r /tmp/oraclejdk/* ****PROGDIR****" ,
      "rm -rf /tmp/oraclejdk" ,
      "cd ****PROGDIR****",
      "chmod a+x ****PROGDIR****",
      'echo \'JAVA_HOME=****PROGDIR****\' >> /etc/profile',
      'echo \'PATH=$PATH:$HOME/bin:$JAVA_HOME/bin\' >> /etc/profile',
      'echo \'export JAVA_HOME\' >> /etc/profile',
      'echo \'export PATH\' >> /etc/profile',
      'sudo update-alternatives --install "/usr/bin/java" "java" "****PROGDIR****/bin/java" 1 ',
      'sudo update-alternatives --install "/usr/bin/javac" "javac" "****PROGDIR****/bin/javac" 1 ',
      'sudo update-alternatives --install "/usr/bin/javaws" "javaws" "****PROGDIR****/bin/javaws" 1 ',
      'sudo update-alternatives --set java ****PROGDIR****/bin/java ',
      'sudo update-alternatives --set javac ****PROGDIR****/bin/javac ',
      'sudo update-alternatives --set javaws ****PROGDIR****/bin/javaws ',
      '. /etc/profile' );
    $this->uninstallCommands = array( "" );
    $this->programDataFolder = "";
    $this->programNameMachine = "java"; // command and app dir name
    $this->programNameFriendly = "!!Java JDK!!"; // 12 chars
    $this->programNameInstaller = "The Oracle Java JDK 1.7";
    $this->registeredPreInstallFunctions = array("askForJavaInstallDirectory");
    $this->registeredPreUnInstallFunctions = array("askForJavaInstallDirectory");
    $this->initialize();
  }

  protected function askForJavaInstallDirectory($autoPilot=null){
    if (isset($autoPilot) &&
      $autoPilot->{"JavaInstallDirectory"} ) {
      $this->programDataFolder = $autoPilot->{"JavaInstallDirectory"}; }
    else {
      $question = "Enter Java Install Directory (no trailing slash):";
      $this->programDataFolder = self::askForInput($question, true); }
  }

}