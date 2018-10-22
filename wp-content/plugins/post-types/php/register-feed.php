<?php

function registerFeedType(){
  $args = array(
    'public' => true,
    'label'  => 'Feeds',
    'labels' => array(
      'add_new_item' => 'Feed toevoegen',
      'new_item' => 'Nieuwe feed',
      'view_item' => 'Bekijk feed',
      'view_items' => 'Bekijk feeds'
    ),
    'supports' => array('title')
  );
  register_post_type( 'feed', $args );
}
add_action( 'init', 'registerFeedType' );

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_related_post',
		'title' => 'related_post',
		'fields' => array (
      array (
				'key' => 'field_59b69138e29d9',
				'label' => 'Url',
				'name' => 'url',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_59b686c981d8b',
				'label' => 'Gerelateerde locatie',
				'name' => 'related_post',
				'type' => 'post_object',
				'required' => 1,
				'post_type' => array (
					0 => 'home',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_59b6870e261bc',
				'label' => 'Kanaal',
				'name' => 'type',
				'type' => 'select',
				'required' => 1,
				'choices' => array (
					'facebook' => 'facebook',
					'instagram' => 'instagram',
					'twitter' => 'twitter',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'feed',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

class JSON_API_Feed {

  var $url;
  var $type;
  var $relatedPost;

  function __construct($feed = null) {
    if ($feed) {
      $this->import_wp_object($feed);
    }
  }

  function import_wp_object($post_id) {
    $this->url = get_field('url', $post_id);
    $this->type = get_field('type', $post_id);
    $this->relatedPost = get_field('related_post', $post_id);
  }

}


?>
