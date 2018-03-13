<h1>Community Partners Edit About</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php">
    <?php settings_fields( 'commpart_about-group' ); ?>
    <?php do_settings_sections( 'commpart_about' ); ?>
    <?php submit_button(); ?>
</form>
