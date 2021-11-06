import React, { useContext } from 'react'
import Link from 'next/link'
import { FiAirplay, FiUser, FiShoppingBag, FiShoppingCart, FiLayers, FiLink } from 'react-icons/fi'
import { Count } from './widget/Count'
import { useRouter } from 'next/router'
import { ShopContext } from '../context/ShopContext'
import { MinusIcon } from '@heroicons/react/outline'


export function Aside() 
{
    const router = useRouter()
    const { menu } = useContext(ShopContext)
    const link = menu ? 'pl-6 px-7' : 'pl-5 px-6'
    const Active = (href) => {
        return router.pathname === href ? `border-l-4 border-pink-600 ${link} py-4` : `border-l-4 border-transparent ${link} py-4`
    }

    const Nav = [
        {
            section: '',
            link: [
                {
                    href: '/dashboard',
                    name: 'Dashboards',
                    icon: FiAirplay,
                    count: '3'                    
                }
            ]
        },
        {
            section: 'Страницы',
            link: [
                {
                    href: '/dashboard/account',
                    name: 'Account',
                    icon: FiUser,
                    count: ''                    
                },
                {
                    href: '/dashboard/product',
                    name: 'Product',
                    icon: FiShoppingBag,
                    count: ''
                },  
                {
                    href: '/dashboard/ecommerce',
                    name: 'E-commerce',
                    icon: FiShoppingCart,
                    count: ''
                }, 
                {
                    href: '/dashboard/projects',
                    name: 'Projects',
                    icon: FiLayers,
                    count: ''
                }, 
                {
                    href: '/dashboard/referrals',
                    name: 'Referrals',
                    icon: FiLink,
                    count: ''
                }                                                            
            ]
        }
    ]

    return (
        <div className={`block ${menu ? 'mt-2' : 'mt-5'} w-full`}>
            <ul className="menu">
                {Nav?.map((item, i) => (
                    <React.Fragment key={i}>
                        {i === 0 ? '' :
                        <li className="text-sm text-gray-300 dark:text-gray-500 mt-3 mb-1 px-6 uppercase">
                            {menu ?
                            <div className="flex justify-center">
                                <MinusIcon className="w-6 -ml-5 text-gray-300 dark:text-gray-400" />
                            </div> :
                            <small>{item.section}</small>}
                        </li>}
                        {item.link?.map((link, idx) => (
                            <li key={idx}>
                                <Link href={link.href}>
                                    <a className={`flex items-center text-gray-900 dark:text-gray-50 dark:hover:text-pink-600 hover:text-pink-600 ${Active(`${link.href}`)}`}>
                                        <link.icon className={`text-gray-500 ${menu ? 'mr-1' : 'mr-4'} flex-none`} />
                                        <div className="flex justify-between w-full">
                                            <span className={`${menu ? 'hidden' : ''}`}>{link.name}</span>
                                            <Count count={link.count} />
                                        </div>
                                    </a>
                                </Link>
                            </li>
                        ))}
                    </React.Fragment>                    
                ))}
            </ul>
        </div>
    )
}
