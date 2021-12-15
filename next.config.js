require('dotenv').config()

//const isProd = process.env.NODE_ENV === 'production' ? 'https://r7v7r9i8.stackpathcdn.com' : ''

module.exports = {
    trailingSlash: false,
    generateBuildId: async () => {
        return 'shopme'
    },
    exportPathMap: async function (
        defaultPathMap,
        { dev, dir, outDir, distDir, buildId }
    ) {
    return {
            '/': { page: '/' },
            '/dashboard/addtask': { page: '/dashboard/addtask' },
            '/dashboard/profile': { page: '/dashboard/profile' },
            '/dashboard/account': { page: '/dashboard/account' },
            '/dashboard/product': { page: '/dashboard/product' },
            '/dashboard/affiliate': { page: '/dashboard/affiliate' },
            '/dashboard/ecommerce': { page: '/dashboard/ecommerce' },
            '/dashboard/projects': { page: '/dashboard/projects' },
            '/dashboard/referrals': { page: '/dashboard/referrals' },
            '/dashboard/shop': { page: '/dashboard/shop' },
            '/dashboard/apps': { page: '/dashboard/apps' },
            '/dashboard': { page: '/dashboard' },            
            '/news': { page: '/news' },            
            '/contact': { page: '/contact' },            
            '/price': { page: '/price' },            
            '/reset-password': { page: '/reset-password' },
            '/signup': { page: '/signup' },
            '/login': { page: '/login' },            
            '/partners': { page: '/partners' },
            '/feedback': { page: '/feedback' },
            '/500': { page: '/500' },
            '/404': { page: '/404' }
        }
    },
    // cache: {
    //     type: 'filesystem',
    //     buildDependencies: {
    //         config: [__filename],
    //     },
    // },
    future: {
        webpack5: false,
    },
    env: {
        NEXT_PUBLIC_GTM: process.env.NEXT_PUBLIC_GTM,
        API_ENV: process.env.API_ENV,
        URL_API_ADDRESS: process.env.URL_API_ADDRESS,
    },
    // i18n: {
    //     locales: ['en-US', 'fr', 'nl-NL'],
    //     defaultLocale: 'en-US',
    // },
}