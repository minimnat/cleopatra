<?php

Namespace Info;

class Base {

    public $hidden ;

    public $name ;

    public function __construct() {
    }

    public function routesAvailable() {
      return array("help", "status", "install", "uninstall");
    }

    public function routeAliases() {
      return array();
    }

    public function helpDefinition() {
      $help = <<<"HELPDATA"
  There is no help defined for this module
HELPDATA;
      return $help ;
    }

}