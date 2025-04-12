<?php
namespace EasyCMS_WP;

class API {
    public function __construct() {
        add_action('rest_api_init', array($this, 'register_routes'));
    }

    public function register_routes() {
        register_rest_route('easycms/v1', '/callback', array(
            'methods' => 'POST',
            'callback' => array($this, 'handle_callback'),
            'permission_callback' => '__return_true', // Allow public access
        ));
    }

    public function handle_callback(\WP_REST_Request $request) {
        $data = $request->get_json_params();
        
        // Log or process the callback data
        if (!empty($data)) {
            // Example: Log the data
            error_log(print_r($data, true));
            
            // Perform actions based on the callback data
            // Example: Update a product, category, or sync status
        }

        return new \WP_REST_Response(['status' => 'success'], 200);
    }
}