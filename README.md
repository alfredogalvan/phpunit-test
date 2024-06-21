# Initial setup
- Clone the repository
- Install the dependencies
- Install Tailwind
- Run the development server
- Run the tests


## Setup Tailwind

### Install Tailwind CSS
Install tailwindcss and its peer dependencies via npm, and then run the init command to generate both tailwind.config.js and postcss.config.js.

```bash
npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init -p
```
### Configure your template paths
Add the paths to all of your template files in your tailwind.config.js file.

```js
/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {},
    },
    plugins: [],
}
```

### Add the Tailwind directives to your CSS
Add the @tailwind directives for each of Tailwind’s layers to your ./resources/css/app.css file.

```css
@tailwind base;
@tailwind components;
@tailwind utilities;
```
### Start your build process
Run your build process with npm run dev.

```bash
npm run dev
```

### Start using Tailwind in your project
Make sure your compiled CSS is included in the <head> then start using Tailwind’s utility classes to style your content.

```bladehtml
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
  <h1 class="text-3xl font-bold underline">
    Hello world!
  </h1>
</body>
</html>
```
## External resources
- [Tailwind](https://tailwindcss.com/docs/guides/laravel#vite)
- [Herd](https://herd.laravel.com/)
- [Composer](https://getcomposer.org/)
