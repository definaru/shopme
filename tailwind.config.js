module.exports = {
    purge: ['./pages/**/*.{js,ts,jsx,tsx}', './components/**/*.{js,ts,jsx,tsx}'],
    darkMode: 'class',
        theme: {
        extend: {},
    },
    variants: {
        extend: {
            scale: ['focus-within'],
            contrast: ['hover', 'focus'],
            userSelect: ['hover', 'focus'],
            borderStyle: ['hover', 'focus'],
            pointerEvents: ['hover', 'focus'],
            grayscale: ['hover', 'focus', 'group-hover'],
            textColor: ['active', 'focus', 'group-hover', 'group-focus'],
            backgroundColor: ['hover', 'focus', 'checked', 'active', 'group-hover', 'group-focus'],
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
