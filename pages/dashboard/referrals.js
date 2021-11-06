import React from 'react'
import { AiOutlineInfoCircle } from 'react-icons/ai'
import { FiTrendingDown, FiTrendingUp } from 'react-icons/fi'
import { MainLayout } from '../../components/layout/MainLayout'
import { Country } from '../../components/ui/card/Country'
import { GetCard } from '../../components/ui/card/GetCard'
import { Calendar } from '../../components/ui/datetime/Calendar'
import { BreadCrumbs } from '../../components/ui/page/BreadCrumbs'
import { HeadPanel } from '../../components/ui/page/HeadPanel'
import { RefferalLink } from '../../components/widget/RefferalLink'


export default function Referrals() 
{
    const Title = 'Рефферальная программа'
    const result = [
        {
            image: '/access/img/page/refferal/click.svg',
            header: 'NUMBER OF REFERRALS',
            value: '150',
            change: '12',
            last_week: '25'
        },
        {
            image: '/access/img/page/refferal/presenting.svg',
            header: 'AMOUNT EARNED',
            value: '$7,253.00',
            change: '5.6',
            last_week: '$582.00'
        },
        {
            image: '/access/img/page/refferal/hi-five.svg',
            header: 'REFERRAL COMPLETED',
            value: '25',
            change: '2.3',
            last_week: '7'
        }
    ]
    const country = [
        {
            image: 'https://htmlstream.com/front-dashboard/assets/vendor/flag-icon-css/flags/1x1/us.svg',
            name: 'United States',
            price: '4302'
        },
        {
            image: 'https://htmlstream.com/front-dashboard/assets/vendor/flag-icon-css/flags/1x1/de.svg',
            name: 'Germany',
            price: '1951'
        },
        {
            image: 'https://htmlstream.com/front-dashboard/assets/vendor/flag-icon-css/flags/1x1/fr.svg',
            name: 'France',
            price: '592'
        },
        {
            image: 'https://htmlstream.com/front-dashboard/assets/vendor/flag-icon-css/flags/1x1/ca.svg',
            name: 'Canada',
            price: '219'
        },
        {
            image: 'https://htmlstream.com/front-dashboard/assets/vendor/flag-icon-css/flags/1x1/it.svg',
            name: 'Italy',
            price: '191'
        },
    ]

    return (
        <MainLayout title={`${Title} | ShopMe`}>
            <div className="w-full block mt-5">
                <div className="max-w-6xl mx-auto">
                    <BreadCrumbs home={true} end={Title} />
                    <HeadPanel title={Title} widget={<RefferalLink />} />
                </div>   

                <div className="max-w-6xl mx-auto bg-white dark:bg-gray-900 rounded shadow">
                    <div className="grid grid-cols-3">
                        {result.map((item, i) => (
                           <div key={i} className={`text-center ${i === 0 ? '' : 'border-l border-gray-100 dark:border-black'}`}>
                                <div className="h-40 py-5 grid place-content-center">
                                    <img src={item.image} alt={item.header} className="w-full px-32" />
                                </div>
                                <div className="font-bold uppercase text-gray-600 dark:text-gray-400">
                                    {item.header}
                                </div>
                                <div className="font-semibold text-3xl text-gray-900 dark:text-gray-100">
                                    {item.value}
                                </div>
                                <div className="grid grid-cols-2 my-5 text-gray-600 dark:text-gray-400">
                                    <div className="mt-1 px-4 text-right border-r border-gray-100 dark:border-gray-800">
                                        <div className="flex flex-col">
                                            <p className="font-bold text-gray-700 dark:text-white">
                                                <div className={`table float-right px-2 py-0 rounded 
                                                ${item.change > 4 ? 
                                                'bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-300' : 
                                                'bg-red-100 dark:bg-red-900 text-red-600 dark:text-red-300'}`}>
                                                    <small className="flex justify-end items-center gap-1">
                                                        {item.change > 4 ? <FiTrendingUp /> : <FiTrendingDown />}
                                                        <span>{item.change}%</span>                                                
                                                    </small>
                                                </div> 
                                            </p>
                                            <p className="clear-both">change</p>                                            
                                        </div>
                                    </div>
                                    <div className="px-4 text-left">
                                        <p className="font-bold text-gray-700 dark:text-white">{item.last_week}</p>
                                        <p>last week</p>
                                    </div>
                                </div>
                                <div></div>
                           </div> 
                        ))}
                    </div>
                </div>

                <div className="max-w-6xl mx-auto border-t border-gray-100 dark:border-gray-800 mt-5">
                    <h2 className="flex items-center space-x-2 text-gray-600 dark:text-gray-200 py-5">
                        <AiOutlineInfoCircle /> 
                        <span>Last referral: August 25, 2020.</span>
                    </h2>

                    <div className="grid grid-cols-12 md:gap-5 gap-0">
                        <div className="col-span-8">
                            <GetCard 
                                header="Total sales earnings" 
                                headstyle='px-4 py-3'
                                headWidget={<Calendar />}
                            >
                                ...
                            </GetCard>
                        </div>
                        <div className="col-span-4">
                            <GetCard 
                                header="Your top countries" 
                                headstyle='px-4 py-3'
                                headWidget={
                                <div className="-mr-3">
                                    <a href="#" className="text-xs px-3 py-2 rounded text-gray-900 dark:text-gray-50 bg-gray-100 dark:bg-gray-900 dark:hover:bg-gray-800">
                                        Смотреть всё
                                    </a>
                                </div>} 
                                style="px-4 pb-4"
                            >
                                <Country list={country} />
                            </GetCard>
                        </div>
                    </div>
                </div>
                
                         
            </div>            
        </MainLayout>
    )
}
