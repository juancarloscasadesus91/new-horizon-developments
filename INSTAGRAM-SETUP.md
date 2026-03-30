# Guía de Configuración de Instagram Feed

## Opción 1: Usar un Plugin (Recomendado - Más Fácil)

### Plugins Recomendados:

1. **Smash Balloon Instagram Feed** (Más popular)
   - Ve a **Plugins** → **Add New**
   - Busca "Smash Balloon Instagram Feed"
   - Instala y activa
   - Sigue el asistente de configuración
   - Conecta tu cuenta de Instagram
   - Usa el shortcode `[instagram-feed]` en cualquier página

2. **Instagram Feed by 10Web**
   - Similar al anterior
   - Interfaz muy intuitiva
   - Conecta fácilmente con Instagram

### Integrar el Plugin con el Tema:

Una vez instalado el plugin, edita `front-page.php` línea 383-385 y reemplaza:

```php
<div id="instagram-feed" class="instagram-feed">
    <!-- Instagram feed will be loaded here -->
</div>
```

Por:

```php
<div class="instagram-feed">
    <?php echo do_shortcode('[instagram-feed num=6 cols=6]'); ?>
</div>
```

---

## Opción 2: Instagram Basic Display API (Avanzado)

### Paso 1: Crear una App de Facebook

1. Ve a [Facebook Developers](https://developers.facebook.com/)
2. Click en **My Apps** → **Create App**
3. Selecciona **Consumer** como tipo de app
4. Completa el nombre de la app

### Paso 2: Configurar Instagram Basic Display

1. En tu app, ve a **Products** → **Add Product**
2. Busca **Instagram Basic Display** y click en **Set Up**
3. En **Basic Display**, click en **Create New App**
4. Completa:
   - **Display Name**: Nombre de tu sitio
   - **Valid OAuth Redirect URIs**: `https://tu-sitio.com/`
   - **Deauthorize Callback URL**: `https://tu-sitio.com/`
   - **Data Deletion Request URL**: `https://tu-sitio.com/`
5. Guarda los cambios

### Paso 3: Agregar un Usuario de Prueba de Instagram

1. En **Roles** → **Instagram Testers**
2. Click en **Add Instagram Testers**
3. Ingresa tu nombre de usuario de Instagram
4. Ve a tu cuenta de Instagram → **Settings** → **Apps and Websites** → **Tester Invites**
5. Acepta la invitación

### Paso 4: Generar Access Token

1. En **Basic Display** → **User Token Generator**
2. Click en **Generate Token** junto a tu cuenta de Instagram
3. Autoriza la app
4. Copia el **Access Token** generado

### Paso 5: Configurar en WordPress

Edita `js/instagram-feed.js` línea 13 y cambia:

```javascript
const instagramConfig = {
    showPlaceholders: true,  // Cambiar a false
    itemsToShow: 6
};
```

Luego, en `functions.php`, agrega esta función:

```php
function new_horizon_instagram_token() {
    return 'TU_ACCESS_TOKEN_AQUI'; // Pega tu token aquí
}
```

Y modifica `js/instagram-feed.js` para usar el token desde PHP.

---

## Opción 3: Feed Manual con Imágenes Estáticas

Si solo quieres mostrar algunas imágenes sin conexión a Instagram:

1. Sube 6 imágenes a **Media** → **Add New**
2. Edita `front-page.php` línea 383-385
3. Reemplaza con:

```php
<div class="instagram-feed">
    <a href="https://instagram.com/tu-usuario" class="instagram-item">
        <img src="<?php echo get_template_directory_uri(); ?>/images/instagram-1.jpg" alt="Instagram">
    </a>
    <a href="https://instagram.com/tu-usuario" class="instagram-item">
        <img src="<?php echo get_template_directory_uri(); ?>/images/instagram-2.jpg" alt="Instagram">
    </a>
    <!-- Repite para 6 imágenes -->
</div>
```

---

## Configurar URL de Instagram

1. Ve a **Appearance** → **Customize** → **Social Media**
2. En **Instagram URL**, pega tu URL de Instagram: `https://instagram.com/tu-usuario`
3. Click en **Publish**

---

## Troubleshooting

### El feed no se muestra
✓ Verifica que el plugin esté activado
✓ Revisa que el shortcode esté correcto
✓ Comprueba la consola del navegador para errores JavaScript

### Access Token expirado
✓ Los tokens de Instagram expiran cada 60 días
✓ Necesitas regenerar el token periódicamente
✓ Considera usar un plugin que maneje esto automáticamente

### Imágenes no cargan
✓ Verifica que las URLs de las imágenes sean correctas
✓ Comprueba que las imágenes existan en el servidor
✓ Revisa los permisos de las carpetas

---

## Recomendación Final

**Para la mayoría de usuarios, recomiendo usar el plugin "Smash Balloon Instagram Feed"** porque:
- ✅ Fácil de configurar (5 minutos)
- ✅ Maneja automáticamente la renovación de tokens
- ✅ Incluye caché para mejor rendimiento
- ✅ Opciones de personalización visual
- ✅ Soporte técnico disponible
