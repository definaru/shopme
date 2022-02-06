import React, { useEffect, useState } from 'react'
import Head from 'next/head'
import { useRouter } from 'next/router'
import { Header } from '../default/Header'
import { Footer } from '../default/Footer'
import { ShopContext } from '../context/ShopContext'
import { GetStoreData } from '../storage/GetStoreData'


export function IndexLayout({children, image = '/access/img/image.jpg', title = 'Page', description = '...'}) 
{

    const router = useRouter()
    const status = GetStoreData()

    const [lang, setLang] = useState('ru')
    const [user, setUser] = useState(null)
    const { cookie, web } = status
    
    useEffect(()=>{
        //JSON.parse()
        localStorage.setItem('lang', lang)
        //setLang(localStorage.getItem('lang')) 

        //sessionStorage.setItem('user', user)
        setUser(JSON.parse(sessionStorage.getItem('user')))

        console.log('IndexLayout', user)
        console.log('sessionStorage:', JSON.parse(sessionStorage.getItem('user')))

    },[lang])

    return (
        <ShopContext.Provider value={{cookie, lang, user, web, setLang, setUser}}>
            <Head>
                <title>{`${title} | ${web.company}`}</title>
                <meta name="robots" content="index, follow" />
                <link rel="alternate" hrefLang="en" href={web.site} />
                <meta name="description" content={description} />
                <meta property="og:image" content={image} />
                <meta property="og:image:width" content="1080" />
                <meta property="og:image:height" content="565" />
                <meta property="og:locale" content="en_US" />
                <meta property="og:type" content="website" />
                <meta property="og:title" content={`${title}`} />
                <meta property="og:description" content={description} />
                <meta property="og:url" content={`${web.site}${router.pathname}`} />
                <meta property="og:site_name" content={web.company} />
                <meta name="twitter:card" content="summary_large_image" />
                <meta name="twitter:title" content={`${title} | ${web.company}`} />
                <meta name="twitter:description" content={description} />
                <meta name="twitter:image" content={image} />
                <meta name="twitter:image:width" content="1080" />
                <meta name="twitter:image:height" content="565" />
                <link rel="canonical" href={`${web.site}${router.pathname}`} />
                {/* <meta name="google-site-verification" content="" /> */}
			</Head>
            <Header />
            {children}
            <Footer />
        </ShopContext.Provider>
    )
}