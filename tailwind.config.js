/** @type {import('tailwindcss').Config} */
module.exports = {
  // Chemins où Tailwind doit rechercher les classes
  content: [
    "./Front-html/Page1.html", 
    "./Front-html/Page2.html",
    "./source/index.php"
  ],
  theme: {
    extend: {
      colors: {
        primary: 'var(--primary-color)', // Marron
        primaryopacity: 'rgba(110, 67, 60, 0.78)',  // Marron- opacité
        secondary: 'var(--secondary-color)', // Orange
        light: 'var(--light-color)', // Clair
        dark: 'var(--dark-color)', // Foncé
        background: 'var(--background-color)', // Fond
        graycustom: '#858494',  // Gris 

      },
      backgroundImage: {
        'fond-quadrille': "url('../images//Fond quadrillé.jpg')",
        'grid-pattern': "url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAIAAACRXR/mAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAIGNIUk0AAHolAACAgwAA+f8AAIDpAAB1MAAA6mAAADqYAAAXb5JfxUYAAABnSURBVHja7M5RDYAwDEXRDgmvEocnlrQS2SwUFST9uEfBGWs9c97nbGtDcquqiKhOImLs/UpuzVzWEi1atGjRokWLFi1atGjRokWLFi1atGjRokWLFi1af7Ukz8xWp8z8AAAA//8DAJ4LoEAAlL1nAAAAAElFTkSuQmCC')",
        'gradient-clair-orange': 'linear-gradient(to bottom, var(--light-color) 68%, var(--secondary-color) 100%)',
      },
      fontFamily: {
        changa: ['Changa One', 'sans-serif'],
        rubik: ['Rubik', 'sans-serif'],
      },
      boxShadow: {
        'inner-lg': 'inset 0 4px 8px rgba(0, 0, 0, 0.2)',
        'inner-box': 'inset 0 15px 10px rgba(0, 0, 0, 0.2)',

      },
      // Ajouter le text-shadow dans les extensions de Tailwind
      textShadow: {
        'white': '2px 2px 4px rgba(255, 255, 255, 0.7)', // Ombre blanche autour du texte
      },
      animation: {
        float: 'float 3s ease-in-out infinite',
        float2: 'float 3s ease-in-out infinite 1.5s', // Pour décaler l'animation
        'bg-scroll': 'bg-scrolling-reverse 1.92s linear infinite',
      },
      keyframes: {
        float: {
          '0%, 100%': { transform: 'translateY(0px) translateX(0px)' },
          '50%': { transform: 'translateY(-8px) translateX(4px)' },
        },
        'bg-scrolling-reverse': {
          '100%': { backgroundPosition: '50px 50px' },
        },
      },
    },
  },

  // Ajout des plugins personnalisés
  plugins: [
    function ({ addComponents }) {
      addComponents({
        '.btn-custom': {
          '@apply mt-4 p-2 bg-primary text-black rounded-[30%] border-4 border-black w-[40%] font-changa text-lg': {},
        },
        '.btn-custom:hover': {
          '@apply bg-dark text-light border-light': {},
        },
        '.btn-custom:focus': {
          '@apply bg-dark text-light border-light ring-2 ring-light': {},
        },
        '.btn-custom2': {
          '@apply m-5 p-5 bg-primary text-light rounded-lg border-2 border-light w-[60%] font-changa text-3xl font-light shadow-lg ': {},
        },
        '.btn-custom2:hover': {
          '@apply bg-dark': {},
        },
        '.btn-custom2:focus': {
          '@apply bg-dark': {},
        },
      });
    },

    function ({ addUtilities }) {
      addUtilities({
        '.text-stroke': {
          '-webkit-text-stroke': '4.5px #6E433C', 
          'color': '#FEFBE8', 
          'font-size': '4rem',  
          'line-height': '1', 
        },
      }, ['responsive', 'hover']);
    }
  ]
};

