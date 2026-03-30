# Timber Homes - WordPress Theme

A premium, modern WordPress theme designed specifically for American-style timber home construction companies. Features a clean, professional design with full responsiveness and comprehensive business functionality.

## 🎯 Theme Features

- **Modern & Professional Design**: Clean, elegant layout with premium typography and color scheme
- **Fully Responsive**: Optimized for mobile, tablet, and desktop devices
- **Custom Post Type**: Built-in Projects post type for showcasing your portfolio
- **Contact Form**: Integrated AJAX contact form with email notifications
- **SEO Optimized**: Semantic HTML5 markup and proper heading structure
- **Accessibility Ready**: WCAG compliant with proper ARIA labels and keyboard navigation
- **Performance Optimized**: Lightweight code and optimized assets
- **Translation Ready**: Fully internationalized and ready for translation
- **Customizer Integration**: Easy customization through WordPress Customizer
- **Widget Areas**: Multiple widget-ready areas including sidebar and 4 footer sections

## 📋 Table of Contents

1. [Installation](#installation)
2. [Theme Setup](#theme-setup)
3. [Page Templates](#page-templates)
4. [Custom Post Types](#custom-post-types)
5. [Customization](#customization)
6. [Recommended Plugins](#recommended-plugins)
7. [Content Examples](#content-examples)
8. [Assets & Resources](#assets--resources)
9. [Support](#support)

## 🚀 Installation

### Method 1: WordPress Admin Panel

1. Download the theme ZIP file
2. Go to **Appearance > Themes > Add New**
3. Click **Upload Theme**
4. Choose the ZIP file and click **Install Now**
5. Click **Activate** once installation is complete

### Method 2: FTP Upload

1. Extract the theme ZIP file
2. Upload the `timber-homes` folder to `/wp-content/themes/`
3. Go to **Appearance > Themes** in WordPress admin
4. Find "Timber Homes" and click **Activate**

## ⚙️ Theme Setup

### 1. Initial Configuration

After activating the theme:

1. **Set Homepage**: Go to **Settings > Reading**
   - Select "A static page"
   - Choose your homepage for "Homepage"
   - Choose a blog page for "Posts page"

2. **Configure Menus**: Go to **Appearance > Menus**
   - Create a new menu
   - Add pages: Home, Services, Portfolio, About Us, Testimonials, Contact
   - Assign to "Primary Menu" location

3. **Set Permalink Structure**: Go to **Settings > Permalinks**
   - Select "Post name" for clean URLs

### 2. Customizer Settings

Go to **Appearance > Customize** to configure:

#### Contact Information
- **Phone Number**: Your business phone
- **Email Address**: Contact email
- **Address**: Physical business address
- **WhatsApp Number**: For WhatsApp button (format: 15551234567)

#### Social Media
- Facebook URL
- Instagram URL
- Pinterest URL
- LinkedIn URL

#### Site Identity
- Upload your logo
- Set site title and tagline
- Upload favicon

#### Header Image
- Upload a hero background image (recommended: 1920x1080px)

## 📄 Page Templates

### Front Page (Homepage)

The theme includes a custom front page template with these sections:

1. **Hero Section**: Large banner with call-to-action buttons
2. **Services Section**: 6 service cards with icons
3. **Portfolio Section**: Featured projects grid
4. **Why Choose Us**: Statistics and achievements
5. **Testimonials**: Client reviews
6. **Contact Section**: Contact form and information

### Blog Page

Standard blog layout with:
- 2-column grid layout
- Featured images
- Post meta (date, author, categories)
- Excerpt with "Read More" button

### Single Post

Full post view with:
- Featured image
- Post content
- Tags and categories
- Author information
- Comments section

### Single Project

Individual project page displaying:
- Project images
- Project details (location, size, year)
- Full description
- Related projects

## 🏗️ Custom Post Types

### Projects

The theme includes a custom "Projects" post type for your portfolio.

**To Add a New Project:**

1. Go to **Projects > Add New**
2. Enter project title
3. Add project description in the editor
4. Set featured image (recommended: 800x600px)
5. Fill in project details:
   - Location
   - Size (sq ft)
   - Year Completed
6. Assign project categories if needed
7. Click **Publish**

**Project Categories:**

Create categories like:
- Mountain Homes
- Lakeside Cabins
- Family Estates
- Modern Timber
- Rustic Lodges

## 🎨 Customization

### Color Scheme

Edit `/style.css` CSS variables to change colors:

```css
:root {
    --color-primary: #2c5f4f;      /* Main brand color */
    --color-secondary: #d4a574;    /* Accent color */
    --color-accent: #8b6f47;       /* Secondary accent */
}
```

### Typography

The theme uses:
- **Headings**: Playfair Display (serif)
- **Body**: Inter (sans-serif)

To change fonts, edit the Google Fonts import in `functions.php`:

```php
wp_enqueue_style('timber-homes-fonts', 'https://fonts.googleapis.com/css2?family=YourFont&display=swap');
```

### Custom CSS

Add custom CSS through:
- **Appearance > Customize > Additional CSS**
- Or create `/css/custom.css` and enqueue in `functions.php`

## 🔌 Recommended Plugins

### Essential Plugins

1. **Contact Form 7** or **WPForms**
   - Purpose: Advanced contact forms
   - Free version available

2. **Yoast SEO** or **Rank Math**
   - Purpose: SEO optimization
   - Free version available

3. **Advanced Custom Fields (ACF)**
   - Purpose: Enhanced custom fields for projects
   - Free version available
   - Pro recommended for more features

### Optional Enhancement Plugins

4. **Elementor** or **Beaver Builder**
   - Purpose: Page builder for custom layouts
   - Free version available

5. **Smush** or **ShortPixel**
   - Purpose: Image optimization
   - Free version available

6. **WP Rocket** or **W3 Total Cache**
   - Purpose: Caching and performance
   - WP Rocket is premium, W3 Total Cache is free

7. **Click to Chat** or **Joinchat**
   - Purpose: WhatsApp integration
   - Free

8. **Testimonials Widget**
   - Purpose: Manage testimonials
   - Free

9. **Portfolio Gallery**
   - Purpose: Enhanced portfolio features
   - Free version available

10. **Google Maps Widget**
    - Purpose: Add maps to contact section
    - Free

## 📝 Content Examples

### Service Descriptions

#### Custom Home Design
"Work with our expert architects to design your perfect timber home. We create personalized floor plans that match your lifestyle, preferences, and budget while maintaining authentic American timber aesthetics."

#### Full Construction
"From foundation to roof, we handle every aspect of your timber home construction. Our skilled craftsmen use premium materials and time-tested techniques to ensure exceptional quality and durability."

#### Sustainable Materials
"We source certified sustainable timber from responsible forests. Our eco-friendly approach ensures your home is not only beautiful but also environmentally responsible and energy-efficient."

### Project Examples

#### Mountain Retreat
- **Location**: Colorado Springs, CO
- **Size**: 3,200 sq ft
- **Description**: "Luxurious 4-bedroom timber home nestled in the Rocky Mountains, featuring vaulted ceilings, stone fireplace, and panoramic mountain views."

#### Lakeside Cabin
- **Location**: Flathead Lake, MT
- **Size**: 1,800 sq ft
- **Description**: "Cozy 2-bedroom retreat with stunning lake views, wraparound deck, and rustic interior finishes."

### Testimonials

#### Client 1
"Working with Timber Homes was an absolute dream. From the initial design consultation to the final walkthrough, their team was professional, responsive, and incredibly skilled. Our mountain retreat is everything we hoped for and more."
- **Sarah & John Mitchell**, Colorado Springs, CO

#### Client 2
"We've lived in our timber home for three years now, and it still takes our breath away every single day. The quality of materials and attention to detail is exceptional."
- **David & Emily Thompson**, Bozeman, MT

### About Us Content

"Since 1995, Timber Homes has been crafting premium American-style timber homes across the Western United States. Our commitment to quality craftsmanship, sustainable practices, and customer satisfaction has made us the trusted choice for families seeking the warmth and beauty of authentic wooden homes.

With over 500 completed projects and 25+ years of experience, we combine traditional timber framing techniques with modern construction technology to create homes that are both timeless and efficient."

### FAQ Content

**Q: How long does it take to build a timber home?**
A: Typically 6-12 months depending on size and complexity. We provide detailed timelines during consultation.

**Q: Are timber homes energy efficient?**
A: Yes! Wood is a natural insulator. Combined with modern techniques, timber homes can be extremely energy-efficient.

**Q: Do you offer warranties?**
A: Absolutely. We provide comprehensive warranties on all structural work and materials.

**Q: Can you build in any location?**
A: We primarily serve the Western United States but can discuss projects in other regions.

## 🎨 Assets & Resources

### Required Images

Create an `/images/` folder with these assets:

#### Logo
- **File**: `logo.svg` or `logo.png`
- **Size**: 400x100px (flexible)
- **Format**: SVG preferred, PNG with transparency

#### Hero Image
- **File**: `hero-timber-home.jpg`
- **Size**: 1920x1080px
- **Content**: Beautiful timber home exterior

#### Project Images
- **Files**: `project-*.jpg`
- **Size**: 800x600px minimum
- **Quantity**: 6-12 images
- **Content**: Various timber home projects

#### Placeholder Images
- **File**: `placeholder-project.jpg`
- **Size**: 800x600px
- **File**: `avatar-placeholder.jpg`
- **Size**: 200x200px

### Icon Libraries

The theme uses **Font Awesome 6.4.0** (included via CDN)

Common icons used:
- `fa-home` - Home/building
- `fa-hammer` - Construction
- `fa-tree` - Nature/sustainability
- `fa-tools` - Renovation
- `fa-pencil-ruler` - Design
- `fa-shield-alt` - Warranty
- `fa-phone` - Contact
- `fa-envelope` - Email
- `fa-map-marker-alt` - Location

### Fonts

**Google Fonts** (loaded automatically):
- **Playfair Display**: Headings (700, 800 weights)
- **Inter**: Body text (400, 500, 600, 700 weights)

## 📱 Responsive Breakpoints

The theme uses these breakpoints:

```css
/* Desktop: Default (1200px+) */
/* Tablet: 1024px and below */
/* Mobile: 768px and below */
/* Small Mobile: 480px and below */
```

## 🔧 File Structure

```
timber-homes/
├── css/
│   └── (additional stylesheets)
├── js/
│   └── main.js
├── images/
│   └── (theme images)
├── inc/
│   └── (additional PHP includes)
├── template-parts/
│   ├── content.php
│   ├── content-project.php
│   └── content-none.php
├── footer.php
├── front-page.php
├── functions.php
├── header.php
├── index.php
├── README.md
├── screenshot.png
├── style.css
└── template-demo.html
```

## 🐛 Troubleshooting

### Projects Not Showing

1. Go to **Settings > Permalinks**
2. Click **Save Changes** (this flushes rewrite rules)
3. Projects should now appear

### Contact Form Not Working

1. Verify email settings in **Settings > General**
2. Check spam folder for test emails
3. Consider installing WP Mail SMTP plugin

### Menu Not Appearing

1. Go to **Appearance > Menus**
2. Create a menu and add pages
3. Assign to "Primary Menu" location
4. Save menu

### Images Not Displaying

1. Verify images are uploaded to `/images/` folder
2. Check file names match those in template files
3. Regenerate thumbnails using plugin

## 📞 Support

### Documentation
- Theme documentation: See this README
- WordPress Codex: https://codex.wordpress.org/
- WordPress Support: https://wordpress.org/support/

### Customization Services
For custom development or modifications, consider hiring:
- WordPress developers on Upwork or Fiverr
- Local web development agencies
- WordPress-specific development firms

## 📄 License

This theme is licensed under the GNU General Public License v2 or later.

## 🎉 Credits

- **Fonts**: Google Fonts (Playfair Display, Inter)
- **Icons**: Font Awesome 6.4.0
- **Framework**: WordPress 6.0+
- **Developed by**: Timber Homes Team

## 📋 Changelog

### Version 1.0.0
- Initial release
- Custom homepage template
- Projects custom post type
- Contact form integration
- Responsive design
- Customizer options
- Widget areas
- SEO optimization

---

**Thank you for choosing Timber Homes WordPress Theme!**

For questions or support, please refer to the documentation above or contact your web developer.
