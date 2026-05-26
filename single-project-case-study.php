<?php
/**
 * Template for displaying Case Study Projects
 * Premium editorial layout for featured projects
 *
 * @package New_Horizon_Developments
 * @since 1.0.0
 */

get_header();

while (have_posts()) : the_post();
    
    // Get basic project data
    $location = get_post_meta(get_the_ID(), '_project_location', true);
    $size = get_post_meta(get_the_ID(), '_project_size', true);
    $year = get_post_meta(get_the_ID(), '_project_year', true);
    
    // Get case study specific data
    $cs_bedrooms = get_post_meta(get_the_ID(), '_cs_bedrooms', true);
    $cs_bathrooms = get_post_meta(get_the_ID(), '_cs_bathrooms', true);
    $cs_acres = get_post_meta(get_the_ID(), '_cs_acres', true);
    $cs_garage = get_post_meta(get_the_ID(), '_cs_garage', true);
    $cs_basement = get_post_meta(get_the_ID(), '_cs_basement', true);
    
    // Hero section
    $hero_image = get_post_meta(get_the_ID(), '_cs_hero_image', true);
    $hero_eyebrow = get_post_meta(get_the_ID(), '_cs_hero_eyebrow', true);
    $hero_subtitle = get_post_meta(get_the_ID(), '_cs_hero_subtitle', true);
    
    // Intro quote
    $intro_quote = get_post_meta(get_the_ID(), '_cs_intro_quote', true);
    
    // Get gallery images
    $gallery_images = get_post_meta(get_the_ID(), '_project_gallery', true);
    if (!is_array($gallery_images)) {
        $gallery_images = array();
    }
    
    // Get all section images
    $ext_front = get_post_meta(get_the_ID(), '_cs_ext_front', true);
    $ext_rear = get_post_meta(get_the_ID(), '_cs_ext_rear', true);
    $foyer_image = get_post_meta(get_the_ID(), '_cs_foyer_image', true);
    $living_image = get_post_meta(get_the_ID(), '_cs_living_image', true);
    $dining_image = get_post_meta(get_the_ID(), '_cs_dining_image', true);
    $kitchen_main = get_post_meta(get_the_ID(), '_cs_kitchen_main', true);
    $kitchen_prep = get_post_meta(get_the_ID(), '_cs_kitchen_prep', true);
    $primary_bed = get_post_meta(get_the_ID(), '_cs_primary_bed', true);
    $primary_bath = get_post_meta(get_the_ID(), '_cs_primary_bath', true);
    $primary_vanity = get_post_meta(get_the_ID(), '_cs_primary_vanity', true);
    $primary_closet = get_post_meta(get_the_ID(), '_cs_primary_closet', true);
    $office_image = get_post_meta(get_the_ID(), '_cs_office_image', true);
    $powder_image = get_post_meta(get_the_ID(), '_cs_powder_image', true);
?>

<!-- Case Study Hero Section -->
<section class="case-study-hero" style="background: url('<?php echo $hero_image ? wp_get_attachment_url($hero_image) : get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>') center/cover no-repeat; min-height: 85vh; display: flex; align-items: flex-end; position: relative; background-attachment: fixed;">
    <!-- Dark overlay - max 30% opacity on bottom third only -->
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(180deg, rgba(14,14,14,0.5) 35%, rgba(14,14,14,0.5) 55%, rgba(14,14,14,0.5) 75%, rgba(14,14,14,0.5) 100%); z-index: 1; pointer-events: none;"></div>
    
    <div class="container" style="padding-bottom: 5rem; position: relative; z-index: 2;">
        <div class="case-study-hero-content" style="max-width: 700px;">
            <?php if ($hero_eyebrow || $location || $size || $cs_acres) : ?>
                <p class="case-study-eyebrow" style="font-size: 12px; font-weight: 600; letter-spacing: 0.2em; text-transform: uppercase; color: #D4AF37; margin-bottom: 0.75rem;">
                    <?php 
                    if ($hero_eyebrow) {
                        echo esc_html($hero_eyebrow);
                    } else {
                        $parts = array();
                        if ($location) $parts[] = $location;
                        if ($size) $parts[] = number_format($size) . ' Sq Ft';
                        if ($cs_acres) $parts[] = $cs_acres . ' Acres';
                        echo esc_html(implode(' · ', $parts));
                    }
                    ?>
                </p>
            <?php endif; ?>
            
            <h1 class="case-study-title" style="font-family: var(--font-primary); font-size: clamp(3rem, 6vw, 5rem); font-weight: 400; color: #fff; line-height: 1.05; margin-bottom: 1.25rem;">
                <?php the_title(); ?>
            </h1>
            
            <?php if ($hero_subtitle) : ?>
                <p class="case-study-subtitle" style="font-size: 1.125rem; font-weight: 300; color: rgb(255 255 255 / 0.89); line-height: 1.65; max-width: 650px;">
                    <?php echo esc_html($hero_subtitle); ?>
                </p>
            <?php endif; ?>
        </div>
    </div>
    
    <!-- Scroll Indicator - Animated Gold Arrow Only (Left Side) -->
    <div class="scroll-indicator" style="position: absolute; bottom: 2.5rem; left: 3rem; text-align: center; z-index: 2; display: flex; flex-direction: column; align-items: center;">
        <div style="width: 1px; height: 50px; background: linear-gradient(to bottom, transparent, #D4AF37); margin-bottom: 0.75rem;"></div>
        <i class="fas fa-chevron-down" style="color: #D4AF37; font-size: 16px; animation: bounce 2s infinite;"></i>
    </div>
</section>

<!-- SECTION 02: Intro Statement -->
<section class="cs-section cs-intro" style="background: var(--color-dark-2, #141414); padding: 5rem 0; border-top: 1px solid rgba(184,149,42,0.1);">
    <div class="container" style="max-width: 900px; text-align: center;">
        <!-- Stats Bar -->
        <?php if ($cs_bedrooms || $cs_bathrooms || $cs_garage || $cs_basement) : ?>
            <div class="case-study-stats" style="display: flex; justify-content: center; gap: 2rem; margin-bottom: 3rem; flex-wrap: wrap; font-size: 14px; color: var(--color-text-muted, #7A7570);">
                <?php if ($cs_bedrooms) : ?>
                    <span><strong style="color: #D4AF37;"><?php echo esc_html($cs_bedrooms); ?></strong> Bedrooms</span>
                <?php endif; ?>
                <?php if ($cs_bathrooms) : ?>
                    <span>·</span>
                    <span><strong style="color: #D4AF37;"><?php echo esc_html($cs_bathrooms); ?></strong> Bathrooms</span>
                <?php endif; ?>
                <?php if ($cs_garage) : ?>
                    <span>·</span>
                    <span><strong style="color: #D4AF37;"><?php echo esc_html($cs_garage); ?></strong> Car Garage</span>
                <?php endif; ?>
                <?php if ($cs_basement) : ?>
                    <span>·</span>
                    <span><?php echo esc_html($cs_basement); ?></span>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
        <!-- Opening Quote -->
        <?php if ($intro_quote) : ?>
            <div style="position: relative; max-width: 800px; margin: 0 auto;">
                <blockquote class="case-study-quote" style="font-family: var(--font-primary); font-size: clamp(1.125rem, 2.5vw, 1.375rem); font-weight: 300; font-style: italic; color: #D4AF37; line-height: 1.7; margin: 0; padding: 0 2rem;">
                    <?php echo esc_html($intro_quote); ?>
                </blockquote>
            </div>
            <p style="font-size: 13px; color: var(--color-text-muted, #7A7570); margin-top: 3rem;">
                — New Horizon Developments, <?php echo $location ? esc_html($location) : 'Georgia'; ?>
            </p>
        <?php endif; ?>
    </div>
</section>

<!-- SECTION 03: Exterior (Front & Rear) -->
<section class="cs-section cs-exterior section" style="padding: 5rem 0;">
    <div class="container" style="max-width: 1200px;">
        <h2 class="cs-section-title" style="font-family: var(--font-primary); font-size: clamp(1.75rem, 3vw, 2.25rem); font-weight: 400; color: #fff; margin-bottom: 3rem; text-align: center;">
            The Exterior
        </h2>
        
        <div class="cs-two-col" style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
            <!-- Front Elevation -->
            <div class="cs-image-block">
                <?php if ($ext_front) : ?>
                <div class="cs-image-wrapper">
                    <img src="<?php echo wp_get_attachment_url($ext_front); ?>" alt="Front Elevation">
                </div>
                <?php endif; ?>
                <h3 style="font-size: 1.125rem; font-weight: 500; color: #D4AF37; margin-bottom: 0.5rem;">The Arrival</h3>
                <p style="font-size: 14px; color: var(--color-text, #E8E2D5); line-height: 1.75;">
                    The front elevation commands attention without demanding it. White brick, dark steel accents, and a three-car garage create a presence that is modern, grounded, and unmistakably refined.
                </p>
            </div>
            
            <!-- Rear Elevation -->
            <div class="cs-image-block">
                <?php if ($ext_rear) : ?>
                <div class="cs-image-wrapper">
                    <img src="<?php echo wp_get_attachment_url($ext_rear); ?>" alt="Rear Elevation">
                </div>
                <?php endif; ?>
                <h3 style="font-size: 1.125rem; font-weight: 500; color: #D4AF37; margin-bottom: 0.5rem;">Outdoor Living</h3>
                <p style="font-size: 14px; color: var(--color-text, #E8E2D5); line-height: 1.75;">
                    The rear reveals its full scale — stacked covered porches on every level, open to the wooded acreage beyond. This is where privacy meets lifestyle.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- SECTION 04: Entry Foyer (Showstopper) -->
<section class="cs-section cs-foyer section" style="background: var(--color-dark-2, #141414); padding: 5rem 0;">
    <div class="container" style="max-width: 1200px;">
        <div class="cs-two-col" style="display: grid; grid-template-columns: 1.2fr 1fr; gap: 3rem; align-items: center;">
            <!-- Large Foyer Image -->
            <?php if ($foyer_image) : ?>
            <div class="cs-image-wrapper">
                <img src="<?php echo wp_get_attachment_url($foyer_image); ?>" alt="Entry Foyer">
            <?php endif; ?>
            </div>
            
            <!-- Copy Block -->
            <div class="cs-copy-block">
                <p style="font-size: 11px; font-weight: 600; letter-spacing: 0.2em; text-transform: uppercase; color: #D4AF37; margin-bottom: 0.75rem;">
                    The Entry Experience
                </p>
                <h2 style="font-family: var(--font-primary); font-size: clamp(1.75rem, 3vw, 2.5rem); font-weight: 400; color: #fff; margin-bottom: 1.25rem; line-height: 1.2;">
                    Where the Home Announces Itself
                </h2>
                <p style="font-size: 15px; color: var(--color-text, #E8E2D5); line-height: 1.8; margin-bottom: 1.5rem;">
                    From the moment you step inside, the home sets the tone. Dual floating staircases rise on either side of the foyer, each tread lit from below. A three-tiered brass chandelier anchors the soaring double-height ceiling. This is not an entryway — it is an arrival.
                </p>
                <ul style="list-style: none; padding: 0; font-size: 14px; color: var(--color-text-muted, #7A7570); line-height: 2;">
                    <li>✦ &nbsp;Dual floating staircases with LED tread lighting</li>
                    <li>✦ &nbsp;Three-tier brass ring chandelier</li>
                    <li>✦ &nbsp;Double-height ceilings</li>
                    <li>✦ &nbsp;Direct rear sightline to outdoor living</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- SECTION 05: Living & Dining -->
<section class="cs-section cs-living-dining section" style="padding: 5rem 0;">
    <div class="container" style="max-width: 1200px;">
        <h2 class="cs-section-title" style="font-family: var(--font-primary); font-size: clamp(1.75rem, 3vw, 2.25rem); font-weight: 400; color: #fff; margin-bottom: 3rem; text-align: center;">
            Living & Dining
        </h2>
        
        <div class="cs-two-col" style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
            <!-- Living Room -->
            <?php if ($living_image) : ?>
            <div class="cs-image-wrapper">
                <img src="<?php echo wp_get_attachment_url($living_image); ?>" alt="Living Room">
            <?php endif; ?>
            </div>
            
            <!-- Dining Room -->
            <?php if ($dining_image) : ?>
            <div class="cs-image-wrapper">
                <img src="<?php echo wp_get_attachment_url($dining_image); ?>" alt="Dining Room">
            <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- SECTION 06: Kitchen -->
<section class="cs-section cs-kitchen section" style="background: var(--color-dark-2, #141414); padding: 5rem 0;">
    <div class="container" style="max-width: 1200px;">
        <h2 class="cs-section-title" style="font-family: var(--font-primary); font-size: clamp(1.75rem, 3vw, 2.25rem); font-weight: 400; color: #fff; margin-bottom: 3rem; text-align: center;">
            Chef's Kitchen & Prep Kitchen
        </h2>
        
        <div class="cs-two-col" style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
            <!-- Main Kitchen -->
            <div class="cs-image-block">
                <?php if ($kitchen_main) : ?>
                <div class="cs-image-wrapper">
                    <img src="<?php echo wp_get_attachment_url($kitchen_main); ?>" alt="Main Kitchen">
                <?php endif; ?>
                </div>
                <h3 style="font-size: 1rem; font-weight: 500; color: #D4AF37; margin-bottom: 0.25rem;">Main Kitchen</h3>
            </div>
            
            <!-- Prep Kitchen -->
            <div class="cs-image-block">
                <?php if ($kitchen_prep) : ?>
                <div class="cs-image-wrapper">
                    <img src="<?php echo wp_get_attachment_url($kitchen_prep); ?>" alt="Prep Kitchen">
                <?php endif; ?>
                </div>
                <h3 style="font-size: 1rem; font-weight: 500; color: #D4AF37; margin-bottom: 0.25rem;">Prep Kitchen & Butler's Pantry</h3>
            </div>
        </div>
        
        <div class="cs-copy-block" style="max-width: 900px; margin: 0 auto;">
            <p style="font-size: 15px; color: var(--color-text, #E8E2D5); line-height: 1.8; margin-bottom: 1.5rem;">
                The kitchen was designed for two kinds of people: those who love to cook, and those who love to entertain while someone else does. The main kitchen features dark custom cabinetry, a marble waterfall island, and professional-grade appliances throughout. The adjacent prep kitchen keeps the main space clean and guest-ready at all times.
            </p>
            <p style="font-size: 13px; color: var(--color-text-muted, #7A7570); line-height: 1.7;">
                <strong style="color: #D4AF37;">Design details:</strong> Custom dark cabinetry with brass hardware · Marble waterfall island · 62" integrated refrigerator · Dedicated prep kitchen · Walk-in pantry · Pot filler at range
            </p>
        </div>
    </div>
</section>

<!-- SECTION 07: Primary Suite -->
<section class="cs-section cs-primary-suite section" style="padding: 5rem 0;">
    <div class="container" style="max-width: 1200px;">
        <h2 class="cs-section-title" style="font-family: var(--font-primary); font-size: clamp(1.75rem, 3vw, 2.25rem); font-weight: 400; color: #fff; margin-bottom: 3rem; text-align: center;">
            Primary Suite
        </h2>
        
        <!-- 2x2 Grid -->
        <div class="cs-grid-2x2" style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
            <?php if ($primary_bed) : ?>
            <div class="cs-image-wrapper">
                <img src="<?php echo wp_get_attachment_url($primary_bed); ?>" alt="Primary Bedroom">
            </div>
            <?php endif; ?>
            <?php if ($primary_bath) : ?>
            <div class="cs-image-wrapper">
                <img src="<?php echo wp_get_attachment_url($primary_bath); ?>" alt="Primary Bath">
            </div>
            <?php endif; ?>
            <?php if ($primary_vanity) : ?>
            <div class="cs-image-wrapper">
                <img src="<?php echo wp_get_attachment_url($primary_vanity); ?>" alt="Vanity">
            </div>
            <?php endif; ?>
            <?php if ($primary_closet) : ?>
            <div class="cs-image-wrapper">
                <img src="<?php echo wp_get_attachment_url($primary_closet); ?>" alt="Walk-in Closet">
            </div>
            <?php endif; ?>
        </div>
        
        <div class="cs-copy-block" style="max-width: 900px; margin: 0 auto;">
            <p style="font-size: 15px; color: var(--color-text, #E8E2D5); line-height: 1.8;">
                The primary suite occupies its own wing of the upper level. Bedroom, spa-style bath, dual walk-in closets, and a private covered balcony overlooking the rear acreage. Every detail was chosen to feel like a retreat — not just a place to sleep.
            </p>
        </div>
    </div>
</section>

<!-- SECTION 08: Office & Powder -->
<section class="cs-section cs-office-powder section" style="background: var(--color-dark-2, #141414); padding: 5rem 0;">
    <div class="container" style="max-width: 1200px;">
        <h2 class="cs-section-title" style="font-family: var(--font-primary); font-size: clamp(1.75rem, 3vw, 2.25rem); font-weight: 400; color: #fff; margin-bottom: 3rem; text-align: center;">
            Home Office & Powder Room
        </h2>
        
        <div class="cs-two-col" style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
            <!-- Office -->
            <?php if ($office_image) : ?>
            <div class="cs-image-wrapper">
                <img src="<?php echo wp_get_attachment_url($office_image); ?>" alt="Home Office">
            <?php endif; ?>
            </div>
            
            <!-- Powder Room -->
            <?php if ($powder_image) : ?>
            <div class="cs-image-wrapper">
                <img src="<?php echo wp_get_attachment_url($powder_image); ?>" alt="Powder Room">
            <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- SECTION 09: Floor Plans -->
<?php
$fp_intro = get_post_meta(get_the_ID(), '_cs_fp_intro', true);
$fp_main_rooms = get_post_meta(get_the_ID(), '_cs_fp_main_rooms', true);
$fp_upper_rooms = get_post_meta(get_the_ID(), '_cs_fp_upper_rooms', true);

// Default values if not set
if (empty($fp_intro)) {
    $fp_intro = "Two floors of intentional living. The main level is built for daily life and effortless hosting — open, connected, and anchored by a kitchen that performs at every level. The upper floor is a private world of its own, centered on a primary suite that rivals the finest resorts, with four additional bedrooms that give every member of the household their own space and privacy.";
}
if (empty($fp_main_rooms)) {
    $fp_main_rooms = "Foyer — Grand dual staircase entry\nLiving Room — Open great room\nKitchen — Chef's kitchen\nButler's Pantry — Prep kitchen\nWalk-In Pantry\nDining Room\nOffice — Dedicated workspace\nIn-Law Suite — Private bedroom + bath\nPowder Room\nMud Room\n3-Car Garage\nCovered Porch — Rear outdoor living";
}
if (empty($fp_upper_rooms)) {
    $fp_upper_rooms = "Owner's Bedroom — Primary suite\nOwner's Bath — Spa bathroom\nOwner's Closet (His)\nOwner's Closet (Hers)\nLaundry Room — Upper level\nFamily Room / Sitting Area\nBedroom 3 — En suite\nBedroom 4 — En suite\nBedroom 5 — En suite\nBath 3 & Bath 4\nCovered Porch — Upper rear deck\nOpen to Below — Foyer overlook";
}

// Parse rooms
$main_rooms = array_filter(explode("\n", $fp_main_rooms));
$upper_rooms = array_filter(explode("\n", $fp_upper_rooms));
?>
<section class="cs-section cs-floor-plans section" style="padding: 5rem 0; background: var(--color-dark-2, #141414);">
    <div class="container" style="max-width: 1100px;">
        <h2 class="cs-section-title" style="font-family: var(--font-primary); font-size: clamp(1.75rem, 3vw, 2.25rem); font-weight: 400; color: #fff; margin-bottom: 3rem; text-align: center;">
            Floor Plans
        </h2>
        
        <div class="cs-two-col" style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
            <!-- Main Level -->
            <div class="cs-floor-plan-card" style="background: rgba(28,28,28,0.5); border: 1px solid rgba(184,149,42,0.15); border-radius: 4px; padding: 2rem;">
                <h3 style="font-size: 1.25rem; font-weight: 600; color: #D4AF37; margin-bottom: 1.5rem; letter-spacing: 0.05em;">First Floor — Main Level</h3>
                <div class="fp-rooms">
                    <?php foreach ($main_rooms as $room) : 
                        $parts = explode('—', $room, 2);
                        $room_name = trim($parts[0]);
                        $room_desc = isset($parts[1]) ? trim($parts[1]) : '';
                    ?>
                    <div style="padding: 0.75rem 1rem; background: rgba(20,20,20,0.6); margin-bottom: 0.5rem; border-radius: 3px; border-left: 2px solid rgba(184,149,42,0.4);">
                        <strong style="color: #fff; font-size: 13px; font-weight: 500;"><?php echo esc_html($room_name); ?></strong>
                        <?php if ($room_desc) : ?>
                            <span style="color: #7A7570; font-size: 12px;"> — <?php echo esc_html($room_desc); ?></span>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <!-- Upper Level -->
            <div class="cs-floor-plan-card" style="background: rgba(28,28,28,0.5); border: 1px solid rgba(184,149,42,0.15); border-radius: 4px; padding: 2rem;">
                <h3 style="font-size: 1.25rem; font-weight: 600; color: #D4AF37; margin-bottom: 1.5rem; letter-spacing: 0.05em;">Second Floor — Upper Level</h3>
                <div class="fp-rooms">
                    <?php foreach ($upper_rooms as $room) : 
                        $parts = explode('—', $room, 2);
                        $room_name = trim($parts[0]);
                        $room_desc = isset($parts[1]) ? trim($parts[1]) : '';
                    ?>
                    <div style="padding: 0.75rem 1rem; background: rgba(20,20,20,0.6); margin-bottom: 0.5rem; border-radius: 3px; border-left: 2px solid rgba(184,149,42,0.4);">
                        <strong style="color: #fff; font-size: 13px; font-weight: 500;"><?php echo esc_html($room_name); ?></strong>
                        <?php if ($room_desc) : ?>
                            <span style="color: #7A7570; font-size: 12px;"> — <?php echo esc_html($room_desc); ?></span>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        
        <div style="max-width: 900px; margin: 0 auto; padding: 1.5rem; background: rgba(20,20,20,0.4); border-left: 3px solid #D4AF37; border-radius: 3px;">
            <p style="font-size: 14px; color: #E8E2D5; line-height: 1.8; margin: 0;">
                <?php echo wp_kses_post($fp_intro); ?>
            </p>
        </div>
    </div>
</section>

<!-- SECTION 10: Final CTA -->
<section class="cs-section cs-cta section" style="background: var(--color-dark-2, #141414); padding: 5rem 0;">
    <div class="container" style="max-width: 800px;">
        <div class="case-study-cta" style="background: var(--color-dark-3, #1C1C1C); border: 1px solid rgba(184,149,42,0.18); border-radius: 4px; padding: 3rem 2rem; text-align: center;">
            <h2 style="font-family: var(--font-primary); font-size: clamp(1.75rem, 3vw, 2.25rem); font-weight: 400; color: #fff; margin-bottom: 1rem; line-height: 1.3;">
                Your Home Should Be This Considered
            </h2>
            <p style="font-size: 14px; color: var(--color-text-muted, #7A7570); margin-bottom: 2rem; line-height: 1.7;">
                <?php the_title(); ?> is one vision brought to life. Yours is next.<br>
                Tell us where you want to build — and we'll show you what's possible.
            </p>
            <a href="<?php echo esc_url(home_url('/#contact')); ?>" class="btn btn-primary" style="display: inline-block; font-size: 12px; font-weight: 500; letter-spacing: 0.15em; text-transform: uppercase; padding: 14px 36px;">
                Begin Your Project →
            </a>
        </div>
    </div>
</section>

<?php endwhile; ?>

<style>
@keyframes bounce {
    0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
    40% { transform: translateY(-10px); }
    60% { transform: translateY(-5px); }
}

.case-study-gallery .gallery-row {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 2rem;
}

@media (max-width: 768px) {
    .case-study-hero {
        min-height: 70vh !important;
    }
    
    .case-study-stats {
        flex-direction: column;
        gap: 0.5rem !important;
    }
    
    .case-study-stats span {
        display: block;
    }
    
    .case-study-stats span:contains('·') {
        display: none;
    }
    
    .case-study-gallery .gallery-row {
        grid-template-columns: 1fr !important;
    }
}
</style>

<!-- Lightbox Modal -->
<div class="cs-lightbox" id="csLightbox">
    <span class="cs-lightbox-close" id="closeLightbox">&times;</span>
    <span class="cs-lightbox-nav cs-lightbox-prev" id="prevImage">&#10094;</span>
    <span class="cs-lightbox-nav cs-lightbox-next" id="nextImage">&#10095;</span>
    <div class="cs-lightbox-content">
        <img src="" alt="" id="lightboxImage">
    </div>
</div>

<script>
jQuery(document).ready(function($) {
    // Collect all gallery images
    var galleryImages = [];
    var currentIndex = 0;
    
    $('.cs-image-wrapper img').each(function(index) {
        var imgSrc = $(this).attr('src');
        var imgAlt = $(this).attr('alt');
        
        galleryImages.push({
            src: imgSrc,
            alt: imgAlt
        });
        
        // Add click handler
        $(this).parent().attr('data-index', index).on('click', function() {
            currentIndex = parseInt($(this).attr('data-index'));
            openLightbox(currentIndex);
        });
    });
    
    function openLightbox(index) {
        if (galleryImages[index]) {
            $('#lightboxImage').attr('src', galleryImages[index].src);
            $('#lightboxImage').attr('alt', galleryImages[index].alt);
            $('#csLightbox').addClass('active');
            $('body').css('overflow', 'hidden');
        }
    }
    
    function closeLightbox() {
        $('#csLightbox').removeClass('active');
        $('body').css('overflow', 'auto');
    }
    
    function showNextImage() {
        currentIndex = (currentIndex + 1) % galleryImages.length;
        openLightbox(currentIndex);
    }
    
    function showPrevImage() {
        currentIndex = (currentIndex - 1 + galleryImages.length) % galleryImages.length;
        openLightbox(currentIndex);
    }
    
    // Event listeners
    $('#closeLightbox').on('click', closeLightbox);
    $('#nextImage').on('click', showNextImage);
    $('#prevImage').on('click', showPrevImage);
    
    // Close on background click
    $('#csLightbox').on('click', function(e) {
        if (e.target.id === 'csLightbox') {
            closeLightbox();
        }
    });
    
    // Keyboard navigation
    $(document).on('keydown', function(e) {
        if ($('#csLightbox').hasClass('active')) {
            if (e.key === 'Escape') closeLightbox();
            if (e.key === 'ArrowRight') showNextImage();
            if (e.key === 'ArrowLeft') showPrevImage();
        }
    });
});
</script>

<?php
get_footer();
?>
