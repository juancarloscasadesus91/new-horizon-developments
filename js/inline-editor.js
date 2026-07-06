(function($) {
    'use strict';

    var selector = '[data-nh-source][data-nh-key]';
    var noticeTimer;

    function showNotice(message, state) {
        var $notice = $('#nh-inline-edit-notice');

        if (!$notice.length) {
            $notice = $('<div id="nh-inline-edit-notice" />').appendTo('body');
        }

        $notice
            .removeClass('is-saving is-saved is-error')
            .addClass('is-' + state)
            .text(message)
            .attr('aria-live', 'polite');

        clearTimeout(noticeTimer);

        if (state !== 'saving') {
            noticeTimer = setTimeout(function() {
                $notice.removeClass('is-saving is-saved is-error').text('');
            }, 2200);
        }
    }

    function getFieldValue($field) {
        return ($field.data('nhType') || 'text') === 'html'
            ? $field.html().trim()
            : $field.text().replace(/\u00a0/g, ' ').trim();
    }

    function setFieldValue($field, value) {
        if (($field.data('nhType') || 'text') === 'html') {
            $field.html(value);
        } else {
            $field.text(value);
        }
    }

    function saveField($field) {
        var type = $field.data('nhType') || 'text';
        var value = getFieldValue($field);
        var original = $field.data('nhOriginal');

        if (value === original || $field.data('nhSaving')) {
            return;
        }

        $field.data('nhSaving', true).addClass('nh-inline-is-saving');
        showNotice(NewHorizonInlineEditor.saving, 'saving');

        $.post(NewHorizonInlineEditor.ajaxUrl, {
            action: 'new_horizon_save_inline_edit',
            nonce: NewHorizonInlineEditor.nonce,
            source: $field.data('nhSource'),
            key: $field.data('nhKey'),
            type: type,
            postId: $field.data('nhPostId') || 0,
            index: $field.data('nhIndex'),
            subkey: $field.data('nhSubkey'),
            value: value
        })
            .done(function(response) {
                if (response && response.success) {
                    $field.data('nhOriginal', response.data.value);
                    setFieldValue($field, response.data.value);
                    showNotice(NewHorizonInlineEditor.saved, 'saved');
                } else {
                    showNotice((response && response.data && response.data.message) || NewHorizonInlineEditor.error, 'error');
                    setFieldValue($field, original);
                }
            })
            .fail(function() {
                showNotice(NewHorizonInlineEditor.error, 'error');
                setFieldValue($field, original);
            })
            .always(function() {
                $field.data('nhSaving', false).removeClass('nh-inline-is-saving');
            });
    }

    $(function() {
        var $fields = $(selector);

        if (!$fields.length) {
            return;
        }

        $('body').addClass('nh-inline-edit-mode');
        $('<div class="nh-inline-edit-badge">Edit Content: click gold outlines to change text</div>').appendTo('body');

        $fields.each(function() {
            var $field = $(this);

            $field
                .addClass('nh-inline-editable')
                .attr('contenteditable', 'true')
                .attr('spellcheck', 'true')
                .attr('title', 'Click to edit')
                .data('nhOriginal', getFieldValue($field));
        });

        $(document)
            .on('click', selector, function(event) {
                event.preventDefault();
                event.stopPropagation();
            })
            .on('focus', selector, function() {
                var $field = $(this);
                $field.addClass('nh-inline-is-editing').data('nhOriginal', getFieldValue($field));
            })
            .on('blur', selector, function() {
                var $field = $(this);
                $field.removeClass('nh-inline-is-editing');
                saveField($field);
            })
            .on('keydown', selector, function(event) {
                if (event.key === 'Enter' && !event.shiftKey && $(this).data('nhType') !== 'textarea') {
                    event.preventDefault();
                    $(this).blur();
                }

                if ((event.ctrlKey || event.metaKey) && event.key === 'Enter') {
                    event.preventDefault();
                    $(this).blur();
                }

                if (event.key === 'Escape') {
                    event.preventDefault();
                    setFieldValue($(this), $(this).data('nhOriginal'));
                    $(this).blur();
                }
            });
    });
})(jQuery);
