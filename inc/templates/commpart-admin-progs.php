<h1>Community Partners Manage Programs & Services</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php">
    <?php settings_fields( 'program-settings-group' ); ?>
    <?php do_settings_sections( 'commpart_progs' ); ?>
    <?php submit_button(); ?>
</form>