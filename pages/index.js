import React, { useEffect } from 'react'
import Link from 'next/link'
import SmoothScroll from 'smooth-scroll/dist/smooth-scroll'
import { IndexLayout } from '../components/layout/IndexLayout'
import { AiOutlineUsergroupAdd } from 'react-icons/ai'
import { IoIosPulse, IoMdTrendingUp, IoIosCard, IoMdAlarm, IoMdFlash, IoMdHeart } from 'react-icons/io'
import { GiArrowCursor, GiChart, GiBrain, GiFiles, GiMoneyStack } from 'react-icons/gi'
import { Faq } from '../components/block/index/Faq'
import { FaQuoteLeft } from 'react-icons/fa'
import { HiArrowNarrowRight } from 'react-icons/hi'
import { BiCheckDouble } from 'react-icons/bi'
import { VscGraph } from 'react-icons/vsc'
import { Disclosure } from '@headlessui/react'
import AOS from 'aos'
import 'aos/dist/aos.css'


export default function Home() 
{

    useEffect(() => {
        AOS.init()
    }, [])

    useEffect(() => {
        const scroll = new SmoothScroll('a[href*="#"]', {
            speed: 1000,
            speedAsDuration: true,
            updateURL: false
        })
    }, [])

    const Title = 'Affiliate Programm'
    const Description = 'Простой способ зарабатывать комиссионные, продвигая продукты или услуги платформы `Shop Me`.'

    const onDataSpeedUp = [
        {header: 'Стабильно', text: '100% выплаты'},
        {header: 'Промо', text: 'Индивидуальные креативы'},
        {header: 'Прозрачно', text: 'Подробный анализ'},
        {header: 'Менеджер', text: 'Персональный, всегда твой'}
    ]

    return (
        <IndexLayout title={Title} description={Description}>
            <div className="bg-white overflow-hidden pt-20">
                <div className="max-w-6xl mx-auto">
                    <div className="pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                        <main className="relative mt-5 mx-auto max-w-7xl px-10 sm:mt-12 sm:px-6 md:mt-10 lg:mt-14 lg:px-8 xl:mt-10">
                            
                            <div className="absolute hidden md:block z-30 top-32 -right-60">
                                <div className="bg-white p-9 rounded-md shadow-2xl w-96">
                                    <FaQuoteLeft className="text-pink-200 w-10 h-10 mb-5" />
                                    <small className="text-gray-900 text-sm">
                                        "Я чувствовала, что не смогу расти, пока не перейду в ShopMe. 
                                        Теперь меня поощряют продавать с ними больше. 
                                        Мой бухгалтер даже сказал мне: «Слава богу, ты перешела на ShopMe»."
                                    </small>
                                    <p className="py-1 mt-4 block font-bold">Кортни Ли</p>
                                    <p>
                                        <small className="text-gray-500">
                                            {`Founder & CEO of Prymal`}
                                        </small>
                                    </p>
                                </div>
                            </div>
                            
                            
                            <div className="text-center lg:text-left">
                                <div className="bg-pink-200 text-black inline-table rounded mb-3">
                                    <h6 className="flex py-2 px-3">
                                        <AiOutlineUsergroupAdd />
                                    </h6>
                                </div>

                                <h1 className="text-4xl tracking-tight text-gray-900 sm:text-5xl md:text-6xl">
                                    <span className="block font-extrabold">Партнёрская программа</span>
                                    <span className="block font-bold text-pink-600 xl:inline">онлайн-бизнес</span>
                                </h1>
                                <p className="text-justify md:text-left my-10 text-base text-gray-500 block sm:text-lg max-w-xl md:text-xl md:mr-20">
                                    Привлекайте больше клиентов и масштабируйте бизнес. 
                                    Автоматизация процессов по всему циклу взаимодействия с партнёрами.
                                </p>
                                <div className="relative md:absolute z-20 mt-3 sm:flex sm:justify-center lg:justify-start items-center space-y-4 md:space-y-0">
                                    <div>
                                        <Link href="/signup">
                                            <a className="w-full shadow flex items-center justify-center px-8 py-3 text-base font-extrabold rounded-md text-white bg-pink-600 hover:bg-pink-700 md:py-4 md:text-lg md:px-10">
                                                <HiArrowNarrowRight className="mr-3" /> Начать сейчас
                                            </a>
                                        </Link>
                                    </div>
                                    <div className="sm:ml-5">
                                        <a
                                            data-scroll 
                                            href="#learn_more" 
                                            className="w-full flex items-center justify-center px-8 py-3 text-base font-medium rounded-md text-gray-800 bg-gray-100 hover:bg-gray-200 hover:text-pink-600 md:py-4 md:text-lg md:px-10"
                                        >
                                            Подробнее
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>
                <div className="absolute hidden md:block lg:inset-y-0 lg:right-0 lg:w-1/2">
                    <img
                        className="mt-24 h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full"
                        src="/access/img/slider-3.png"
                        alt=""
                    />
                </div>
            </div> 

            <div
                id="learn_more"
                data-aos="fade-up"
                data-aos-duration="1000"
                data-aos-easing="ease-in-sine"
            >
                <div className="relative hidden md:block bg-pink-600 mt-28">
                    <img src="/access/img/hero-bg.svg" alt="..." 
                        className="w-full absolute -top-52 z-0" 
                    />
                </div>
                <div 
                    className="flex justify-center mt-10 md:mt-0" 
                    style={{
                        background: 'linear-gradient(0deg, rgb(249 250 251) 28%, rgb(219 39 119) 28%)'
                    }}
                >
                    <img 
                        src="/access/img/laptop.png" 
                        alt="laptop" 
                        className="w-full md:w-3/5 pt-5" 
                    />
                </div>                
            </div>
     
            <Disclosure as="section" className="bg-gray-50">
                <div className="max-w-6xl mx-auto px-4 sm:px-6">
                    <div className="block w-full text-center">
                        <div className="font-bold">
                            <h6 className="text-sm text-gray-400">КАК ВСЕ УСТРОЕНО</h6>
                            <h2 className="text-5xl text-pink-600">Схема работы</h2>
                        </div>
                    </div>

                    <div className="grid grid-cols-1 md:grid-cols-3 md:gap-6 py-16">
                        <div className="bg-white p-9 shadow-none hover:shadow-lg rounded-lg cursor-default mb-6 md:mb-0">
                            <div className="flex flex-col text-center">
                                <div className="flex justify-center step py-8">
                                    <IoIosPulse className="text-pink-600 text-6xl blur-md" />
                                </div>
                                <div>
                                    <h3 className="text-gray-700 bg-gray-300 rounded-full px-3 py-1 inline-table font-bold mt-3">
                                        Шаг 1
                                    </h3>
                                </div>
                                <div>
                                    <p className="my-3 font-bold text-2xl pb-2">Регистрируйтесь</p>
                                    <p className="text-gray-600 text-sm text-justify">Начните работу без интеграции или воспользуйтесь нашим API для большей автоматизации. Гибкие настройки позволяют настроить систему так, как вам нужно.</p>
                                </div>
                            </div>
                        </div>
                        <div className="bg-white p-9 shadow-none hover:shadow-lg rounded-lg cursor-default mb-6 md:mb-0">
                            <div className="flex flex-col text-center">
                                <div className="flex justify-center step py-8">
                                    <IoMdTrendingUp className="text-pink-600 text-6xl" />
                                </div>
                                <div>
                                    <h3 className="text-gray-700 bg-gray-300 rounded-full px-3 py-1 inline-table font-bold mt-3">
                                        Шаг 2
                                    </h3>
                                </div>
                                <div>
                                    <p className="my-3 font-bold text-2xl pb-2">Привлекайте клиентов</p>
                                    <p className="text-gray-600 text-sm text-justify">
                                        Пригласите партнеров подключится к системе и начать зарабатывать вместе с вами. Управляйте партнерами, обучайте, стимулируйте и задавайте цели.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div className="bg-white p-9 shadow-none hover:shadow-lg rounded-lg cursor-default mb-6 md:mb-0">
                            <div className="flex flex-col text-center">
                                <div className="flex justify-center step py-8">
                                    <IoIosCard className="text-pink-600 text-6xl" />
                                </div>
                                <div>
                                    <h3 className="text-gray-700 bg-gray-300 rounded-full px-3 py-1 inline-table font-bold mt-3">
                                        Шаг 3
                                    </h3>
                                </div>
                                <div>
                                    <p className="my-3 font-bold text-2xl pb-2">Получаете прибыль</p>
                                    <p className="text-gray-600 text-sm text-justify">
                                        Прозрачный детальный учет работы партнеров и различные схемы начисления вознаграждения. 
                                        Выплачивайте вознаграждение за достигнутый результат.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="w-full flex justify-center pb-20">
                        <div>
                            <Link href="/login">
                                <a className="w-full shadow table px-8 py-3 text-base font-medium rounded-md text-white bg-pink-600 hover:bg-pink-700 md:py-4 md:text-lg md:px-10">
                                    Хочу с Вами !
                                </a>  
                            </Link>
                        </div>
                    </div>
                </div>
            </Disclosure>
            
            <Disclosure as="section" className="bg-white">
                <div className="max-w-6xl mx-auto px-4 sm:px-6">
                    <div className="flex flex-col items-center md:flex-row py-5 md:py-10">
                        <div className="w-full md:w-2/4 p-3 mb-10 md:mb-0 md:p-10">
                            <div className="block">
                                <div className="font-bold mb-10">
                                    <h6 className="text-sm text-gray-400 mb-3">ЧТО МЫ ПРЕДЛАГАЕМ</h6>
                                    <h2 className="text-5xl text-black">Быстрый подъем</h2>
                                </div>
                                <div>
                                    <div className="text-gray-600 text-md space-y-5 mr-0 md:mr-20">
                                        <p>
                                            Чтобы стать партнером <strong>не нужно платить за вступление</strong>. 
                                            А привлекать клиентов можно даже без опыта.
                                        </p>
                                        <p>
                                            Средний доход новичка в нашей партнерке 
                                            только за первый месяц работы $240, и это не предел.
                                        </p>
                                    </div>
                                    <div className="w-full flex justify-start mt-7">
                                        <div>
                                            <Link href="/signup">
                                                <a className="w-full flex px-8 py-3 text-base font-medium rounded-md text-white bg-pink-600 hover:bg-pink-700 md:py-4 md:text-lg md:px-10">
                                                    Убедили, регистрируюсь!
                                                </a>                                                 
                                            </Link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="w-full md:w-2/4 p-3 mb-10 md:mb-0 md:p-10 relative">
                            <div className="absolute z-10 -left-16 top-24">
                                <img 
                                    src="/access/img/pay.png" 
                                    className="w-80"
                                    alt="Analysis"
                                />
                                {/* <img 
                                    src="/access/img/pdf.svg" 
                                    className="absolute w-20 left-16"
                                    alt="PDF"
                                /> */}
                                <img 
                                    src="/access/img/word_office.png" 
                                    className="absolute w-36 left-10"
                                    alt="PDF"
                                />
                                <img 
                                    src="/access/img/onenote_office.png" 
                                    className="absolute w-36 -left-12"
                                    alt="PDF"
                                />
                            </div>
                            <div className="bg-gradient-to-r from-white via-pink-600 to-red-500 block w-full h-full float-right rounded">
                                <img src="/access/img/plus-item-img-2.jpg" alt="..." className="w-full rounded opacity-40" />
                            </div>
                        </div>
                    </div>
                </div>
            </Disclosure>

            <Disclosure 
                as="section"
                data-aos="fade-up"
                data-aos-duration="1000"
                data-aos-easing="ease-in-sine"            
            >
                <div className="max-w-6xl mx-auto px-4 sm:px-6">
                    <div className="block w-full text-center">
                        <div className="font-bold">
                            <h6 className="text-sm text-gray-400">РАБОТАЙ С VIP-ПАРТНЕРКОЙ</h6>
                            <h2 className="text-4xl text-pink-700">Вот почему с нами круто!</h2>
                        </div>
                    </div>
                    <div className="grid grid-cols-2 grid-rows-2 md:grid-rows-1 md:grid-cols-4 gap-4 md:gap-8 mt-2 py-10">
                        {onDataSpeedUp?.map((item, idx) => (
                        <div key={idx}>
                            <div className="border border-gray-100 rounded-xl p-8 text-center h-40 md:h-auto">
                                <div className="flex justify-center">
                                    <BiCheckDouble className="w-8 h-8 text-pink-600" />
                                </div>
                                <h4 className="font-extrabold">
                                    {item.header}
                                </h4>
                                <p className="text-sm mb-5">{item.text}</p>
                            </div>
                        </div>
                        ))}
                    </div>                    
                </div>
            </Disclosure>

            <Disclosure as="section" className="bg-white">
                <div className="max-w-6xl mx-auto px-4 sm:px-6">
                    <div className="flex flex-col items-center md:flex-row py-5 md:py-10">
                        <div className="w-full md:w-2/4 p-3 mb-10 md:mb-0 md:p-10">
                            <img src="/access/img/905771678100406600.png" alt="..." className="w-full" />
                        </div>                        
                        <div className="w-full md:w-2/4 p-3 mb-10 md:mb-0 md:p-10">
                            <div className="block">
                                <div className="font-bold mb-10">
                                    <h2 className="text-center md:text-left">
                                        <div className="block text-pink-600 font-normal text-2xl">Получать деньги еще</div>
                                        <div className="block text-gray-900 text-2xl md:text-5xl">Никогда не было так просто</div>
                                    </h2>
                                </div>
                                <div>
                                    <div className="text-gray-600 text-md space-y-5">
                                        <p>
                                            Мы позволяем создавать и отправлять профессиональные и красивые счета за секунды. 
                                            Функция автоматического выставления счетов сэкономит ваше драгоценное время, а, 
                                            приняв онлайн-платежи, вы сможете получать оплату быстрее и забыть о просроченных платежах.
                                        </p>
                                    </div>
                                    <div className="grid grid-flow-col grid-cols-2 grid-rows-2 gap-6 mt-8 mr-0 md:mr-14">
                                        <div className="py-2 px-3 rounded bg-gray-50 mr-6 flex items-center w-full">
                                            <IoIosCard className="mr-2 text-pink-900 w-10 h-10" /> Онлайн-платежи
                                        </div>
                                        <div className="py-2 px-3 rounded bg-gray-50 flex items-center w-full">
                                            <IoMdAlarm className="mr-2 text-pink-900 w-10 h-10" /> Авто счет-фактура
                                        </div>
                                        <div className="py-2 px-3 rounded bg-gray-50 mr-6 flex items-center w-full">
                                            <IoMdFlash className="mr-2 text-pink-900 w-10 h-10" /> Быстрый счет
                                        </div>
                                        <div className="py-2 px-3 rounded bg-gray-50 flex items-center w-full">
                                            <IoMdHeart className="mr-2 text-pink-900 w-10 h-10" /> Красивый дизайн
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </Disclosure>

            <Disclosure 
                as="section" 
                className="bg-white"
                data-aos="fade-up"
                data-aos-duration="1000"
                data-aos-easing="ease-in-sine"            
            >
                <div className="max-w-6xl mx-auto px-4 sm:px-6">
                    <div className="pb-10">
                        <div className="block w-full text-center">
                            <div className="font-bold">
                                <h6 className="text-sm text-gray-400">КАК ВСЕ УСТРОЕНО</h6>
                                <h2 className="text-2xl md:text-5xl text-pink-600">Кому подходит такой заработок</h2>
                                <p className="py-5">Преобразуй свой трафик в высокий доход</p>
                            </div>
                        </div>
                        
                        <div className="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6 mt-8 pb-5">
                            <div>
                                <div className="group cursor-default border border-gray-100 rounded-xl p-8 text-center shadow-none hover:shadow-lg">
                                    <div className="flex justify-center">
                                        <img 
                                            src="/access/img/1.png" 
                                            className="w-44" 
                                            alt="Вебмастера" 
                                        />
                                    </div>
                                    <h4 className="font-extrabold text-xl mb-2 text-gray-900 group-hover:text-pink-600">Вебмастера</h4>
                                    <p className="text-sm h-20">
                                        Размещение баннеров, ссылок и статей на собственном посещаемом онлайн-ресурсе
                                    </p>
                                </div>
                            </div>
                            <div>
                                <div className="group cursor-default border border-gray-100 rounded-xl p-8 text-center shadow-none hover:shadow-lg">
                                    <div className="flex justify-center">
                                        <img 
                                            src="/access/img/2.png" 
                                            className="w-44" 
                                            alt="Блоггеры" 
                                        />
                                    </div>
                                    <h4 className="font-extrabold text-xl mb-2 text-gray-900 group-hover:text-pink-600">Блоггеры</h4>
                                    <p className="text-sm h-20">
                                        Рассказывайте о нас в выпусках и в постах в блоге и соцсетях
                                    </p>
                                </div>
                            </div>
                            <div>
                                <div className="group cursor-default border border-gray-100 rounded-xl p-8 text-center shadow-none hover:shadow-lg">
                                    <div className="flex justify-center">
                                        <img 
                                            src="/access/img/3.png" 
                                            className="w-44" 
                                            alt="SMMщики" 
                                        />
                                    </div>
                                    <h4 className="font-extrabold text-xl mb-2 text-gray-900 group-hover:text-pink-600">SMMщики</h4>
                                    <p className="text-sm h-20">
                                        Знаете где и как найти качественный траффик? Давайте обсудим сотрудничество!
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div className="w-full flex justify-center pb-20">
                            <div>
                                <Link href="/signup">
                                    <a className="w-full shadow table px-8 py-3 text-base font-medium rounded-md text-white bg-pink-600 hover:bg-pink-700 md:py-4 md:text-lg md:px-10">
                                        Да, это для меня!
                                    </a> 
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </Disclosure>


            <Disclosure as="section" className="bg-white">
                <div className="max-w-6xl mx-auto px-4 sm:px-6">
                    <div className="flex flex-col items-center md:flex-row py-5 md:py-10">
                        <div className="w-full md:w-2/4 p-3 mb-10 md:mb-0 md:p-10">
                            <div className="block">
                                <div className="font-bold mb-10 text-center md:text-right">
                                    <h2>
                                        <div className="block text-pink-600 font-normal text-2xl">Простой учет,</div>
                                        <div className="block text-gray-900 text-2xl md:text-5xl">Каким и должен быть.</div>
                                    </h2>
                                </div>
                                <div>
                                    <div className="text-gray-600 text-md space-y-5 text-justify">
                                        <p>
                                            Работай умом, а не силой. ShopMe делает управление вашими внештатными проектами и платежами простым, 
                                            быстрым и приятным. Благодаря интеллектуальной автоматизации, великолепным счетам, 
                                            быстрым предложениям и предельно простой панели управления бухгалтерский учет еще никогда 
                                            не был таким простым и доступным.
                                        </p>
                                    </div>
                                    <div className="flex mt-8 justify-center md:justify-end">
                                        <Link href="/signup">
                                            <a className="group py-2 px-3 rounded bg-black text-gray-50 flex items-center hover:bg-pink-500">
                                                <GiArrowCursor className="mr-2 text-pink-500 group-hover:text-white" /> Начать сейчас
                                            </a> 
                                        </Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="w-full md:w-2/4 p-3 mb-10 md:mb-0 md:p-10">
                            <img 
                                src="/access/img/1599815108980x22424570833161850.png" 
                                alt="..." 
                                className="w-full" 
                            />
                        </div>                          
                    </div>
                </div>
            </Disclosure>

            <Disclosure as="section" className="bg-white py-20 border-t">
                <div className="max-w-6xl mx-auto px-4 sm:px-6">
                    <div className="flex flex-col items-center md:flex-row py-5 md:py-10">
                        <div className="w-full md:w-2/4 p-3 mb-10 md:mb-0 md:p-10">
                            <img src="/access/img/6760498721328563202020.png" alt="..." className="w-full" />
                        </div>                         
                        <div className="w-full md:w-2/4 p-3 mb-10 md:mb-0 md:p-10">
                            <div className="block">
                                <div className="font-bold mb-10">
                                    <h2 className="text-center md:text-left">
                                        <div className="block text-pink-600 text-2xl">Знай настоящее,</div>
                                        <div className="block text-gray-900 text-2xl md:text-5xl">Планируй будущее.</div>
                                    </h2>
                                </div>
                                <div>
                                    <div className="text-gray-600 text-md space-y-5">
                                        <p>
                                            Будьте спокойны, зная всю свою ежемесячную прибыль и проверяя свой прогресс в простом 
                                            пользовательском интерфейсе. Кроме того, наша аналитика на основе данных дает вам прогноз 
                                            вашего финансового положения на конец года, чтобы вы могли принять меры сейчас и 
                                            скорректировать настоящее.
                                        </p>
                                    </div>
                                    <div className="grid grid-flow-col grid-cols-2 grid-rows-2 gap-4 md:gap-6 mt-8">
                                        <div className="py-2 px-3 rounded bg-gray-50 flex items-center">
                                            <GiBrain className="mr-2 text-pink-500 w-10 h-10" /> Умные идеи
                                        </div>
                                        <div className="py-2 px-3 rounded bg-gray-50 flex items-center">
                                            <GiFiles className="mr-2 text-pink-500 w-10 h-10" /> Понятные данные
                                        </div>
                                        <div className="py-2 px-3 rounded bg-gray-50 flex items-center">
                                            <GiMoneyStack className="mr-2 text-pink-500 w-10 h-10" /> Финансовый анализ
                                        </div>
                                        <div className="py-2 px-3 rounded bg-gray-50 flex items-center">
                                            <GiChart className="mr-2 text-pink-500 w-10 h-10" /> Аналитика
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </Disclosure>

            <Disclosure 
                as="section" 
                className="bg-gray-900 bg-center bg-no-repeat bg-cover bg-fixed" 
                style={{backgroundImage: 'url(/access/img/1f7dd7ab94W.jpg)'}}
            >
                <div className="bg-gray-900 bg-opacity-75 py-24 md:py-40 text-white">
                    <div className="max-w-3xl mx-auto px-4 sm:px-6">
                        <div className="flex flex-col">
                            <div className="flex justify-center text-center">
                                <h2 className="text-3xl md:text-5xl font-extrabold py-4">Автоматизируйте расчеты</h2>
                            </div>
                            <div className="w-full text-center px-10">
                                <p className="text-sm md:text-xl py-5">
                                Отслеживайте эффективность каждого партнера и 
                                автоматизируйте расчеты с учетом 
                                индивидуальных условий.</p>                                
                            </div>
                            <div className="flex justify-center py-4">
                                <Link href="/signup">
                                    <a className="text-white bg-pink-600 hover:bg-pink-700 py-3 px-10 rounded text-2xl font-bold">
                                        Начать
                                    </a>
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </Disclosure>

            <Faq />
            
            <style global jsx>{`
                .step:after {
                    position: absolute;
                    content: '';
                    background-color: #db277712;
                    width: 70px;
                    height: 70px;
                    border-radius: 50em;
                    margin-top: -20px;
                    margin-left: -40px;
                    filter: blur(5px);
                }
                .step:before {
                    position: absolute;
                    content: "»";
                    color: #e2bfd0;
                    font-size: 71px;
                    padding-left: 46px;
                    padding-top: 19px;
                    background-color: #b1adaf12;
                    width: 90px;
                    height: 90px;
                    border-radius: 50em;
                    margin-top: -8px;
                    margin-left: 26px;
                    filter: blur(2px);
                }
            `}</style>
        </IndexLayout>
    )
}
