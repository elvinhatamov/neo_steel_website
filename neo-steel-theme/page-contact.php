<?php
/**
 * Template Name: Contact Page
 *
 * @package NEO_STEEL
 */

get_header();
?>

<div class="page-contact">
    <!-- Page Hero -->
    <section class="page-hero" style="background: linear-gradient(135deg, var(--color-primary-navy) 0%, var(--color-secondary-blue) 100%); padding: 4rem 0; color: white;">
        <div class="container text-center">
            <h1><?php the_title(); ?></h1>
            <p class="hero-subtitle">Get in Touch - We're Here to Help</p>
            <?php neo_steel_breadcrumbs(); ?>
        </div>
    </section>

    <!-- Contact Information -->
    <section class="contact-info section">
        <div class="container">
            <div class="contact-info-grid">
                <div class="contact-info-item">
                    <div class="contact-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h3>Call Us</h3>
                    <p><a href="tel:+1234567890">+1 (234) 567-890</a></p>
                    <p>Mon-Fri: 8:00 AM - 6:00 PM</p>
                </div>
                
                <div class="contact-info-item">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3>Email Us</h3>
                    <p><a href="mailto:info@neosteel.com">info@neosteel.com</a></p>
                    <p><a href="mailto:quotes@neosteel.com">quotes@neosteel.com</a></p>
                </div>
                
                <div class="contact-info-item">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3>Visit Us</h3>
                    <p>[Address will be updated]</p>
                    <p>[City, State, ZIP]</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Forms Section -->
    <section class="contact-forms section section-light">
        <div class="container">
            <div class="forms-tabs">
                <button class="tab-btn active" data-tab="contact-form">Contact Us</button>
                <button class="tab-btn" data-tab="quote-form">Request a Quote</button>
            </div>
            
            <div class="forms-container">
                <!-- Contact Form -->
                <div id="contact-form" class="form-tab active">
                    <div class="form-header text-center">
                        <h2>Send Us a Message</h2>
                        <p>Have a question? We'd love to hear from you</p>
                    </div>
                    
                    <form class="neo-steel-form" id="contact-form-main">
                        <?php wp_nonce_field('neo_steel_contact_form', 'neo_steel_contact_nonce'); ?>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="contact_name">Your Name <span class="required">*</span></label>
                                <input type="text" id="contact_name" name="name" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="contact_email">Email Address <span class="required">*</span></label>
                                <input type="email" id="contact_email" name="email" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="contact_phone">Phone Number</label>
                                <input type="tel" id="contact_phone" name="phone">
                            </div>
                            
                            <div class="form-group">
                                <label for="contact_subject">Subject</label>
                                <input type="text" id="contact_subject" name="subject">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact_message">Message <span class="required">*</span></label>
                            <textarea id="contact_message" name="message" rows="6" required></textarea>
                        </div>
                        
                        <div class="form-response"></div>
                        
                        <button type="submit" class="btn btn-primary btn-large">
                            <i class="fas fa-paper-plane"></i> Send Message
                        </button>
                    </form>
                </div>
                
                <!-- Quote Request Form -->
                <div id="quote-form" class="form-tab">
                    <div class="form-header text-center">
                        <h2>Request a Quote</h2>
                        <p>Tell us about your project and we'll provide a detailed quote</p>
                    </div>
                    
                    <form class="neo-steel-form" id="quote-form-main">
                        <?php wp_nonce_field('neo_steel_quote_form', 'neo_steel_quote_nonce'); ?>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="quote_name">Your Name <span class="required">*</span></label>
                                <input type="text" id="quote_name" name="name" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="quote_email">Email Address <span class="required">*</span></label>
                                <input type="email" id="quote_email" name="email" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="quote_phone">Phone Number</label>
                                <input type="tel" id="quote_phone" name="phone">
                            </div>
                            
                            <div class="form-group">
                                <label for="quote_company">Company Name</label>
                                <input type="text" id="quote_company" name="company">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="quote_project_type">Project Type <span class="required">*</span></label>
                                <select id="quote_project_type" name="project_type" required>
                                    <option value="">Select Project Type</option>
                                    <option value="structural-steel">Structural Steel Fabrication</option>
                                    <option value="custom-metalwork">Custom Metalwork</option>
                                    <option value="steel-erection">Steel Erection</option>
                                    <option value="maintenance">Industrial Maintenance</option>
                                    <option value="welding">Welding Services</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="quote_service">Service Interest</label>
                                <input type="text" id="quote_service" name="service_interest" placeholder="e.g., Commercial Building, Warehouse">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="quote_budget">Estimated Budget</label>
                                <select id="quote_budget" name="budget">
                                    <option value="">Select Budget Range</option>
                                    <option value="under-50k">Under $50,000</option>
                                    <option value="50k-100k">$50,000 - $100,000</option>
                                    <option value="100k-250k">$100,000 - $250,000</option>
                                    <option value="250k-500k">$250,000 - $500,000</option>
                                    <option value="over-500k">Over $500,000</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="quote_timeline">Project Timeline</label>
                                <select id="quote_timeline" name="timeline">
                                    <option value="">Select Timeline</option>
                                    <option value="urgent">Urgent (ASAP)</option>
                                    <option value="1-3-months">1-3 Months</option>
                                    <option value="3-6-months">3-6 Months</option>
                                    <option value="6-12-months">6-12 Months</option>
                                    <option value="over-12-months">Over 12 Months</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="quote_specifications">Project Specifications <span class="required">*</span></label>
                            <textarea id="quote_specifications" name="specifications" rows="6" required placeholder="Please provide details about your project requirements, dimensions, materials, etc."></textarea>
                        </div>
                        
                        <div class="form-response"></div>
                        
                        <button type="submit" class="btn btn-primary btn-large">
                            <i class="fas fa-file-invoice"></i> Request Quote
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Placeholder -->
    <section class="contact-map">
        <div class="map-placeholder">
            <div class="map-overlay">
                <div class="map-content">
                    <i class="fas fa-map-marker-alt"></i>
                    <p>Map will be added here</p>
                    <small>Location details will be updated</small>
                </div>
            </div>
        </div>
    </section>

    <!-- Business Hours & Additional Info -->
    <section class="additional-info section section-dark">
        <div class="container">
            <div class="info-grid">
                <div class="info-box">
                    <h3><i class="fas fa-clock"></i> Business Hours</h3>
                    <ul>
                        <li>Monday - Friday: 8:00 AM - 6:00 PM</li>
                        <li>Saturday: 9:00 AM - 2:00 PM</li>
                        <li>Sunday: Closed</li>
                    </ul>
                </div>
                
                <div class="info-box">
                    <h3><i class="fas fa-headset"></i> Customer Support</h3>
                    <p>Our team is ready to assist you with any questions or concerns about your project.</p>
                    <p><strong>24/7 Emergency Support Available</strong></p>
                </div>
                
                <div class="info-box">
                    <h3><i class="fas fa-truck"></i> Service Area</h3>
                    <p>We serve clients nationwide with on-site fabrication and installation services.</p>
                    <p><strong>Free Consultation & Site Inspection</strong></p>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
get_footer();
