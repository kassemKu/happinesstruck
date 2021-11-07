const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  mode: 'jit',
  purge: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './vendor/laravel/jetstream/**/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/js/**/*.vue',
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ['Poppins', ...defaultTheme.fontFamily.sans],
        heading: ['Ubuntu', ...defaultTheme.fontFamily.sans],
        'body-arabic': ['bein-normal', ...defaultTheme.fontFamily.sans],
      },
      spacing: {
        'v-3/4-screen': '75vh',
        99: '36rem',
      },
    },
  },

  variants: {
    extend: {
      animation: ['hover', 'focus'],
    },
  },

  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
    require('daisyui'),
  ],

  daisyui: {
    styled: true,
    themes: true,
    base: true,
    utils: true,
    logs: true,
    rtl: true,
  },
}
