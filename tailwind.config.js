/** @type {import('tailwindcss').Config} */
module.exports = {
  // Chemins où Tailwind doit rechercher les classes
  content: ["./index.html", "./source/index.php"],

  theme: {
    extend: {
      colors: {
        primary: 'var(--primary-color)', // Marron
        secondary: 'var(--secondary-color)', // Orange
        light: 'var(--light-color)', // Clair
        dark: 'var(--dark-color)', // Foncé
        background: 'var(--background-color)', // Fond
      },
      backgroundImage: {
        'fond-quadrille': "url('/images//Fond quadrillé.jpg')",
        'gradient-clair-orange': 'linear-gradient(to bottom, var(--light-color) 68%, var(--secondary-color) 100%)',
      },
      
    },
  },

  plugins: [],
};
