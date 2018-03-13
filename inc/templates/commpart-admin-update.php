<h1>Community Partners - Edit updates on Homepage</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php">
    <?php settings_fields( 'commpart_update-group' ); ?>
    <?php do_settings_sections( 'commpart_update' ); ?>
    <?php submit_button(); ?>
</form>
