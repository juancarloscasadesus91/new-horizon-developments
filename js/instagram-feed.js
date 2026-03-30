/**
 * Instagram Feed Integration
 * 
 * NOTA: Para usar este script necesitas:
 * 1. Un Access Token de Instagram Basic Display API
 * 2. Configurar el token en WordPress Customizer
 * 
 * Alternativa: Usar un plugin como "Smash Balloon Instagram Feed"
 */

(function($) {
    'use strict';

    // Configuración
    const instagramConfig = {
        // Puedes usar la API de Instagram o un servicio de terceros
        // Por ahora, mostraremos imágenes de ejemplo
        showPlaceholders: true,
        itemsToShow: 6
    };

    function loadInstagramFeed() {
        const feedContainer = $('#instagram-feed');
        
        if (!feedContainer.length) {
            return;
        }

        // Opción 1: Usar Instagram Basic Display API (requiere token)
        // const accessToken = 'TU_ACCESS_TOKEN_AQUI';
        // const apiUrl = `https://graph.instagram.com/me/media?fields=id,caption,media_type,media_url,permalink,thumbnail_url&access_token=${accessToken}`;
        
        // Por ahora, mostrar placeholders o usar un plugin
        if (instagramConfig.showPlaceholders) {
            showPlaceholderFeed(feedContainer);
        }
    }

    function showPlaceholderFeed(container) {
        // Crear items de ejemplo
        const placeholderItems = [
            { image: 'https://via.placeholder.com/400x400/2a2a2a/c9a961?text=Project+1', likes: 245, comments: 12 },
            { image: 'https://via.placeholder.com/400x400/3a3a3a/c9a961?text=Project+2', likes: 189, comments: 8 },
            { image: 'https://via.placeholder.com/400x400/4a4a4a/c9a961?text=Project+3', likes: 312, comments: 15 },
            { image: 'https://via.placeholder.com/400x400/353535/c9a961?text=Project+4', likes: 276, comments: 11 },
            { image: 'https://via.placeholder.com/400x400/454545/c9a961?text=Project+5', likes: 198, comments: 9 },
            { image: 'https://via.placeholder.com/400x400/505050/c9a961?text=Project+6', likes: 234, comments: 14 }
        ];

        let html = '';
        placeholderItems.slice(0, instagramConfig.itemsToShow).forEach(item => {
            html += `
                <div class="instagram-item">
                    <img src="${item.image}" alt="Instagram post" loading="lazy">
                    <div class="instagram-overlay">
                        <div class="instagram-stats">
                            <span><i class="fas fa-heart"></i> ${item.likes}</span>
                            <span><i class="fas fa-comment"></i> ${item.comments}</span>
                        </div>
                    </div>
                </div>
            `;
        });

        container.html(html);
    }

    // Función para cargar feed real de Instagram
    function loadRealInstagramFeed(accessToken, container) {
        const apiUrl = `https://graph.instagram.com/me/media?fields=id,caption,media_type,media_url,permalink,thumbnail_url,timestamp&access_token=${accessToken}&limit=${instagramConfig.itemsToShow}`;

        $.ajax({
            url: apiUrl,
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.data && response.data.length > 0) {
                    displayInstagramPosts(response.data, container);
                } else {
                    showPlaceholderFeed(container);
                }
            },
            error: function(error) {
                console.error('Error loading Instagram feed:', error);
                showPlaceholderFeed(container);
            }
        });
    }

    function displayInstagramPosts(posts, container) {
        let html = '';
        
        posts.forEach(post => {
            const imageUrl = post.media_type === 'VIDEO' ? post.thumbnail_url : post.media_url;
            const caption = post.caption ? post.caption.substring(0, 100) : '';
            
            html += `
                <a href="${post.permalink}" target="_blank" rel="noopener" class="instagram-item">
                    <img src="${imageUrl}" alt="${caption}" loading="lazy">
                    <div class="instagram-overlay">
                        <div class="instagram-stats">
                            <span><i class="fab fa-instagram"></i> View on Instagram</span>
                        </div>
                    </div>
                </a>
            `;
        });

        container.html(html);
    }

    // Inicializar cuando el documento esté listo
    $(document).ready(function() {
        loadInstagramFeed();
    });

})(jQuery);
