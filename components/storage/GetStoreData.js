import { useState, useEffect } from 'react'
import { useRouter } from 'next/router'
import Cookie from 'js-cookie'

export function GetStoreData() 
{
    const router = useRouter()
    const [cookie, setSookie] = useState(null)
    const [isLoading, setLoader] = useState(true)

    const web = {
        company: 'ShopMe',
        site: 'https://shopme.su'
    }

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

    return {cookie, web}
}
