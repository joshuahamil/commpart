<h1>Community Partners Manage Newsletters & Public Releases</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php">
    <?php settings_fields( 'news-and-press-settings-group' ); ?>
    <?php do_settings_sections( 'commpart_news_and_press' ); ?>
    <?php submit_button(); ?>
</form>