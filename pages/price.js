import Link from 'next/link'
import React, { useState, useCallback, useEffect } from 'react'
import SmoothScroll from 'smooth-scroll/dist/smooth-scroll'
import { ImCreditCard } from 'react-icons/im'
import { Disclosure } from '@headlessui/react'
import { IndexLayout } from '../components/layout/IndexLayout'
import { FooterAction } from '../components/block/partner/FooterAction'
import { GoCheck } from 'react-icons/go'
import CountUp from 'react-countup'
import Moment from 'react-moment';
import moment from 'moment'


export default function Price() 
{
    const Title = 'Таблица цен'
    const Description = 'Платформа `Shop Me`, расценки и прайс-лист.'
    const [price, setPrice] = useState(true)
    const [plan, setPlan] = useState('')
    const [user, setUser] = useState('')
    const [pay, setPay] = useState('')
    const Check = <GoCheck className="w-5 h-5 mr-2 font-semibold leading-7 text-pink-600 sm:h-5 sm:w-5 md:h-6 md:w-6" />
    const datetime  = (new Date()).toLocaleDateString('ru-RU', { year: 'numeric', month: 'numeric', day: 'numeric' })
    const transaction = new Date().getTime()
    const months_date = moment(datetime, "DD-MM-YYYY").add(1, 'months').calendar()
    const years_date  = moment(datetime, "DD-MM-YYYY").add(1, 'years').calendar()


    const currency = (e) => {
        if(e === 'EUR') return '€';
        else if(e === 'USD') return '$'
        else return '₽'
    }

    useEffect(() => {
        const scroll = new SmoothScroll('a[href*="#"]', {
            speed: 1000,
            speedAsDuration: true,
            updateURL: false
        })
    }, [])

    const fakerUser = useCallback( async () => {
        const requestOptions = {
            method: 'GET'
        }
        try {
            const response = await fetch("https://randomuser.me/api/", requestOptions)
            const payment = await fetch("https://random-data-api.com/api/stripe/random_stripe", requestOptions)
            
            const data = await response.json()
            const buy = await payment.json()

            setUser(data.results[0])
            setPay(buy)
        } catch (e) {
            console.log('error', e)
        }
    }, [])

    const create = () => user === '' ? fakerUser() : ''
    create()


    return (
        <IndexLayout title={Title} description={Description}>
            <Disclosure as="section" id="learn_more" className="bg-gray-50 py-6 px-4 md:px-0 md:py-20">
                <div className="max-w-6xl mx-auto px-4 sm:px-6 md:px-6 lg:px-8">
                    {plan ?
                        <div className="table w-full my-20">
                            <div className="">
                                <h2 className="font-extrabold text-3xl mb-8">Просмотрите заказ</h2>
                            </div>
                            <div className="grid grid-cols-2 gap-10">
                                <div className="p-8 rounded shadow-lg bg-white flex flex-col border-t-4 border-indigo-600">
                                    <p className="font-medium text-xl mb-5">Счет: #{transaction}</p>
                                    <div className="text-gray-500 cursor-pointer no-underline hover:underline" onClick={() => setPlan('')}>
                                        {/* Choose another plan */}
                                        Выбрать другой план
                                    </div>  
                                    <div className="font-extrabold text-3xl mb-8 text-pink-600">Тариф: {plan.plan}</div>
                                    {user ? 
                                        <div className="flex space-x-4 items-center rounded bg-gray-50 px-6 py-4">
                                            <div>
                                                <img 
                                                    src={user.picture.medium} 
                                                    className="rounded-full w-16 h-16 object-cover border-2 border-pink-600"
                                                    alt={`${user.name.first} ${user.name.last}`}
                                                />
                                            </div>
                                            <div>
                                                <div className="flex flex-col">
                                                    <div className="font-bold text-xl">{`${user.name.first} ${user.name.last}`}</div>
                                                    <div className="text-gray-400 text-sm">Персональный аккаунт</div>
                                                    <div className="text-gray-400 text-sm underline">{user.email}</div>
                                                </div>
                                            </div>
                                        </div>
                                    : 'Loading...'}
                                </div>

                                <div className="p-8 rounded shadow-lg bg-white border-t-4 border-green-400">
                                    <p className="font-bold text-xl mb-5">Итог заказа</p>
                                    <div className="flex justify-between">
                                        <div>
                                            <p className="font-medium text-lп mb-3">Общее количество</p>
                                        </div>
                                        <div>
                                            {plan.price}.00 
                                            {currency(plan.currency)}{` / `}
                                            {plan.duration === 1 ? 'месяц' : 'год'}
                                        </div>
                                    </div>

                                    <div className="bg-indigo-100 px-6 py-2 rounded text-indigo-500">
                                        <p className="font-bold text-lg">Сегодня</p>
                                        <div className="flex items-center space-x-2 text-sm">
                                            <div>Рассчитано на</div>
                                            <div className="flex text-sm">
                                                {datetime}&#160;-&#160;
                                                <Moment date={plan.duration == 12 ? years_date : months_date} format="DD.MM.YYYY" />
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <p className="font-medium text-lп mt-3">
                                            Платежная информация:
                                        </p>
                                        <div className="flex bg-green-50 px-6 py-4">
                                            <ImCreditCard className="text-5xl mr-4 text-green-300" />
                                            <div>
                                                <div className="flex space-x-1 items-center">
                                                    <div>Card:&#160;</div>
                                                    <div className="mt-1.5">{' **** **** **** '}</div> 
                                                    <small>
                                                        {parseInt(pay.valid_card).toString().replace(/\B(?=(\d{4})+(?!\d))/g, " ").substr(15)}
                                                    </small>
                                                </div>
                                                <p className="text-green-500">
                                                    <small>validity: {pay.month}/{pay.year.substr(2)}</small>
                                                </p>                                                
                                            </div>
                                        </div>
                                        
                                        <p className="text-xs text-gray-400 text-center my-4">
                                            Нажимая «Завершить заказ», вы соглашаетесь с 
                                            &#160;<a href="#" className="text-gray-500 no-underline hover:underline">Условия использования торговой площадки</a>, 
                                            &#160;<a href="#" className="text-gray-500 no-underline hover:underline">Условия предоставления услуг</a> и 
                                            &#160;<a href="#" className="text-gray-500 no-underline hover:underline">Политика конфиденциальности</a>.
                                        </p>
                                        <Link href={`?amout=${pay.uid}`}>
                                            <a className="w-full whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border rounded-md shadow-sm text-base font-medium text-white bg-pink-600 hover:bg-pink-700">
                                                Завершить заказ
                                            </a>                                            
                                        </Link>
                                        <p className="text-xs text-gray-600 text-center mt-2">
                                            Далее: Разрешите ShopMe получить доступ к вашей учетной записи.
                                        </p>
                                    </div>
                                </div>                                 
                            </div>
                        </div> : 
                    <>
                        <div className="flex flex-col text-center space-y-5 leading-7 my-10 text-gray-500">
                            <div className="flex justify-center"></div>
                            <h2 className="mb-0 text-3xl font-semibold leading-tight tracking-tight text-black sm:text-4xl md:text-5xl">
                                <span className="text-pink-600 text-6xl block">
                                    {'Простое,'}
                                </span>
                                {'Прозрачное ценообразование'}
                            </h2>
                            <p className="mt-1 text-base text-gray-400 md:text-lg">
                                Цены соответствуют потребностям компании любого размера.
                            </p>
                            <div className="flex justify-center">
                                <div className="flex space-x-2">
                                    <div className={`cursor-pointer rounded px-6 ${price ? 'bg-pink-600 text-white' : 'bg-gray-200 shadow-inner'}`} onClick={() => setPrice(true)}>На месяц</div>
                                    <div className={`cursor-pointer rounded px-6 ${price ? 'bg-gray-200 shadow-inner' : 'bg-pink-600 text-white'}`} onClick={() => setPrice(false)}>На год</div>
                                </div>
                            </div>
                        </div>
                        <div className="grid grid-cols-1 gap-4 mt-4 leading-7 text-gray-900 border-0 border-gray-200 sm:mt-6 sm:gap-6 md:mt-8 md:gap-0 lg:grid-cols-3">
                            
                            <div className="relative z-10 flex flex-col items-center max-w-md p-4 mx-auto my-0 border border-solid rounded-lg lg:-mr-3 sm:my-0 sm:p-6 md:my-8 md:p-8">
                                <h3 className="m-0 text-2xl font-semibold leading-tight tracking-tight text-gray-500 border-0 border-gray-200 sm:text-3xl md:text-4xl">
                                    Free
                                </h3>
                                <div className="flex items-end mt-6 leading-7 text-gray-300 border-0 border-gray-200">
                                    <p className="box-border m-0 text-6xl font-semibold leading-none border-solid">
                                        €0
                                    </p>
                                    <p className="box-border m-0 border-solid">
                                        / {price ? 'в месяц' : 'в год'}
                                    </p>
                                </div>
                                <p className="mt-6 mb-5 text-sm leading-normal text-center text-gray-900 border-0 border-gray-200">
                                    Идеально подходит для стартапов и небольших компаний
                                </p>
                                <ul className="flex-1 p-0 mt-4 ml-5 leading-7 text-gray-900 border-0 border-gray-200">
                                    <li className="inline-flex text-gray-500 items-center w-full mb-2 ml-5 font-semibold text-left border-solid">
                                        {Check}
                                        Automated Reporting
                                    </li>
                                    <li className="inline-flex text-gray-500 items-center w-full mb-2 ml-5 font-semibold text-left border-solid">
                                        {Check}
                                        Faster Processing
                                    </li>
                                    <li className="inline-flex text-gray-500 items-center w-full mb-2 ml-5 font-semibold text-left border-solid">
                                        {Check}
                                        Customizations
                                    </li>
                                </ul>
                                <a 
                                    data-scroll 
                                    href="#learn_more" 
                                    onClick={() => setPlan({
                                        price: 0,
                                        currency: 'EUR',
                                        duration: price ? 1 : 12,
                                        client: 'Guest',
                                        plan: 'Free'
                                    })}
                                    className="inline-flex justify-center w-full px-4 py-3 mt-8 font-sans text-sm leading-none text-center text-gray-600 no-underline bg-transparent border border-gray-600 rounded-md cursor-pointer hover:bg-gray-700 hover:border-gray-700 hover:text-white focus-within:bg-gray-700 focus-within:border-gray-700 focus-within:text-white sm:text-base md:text-lg"
                                >
                                    Выбрать Free
                                </a>
                            </div>
                            
                            <div className="relative z-20 flex flex-col items-center max-w-md p-4 mx-auto my-0 bg-white shadow-lg border-4 border-pink-600 border-solid rounded-lg sm:p-6 md:px-8 md:py-16">
                                <h3 className="m-0 text-2xl font-semibold leading-tight tracking-tight text-pink-600 border-0 border-gray-200 sm:text-3xl md:text-4xl">
                                    Basic
                                </h3>
                                <div className="flex items-end mt-6 leading-7 text-gray-900 border-0 border-gray-200">
                                    <p className="box-border m-0 text-6xl font-semibold leading-none border-solid">
                                        €{price ?
                                            <CountUp
                                                end={15} 
                                                duration={1}
                                                separator=","
                                            /> :
                                            <CountUp
                                                end={15*12} 
                                                duration={2}
                                                separator=","
                                            />
                                        }
                                    </p>
                                    <p className="box-border m-0 border-solid" style={{borderImage: 'initial'}}>
                                        / {price ? 'в месяц' : 'в год'}
                                    </p>
                                </div>
                                <p className="mt-6 mb-5 text-sm leading-normal text-center text-gray-900 border-0 border-gray-200">
                                    Идеально подходит для предприятий среднего и крупного бизнеса
                                </p>
                                <ul className="flex-1 p-0 mt-4 leading-7 text-gray-900 border-0 border-gray-200">
                                    <li className="inline-flex items-center w-full mb-2 ml-5 font-semibold text-left border-solid">
                                        {Check}
                                        Everything in Starter
                                    </li>
                                    <li className="inline-flex items-center w-full mb-2 ml-5 font-semibold text-left border-solid">
                                        {Check}
                                        100 Builds
                                    </li>
                                    <li className="inline-flex items-center w-full mb-2 ml-5 font-semibold text-left border-solid">
                                        {Check}
                                        Progress Reports
                                    </li>
                                    <li className="inline-flex items-center w-full mb-2 ml-5 font-semibold text-left border-solid">
                                        {Check}
                                        Premium Support
                                    </li>
                                </ul>
                                <a 
                                    data-scroll 
                                    href="#learn_more" 
                                    onClick={() => setPlan({
                                        price: price ? 15 : 15*12,
                                        currency: 'EUR',
                                        duration: price ? 1 : 12,
                                        client: 'Guest',
                                        plan: 'Basic'
                                    })}
                                    className="inline-flex justify-center w-full px-4 py-3 mt-8 font-sans text-sm leading-none text-center text-white no-underline bg-pink-600 border rounded-md cursor-pointer hover:bg-pink-700 hover:border-pink-700 hover:text-white focus-within:bg-pink-700 focus-within:border-pink-700 focus-within:text-white sm:text-base md:text-lg"
                                >
                                    Выбрать Basic
                                </a>
                            </div>
                            
                            <div className="relative z-10 flex flex-col items-center max-w-md p-4 mx-auto my-0 border border-indigo-600 bg-white rounded-lg lg:-ml-3 sm:my-0 sm:p-6 md:my-8 md:p-8">
                                <h3 className="m-0 text-2xl font-semibold leading-tight tracking-tight text-indigo-500 border-0 border-gray-200 sm:text-3xl md:text-4xl">
                                    Plus
                                </h3>
                                <div className="flex items-end mt-6 leading-7 text-gray-900 border-0 border-gray-200">
                                    <p className="box-border m-0 text-6xl font-semibold leading-none border-solid">
                                        €{price ? 
                                            <CountUp
                                                end={25} 
                                                duration={1}
                                                separator=","
                                            /> :
                                            <CountUp
                                                end={25*12-80} 
                                                duration={2}
                                                separator=","
                                            />
                                    }
                                    </p>
                                    <p className="box-border m-0 border-solid" style={{borderImage: 'initial'}}>
                                        / {price ? 'в месяц' : 'в год'}
                                    </p>
                                </div>
                                <p className="mt-6 mb-5 text-sm leading-normal text-center text-gray-900 border-0 border-gray-200">
                                    Идеально подходит для крупных и корпоративных компаний
                                </p>
                                <ul className="flex-1 p-0 mt-4 leading-7 text-gray-900 border-0 border-gray-200">
                                    <li className="inline-flex items-center w-full mb-2 ml-5 font-semibold text-left border-solid">
                                        {Check}
                                        Everything in Basic
                                    </li>
                                    <li className="inline-flex items-center w-full mb-2 ml-5 font-semibold text-left border-solid">
                                        {Check}
                                        Unlimited Builds
                                    </li>
                                    <li className="inline-flex items-center w-full mb-2 ml-5 font-semibold text-left border-solid">
                                        {Check}
                                        Advanced Analytics
                                    </li>
                                    <li className="inline-flex items-center w-full mb-2 ml-5 font-semibold text-left border-solid">
                                        {Check}
                                        Company Evaluations
                                    </li>
                                </ul>
                                <a 
                                    data-scroll 
                                    href="#learn_more" 
                                    onClick={() => setPlan({
                                        price: price ? 25 : 25*12-80,
                                        currency: 'EUR',
                                        duration: price ? 1 : 12,
                                        client: 'Guest',
                                        plan: 'Plus'
                                    })}
                                    className="inline-flex justify-center w-full px-4 py-3 mt-8 font-sans text-sm leading-none text-center text-indigo-500 no-underline bg-transparent border border-indigo-500 rounded-md cursor-pointer hover:bg-indigo-700 hover:border-indigo-700 hover:text-white focus-within:bg-indigo-700 focus-within:border-indigo-700 focus-within:text-white sm:text-base md:text-lg"
                                >
                                    Выбрать Plus
                                </a>
                            </div>
                        </div>
                    </>}
                </div>
            </Disclosure>
            <FooterAction />
        </IndexLayout>
    )
}
