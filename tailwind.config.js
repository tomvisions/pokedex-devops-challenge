/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      boxShadow:{
        '3xl': 'box-shadow: 8px 8px 0px 0px rgba(0,0,0,0.1);'
      }
    },
  },
  future: {
    purgeLayersByDefault: true,
  },
  plugins: [require('flowbite/plugin')],
}

