import React from 'react'
import Link from 'next/link'
import { Disclosure } from '@headlessui/react'
import { FaCheckCircle } from 'react-icons/fa'


export function Marketplaces() 
{

    const DataMarketplaces = [
        {
            image: '/access/img/partner/marketplaces/Shopify-Icon-Listings.webp',
            href: '#',
            header: 'Shopify',
            text: 'Оптимизируйте выполнение заказов Shopify.'
        },
        {
            image: '/access/img/partner/marketplaces/Shopify-Plus-Icon.webp',
            href: '#',
            header: 'Shopify Plus',
            text: 'Выполнение заказов Power Shopify Plus.'
        },
        {
            image: '/access/img/partner/marketplaces/BigCommerce-Logo-Listings.webp',
            href: '#',
            header: 'BigCommerce',
            text: 'Автоматизируйте выполнение заказов BigCommerce.'
        },
        {
            image: '/access/img/partner/marketplaces/Woo-Listings-Logo.jpg',
            href: '#',
            header: 'BigCommerce',
            text: 'Масштабируйте выполнение заказов WooCommerce.'
        },
        {
            image: '/access/img/partner/marketplaces/Amazon-Marketplace-Listings-Logo.webp',
            href: '#',
            header: 'Amazon',
            text: 'Безупречно выполняйте заказы Amazon.'
        },
        {
            image: '/access/img/partner/marketplaces/Walmart-Logo-Listings.jpg',
            href: '#',
            header: 'Walmart',
            text: 'Оптимизируйте выполнение заказов в Walmart.'
        },
        {
            image: '/access/img/partner/marketplaces/EBay.svg',
            href: '#',
            header: 'Ebay',
            text: 'Автоматизируйте выполнение заказов на Ebay.'
        },
        {
            image: '/access/img/partner/marketplaces/BackerKit-Listings-Logo.webp',
            href: '#',
            header: 'Backerkit',
            text: 'Автоматизируйте выполнение краудфандинга Backerkit.'
        },
        {
            image: '/access/img/partner/marketplaces/Squarespace-Listings-Logo.webp',
            href: '#',
            header: 'Squarespace',
            text: 'Упростите выполнение заказов Squarespace.'
        },
        {
            image: '/access/img/partner/marketplaces/Wix-Listings-Logo.webp',
            href: '#',
            header: 'Wix',
            text: 'Оптимизируйте выполнение заказов Wix.'
        },
        {
            image: '/access/img/partner/marketplaces/Square-Listings-Logo.webp',
            href: '#',
            header: 'Square',
            text: 'Автоматизируйте выполнение заказов Square.'
        },
    ]

    return (
        <Disclosure as="section" className="bg-gray-50 py-10 md:py-20 mt-1">
            <div className="max-w-6xl mx-auto px-4 sm:px-6">
                <div className="grid">
                    <div className="grid gap-7 md:w-2/4 w-full">
                        <h2 className="text-left text-4xl font-bold">
                            Платформы и торговые площадки электронной торговли
                        </h2>
                        <p className="text-gray-600 text-base">
                            ShopMe напрямую сотрудничает со следующими платформами и торговыми площадками, 
                            чтобы упростить выполнение заказов для вашего бизнеса.
                        </p>
                        <div>
                            <p className="flex justify-center items-center bg-white rounded-full shadow-md py-2 space-x-3">
                                <strong>Примечание:</strong> 
                                <span>Галочка обозначает прямую интеграцию.</span> 
                                <FaCheckCircle className="text-green-500 w-5 h-5" />
                            </p>                            
                        </div>
                    </div>
                    <div className="grid grid-cols-1 md:grid-cols-4 gap-5 md:gap-6 py-16">
                        {DataMarketplaces.map((item, i) => (
                            <div key={i} className="block mb-8">
                                <Link href={item.href}>
                                    <a className="flex group">
                                        <div className="relative">
                                            <FaCheckCircle className="ml-2 absolute -top-2 -right-2 bg-white rounded-full text-green-500 w-6 h-6" />
                                            <div className="w-20 h-20 shadow-md rounded-md overflow-hidden flex items-center">
                                                <img 
                                                    src={item.image} 
                                                    alt={item.header}
                                                    className="w-full object-cover object-center" 
                                                />  
                                            </div>
                                        </div>
                                        <div className="pl-6">
                                            <h3 className="text-xl font-extrabold block text-gray-900 group-hover:text-red-500">
                                                {item.header}
                                            </h3>
                                            <p className="text-sm text-gray-500">
                                                {item.text}
                                            </p>
                                        </div>
                                    </a>
                                </Link>
                            </div>                            
                        ))}
                    </div>
                </div>
            </div>            
        </Disclosure>
    )
}
