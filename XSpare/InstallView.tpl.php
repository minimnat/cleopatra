Generic Installer:
--------------------------------------------

<?php if (isset($pageVars["autoPilotErrors"])) { ?>

  Autopilot Errors: <?php echo $pageVars["autoPilotErrors"] ; ?>

<?php } else { ?>

  Cleopatra Upgrade: <?php echo $pageVars["cleopatraInstallResult"] ; ?>

  Devhelper: <?php echo $pageVars["devhelperInstallResult"] ; ?>

  JRush: <?php echo $pageVars["jRushInstallResult"] ; ?>

  Git Tools: <?php echo $pageVars["gitToolsInstallResult"] ; ?>

  PHP Modules: <?php echo $pageVars["phpModulesInstallResult"] ; ?>

  Apache Modules: <?php echo $pageVars["apacheModulesInstallResult"] ; ?>

  PHP Unit 3.5: <?php echo $pageVars["phpUnit35InstallResult"] ; ?>

  PHP CodeSniffer: <?php echo $pageVars["phpCSInstallResult"] ; ?>

  PHP Mess Detector: <?php echo $pageVars["phpMDInstallResult"] ; ?>

  Java: <?php echo $pageVars["javaInstallResult"] ; ?>

  Jenkins: <?php echo $pageVars["jenkinsInstallResult"] ; ?>

  Jenkins Plugins: <?php echo $pageVars["jenkinsPluginsInstallResult"] ; ?>

  Jenkins Sudo: <?php echo $pageVars["jenkinsSudoInstallResult"] ; ?>

  VNC Server: <?php echo $pageVars["vncServerInstallResult"] ; ?>

  Ruby RVM: <?php echo $pageVars["rubyRVMInstallResult"] ; ?>

  Selenium: <?php echo $pageVars["seleniumInstallResult"] ; ?>

  Firefox 14: <?php echo $pageVars["fireFox14InstallResult"] ; ?>

  Firefox 17: <?php echo $pageVars["fireFox17InstallResult"] ; ?>

  MySQL Tools: <?php echo $pageVars["mysqlToolsInstallResult"] ; ?>

<?php } ?>

------------------------------
Installer Finished