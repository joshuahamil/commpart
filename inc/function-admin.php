<?php
/**
 * 
 * 
 * @package commpart
 */

function commpart_add_admin_page() {
    //Generate Admin Page
	add_menu_page( "Community Partners Settings", __("CPartners"), 'manage_options', 'cp_admin', 'cp_theme_create_admin_page',
	get_template_directory_uri() . '/media/cp.png', 49 );

    //Generate Admin Sub Pages
	add_submenu_page( 'cp_admin', 'Community Partners Settings', __('Staff & Board'), 'manage_options', 'cp_admin', 'cp_theme_create_admin_page' );
	add_submenu_page( 'cp_admin', 'Community Partners Settings', __('About CP'), 'manage_options', 'cp_admin_about', 'cp_theme_create_admin_page_about' );
	add_submenu_page( 'cp_admin', 'Community Partners Settings', __('CP Partners & Links'), 'manage_options', 'cp_admin_lp', 'cp_theme_create_admin_page_lp' );
	add_submenu_page( 'cp_admin', 'Community Partners Settings', __('Programs & Services'), 'manage_options', 'cp_admin_ps', 'cp_theme_create_admin_page_ps' );
	add_submenu_page( 'cp_admin', 'Community Partners Settings', __('News'), 'manage_options', 'cp_admin_news', 'cp_theme_create_admin_page_news' );
	add_submenu_page( 'cp_admin', 'Community Partners Settings', __('Volunteers'), 'manage_options', 'cp_admin_vols', 'cp_theme_create_admin_page_vols' );
	add_submenu_page( 'cp_admin', 'Community Partners Settings', __('Stay Updated'), 'manage_options', 'cp_admin_update', 'cp_theme_create_admin_page_update' );
	//add_submenu_page();

	add_action( 'admin_init', 'commpart_staff_settings' );
	add_action( 'admin_init', 'commpart_about_settings' );
	add_action( 'admin_init', 'commpart_links_settings' );
	add_action( 'admin_init', 'commpart_news_settings' );
	add_action( 'admin_init', 'commpart_progs_settings' );
	add_action( 'admin_init', 'commpart_vols_settings' );
	add_action( 'admin_init', 'commpart_update_settings' );
}
add_action( 'admin_menu', 'commpart_add_admin_page' );

//template admin pages
function cp_theme_create_admin_page() {
	require_once( get_template_directory() . '/inc/templates/commpart-admin.php' );
}
function cp_theme_create_admin_page_about() {
	require_once( get_template_directory() . '/inc/templates/commpart-admin-about.php' );
}
function cp_theme_create_admin_page_lp() {
	require_once( get_template_directory() . '/inc/templates/commpart-admin-links.php' );
}
function cp_theme_create_admin_page_ps() {
    /**
     * 
     * cp_service_name array
     * cp_partner_name array
     * register_setting( $group, 'cp_the_program_name' );
     * register_setting( $group, 'cp_the_program_photo' );
     * register_setting( $group, 'cp_the_service_name' );
     * register_setting( $group, 'cp_the_service_in_program' );
     * register_setting( $group, 'cp_the_service_photo' );
     */
    $program_name = esc_attr( get_option( 'cp_the_program_name' ) );
    $program_photo = esc_attr( get_option( 'cp_the_program_photo' ) );
    $service_name = esc_attr( get_option( 'cp_the_service_name' ) );
    $service_service_in_program = esc_attr( get_option( 'cp_the_service_program' ) );
    $service_service_photo = esc_attr( get_option( 'cp_the_service_photo' ) );
    $cp_programs_names = esc_attr( get_option('cp_programs_names') );
//    $cp_services_names = $cp_programs_names[$cp_the_program_name]['cp_services_names'];
    $cp_programs_names = esc_attr( get_option('cp_programs_names') );
	require_once( get_template_directory() . '/inc/templates/commpart-admin-progs.php' );
}
function cp_theme_create_admin_page_news() {
	require_once( get_template_directory() . '/inc/templates/commpart-admin-news.php' );
}
function cp_theme_create_admin_page_vols() {
	require_once( get_template_directory() . '/inc/templates/commpart-admin-vols.php' );
}
function cp_theme_create_admin_page_update() {
	require_once( get_template_directory() . '/inc/templates/commpart-admin-update.php' );
}

//custom sttings
function commpart_about_settings() {
    $page = 'commpart_about';
    $group = $page. '-group';
    $callback = 'commpart_about';
    $section = 'commpart_about_options';

    register_setting( $group, 'cp_mission' );
    register_setting( $group, 'cp_vision' );
    register_setting( $group, 'cp_values' );
    register_setting( $group, 'cp_service_area' );
    register_setting( $group, 'cp_service_area_map' );
    register_setting( $group, 'cp_service_eligiability' );
    register_setting( $group, 'cp_history' );

    add_settings_section($section, __('Community Partners - About'), $section, $page );
    add_settings_field( 'cp_mission', __('CP Mission'), $callback, $page, $section, array( 'cp_mission' ) );
    add_settings_field( 'cp_vision', __('CP Vision'), $callback, $page, $section, array( 'cp_vision' ) );
    add_settings_field( 'cp_values', __('CP Values'), $callback, $page, $section, array( 'cp_values' ) );
    add_settings_field( 'cp_service_area', __('CP Service Area'), $callback, $page, $section, array( 'cp_service_area' ) );
    add_settings_field( 'cp_service_area_map', __('CP Service Area Map'), $callback . '_map', $page, $section, array( 'cp_service_area_map' ) );
    add_settings_field( 'cp_service_eligiability', __('CP Service Eligiability'), $callback, $page, $section, array( 'cp_service_area' ) );
    add_settings_field( 'cp_history', __('CP History'), $callback, $page, $section, array( 'cp_history' ) );

}
function commpart_update_settings() {
    $page = 'commpart_update';
    $group = $page . '-group';
    $callback = $page;
    $section = $page . '_options';

    register_setting( $group, 'cp_home_update_1_title' );
    register_setting( $group, 'cp_home_update_1_text' );
    register_setting( $group, 'cp_home_update_2_title' );
    register_setting( $group, 'cp_home_update_2_text' );
    register_setting( $group, 'cp_home_update_3_title' );
    register_setting( $group, 'cp_home_update_3_text' );

    add_settings_section( $section . "_1", __('Update #1'), $section, $page );
    add_settings_field( 'cp_home_update_1_title', __('Title'), $callback, $page, $section . "_1", array('title', '1') );
    add_settings_field( 'cp_home_update_1_text', __('Text'), $callback, $page, $section . "_1", array('text', '1') );

    add_settings_section( $section . "_2", __('Update #2'), $section, $page );
    add_settings_field( 'cp_home_update_2_title', __('Title'), $callback, $page, $section . "_2", array('title', '2') );
    add_settings_field( 'cp_home_update_2_text', __('Text'), $callback, $page, $section . "_2", array('text', '2') );

    add_settings_section( $section . "_3", __('Update #3'), $section, $page );
    add_settings_field( 'cp_home_update_3_title', __('Title'), $callback, $page, $section . "_3", array('title', '3') );
    add_settings_field( 'cp_home_update_3_text', __('Text'), $callback, $page, $section . "_3", array('text', '3') );
}
function commpart_staff_settings() {
    $page = 'commpart_staff';
    $group = $page. '-group';
    
    //register settings for staff
    register_setting( $group, 'cp_staff_list' );
    register_setting( $group, 'cp_ed_name' );
    register_setting( $group, 'cp_ed_title' );
    register_setting( $group, 'cp_ed_bio' );
    register_setting( $group, 'cp_ed_photo' );
    register_setting( $group, 'cp_ed_phone' );
    register_setting( $group, 'cp_ed_email' );
    register_setting( $group, 'cp_vc_name' );
    register_setting( $group, 'cp_vc_title' );
    register_setting( $group, 'cp_vc_bio' );
    register_setting( $group, 'cp_vc_photo' );
    register_setting( $group, 'cp_vc_phone' );
    register_setting( $group, 'cp_vc_email' );
    register_setting( $group, 'cp_cc_name' );
    register_setting( $group, 'cp_cc_title' );
    register_setting( $group, 'cp_cc_bio' );
    register_setting( $group, 'cp_cc_photo' );
    register_setting( $group, 'cp_cc_phone' );
    register_setting( $group, 'cp_cc_email' );
    register_setting( $group, 'cp_hwc_name' );
    register_setting( $group, 'cp_hwc_title' );
    register_setting( $group, 'cp_hwc_bio' );
    register_setting( $group, 'cp_hwc_photo' );
    register_setting( $group, 'cp_hwc_phone' );
    register_setting( $group, 'cp_hwc_email' );
    register_setting( $group, 'cp_spc_name' );
    register_setting( $group, 'cp_spc_title' );
    register_setting( $group, 'cp_spc_bio' );
    register_setting( $group, 'cp_spc_photo' );
    register_setting( $group, 'cp_spc_phone' );
    register_setting( $group, 'cp_spc_email' );


    $section = $page . '_options';
    add_settings_section('commpart-staff-options', __('Community Partners Staff Details'), $section, $page );
    add_settings_field( 'cp-staff-list', __('Select Staff'), 'commpart_staff', 'commpart_staff_options', 'commpart-staff-options', array( 'cp-staff-list', 'cp_staff_list' ) );

    //Add the fields
    $section = $page . '_ed_options';
    add_settings_section($section, __('Executive Director Info'), 'commpart_staff_options', $page );

    add_settings_field( 'cp_ed_name', __('Name'), 'commpart_ed_name', $page, $section);
    add_settings_field( 'cp_ed_title', __('Title'), 'commpart_ed_title', $page, $section);
    add_settings_field( 'cp_ed_bio', __('Bio'), 'commpart_ed_bio', $page, $section);
    add_settings_field( 'cp_ed_photo', __('Photo'), 'commpart_photo', $page, $section, array( 'cp_ed_photo' ));
    add_settings_field( 'cp_ed_phone', __('Phone'), 'commpart_ed_phone', $page, $section);
    add_settings_field( 'cp_ed_email', __('Email'), 'commpart_ed_email', $page, $section);

    $section = $page . '_vc_options';
    add_settings_section($section, __('Volunteer Coordinator Info'), 'commpart_staff_options', $page );

    add_settings_field( 'cp_vc_name', __('Name'), 'commpart_vc_name', $page, $section);
    add_settings_field( 'cp_vc_title', __('Title'), 'commpart_vc_title', $page, $section);
    add_settings_field( 'cp_vc_bio', __('Bio'), 'commpart_vc_bio', $page, $section);
    add_settings_field( 'cp_vc_photo', __('Photo'), 'commpart_photo', $page, $section, array( 'cp_vc_photo' ));
    add_settings_field( 'cp_vc_phone', __('Phone'), 'commpart_vc_phone', $page, $section);
    add_settings_field( 'cp_vc_email', __('Email'), 'commpart_vc_email', $page, $section);

    $section = $page . '_cc_options';
    add_settings_section($section, __('Caregiver Counselor Info'), 'commpart_staff_options', $page );

    add_settings_field( 'cp_cc_name', __('Name'), 'commpart_cc_name', $page, $section);
    add_settings_field( 'cp_cc_title', __('Title'), 'commpart_cc_title', $page, $section);
    add_settings_field( 'cp_cc_bio', __('Bio'), 'commpart_cc_bio', $page, $section);
    add_settings_field( 'cp_cc_photo', __('Photo'), 'commpart_photo', $page, $section, array( 'cp_cc_photo' ));
    add_settings_field( 'cp_cc_phone', __('Phone'), 'commpart_cc_phone', $page, $section);
    add_settings_field( 'cp_cc_email', __('Email'), 'commpart_cc_email', $page, $section);

    $section = $page . '_hwc_options';
    add_settings_section($section, __('Health & Wellness Coordinator Info'), 'commpart_staff_options', $page );

    add_settings_field( 'cp_hwc_name', __('Name'), 'commpart_hwc_name', $page, $section);
    add_settings_field( 'cp_hwc_title', __('Title'), 'commpart_hwc_title', $page, $section);
    add_settings_field( 'cp_hwc_bio', __('Bio'), 'commpart_hwc_bio', $page, $section);
    add_settings_field( 'cp_hwc_photo', __('Photo'), 'commpart_photo', $page, $section, array( 'cp_hwc_photo' ));
    add_settings_field( 'cp_hwc_phone', __('Phone'), 'commpart_hwc_phone', $page, $section);
    add_settings_field( 'cp_hwc_email', __('Email'), 'commpart_hwc_email', $page, $section);

    $section = $page . '_spc_options';
    add_settings_section($section, __('Social Programming Coordinator Info'), 'commpart_staff_options', $page );

    add_settings_field( 'cp_spc_name', __('Name'), 'commpart_spc_name', $page, $section);
    add_settings_field( 'cp_spc_title', __('Title'), 'commpart_spc_title', $page, $section);
    add_settings_field( 'cp_spc_bio', __('Bio'), 'commpart_spc_bio', $page, $section);
    add_settings_field( 'cp_spc_photo', __('Photo'), 'commpart_photo', $page, $section, array( 'cp_spc_photo' ));
    add_settings_field( 'cp_spc_phone', __('Phone'), 'commpart_spc_phone', $page, $section);
    add_settings_field( 'cp_spc_email', __('Email'), 'commpart_spc_email', $page, $section);
}
function commpart_links_settings() {
    $callback = 'commpart_link';
    $page = 'commpart_links';
    $section = 'commpart_partner_details';
    $group = 'links-settings-group';

    register_setting( $group, 'cp_the_partner_type' );
    register_setting( $group, 'cp_the_partner_org' );
    register_setting( $group, 'cp_the_partner_link' );
    register_setting( $group, 'cp_the_partner_logo' );

    add_settings_section($section, __('Community Partners Partner Details'), $section, $page );
    add_settings_field( 'cp_the_partner_type', __('Partner Type'), $callback, $page, $section, array('type'));
    add_settings_field( 'cp_the_partner_org', __('Partner Organization Name'), $callback, $page, $section, array('org'));
    add_settings_field( 'cp_the_partner_link', __('Partner Link URL'), $callback, $page, $section, array('link'));
    add_settings_field( 'cp_the_partner_logo', __('Partner Logo'), $callback, $page, $section, array('logo'));
}
function commpart_progs_settings() {
    $callback = 'commpart_program_listing';
    $page = 'commpart_progs';
    $prog_section = 'commpart_program_listing';
    $serv_section = 'commpart_service_listing';
    $group = 'program-settings-group';

    register_setting( $group, 'cp_the_program_name' );
    register_setting( $group, 'cp_the_program_about' );
    register_setting( $group, 'cp_the_program_photo' );
    register_setting( $group, 'cp_the_service_name' );
    register_setting( $group, 'cp_the_service_in_program' );
    register_setting( $group, 'cp_the_service_about' );
    register_setting( $group, 'cp_the_service_photo' );
    register_setting( $group, 'cp_the_current_program_name' );
    register_setting( $group, 'cp_the_current_service_name' );

    add_settings_section( $prog_section, __('Community Partners Program Details'), $prog_section, $page );
    add_settings_section( $serv_section, __('Community Partners Service Details'), $serv_section, $page );
    add_settings_field( 'cp_the_current_program_name', __("Select Program"), $callback, $page, $prog_section, array('program', 'name') );
    add_settings_field( 'cp_the_program_name', __("Program Name"), $callback, $page, $prog_section, array('program', 'name') );
    add_settings_field( 'cp_the_program_about', __("Program About"), $callback, $page, $prog_section, array('program', 'about') );
    add_settings_field( 'cp_the_program_photo', __("Program Photo"), $callback, $page, $prog_section, array('program', 'photo') );
    add_settings_field( 'cp_the_current_service_name', __("Select Service"), $callback, $page, $prog_section, array('service', 'name') );
    add_settings_field( 'cp_the_service_name', __("Service Name"), $callback, $page, $serv_section, array('service', 'name') );
    add_settings_field( 'cp_the_service_about', __("Service About"), $callback, $page, $serv_section, array('service', 'about') );
    add_settings_field( 'cp_the_service_in_program', __("Service is under Program"), $callback, $page, $serv_section, array('service', 'service_in_program') );
    add_settings_field( 'cp_the_service_photo', __("Service Photo"), $callback, $page, $serv_section, array('service', 'photo') );

}
function commpart_news_settings() {
    $callback = 'commpart_news';
    $page = 'commpart_news_and_press';
    $news_section = 'commpart_news';
    $press_section = 'commpart_press';
    $group = 'news-and-press-settings-group';

    register_setting( $group, 'cp_the_newsletter_name' );
    register_setting( $group, 'cp_the_newsletter_date' );
    register_setting( $group, 'cp_the_newsletter_uri' );
    register_setting( $group, 'cp_the_press_story' );
    register_setting( $group, 'cp_the_press_uri' );
    register_setting( $group, 'cp_the_press_date' );

    add_settings_section( $news_section, __('Newsletter Details'), $news_section, $page );
    add_settings_section( $press_section, __('Press Release Details'), $press_section, $page );
    add_settings_field( 'cp_the_newsletter_name', __('Newsletter Name'), $callback, $page, $news_section, array('newsletter', 'name') );
    add_settings_field( 'cp_the_newsletter_date', __('Newsletter Date'), $callback, $page, $news_section, array('newsletter', 'date') );
    add_settings_field( 'cp_the_newsletter_uri', __('Newsletter'), $callback, $page, $news_section, array('newsletter', 'uri') );
    add_settings_field( 'cp_the_press_name', __('Press Release Name'), $callback, $page, $press_section, array('press', 'name') );
    add_settings_field( 'cp_the_press_date', __('Press Release Date'), $callback, $page, $press_section, array('press', 'date') );
    add_settings_field( 'cp_the_press_uri', __('Press Release'), $callback, $page, $press_section, array('press', 'uri') );
}
function commpart_vols_settings() {
    $callback = 'commpart_volunteer';
    $page = 'commpart_vols';
    $section = 'commpart_volunteer_form';

    register_setting( 'volunteer-settings-group', 'cp_vols_email' );
    register_setting( 'volunteer-settings-group', 'cp_vols_app' );
    register_setting( 'volunteer-settings-group', 'cp_vols_opp' );
    register_setting( 'volunteer-settings-group', 'cp_vols_photo_album' );
    register_setting( 'volunteer-settings-group', 'cp_vols_bgcheck' );

    add_settings_section( $section, __('Community Partners Volunteering Form'), $section, $page );
    add_settings_field( 'cp_vols_email', __('Email for Receiving Applications'), $callback, $page, $section, array('email') );
    add_settings_field( 'cp_vols_app', __('Application for Download'), $callback, $page, $section, array('app') );
    add_settings_field( 'cp_vols_opp', __('Volunteer Opportunities'), $callback, $page, $section, array('opp') );
    add_settings_field( 'cp_vols_photo_album', __('Volunteering Photos'), $callback, $page, $section, array('photo_album') );
    add_settings_field( 'cp_vols_bgcheck', __('Background Check for Download'), $callback, $page, $section, array('bgcheck') );

}

function commpart_staff_options() {
    //echo 'Customize Community Partners Staff details';
}
function commpart_about_options() {

}
function commpart_partner_details() {
    //echo '<h2></h2>'
}
function commpart_volunteer_form() {

}
function commpart_service_listing() {

}
function commpart_press() {

}
function commpart_update_options() {

}
function commpart_update_options_1() {

}
function commpart_update_options_2() {

}
function commpart_update_options_3() {

}

function commpart_ed_name() {
    $ed_name = esc_attr( get_option( 'cp_ed_name' ) );
    echo '<input type="text" name="cp_ed_name" value="'.$ed_name.'" placeholder="Name">';
}
function commpart_ed_title() {
    $ed_title = esc_attr( get_option( 'cp_ed_title' ) );
    echo '<input type="text" name="cp_ed_title" value="'.$ed_title.'" placeholder="Title">';
}
function commpart_ed_bio() {
    $ed_bio = esc_attr( get_option( 'cp_ed_bio' ) );
    echo '<textarea name="cp_ed_bio">'.$ed_bio.'</textarea>';
}
function commpart_ed_phone() {
    $ed_phone = esc_attr( get_option( 'cp_ed_phone' ) );
    echo '<input type="text" name="cp_ed_phone" value="'.$ed_phone.'" placeholder="(###) ###-#### x ###">';
}
function commpart_ed_email() {
    $ed_email = esc_attr( get_option( 'cp_ed_email' ) );
    echo '<input type="text" name="cp_ed_email" value="'.$ed_email.'" placeholder="your_email@gmail.com">';
}

function commpart_vc_name() {
    $vc_name = esc_attr( get_option( 'cp_vc_name' ) );
    echo '<input type="text" name="cp_vc_name" value="'.$vc_name.'" placeholder="Name">';
}
function commpart_vc_title() {
    $vc_title = esc_attr( get_option( 'cp_vc_title' ) );
    echo '<input type="text" name="cp_vc_title" value="'.$vc_title.'" placeholder="Title">';
}
function commpart_vc_bio() {
    $vc_bio = esc_attr( get_option( 'cp_vc_bio' ) );
    echo '<textarea name="cp_vc_bio">'.$vc_bio.'</textarea>';
}
function commpart_vc_phone() {
    $vc_phone = esc_attr( get_option( 'cp_vc_phone' ) );
    echo '<input type="text" name="cp_vc_phone" value="'.$vc_phone.'" placeholder="(###) ###-#### x ###">';
}
function commpart_vc_email() {
    $vc_email = esc_attr( get_option( 'cp_vc_email' ) );
    echo '<input type="text" name="cp_vc_email" value="'.$vc_email.'" placeholder="your_email@gmail.com">';
}

function commpart_cc_name() {
    $cc_name = esc_attr( get_option( 'cp_cc_name' ) );
    echo '<input type="text" name="cp_cc_name" value="'.$cc_name.'" placeholder="Name">';
}
function commpart_cc_title() {
    $cc_title = esc_attr( get_option( 'cp_cc_title' ) );
    echo '<input type="text" name="cp_cc_title" value="'.$cc_title.'" placeholder="Title">';
}
function commpart_cc_bio() {
    $cc_bio = esc_attr( get_option( 'cp_cc_bio' ) );
    echo '<textarea name="cp_cc_bio">'.$cc_bio.'</textarea>';
}
function commpart_cc_phone() {
    $cc_phone = esc_attr( get_option( 'cp_cc_phone' ) );
    echo '<input type="text" name="cp_cc_phone" value="'.$cc_phone.'" placeholder="(###) ###-#### x ###">';
}
function commpart_cc_email() {
    $cc_email = esc_attr( get_option( 'cp_cc_email' ) );
    echo '<input type="text" name="cp_cc_email" value="'.$cc_email.'" placeholder="your_email@gmail.com">';
}

function commpart_hwc_name() {
    $hwc_name = esc_attr( get_option( 'cp_hwc_name' ) );
    echo '<input type="text" name="cp_hwc_name" value="'.$hwc_name.'" placeholder="Name">';
}
function commpart_hwc_title() {
    $hwc_title = esc_attr( get_option( 'cp_hwc_title' ) );
    echo '<input type="text" name="cp_hwc_title" value="'.$hwc_title.'" placeholder="Title">';
}
function commpart_hwc_bio() {
    $hwc_bio = esc_attr( get_option( 'cp_hwc_bio' ) );
    echo '<textarea name="cp_hwc_bio">'.$hwc_bio.'</textarea>';
}
function commpart_hwc_phone() {
    $hwc_phone = esc_attr( get_option( 'cp_hwc_phone' ) );
    echo '<input type="text" name="cp_hwc_phone" value="'.$hwc_phone.'" placeholder="(###) ###-#### x ###">';
}
function commpart_hwc_email() {
    $hwc_email = esc_attr( get_option( 'cp_hwc_email' ) );
    echo '<input type="text" name="cp_hwc_email" value="'.$hwc_email.'" placeholder="your_email@gmail.com">';
}

function commpart_spc_name() {
    $spc_name = esc_attr( get_option( 'cp_spc_name' ) );
    echo '<input type="text" name="cp_spc_name" value="'.$spc_name.'" placeholder="Name">';
}
function commpart_spc_title() {
    $spc_title = esc_attr( get_option( 'cp_spc_title' ) );
    echo '<input type="text" name="cp_spc_title" value="'.$spc_title.'" placeholder="Title">';
}
function commpart_spc_bio() {
    $spc_bio = esc_attr( get_option( 'cp_spc_bio' ) );
    echo '<textarea name="cp_spc_bio">'.$spc_bio.'</textarea>';
}
function commpart_spc_phone() {
    $spc_phone = esc_attr( get_option( 'cp_spc_phone' ) );
    echo '<input type="text" name="cp_spc_phone" value="'.$spc_phone.'" placeholder="(###) ###-#### x ###">';
}
function commpart_spc_email() {
    $spc_email = esc_attr( get_option( 'cp_spc_email' ) );
    echo '<input type="text" name="cp_spc_email" value="'.$spc_email.'" placeholder="your_email@gmail.com">';
}
function commpart_photo( $args ) {
    $photo_uri = esc_attr( get_option( $args[0] ) );
    echo '<input type="button" id="'.$args[0].'" class="button button-secondary upload-button photo" value="Choose Photo">';
    echo '<input type="hidden" name="'.$args[0].'" value="'.$photo_uri.'">';
}
function commpart_staff( $args ) {
    $staff_list = esc_attr( get_option( $args[0] ) );
    echo '<input type="select" id="'.$args[1].'">';
}

//function for partners form fields
function commpart_about( $args ) {
    $name = $args[0];
    $val = esc_attr( get_option( $name ));
    echo '<textarea name="'.$name.'">'.$val.'</textarea>';
}
function commpart_about_map( $args ) {
    $name = $args[0];
    $val = esc_attr( get_option( $name ));
    echo '<input type="button" id="'.$name.'" class="button button-secondary upload-button map" value="Choose Map">';
    echo '<input type="hidden" name="'.$name.'" value="'.$val.'">';
}
function commpart_link( $args ) {
    $name = 'cp_the_partner_'.$args[0];
    $val = esc_attr( get_option( $name ));
    if ( $name === 'cp_the_partner_logo' ) {
        echo '<input type="button" id="'.$name.'" class="button button-secondary upload-button logo" value="Choose Logo">';
        echo '<input type="hidden" name="'.$name.'" value="'.$val.'">';
        return;
    }
    if ( $name === 'cp_the_partner_type' ) {
        ?>
        <select name="<?php echo $name; ?>">
            <option value="cp_sponsor">Sponser</option>
            <option value="cp_funder">Funder</option>
            <option value="cp_partner">Partner</option>
            <option value="cp_link">Link</option>
        </select>
        <?php return;
    }
    echo '<input type="text" name="'.$name.'" value="'.$val.'" placeholder="'.$args[0].'">';
}
//function for news and publications
function commpart_news( $args ) {
    $name = "cp_the_" . $args[0] . '_' . $args[1];
    $val = esc_attr( get_option( $name ));
    if ( $args[1] === 'uri' ) {
        echo '<input type="button" id="'.$name.'" class="button button-secondary upload-button pdf" value="Choose Document">';
        echo '<input type="hidden" name="'.$name.'" value="'.$val.'">';
        return;
    }
    if( $name === 'cp_the__' ) return;
    echo '<input type="text" id="'.$name.'" placeholder="'.$args[0].' '.$args[1].'">';

}
//function for programs and services
function commpart_program_listing( $args ) {
    $name = "cp_the_" . $args[0] . '_' . $args[1];
    $val = esc_attr( get_option( $name ));
    if ( $args[1] === 'photo' ) {
        echo '<input type="button" id="'.$name.'" class="button button-secondary upload-button photo" value="Choose Photo">';
        echo '<input type="hidden" name="'.$name.'" value="'.$val.'">';
        return;
    }
    if ( $args[1] === 'about' ) {
        echo '<textarea id="'.$name.'" name="'.$name.'">'.$val.'</textarea>';
        return;
    }
    if( $name === 'cp_the__' ) return;
    ?>
    <?php if( $name === 'the_current_program_name' || $name === 'the_current_service_name' ) : ?>
        <select id="<?php echo $name; ?>" name="<?php echo $name ?>">
        <?php foreach( esc_attr( get_option('cp_program_slugs') ) as $program_slug ) : ?>
            <option value="<?php echo $program_slug; ?>"><?php echo $cp_programs_names[$program_slug]; ?></option>
        <?php endforeach; ?>
        </select>
    <?php endif; 
    echo '<input type="text" id="'.$name.'" placeholder="'.$args[0].'" name="'.$name.'">';


}
//function for volunteering page - the pdf application, the email to send application to, the pdf background check
function commpart_volunteer( $args ) {
    $val = esc_attr( get_option( 'cp_vol_'.$args[0] ) );
    if ( $args[0] === 'email' ) {
        echo '<input type="text" id=cp_vol_"'.$args[0].'" placeholder="mail@gmail.com">';
        return;
    }
    if ( $args[0] === 'opp' ) {
        echo '<textarea name="cp_vol_'.$args[0].'">'.$val.'</textarea>';
        return;
    }
    if ( $args[0] === 'photo_album' ) {
        echo '<input type="button" id="'.$val.'" class="button button-secondary upload-button album" value="Choose Photos">';
        echo '<input type="hidden" name="'.$val.'" value="'.$val.'">';
        return;
    }
    echo '<input type="button" id="'.$val.'" class="button button-secondary upload-button pdf" value="Choose PDF">';
    echo '<input type="hidden" name="'.$val.'" value="'.$val.'">';

}
function commpart_update( $args ) {
    echo '<input type="hidden" id="current_update" value="'.$args[1].'">';
   // $updates = esc_attr( get_option( 'cp_home_updates' );
    if ( $args[1] == -1 || $updates == null ) {
        $val = '';
    } else {
        $val = $updates[$args[1]][$args[0]];
    }
    if( $args[0] == 'title' ) {
        echo '<input type="text" name="'.$args[0].'_'.$args[1].'" value="'.$val.'" placeholder="'.$args[0].'">';
    } else {
        echo '<textarea name="'.$args[0].'_'.$args[1].'" ">'.$val.'</textarea>';
    }
}
/**
 * cp_program_name array
 * cp_service_name array
 * cp_partner_name array
 * cp_link_name array
 * cp_letter_date array
 * cp_press_title array
 * cp_staff_title array
 */