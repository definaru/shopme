import React, { useEffect } from 'react'
import { Disclosure } from '@headlessui/react'
import { IndexLayout } from '../components/layout/IndexLayout'
import { FiStar } from 'react-icons/fi'
import { IoMdPerson, IoIosHeart, IoMdChatboxes, IoMdPlay } from 'react-icons/io'
import AOS from 'aos'
import 'aos/dist/aos.css'
import { FooterAction } from '../components/block/partner/FooterAction'


export default function Product() 
{
    const Title = 'Наши предложения'
    const Description = 'Платформа `Shop Me`, предложения платформы.'
    
    useEffect(() => {
        AOS.init()
    }, [])

    const ListShop = [
        {
            image: '/access/img/product/defina_store.png',
            category: 'MarketPlace',
            header: 'Defina Store',
            text: 'Огромный выбор online товара для бизнеса, отдыха и дизайна'
        },
        {
            image: '/access/img/product/gelstore.png',
            category: 'Shop',
            header: 'Gel Store',
            text: 'Футуристичный и дружелюбный магазин продвинутых технологий'
        },
        {
            image: '/access/img/product/react_page.png',
            category: 'Shop',
            header: 'React Page',
            text: 'Интернет-магазин услуг, всё что нужно современному бизнесу'
        },
        {
            image: '/access/img/product/3.jpg',
            category: 'Medical',
            header: 'Gimtoji',
            text: 'Онлайн сервис аномного лечения, от лучших врачей и докторов'
        },
        {
            image: '/access/img/product/1.png',
            category: 'Online-School',
            header: 'Mii',
            text: 'Обучающая онлайн платформа для школ, вузов и для саморазвития'
        },
        {
            image: '/access/img/product/2.png',
            category: 'Travel',
            header: 'Defina Travel',
            text: 'Онлайн бронирование туров, кафе, ресторанов, гостиниц и отелей'
        },
        {
            image: '/access/img/product/3.png',
            category: 'Work',
            header: 'Leidke tööd',
            text: 'Мощьная онлайн платформа для разработки продвинутого резюме'
        },
        {
            image: '/access/img/product/4.png',
            category: 'Real Estate',
            header: 'Tekka',
            text: 'Онлайн платформа для покупки и аренды жилья без посредников'
        },
    ]

    return (
        <IndexLayout title={Title} description={Description}>
            <Disclosure as="section" className="bg-pink-600 py-6 px-4 md:px-0 md:py-20">
                <div className="max-w-6xl mx-auto md:px-4 sm:px-6 md:mt-20 mt-10">
                    <div className="flex flex-col">
                        <div className="flex justify-center text-pink-600">
                            ...
                        </div>
                    </div>
                </div>
                <div className="max-w-6xl mx-auto md:px-6 sm:px-8 md:mt-20 mt-10 relative">
                    <div 
                        className="bg-white shadow-2xl absolute -bottom-52 left-0 w-full bg-top bg-fixed bg-no-repeat bg-cover rounded-lg overflow-hidden"
                        style={{backgroundImage: 'url(/access/img/daria-shevtsova.jpg)'}}
                    >
                        <div className="p-14 bg-black text-white rounded-lg bg-opacity-75">
                            <div className="flex justify-between items-center my-6">
                                <div className="flex">
                                    <div className="mr-5 mt-2">
                                        <img src="/access/img/favicon-32x32.png" className="w-20 h-20 flex-none" />
                                    </div>
                                    <div className="grid gap-4">
                                        <h2 className="text-xl md:text-4xl text-white font-extrabold">
                                            {Title}
                                        </h2>
                                        <div className="flex space-x-3 items-center">
                                            <p className="flex text-yellow-500 space-x-1 items-center">
                                                <FiStar /> <span>4.6</span>
                                            </p>
                                            <p>Avg of 26 Rated Reviews</p>
                                            <p className="rounded-md bg-indigo-600 text-indigo-200 text-sm font-light py-0.5 px-3 bg-opacity-50">
                                                смотреть отзывы
                                            </p>  
                                        </div> 
                                        <div className="flex space-x-5 items-center font-bold text-2xl">
                                            <div className="flex items-center space-x-2">
                                                <span>94</span>
                                                <IoMdChatboxes className="stroke-2" />
                                            </div>
                                            <div className="flex items-center space-x-2">
                                                <span>34</span>
                                                <IoIosHeart className="stroke-2" />
                                            </div>
                                            <div className="flex items-center space-x-2">
                                                <span>21</span>
                                                <IoMdPerson className="stroke-2" />
                                            </div>
                                        </div>                                       
                                    </div>
                                </div>

                                <div className="grid gap-10 place-items-end">
                                    <div className="flex justify-end -space-x-2 mr-2">
                                        <img
                                            className="inline-block h-9 w-9 rounded-full ring-2 ring-white"
                                            src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt=""
                                        />
                                        <img
                                            className="inline-block h-9 w-9 rounded-full ring-2 ring-white"
                                            src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt=""
                                        />
                                        <img
                                            className="inline-block h-9 w-9 rounded-full ring-2 ring-white"
                                            src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.25&w=256&h=256&q=80"
                                            alt=""
                                        />
                                        <img
                                            className="inline-block h-9 w-9 rounded-full ring-2 ring-white"
                                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt=""
                                        />
                                        <div className="inline-block h-9 w-9 rounded-full ring-2 ring-white bg-indigo-600 grid place-items-center font-bold">
                                            DF
                                        </div>                                                
                                        <div className="inline-block h-9 w-9 rounded-full ring-2 ring-white bg-pink-600 grid place-items-center font-bold text-3xl">
                                            +
                                        </div>
                                    </div>
                                    <div className="flex items-center space-x-4">
                                        <a 
                                            data-scroll 
                                            href="#learn_more" 
                                            className="border-2 border-pink-600 hover:border-indigo-900 bg-pink-600 hover:bg-indigo-900 font-bold rounded-full text-base py-3 px-10 shadow-lg"
                                        >
                                            Выбрать платформу
                                        </a>   
                                        <div className="border-2 border-white shadow-lg bg-transparent hover:text-pink-600 hover:bg-gray-100 rounded-full w-14 h-14 cursor-pointer grid place-items-center">
                                            <IoMdPlay className="text-4xl ml-1.5" />
                                        </div>                                         
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </Disclosure> 
            <Disclosure id="learn_more" as="section" className="bg-gray-100 py-6 px-4 md:px-0 md:py-20">
                <div 
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-easing="ease-in-sine"
                    className="max-w-6xl mx-auto md:px-4 sm:px-6 md:mt-20 mt-10"
                >
                    <h3 className="block w-full mb-10 text-2xl mt-32">{'Два вида программ:'}</h3>
                    <div className="grid grid-cols-2 gap-14">
                        <div className="bg-white rounded p-8 shadow-lg relative">
                            <div class="grid grid-cols-3 gap-0">
                                <div className="col-span-2">
                                    <div>
                                        <p class="rounded-full table bg-indigo-600 text-indigo-400 text-sm font-light py-2 px-5 bg-opacity-10 mb-5">
                                            Platform
                                        </p>                                        
                                    </div>
                                    <div className="flex">
                                        <div className="flex -space-x-2 mr-2">
                                            <img
                                                className="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                                                src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                alt=""
                                            />
                                            <img
                                                className="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                                                src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                alt=""
                                            />
                                            <img
                                                className="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                                                src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.25&w=256&h=256&q=80"
                                                alt=""
                                            />
                                        </div>
                                        <div className="flex space-x-2 items-center text-sm text-gray-300">
                                            <p className="flex text-yellow-500 space-x-1 items-center">
                                                <FiStar /> <span>4.6</span>
                                            </p>
                                            <p>из 5 от 151 Пользователя</p> 
                                        </div>
                                    </div>
                                    <h2 className="font-bold text-2xl my-3 no-underline hover:text-pink-600 hover:underline cursor-pointer">Интернет-магазин</h2>
                                    <p className="font-extralight text-sm text-gray-400">
                                        Идейные соображения высшего порядка, а также рамки и место 
                                        обучения кадров...
                                    </p>
                                    <div className="flex space-x-5 items-center font-thin text-xs text-gray-500 mt-4">
                                        <div className="flex items-center space-x-1">
                                            <IoMdChatboxes />
                                            <span className="no-underline hover:underline cursor-pointer">94 отзывов</span>
                                        </div>
                                        <div className="flex items-center space-x-1">
                                            <IoIosHeart />
                                            <span className="no-underline hover:underline cursor-pointer">34 понравилось</span>
                                        </div>
                                    </div> 
                                </div>
                                <div>
                                    <img 
                                        src="/access/img/product/rachel-claire.jpg" 
                                        className="w-52 h-52 rounded-full object-cover absolute -right-6 border-4 border-pink-600 shadow-lg" 
                                    />
                                </div>
                            </div>
                        </div>

                        <div className="bg-white rounded p-8 shadow-lg relative">
                            <div class="grid grid-cols-3 gap-0">
                                <div className="col-span-2">
                                    <div>
                                        <p class="rounded-full table bg-indigo-600 text-indigo-400 text-sm font-light py-2 px-5 bg-opacity-10 mb-5">
                                            Platform
                                        </p>                                        
                                    </div>
                                    <div className="flex">
                                        <div className="flex -space-x-2 mr-2">
                                            <img
                                                className="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                                                src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                alt=""
                                            />
                                            <img
                                                className="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                                                src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                alt=""
                                            />
                                            <img
                                                className="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                                                src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.25&w=256&h=256&q=80"
                                                alt=""
                                            />
                                        </div>
                                        <div className="flex space-x-2 items-center text-sm text-gray-300">
                                            <p className="flex text-yellow-500 space-x-1 items-center">
                                                <FiStar /> <span>4.6</span>
                                            </p>
                                            <p>из 5 от 151 Пользователя</p> 
                                        </div>
                                    </div>
                                    <h2 className="font-bold text-2xl my-3 no-underline hover:text-indigo-600 hover:underline cursor-pointer">Партнёрская программа</h2>
                                    <p className="font-extralight text-sm text-gray-400">
                                        Идейные соображения высшего порядка, а также рамки и место 
                                        обучения кадров...
                                    </p>
                                    <div className="flex space-x-5 items-center font-thin text-xs text-gray-500 mt-4">
                                        <div className="flex items-center space-x-1">
                                            <IoMdChatboxes />
                                            <span className="no-underline hover:underline cursor-pointer">194 отзывов</span>
                                        </div>
                                        <div className="flex items-center space-x-1">
                                            <IoIosHeart />
                                            <span className="no-underline hover:underline cursor-pointer">134 понравилось</span>
                                        </div>
                                    </div> 
                                </div>
                                <div>
                                    <img 
                                        src="/access/img/product/fauxels.jpg" 
                                        className="w-52 h-52 rounded-full object-cover absolute -right-6 border-4 border-indigo-600 shadow-lg" 
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </Disclosure>

            <Disclosure as="section" className="bg-gray-200 py-10 px-4 md:px-0 md:py-40">
                <div 
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-easing="ease-in-sine"
                    className="max-w-6xl mx-auto md:px-4 sm:px-6"
                >
                    <div className="block w-full text-center">
                        <h3 className="block w-full text-lg my-2 text-gray-400">
                            {'Предлагаем вашему вниманию список рабочих магазинов'}
                        </h3>
                        <h2 className="block w-full mb-20 text-4xl font-bold">
                            {'Предложения для бизнес партнёров:'}
                        </h2>
                    </div>

                    <div className="grid grid-cols-4 gap-4">
                        {ListShop.map((item, idx) => (
                        <div key={idx} className="bg-white rounded px-7 py-12 shadow-none hover:shadow-lg grid gap-3">
                            <div className="flex justify-center">
                                <img 
                                    src={item.image} 
                                    className="w-28 h-28 rounded-full object-cover" 
                                />
                            </div>
                            <div className="flex justify-center my-4">
                                <p class="rounded-full table bg-pink-600 text-pink-400 text-sm font-light py-2 px-5 bg-opacity-10">
                                    {item.category}
                                </p> 
                            </div>
                            <div className="text-center">
                                <h2 className="font-extrabold text-base no-underline hover:text-pink-600 hover:underline cursor-pointer">
                                    {item.header}
                                </h2>
                            </div>
                            <div className="text-center">
                                <p className="font-extralight text-sm text-gray-400">
                                    {item.text}
                                </p>
                            </div>
                        </div>                            
                        ))}

                    </div>
                </div>
            </Disclosure>

            <FooterAction />          
        </IndexLayout>
    );
}