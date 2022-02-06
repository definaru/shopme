import React, { useState, useEffect } from 'react'
import Head from 'next/head'
import { useRouter } from 'next/router'
import { Header } from '../main/Header'
import { NavBar } from '../main/widget/NavBar'
import { ShopContext } from '../context/ShopContext'
import { GlobalClass } from '../ui/style/GlobalClass'
import { User } from '../data/User'
import { ToastContainer, toast } from 'react-toastify'
import Cookie from 'js-cookie'
import 'react-toastify/dist/ReactToastify.css'


export function MainLayout({children, title = 'Loading...', description = '...'}) 
{

    const router = useRouter()
    //const curr_user = User()
    const [user, setUser] = useState(null)
    const [open, setOpen] = useState(false)
    const [menu, setMenu] = useState(false)
    const [cookie, setSookie] = useState(null)
    const [isLoading, setLoader] = useState(true)
    const [theme, setTheme] = useState(true)
    const [currency, setCurrency] = useState('USD')


    useEffect(()=>{
        localStorage.setItem('lang', localStorage.getItem('lang'))
        setUser(JSON.parse(sessionStorage.getItem('user')))
        if(sessionStorage.getItem('user') === null) {
            router.push('/login')
        }
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


    return (
        <ShopContext.Provider value={{
            user, setUser,
            open, setOpen,
            menu, setMenu,
            theme, setTheme,
            currency, setCurrency,
            GlobalClass,
            cookie, toast
        }}>
			<Head>
				<title>{title}</title>
                <meta name="description" content={description} />
			</Head>
            <div className={`dashboard block h-full ${theme ? 'dark' : ''}`}>
                <Header />
                <div className="flex flex-row">
                    <NavBar />
                    <div className="w-full bg-gray-50 bg h-full block py-16 px-8">
                        {children}
                    </div>
                    <ToastContainer
                        position="bottom-right"
                        autoClose={false}
                        hideProgressBar={false}
                        newestOnTop={false}
                        closeOnClick
                        rtl={false}
                        pauseOnFocusLoss
                        draggable
                        pauseOnHover
                    />
                </div>
            </div>
        </ShopContext.Provider>
    )
}