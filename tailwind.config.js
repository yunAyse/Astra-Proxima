/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
  ],
  theme: {
    extend: {
      colors: {
        bluesky : '#87CEEB',
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}

