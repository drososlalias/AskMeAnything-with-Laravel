module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    container: {
      center: true,
      padding: '2rem'
    },
    extend: {
      spacing: {
        '100' : '30rem'
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}