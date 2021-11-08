import React from 'react'
import Link from 'next/link'
import { IndexLayout } from '../components/layout/IndexLayout'
import { FaQuoteLeft } from 'react-icons/fa'
import { Featured } from '../components/block/partner/Featured'
import { Marketplaces } from '../components/block/partner/Marketplaces'
import { CallToAction } from '../components/block/partner/CallToAction'
import { FooterAction } from '../components/block/partner/FooterAction'


export default function Partners() 
{

    const Title = 'Документация'
    const Description = '`Shop Me` Простой способ зарабатывать комиссионные. '

    return (
        <IndexLayout title={Title} description={Description}>
            <div className="max-w-6xl mx-auto px-4 sm:px-6 py-20">
                <div className="flex justify-between mt-10">
                    <div className="w-2/4 pr-10">
                        <h1 className="font-bold text-gray-900 text-6xl mt-5">
                            <small className="font-thin">Партнерская экосистема</small> <br />
                            <span className="text-pink-600">и интеграции ShopMe</span>
                        </h1>
                        <p className="text-md text-gray-700 py-14">
                            Мы сотрудничаем с ведущими технологическими 
                            решениями и агентствами электронной коммерции, 
                            чтобы помочь вам развивать ваш бизнес умнее, 
                            быстрее и сильнее, чем когда-либо прежде.
                        </p>
                        <div className="flex">
                            <div>
                                <Link href="/signup">
                                    <a className="bg-pink-600 text-gray-50 px-8 py-4 text-xl font-bold rounded mr-0 md:mr-4 hover:bg-gray-900">
                                        Стать партнёром
                                    </a>                                    
                                </Link>
                            </div>
                            <div>
                                <a 
                                    data-scroll 
                                    href="#learn_more"
                                    className="text-gray-800 bg-gray-100 hover:bg-gray-200 px-8 py-4 text-xl font-semibold rounded hover:text-pink-600"
                                >
                                    Узнать больше
                                </a>
                            </div>
                        </div>
                    </div>
                    <div className="w-2/4 relative">

                        <div className="bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 block w-4/5 h-96 float-right rounded">
                            <img 
                                src="/access/img/2199190.jpg" 
                                className="w-full h-96 shadow-2xl object-cover rounded opacity-40" 
                                alt="..." 
                            />                            
                        </div>

                        <div className="absolute z-30 top-36 right-52">
                            <div className="bg-white bg-opacity-90 p-9 rounded-md shadow-xl w-96">
                                <FaQuoteLeft className="text-pink-200 w-10 h-10 mb-5" />
                                <small className="text-gray-900 text-sm">
                                    "ShopMe легко интегрируется с Shopify. 
                                    Нам было очень просто управлять заказами на подписку. 
                                    К счастью, ShopMe сотрудничает со многими инструментами, 
                                    которые мы используем, такими как ReCharge, Klaviyo, Yotpo и Brightpearl. 
                                    ShopMe работает с нами рука об руку, 
                                    разрабатывая новые API и обновляя технологии."
                                </small>
                                <p className="py-1 mt-4 block font-bold">Пабло Габатто</p>
                                <p>
                                    <small className="text-gray-500">
                                        Менеджер по бизнес-операциям в Ample Foods
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
            <Featured />     
            <Marketplaces /> 
            <CallToAction /> 
            <FooterAction />  
        </IndexLayout>
    )
}
