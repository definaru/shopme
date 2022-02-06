import React, { useState, useEffect } from 'react'
import Head from 'next/head'
import Link from 'next/link'
import { Languech } from '../block/index/lang/Languech'
import { CheckIcon } from '@heroicons/react/solid'
import { useRouter } from 'next/router'
import { ShopContext } from '../context/ShopContext'
import { ToastContainer, toast } from 'react-toastify'
import Cookie from 'js-cookie'
import 'react-toastify/dist/ReactToastify.css'


export function AuthLayout({
    children, 
    image = '/access/img/image.jpg', 
    title = 'Page', 
    description = '...'
}) 
{
    const router = useRouter()
    const [cookie, setSookie] = useState(null)
    const [isLoading, setLoader] = useState(true)
    const [valid, setValid] = useState(null)
    const [loading, setLoading] = useState(false)

    useEffect(()=>{
        localStorage.setItem('lang', localStorage.getItem('lang'))
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
            cookie, toast,
            valid, setValid,
            loading, setLoading
        }}>
            <Head>
                <title>{title}</title>
                <meta name="description" content={description} />
                <meta property="og:image" content={image} />
            </Head>
            <div className="w-full h-screen grid md:grid-cols-2 grid-cols-1">
                <div className="bg-white md:bg-gray-100 px-10 pt-10 md:py-10">
                    <div className="flex flex-col md:flex-row md:justify-between justify-center">
                        <div className="flex justify-center md:justify-start">
                            <Link href="/">
                                <a>
                                    <img
                                        className="w-48 md:w-40"
                                        src="/access/img/logo.svg"
                                        alt="Shop Me"
                                    />
                                </a>                        
                            </Link>                        
                        </div>
                        <div className="flex justify-center md:justify-start mt-5 md:mt-0">
                            <Languech />
                        </div>
                    </div>
                    <div className="max-w-md mx-auto md:mt-10 hidden md:block">
                        <div className="flex flex-col justify-center items-center h-96">
                            <div>
                                <h2 className="text-2xl font-bold mb-10">
                                    Build digital products with:
                                </h2>
                            </div>
                            <div>
                                <ul className="space-y-7 text-gray-400">
                                    <li className="flex">
                                        <div><CheckIcon className="w-6 h-6 mr-3 text-pink-600" /></div>
                                        <div>
                                            <p><strong>All-in-one tool</strong></p>
                                            <p>Build, run, and scale your apps - end to end</p>                                        
                                        </div>
                                    </li>
                                    <li className="flex">
                                        <div><CheckIcon className="w-6 h-6 mr-3 text-pink-600" /></div>
                                        <div>
                                            <p><strong>Easily add & manage your services</strong></p>
                                            <p>It brings together your tasks, projects, timelines, files and more</p>
                                        </div>
                                    </li>
                                </ul>                            
                            </div>
                        </div>
                    </div>
                </div>
                <div className="bg-white px-8 py-5 md:px-10 md:py-10">
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
        </ShopContext.Provider>
    )
}
