module.exports = {
  content: [
    './templates/**/*.twig',
    './inc/theme/filters.php',
  ],
  theme: {
    colors: {
      'black': '#000000',
      'white': '#ffffff',
      'transparent': 'transparent',
      'current': 'currentColor',
      'red': {
        'DEFAULT': '#c32529',
      },
    },
    extend: {},
  },
  plugins: [],
}
