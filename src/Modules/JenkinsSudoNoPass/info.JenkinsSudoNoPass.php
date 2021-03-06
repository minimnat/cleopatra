<?php

Namespace Info;

class JenkinsSudoNoPassInfo extends Base {

    public $hidden = false;

    public $name = "Configure Passwordless Sudo for your Jenkins user";

    public function __construct() {
      parent::__construct();
    }

    public function routesAvailable() {
      return array( "JenkinsSudoNoPass" =>  array_merge(parent::routesAvailable(), array("install") ) );
    }

    public function routeAliases() {
      return array("jenkinssudonopass"=>"JenkinsSudoNoPass", "jenkins-sudo-nopass"=>"JenkinsSudoNoPass",
        "jenkins-sudo-passwordless"=>"JenkinsSudoNoPass");
    }

    public function autoPilotVariables() {
      return array(
        "JenkinsSudoNoPass" => array(
          "JenkinsSudoNoPass" => array(
            "programDataFolder" => "/opt/jenkins-plugs", // command and app dir name
            "programNameMachine" => "jenkins-plugins", // command and app dir name
            "programNameFriendly" => "Jenk Sudo NP", // 12 chars
            "programNameInstaller" => "Jenkins Passwordless Sudo",
          )
        )
      );
    }

    public function helpDefinition() {
      $help = <<<"HELPDATA"
  This command allows you to add an entry to the system sudo file that will
  allow your Jenkins user to have passwordless sudo. This is required for
  quite a few of the Jenkins builds provided by Golden Contact, as Jenkins
  will perform test execution, software installs and more, silently.

  JenkinsSudoNoPass, jenkinssudonopass, jenkins-sudo-nopass, jenkins-sudo-passwordless

        - install
        Installs the Jenkins sudo without password entry
        example: cleopatra jenkins-sudo-nopass install

HELPDATA;
      return $help ;
    }

}