<?php

Namespace Info;

class JenkinsPluginsInfo extends Base {

    public $hidden = false;

    public $name = "Jenkins PHP Plugins - Common Plugins for Jenkins PHP Builds";

    public function __construct() {
      parent::__construct();
    }

    public function routesAvailable() {
      return array( "JenkinsPlugins" =>  array_merge(parent::routesAvailable(), array("install") ) );
    }

    public function routeAliases() {
      return array("jenkinsplugins"=>"JenkinsPlugins", "jenkins-plugins"=>"JenkinsPlugins",
        "jenkins-plugs"=>"JenkinsPlugins");
    }

    public function autoPilotVariables() {
      return array(
        "JenkinsPlugins" => array(
          "JenkinsPlugins" => array(
            "programDataFolder" => "/opt/jenkins-plugs", // command and app dir name
            "programNameMachine" => "jenkins-plugins", // command and app dir name
            "programNameFriendly" => "Jenkins Plugins!", // 12 chars
            "programNameInstaller" => "Jenks Plugs!",
          )
        )
      );
    }

    public function helpDefinition() {
      $help = <<<"HELPDATA"
  This command allows you to install a bunch of plugins that we recommend for
  PHP builds in Jenkins.

  JenkinsPlugins, jenkinsplugins, jenkins-plugins, jenkins-plugs

        - install
        Installs the latest version of Jenkins Plugins for PHP recommended by Golden Contact
        example: cleopatra jenkins-plugins install

HELPDATA;
      return $help ;
    }

}