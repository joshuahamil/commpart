<h1>Community Partners Manage Volunteers</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php">
    <?php settings_fields( 'volunteer-settings-group' ); ?>
    <?php do_settings_sections( 'commpart_vols' ); ?>
    <?php submit_button(); ?>
</form>