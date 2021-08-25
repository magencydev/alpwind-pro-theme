![Alpwind Pro Logo](https://github.com/gartholiver/alpwind-pro-theme/blob/master/screenshot.png)

# Alpwind Pro
A WordPress development theme that heavily utilizes [ACF Pro](https://www.advancedcustomfields.com/pro/), [Tailwind CSS](https://tailwindcss.com/) and [Alpine.js](https://alpinejs.dev/).

This theme also has VS Code code sniffing configured by default to ensure consistant formatting that adheres to WordPress's [coding standards](https://developer.wordpress.org/coding-standards/).

## Theme configuration
1. Install ACF Pro plugin.
2. Import the acf-export.json file in the json folder.
3. Open theme in terminal and install dev dependencies `npm run setup`.
4. Activate theme in WordPress admin.

## Build Process
There are a couple NPM scripts should make life easier.
- Watch and quickly compile CSS and JS files: `npm run start`
- Compile, add compatibilty and optimize CSS and JS files: `npm run build`
