const purgecss = require('@fullhuman/postcss-purgecss')

module.exports = ({ env }) => ({
  plugins: [
    require("postcss-import"),
    require('tailwindcss'),
    (env === 'production' || env === 'prod-nopurge') ? require('autoprefixer') : false,
    (env === 'production' || env === 'prod-nopurge') ? require('cssnano') : false,
    env === 'production' ? new purgecss({
      content: [
        './template-parts/**/*.php',
        './inc/**/*.php',
        './*.php',
        './src/js/**/*.js',
      ],
      defaultExtractor: (content) => {
        return content.match(/[^<>"'`\s]*[^<>"'`\s:]/g) || []
      },
    }) : false
  ]
})