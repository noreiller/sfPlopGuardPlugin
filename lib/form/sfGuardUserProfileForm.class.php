<?php

/**
 * sfGuardUserProfile form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
class sfGuardUserProfileForm extends BasesfGuardUserProfileForm
{
  public function configure()
  {
    parent::configure();

    unset(
      $this['updated_at']
    );

    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('plopAdmin');

    $this->widgetSchema['culture'] = new sfWidgetFormPlopI18nChoiceLanguage(array(
      'languages' => sfPlop::get('sf_plop_cultures'),
      'default' => $this->getOption('user_culture'),
      'culture' => $this->getOption('culture')
    ));
    $this->validatorSchema['culture'] = new sfValidatorI18nChoiceLanguage();

    $this->widgetSchema['is_public']->setLabel('Is public ?');

    $this->widgetSchema['theme'] = new sfWidgetFormPlopChoiceAdminTheme(array(
      'add_empty' => true
    ));
    $this->validatorSchema['theme'] = new sfValidatorPlopChoiceAdminTheme(array(
      'required' => false
    ));

    $this->widgetSchema->getFormFormatter()->setHelpFormat(
      sfPlop::get('sf_plop_form_help_format')
    );
    $this->widgetSchema->setHelps(array(
     'password' => 'To update the password, please fill the two "password" fields. Otherwise, let them empty.'
    ));
  }
}
