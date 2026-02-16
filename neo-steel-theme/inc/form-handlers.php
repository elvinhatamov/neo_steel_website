<?php
/**
 * Form Handlers
 *
 * @package NEO_STEEL
 */

/**
 * Handle Contact Form Submission
 */
function neo_steel_handle_contact_form() {
    // Verify nonce
    if (!isset($_POST['neo_steel_contact_nonce']) || !wp_verify_nonce($_POST['neo_steel_contact_nonce'], 'neo_steel_contact_form')) {
        wp_send_json_error(array('message' => 'Security check failed.'));
    }
    
    // Sanitize and validate inputs
    $name = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
    $subject = isset($_POST['subject']) ? sanitize_text_field($_POST['subject']) : '';
    $message = isset($_POST['message']) ? sanitize_textarea_field($_POST['message']) : '';
    
    // Validation
    $errors = array();
    
    if (empty($name)) {
        $errors[] = 'Name is required.';
    }
    
    if (empty($email) || !is_email($email)) {
        $errors[] = 'Valid email is required.';
    }
    
    if (empty($message)) {
        $errors[] = 'Message is required.';
    }
    
    if (!empty($errors)) {
        wp_send_json_error(array('message' => implode(' ', $errors)));
    }
    
    // Prepare email
    $to = get_option('admin_email');
    $email_subject = 'Contact Form: ' . $subject;
    $email_message = "Name: {$name}\n";
    $email_message .= "Email: {$email}\n";
    $email_message .= "Phone: {$phone}\n\n";
    $email_message .= "Message:\n{$message}";
    
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . get_bloginfo('name') . ' <' . $to . '>',
        'Reply-To: ' . $name . ' <' . $email . '>',
    );
    
    // Send email
    $sent = wp_mail($to, $email_subject, $email_message, $headers);
    
    if ($sent) {
        wp_send_json_success(array('message' => 'Thank you! Your message has been sent successfully.'));
    } else {
        wp_send_json_error(array('message' => 'Sorry, there was an error sending your message. Please try again.'));
    }
}
add_action('wp_ajax_neo_steel_contact_form', 'neo_steel_handle_contact_form');
add_action('wp_ajax_nopriv_neo_steel_contact_form', 'neo_steel_handle_contact_form');

/**
 * Handle Quote Request Form Submission
 */
function neo_steel_handle_quote_form() {
    // Verify nonce
    if (!isset($_POST['neo_steel_quote_nonce']) || !wp_verify_nonce($_POST['neo_steel_quote_nonce'], 'neo_steel_quote_form')) {
        wp_send_json_error(array('message' => 'Security check failed.'));
    }
    
    // Sanitize and validate inputs
    $name = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
    $company = isset($_POST['company']) ? sanitize_text_field($_POST['company']) : '';
    $project_type = isset($_POST['project_type']) ? sanitize_text_field($_POST['project_type']) : '';
    $service_interest = isset($_POST['service_interest']) ? sanitize_text_field($_POST['service_interest']) : '';
    $budget = isset($_POST['budget']) ? sanitize_text_field($_POST['budget']) : '';
    $timeline = isset($_POST['timeline']) ? sanitize_text_field($_POST['timeline']) : '';
    $specifications = isset($_POST['specifications']) ? sanitize_textarea_field($_POST['specifications']) : '';
    
    // Validation
    $errors = array();
    
    if (empty($name)) {
        $errors[] = 'Name is required.';
    }
    
    if (empty($email) || !is_email($email)) {
        $errors[] = 'Valid email is required.';
    }
    
    if (empty($project_type)) {
        $errors[] = 'Project type is required.';
    }
    
    if (empty($specifications)) {
        $errors[] = 'Project specifications are required.';
    }
    
    if (!empty($errors)) {
        wp_send_json_error(array('message' => implode(' ', $errors)));
    }
    
    // Prepare email
    $to = get_option('admin_email');
    $email_subject = 'Quote Request: ' . $project_type;
    $email_message = "Name: {$name}\n";
    $email_message .= "Email: {$email}\n";
    $email_message .= "Phone: {$phone}\n";
    $email_message .= "Company: {$company}\n\n";
    $email_message .= "Project Type: {$project_type}\n";
    $email_message .= "Service Interest: {$service_interest}\n";
    $email_message .= "Budget: {$budget}\n";
    $email_message .= "Timeline: {$timeline}\n\n";
    $email_message .= "Project Specifications:\n{$specifications}";
    
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . get_bloginfo('name') . ' <' . $to . '>',
        'Reply-To: ' . $name . ' <' . $email . '>',
    );
    
    // Send email
    $sent = wp_mail($to, $email_subject, $email_message, $headers);
    
    if ($sent) {
        wp_send_json_success(array('message' => 'Thank you! Your quote request has been submitted. We will contact you soon.'));
    } else {
        wp_send_json_error(array('message' => 'Sorry, there was an error submitting your request. Please try again.'));
    }
}
add_action('wp_ajax_neo_steel_quote_form', 'neo_steel_handle_quote_form');
add_action('wp_ajax_nopriv_neo_steel_quote_form', 'neo_steel_handle_quote_form');
