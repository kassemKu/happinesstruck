const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  mode: 'jit',
  purge: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './vendor/laravel/jetstream/**/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/js/**/*.vue',
    '../node_modules/litepie-datepicker/**/*.js',
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
      //   colors: {
      //     // Change with you want it
      //     'litepie-primary': colors.lightBlue, // color system for light mode
      //     'litepie-secondary': colors.coolGray, // color system for dark mode
      //   },
    },
  },

  variants: {
    extend: {
      animation: ['hover', 'focus'],
      cursor: ['disabled'],
      textOpacity: ['disabled'],
      textColor: ['disabled'],
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
