module.exports = {
    important: true,
    content: [
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
        './public/js/**/*.js',
    ],
    theme: {
        extend: {
            colors: {
                white: '#ffffff',
                black: '#000000',
                primary: '#7470BF',
                secondary: '#c47e93',
                accent: '#fdd9e5',
                success: '#10B981',
                warning: '#F59E0B',
                error: '#EF4444',
                'gradient-purple': '#b0a8fe',
                'gradient-blue': '#c47e93',
                'gradient-cyan': '#fdd9e5',
                'custom-purple': '#b0a8fe',
                'nav-purple': '#7b70c2',
                'nav-gray': '#eef0f4',
                'text-gray': '#2d3748',
                'enot-purple': '#7470BF',
                
            },
            backgroundImage: {
                'gradient-primary': 'linear-gradient(to right, #b0a8fe, #c47e93)',
                'gradient-primary-reverse': 'linear-gradient(to right, #c47e93, #b0a8fe)',
                'gradient-primary-vertical': 'linear-gradient(to bottom, #b0a8fe, #c47e93)',
                'gradient-soft': 'linear-gradient(to right, #fdd9e5, #b0a8fe)',
            },
            fontFamily: {
                sans: ['Namu', 'Inter', 'f_inter', 'sans-serif'],
                heading: ['Russo One', 'sans-serif'],
                bold: ['Russo One', 'sans-serif'],
                inter: ['f_inter', 'Inter', 'sans-serif'],
            },
            animation: {
                'fade-in-up': 'fadeInUp 0.6s ease-out',
                'fade-in-left': 'fadeInLeft 0.6s ease-out',
                'fade-in-right': 'fadeInRight 0.6s ease-out',
                'bounce-slow': 'bounce 2s infinite',
                'pulse-slow': 'pulse 3s infinite',
                'gradient-shift': 'gradientShift 3s ease infinite',
            },
            keyframes: {
                fadeInUp: {
                    '0%': { opacity: '0', transform: 'translateY(30px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                fadeInLeft: {
                    '0%': { opacity: '0', transform: 'translateX(-30px)' },
                    '100%': { opacity: '1', transform: 'translateX(0)' },
                },
                fadeInRight: {
                    '0%': { opacity: '0', transform: 'translateX(30px)' },
                    '100%': { opacity: '1', transform: 'translateX(0)' },
                },
                gradientShift: {
                    '0%': { backgroundPosition: '0% 50%' },
                    '50%': { backgroundPosition: '100% 50%' },
                    '100%': { backgroundPosition: '0% 50%' },
                },
            },
        },
    },
    plugins: [],
};


