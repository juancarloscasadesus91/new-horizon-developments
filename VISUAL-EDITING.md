# Visual Editing

This theme includes two controlled editing workflows:

- Frontend inline editing for approved text fields.
- Gutenberg patterns for building editable pages when a page needs custom block content.

## Frontend inline editing

Logged-in users with page editing permissions can edit selected text directly on the public page.

1. Log in to WordPress.
2. Visit the public page.
3. Hover over text outlined in gold.
4. Click the text and edit it in place.
5. Click outside the text to save.
6. Press Escape before leaving the field to cancel the current edit.

The layout cannot be moved or redesigned from this mode. Only approved text fields are editable.

Currently enabled:

- Home hero title, description, buttons, price anchor, credibility bar, services/portfolio/testimonials/contact/Instagram section copy, testimonial text, contact details, and CTA copy.
- About hero text, intro copy, combined section headings, combined cards, client section copy, and CTA copy.
- Services page hero copy, service card titles/descriptions, service detail page content, service benefits, service sidebar labels, footer service links, and CTA button text.
- Projects page/archive hero copy, project card titles, project detail page title/location/content/features/gallery labels/details/sidebar/CTA, and case study hero/stats/quote/section labels/floor plan intro/CTA.
- Team page hero copy, section heading, team member names/positions/contact/bios, and CTA copy.
- Footer about copy, column headings, and footer contact details.

## How to use it

1. In WordPress, edit a page.
2. Delete the old plain content if needed.
3. Click the block inserter.
4. Open **Patterns** and choose **New Horizon Sections**.
5. Insert sections such as Page Hero, Text and Image Section, Three Feature Cards, or CTA Section.
6. Edit the visible text and images directly in the block editor.
7. Update the page.

## Notes

- This is not a Divi-style frontend builder. It uses the native WordPress block editor.
- The patterns reuse the theme CSS classes, so the design stays close to the existing site.
- The older custom field/metabox templates still work for pages already using them.
- Home, About, Services, Projects, and Team now render the editable block canvas when the page has Gutenberg blocks. If a page has no blocks, it falls back to the older PHP template.
- Service titles and short descriptions are shared. Editing a service in Home, Services, the footer, or the service detail page updates the same service record everywhere.
- Project titles, content, location, size, year, status, and feature text are shared. Editing a project in Home, Projects, archive, detail page, or case study updates the same project record everywhere.
