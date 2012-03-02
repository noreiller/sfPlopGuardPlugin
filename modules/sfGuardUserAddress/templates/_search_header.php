<?php slot('sf_plop_theme', sfPlop::getAdminTheme($sf_user->getProfile()->getTheme(), true, true)) ?>
<?php slot('sf_plop_admin'); ?>
  <?php include_partial('sfPlopGuardProfile/toolbarProfile') ?>
<?php end_slot(); ?>