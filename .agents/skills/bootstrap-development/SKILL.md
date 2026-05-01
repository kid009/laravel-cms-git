---
name: bootstrap-development
description: "Styles applications using Bootstrap 5 utilities and components. Activates when adding styles, restyling components, working with grids, spacing, layout, flex, responsive design, colors, typography, or borders; or when the user mentions CSS, styling, classes, Bootstrap, restyle, hero section, cards, buttons, or any visual/UI changes."
license: MIT
metadata:
  author: laravel
---

# Bootstrap Development

## When to Apply

Activate this skill when:

- Adding styles to components or pages
- Working with responsive design
- Using Bootstrap components (cards, buttons, modals, etc.)
- Extracting repeated patterns into components
- Debugging spacing or layout issues

## Documentation

Use `search-docs` for detailed Bootstrap 5 patterns and documentation.

## Basic Usage

- Use Bootstrap classes to style HTML. Check and follow existing Bootstrap conventions in the project before introducing new patterns.
- Offer to extract repeated patterns into components that match the project's conventions (e.g., Blade, JSX, Vue).
- Consider class placement, order, priority, and defaults. Remove redundant classes, add classes to parent or child elements carefully to reduce repetition, and group elements logically.

## Bootstrap 5 Specifics

- Always use Bootstrap 5 and avoid deprecated classes.
- Bootstrap uses a mobile-first approach with breakpoints: xs, sm, md, lg, xl, xxl.

### Import Syntax

Import Bootstrap SCSS in your main CSS/SCSS file:

```scss
@import 'bootstrap/scss/bootstrap';
```

### Common Utility Classes

| Category | Classes |
|----------|---------|
| Display | `d-block`, `d-inline`, `d-inline-block`, `d-flex`, `d-grid`, `d-none` |
| Flexbox | `flex-row`, `flex-column`, `justify-content-start/center/end/between/around`, `align-items-*` |
| Spacing | `m-1` to `m-5`, `p-1` to `p-5`, `mt-*`, `mb-*`, `mx-*`, `my-*` |
| Colors | `bg-primary`, `bg-secondary`, `bg-success`, `text-white`, `text-dark` |
| Borders | `border`, `border-0`, `rounded`, `rounded-circle` |
| Sizing | `w-25`, `w-50`, `w-75`, `w-100`, `h-*` |

## Spacing

Use Bootstrap spacing utilities. The base spacing unit is 0.25rem (4px):

- `1` = 0.25rem (4px)
- `2` = 0.5rem (8px)
- `3` = 1rem (16px)
- `4` = 1.5rem (24px)
- `5` = 3rem (48px)

```html
<div class="d-flex gap-3">
    <div>Item 1</div>
    <div>Item 2</div>
</div>
```

## Grid System

Bootstrap uses a 12-column grid system:

```html
<div class="container">
    <div class="row">
        <div class="col-md-8">Main content</div>
        <div class="col-md-4">Sidebar</div>
    </div>
</div>
```

## Common Patterns

### Flexbox Layout

```html
<div class="d-flex align-items-center justify-content-between">
    <div>Left content</div>
    <div>Right content</div>
</div>
```

### Card Component

```html
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Card content</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
</div>
```

### Center Content Vertically and Horizontally

```html
<div class="min-vh-100 d-flex align-items-center justify-content-center">
    <div>Centered content</div>
</div>
```

## Common Pitfalls

- Using old Bootstrap 4 classes that have changed in v5
- Forgetting that Bootstrap is mobile-first (base styles apply to all, sm/md/lg modifiers add from that breakpoint up)
- Not using the grid system properly (must be inside `.container` > `.row` > `.col-*`)
- Using custom CSS when Bootstrap utilities would suffice
