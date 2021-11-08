import React, { useState } from 'react'
import { Disclosure } from '@headlessui/react'
import { IndexLayout } from '../components/layout/IndexLayout'
import { FooterAction } from '../components/block/partner/FooterAction'
import { GoCheck } from 'react-icons/go'


export default function Price() 
{
    const Title = 'Таблица цен'
    const Description = 'Платформа `Shop Me`, расценки и прайс-лист.'
    const [price, setPrice] = useState(true)
    const Check = <GoCheck className="w-5 h-5 mr-2 font-semibold leading-7 text-pink-600 sm:h-5 sm:w-5 md:h-6 md:w-6" />

    return (
        <IndexLayout title={Title} description={Description}>
            <Disclosure as="section" className="bg-pink-600 py-6 px-4 md:px-0 md:py-20">
                <div className="max-w-6xl mx-auto md:px-4 sm:px-6 md:mt-20 mt-10">
                    <div className="flex flex-col">
                        <div className="flex justify-center">
                            <h2 className="text-2xl md:text-5xl text-white font-extrabold mb-3">
                                {Title}
                            </h2>
                        </div>
                    </div>
                </div>
            </Disclosure> 
            <Disclosure as="section" className="bg-gray-50 py-6 px-4 md:px-0 md:py-20">
                <div className="max-w-6xl mx-auto px-4 sm:px-6 md:px-6 lg:px-8">
                    <div className="flex flex-col text-center space-y-6 leading-7 mb-16">
                        <div className="flex justify-center">
                            <img 
                                src="/access/img/page/icon-price.png" 
                                className="w-16" 
                                alt={Title} 
                            />
                        </div>
                        <h2 className="m-0 text-3xl font-semibold leading-tight tracking-tight text-black sm:text-4xl md:text-5xl">
                            <span className="text-pink-600 text-6xl block">Простое,</span>прозрачное ценообразование
                        </h2>
                        <p className="mt-2 text-base text-gray-600 md:text-xl">
                            Цены соответствуют потребностям <br />компании любого размера.
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
                                    $0
                                </p>
                                <p className="box-border m-0 border-solid">
                                    / {price ? 'в месяц' : 'в год'}
                                </p>
                            </div>
                            <p className="mt-6 mb-5 text-sm leading-normal text-left text-gray-900 border-0 border-gray-200">
                                Ideal for Startups and Small Companies
                            </p>
                            <ul className="flex-1 p-0 mt-4 ml-5 leading-7 text-gray-900 border-0 border-gray-200">
                                <li className="inline-flex items-center w-full mb-2 ml-5 font-semibold text-left border-solid">
                                    {Check}
                                    Automated Reporting
                                </li>
                                <li className="inline-flex items-center w-full mb-2 ml-5 font-semibold text-left border-solid">
                                    {Check}
                                    Faster Processing
                                </li>
                                <li className="inline-flex items-center w-full mb-2 ml-5 font-semibold text-left border-solid">
                                    {Check}
                                    Customizations
                                </li>
                            </ul>
                            <button className="inline-flex justify-center w-full px-4 py-3 mt-8 font-sans text-sm leading-none text-center text-gray-600 no-underline bg-transparent border border-gray-600 rounded-md cursor-pointer hover:bg-gray-700 hover:border-gray-700 hover:text-white focus-within:bg-gray-700 focus-within:border-gray-700 focus-within:text-white sm:text-base md:text-lg">
                                Select Plan
                            </button>
                        </div>
                        
                        <div className="relative z-20 flex flex-col items-center max-w-md p-4 mx-auto my-0 bg-white shadow-lg border-4 border-pink-600 border-solid rounded-lg sm:p-6 md:px-8 md:py-16">
                            <h3 className="m-0 text-2xl font-semibold leading-tight tracking-tight text-pink-600 border-0 border-gray-200 sm:text-3xl md:text-4xl">
                                Basic
                            </h3>
                            <div className="flex items-end mt-6 leading-7 text-gray-900 border-0 border-gray-200">
                                <p className="box-border m-0 text-6xl font-semibold leading-none border-solid">
                                    ${price ? 15 : 15*12}
                                </p>
                                <p className="box-border m-0 border-solid" style={{borderImage: 'initial'}}>
                                    / {price ? 'в месяц' : 'в год'}
                                </p>
                            </div>
                            <p className="mt-6 mb-5 text-sm leading-normal text-center text-gray-900 border-0 border-gray-200">
                                Ideal for medium-size businesses to larger businesses
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
                            <button className="inline-flex justify-center w-full px-4 py-3 mt-8 font-sans text-sm leading-none text-center text-white no-underline bg-pink-600 border rounded-md cursor-pointer hover:bg-pink-700 hover:border-pink-700 hover:text-white focus-within:bg-pink-700 focus-within:border-pink-700 focus-within:text-white sm:text-base md:text-lg">
                                Select Plan
                            </button>
                        </div>
                        
                        <div className="relative z-10 flex flex-col items-center max-w-md p-4 mx-auto my-0 border bg-white rounded-lg lg:-ml-3 sm:my-0 sm:p-6 md:my-8 md:p-8">
                            <h3 className="m-0 text-2xl font-semibold leading-tight tracking-tight text-indigo-500 border-0 border-gray-200 sm:text-3xl md:text-4xl">
                                Plus
                            </h3>
                            <div className="flex items-end mt-6 leading-7 text-gray-900 border-0 border-gray-200">
                                <p className="box-border m-0 text-6xl font-semibold leading-none border-solid">
                                    ${price ? 25 : 25*12-80}
                                </p>
                                <p className="box-border m-0 border-solid" style={{borderImage: 'initial'}}>
                                    / {price ? 'в месяц' : 'в год'}
                                </p>
                            </div>
                            <p className="mt-6 mb-5 text-sm leading-normal text-left text-gray-900 border-0 border-gray-200">
                                Ideal for larger and enterprise companies
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
                            <button className="inline-flex justify-center w-full px-4 py-3 mt-8 font-sans text-sm leading-none text-center text-indigo-500 no-underline bg-transparent border border-indigo-500 rounded-md cursor-pointer hover:bg-indigo-700 hover:border-indigo-700 hover:text-white focus-within:bg-indigo-700 focus-within:border-indigo-700 focus-within:text-white sm:text-base md:text-lg">
                                Select Plan
                            </button>
                        </div>
                    </div>
                </div>
            </Disclosure>
            <FooterAction />
        </IndexLayout>
    )
}
