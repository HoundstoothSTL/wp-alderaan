<?php

//*** Put project specific functions here:

//*** Pull in Custom Post Types
//require_once('lib/custom_post_types/example.php');

//*** Pull in Custom Taxonomies
//require_once('lib/custom_taxonomies/example.php');

function json_getter($json) {
	$data = json_decode(file_get_contents($json), true);
	return $data;
}

//*** Remove auto <p></p> tags from Post Content
remove_filter('the_content', 'wpautop');

function rwb_related_posts() {
	global $post;
	$tags = wp_get_post_tags($post->ID);
	
	if ($tags) :
		$tag_ids = array();
		
		foreach($tags as $individual_tag) {
			$tag_ids[] = $individual_tag->term_id;
		}

		$args = array(
			'tag__in' => $tag_ids,
			'post__not_in' => array($post->ID),
			'posts_per_page' => 5
		);

	$q = new WP_Query( $args );

	$relatedData = array();

	while( $q->have_posts() ) : $q->the_post();
		$a = array(
			'title' => get_the_title(),
			'url' => get_permalink(),
			'thumb' => get_the_post_thumbnail( $post->ID ),
			'date' => get_the_date()
		);

		array_push($relatedData, $a);

	endwhile;
	endif;

	return $relatedData;

	wp_reset_query();
}

/*
 |----------------------------------------------------
 | OVERWRITE FILE UPLOADS
 |----------------------------------------------------
 | * If you upload a file in wordpress with a name 
 | * that already exists, it creates a new set of 
 | * uploads with an appended number.
 |----------------------------------------------------
*/

add_filter('wp_handle_upload_overrides','nonUniqueFilename');

function nonUniqueFilename($overrides){
    $overrides['test_form'] = false;
    $overrides['unique_filename_callback'] = 'nonUniqueFilenameCallback';
    return $overrides;
}

function nonUniqueFilenameCallback($directory, $name, $extension){
    $filename = $name . strtolower($extension);
    
    //remove old attachment
    removeOldAttach($filename);

    return $filename;
}

function removeOldAttach($filename){
    $arguments = array(
        'numberposts'   => -1,
        'meta_key'      => '_wp_attached_file',
        'meta_value'    => $filename,
        'post_type'     => 'attachment'
    );
    $Attachments_to_remove = get_posts($arguments);

    foreach($Attachments_to_remove as $a)
        wp_delete_attachment($a->ID, true);
}

add_filter( 'sanitize_file_name', 'filename_filter_wpse_28439', 10, 1 );

function filename_filter_wpse_28439( $name ) 
{
    $args = array(
        'numberposts'   => -1,
        'post_type'     => 'attachment',
        'meta_query' => array(
                array( 
                    'key' => '_wp_attached_file',
                    'value' => $name,
                    'compare' => 'LIKE'
                )
            )
    );
    $attachments_to_remove = get_posts( $args );

    foreach( $attachments_to_remove as $attach )
        wp_delete_attachment( $attach->ID, true );

    return $name;
}