# Fade Style

Fade Style is a lightweight WordPress plugin that automatically adds smooth fade-in effects to images within your posts and pages.

## Installation

The plugin is available to download from the GitHub Releases page because it is not registered in the official WordPress plugin directory.
Please install it manually from your site’s Plugins page.

## Usage / Functions

The plugin works automatically once activated.

- Any `<img>` tags in post or page content will be automatically given a `fade` class.
- The plugin injects a small inline CSS rule that fades images using an `opacity` transition. The default duration is 0.75s.
- Images that have already been loaded are not subject to fading in.
- Adds a short random delay (up to 100ms) before each image starts to fade in, to avoid awkwardness when many images are loaded at the same time.
