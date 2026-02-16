/**
 * NEO STEEL Forms JavaScript
 * Handles form validation and AJAX submission
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        // Initialize form tabs
        initFormTabs();
        
        // Initialize form handlers
        initContactForm();
        initQuoteForm();
    });

    /**
     * Form Tabs
     */
    function initFormTabs() {
        $('.tab-btn').on('click', function() {
            var tabId = $(this).data('tab');
            
            $('.tab-btn').removeClass('active');
            $(this).addClass('active');
            
            $('.form-tab').removeClass('active');
            $('#' + tabId).addClass('active');
        });
    }

    /**
     * Contact Form Handler
     */
    function initContactForm() {
        $('#contact-form-main').on('submit', function(e) {
            e.preventDefault();
            
            var $form = $(this);
            var $button = $form.find('button[type="submit"]');
            var $response = $form.find('.form-response');
            var buttonText = $button.html();
            
            // Disable button
            $button.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Sending...');
            $response.hide().removeClass('success error');
            
            // Get form data
            var formData = {
                action: 'neo_steel_contact_form',
                neo_steel_contact_nonce: $form.find('[name="neo_steel_contact_nonce"]').val(),
                name: $form.find('[name="name"]').val(),
                email: $form.find('[name="email"]').val(),
                phone: $form.find('[name="phone"]').val(),
                subject: $form.find('[name="subject"]').val(),
                message: $form.find('[name="message"]').val()
            };
            
            // Validate
            if (!validateContactForm(formData, $response)) {
                $button.prop('disabled', false).html(buttonText);
                return;
            }
            
            // Submit via AJAX
            $.ajax({
                url: neoSteelAjax.ajaxurl,
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        $response.addClass('success').html(response.data.message).fadeIn();
                        $form[0].reset();
                    } else {
                        $response.addClass('error').html(response.data.message).fadeIn();
                    }
                },
                error: function() {
                    $response.addClass('error').html('An error occurred. Please try again.').fadeIn();
                },
                complete: function() {
                    $button.prop('disabled', false).html(buttonText);
                    
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $response.fadeOut();
                    }, 5000);
                }
            });
        });
    }

    /**
     * Quote Form Handler
     */
    function initQuoteForm() {
        $('#quote-form-main').on('submit', function(e) {
            e.preventDefault();
            
            var $form = $(this);
            var $button = $form.find('button[type="submit"]');
            var $response = $form.find('.form-response');
            var buttonText = $button.html();
            
            // Disable button
            $button.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Submitting...');
            $response.hide().removeClass('success error');
            
            // Get form data
            var formData = {
                action: 'neo_steel_quote_form',
                neo_steel_quote_nonce: $form.find('[name="neo_steel_quote_nonce"]').val(),
                name: $form.find('[name="name"]').val(),
                email: $form.find('[name="email"]').val(),
                phone: $form.find('[name="phone"]').val(),
                company: $form.find('[name="company"]').val(),
                project_type: $form.find('[name="project_type"]').val(),
                service_interest: $form.find('[name="service_interest"]').val(),
                budget: $form.find('[name="budget"]').val(),
                timeline: $form.find('[name="timeline"]').val(),
                specifications: $form.find('[name="specifications"]').val()
            };
            
            // Validate
            if (!validateQuoteForm(formData, $response)) {
                $button.prop('disabled', false).html(buttonText);
                return;
            }
            
            // Submit via AJAX
            $.ajax({
                url: neoSteelAjax.ajaxurl,
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        $response.addClass('success').html(response.data.message).fadeIn();
                        $form[0].reset();
                    } else {
                        $response.addClass('error').html(response.data.message).fadeIn();
                    }
                },
                error: function() {
                    $response.addClass('error').html('An error occurred. Please try again.').fadeIn();
                },
                complete: function() {
                    $button.prop('disabled', false).html(buttonText);
                    
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $response.fadeOut();
                    }, 5000);
                }
            });
        });
    }

    /**
     * Validate Contact Form
     */
    function validateContactForm(data, $response) {
        var errors = [];
        
        if (!data.name || data.name.trim() === '') {
            errors.push('Name is required.');
        }
        
        if (!data.email || !isValidEmail(data.email)) {
            errors.push('Valid email is required.');
        }
        
        if (!data.message || data.message.trim() === '') {
            errors.push('Message is required.');
        }
        
        if (errors.length > 0) {
            $response.addClass('error').html(errors.join('<br>')).fadeIn();
            return false;
        }
        
        return true;
    }

    /**
     * Validate Quote Form
     */
    function validateQuoteForm(data, $response) {
        var errors = [];
        
        if (!data.name || data.name.trim() === '') {
            errors.push('Name is required.');
        }
        
        if (!data.email || !isValidEmail(data.email)) {
            errors.push('Valid email is required.');
        }
        
        if (!data.project_type || data.project_type === '') {
            errors.push('Project type is required.');
        }
        
        if (!data.specifications || data.specifications.trim() === '') {
            errors.push('Project specifications are required.');
        }
        
        if (errors.length > 0) {
            $response.addClass('error').html(errors.join('<br>')).fadeIn();
            return false;
        }
        
        return true;
    }

    /**
     * Email Validation
     */
    function isValidEmail(email) {
        var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }

    /**
     * Real-time Form Validation
     */
    $('input[required], textarea[required], select[required]').on('blur', function() {
        var $field = $(this);
        var value = $field.val();
        
        if (!value || value.trim() === '') {
            $field.css('border-color', '#e74c3c');
        } else if ($field.attr('type') === 'email' && !isValidEmail(value)) {
            $field.css('border-color', '#e74c3c');
        } else {
            $field.css('border-color', '#27ae60');
        }
    });

    /**
     * Clear error styling on input
     */
    $('input, textarea, select').on('input change', function() {
        var $field = $(this);
        if ($field.val()) {
            $field.css('border-color', '');
        }
    });

})(jQuery);
