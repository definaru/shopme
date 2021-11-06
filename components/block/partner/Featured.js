import React from 'react'
import Link from 'next/link'
import { Disclosure } from '@headlessui/react'

export function Featured() 
{
    const DataParther = [
        {
            image: '/access/img/partner/defina.png',
            href: '#',
            header: 'Defina',
            text: 'Интернет технологии для ведения бизнеса online.'
        },
        {
            image: '/access/img/partner/defina_store.png',
            href: '#',
            header: 'Defina Store',
            text: 'Интернет магазин приложений, а также игр, книг, музыки и фильмов от компании Defina'
        },
        {
            image: '/access/img/partner/gelstore.png',
            href: '#',
            header: 'GelStore',
            text: 'Дружелюбный Интернет-магазин возможностей с каталогом товаров будующего'
        },
        {
            image: '/access/img/partner/react_page.png',
            href: '#',
            header: 'ReactPage',
            text: 'Надёжный Интернет-магазин услуг от лучших аутсорсинговых компаний'
        }
    ]

    return (
        <Disclosure as="section" id="learn_more" className="bg-gray-50 py-10 md:py-20 mt-5">
            <div className="max-w-6xl mx-auto px-4 sm:px-6">
                <div className="grid">
                    <div className="md:w-2/4 w-full mt-5">
                        <h2 className="text-left text-4xl font-bold uppercase">
                            Рекомендуемые партнерские интеграции
                        </h2>
                    </div>
                    <div className="grid grid-cols-1 md:grid-cols-4 md:gap-4 py-16">
                        {DataParther.map((item, i) => (
                            <div key={i} className="group rounded-xl bg-white shadow hover:shadow-lg">
                                <Link href={item.href}>
                                    <a>
                                        <img 
                                            src={item.image} 
                                            alt={item.header}
                                            className="w-full" 
                                        />                                          
                                    </a>
                                </Link>
                                <div className="px-6 pb-6">
                                    <p className="text-base text-gray-500 group-hover:text-gray-900">
                                        {item.text}
                                    </p>
                                </div>
                            </div>                            
                        ))}
                    </div>
                </div>
            </div>            
        </Disclosure>
    )
}
