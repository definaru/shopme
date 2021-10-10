import React from 'react'
import Link from 'next/link'
import { GiShoppingCart } from 'react-icons/gi'
import { AiOutlineBarcode } from 'react-icons/ai'
import { MdExitToApp } from 'react-icons/md'


export function ShopCard({
    image = '/access/img/bg325546246456.jpg', 
    header = 'Мои магазины', 
    link = '/dashboard/shop',
    button = 'Перейти',
    opacity = 'opacity-100',
    icon = true
}) 
{
    return (
        <Link href={link}>
            <a className="w-full relative">
                <div className="overflow-hidden bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 block w-full h-60 rounded-md">
                    <img src={image} className={`w-full h-60 object-cover object-center rounded-md ${opacity}`} alt="..." />
                    <div className="absolute top-8 left-8 w-80">
                        {icon ? <GiShoppingCart className="w-14 h-14 text-gray-900 mb-2" /> : <div className="h-7" />}
                        <h2 className="block font-bold text-white text-3xl mb-4">
                            {header}
                        </h2>
                        <div className={`table px-10 py-3 rounded-md font-bold ${icon ? 'bg-white hover:bg-gray-900 hover:text-gray-50' : 'bg-gray-900 hover:bg-gray-50 text-white hover:text-gray-900'} `}>
                            <div className="flex items-center space-x-2 text-2xl">
                                {icon ? <AiOutlineBarcode /> : <MdExitToApp />} <span>{button}</span>
                            </div>
                        </div>   
                    </div>
                </div>
            </a>
        </Link>
    )
}
