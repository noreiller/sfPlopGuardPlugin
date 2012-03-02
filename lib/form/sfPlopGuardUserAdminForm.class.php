<?php

/**
 * sfGuardUser form for admin.
 *
 * @package    form
 * @subpackage sf_guard_user
 * @version    SVN: $Id: sfGuardUserAdminForm.class.php 13000 2008-11-14 10:44:57Z noel $
 */
class sfPlopGuardUserAdminForm extends sfGuardUserAdminForm
{
  public function configure()
  {
    parent::configure();

    $this->widgetSchema['sf_guard_user_group_list'] = new sfWidgetFormInputHidden();
    $this->validatorSchema['sf_guard_user_group_list'] = new sfValidatorPass();

    $this->widgetSchema['sf_guard_user_permission_list'] = new sfWidgetFormInputHidden();
    $this->validatorSchema['sf_guard_user_permission_list'] = new sfValidatorPass();
  }
}