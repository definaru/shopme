import React, { useState, useEffect } from 'react'
import Head from 'next/head'
import { useRouter } from 'next/router'
import { Header } from '../main/Header'
import { NavBar } from '../main/widget/NavBar'
import { ShopContext } from '../context/ShopContext'
import Cookie from 'js-cookie'


export function MainLayout({children, title = 'Page', description = '...'}) 
{

    const router = useRouter()
    const [user, setUser] = useState('')
    const [open, setOpen] = useState(false)
    const [menu, setMenu] = useState(false)
    const [cookie, setSookie] = useState(null)
    const [isLoading, setLoader] = useState(true)


    useEffect(()=>{
        localStorage.setItem('lang', 'ru')
        //console.log('memory', localStorage.getItem('lang'))
    },[])


    useEffect(() => {
        setLoader(document.readyState === "complete")
        if(isLoading || router) {
            const params = { path: '/', expires: 30, secure: true}
            Cookie.set('url', window.location.href, params)
            if(router.asPath.includes('?') === true) {
                Cookie.set('utm_source', router.query.utm_source, params) 
                Cookie.set('utm_campaign', router.query.utm_campaign, params)
                Cookie.set('utm_content', router.query.utm_content, params)
                Cookie.set('utm_medium', router.query.utm_medium, params)
                Cookie.set('utm_name', router.query.utm_name, params)
                Cookie.set('utm_term', router.query.utm_term, params)                
            }
        }

        if(isLoading) {
            setSookie(Cookie.get())
        }
    }, [isLoading, router])


    useEffect(() => {
        if(user === null) {
            sessionStorage.removeItem('user')
            return router.push('/login')
        } 
    }, [user])

    return (
        <ShopContext.Provider value={{
            user,
            setUser,
            setOpen,
            menu, 
            setMenu,
            open,
            cookie
        }}>
			<Head>
				<title>{title}</title>
                <meta name="description" content={description} />
			</Head>
            <div className="dashboard bg-gray-50 block h-full">
                <Header 
                //setUser={setUser} open={open} setOpen={setOpen} 
                />
                <div className="flex flex-row">
                    <NavBar />
                    <div className="w-full bg-gray-50 h-full block py-16 px-8">
                        {children}
                    </div>
                </div>
            </div>
        </ShopContext.Provider>
    )
}