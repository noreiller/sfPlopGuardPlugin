<?php

require_once dirname(__FILE__).'/../lib/sfGuardUserAddressGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/sfGuardUserAddressGeneratorHelper.class.php';

/**
 * sfGuardUserAddress actions.
 *
 * @package    plop
 * @subpackage sfGuardUserAddress
 * @author     Aurélien MANCA <aurelien.manca@gmail.com>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class sfGuardUserAddressActions extends autosfGuardUserAddressActions
{
  public function preExecute()
  {
    // $module = 'sf_plop_guard_user_address';
    // if (!in_array($module, array_keys(sfPlop::getSafePluginModules()))
    //   && !$this->getUser()->hasCredential($module)
    // )
    //   $this->forward404();

    if (!$this->getUser()->isAuthenticated())
      $this->forward(sfConfig::get('sf_login_module'), sfConfig::get('sf_login_action'));

    // if (!$this->getUser()->hasCredential($module))
    //   $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));

		parent::preExecute();

    ProjectConfiguration::getActive()->LoadHelpers(array('I18N'));
    $this->getResponse()->setTitle(sfPlop::setMetaTitle(__('User addresses', '', 'plopAdmin')));
  }

  public function executeIndex(sfWebRequest $request)
  {
    parent::executeIndex($request);

		$this->pager->setCriteria(
			sfGuardUserAddressQuery::create()
				->filterByUserId($this->getUser()->getGuardUser()->getId())
		);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->culture = $this->getUser()->getCulture();
    $this->form = $this->configuration->getForm(null, array(
      'user_id' => $this->getUser()->getGuardUser()->getId(),
      'user_culture' => $this->getUser()->getProfile()->getCulture(),
      'culture' => $this->culture
    ));
    $this->sfGuardUserAddress = $this->form->getObject();
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->culture = $this->getUser()->getCulture();
    $this->sfGuardUserAddress = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->sfGuardUserAddress, array(
			'user_id' => $this->getUser()->getGuardUser()->getId(),
      'user_culture' => $this->getUser()->getProfile()->getCulture(),
      'culture' => $this->culture
		));
  }
}
