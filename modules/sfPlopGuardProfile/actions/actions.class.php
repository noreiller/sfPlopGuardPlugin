<?php

/**
 * sfPlopGuardProfileActions
 *
 * @author Aurélien MANCA <aurelien.manca@gmail.com>
 */
class sfPlopGuardProfileActions extends sfActions
{

  public function preExecute()
  {
    // $module = 'sf_plop_profile';
//     if (!in_array($module, array_keys(sfPlop::getSafePluginModules()))
//       && !$this->getUser()->hasCredential($module)
//     )
//       $this->forward404();

    if (!$this->getUser()->isAuthenticated())
      $this->forward(sfConfig::get('sf_login_module'), sfConfig::get('sf_login_action'));

//     if (!$this->getUser()->hasCredential($module))
//       $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));

		parent::preExecute();

    ProjectConfiguration::getActive()->LoadHelpers(array('I18N'));
    $this->getResponse()->setTitle(sfPlop::setMetaTitle(__('User profile', '', 'plopAdmin')));
  }

  /**
   * Display the user profile form.
   * @param sfWebRequest $request
   */
  public function executeProfile(sfWebRequest $request)
  {
		$this->culture = $this->getUser()->getCulture();
    $this->form = new sfPlopGuardUserForm(
      $this->getUser()->getGuardUser(),
      array(
        'user_culture' => $this->getUser()->getProfile()->getCulture(),
        'culture' => $this->culture
      )
    );

    if ($request->getMethod() == sfRequest::POST)
    {
      $values = $request->getParameter('sf_guard_user');
      $this->form->bind($values);

      if ($this->form->isValid())
      {
        $sf_guard_user = $this->form->save();
        $this->getUser()->setCulture($sf_guard_user->getProfile()->getCulture());
        $this->redirect('@sf_plop_profile');
      }
    }

    $this->block_unregister = $this->getUser()->isSuperAdmin() 
      && sfPlopGuard::isLastSuperAdminUser();
  }
}