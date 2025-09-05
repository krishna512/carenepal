module.exports = {
  content: [
    './src/sass/*.scss',
    './src/sass/**/*.scss',
    './src/js/*.js',
    './src/js/**/*.js',
    './acf_block/*.php',
    './archives/*.php',
    './patterns/*.php',
    './singles/*.php',
    './parts/*.html',
    './inc/*.php',
  ],
  theme: {
    fontFamily: {
      sans: ['Fira Sans Condensed', 'sans-serif'],
    },
    colors: {
      white: '#fff',

      //accent
      PMS: {
        185: '#E91D2D',
        389: '#CADB2B',
        2573: '#B784BA',
        2925: '#0199D6',
        187: '#AA182C',
        575: '#68813C',
        2607: '#510C76',
        301: '#004987',
      },

      y: {
        10: '#FFFEF5',
        20: '#FFF8B1',
        25: '#FAF2A2',
        30: '#FAE261',
        40: '#FBCE39',
        50: '#f4b223', // Yellow primary color
      },
      n: {
        0: '#FFFFFF',
        10: '#F9F6F4', //Light Cream
        20: '#EEE9E5', //Cream
        30: '#B0B3B2', //PMS421
        40: '#5A5B5D', //PMS425
        50: '#090015', //Neutral Black
        60: '#1c1d30', //indigo
        70: '#0e0e14',
      },

      // orange
      o: {
        10: ' #eb9b62',
        20: ' #e98c4b',
        30: ' #e67e35',
        40: ' #e36f1e', //  orange primary color
        50: '#ce641a',
        60: '#f9781c',
      },

      // gery
      g: {
        10: '#F6F5F3',
        20: '#525964',
        30: '#f9f6f4',
        40: '#BOB3B2',
      },
    },
    extend: {
      fontSize: {
        'heading-1': '64px',
        'heading-2': '48px',
        'heading-3': '32px',
        'heading-4': '24px',
        'heading-5': '16px',
        'heading-6': '14px',
        'caption-c1': '12px',
        tiny: '10px',
      },
    },

    boxShadow: {
      shadow: '0px 4px 10px -3px rgba(0, 0, 0, 0.12)',
    },
    container: {
      center: true,
      padding: '20px',
      screens: {
        xl: '1240px',
      },
    },
  },
  plugins: [require('@tailwindcss/line-clamp')],
  corePlugins: {
    backgroundOpacity: false,
  },
};
