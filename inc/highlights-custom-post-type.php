<?php

class Highlight
{
    public $labels;
    public $args;
    public $custom_post_type = "highlight";

    public function __construct()
    {
        $this->setLabels();
        $this->setArgs();
        $this->register();
    }

    public function setLabels()
    {
        $this->labels = array(
            'name'          => 'Destaques',
            'singular_name' => 'Destaque',
            'menu_name'     => 'Destaques',
            'all_items'     => 'Todos os destaques',
            'add_new_item'  => 'Novo destaque',
            'add_new'       => 'Novo',
            'edit_item'     => 'Alterar destaque',
            'search_items'  => 'Procurar destaque'
        );
    }

    public function setArgs()
    {
        $this->args = array(
            'labels'             => $this->labels,
            'description'        => "Posts em destaque que aparecem no site",
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array('slug' => $this->custom_post_type),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 5,
            'supports'           => array('title', 'editor', 'thumbnail', 'custom-fields'),
            'menu_icon'          => 'dashicons-book-alt'
        );
    }

    public function register()
    {
        register_post_type($this->custom_post_type, $this->args);
    }
}

new Highlight();

function rock_highlights_query()
{

    $args = array(
        'post_type'      => 'highlight',
        'posts_per_page' => 3,
        'order'          => 'DESC',
        'orderby'        => 'date',
        'post_status'    => 'publish'
    );

    $query = new WP_Query($args);

    return $query;
}
