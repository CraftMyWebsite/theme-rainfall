/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './dev/**/*.{php,html,js}'
  ],
  theme: {
    extend: {
      colors: {
        transparent: 'transparent',
      },
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
