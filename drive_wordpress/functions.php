<?php


/* ----------------------------------------------------------------------------------- */
/* jQuery Enqueue */
/* ----------------------------------------------------------------------------------- */

function drive_enqueue_style() {
  //  wp_enqueue_style('drive-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', '', '', 'all');
  //  wp_enqueue_style('drive-superfish', get_template_directory_uri() . '/css/superfish.css', '', '', 'all');
    wp_enqueue_style('drive-fonts', get_template_directory_uri() . '/fonts/fonts.css', '', '', 'all');
    wp_enqueue_style('drive-style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'drive_enqueue_style');

function drive_enqueue_scripts() {
    if (!is_admin()) {
     //   wp_enqueue_script('drive-superfish', get_template_directory_uri() . '/js/superfish.min.js', array('jquery'));
     //   wp_enqueue_script('drive-modernizr', get_template_directory_uri() . '/js/modernizr.min.js', array('jquery'));
      //  wp_enqueue_script('drive-custom', get_template_directory_uri() . 'assets/js/custom.js', array('jquery'));
      //  wp_enqueue_script('drive-mobileslicknav', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array('jquery'), '', true);
        if (is_singular() and get_site_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }
}

add_action('wp_enqueue_scripts', 'drive_enqueue_scripts');
//
/**
 * Load plugin notification file
 */
	//add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'drive' ),
		'social'  => __( 'Social Links Menu', 'drive' ),
	) );
register_nav_menus( array(
        'secondary' => __( 'Primary Menu',      'drive' ),
        'social'  => __( 'Social Links Menu', 'drive' ),
    ) );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );

	/*
	 * Enable support for custom logo.
	 *
	 * @since Twenty Fifteen 1.5
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 248,
		'width'       => 248,
		'flex-height' => true,
	) );




function woodpecker_get_option($name) {
    $options = get_option('woodpecker_options');
    if (isset($options[$name]))
        return $options[$name];
}




function woodpecker_import_file($file, $post_id = 0, $import_date = 'file') {
    set_time_limit(120);
    // Initially, Base it on the -current- time.
    $time = current_time('mysql', 1);
//     Next, If it's post to base the upload off:
    $time = gmdate('Y-m-d H:i:s', @filemtime($file));
//     A writable uploads dir will pass this test. Again, there's no point overriding this one.
    if (!( ( $uploads = wp_upload_dir($time) ) && false === $uploads['error'] )) {
        return new WP_Error('upload_error', $uploads['error']);
    }
    $wp_filetype = wp_check_filetype($file, null);
    extract($wp_filetype);
    if ((!$type || !$ext ) && !current_user_can('unfiltered_upload')) {
        return new WP_Error('wrong_file_type', __('Sorry, this file type is not permitted for security reasons.', 'drive')); //A WP-core string..
    }
    $file_name = str_replace('\\', '/', $file);
    if (preg_match('|^' . preg_quote(str_replace('\\', '/', $uploads['basedir'])) . '(.*)$|i', $file_name, $mat)) {
        $filename = basename($file);
        $new_file = $file;
        $url = $uploads['baseurl'] . $mat[1];
        $attachment = get_posts(array('post_type' => 'attachment', 'meta_key' => '_wp_attached_file', 'meta_value' => ltrim($mat[1], '/')));
        if (!empty($attachment)) {
            return new WP_Error('file_exists', __('Sorry, That file already exists in the WordPress media library.', 'drive'));
        }
        //Ok, Its in the uploads folder, But NOT in WordPress's media library.
        if ('file' == $import_date) {
            $time = @filemtime($file);
            if (preg_match("|(\d+)/(\d+)|", $mat[1], $datemat)) { //So lets set the date of the import to the date folder its in, IF its in a date folder.
                $hour = $min = $sec = 0;
                $day = 1;
                $year = $datemat[1];
                $month = $datemat[2];
                // If the files datetime is set, and it's in the same region of upload directory, set the minute details to that too, else, override it.
                if ($time && date('Y-m', $time) == "$year-$month") {
                    list($hour, $min, $sec, $day) = explode(';', date('H;i;s;j', $time));
                }
                $time = mktime($hour, $min, $sec, $month, $day, $year);
            }
            $time = gmdate('Y-m-d H:i:s', $time);
            // A new time has been found! Get the new uploads folder:
            // A writable uploads dir will pass this test. Again, there's no point overriding this one.
            if (!( ( $uploads = wp_upload_dir($time) ) && false === $uploads['error'] ))
                return new WP_Error('upload_error', $uploads['error']);
            $url = $uploads['baseurl'] . $mat[1];
        }
    } else {
        $filename = wp_unique_filename($uploads['path'], basename($file));
        // copy the file to the uploads dir
        $new_file = $uploads['path'] . '/' . $filename;
        if (false === @copy($file, $new_file))
            return new WP_Error('upload_error', sprintf(__('The selected file could not be copied to %s.', 'drive'), $uploads['path']));
        // Set correct file permissions
        $stat = stat(dirname($new_file));
        $perms = $stat['mode'] & 0000666;
        @ chmod($new_file, $perms);
        // Compute the URL
        $url = $uploads['url'] . '/' . $filename;
        if ('file' == $import_date)
            $time = gmdate('Y-m-d H:i:s', @filemtime($file));
    }
    //Apply upload filters
    $return = apply_filters('wp_handle_upload', array('file' => $new_file, 'url' => $url, 'type' => $type));
    $new_file = $return['file'];
    $url = $return['url'];
    $type = $return['type'];
    $title = preg_replace('!\.[^.]+$!', '', basename($file));
    $content = '';

    if ($time) {
        $post_date_gmt = $time;
        $post_date = $time;
    } else {
        $post_date = current_time('mysql');
        $post_date_gmt = current_time('mysql', 1);
    }

    // Construct the attachment array
    $attachment = array(
        'post_mime_type' => $type,
        'guid' => $url,
        'post_parent' => $post_id,
        'post_title' => $title,
        'post_name' => $title,
        'post_content' => $content,
        'post_date' => $post_date,
        'post_date_gmt' => $post_date_gmt
    );
    $attachment = apply_filters('afs-import_details', $attachment, $file, $post_id, $import_date);
    //Win32 fix:
    $new_file = str_replace(strtolower(str_replace('\\', '/', $uploads['basedir'])), $uploads['basedir'], $new_file);
    // Save the data
    $id = wp_insert_attachment($attachment, $new_file, $post_id);
    if (!is_wp_error($id)) {
        $data = wp_generate_attachment_metadata($id, $new_file);
        wp_update_attachment_metadata($id, $data);
    }
    //update_post_meta( $id, '_wp_attached_file', $uploads['subdir'] . '/' . $filename );

    return $id;
}
add_action( 'init', 'codex_project_init' );
/**
 * Register a slide post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_project_init() {
	$labels = array(
		'name'               => _x( 'Slides', 'post type general name', 'drive' ),
		'singular_name'      => _x( 'Slide', 'post type singular name', 'drive' ),
		'menu_name'          => _x( 'Slides', 'admin menu', 'drive' ),
		'name_admin_bar'     => _x( 'Slide', 'add new on admin bar', 'drive' ),
		'add_new'            => _x( 'Add New', 'slide', 'drive' ),
		'add_new_item'       => __( 'Add New Slide', 'drive' ),
		'new_item'           => __( 'New Slide', 'drive' ),
		'edit_item'          => __( 'Edit Slide', 'drive' ),
		'view_item'          => __( 'View Slide', 'drive' ),
		'all_items'          => __( 'All Slides', 'drive' ),
		'search_items'       => __( 'Search Slides', 'drive' ),
		'parent_item_colon'  => __( 'Parent Slides:', 'drive' ),
		'not_found'          => __( 'No teams found.', 'drive' ),
		'not_found_in_trash' => __( 'No teams found in Trash.', 'drive' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'drive' ),
		    
            'public' => true, 
            'query_var'=> true, 
            'publicly_queryable'=> true,
            'show_ui' => true,
            'show_in_nav_menus' => false,
            'menu_position' => 5,
        
            'has_archive' => true,
            'supports' => array(
                    'title',
                    'author',
                    'thumbnail',
                    'revisions',
                    'comments',
                    'editor',
                    'excerpt')
         
	);

	register_post_type( 'slide', $args );
	$labels = array(
		'name'               => _x( 'Signs', 'post type general name', 'drive' ),
		'singular_name'      => _x( 'Sign', 'post type singular name', 'drive' ),
		'menu_name'          => _x( 'Signs', 'admin menu', 'drive' ),
		'name_admin_bar'     => _x( 'Sign', 'add new on admin bar', 'drive' ),
		'add_new'            => _x( 'Add New', 'sign', 'drive' ),
		'add_new_item'       => __( 'Add New Sign', 'drive' ),
		'new_item'           => __( 'New Sign', 'drive' ),
		'edit_item'          => __( 'Edit Sign', 'drive' ),
		'view_item'          => __( 'View Sign', 'drive' ),
		'all_items'          => __( 'All Signs', 'drive' ),
		'search_items'       => __( 'Search Signs', 'drive' ),
		'parent_item_colon'  => __( 'Parent Signs:', 'drive' ),
		'not_found'          => __( 'No teams found.', 'drive' ),
		'not_found_in_trash' => __( 'No teams found in Trash.', 'drive' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'drive' ),
		    
            'public' => true, 
            'query_var'=> true, 
            'publicly_queryable'=> true,
            'show_ui' => true,
            'show_in_nav_menus' => false,
            'menu_position' => 5,
        
            'has_archive' => true,
            'supports' => array(
                    'title',
                    'author',
                    'thumbnail',
                    'revisions',
                    'comments',
                    'editor',
                    'excerpt')
         
	);

	register_post_type( 'sign', $args );
	$labels = array(
		'name'               => _x( 'Educations', 'post type general name', 'drive' ),
		'singular_name'      => _x( 'Education', 'post type singular name', 'drive' ),
		'menu_name'          => _x( 'Educations', 'admin menu', 'drive' ),
		'name_admin_bar'     => _x( 'Education', 'add new on admin bar', 'drive' ),
		'add_new'            => _x( 'Add New', 'education', 'drive' ),
		'add_new_item'       => __( 'Add New Education', 'drive' ),
		'new_item'           => __( 'New Education', 'drive' ),
		'edit_item'          => __( 'Edit Education', 'drive' ),
		'view_item'          => __( 'View Education', 'drive' ),
		'all_items'          => __( 'All Educations', 'drive' ),
		'search_items'       => __( 'Search Educations', 'drive' ),
		'parent_item_colon'  => __( 'Parent Educations:', 'drive' ),
		'not_found'          => __( 'No teams found.', 'drive' ),
		'not_found_in_trash' => __( 'No teams found in Trash.', 'drive' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'drive' ),
		    
            'public' => true, 
            'query_var'=> true, 
            'publicly_queryable'=> true,
            'show_ui' => true,
            'show_in_nav_menus' => false,
            'menu_position' => 5,
        
            'has_archive' => true,
            'supports' => array(
                    'title',
                    'author',
                    'thumbnail',
                    'revisions',
                    'comments',
                    'editor',
                    'excerpt')
         
	);

	register_post_type( 'education', $args );
	$labels = array(
		'name'               => _x( 'Ourgoals', 'post type general name', 'drive' ),
		'singular_name'      => _x( 'Ourgoal', 'post type singular name', 'drive' ),
		'menu_name'          => _x( 'Ourgoals', 'admin menu', 'drive' ),
		'name_admin_bar'     => _x( 'Ourgoal', 'add new on admin bar', 'drive' ),
		'add_new'            => _x( 'Add New', 'ourgoal', 'drive' ),
		'add_new_item'       => __( 'Add New Ourgoal', 'drive' ),
		'new_item'           => __( 'New Ourgoal', 'drive' ),
		'edit_item'          => __( 'Edit Ourgoal', 'drive' ),
		'view_item'          => __( 'View Ourgoal', 'drive' ),
		'all_items'          => __( 'All Ourgoals', 'drive' ),
		'search_items'       => __( 'Search Ourgoals', 'drive' ),
		'parent_item_colon'  => __( 'Parent Ourgoals:', 'drive' ),
		'not_found'          => __( 'No teams found.', 'drive' ),
		'not_found_in_trash' => __( 'No teams found in Trash.', 'drive' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'drive' ),
		    
            'public' => true, 
            'query_var'=> true, 
            'publicly_queryable'=> true,
            'show_ui' => true,
            'show_in_nav_menus' => false,
            'menu_position' => 5,
        
            'has_archive' => true,
            'supports' => array(
                    'title',
                    'author',
                    'thumbnail',
                    'revisions',
                    'comments',
                    'editor',
                    'excerpt')
         
	);

	register_post_type( 'ourgoal', $args );
	$labels = array(
		'name'               => _x( 'FirstSigments', 'post type general name', 'drive' ),
		'singular_name'      => _x( 'FirstSigment', 'post type singular name', 'drive' ),
		'menu_name'          => _x( 'FirstSigments', 'admin menu', 'drive' ),
		'name_admin_bar'     => _x( 'FirstSigment', 'add new on admin bar', 'drive' ),
		'add_new'            => _x( 'Add New', 'firstsigment', 'drive' ),
		'add_new_item'       => __( 'Add New FirstSigment', 'drive' ),
		'new_item'           => __( 'New FirstSigment', 'drive' ),
		'edit_item'          => __( 'Edit FirstSigment', 'drive' ),
		'view_item'          => __( 'View FirstSigment', 'drive' ),
		'all_items'          => __( 'All FirstSigments', 'drive' ),
		'search_items'       => __( 'Search FirstSigments', 'drive' ),
		'parent_item_colon'  => __( 'Parent FirstSigments:', 'drive' ),
		'not_found'          => __( 'No teams found.', 'drive' ),
		'not_found_in_trash' => __( 'No teams found in Trash.', 'drive' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'drive' ),
		    
            'public' => true, 
            'query_var'=> true, 
            'publicly_queryable'=> true,
            'show_ui' => true,
            'show_in_nav_menus' => false,
            'menu_position' => 5,
        
            'has_archive' => true,
            'supports' => array(
                    'title',
                    'author',
                    'thumbnail',
                    'revisions',
                    'comments',
                    'editor',
                    'excerpt')
         
	);

	register_post_type( 'firstsigment', $args );
	
	$labels = array(
		'name'               => _x( 'SecondSigments', 'post type general name', 'drive' ),
		'singular_name'      => _x( 'SecondSigment', 'post type singular name', 'drive' ),
		'menu_name'          => _x( 'SecondSigments', 'admin menu', 'drive' ),
		'name_admin_bar'     => _x( 'SecondSigment', 'add new on admin bar', 'drive' ),
		'add_new'            => _x( 'Add New', 'secondsegment', 'drive' ),
		'add_new_item'       => __( 'Add New SecondSigment', 'drive' ),
		'new_item'           => __( 'New SecondSigment', 'drive' ),
		'edit_item'          => __( 'Edit SecondSigment', 'drive' ),
		'view_item'          => __( 'View SecondSigment', 'drive' ),
		'all_items'          => __( 'All SecondSigments', 'drive' ),
		'search_items'       => __( 'Search SecondSigments', 'drive' ),
		'parent_item_colon'  => __( 'Parent SecondSigments:', 'drive' ),
		'not_found'          => __( 'No teams found.', 'drive' ),
		'not_found_in_trash' => __( 'No teams found in Trash.', 'drive' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'drive' ),
		    
            'public' => true, 
            'query_var'=> true, 
            'publicly_queryable'=> true,
            'show_ui' => true,
            'show_in_nav_menus' => false,
            'menu_position' => 5,
        
            'has_archive' => true,
            'supports' => array(
                    'title',
                    'author',
                    'thumbnail',
                    'revisions',
                    'comments',
                    'editor',
                    'excerpt')
         
	);

	register_post_type( 'secondsegment', $args );
		
	$labels = array(
		'name'               => _x( 'Schedules', 'post type general name', 'drive' ),
		'singular_name'      => _x( 'Schedule', 'post type singular name', 'drive' ),
		'menu_name'          => _x( 'Schedules', 'admin menu', 'drive' ),
		'name_admin_bar'     => _x( 'Schedule', 'add new on admin bar', 'drive' ),
		'add_new'            => _x( 'Add New', 'schedule', 'drive' ),
		'add_new_item'       => __( 'Add New Schedule', 'drive' ),
		'new_item'           => __( 'New Schedule', 'drive' ),
		'edit_item'          => __( 'Edit Schedule', 'drive' ),
		'view_item'          => __( 'View Schedule', 'drive' ),
		'all_items'          => __( 'All Schedules', 'drive' ),
		'search_items'       => __( 'Search Schedules', 'drive' ),
		'parent_item_colon'  => __( 'Parent Schedules:', 'drive' ),
		'not_found'          => __( 'No teams found.', 'drive' ),
		'not_found_in_trash' => __( 'No teams found in Trash.', 'drive' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'drive' ),
		    
            'public' => true, 
            'query_var'=> true, 
            'publicly_queryable'=> true,
            'show_ui' => true,
            'show_in_nav_menus' => false,
            'menu_position' => 5,
        
            'has_archive' => true,
            'supports' => array(
                    'title',
                    'author',
                    'thumbnail',
                    'revisions',
                    'comments',
                    'editor',
                    'excerpt')
         
	);

	register_post_type( 'schedule', $args );
  }



function drive_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Footer', 'drive' ),
		'id' => 'sidebar_1',
		'description' => __( 'The main sidebar appears on the right on each page except the front page template', 'wpb' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
       register_sidebar( array(
        'name' => __( 'Address', 'drive' ),
        'id' => 'address',
        'description' => __( 'The main sidebar appears on the right on each page except the front page template', 'wpb' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) ); 
	register_sidebar( array(
        'name' => __( 'Email', 'drive' ),
        'id' => 'email',
        'description' => __( 'The main sidebar appears on the right on each page except the front page template', 'wpb' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) ); 
	register_sidebar( array(
        'name' => __( 'Phone', 'drive' ),
        'id' => 'phone',
        'description' => __( 'The main sidebar appears on the right on each page except the front page template', 'wpb' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) ); 
        register_sidebar( array(
        'name' => __( 'social links', 'drive' ),
        'id' => 'scoial',
        'description' => __( 'The main sidebar appears on the right on each page except the front page template', 'wpb' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );  

	}

add_action( 'widgets_init', 'drive_widgets_init' );

