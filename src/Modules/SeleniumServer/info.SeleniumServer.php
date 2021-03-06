<?php

Namespace Info;

class SeleniumServerInfo extends Base {

  public $hidden = false;

  public $name = "The Selenium Web Browser controlling server";

  public function __construct() {
    parent::__construct();
  }

  public function routesAvailable() {
    return array( "SeleniumServer" =>  array_merge(parent::routesAvailable(), array("install") ) );
  }

  public function routeAliases() {
    return array("selenium-server"=>"SeleniumServer", "selenium"=>"SeleniumServer",
      "selenium-srv"=>"SeleniumServer", "seleniumserver"=>"SeleniumServer");
  }

  public function autoPilotVariables() {
    return array(
      "SeleniumServer" => array(
        "SeleniumServer" => array(
          "programDataFolder" => "/opt/SeleniumServer", // command and app dir name
          "programNameMachine" => "seleniumserver", // command and app dir name
          "programNameFriendly" => "Selenium Srv", // 12 chars
          "programNameInstaller" => "Selenium Server",
        ),
      )
    );
  }

  public function helpDefinition() {
    $help = <<<"HELPDATA"
  This command allows you to install a few GC recommended Standard Tools
  for productivity in your system.  The kinds of tools we found ourselves
  installing on every box we have, client or server. These include curl,
  vim, drush and zip.

  SeleniumServer, selenium-server, selenium, selenium-srv, seleniumserver

        - install
        Installs SeleniumServer. Note, you'll also need Java installed
        as it is a prerequisite for Selenium
        example: cleopatra selenium install

HELPDATA;
    return $help ;
  }

}