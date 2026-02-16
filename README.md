# NEO STEEL LTD. WordPress Theme

A professional, custom WordPress theme for NEO STEEL LTD. - a steel manufacturing and fabrication company with 15 years of experience.

## Theme Features

- ✅ Custom WordPress theme with industrial steel aesthetics
- ✅ Responsive design (mobile, tablet, desktop)
- ✅ Custom post types (Projects, Services, Testimonials)
- ✅ Contact form with email notifications
- ✅ Quote request form with detailed fields
- ✅ Project gallery with filtering
- ✅ Testimonial slider
- ✅ Professional animations and transitions
- ✅ SEO-friendly structure
- ✅ Fast loading optimization
- ✅ Cross-browser compatible

## Requirements

- WordPress 5.0 or higher
- PHP 7.4 or higher
- MySQL 5.6 or higher

## Installation

### 1. Upload Theme

**Option A: Via WordPress Admin**
1. Download the theme as a ZIP file
2. Go to WordPress Admin → Appearance → Themes
3. Click "Add New" → "Upload Theme"
4. Choose the ZIP file and click "Install Now"
5. Click "Activate" once installed

**Option B: Via FTP**
1. Extract the theme folder
2. Upload `neo-steel-theme` folder to `/wp-content/themes/` directory
3. Go to WordPress Admin → Appearance → Themes
4. Find "NEO STEEL LTD" and click "Activate"

### 2. Initial Setup

After activating the theme:

1. **Set Up Menus**
   - Go to Appearance → Menus
   - Create a new menu called "Primary Menu"
   - Add pages: Home, About, Services, Projects, Contact
   - Set menu location to "Primary Menu"
   - Create a "Footer Menu" for footer links

2. **Create Pages**
   Create the following pages with the specified templates:
   
   - **Home** (Set as front page)
     - Go to Settings → Reading
     - Select "A static page" for front page
     - Choose "Home" page
   
   - **About** - Template: About Page
   - **Services** - Template: Services Page
   - **Projects** - Template: Projects Page
   - **Contact** - Template: Contact Page

3. **Upload Logo**
   - Go to Appearance → Customize → Site Identity
   - Upload your logo image
   - Set site title: "NEO STEEL LTD."
   - Set tagline: "FROM BLUEPRINT TO BRILLIANCE"

4. **Configure Email Settings**
   - Forms will send to the admin email
   - Go to Settings → General to verify admin email

## Adding Content

### Adding Projects

1. Go to WordPress Admin → Projects → Add New
2. Add project title and description
3. Set featured image (main project image)
4. Fill in project details:
   - Client Name
   - Completion Date
   - Location
   - Budget (optional)
5. Assign project categories
6. Publish

### Adding Services

1. Go to WordPress Admin → Services → Add New
2. Add service title and description
3. Set featured image
4. Add Font Awesome icon class (e.g., `fas fa-tools`)
   - Find icons at: https://fontawesome.com/icons
5. Publish

### Adding Testimonials

1. Go to WordPress Admin → Testimonials → Add New
2. Add testimonial content (the review text)
3. Fill in client details:
   - Client Name
   - Company
   - Position
   - Rating (1-5 stars)
4. Add client photo as featured image (optional)
5. Publish

### Project Categories

1. Go to Projects → Categories
2. Add categories like:
   - Structural Steel
   - Custom Metalwork
   - Steel Erection
   - Industrial Maintenance
   - Welding Services

## Customization

### Colors

The theme uses these color variables (in `style.css`):
```css
--color-primary-navy: #1a2942
--color-secondary-blue: #4a6fa5
--color-metallic-silver: #c0c0c0
--color-accent-gold: #b8860b
```

To change colors, edit the `:root` section in `style.css`.

### Typography

The theme uses:
- **Headings**: Montserrat font
- **Body**: Open Sans font

Fonts are loaded from Google Fonts.

### Contact Information

To update contact information:
1. Go to footer.php
2. Update placeholder phone, email, and address
3. Or use widgets in Appearance → Widgets → Footer areas

## Widget Areas

The theme includes:
- Sidebar (for blog posts)
- Footer Widget 1-4 (for footer columns)

Add widgets in Appearance → Widgets.

## Forms

### Contact Form
- Located on Contact page
- Sends email to admin
- Fields: Name, Email, Phone, Subject, Message

### Quote Request Form
- Located on Contact page (second tab)
- Sends detailed quote request email
- Fields: Name, Email, Phone, Company, Project Type, Budget, Timeline, Specifications

Both forms use AJAX for smooth submission without page reload.

## Troubleshooting

### Forms Not Working
1. Check that admin email is set correctly (Settings → General)
2. Ensure PHP mail() function is working on your server
3. Consider installing SMTP plugin for better email delivery

### Images Not Displaying
1. Make sure images are uploaded correctly
2. Check file permissions on uploads directory
3. Regenerate thumbnails using a plugin like "Regenerate Thumbnails"

### Menu Not Showing
1. Create a menu in Appearance → Menus
2. Assign it to "Primary Menu" location

### Theme Not Displaying Correctly
1. Clear browser cache
2. Clear WordPress cache (if using a caching plugin)
3. Check that all theme files were uploaded correctly

## Support & Documentation

For questions or issues:
- Review this README file
- Check WordPress Codex: https://codex.wordpress.org/
- Font Awesome Icons: https://fontawesome.com/icons

## Browser Compatibility

The theme is tested and compatible with:
- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Performance

The theme is optimized for performance:
- Minified CSS and JS (in production)
- Lazy loading for images
- Optimized image sizes
- Efficient database queries
- Minimal external dependencies

## Updates

### Updating Contact Details
1. Edit `footer.php` for footer contact info
2. Edit `page-contact.php` for contact page info
3. Consider using a child theme for customizations

### Adding Custom Styles
1. Create a child theme (recommended)
2. Or add custom CSS in Appearance → Customize → Additional CSS

## Credits

- **Theme Development**: NEO STEEL Development Team
- **Icons**: Font Awesome (https://fontawesome.com/)
- **Fonts**: Google Fonts (Montserrat, Open Sans)

## License

This theme is licensed under the GNU General Public License v2 or later.

---

**NEO STEEL LTD.** - FROM BLUEPRINT TO BRILLIANCE
15 Years of Excellence in Steel Manufacturing & Fabrication
