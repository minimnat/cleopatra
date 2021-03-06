<?php

Namespace Info;

class DeveloperToolsInfo extends Base {

    public $hidden = false;

    public $name = "Developer Tools - IDE's and other tools for Developers";

    public function __construct() {
      parent::__construct();
    }

    public function routesAvailable() {
      return array( "DeveloperTools" =>  array_merge(parent::routesAvailable(), array("install") ) );
    }

    public function routeAliases() {
      return array("devtools"=>"DeveloperTools", "dev-tools"=>"DeveloperTools");
    }

    public function autoPilotVariables() {
      return array(
        "DeveloperTools" => array(
          "DeveloperTools" => array(
            "programDataFolder" => "/opt/DeveloperTools", // command and app dir name
            "programNameMachine" => "developertools", // command and app dir name
            "programNameFriendly" => "Devel Tools!", // 12 chars
            "programNameInstaller" => "Developer Tools",
          ),
        )
      );
    }

    public function helpDefinition() {
      $help = <<<"HELPDATA"
  This command allows you to install a set of Developer Tools. These include
  Geany IDE, Bluefish IDE, Kompozer IDE and Emma DB Manager.

  DeveloperTools, devtools, dev-tools

        - install
        Installs the latest version of Developer Tools
        example: cleopatra devtools install

HELPDATA;
      return $help ;
    }

}