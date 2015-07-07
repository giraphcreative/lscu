<?php


// init cmb2
require_once( 'cmb2/init.php' );



// add metabox(es)
function page_metaboxes( $meta_boxes ) {

    global $colors;

    // showcase metabox
    $title_metabox = new_cmb2_box( array(
        'id' => 'title_metabox',
        'title' => 'Large Title',
        'object_types' => array( 'page' ), // post type
        'context' => 'normal',
        'priority' => 'high',
    ));

    $title_metabox->add_field( array(
        'name' => 'Title',
        'id'   => CMB_PREFIX . 'large-title',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $title_metabox->add_field( array(
        'name' => 'Icon',
        'id'   => CMB_PREFIX . 'large-title-icon',
        'type' => 'file',
        'preview_size' => array( 30, 30 )
    ) );

    $title_metabox->add_field( array(
        'name' => 'Color',
        'id'   => CMB_PREFIX . 'large-title-color',
        'type' => 'select',
        'default' => 'navy',
        'options' => $colors
    ) );



    // showcase metabox
    $showcase_metabox = new_cmb2_box( array(
        'id' => 'showcase_metabox',
        'title' => 'Showcase',
        'object_types' => array( 'page', 'partner', 'event' ), // post type
        'context' => 'normal',
        'priority' => 'high',
    ) );

    $showcase_metabox_group = $showcase_metabox->add_field( array(
        'id' => CMB_PREFIX . 'showcase',
        'type' => 'group',
        'options' => array(
            'add_button' => __('Add Slide', 'cmb2'),
            'remove_button' => __('Remove Slide', 'cmb2'),
            'group_title'   => __( 'Slide {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable' => true, // beta
        )
    ) );

    $showcase_metabox->add_group_field( $showcase_metabox_group, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
    ) );

    $showcase_metabox->add_group_field( $showcase_metabox_group, array(
        'name' => 'Link',
        'id'   => 'link',
        'type' => 'text',
    ) );

    $showcase_metabox->add_group_field( $showcase_metabox_group, array(
        'name' => 'Image/Video',
        'id'   => 'image',
        'type' => 'file',
        'preview_size' => array( 200, 80 )
    ) );



    // job metabox
    $job_metabox = new_cmb2_box( array(
        'id' => 'job_metabox',
        'title' => 'Job',
        'object_types' => array( 'job' ), // post type
        'context' => 'normal',
        'priority' => 'high',
    ));

    $job_metabox->add_field( array(
        'name' => 'Region',
        'id'   => CMB_PREFIX . 'job_region',
        'type' => 'text',
    ) );

    $job_metabox->add_field( array(
        'name' => 'Company',
        'id'   => CMB_PREFIX . 'job_company',
        'type' => 'text',
    ) );

    $job_metabox->add_field( array(
        'name' => 'Job Type',
        'id'   => CMB_PREFIX . 'job_type',
        'type' => 'select',
        'options' => array(
            'Staff' => 'Staff',
            'Management' => 'Management'
        ),
        'default' => 'Staff'
    ) );

    $job_metabox->add_field( array(
        'name' => 'Education',
        'id'   => CMB_PREFIX . 'job_education',
        'type' => 'wysiwyg',
        'options' => array( 'textarea_rows' => 7 )
    ) );

    $job_metabox->add_field( array(
        'name' => 'Comments',
        'id'   => CMB_PREFIX . 'job_comments',
        'type' => 'wysiwyg',
        'options' => array( 'textarea_rows' => 7 )
    ) );

    $job_metabox->add_field( array(
        'name' => 'Contact Name',
        'id'   => CMB_PREFIX . 'job_contact_name',
        'type' => 'text'
    ) );

    $job_metabox->add_field( array(
        'name' => 'Contact Title',
        'id'   => CMB_PREFIX . 'job_contact_title',
        'type' => 'text'
    ) );

    $job_metabox->add_field( array(
        'name' => 'Contact Email',
        'id'   => CMB_PREFIX . 'job_contact_email',
        'type' => 'text_email'
    ) );

    $job_metabox->add_field( array(
        'name' => 'Contact Phone',
        'id'   => CMB_PREFIX . 'job_contact_phone',
        'type' => 'text'
    ) );

    $job_metabox->add_field( array(
        'name' => 'Contact Fax',
        'id'   => CMB_PREFIX . 'job_contact_fax',
        'type' => 'text'
    ) );

    $job_metabox->add_field( array(
        'name' => 'Job Expires',
        'id'   => CMB_PREFIX . 'job_expires',
        'type' => 'text_datetime_timestamp'
    ) );



    // event metabox
    $event_metabox = new_cmb2_box( array(
        'id' => 'event_metabox',
        'title' => 'Event',
        'object_types' => array( 'event' ), // post type
        'context' => 'normal',
        'priority' => 'high',
    ));

    $event_metabox->add_field( array(
        'name' => 'Type',
        'id'   => CMB_PREFIX . 'event_type',
        'type' => 'select',
        'default' => 'standard',
        'options' => array(
            'chapter' => 'Chapter Event',
            'standard' => 'Standard Event'
            'webinar' => 'Webinar',
            'workshop' => 'Workshop'
        )
    ) );

    $event_metabox->add_field( array(
        'name' => 'Start Date/Time',
        'id'   => CMB_PREFIX . 'event_start',
        'type' => 'text_datetime_timestamp'
    ) );

    $event_metabox->add_field( array(
        'name' => 'End Date/Time',
        'id'   => CMB_PREFIX . 'event_end',
        'type' => 'text_datetime_timestamp'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Early Bird Deadline',
        'id'   => CMB_PREFIX . 'event_early_date',
        'type' => 'text_datetime_timestamp'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Early Bird Price',
        'id'   => CMB_PREFIX . 'event_price_early',
        'type' => 'text_money'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Regular Price',
        'id'   => CMB_PREFIX . 'event_price',
        'type' => 'text_money'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Venue',
        'id'   => CMB_PREFIX . 'event_venue',
        'type' => 'text',
    ) );

    $event_metabox->add_field( array(
        'name' => 'Address',
        'id'   => CMB_PREFIX . 'event_address',
        'type' => 'text'
    ) );

    $event_metabox->add_field( array(
        'name' => 'City',
        'id'   => CMB_PREFIX . 'event_city',
        'type' => 'text_medium'
    ) );

    $event_metabox->add_field( array(
        'name' => 'State',
        'id'   => CMB_PREFIX . 'event_state',
        'type' => 'text_small'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Zipcode',
        'id'   => CMB_PREFIX . 'event_zipcode',
        'type' => 'text_small'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Email',
        'id'   => CMB_PREFIX . 'event_email',
        'type' => 'text_email'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Phone',
        'id'   => CMB_PREFIX . 'event_phone',
        'type' => 'text'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Fax',
        'id'   => CMB_PREFIX . 'event_fax',
        'type' => 'text'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Venue Website',
        'id'   => CMB_PREFIX . 'event_venue_website',
        'type' => 'text'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Hotel',
        'id'   => CMB_PREFIX . 'event_hotel',
        'type' => 'text',
    ) );

    $event_metabox->add_field( array(
        'name' => 'Hotel Address',
        'id'   => CMB_PREFIX . 'event_hotel_address',
        'type' => 'text'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Hotel City',
        'id'   => CMB_PREFIX . 'event_hotel_city',
        'type' => 'text_medium'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Hotel State',
        'id'   => CMB_PREFIX . 'event_hotel_state',
        'type' => 'text_small'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Hotel Zipcode',
        'id'   => CMB_PREFIX . 'event_hotel_zipcode',
        'type' => 'text_small'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Hotel Email',
        'id'   => CMB_PREFIX . 'event_hotel_email',
        'type' => 'text_email'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Hotel Phone',
        'id'   => CMB_PREFIX . 'event_hotel_phone',
        'type' => 'text'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Hotel Rate',
        'id'   => CMB_PREFIX . 'event_hotel_price',
        'type' => 'text_money'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Event Website',
        'id'   => CMB_PREFIX . 'event_website',
        'desc' => 'If populated, links from the calendar/listings will go directly to this URL instead of the event page on this website.',
        'type' => 'text'
    ) );



    // thumb showcase metabox
    $thumb_showcase_metabox = new_cmb2_box( array(
        'id' => 'thumb_showcase_metabox',
        'title' => 'The Hive',
        'object_types' => array( 'page' ), // post type
        'context' => 'normal',
        'priority' => 'high',
    ) );

    $thumb_showcase_metabox_group = $thumb_showcase_metabox->add_field( array(
        'id' => CMB_PREFIX . 'thumb_showcase',
        'type' => 'group',
        'options' => array(
            'add_button' => __('Add Thumb', 'cmb2'),
            'remove_button' => __('Remove Thumb', 'cmb2'),
            'group_title'   => __( 'Thumb {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable' => true, // beta
        )
    ) );

    $thumb_showcase_metabox->add_group_field( $thumb_showcase_metabox_group, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $thumb_showcase_metabox->add_group_field( $thumb_showcase_metabox_group, array(
        'name' => 'Subtitle',
        'id'   => 'subtitle',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $thumb_showcase_metabox->add_group_field( $thumb_showcase_metabox_group, array(
        'name' => 'Link',
        'id'   => 'link',
        'type' => 'text',
    ) );

    $thumb_showcase_metabox->add_group_field( $thumb_showcase_metabox_group, array(
        'name' => 'Image/Video',
        'id'   => 'image',
        'type' => 'file',
        'preview_size' => array( 200, 100 )
    ) );

    $thumb_showcase_metabox->add_group_field( $thumb_showcase_metabox_group, array(
        'name' => 'Color',
        'id'   => 'color',
        'type' => 'select',
        'default' => 'navy',
        'options' => $colors
    ) );

    $thumb_showcase_metabox->add_group_field( $thumb_showcase_metabox_group, array(
        'name' => 'Type',
        'id'   => 'type',
        'type' => 'select',
        'default' => 'normal',
        'options' => array(
            'normal' => 'Normal Link',
            'iframe' => 'Video/Map'
        )
    ) );



    // accordion metabox
    $accordion_metabox = new_cmb2_box( array(
        'id' => 'accordion_metabox',
        'title' => 'Accordions',
        'object_types' => array( 'page' ), // post type
        'context' => 'normal',
        'priority' => 'high',
    ) );

    $accordion_metabox_group = $accordion_metabox->add_field( array(
        'id' => CMB_PREFIX . 'accordion',
        'type' => 'group',
        'options' => array(
            'add_button' => __('Add Box', 'cmb'),
            'remove_button' => __('Remove Box', 'cmb'),
            'group_title'   => __( 'Accordion Box {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable' => true, // beta
        )
    ) );

    $accordion_metabox->add_group_field( $accordion_metabox_group, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
    ) );

    $accordion_metabox->add_group_field( $accordion_metabox_group, array(
        'name' => 'Color',
        'id'   => 'color',
        'type' => 'select',
        'default' => 'navy',
        'options' => $colors
    ) );

    $accordion_metabox->add_group_field( $accordion_metabox_group, array(
        'name' => 'Default State',
        'id'   => 'state',
        'type' => 'select',
        'default' => 'closed',
        'options' => array(
            'closed' => 'Closed',
            'open' => 'Open',
        )
    ) );

    $accordion_metabox->add_group_field( $accordion_metabox_group, array(
        'name' => 'Content',
        'id'   => 'content',
        'type' => 'wysiwyg',
        'options' => array( 'textarea_rows' => 7 )
    ) );



    // showcase metabox
    $showcase_footer_metabox = new_cmb2_box( array(
        'id' => 'showcase_footer_metabox',
        'title' => 'Footer Showcase',
        'object_types' => array( 'page' ), // post type
        'context' => 'normal',
        'priority' => 'high',
    ) );

    $showcase_footer_metabox_group = $showcase_footer_metabox->add_field( array(
        'id' => CMB_PREFIX . 'showcase_footer',
        'type' => 'group',
        'options' => array(
            'add_button' => __('Add Slide', 'cmb2'),
            'remove_button' => __('Remove Slide', 'cmb2'),
            'group_title'   => __( 'Slide {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable' => true, // beta
        )
    ) );

    $showcase_footer_metabox->add_group_field( $showcase_footer_metabox_group, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
    ) );

    $showcase_footer_metabox->add_group_field( $showcase_footer_metabox_group, array(
        'name' => 'Icon',
        'id'   => 'icon',
        'type' => 'file',
        'preview_size' => array( 40, 40 )
    ) );

    $showcase_footer_metabox->add_group_field( $showcase_footer_metabox_group, array(
        'name' => 'Link',
        'id'   => 'link',
        'type' => 'text',
    ) );

    $showcase_footer_metabox->add_group_field( $showcase_footer_metabox_group, array(
        'name' => 'Image/Video',
        'id'   => 'image',
        'type' => 'file',
        'preview_size' => array( 200, 80 )
    ) );

    $showcase_footer_metabox->add_group_field( $showcase_footer_metabox_group, array(
        'name' => 'Color',
        'id'   => 'color',
        'type' => 'select',
        'default' => 'navy',
        'options' => $colors
    ) );


}
add_filter( 'cmb2_init', 'page_metaboxes' );



// get CMB value
function get_cmb_value( $field ) {
    return get_post_meta( get_the_ID(), CMB_PREFIX . $field, 1 );
}


// get CMB value
function has_cmb_value( $field ) {
    $cval = get_cmb_value( $field );
    return ( !empty( $cval ) ? true : false );
}


// get CMB value
function show_cmb_value( $field ) {
    print get_cmb_value( $field );
}


// get CMB value
function show_cmb_wysiwyg_value( $field ) {
    print apply_filters( 'the_content', get_cmb_value( $field ) );
}



function cmb2_taxonomy_meta_initiate() {

    require_once( 'cmb2-taxonomy/Taxonomy_MetaData_CMB2.php' );

    global $colors;


    /**
     * Semi-standard CMB2 metabox/fields array
     */
    $meta_box = array(
        'id'         => 'cat_options',
        // 'key' and 'value' should be exactly as follows
        'show_on'    => array( 'key' => 'options-page', 'value' => array( 'unknown', ), ),
        'show_names' => true, // Show field names on the left
        'fields'     => array(
            array(
                'name' => 'Icon',
                'desc' => 'Select a product category icon',
                'id'   => 'icon',
                'type' => 'file',
            ),
            array(
                'name' => 'Color',
                'description' => 'Select a background color for the header.',
                'id'   => 'color',
                'type' => 'select',
                'default' => 'teal',
                'options' => $colors
            ),
            array(
                'name'    => 'Left Text/Ad',
                'id'      => 'left',
                'type'    => 'wysiwyg',
                'options' => array( 'textarea_rows' => 5, ),
            ),
        )
    );

    /**
     * Instantiate our taxonomy meta class
     */
    $cats = new Taxonomy_MetaData_CMB2( 'category', $meta_box, __( 'Category Settings', 'taxonomy-metadata' ) );

}
cmb2_taxonomy_meta_initiate();




?>