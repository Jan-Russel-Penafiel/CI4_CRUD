# Tailwind CSS Setup for CodeIgniter 4

This project has been configured to use Tailwind CSS locally, allowing the UI to work even without internet access.

## Installation (Already Completed)

The following has already been set up:

1. ✅ Tailwind CSS installed via npm
2. ✅ Configuration file created (`tailwind.config.js`)
3. ✅ Build scripts added to `package.json`
4. ✅ CSS files created in `public/css/`
5. ✅ All view files updated to include local Tailwind CSS

## Directory Structure

```
ci4_BSIT3A/
├── public/
│   └── css/
│       ├── input.css      # Source CSS file with Tailwind directives
│       └── output.css     # Compiled CSS (minified) - Used by the app
├── tailwind.config.js     # Tailwind configuration
└── package.json           # npm configuration with build scripts
```

## Usage

### Building CSS for Production

When you make changes to your views or add new Tailwind classes, rebuild the CSS:

```bash
npm run build:css
```

This will:
- Scan all PHP files in `app/Views/`
- Extract used Tailwind classes
- Generate an optimized, minified CSS file at `public/css/output.css`

### Development Mode (Watch for Changes)

For active development, use watch mode to automatically rebuild when files change:

```bash
npm run watch:css
```

This will monitor your files and rebuild the CSS automatically whenever you save changes.

## How It Works

1. **Source File**: `public/css/input.css` contains Tailwind directives
2. **Configuration**: `tailwind.config.js` tells Tailwind where to look for classes (all PHP files in `app/Views/`)
3. **Build Process**: Tailwind CLI scans your files and generates only the CSS you actually use
4. **Output**: `public/css/output.css` is the compiled, minified CSS file
5. **Views**: All view files now include `<link href="<?= base_url('css/output.css') ?>" rel="stylesheet">`

## Offline Access

The compiled `output.css` file is stored locally in your project, so:
- ✅ No internet connection required
- ✅ Faster page loads (no CDN requests)
- ✅ No external dependencies at runtime
- ✅ Complete control over styling

## Adding Custom Styles

### Option 1: Using Tailwind Utility Classes
Simply use Tailwind classes in your PHP view files:
```php
<div class="bg-blue-500 text-white p-4 rounded-lg">
    Hello World
</div>
```

### Option 2: Custom CSS in input.css
Add custom styles to `public/css/input.css`:
```css
@tailwind base;
@tailwind components;
@tailwind utilities;

/* Your custom styles */
.custom-button {
    @apply bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded;
}
```

After adding custom styles, run:
```bash
npm run build:css
```

## Important Notes

1. **Remember to rebuild**: After adding new Tailwind classes, always run `npm run build:css`
2. **Git**: The `node_modules` directory is ignored, but `output.css` is committed
3. **Deployment**: Make sure to run `npm install` and `npm run build:css` on new environments
4. **Bootstrap Compatibility**: Tailwind is loaded alongside Bootstrap in this project

## NPM Scripts Reference

| Command | Description |
|---------|-------------|
| `npm run build:css` | Build and minify CSS for production |
| `npm run watch:css` | Watch for changes and rebuild automatically |
| `npm install` | Install Tailwind CSS and dependencies |

## Troubleshooting

### CSS not updating?
1. Run `npm run build:css`
2. Clear browser cache (Ctrl+Shift+R)
3. Check that `output.css` was updated (check file modification time)

### Styles not working?
1. Verify the CSS link in your view file includes `base_url('css/output.css')`
2. Check browser console for 404 errors
3. Ensure the `public/css/output.css` file exists

### Need to reinstall?
```bash
npm install
npm run build:css
```

## Author

**Jan Russel E. Peñafiel**

---

For more information about Tailwind CSS, visit: https://tailwindcss.com/docs
