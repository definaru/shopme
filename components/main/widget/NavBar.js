import React, { useContext } from 'react'
import Link from 'next/link'
import { BottomAside } from '../BottomAside'
import { Aside } from '../Aside'
import { ShopContext } from '../../context/ShopContext'


export function NavBar() 
{
    const { menu } = useContext(ShopContext)

    return (
        <div className={`${menu ? 'w-20 overflow-hidden' : 'w-72'} bg-white border-r border-gray-50 relative z-20`}>
            <div className="fixed top-0 left-0 overflow-hidden">
                <div className={`${menu ? 'px-5' : 'px-6'} py-3 border-b border-gray-50`}>
                    <Link href="/dashboard">
                        <a className="flex items-center mt-0.5">
                            <img
                                className="h-8 w-auto mr-2"
                                src="/access/img/favicon-32x32.png"
                                alt="ShopMe"
                            />
                            <img
                                className={`${menu ? 'hidden' : ''} h-8 w-auto sm:h-7`}
                                src="/access/img/logo.svg"
                                alt="Shop Me"
                            />
                        </a>                        
                    </Link>
                </div>
                <Aside />
                <BottomAside />
            </div>
        </div>
    )
}
