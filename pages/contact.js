import React from 'react'
import Link from 'next/link'
import { Disclosure } from '@headlessui/react'
import { IndexLayout } from '../components/layout/IndexLayout'
import { FaMapMarkerAlt } from 'react-icons/fa'
import { FooterAction } from '../components/block/partner/FooterAction'


export default function Contact() 
{
    const Title = 'Контакты'
    const Description = 'Платформа `Shop Me` даёт обратную связь.'
    const phone = '+1-110-713-1104'

    return (
        <IndexLayout title={Title} description={Description}>
            <Disclosure as="section" className="bg-gray-100 py-6 px-4 md:px-0 md:py-20">
                <div className="max-w-6xl mx-auto px-4 sm:px-6 md:mt-20 mt-10">
                    <div className="grid grid-cols-2 gap-7">
                        <div className="grid gap-6">
                            <p className="text-gray-400">{Title}</p>
                            <h1 className="font-bold text-6xl text-black">Связаться с нами</h1>
                            <p className="text-2xl text-gray-700">Мы здесь, чтобы помочь. 
                            Спросите нас о продукте, 
                            наших услугах и любых вопросах, 
                            которые у вас есть.</p>

                            <div className="grid gap-2">
                                <strong>Штаб-квартира ShopMe, адрес:</strong>

                                <div className="flex space-x-2">
                                    <FaMapMarkerAlt className="text-pink-600 mt-1" />                                    
                                    <div>
                                        <p>12618 Akadeemia tee 21/4,
                                        <br /> Tallinn, Эстония</p>
                                    </div>
                                </div>                               
                            </div>
                            
                            <div>
                                <strong>Поддержка клиентов:</strong>
                                <p>Нужна помощь с чем-либо?</p>
                                <ul className="mt-2 list-inside list-disc">
                                    <li>
                                        <a href="#" className="link-dashed">
                                            Свяжитесь с командой по работе с торговцами ShopMe
                                        </a>
                                    </li>
                                    <li>Звоните <a href={`tel:${phone}`} className="link-dashed">{phone}</a></li>
                                    <li>
                                        <a href="https://defina.ru/community" target="_blank" className="link-dashed">
                                            Посетите наш справочный центр
                                        </a>
                                    </li>
                                    <li>
                                        <Link href="/login">
                                            <a className="link-dashed">
                                                Авторизуйтесь на нашей панели управления
                                            </a>
                                        </Link>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <div className="min-h-full">
                            
                            <div className="grid grid-rows-3 grid-flow-col h-full gap-4">
                                <div 
                                    id="1"
                                    className="col-span-3 row-span-2 p-5 bg-gray-300 rounded bg-cover bg-center bg-no-repeat shadow-md" 
                                    style={{backgroundImage: `url(/access/img/page/feedback/map.jpg)`}}
                                />
                                <div 
                                    id="2"
                                    className="col-span-5 p-5 bg-gray-300 rounded bg-cover bg-center bg-no-repeat bg-blend-color-burn mt-5 opacity-50"
                                    style={{backgroundImage: `url(/access/img/page/feedback/pixabay.jpg)`}}
                                />
                                <div 
                                    id="3"
                                    className="col-span-2 p-5 bg-gray-300 rounded bg-cover bg-top bg-no-repeat bg-blend-luminosity opacity-25"
                                    style={{backgroundImage: `url(/access/img/page/feedback/wellington-cunha.jpg)`}}
                                />
                                <div 
                                    id="4"
                                    className="col-span-2 p-5 bg-gray-300 rounded bg-cover bg-center bg-no-repeat bg-blend-luminosity opacity-50"
                                    style={{backgroundImage: `url(/access/img/page/feedback/andrea-piacquadio.jpg)`}}
                                />
                            </div>

                        </div>
                    </div>
                </div> 
                <div className="max-w-6xl mx-auto px-4 sm:px-6 md:mt-20 mt-10">
                    <div className="grid grid-cols-2 gap-7">
                        <div>
                            <div className="flex items-center space-x-6">
                                <img src="/access/img/page/feedback/premium-icon-media.png" alt="..." className="w-20 h-20 filter grayscale" />
                                <div>
                                    <strong>Запросы СМИ:</strong>
                                    <p><a href="#" className="link-dashed">Просмотрите нашу страницу для прессы</a>
                                    <br /> Или <a href="#" className="link-dashed">отправьте запрос СМИ</a>.</p>
                                </div>

                            </div>
                        </div>
                        <div>
                            <div className="flex items-center space-x-6">
                                <img src="/access/img/page/feedback/premium-icon-increase.png" alt="..." className="w-20 h-20 filter grayscale" />
                                <div>
                                    <strong>Запросы по продажам и новым предложениям:</strong>
                                    <p>Позвоните по телефону <a href="tel:18444744726" className="link-dashed">+1-844-474-4726</a>
                                    <br /> Или <a href="#" className="link-dashed">запросите расценки</a>.</p>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </Disclosure>
            <FooterAction />
        </IndexLayout>
    )
}
