import React, { useContext } from 'react'
import Link from 'next/link'
import { FaCcPaypal, FaCcStripe, FaCcVisa, FaCcMastercard } from 'react-icons/fa'
import { ShopContext } from '../context/ShopContext'


export function Footer() 
{
    const {web} = useContext(ShopContext)
    const Navigation = [
        {
            header: 'Ресурсы',
            list: [
                {
                    text: 'Обратная связь',
                    href: '/feedback'
                },
                {
                    text: 'Контакты',
                    href: '/contact'
                },
                {
                    text: 'Что нового ?',
                    href: '/news'
                },
                {
                    text: 'Каталог продуктов',
                    href: '#'
                }
            ]
        },
        {
            header: 'Аффилиатам',
            list: [
                {
                    text: 'О платформе',
                    href: '#'
                },
                {
                    text: 'Связяться с нами',
                    href: '/arbitration'
                },
                {
                    text: 'TrustCenter',
                    href: '/confidence'
                },
                {
                    text: 'Защита от мошенничества',
                    href: '/security'
                },
                {
                    text: 'Юридические сведения',
                    href: '/legal'
                }
            ]
        },
        {
            header: 'Поддержка',
            list: [
                {
                    text: 'Техническая поддержка',
                    href: '/support'
                },
                {
                    text: 'Сообщение о нарушениях',
                    href: '/ro'
                },
                {
                    text: 'Политики конфиденциальности',
                    href: '/privacy_policy'
                },
                {
                    text: 'Отказ от ответственности',
                    href: '/denial_of_responsibility'
                }
            ]
        },
        {
            header: 'Возможности',
            list: [
                {
                    text: 'API ShopMe',
                    href: 'https://documenter.getpostman.com/view/9480348/TzkyP1Ph'
                },
                {
                    text: 'Документация',
                    href: '/doc'
                },
                {
                    text: 'Пресса',
                    href: '/press'
                },
                {
                    text: 'Предложения', // Таблица цен
                    href: '/price'
                }
            ]
        }
    ]

    return (
        <>
        <footer className="w-full block py-10 md:py-20">
            <div className="max-w-6xl mx-auto px-6 md:px-10">
                <div className="grid grid-cols-1 md:grid-cols-4 gap-6 md:gap-10">
                    {Navigation?.map((item, idx) => (
                    <div key={idx}>
                        <h4 className="text-xl mb-6 font-bold">{item.header}</h4>
                        <ul className="space-y-2">
                        {item?.list?.map((manu, i) => (
                            <li key={i}>
                                <Link href={manu.href}>
                                    <a className="no-underline text-sm text-gray-600 hover:underline hover:text-pink-600">
                                        {manu.text}
                                    </a>
                                </Link>
                            </li>
                        ))}                            
                        </ul>
                    </div>                        
                    ))}
                </div>
            </div>
        </footer>

        <footer className="w-full block py-10 border-t">
            <div className="max-w-6xl mx-auto px-4 sm:px-6">
                <div className="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-6">
                    <div className="flex flex-col md:flex-row">
                        <div className="flex flex-col">
                            <img className="w-40 mr-6" src="/access/img/logo.svg" alt={web.company} />
                            <div className="flex space-x-2 text-3xl py-2 opacity-25">
                                <div><FaCcPaypal /></div>
                                <div><FaCcStripe /></div>
                                <div><FaCcVisa /></div>
                                <div><FaCcMastercard /></div>
                            </div>
                        </div>
                        <div>
                            <p className="font-medium text-sm mb-2">
                                &copy; {(new Date()).getFullYear()}&#160;
                                <a href={web.site}>{web.company} Inc.</a>&#160; All rights reserved.
                            </p>
                            <p className="text-sm text-gray-400">
                                <small>
                                    Сайт не является публичной офертой <br />
                                    согласно положениям статьи 437 ГК РФ                                    
                                </small>
                            </p>                            
                        </div>
                    </div>
                    <div>
                        <p className="text-sm text-gray-300">
                            Мы используем cookies для сбора обезличенных персональных данных. 
                            Они помогают настраивать рекламу и анализировать трафик. 
                            Оставаясь на сайте, вы соглашаетесь на сбор таких данных.
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        </>
    )
}
