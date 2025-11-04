// tailwind.config.js
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          400: '#9B82FF',
          500: '#7B61FF',
          600: '#6548FF',
        },
        accent: {
          400: '#FF8BB2',
          500: '#FF6B9A',
          600: '#E64B83',
        },
      },
    },
  },
  plugins: [],
}
