<?php

/**
 * sfGuardGroup form for admin.
 *
 * @package    form
 * @subpackage sf_guard_group
 * @version    SVN: $Id: sfGuardGroupAdminForm.class.php 13000 2008-11-14 10:44:57Z noel $
 */
class sfGuardProfileGroupForm extends sfGuardGroupForm
{
  public function configure()
  {
    parent::configure();

    unset($this['sf_guard_group_permission_list']);

  }
}