require('dotenv').config()

module.exports = {
    //exportTrailingSlash: false,
    trailingSlash: false,
    generateBuildId: async () => {
        return 'defina-shopme'
    },
    exportPathMap: async function (
            defaultPathMap,
            { dev, dir, outDir, distDir, buildId }
        ) {
        return {
            '/': { page: '/' },
            '/about': { page: '/about' },
            // '/reset': { page: '/reset' },
            // '/signup': { page: '/signup' },
            // '/offer': { page: '/offer' },
            // '/confirm': { page: '/confirm' },
            // '/login': { page: '/login' },
            // '/404': { page: '/404' }
        }
    },
    env: {
        API_ENV: process.env.API_ENV
    }
}