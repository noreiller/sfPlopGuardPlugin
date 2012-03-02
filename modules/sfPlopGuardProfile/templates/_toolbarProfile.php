<<?php echo html5Tag('nav'); ?> class="nav">
  <ul class="w-menu menu-custom">
    <li>
      <?php echo link_to(
        __('My profile', '', 'plopAdmin'),
        '@sf_plop_profile',
        'class=element'
      ) ?>
    </li>
    <li>
      <?php echo link_to(
        __('My addresses', '', 'plopAdmin'),
        '@sf_plop_guard_user_address',
        'class=element'
      ) ?>
    </li>
  </ul>

  <?php include_partial('sfPlopCMS/toolbar_quick_links') ?>
</<?php echo html5Tag('nav'); ?>>
