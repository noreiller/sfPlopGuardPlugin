<?php

class sfPlopGuardPluginConfiguration extends sfPluginConfiguration
{
  function initialize ()
  {
    parent::initialize();

    if (class_exists('sfPlop'))
      sfPlop::loadPlugin(array(
        'modules' => array(
          'sfGuardUser' => array('name' => 'Users', 'route' => '@sf_guard_user'),
          'sfGuardGroup' => array('name' => 'Groups', 'route' => '@sf_guard_group')
        )
      ));

  }
}

?>
