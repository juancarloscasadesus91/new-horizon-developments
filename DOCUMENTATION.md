# New Horizon Developments - Complete WordPress Theme Documentation

**Version:** 1.0.0  
**Theme:** New Horizon Developments  
**Style:** Luxury, Elegant, Premium  
**Industry:** Residential Development & Custom Home Construction

---

## 📑 Table of Contents

1. [Theme Information](#1-theme-information)
2. [Installation and Setup](#2-installation-and-setup)
3. [File Structure](#3-file-structure)
4. [Design and Style](#4-design-and-style)
5. [Page Templates](#5-page-templates)
6. [Special Pages Setup](#6-special-pages-setup)
7. [Custom Post Types](#7-custom-post-types)
8. [Customization](#8-customization)
9. [Recommended Plugins](#9-recommended-plugins)
10. [Optimization and Performance](#10-optimization-and-performance)
11. [SEO and Marketing](#11-seo-and-marketing)
12. [Troubleshooting](#12-troubleshooting)
13. [Launch Checklist](#13-launch-checklist)
14. [Instagram Feed Setup](#14-instagram-feed-setup)
15. [Portfolio Management](#15-portfolio-management)

---

# 1. Theme Information

## 🌟 Overview

New Horizon Developments is a premium WordPress theme designed specifically for luxury home construction companies and residential development businesses. It combines sophisticated design with complete functionality to showcase projects, teams, and services professionally.

## 🎨 Design Inspiration

The theme is inspired by high-end luxury home builders with:

- **Dark and sophisticated color scheme** (Black/Dark gray backgrounds)
- **Gold accents** (#c9a961, #d4af37) for premium feel
- **Elegant serif typography** (Cormorant Garamond)
- **Clean modern sans-serif** (Montserrat) for body text
- **Minimal refined aesthetic** with subtle borders and no rounded corners

## 🎯 Key Features

- ✅ **Modern & Professional Design**: Clean, elegant layout with premium typography
- ✅ **Fully Responsive**: Optimized for mobile, tablet, and desktop devices
- ✅ **Custom Post Types**: Projects and Team Members configurable from WordPress
- ✅ **Contact Form**: Integrated AJAX contact form with email notifications
- ✅ **SEO Optimized**: Semantic HTML5 markup and proper heading structure
- ✅ **Accessibility Ready**: WCAG compliant with proper ARIA labels and keyboard navigation
- ✅ **Performance Optimized**: Lightweight code and optimized assets
- ✅ **Translation Ready**: Fully internationalized
- ✅ **Customizer Integration**: Easy customization through WordPress Customizer
- ✅ **Widget Areas**: Multiple widget-ready areas

## 🎨 Color Palette

```css
/* Primary Colors */
--color-primary-dark: #0a0a0a    /* Deep Black */
--color-primary: #1a1a1a          /* Rich Black */
--color-secondary-gold: #c9a961   /* Elegant Gold */
--color-gold: #d4af37             /* Bright Gold */
--color-gold-light: #f4e4c1       /* Soft Gold */
--color-accent: #b8935f           /* Warm Gold */
--color-gray-dark: #2a2a2a        /* Dark Gray */
--color-gray: #6a6a6a             /* Medium Gray */
--color-white: #ffffff            /* White */
```

## ✨ Typography

**Headings:** Cormorant Garamond (Serif)
- Weights: 300, 400, 500, 600, 700
- Style: Elegant, refined, classic
- Usage: All headings, hero titles, section titles

**Body Text:** Montserrat (Sans-serif)
- Weights: 300, 400, 500, 600, 700
- Style: Modern, clean, readable
- Usage: Paragraphs, navigation, buttons

---

# 2. Installation and Setup

## 📦 Quick Start Guide

Follow these steps to get your website running in 30 minutes.

### Step 1: WordPress Installation

If you haven't installed WordPress yet:

1. **Create Database**
```sql
CREATE DATABASE wordpress1 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

2. **Configure wp-config.php**
   - Database name: `wordpress1`
   - Database user: `root`
   - Database password: Your MySQL password
   - Database host: `localhost`

3. **Run WordPress Installer**
   - Visit: `http://localhost/wordpress` or your domain
   - Follow the 5-minute installation wizard
   - Create admin account

### Step 2: Theme Installation

#### Method 1: WordPress Admin Panel (Recommended)

1. Go to **Appearance > Themes > Add New**
2. Click **Upload Theme**
3. Choose the `new-horizon-developments.zip` file
4. Click **Install Now**
5. Click **Activate** once installation is complete

#### Method 2: FTP Upload

1. Extract the theme ZIP file
2. Upload the `new-horizon-developments` folder to `/wp-content/themes/`
3. Go to **Appearance > Themes** in WordPress admin
4. Find "New Horizon Developments" and click **Activate**

### Step 3: Essential WordPress Settings

#### 3.1 Permalinks (IMPORTANT!)

1. Go to **Settings > Permalinks**
2. Select **Post name**
3. Click **Save Changes**

This enables clean URLs like: `yoursite.com/projects/mountain-retreat`

#### 3.2 Reading Settings

1. Go to **Settings > Reading**
2. Select **A static page**
3. Homepage: Choose "Home" or create a new page
4. Posts page: Choose "Blog" or create a new page
5. Click **Save Changes**

#### 3.3 General Settings

1. Go to **Settings > General**
2. Set **Site Title**: "New Horizon Developments" (or your company name)
3. Set **Tagline**: "Luxury Custom Home Construction"
4. Set **Admin Email**: your-email@domain.com
5. Set **Timezone**
6. Click **Save Changes**

### Step 4: Create Navigation Menu

#### 4.1 Create Pages First

Create these pages (Pages > Add New):

1. **Home** (can be blank, uses front-page.php template)
2. **Services** (optional content page)
3. **Projects** (will show projects - use Projects Page template)
4. **Team** (will show team - use Team Page template)
5. **About Us** (your company story)
6. **Contact** (contact information)
7. **Blog** (for news/articles)

#### 4.2 Build Menu

1. Go to **Appearance > Menus**
2. Click **Create a new menu**
3. Name it "Main Menu"
4. Add pages in this order:
   - Home
   - Services
   - Projects
   - Team
   - About Us
   - Blog
   - Contact
5. Check **Primary Menu** under "Display location"
6. Click **Save Menu**

### Step 5: Customize Theme Settings

#### 5.1 Upload Logo

1. Go to **Appearance > Customize > Site Identity**
2. Click **Select Logo**
3. Upload your logo (recommended: 400x100px, PNG with transparency, gold/white color)
4. Adjust logo size if needed
5. Click **Publish**

#### 5.2 Set Header Image

1. Go to **Appearance > Customize > Header Image**
2. Click **Add new image**
3. Upload hero background image (recommended: 1920x1080px, luxury home, dark/dusk lighting)
4. Click **Publish**

#### 5.3 Configure Contact Information

1. Go to **Appearance > Customize > Contact Information**
2. Fill in:
   - **Phone Number**: +1 (555) 123-4567
   - **Email Address**: info@yourdomain.com
   - **Address**: Your business address
   - **WhatsApp Number**: 15551234567 (no spaces or +)
3. Click **Publish**

#### 5.4 Add Social Media Links

1. Go to **Appearance > Customize > Social Media**
2. Add URLs for:
   - Facebook
   - Instagram
   - Pinterest
   - LinkedIn
3. Click **Publish**

---

# 3. File Structure

## 📁 Theme Structure

```
new-horizon-developments/
├── .github/
│   └── workflows/
│       └── deploy.yml              # Deployment configuration
├── css/
│   └── (additional stylesheets)
├── js/
│   └── main.js                     # JavaScript functionality
├── images/
│   └── (theme images - to be added)
├── inc/
│   └── (additional PHP includes)
├── template-parts/
│   ├── content.php                 # Blog post template
│   ├── content-project.php         # Project template
│   └── content-none.php            # No content template
├── footer.php                      # Footer template
├── front-page.php                  # Homepage template
├── functions.php                   # Theme functions
├── header.php                      # Header template
├── index.php                       # Main blog template
├── page-projects.php               # Projects page template
├── page-team.php                   # Team page template
├── single-project.php              # Single project template
├── single-team_member.php          # Single team member template
├── style.css                       # Main stylesheet
├── template-demo.html              # Static HTML demo
├── README.md                       # Original documentation
├── INSTALLATION-GUIDE.md           # Installation guide
├── THEME-SUMMARY.md               # Theme summary
├── THEME-INFO.md                  # Theme information
├── PROJECTS-PAGE-SETUP.md         # Projects page setup
├── TEAM-PAGE-SETUP.md             # Team page setup
└── DOCUMENTATION.md               # This file (complete documentation)
```

---

# 4. Design and Style

## 🎯 Design Elements

### Buttons

```css
/* Primary Button */
.btn-primary {
    background: transparent;
    border: 1px solid var(--color-gold);
    color: var(--color-gold);
    /* Fills gold on hover */
}

/* Secondary Button */
.btn-secondary {
    background: var(--color-gold);
    color: var(--color-primary);
    /* Lightens on hover */
}

/* Outline Button */
.btn-outline {
    border: 1px solid var(--color-gold);
    background: transparent;
    /* Fills on hover */
}
```

**Features:**
- No rounded corners (border-radius: 0)
- Smooth transitions
- Elegant hover effects

### Cards and Sections

- Dark gray backgrounds (#2a2a2a)
- Subtle gold borders (rgba(201, 169, 97, 0.1))
- No rounded corners
- Minimal shadows
- Hover effects: border color changes to gold

### Icons

- Square borders (no circles)
- Gold color (#c9a961)
- 1px borders
- Transparent backgrounds

### Navigation

- Uppercase text
- Letter spacing: 1px
- Gold underline on hover/active
- Dark background with blur effect
- Gold bottom border

## 📱 Responsive Breakpoints

```css
/* Desktop: Default (1200px+) */
/* Tablet: 1024px and below */
@media (max-width: 1024px) { ... }

/* Mobile: 768px and below */
@media (max-width: 768px) { ... }

/* Small Mobile: 480px and below */
@media (max-width: 480px) { ... }
```

## 🎨 CSS Classes Reference

### Layout Classes

```css
.container          /* Max-width container (1200px) */
.container-fluid    /* Full-width container */
.section            /* Standard section padding */
.grid               /* CSS Grid layout */
.grid-2             /* 2-column grid */
.grid-3             /* 3-column grid */
.grid-4             /* 4-column grid */
```

### Button Classes

```css
.btn                /* Base button */
.btn-primary        /* Primary button (gold outline) */
.btn-secondary      /* Secondary button (solid gold) */
.btn-outline        /* Outline button */
.btn-whatsapp       /* WhatsApp button (green) */
.btn-call           /* Call button */
```

### Typography Classes

```css
.text-center        /* Center align text */
.text-uppercase     /* Uppercase text */
.text-light         /* Light colored text */
.section-title      /* Section heading container */
.section-subtitle   /* Small uppercase subtitle */
```

### Animation Classes

```css
.reveal             /* Scroll reveal element */
.reveal.active      /* Revealed state */
.fade-in-up         /* Fade in from bottom */
```

---

# 5. Page Templates

## 📄 Front Page (Homepage)

**File:** `front-page.php`

### Included Sections:

1. **Hero Section** - Full-screen banner with CTA buttons
   - Title: "The Home You've Been Imagining Deserves the Right Team to Build It"
   - Subtitle: "Every home begins with understanding how you want to live."
   - Buttons: "Discover Our Process" and "View Our Work"

2. **Services Section** - 6 service cards with icons
   - Custom Home Design
   - Full Construction
   - Sustainable Materials
   - Renovation & Restoration
   - Interior Finishing
   - Warranty & Maintenance

3. **Portfolio Section** - Featured projects grid (pulls from Projects CPT)
   - Shows latest 6 projects
   - Hover effect with overlay

4. **Why Choose Us** - Statistics and achievements
   - Years of experience
   - Projects completed
   - Satisfied clients

5. **Testimonials** - Client reviews
   - Elegant card design
   - Client quotes

6. **Contact Section** - Contact form and information
   - AJAX form
   - Contact information
   - Map (optional)

## 📄 Projects Page

**File:** `page-projects.php`  
**Template:** Projects Page

### Features:

✅ **Top banner** - Hero section with "Our Projects" title  
✅ **Responsive grid** - Adapts to different screen sizes  
✅ **Enhanced hover effect:**
   - Image smooth zoom
   - Dark overlay appears from bottom
   - Project name in gold
   - Location with icon
   - Gold border on hover  
✅ **No gap between images** - Continuous elegant grid  
✅ **Consistent style** - Site's gold and black colors

### Differences from previous design:

**Before:**
- Information always visible
- Text over image
- Cluttered design

**Now:**
- Information only visible on hover
- Elegant overlay with gradient
- Project name highlighted in gold
- Smooth zoom animation on image
- Content transition from bottom

## 📄 Team Page

**File:** `page-team.php`  
**Template:** Team Page

### Features:

✅ **Responsive design** - Adapts to mobile, tablet and desktop  
✅ **Image overlay effect** - On hover over image shows:
   - Member biography
   - Email with icon
   - Phone with icon  
✅ **Site style** - Gold and black colors, square design  
✅ **Adaptive grid** - 3 columns on desktop, 1 on mobile  
✅ **Smooth animations** - Elegant hover transitions  
✅ **Hero section** - Top banner with title and description

## 📄 Blog/Archive

**File:** `index.php`

- 2-column grid layout
- Featured images
- Post excerpts
- Pagination

## 📄 Single Post

**File:** `content.php` (template part)

- Full post content
- Author information
- Categories and tags
- Comments section

---

# 6. Special Pages Setup

## 🏗️ Setup Projects Page

### Step 1: Create Projects page in WordPress

1. Go to WordPress admin panel
2. Navigate to **Pages > Add New**
3. Page title: **Projects** or **Our Projects**
4. In the right panel, look for **Page Attributes**
5. In **Template**, select **Projects Page**
6. Click **Publish**

### Step 2: Add page to header menu

1. Go to **Appearance > Menus**
2. Select your main menu
3. In the **Pages** section, check the **Projects** box
4. Click **Add to menu**
5. Drag and drop to order the menu
6. Click **Save Menu**

### Projects Management

Projects are managed from **Projects** in the WordPress panel:
- Add new projects
- Edit existing projects
- Upload images
- Configure location and details

All projects will appear automatically on this page.

## 👥 Setup Team Page

### Step 1: Create Team page

1. Go to WordPress admin panel
2. Navigate to **Pages > Add New**
3. Page title: **Team** or **Our Team**
4. In the right panel, look for **Page Attributes**
5. In **Template**, select **Team Page**
6. Click **Publish**

### Step 2: Add team members

1. In WordPress panel, you'll see a new **Team** menu (with group icon)
2. Click **Team > Add New**
3. Fill in the information:

#### Available fields:

**Post title:** Member's full name (e.g., "Michael Anderson")

**Content editor:** Member biography (will appear in overlay on hover)

**Featured image:** Member photo
- Click "Set featured image"
- Upload a 600x800px image (3:4 ratio)

**Team Member Details (sidebar panel):**
- **Position/Title:** Job title (e.g., "Founder & CEO")
- **Email:** Contact email
- **Phone:** Contact phone
- **Display Order:** Display order (0, 1, 2, 3...)
  - Lower numbers appear first
  - Use 0 for first, 1 for second, etc.

4. Click **Publish**

### Step 3: Add page to header menu

1. Go to **Appearance > Menus**
2. Select your main menu (or create one if it doesn't exist)
3. In the **Pages** section, check the **Team** box
4. Click **Add to menu**
5. Drag and drop to order the menu as desired
6. In **Menu locations**, make sure it's assigned to **Primary Menu**
7. Click **Save Menu**

### Important notes

- The page will appear automatically in the mobile hamburger menu
- The overlay activates on hover (on mobile, by tapping the image)
- Email and phone links are functional (open email/phone client)

---

# 7. Custom Post Types

## 🏗️ Projects

The theme includes a "Projects" Custom Post Type for your portfolio.

### Registered in: `functions.php`

### Fields:

- **Title** - Project name
- **Content** - Full project description
- **Featured Image** - Main image (recommended: 800x600px)
- **Location** - Project location (custom field)
- **Size** - Size in square feet (custom field)
- **Year Completed** - Completion year (custom field)
- **Project Categories** - Project categories (taxonomy)

### To Add a New Project:

1. Go to **Projects > Add New**
2. Enter project title
3. Add project description in the editor
4. Set featured image (recommended: 800x600px)
5. Fill in project details:
   - Location
   - Size (in sq ft)
   - Year Completed
6. Assign project categories if needed
7. Click **Publish**

### Suggested Project Categories:

- Mountain Homes
- Lakeside Cabins
- Family Estates
- Modern Timber
- Rustic Lodges
- Luxury Residences
- Custom Builds

### Code Usage:

```php
// Query projects
$projects = new WP_Query(array(
    'post_type' => 'project',
    'posts_per_page' => 6
));

while ($projects->have_posts()) {
    $projects->the_post();
    // Display project
}
wp_reset_postdata();
```

## 👥 Team Members

Custom Post Type to manage team from WordPress.

### Registered in: `functions.php`

### Fields:

- **Title** - Member's full name
- **Content** - Member biography
- **Featured Image** - Member photo (recommended: 600x800px, 3:4 ratio)
- **Position/Title** - Job title (custom field)
- **Email** - Contact email (custom field)
- **Phone** - Contact phone (custom field)
- **Display Order** - Display order (custom field)

### To Add a New Member:

1. Go to **Team > Add New**
2. Enter full name
3. Add biography in the editor
4. Set featured image
5. Fill in details:
   - Position/Title
   - Email
   - Phone
   - Display Order (0 = first)
6. Click **Publish**

---

# 8. Customization

## 🎨 Change Colors

Edit in `style.css`:

```css
:root {
    --color-primary: #1a1a1a;
    --color-gold: #d4af37;
    --color-secondary: #c9a961;
    /* Modify these values according to your brand */
}
```

## ✨ Change Fonts

Edit in `functions.php`:

```php
wp_enqueue_style('new-horizon-fonts', 
    'https://fonts.googleapis.com/css2?family=YourFont&display=swap'
);
```

Then update in `style.css`:

```css
--font-primary: 'Your Heading Font', serif;
--font-secondary: 'Your Body Font', sans-serif;
```

## 📝 Custom CSS

Add custom CSS through:
- **Appearance > Customize > Additional CSS**
- Or create `/css/custom.css` and enqueue in `functions.php`

## 🖼️ Required Images

### Logo
- **File**: `logo.svg` or `logo.png`
- **Style**: Gold color, house icon with text
- **Size**: 400x100px (flexible)

### Hero Image
- **File**: `hero-luxury-home.jpg`
- **Size**: 1920x1080px
- **Content**: Luxury home exterior, dusk/evening lighting
- **Style**: Dark, moody, sophisticated

### Project Images
- **Size**: 800x600px minimum
- **Style**: Professional photography
- **Lighting**: Warm, inviting
- **Content**: High-end residential properties

### Team Photos
- **Size**: 600x800px (3:4 ratio)
- **Style**: Professional photography
- **Background**: Preferably uniform or blurred
- **Content**: Professional team member portraits

---

# 9. Recommended Plugins

## 🔌 Essential Plugins (Must Install)

### 1. Contact Form 7 or WPForms
- **Purpose**: Advanced contact forms
- **Free**: Yes
- **Link**: wordpress.org/plugins/contact-form-7

### 2. Yoast SEO or Rank Math
- **Purpose**: SEO optimization
- **Free**: Yes
- **Link**: wordpress.org/plugins/wordpress-seo

### 3. Smush or ShortPixel
- **Purpose**: Image optimization
- **Free**: Yes (Pro version available)
- **Link**: wordpress.org/plugins/wp-smushit

## 🌟 Highly Recommended

### 4. Advanced Custom Fields (ACF)
- **Purpose**: Enhanced custom fields
- **Free**: Yes (Pro recommended)
- **Link**: wordpress.org/plugins/advanced-custom-fields

### 5. Click to Chat or Joinchat
- **Purpose**: WhatsApp integration
- **Free**: Yes
- **Link**: wordpress.org/plugins/click-to-chat

### 6. WP Rocket or W3 Total Cache
- **Purpose**: Caching and performance
- **Free**: W3 Total Cache (WP Rocket is premium)
- **Link**: wordpress.org/plugins/w3-total-cache

## 💎 Optional Enhancements

### 7. Elementor or Beaver Builder
- **Purpose**: Page builder
- **Free**: Yes (Pro available)

### 8. UpdraftPlus
- **Purpose**: Backups
- **Free**: Yes

### 9. Wordfence Security
- **Purpose**: Security
- **Free**: Yes

### 10. Google Analytics Dashboard
- **Purpose**: Analytics
- **Free**: Yes

---

# 10. Optimization and Performance

## 📊 Performance Tips

### 1. Image Optimization

- Use WebP format when possible
- Compress all images before uploading
- Use lazy loading
- Recommended sizes:
  - Hero images: 1920x1080px
  - Project images: 800x600px
  - Thumbnails: 400x300px

### 2. Caching

- Install W3 Total Cache or WP Rocket
- Enable browser caching
- Enable GZIP compression

### 3. Minification

- Combine CSS/JS files
- Minify in production
- Use CDN for static assets

### 4. CDN

- Cloudflare (free)
- Serve static assets
- Improve global load times

### 5. Database

- Clean regularly
- Optimize tables
- Limit post revisions

## 🔒 Security

### Best Practices:

1. **Strong Passwords**
   - Don't use "admin" as username
   - Use complex passwords
   - Consider a password manager

2. **Regular Updates**
   - Update WordPress core
   - Update plugins
   - Update theme

3. **Security Plugin**
   - Install Wordfence or iThemes Security
   - Run security scans
   - Enable firewall

4. **Regular Backups**
   - Install UpdraftPlus
   - Configure automatic backups
   - Store backups off-site (Google Drive, Dropbox)

5. **SSL Certificate**
   - Install SSL certificate
   - Force HTTPS
   - Update URLs in database

---

# 11. SEO and Marketing

## 🔍 SEO Optimization

### Meta Information

**Homepage Title:**  
"New Horizon Developments | Luxury Custom Home Construction"

**Meta Description:**  
"Experience the elegance of custom luxury homes. New Horizon Developments builds premium residential properties with exceptional craftsmanship and attention to detail."

**Focus Keywords:**
- luxury home construction
- custom home builder
- residential development
- premium home construction
- high-end homes
- custom residential design

### Recommended Pages

1. Home (front-page.php)
2. Services
3. Projects (archive-project.php)
4. Team
5. About Us
6. Blog
7. Contact
8. Privacy Policy
9. Terms of Service

### Using Yoast SEO

1. **Homepage SEO**
   - Edit homepage
   - Scroll to Yoast SEO section
   - Set Focus Keyphrase: "luxury home construction"
   - Write meta description (155 characters)
   - Set SEO title

2. **XML Sitemap**
   - Go to **SEO > General > Features**
   - Enable XML sitemaps
   - Submit to Google Search Console

3. **Social Media**
   - Go to **SEO > Social**
   - Add Facebook/Twitter images
   - Configure Open Graph settings

## 🎯 Target Audience

- **Demographics**: Affluent homeowners, 35-65 years old
- **Income**: Upper-middle to high income
- **Values**: Quality, craftsmanship, design, investment
- **Goals**: Custom dream home, luxury living, property investment

## 📝 Content Tone

### Voice and Style

- **Professional** yet approachable
- **Sophisticated** without being pretentious
- **Confident** in expertise
- **Client-focused** messaging

### Example Headlines

- "The Home You've Been Imagining Deserves the Right Team to Build It"
- "Every home begins with understanding how you want to live"
- "Discover Our Process"
- "Building Excellence, Delivering Dreams"

### Example Body Copy

- "We don't just build houses; we craft homes that reflect your vision and lifestyle."
- "From initial consultation to final walkthrough, we're with you every step of the way."
- "Our commitment to quality craftsmanship and attention to detail sets us apart."

---

# 12. Troubleshooting

## 🆘 Common Issues and Solutions

### Issue: Projects not showing

**Solution:**
1. Go to Settings > Permalinks
2. Click "Save Changes"
3. This flushes rewrite rules

### Issue: Menu not appearing

**Solution:**
1. Verify menu is assigned to "Primary Menu" location
2. Verify menu has items
3. Clear cache if using caching plugin

### Issue: Broken images

**Solution:**
1. Verify images uploaded to correct folder
2. Check file permissions (755 for folders, 644 for files)
3. Regenerate thumbnails using plugin

### Issue: Contact form not sending

**Solution:**
1. Install WP Mail SMTP plugin
2. Configure email settings
3. Test with different email address
4. Check spam folder

### Issue: Site is slow

**Solution:**
1. Install caching plugin
2. Optimize images
3. Enable GZIP compression
4. Use CDN (Cloudflare free tier)
5. Upgrade hosting if needed

### Issue: 404 errors on pages

**Solution:**
1. Go to Settings > Permalinks
2. Click "Save Changes"
3. Verify pages are published
4. Check URL slugs

### Issue: Theme doesn't look like demo

**Solution:**
1. Verify all pages use correct templates
2. Ensure custom post types have content
3. Verify images are uploaded
4. Clear browser cache
5. Check for plugin conflicts

---

# 13. Launch Checklist

## ✅ Pre-Launch Checklist

### Basic Setup
- [ ] Theme activated
- [ ] Logo uploaded (gold/white)
- [ ] Hero image uploaded (dark luxury home)
- [ ] Contact information added
- [ ] Social media links added
- [ ] Favicon uploaded
- [ ] Permalinks configured (Post name)

### Content
- [ ] All pages created and published
- [ ] Navigation menu configured
- [ ] 6+ projects published with images
- [ ] 3+ team members added
- [ ] About Us page completed
- [ ] Privacy Policy page created
- [ ] Terms of Service page created

### Optimization
- [ ] All images optimized
- [ ] SEO configured (Yoast/Rank Math)
- [ ] Meta descriptions added
- [ ] XML sitemap generated
- [ ] Google Analytics installed (optional)
- [ ] Caching plugin installed and configured

### Functionality
- [ ] Contact form tested
- [ ] All links working
- [ ] Responsive verified on mobile
- [ ] Responsive verified on tablet
- [ ] Tested in multiple browsers
- [ ] Spelling/grammar checked

### Security
- [ ] SSL certificate installed (HTTPS)
- [ ] Security plugin installed
- [ ] Backups configured
- [ ] Strong passwords set
- [ ] "admin" user deleted/renamed

### Post-Launch
- [ ] Submitted to Google Search Console
- [ ] Sitemap submitted
- [ ] Google Business Profile created/claimed
- [ ] Analytics monitoring configured
- [ ] Maintenance plan established

---

## 📞 Getting Help

### Resources

- **WordPress Support**: https://wordpress.org/support/
- **Theme Documentation**: This file
- **Video Tutorials**: YouTube "WordPress tutorial"
- **Forums**: WordPress.org forums

### Professional Help

If you need assistance:
- Hire WordPress developer on Upwork/Fiverr
- Contact local web development agency
- WordPress-specific support services

---

## 🎉 Congratulations!

Your New Horizon Developments website is ready with:

- ✅ Dark and sophisticated design
- ✅ Gold accent colors
- ✅ Elegant typography
- ✅ Professional layout
- ✅ Fully responsive
- ✅ SEO optimized
- ✅ Production ready

**Good luck with New Horizon Developments!**

---

## 📋 Version Information

**Theme Version:** 1.0.0  
**Last Updated:** 2024  
**WordPress Compatibility:** 6.0+  
**PHP Compatibility:** 7.4+  
**License:** GNU General Public License v2 or later

## 🎉 Credits

- **Fonts**: Google Fonts (Cormorant Garamond, Montserrat)
- **Icons**: Font Awesome 6.4.0
- **Framework**: WordPress 6.0+
- **Developed by**: New Horizon Developments Team

---

**Theme Location**: `/wp-content/themes/new-horizon-developments/`  
**Demo File**: `template-demo.html` (view in browser)  
**Main Stylesheet**: `style.css`  
**Functions**: `functions.php`

---

---

# 14. Instagram Feed Setup

## 📸 Overview

The theme includes an Instagram feed section on the homepage. You have three options to configure it based on your needs and technical expertise.

## Option 1: Using a Plugin (Recommended - Easiest)

### Recommended Plugins:

#### 1. Smash Balloon Instagram Feed (Most Popular)

**Installation:**
1. Go to **Plugins** → **Add New**
2. Search for "Smash Balloon Instagram Feed"
3. Install and activate
4. Follow the setup wizard
5. Connect your Instagram account

**Configuration:**

1. **Access the Plugin**
   - In WordPress admin, look for **"Instagram Feed"** in the left sidebar
   - Click **"Instagram Feed"** → **"All Feeds"**

2. **Create a New Feed**
   - Click **"Add New"** (or "Create Your First Feed")
   - Select feed type:
     - **Personal Account** - Recommended for most users
     - **Business Account** - If you have an Instagram Business account

3. **Connect Your Instagram Account**

   **Option A: Personal Account**
   - Click **"Connect an Instagram Account"**
   - A Facebook/Instagram window will open
   - Log in with your Instagram account
   - Authorize the application
   - Select your Instagram account from the list

   **Option B: Business Account**
   - Click **"Connect an Instagram Business Account"**
   - Log in with Facebook (your Instagram must be linked to a Facebook page)
   - Select the Facebook page connected to your Instagram
   - Authorize permissions

4. **Configure Feed Settings**
   - **Feed Name**: Give it a descriptive name (e.g., "Main Feed")
   - **Number of Posts**: Already set to 6 (you can change it)
   - **Columns**: Already set to 6 columns
   - **Additional Options**:
     - Disable "Show Header" (already disabled)
     - Disable "Show Follow Button" (already disabled)
     - Disable "Load More Button" (already disabled)

5. **Save and Publish**
   - Click **"Save"** or **"Publish"**
   - The feed will be created automatically

6. **Verify on Site**
   - Go to your site's homepage
   - Scroll to the Instagram section
   - You should see your 6 most recent Instagram posts

**Integration with Theme:**

Once the plugin is installed, edit `front-page.php` line 383-385 and replace:

```php
<div id="instagram-feed" class="instagram-feed">
    <!-- Instagram feed will be loaded here -->
</div>
```

With:

```php
<div class="instagram-feed">
    <?php echo do_shortcode('[instagram-feed num=6 cols=6]'); ?>
</div>
```

#### 2. Instagram Feed by 10Web

Similar to the above with an intuitive interface and easy Instagram connection.

---

## Option 2: Instagram Basic Display API (Advanced)

For developers who want more control over the feed.

### Step 1: Create a Facebook App

1. Go to [Facebook Developers](https://developers.facebook.com/)
2. Click **My Apps** → **Create App**
3. Select **Consumer** as app type
4. Complete the app name

### Step 2: Configure Instagram Basic Display

1. In your app, go to **Products** → **Add Product**
2. Find **Instagram Basic Display** and click **Set Up**
3. In **Basic Display**, click **Create New App**
4. Fill in:
   - **Display Name**: Your site name
   - **Valid OAuth Redirect URIs**: `https://your-site.com/`
   - **Deauthorize Callback URL**: `https://your-site.com/`
   - **Data Deletion Request URL**: `https://your-site.com/`
5. Save changes

### Step 3: Add Instagram Test User

1. In **Roles** → **Instagram Testers**
2. Click **Add Instagram Testers**
3. Enter your Instagram username
4. Go to your Instagram account → **Settings** → **Apps and Websites** → **Tester Invites**
5. Accept the invitation

### Step 4: Generate Access Token

1. In **Basic Display** → **User Token Generator**
2. Click **Generate Token** next to your Instagram account
3. Authorize the app
4. Copy the generated **Access Token**

### Step 5: Configure in WordPress

Edit `js/instagram-feed.js` line 13 and change:

```javascript
const instagramConfig = {
    showPlaceholders: true,  // Change to false
    itemsToShow: 6
};
```

Then, in `functions.php`, add this function:

```php
function new_horizon_instagram_token() {
    return 'YOUR_ACCESS_TOKEN_HERE'; // Paste your token here
}
```

And modify `js/instagram-feed.js` to use the token from PHP.

---

## Option 3: Manual Feed with Static Images

If you just want to display some images without Instagram connection:

1. Upload 6 images to **Media** → **Add New**
2. Edit `front-page.php` line 383-385
3. Replace with:

```php
<div class="instagram-feed">
    <a href="https://instagram.com/your-username" class="instagram-item">
        <img src="<?php echo get_template_directory_uri(); ?>/images/instagram-1.jpg" alt="Instagram">
    </a>
    <a href="https://instagram.com/your-username" class="instagram-item">
        <img src="<?php echo get_template_directory_uri(); ?>/images/instagram-2.jpg" alt="Instagram">
    </a>
    <!-- Repeat for 6 images -->
</div>
```

---

## Configure Instagram URL

1. Go to **Appearance** → **Customize** → **Social Media**
2. In **Instagram URL**, paste your Instagram URL: `https://instagram.com/your-username`
3. Click **Publish**

---

## Troubleshooting

### Feed not displaying
✓ Verify the plugin is activated
✓ Check that the shortcode is correct
✓ Check browser console for JavaScript errors

### "No feed found" error
✓ Make sure you created at least one feed
✓ Verify Instagram account is connected correctly
✓ Wait a few minutes and reload the page (plugin may take time to load posts)

### Cannot connect account
✓ Make sure you have an active Instagram account
✓ If using business account, verify it's linked to a Facebook page
✓ Check that you haven't blocked third-party cookies in your browser

### Access Token expired
✓ Instagram tokens expire every 60 days
✓ You need to regenerate the token periodically
✓ Consider using a plugin that handles this automatically

### Posts not updating
✓ Go to Instagram Feed → Settings → "Clear Cache"
✓ The plugin updates automatically every hour by default

### Images not loading
✓ Verify image URLs are correct
✓ Check that images exist on the server
✓ Review folder permissions

---

## Quick Access

**Plugin URL in WordPress:**
`/wp-admin/admin.php?page=sb-instagram-feed`

**Official Documentation:**
https://smashballoon.com/instagram-feed/docs/

---

## Important Notes

- ⏰ Feed updates automatically every hour
- 🔒 Access tokens renew automatically (with plugin)
- 📱 Feed is fully responsive
- 🎨 Styles are already integrated with the theme

---

## Final Recommendation

**For most users, I recommend using the "Smash Balloon Instagram Feed" plugin** because:
- ✅ Easy to configure (5 minutes)
- ✅ Automatically handles token renewal
- ✅ Includes caching for better performance
- ✅ Visual customization options
- ✅ Technical support available

Once configured, the feed will work automatically without needing to touch code.

---

# 15. Portfolio Management

## 📁 How to Add/Edit Portfolio Projects

### 1. Access Admin Panel
- Go to **WordPress Admin** → **Projects** → **Add New** (or edit an existing one)

### 2. Complete Project Information

#### Basic Information:
- **Title**: Project name (e.g., "EAGLE'S NEST", "HOME ALONE", "VALLEY VIEW")
- **Content**: Detailed project description and image gallery

#### Featured Image:
- **Featured Image**: This will be the image displayed in the homepage portfolio
- Click "Set featured image" in the right panel
- Upload a high-quality image (recommended: 1200x900px or similar 4:3 ratio)

#### Project Details:
In the "Project Details" meta box you'll find:
- **Location**: Project location (e.g., "Denver, CO")
- **Size (sq ft)**: Size in square feet
- **Year Completed**: Completion year
- **☑ Show in Featured Projects (Homepage)**: **IMPORTANT** - Check this box for the project to appear in the homepage portfolio

#### Categories:
- Assign categories to the project (e.g., "Residential", "Commercial", "Custom Homes")

### 3. Publish
- Click **Publish** to make the project visible

---

## Homepage Portfolio Management

### Which projects are displayed?
- Only projects with the **"Show in Featured Projects (Homepage)"** checkbox checked
- Maximum 6 projects
- Ordered by date (most recent first)

### To Remove a Project from Portfolio:
1. Go to **Projects** → **All Projects**
2. Edit the project you want to remove
3. Uncheck the **"Show in Featured Projects (Homepage)"** checkbox
4. Click **Update**

### To Add a Project to Portfolio:
1. Edit the project
2. Check the **"Show in Featured Projects (Homepage)"** checkbox
3. Click **Update**

### To Change Order:
- Projects are ordered by publication date
- To change order, edit the project's publication date

---

## Create Image Gallery for Each Project

### Option 1: Use Block Editor (Gutenberg)
1. In the project content, add a **Gallery** block
2. Upload multiple images
3. Configure number of columns and spacing

### Option 2: Use a Gallery Plugin
Recommended plugins:
- **Envira Gallery**
- **NextGEN Gallery**
- **FooGallery**

---

## Optimization Tips

### Images:
- **Recommended size**: 1200x900px (4:3 ratio)
- **Format**: JPG for photos, PNG for graphics
- **Optimization**: Use a plugin like Smush or ShortPixel to compress images
- **Descriptive names**: "eagle-nest-exterior.jpg" instead of "IMG_1234.jpg"

### SEO:
- Use descriptive titles
- Fill in the location field
- Add alt text to all images
- Write detailed descriptions in the content

---

## Troubleshooting

### "My project doesn't show on homepage"
✓ Verify the "Show in Featured Projects" checkbox is checked
✓ Make sure the project is published (not draft)
✓ Verify it has a Featured Image assigned

### "Only X projects showing (less than 6)"
✓ You only have X projects marked as "Featured"
✓ Mark more projects to fill the portfolio

### "Image looks distorted"
✓ Use images with 4:3 ratio (width:height)
✓ Minimum recommended size: 800x600px

### "Project doesn't appear in Projects page"
✓ Make sure the project is published
✓ Check that permalinks are configured correctly (Settings > Permalinks > Save)

### "Featured image not displaying"
✓ Verify image is set as Featured Image
✓ Check image file exists and is accessible
✓ Regenerate thumbnails using a plugin like "Regenerate Thumbnails"

---

*End of documentation. For more information, consult individual documentation files or visit the WordPress community.*
