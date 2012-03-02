<?php

/**
 * sfGuardUserAddress form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
class sfGuardUserAddressForm extends BasesfGuardUserAddressForm
{
  public function configure()
  {
    parent::configure();

    unset(
      $this['updated_at'],
      $this['created_at']
    );

    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('plopAdmin');

    $this->widgetSchema['country'] = new sfWidgetFormPlopI18nChoiceCountry(array(
      'default' => $this->getOption('user_culture'),
      'culture' => $this->getOption('culture')
    ));
    $this->setDefault('country', strtoupper($this->getOption('user_culture')));

    $this->setDefault('address_name', $this->widgetSchema->getFormFormatter()->translate('Home'));

    if ($this->getOption('user_id'))
    {
      $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
      $this->setDefault('user_id', $this->getOption('user_id'));
    }

    $this->widgetSchema->setLabel('address2', 'Address line 2');
  }
}
