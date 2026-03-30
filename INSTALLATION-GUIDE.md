# Timber Homes Theme - Complete Installation Guide

## 📦 Quick Start Guide

Follow these steps to get your Timber Homes website up and running in 30 minutes.

---

## Step 1: WordPress Installation

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

---

## Step 2: Theme Installation

### Upload Theme Files

1. **Via WordPress Admin** (Recommended)
   - Go to **Appearance > Themes > Add New**
   - Click **Upload Theme**
   - Choose `timber-homes.zip`
   - Click **Install Now**
   - Click **Activate**

2. **Via FTP/File Manager**
   - Upload `timber-homes` folder to `/wp-content/themes/`
   - Go to **Appearance > Themes**
   - Activate "Timber Homes"

---

## Step 3: Essential WordPress Settings

### 3.1 Permalinks (IMPORTANT!)

1. Go to **Settings > Permalinks**
2. Select **Post name**
3. Click **Save Changes**

This enables clean URLs like: `yoursite.com/projects/mountain-retreat`

### 3.2 Reading Settings

1. Go to **Settings > Reading**
2. Select **A static page**
3. Homepage: Choose "Home" or create new page
4. Posts page: Choose "Blog" or create new page
5. Click **Save Changes**

### 3.3 General Settings

1. Go to **Settings > General**
2. Set **Site Title**: "Timber Homes" (or your company name)
3. Set **Tagline**: "Premium American-Style Timber Home Construction"
4. Set **Admin Email**: your-email@domain.com
5. Set **Timezone**
6. Click **Save Changes**

---

## Step 4: Create Navigation Menu

### 4.1 Create Pages First

Create these pages (Pages > Add New):

1. **Home** (can be blank, uses front-page.php template)
2. **Services** (optional content page)
3. **Portfolio** (will show projects)
4. **About Us** (your company story)
5. **Contact** (contact information)
6. **Blog** (for news/articles)

### 4.2 Build Menu

1. Go to **Appearance > Menus**
2. Click **Create a new menu**
3. Name it "Main Menu"
4. Add pages in this order:
   - Home
   - Services
   - Portfolio
   - About Us
   - Blog
   - Contact
5. Check **Primary Menu** under "Display location"
6. Click **Save Menu**

---

## Step 5: Customize Theme Settings

### 5.1 Upload Logo

1. Go to **Appearance > Customize > Site Identity**
2. Click **Select Logo**
3. Upload your logo (recommended: 400x100px, PNG with transparency)
4. Adjust logo size if needed
5. Click **Publish**

### 5.2 Set Header Image

1. Go to **Appearance > Customize > Header Image**
2. Click **Add new image**
3. Upload hero background (recommended: 1920x1080px)
4. Click **Publish**

### 5.3 Configure Contact Information

1. Go to **Appearance > Customize > Contact Information**
2. Fill in:
   - **Phone Number**: +1 (555) 123-4567
   - **Email Address**: info@yourdomain.com
   - **Address**: Your business address
   - **WhatsApp Number**: 15551234567 (no spaces or +)
3. Click **Publish**

### 5.4 Add Social Media Links

1. Go to **Appearance > Customize > Social Media**
2. Add URLs for:
   - Facebook
   - Instagram
   - Pinterest
   - LinkedIn
3. Click **Publish**

---

## Step 6: Add Projects (Portfolio)

### 6.1 Create Project Categories

1. Go to **Projects > Categories**
2. Add categories:
   - Mountain Homes
   - Lakeside Cabins
   - Family Estates
   - Modern Timber
   - Rustic Lodges

### 6.2 Add Your First Project

1. Go to **Projects > Add New**
2. **Title**: "Mountain Retreat"
3. **Content**: Add project description
4. **Featured Image**: Upload project photo (800x600px minimum)
5. **Project Details** (in meta box):
   - Location: Colorado Springs, CO
   - Size: 3,200
   - Year Completed: 2023
6. **Categories**: Select appropriate category
7. Click **Publish**

### 6.3 Add More Projects

Repeat for 5-6 projects to populate your portfolio section.

---

## Step 7: Install Recommended Plugins

### Essential Plugins

1. **Contact Form 7** or **WPForms Lite**
   - Plugins > Add New > Search "Contact Form 7"
   - Install and Activate

2. **Yoast SEO** or **Rank Math**
   - Plugins > Add New > Search "Yoast SEO"
   - Install and Activate
   - Run configuration wizard

3. **Smush** (Image Optimization)
   - Plugins > Add New > Search "Smush"
   - Install and Activate
   - Optimize existing images

### Optional but Recommended

4. **Advanced Custom Fields (ACF)**
   - For enhanced project fields
   - Free version is sufficient

5. **Click to Chat** (WhatsApp)
   - Adds floating WhatsApp button
   - Configure with your WhatsApp number

6. **WP Rocket** or **W3 Total Cache**
   - For caching and speed optimization
   - W3 Total Cache is free

---

## Step 8: Configure Contact Form

### Using Contact Form 7

1. Install Contact Form 7 plugin
2. Go to **Contact > Contact Forms**
3. Edit the default form or create new
4. Add fields:
   ```
   [text* your-name placeholder "Full Name"]
   [email* your-email placeholder "Email Address"]
   [tel your-phone placeholder "Phone Number"]
   [select your-service "Select a service" "Custom Home Design" "Full Construction" "Renovation" "Consultation"]
   [textarea* your-message placeholder "Your Message"]
   [submit "Send Message"]
   ```
5. Copy the shortcode: `[contact-form-7 id="123"]`
6. Replace the form in `front-page.php` or use a plugin like "Insert PHP Code Snippet"

### Using WPForms

1. Install WPForms Lite
2. Go to **WPForms > Add New**
3. Choose "Simple Contact Form" template
4. Customize fields as needed
5. Save and embed using shortcode

---

## Step 9: Add Content

### Homepage Content

The homepage uses `front-page.php` template which includes:
- ✅ Hero section (automatic)
- ✅ Services section (automatic)
- ✅ Portfolio section (pulls from Projects)
- ✅ Why Choose Us (automatic)
- ✅ Testimonials (automatic)
- ✅ Contact section (automatic)

**No additional content needed!** Just add projects and customize settings.

### About Us Page

Create content about your company:

```
Founded in 1995, Timber Homes has been the premier builder of American-style 
timber homes across the Western United States. Our commitment to quality 
craftsmanship, sustainable practices, and customer satisfaction has made us 
the trusted choice for families seeking authentic wooden homes.

Our Mission
To create beautiful, sustainable timber homes that families will cherish for 
generations, using traditional craftsmanship and modern building techniques.

Our Values
- Quality Craftsmanship
- Sustainable Practices
- Customer Satisfaction
- Integrity & Transparency
- Innovation & Tradition
```

### Services Page

List your services with descriptions:

```
Custom Home Design
Work with our expert architects to design your perfect timber home...

Full Construction
From foundation to roof, we handle every aspect...

[Continue with all services]
```

---

## Step 10: SEO Optimization

### Using Yoast SEO

1. **Homepage SEO**
   - Edit homepage
   - Scroll to Yoast SEO section
   - Set Focus Keyphrase: "timber home construction"
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

---

## Step 11: Performance Optimization

### Image Optimization

1. **Compress Existing Images**
   - Use Smush plugin
   - Go to **Smush > Bulk Smush**
   - Click "Bulk Smush Now"

2. **Future Images**
   - Smush will auto-optimize new uploads
   - Recommended sizes:
     - Hero images: 1920x1080px
     - Project images: 800x600px
     - Thumbnails: 400x300px

### Caching Setup

1. **Install W3 Total Cache**
   - Plugins > Add New > "W3 Total Cache"
   - Install and Activate

2. **Basic Configuration**
   - Go to **Performance > General Settings**
   - Enable Page Cache
   - Enable Browser Cache
   - Enable Minify (HTML, CSS, JS)
   - Save settings

---

## Step 12: Security Setup

### Basic Security

1. **Change Admin Username**
   - Don't use "admin" as username
   - Create new admin user
   - Delete old "admin" account

2. **Strong Passwords**
   - Use complex passwords
   - Consider password manager

3. **Install Security Plugin**
   - **Wordfence Security** (free)
   - Or **iThemes Security** (free)
   - Run security scan
   - Enable firewall

4. **Regular Backups**
   - Install **UpdraftPlus** (free)
   - Configure automatic backups
   - Store backups off-site (Google Drive, Dropbox)

---

## Step 13: Mobile Testing

### Test Responsiveness

1. **Browser DevTools**
   - Press F12 in browser
   - Click device toolbar icon
   - Test different screen sizes

2. **Real Devices**
   - Test on actual phone/tablet
   - Check all sections
   - Verify menu works

3. **Google Mobile-Friendly Test**
   - Visit: https://search.google.com/test/mobile-friendly
   - Enter your URL
   - Fix any issues

---

## Step 14: Launch Checklist

Before going live:

- [ ] All pages created and published
- [ ] Navigation menu configured
- [ ] Logo uploaded
- [ ] Contact information added
- [ ] Social media links added
- [ ] At least 6 projects published
- [ ] Contact form tested
- [ ] All images optimized
- [ ] SEO settings configured
- [ ] Mobile responsive checked
- [ ] All links working
- [ ] Spelling/grammar checked
- [ ] Privacy policy page created
- [ ] Google Analytics installed (optional)
- [ ] Favicon uploaded
- [ ] SSL certificate installed (HTTPS)

---

## Step 15: Post-Launch

### Submit to Search Engines

1. **Google Search Console**
   - Visit: https://search.google.com/search-console
   - Add property
   - Verify ownership
   - Submit sitemap

2. **Google Business Profile**
   - Create/claim business listing
   - Add photos
   - Link to website

### Monitor Performance

1. **Google Analytics**
   - Create account
   - Install tracking code
   - Monitor traffic

2. **Regular Updates**
   - Update WordPress core
   - Update plugins
   - Update theme (if updates available)
   - Add new projects regularly
   - Post blog articles monthly

---

## 🆘 Common Issues & Solutions

### Issue: Projects Not Showing

**Solution:**
1. Go to Settings > Permalinks
2. Click "Save Changes"
3. This flushes rewrite rules

### Issue: Menu Not Appearing

**Solution:**
1. Check menu is assigned to "Primary Menu" location
2. Verify menu has items
3. Clear cache if using caching plugin

### Issue: Images Broken

**Solution:**
1. Verify images uploaded to correct folder
2. Check file permissions (755 for folders, 644 for files)
3. Regenerate thumbnails using plugin

### Issue: Contact Form Not Sending

**Solution:**
1. Install WP Mail SMTP plugin
2. Configure email settings
3. Test with different email address
4. Check spam folder

### Issue: Site Slow

**Solution:**
1. Install caching plugin
2. Optimize images
3. Enable GZIP compression
4. Use CDN (Cloudflare free tier)
5. Upgrade hosting if needed

---

## 📞 Getting Help

### Resources

- **WordPress Support**: https://wordpress.org/support/
- **Theme Documentation**: See README.md
- **Video Tutorials**: YouTube "WordPress tutorial"
- **Forums**: WordPress.org forums

### Professional Help

If you need assistance:
- Hire WordPress developer on Upwork/Fiverr
- Contact local web development agency
- WordPress-specific support services

---

## 🎉 Congratulations!

Your Timber Homes website is now ready! 

Remember to:
- Add content regularly
- Update plugins monthly
- Backup weekly
- Monitor analytics
- Engage with visitors

**Good luck with your timber home construction business!**
