<?php
class sfPlopGuardProfileRegisterForm extends sfGuardUserForm
{
  public function configure()
  {
    parent::configure();

    unset(
      $this['updated_at'],
      $this['role'],
      $this['phone'],
      $this['theme'],
      $this['is_public']
    );

    $this->widgetSchema['culture'] = new sfWidgetFormPlopI18nChoiceLanguage(array(
      'languages' => sfPlop::get('sf_plop_cultures'),
      'default' => $this->getOption('user_culture'),
      'culture' => $this->getOption('culture')
    ));

    $this->widgetSchema->setHelps(array(
     'password' => null
    ));

    $this->validatorSchema['password'] = new sfValidatorString(
      array('min_length' => 6, 'max_length' => 128)
    );
  }
}
