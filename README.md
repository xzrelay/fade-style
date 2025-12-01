# Fade Style

Fade Style is a lightweight WordPress plugin that automatically adds smooth fade-in effects to images within your posts and pages.

## Installation

The plugin is available to download from the GitHub Releases page because it is not registered in the official WordPress plugin directory.
Please install it manually from your site’s Plugins page.

## Usage

The plugin works automatically once activated.

- Any `<img>` tags in post or page content will be automatically given a `fade` class.
- The plugin injects a small inline CSS rule that fades images using an `opacity` transition. The default duration is 0.75s.
- The `fade-style.js` script detects images with the `.fade` class and adds `loaded` when they are visible (using IntersectionObserver) or already loaded.
