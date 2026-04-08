# UX Pacific Academy - System Design & UI/UX Documentation

This document outlines the design system, UI/UX principles, and architectural layout rules for the UX Pacific Academy website. Maintaining these guidelines ensures a cohesive, responsive, and engaging user experience across all pages.

## 1. Core Visual Identity

The website employs a premium, modern "dark mode" aesthetic designed to appeal to aspiring UI/UX designers and creative professionals. It leverages deep background tones overlaid with glowing, vibrant accents and glassmorphic elements.

### Color Palette

*   **Global Background**: A deep, immersive dark gradient `linear-gradient(135deg, #0f0f23 0%, #1a1a2e 100%)`.
*   **Primary Action (CTA Buttons)**: A vibrant purple/indigo gradient `linear-gradient(rgb(134, 102, 255), rgb(121, 85, 255))` that provides strong visual hierarchy and draws the user's eye.
*   **Primary Typography**: Crisp white (`#ffffff`) for maximum contrast and readability on headings and active links.
*   **Secondary/Muted Typography**: Soft grays and slate blues (`#a0a0b5`, `#64748b`, `#dcdce8`) for paragraph text, creating layered visual depth without overwhelming the user.
*   **Card Backgrounds**: Subtle, semi-transparent overlays `linear-gradient(180deg, rgba(255, 255, 255, 0.06), rgba(255, 255, 255, 0.02))` combined with thin light borders (`rgba(255, 255, 255, 0.15)`).

### Typography

*   **Primary Typeface**: **Inter** (Google Fonts). Used universally for headings, paragraphs, and UI elements in weights of `300` (Light), `400` (Regular), `500` (Medium), `600` (Semi-Bold), and `700` (Bold) to enforce a clean, geometric, and highly legible structural hierarchy.

## 2. Global UI Components

### Navigation Bar
*   **Style**: Floating, pill-shaped, "glassmorphism" effect. It utilizes a `backdrop-filter: blur(18px)` over a frosted transparent background, making it stand out against the page contents as the user scrolls.
*   **Behavior**: Fixed at the top, easily accessible. On mobile devices, it collapses into an accessible hamburger menu (`☰`) with a drop-down frosted panel.
*   **Active State**: The current page is highlighted with a semi-transparent white badge to provide clear navigational context. 

### Call to Action (CTA) Buttons - `.btn-primary`
*   **Design**: Unified across all pages (`index.html`, `contact.html`, `cources.html`, `career.html`, `apply.html`, `terms.html`). They utilize the primary purple gradient globally.
*   **Interaction Design (Micro-interactions)**:
    *   **Resting State**: Soft outer glow (`box-shadow`) and inset highlight.
    *   **Hover State**: A smooth, confident elevation (`transform: translateY(-2px)`) and an intensified glow (`box-shadow: rgba(111, 75, 255, 0.6) 0px 15px 40px`) to provide immediate tactile feedback.

### Cards & Containers
*   Used heavily in "What We Do", "Courses", and "Testimonials".
*   Cards utilize a subtle white border and a transparent white gradient to sit cleanly on the dark background without feeling heavy.
*   **Hover Interactions**: Interactive cards lift upwards slightly and their border color subtly transitions (sometimes to the primary color) to indicate clickability.

## 3. Page-Specific UX Breakdown

### Landing Page (`index.html`)
*   **Hero Section**: Centers on a large, bold animated typography sequence, immediately engaging visitors. It uses a dynamic typing effect to demonstrate a "living" brand.
*   **Micro-interaction**: The primary CTA on the hero includes a unique "hover image" reveal—a sophisticated micro-interaction that surprises and delights users without cluttering the initial viewport.
*   **Content Flow**: Progresses from an emotional hook (Hero) → "What We Do" (Value Proposition) → "What You Will Learn" (Curriculum) → "Testimonials" (Social Proof), guiding the user logically towards conversion (Registration).

### Courses Page (`cources.html`)
*   **Layout**: Heavy use of CSS Grid to display robust course information efficiently. It focuses on scannability, allowing prospective students to compare durations, syllabus details, and outcomes easily.

### Careers Page (`career.html`)
*   **Layout**: Clean list/accordion-style approach for open positions. The user can easily expand roles to view responsibilities before deciding to pursue an application.
*   **Design Rule**: Forms and application inputs adhere strictly to the dark mode aesthetic, relying on transparent inputs with solid light borders and distinct focus states.

### Contact & Application Pages (`contact.html`, `apply.html`)
*   **Layout**: Single-column or split-column distinct forms.
*   **UX Focus**: High contrast on input fields versus the background. Buttons span the full width of the mobile form container for easier tapping targets (Fitts's Law).

### Terms & Privacy (`terms.html`, `privacy.html`)
*   **Layout**: Simple, legible, single-column prose configuration optimized for reading flow. Standardized line heights and comfortable measure (max-width) for long-form reading on screens.

## 4. Responsive Design Principles

*   **Mobile-First Graceful Degradation**: Navigation elegantly transitions into a hamburger menu. Multi-column grids (like the What We Do section) stack vertically into single columns on screens `< 900px` to maintain readability without horizontal scrolling.
*   **Touch Targets**: Buttons and navigational links are padded generously to accommodate thumb tapping on mobile devices.

## 5. Development Guidelines for Future Integration

When maintaining or building new pages:
1.  **Do not create local button styles**: Always use the global `.btn-primary` or `.btn-outline` classes. Use inline styles or local utility classes purely for layout positioning (e.g., `style="margin-left: auto;"` or `width: 100%`).
2.  **Stick to Inter**: No other font families should be introduced unless explicitly required for distinct branding elements.
3.  **Maintain the Glassmorphic Theme**: Any new floating elements, sticky headers, or modals should utilize the standard `backdrop-filter` and semi-transparent `rgba(255, 255, 255, 0.1)` backgrounds to keep the space-like, premium feel uniform.
