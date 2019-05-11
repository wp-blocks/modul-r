<?php

// Register Custom Post Type
function custom_post_type() {

$labels = array(
'name'                  => 'CustomPosts',
'singular_name'         => 'CustomPost',
'menu_name'             => 'CustomPosts',
'name_admin_bar'        => 'CustomPosts',
'archives'              => 'Archivio CustomPosts',
'attributes'            => 'Attributi CustomPosts',
'parent_item_colon'     => 'CustomPost genitore',
'all_items'             => 'Tutti i CustomPosts',
'add_new_item'          => 'Aggiungi un nuovo CustomPost',
'add_new'               => 'Aggiungi nuovo',
'new_item'              => 'Nuovo CustomPost',
'edit_item'             => 'Modifica CustomPost',
'update_item'           => 'Aggiorna CustomPost',
'view_item'             => 'Vedi CustomPost',
'view_items'            => 'Vedi CustomPosts',
'search_items'          => 'Cerca CustomPosts',
'not_found'             => 'CustomPost non trovato',
'not_found_in_trash'    => 'CustomPost non trovato nel cestino',
'featured_image'        => 'Immagine in evidenza',
'set_featured_image'    => 'Imposta l\'immagine in evidenza',
'remove_featured_image' => 'Rimuovi immagine in evidenza',
'use_featured_image'    => 'Usa come immagine in evidenza',
'insert_into_item'      => 'Inserisci nel CustomPost',
'uploaded_to_this_item' => 'caricato nel CustomPost',
'items_list'            => 'Lista CustomPosts',
'items_list_navigation' => 'Navigazione Lista CustomPosts',
'filter_items_list'     => 'Filtra Lista CustomPosts',
);
$args = array(
'label'                 => 'CustomPost',
'description'           => 'Post Type Description',
'labels'                => $labels,
'supports'              => array( 'title', 'editor', 'thumbnail' ),
'taxonomies'            => array( 'post_tag' ),
'hierarchical'          => false,
'public'                => true,
'show_ui'               => true,
'show_in_menu'          => true,
'menu_position'         => 5,
'menu_icon'             => 'dashicons-admin-appearance',
'show_in_admin_bar'     => true,
'show_in_nav_menus'     => true,
'can_export'            => true,
'has_archive'           => true,
'exclude_from_search'   => false,
'publicly_queryable'    => true,
'capability_type'       => 'post',
);
register_post_type( 'CustomPosts', $args );

}
add_action( 'init', 'custom_post_type', 0 );