</main><!-- #main -->

<footer class="site-footer" id="colophon">
    <div class="container">
        <div class="footer-content">
            <?php
            // Display footer widgets
            for ($i = 1; $i <= 4; $i++) {
                if (is_active_sidebar('footer-' . $i)) {
                    echo '<div class="footer-column">';
                    dynamic_sidebar('footer-' . $i);
                    echo '</div>';
                }
            }
            
            // Default footer content if no widgets
            if (!is_active_sidebar('footer-1') && !is_active_sidebar('footer-2') && !is_active_sidebar('footer-3') && !is_active_sidebar('footer-4')) :
            ?>
                <div class="footer-widget">
                    <h3>NEO STEEL LTD.</h3>
                    <p><strong>FROM BLUEPRINT TO BRILLIANCE</strong></p>
                    <p>15 Years of Experience in Steel Manufacturing & Fabrication</p>
                </div>
                
                <div class="footer-widget">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                        <li><a href="<?php echo esc_url(home_url('/about')); ?>">About Us</a></li>
                        <li><a href="<?php echo esc_url(home_url('/services')); ?>">Services</a></li>
                        <li><a href="<?php echo esc_url(home_url('/projects')); ?>">Projects</a></li>
                        <li><a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a></li>
                    </ul>
                </div>
                
                <div class="footer-widget">
                    <h3>Our Services</h3>
                    <ul>
                        <li><a href="#">Structural Steel Fabrication</a></li>
                        <li><a href="#">Custom Metalwork</a></li>
                        <li><a href="#">Steel Erection</a></li>
                        <li><a href="#">Industrial Maintenance</a></li>
                        <li><a href="#">Welding Services</a></li>
                    </ul>
                </div>
                
                <div class="footer-widget">
                    <h3>Contact Information</h3>
                    <ul>
                        <li><i class="fas fa-phone"></i> <a href="tel:+1234567890">+1 (234) 567-890</a></li>
                        <li><i class="fas fa-envelope"></i> <a href="mailto:info@neosteel.com">info@neosteel.com</a></li>
                        <li><i class="fas fa-map-marker-alt"></i> [Address will be updated]</li>
                    </ul>
                    <div class="social-links">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo esc_html(date('Y')); ?> NEO STEEL LTD. All rights reserved. | 15 Years of Experience | FROM BLUEPRINT TO BRILLIANCE</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
