<?php slot('sf_plop_theme', sfPlop::getAdminTheme($sf_user->getProfile()->getTheme(), true, true)) ?>
<?php slot('sf_plop_admin'); ?>
  <?php include_partial('sfPlopGuardProfile/toolbarProfile') ?>
<?php end_slot(); ?>

<?php if (!$sf_request->isXmlHttprequest()): ?>
  <h1><?php echo __('My profile', '', 'plopAdmin') ?></h1>
  <h2>
    <?php echo __('Please complete the fields below :', '', 'plopAdmin') ?>
  </h2>
<?php endif; ?>

<form action="<?php echo url_for('@sf_plop_profile?sf_culture=' . $culture) ?>"
  method="post" class="w-form w-form-i">

  <?php include_partial('sfPlopCMS/form_fields', array('form' => $form)) ?>

  <div class="form-row form-row-buttons">
    <input type="submit" value="<?php echo __('save', '', 'plopAdmin') ?>" />
    <a href="<?php echo url_for('@sf_plop_homepage') ?>" class="w-form-cancel">
      <?php echo __('cancel', '', 'plopAdmin') ?>
    </a>
  </div>

  <?php if ($block_unregister != true): ?>
    <div class="form-row form-row-buttons">
      <?php echo link_to(
        __('Unregister', '', 'plopAdmin'),
        '@sf_plop_unregister'
      ) ?>
    </div>
  <?php endif; ?>

</form>
