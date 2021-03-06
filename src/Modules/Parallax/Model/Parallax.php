<?php

Namespace Model;

class Parallax extends BasePHPApp {

  public function __construct($params) {
    parent::__construct($params);
    $this->autopilotDefiner = "Parallax";
    $this->fileSources = array(
      array(
        "https://github.com/phpengine/parallax.git",
        "parallax",
        null // can be null for none
      )
    );
    $this->programNameMachine = "parallax"; // command and app dir name
    $this->programNameFriendly = " Parallax! "; // 12 chars
    $this->programNameInstaller = "Parallax - The parallel process executor";
    $this->programExecutorTargetPath = 'parallax/src/Bootstrap.php';
    $this->initialize();
  }

}