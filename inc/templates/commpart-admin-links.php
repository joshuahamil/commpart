<h1>Community Partners Manage Links & Partners</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php">
    <button id="add_new_partner" class="button button-primary button-large">New Partner</button>
    <button id="view_partners" class="button button-primary button-large">View Partners</button>
    <button id="delete_partner" class="button button-secondary button-large">Delete Partner</button>
    <?php settings_fields( 'links-settings-group' ); ?>
    <?php do_settings_sections( 'commpart_links' ); ?>
    <?php submit_button(); ?>
</form>