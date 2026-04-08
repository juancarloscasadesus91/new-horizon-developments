<?php
/**
 * Template Name: About Us Page
 * Description: Template for displaying About Us page
 */

get_header();

// Get page data
while (have_posts()) : the_post();
    $page_title = get_the_title();
endwhile;
wp_reset_postdata();
?>

<!-- About Hero Section -->
<section class="page-hero" style="background: linear-gradient(135deg, rgba(10,10,10,0.9) 0%, rgba(26,26,26,0.95) 100%), url('<?php echo get_template_directory_uri(); ?>/images/hero-timber-home.jpg') center/cover;">
    <div class="container">
        <div class="page-hero-content">
            <h1 class="page-title"><?php echo esc_html($page_title); ?></h1>
            <p class="page-description">A family-led luxury home company creating fully custom residences across Atlanta, Metro Atlanta, and North Georgia.</p>
        </div>
    </div>
</section>

<!-- About Intro Section -->
<section class="about-intro-section section">
    <div class="container">
        <div class="about-intro-grid">
            <div class="about-intro-content reveal">
                <h2>Building Homes That Reflect How You Want to Live</h2>
                <p>New Horizon Development is a family-led luxury home company serving clients who want more than a builder — they want a team that can guide the entire journey with clarity, communication, and confidence.</p>
                <p>From land acquisition and planning to design coordination and final construction, our approach is fully integrated. We bring together the key pieces of the custom home process under one roof so that every step feels aligned, intentional, and well-managed.</p>
                <p>Whether you already own land or are just beginning the search, we provide the support needed to move from vision to reality with a clear path forward.</p>
            </div>
            <div class="about-intro-image reveal">
                <img src="<?php echo get_template_directory_uri(); ?>/images/hero-timber-home.jpg" alt="Luxury Custom Home">
            </div>
        </div>
    </div>
</section>

<!-- What Sets Us Apart -->
<section class="about-difference-section section" style="background: var(--color-gray-dark);">
    <div class="container">
        <div class="section-title">
            <h2>What Sets Us Apart</h2>
            <p>A unified process that brings everything together</p>
        </div>
        
        <div class="grid grid-3">
            <div class="difference-card reveal">
                <div class="difference-icon">
                    <i class="fas fa-compass"></i>
                </div>
                <h3>Real Estate Insight</h3>
                <p>We help identify and evaluate the right property for your vision, ensuring the land can truly support the home you want to build.</p>
            </div>
            
            <div class="difference-card reveal">
                <div class="difference-icon">
                    <i class="fas fa-pencil-ruler"></i>
                </div>
                <h3>Design Guidance</h3>
                <p>Our design team curates materials, finishes, and selections that align with your aesthetic and level of involvement.</p>
            </div>
            
            <div class="difference-card reveal">
                <div class="difference-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3>Financial Coordination</h3>
                <p>We coordinate the early phases with the right professionals to keep the process moving clearly and correctly.</p>
            </div>
            
            <div class="difference-card reveal">
                <div class="difference-icon">
                    <i class="fas fa-hard-hat"></i>
                </div>
                <h3>Construction Execution</h3>
                <p>From start to finish, we manage the build with close communication, careful execution, and attention to detail.</p>
            </div>
            
            <div class="difference-card reveal">
                <div class="difference-icon">
                    <i class="fas fa-comments"></i>
                </div>
                <h3>Clear Communication</h3>
                <p>Our clients are never left navigating the journey alone. We tailor both the build and communication around you.</p>
            </div>
            
            <div class="difference-card reveal">
                <div class="difference-icon">
                    <i class="fas fa-home"></i>
                </div>
                <h3>Smart Home Integration</h3>
                <p>We create homes that are not only beautiful, but thoughtfully equipped for modern living.</p>
            </div>
        </div>
    </div>
</section>

<!-- Our Values -->
<section class="about-values-section section">
    <div class="container">
        <div class="values-content-grid">
            <div class="values-text reveal">
                <h2>Our Commitment to You</h2>
                <p class="lead-text">Our work is rooted in honesty, transparency, and efficiency. We believe luxury homebuilding should feel elevated, but never uncertain.</p>
                
                <div class="values-list">
                    <div class="value-item">
                        <i class="fas fa-check-circle"></i>
                        <div>
                            <h4>Transparency</h4>
                            <p>Clear communication and honest guidance at every stage of the process.</p>
                        </div>
                    </div>
                    
                    <div class="value-item">
                        <i class="fas fa-check-circle"></i>
                        <div>
                            <h4>Craftsmanship</h4>
                            <p>Attention to detail and quality that reflects the level at which you live.</p>
                        </div>
                    </div>
                    
                    <div class="value-item">
                        <i class="fas fa-check-circle"></i>
                        <div>
                            <h4>Trust</h4>
                            <p>A process built to support your vision with confidence and care.</p>
                        </div>
                    </div>
                    
                    <div class="value-item">
                        <i class="fas fa-check-circle"></i>
                        <div>
                            <h4>Integrity</h4>
                            <p>Building homes that reflect both the ambition of the client and the integrity of the process.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="values-image reveal">
                <img src="<?php echo get_template_directory_uri(); ?>/images/hero-timber-home.jpg" alt="Craftsmanship">
            </div>
        </div>
    </div>
</section>

<!-- Who We Build For -->
<section class="about-clients-section section" style="background: var(--color-gray-dark);">
    <div class="container">
        <div class="clients-content">
            <div class="section-title">
                <h2>Who We Build For</h2>
                <p class="lead-text">For clients seeking privacy, presence, and a home that reflects the level at which they live.</p>
            </div>
            
            <div class="clients-description reveal">
                <p>Whether you are building a primary residence, a private estate, or a home designed for both retreat and entertaining, our role is to create a process that feels clear and a result that feels fully considered.</p>
                <p>We serve clients who value quality, appreciate thoughtful design, and want a partner who can guide the entire journey — from finding the right land to delivering a home that exceeds expectations.</p>
            </div>
        </div>
    </div>
</section>

<!-- Capabilities -->
<section class="about-capabilities-section section">
    <div class="container">
        <div class="section-title">
            <h2>What We Handle</h2>
            <p>A complete approach to luxury homebuilding</p>
        </div>
        
        <div class="grid grid-2">
            <div class="capability-card reveal">
                <i class="fas fa-map-marked-alt"></i>
                <h3>Land Acquisition</h3>
                <p>Whether you already own land or are still searching, we help identify and evaluate the right property for your vision.</p>
            </div>
            
            <div class="capability-card reveal">
                <i class="fas fa-pencil-ruler"></i>
                <h3>Design Guidance</h3>
                <p>Our design team curates materials, finishes, and selections that align with your aesthetic and level of involvement.</p>
            </div>
            
            <div class="capability-card reveal">
                <i class="fas fa-clipboard-list"></i>
                <h3>Planning & Permitting</h3>
                <p>We coordinate the early phases of the project with the right professionals to keep the process moving clearly and correctly.</p>
            </div>
            
            <div class="capability-card reveal">
                <i class="fas fa-hard-hat"></i>
                <h3>Construction Oversight</h3>
                <p>From start to finish, we manage the build with close communication, careful execution, and attention to detail.</p>
            </div>
            
            <div class="capability-card reveal">
                <i class="fas fa-home"></i>
                <h3>Smart Home Integration</h3>
                <p>We create homes that are not only beautiful, but thoughtfully equipped for modern living.</p>
            </div>
            
            <div class="capability-card reveal">
                <i class="fas fa-file-contract"></i>
                <h3>Full Project Coordination</h3>
                <p>Engineering, architectural coordination, and pre-construction preparation all managed under one roof.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="about-cta-section section" style="background: linear-gradient(135deg, rgba(10,10,10,0.95) 0%, rgba(26,26,26,0.98) 100%), url('<?php echo get_template_directory_uri(); ?>/images/hero-timber-home.jpg') center/cover; background-attachment: fixed;">
    <div class="container">
        <div class="cta-content reveal">
            <h2>Ready to Build with the Right Team?</h2>
            <p>A home of this scale deserves more than construction alone. It deserves careful guidance, direct communication, and a process built to support your vision from the start.</p>
            <div class="cta-buttons" style="margin-bottom: 3rem;">
                <a href="/services/" class="btn btn-outline">Explore Our Process</a>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
?>
