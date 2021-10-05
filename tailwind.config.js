module.exports = {
    purge: ['./pages/**/*.{js,ts,jsx,tsx}', './components/**/*.{js,ts,jsx,tsx}'],
    darkMode: 'media',
        theme: {
        extend: {},
    },
    variants: {
        extend: {
            contrast: ['hover', 'focus'],
            backgroundColor: ['hover', 'focus', 'checked', 'active'],
            borderColor: ['checked'],   
            margin: ['hover', 'focus'],  
            boxShadow: ['hover', 'focus', 'active'],   
            borderWidth: ['hover', 'focus'],    
            divideColor: ['group-hover'],
            transform: ['hover', 'focus', 'group-hover'],
            transitionDelay: ['hover', 'focus', 'group-hover'],
            transitionTimingFunction: ['hover', 'focus', 'group-hover'],
            transitionDuration: ['hover', 'focus', 'group-hover'],
            transitionProperty: ['hover', 'focus', 'group-hover','responsive', 'motion-safe', 'motion-reduce']
        }
    },
    plugins: [],
}
