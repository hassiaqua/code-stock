<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width" />
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" href="<?php echo get_template_directory_uri() ; ?>/css/style.css">
<!-- タイムスタンプ -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css<?php echo '?' . filemtime( get_stylesheet_directory().'/css/style.css'); ?>">


<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri() ?>/img/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="48x48" href="<?php echo get_template_directory_uri(); ?>/img/favicon-48x48.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri() ?>/img/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri() ?>/img/favicon-16x16.png">
<link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/img/favicon.ico">

<meta name="keywords" content="">
<meta name="description" content="<?php echo og_description(); ?>">
<meta property="og:title" content="<?php echo og_title(); ?>" />
<meta property="og:type" content="<?php echo og_type(); ?>" />
<meta property="og:url" content="<?php echo permalink(); ?>" />
<meta property="og:image" content="<?php echo og_image(); ?>" />
<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
<meta property="og:description" content="<?php echo og_description(); ?>" />


<?php wp_head() ?>
</head>
<body>





<?php
//OGP用の関数 (functions.php)


// =========================================
// title
// =========================================
add_theme_support( 'title-tag' );

function change_title_separator( $sep ){
	$sep = '-';
	return $sep;
}
add_filter( 'document_title_separator', 'change_title_separator' );

function edit_document_title_parts ( $title ) {
	if ( is_home() || is_front_page() ) {
		unset( $title['tagline'] );
	}
	return $title;
}
add_filter( 'document_title_parts', 'edit_document_title_parts');

// =========================================
// URL
// =========================================
function permalink() {
	if ( is_home() || is_archive() || is_category() || is_tax() ) {
		$permalink = home_url($_SERVER["REQUEST_URI"]);
	}
	else {
		$permalink = get_the_permalink();
	}
	return $permalink;
}

// =========================================
// og title
// =========================================
function og_title() {
	if(is_front_page()) { //トップページ
		$title = get_bloginfo('name');
	}
	else {
		$title = get_the_title().'｜サイト名';
	}
	return $title;
}

// =========================================
// description
// =========================================
function og_description() {
	if( get_the_excerpt() ) {
		$description = get_the_excerpt();
	} else {
		$description = bloginfo('description');
	}
	return $description;
}

// =========================================
// ogp画像
// =========================================
function og_image() {
	if( is_single() ) {
		global $post;
		$image = get_field('image')['image1'];
		$ogpimage = $image['sizes']['ogp'];
	} else {
		$ogpimage = get_template_directory_uri().'/img/ogp.png';
	}
	return $ogpimage;
}

// =========================================
// og type
// =========================================
function og_type() {
	if(is_front_page()) {
		$og_type = 'website';
	} else {
		$og_type = 'article';
	}
	return $og_type;
}

?>