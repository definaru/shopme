import React from 'react'
import Link from 'next/link'


export function BreadCrumbs({home = false, links = [], end = '...'}) 
{

    const LinkClass = 'no-underline hover:underline text-gray-500'

    return (
        <div className="flex text-xs pt-5 pb-2 space-x-1 text-gray-900 dark:text-gray-300">
            {home ? 
            <>
                <Link href="/dashboard">
                    <a className={LinkClass}>
                        Home
                    </a>
                </Link>
                &#160;&#160;/&#160; 
            </>
             : ''}
            {links.map((menu, index) => (
            <React.Fragment key={index}>
                <Link href={menu.href}>
                    <a className={LinkClass}>{menu.name}</a>
                </Link>     
                &#160;&#160;/&#160;                 
            </React.Fragment>
            ))}
            <span>{end}</span>{/* Product details */}
        </div>
    )
}
