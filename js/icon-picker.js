/**
 * Font Awesome Icon Picker for WordPress Admin
 */
(function($) {
    'use strict';

    // List of most common Font Awesome icons for construction and services
    const fontAwesomeIcons = [
        // Construction and Tools
        'fas fa-hammer', 'fas fa-tools', 'fas fa-wrench', 'fas fa-screwdriver',
        'fas fa-hard-hat', 'fas fa-toolbox', 'fas fa-ruler', 'fas fa-ruler-combined',
        'fas fa-pencil-ruler', 'fas fa-drafting-compass', 'fas fa-paint-roller',
        'fas fa-brush', 'fas fa-trowel', 'fas fa-trowel-bricks',
        
        // Buildings and Houses
        'fas fa-home', 'fas fa-house', 'fas fa-building', 'fas fa-city',
        'fas fa-warehouse', 'fas fa-store', 'fas fa-industry', 'fas fa-hotel',
        'fas fa-house-user', 'fas fa-house-chimney', 'fas fa-igloo',
        
        // Nature and Sustainability
        'fas fa-tree', 'fas fa-leaf', 'fas fa-seedling', 'fas fa-sun',
        'fas fa-wind', 'fas fa-water', 'fas fa-mountain', 'fas fa-recycle',
        'fas fa-solar-panel',
        
        // Design and Planning
        'fas fa-compass', 'fas fa-map', 'fas fa-map-marked-alt', 'fas fa-draw-polygon',
        'fas fa-vector-square', 'fas fa-shapes', 'fas fa-cube', 'fas fa-cubes',
        
        // Security and Quality
        'fas fa-shield-alt', 'fas fa-shield-check', 'fas fa-check-circle',
        'fas fa-certificate', 'fas fa-award', 'fas fa-medal', 'fas fa-star',
        'fas fa-lock', 'fas fa-key',
        
        // People and Team
        'fas fa-users', 'fas fa-user-tie', 'fas fa-user-hard-hat', 'fas fa-people-carry',
        'fas fa-handshake', 'fas fa-hands-helping',
        
        // Communication
        'fas fa-phone', 'fas fa-phone-alt', 'fas fa-envelope', 'fas fa-comments',
        'fas fa-comment-dots', 'fas fa-headset',
        
        // Location
        'fas fa-map-marker-alt', 'fas fa-location-dot', 'fas fa-map-pin',
        
        // Time and Calendar
        'fas fa-clock', 'fas fa-calendar', 'fas fa-calendar-check', 'fas fa-hourglass',
        
        // Documents
        'fas fa-file-contract', 'fas fa-file-signature', 'fas fa-clipboard-check',
        'fas fa-clipboard-list', 'fas fa-tasks',
        
        // Money and Budget
        'fas fa-dollar-sign', 'fas fa-coins', 'fas fa-money-bill-wave', 'fas fa-calculator',
        'fas fa-chart-line', 'fas fa-chart-bar',
        
        // Energy and Utilities
        'fas fa-bolt', 'fas fa-lightbulb', 'fas fa-fire', 'fas fa-temperature-high',
        'fas fa-plug', 'fas fa-battery-full',
        
        // Transportation
        'fas fa-truck', 'fas fa-truck-moving', 'fas fa-dolly', 'fas fa-pallet',
        
        // Other
        'fas fa-cog', 'fas fa-cogs', 'fas fa-sliders-h', 'fas fa-magic',
        'fas fa-gem', 'fas fa-crown', 'fas fa-trophy', 'fas fa-heart',
        'fas fa-thumbs-up', 'fas fa-check', 'fas fa-times', 'fas fa-plus',
        'fas fa-minus', 'fas fa-arrow-right', 'fas fa-arrow-left',
        'fas fa-chevron-right', 'fas fa-chevron-left', 'fas fa-angle-right',
        'fas fa-angle-left', 'fas fa-bars', 'fas fa-ellipsis-v',
        'fas fa-search', 'fas fa-filter', 'fas fa-sort', 'fas fa-download',
        'fas fa-upload', 'fas fa-share', 'fas fa-link', 'fas fa-external-link-alt'
    ];

    // Create the icon picker modal
    function createIconPickerModal() {
        const modalHTML = `
            <div id="icon-picker-modal" class="icon-picker-modal">
                <div class="icon-picker-content">
                    <div class="icon-picker-header">
                        <h2>Select Icon</h2>
                        <button type="button" class="icon-picker-close">&times;</button>
                    </div>
                    <div class="icon-picker-search">
                        <input type="text" id="icon-search" placeholder="Search icons..." />
                    </div>
                    <div class="icon-picker-grid" id="icon-grid">
                        ${fontAwesomeIcons.map(icon => `
                            <div class="icon-picker-item" data-icon="${icon}">
                                <i class="${icon}"></i>
                                <span>${icon.replace('fas fa-', '')}</span>
                            </div>
                        `).join('')}
                    </div>
                </div>
            </div>
        `;
        
        $('body').append(modalHTML);
    }

    // Initialize the icon picker
    function initIconPicker() {
        // Create the modal if it doesn't exist
        if ($('#icon-picker-modal').length === 0) {
            createIconPickerModal();
        }

        const $modal = $('#icon-picker-modal');
        const $iconInput = $('#service_icon');
        const $iconPreview = $('#icon-preview');
        const $searchInput = $('#icon-search');
        let selectedIcon = $iconInput.val();

        // Open modal when clicking the button
        $(document).on('click', '#select-icon-btn', function(e) {
            e.preventDefault();
            $modal.fadeIn(200);
            $('body').addClass('icon-picker-open');
            
            // Highlight the current icon if it exists
            if (selectedIcon) {
                $('.icon-picker-item').removeClass('selected');
                $(`.icon-picker-item[data-icon="${selectedIcon}"]`).addClass('selected');
            }
        });

        // Close modal
        $(document).on('click', '.icon-picker-close, #icon-picker-modal', function(e) {
            if (e.target === this) {
                $modal.fadeOut(200);
                $('body').removeClass('icon-picker-open');
            }
        });

        // Select icon
        $(document).on('click', '.icon-picker-item', function() {
            const icon = $(this).data('icon');
            selectedIcon = icon;
            
            // Update text field
            $iconInput.val(icon);
            
            // Update preview
            $iconPreview.html(`<i class="${icon}"></i>`);
            
            // Highlight selection
            $('.icon-picker-item').removeClass('selected');
            $(this).addClass('selected');
            
            // Close modal
            $modal.fadeOut(200);
            $('body').removeClass('icon-picker-open');
        });

        // Icon search
        $searchInput.on('keyup', function() {
            const searchTerm = $(this).val().toLowerCase();
            
            $('.icon-picker-item').each(function() {
                const iconName = $(this).data('icon').toLowerCase();
                if (iconName.includes(searchTerm)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });

        // Close with ESC key
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape' && $modal.is(':visible')) {
                $modal.fadeOut(200);
                $('body').removeClass('icon-picker-open');
            }
        });

        // Update initial preview
        if (selectedIcon) {
            $iconPreview.html(`<i class="${selectedIcon}"></i>`);
        }
    }

    // Initialize when document is ready
    $(document).ready(function() {
        if ($('#service_icon').length > 0) {
            initIconPicker();
        }
    });

})(jQuery);
