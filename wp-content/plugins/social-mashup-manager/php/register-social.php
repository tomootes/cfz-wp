<?php

function registerSocialType(){
  $args = array(
    'public' => true,
    'label'  => 'Socials',
    'labels' => array(
      'add_new_item' => 'Social toevoegen',
      'new_item' => 'Nieuwe social',
      'view_item' => 'Bekijk social',
      'view_items' => 'Bekijk socials'
    ),
    'supports' => array('title','editor')
  );
  register_post_type( 'social', $args );
}
add_action( 'init', 'registerSocialType' );

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_social-fields',
		'title' => 'Social fields',
		'fields' => array (
			array (
				'key' => 'field_59b7c6a997303',
				'label' => 'ID',
				'name' => 'sourceID',
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
				'key' => 'field_59b7c6df97304',
				'label' => 'ID van auteur',
				'name' => 'authorID',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_59b7c71697305',
				'label' => 'Naam van Auteur',
				'name' => 'authorName',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_59b7c72e97306',
				'label' => 'Foto van auteur',
				'name' => 'authorProfileImage',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_59b7c93f97308',
				'label' => 'Afbeelding',
				'name' => 'image',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_59b7caa99730b',
				'label' => 'Url',
				'name' => 'url',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
      array (
        'key' => 'field_59b7caa99730b',
        'label' => 'Type',
        'name' => 'url',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
      array (
				'key' => 'field_59b9001e97f69',
				'label' => 'Publiceerdatum',
				'name' => 'sourcePublishDate',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_59b9005c97f6a',
				'label' => 'Datum aangepast',
				'name' => 'sourceModifiedDate',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
      array (
        'key' => 'field_59b9005d97f6a',
        'label' => 'Type social',
        'name' => 'source',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_59b9005d97f6a',
        'label' => 'Source data',
        'name' => 'sourceData',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
      array (
				'key' => 'field_59b935f2eb2ee',
				'label' => 'Gerelateerde post',
				'name' => 'relatedPost',
				'type' => 'post_object',
				'post_type' => array (
					0 => 'all',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'social',
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

class JSON_API_Social {

  var $url;
  var $type;

  function __construct($feed = null) {
    if ($feed) {
      $this->import_wp_object($feed);
    }

  }

  function import_wp_object($post) {

    $this->id = (int) $post->ID;
    $this->text = get_post_field('post_content', $post->ID);
    $this->url = get_field('url', $post);
    $this->type = $post->post_type;
    $this->source = get_field('source',$post);
    $this->sourceID = get_field('sourceID',$post);
    $this->authorID = get_field('authorID',$post);
    $this->authorName = get_field('authorName',$post);
    $this->image = get_field('image',$post);
    $this->url = get_field('url',$post);
    $this->sourcePublishDate = get_field('sourcePublishDate',$post);
    $this->sourceModifiedDate = get_field('sourceModifiedDate',$post);
    $this->relatedPost = get_field('relatedPost',$post);
    $this->sourceData = get_field('sourceData',$post);


  }

}


?>
