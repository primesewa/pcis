# Prime Capital Theme Component Rules

## Sidebar Search Component

Use the dedicated sidebar search component from `template-parts/sidebar-search-form.php`.

### Standard usage
- Sidebar/icon variant:
```php
get_template_part('template-parts/sidebar', 'search-form');
```

### Behavior rules
1. Sidebar variant must always be:
   - left input field
   - right icon-only submit button
2. Sidebar variant colors must use brand variables:
   - `--button-bg`
   - `--button-hover-bg`
3. Do not add plain text submit labels in sidebar variant.
4. Avoid duplicate search widgets in single-post sidebar:
   - custom search card should be first
   - extra `widget_search` instances should be hidden/removed

## Hero Component (Global Standard)

Use the shared hero component from `template-parts/section-hero.php`.

### Usage
```php
get_template_part(
    'template-parts/section',
    'hero',
    array(
        'eyebrow' => 'Page',
        'title' => get_the_title(),
        'description' => '',
    )
);
```

### Rules
1. Use this component for page, post, and archive-like headers.
2. Keep hero visual style consistent with archive hero (`/download-category/forms/` style).
3. Do not create one-off hero blocks with separate structures.
4. Prefer changing `section-hero.php` for global hero improvements.

### Styling standard
1. Sidebar cards use compact radius and consistent spacing.
2. All sidebar action buttons use the same hover/shadow pattern.
3. Sidebar lists should be bullet-free unless a design explicitly requires bullets.

## Archive Sidebar Order

Use this order for archive right sidebar blocks:
1. Search
2. CTA
3. Contact

## Title Prefix Rule

Archive/taxonomy headings should be clean text only.
Do not show prefixes like:
- `Category:`
- `Tag:`
- `Download Category:`
