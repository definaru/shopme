import React from 'react'
import { Disclosure } from '@headlessui/react'
import { IndexLayout } from '../components/layout/IndexLayout'

export default function News() 
{
    const Title = 'Новости'
    const Description = 'Расскажем, что нового на платформе `Shop Me`.'

    return (
        <IndexLayout title={Title} description={Description}>
            <Disclosure as="section" className="bg-pink-600 py-6 px-4 md:px-0 md:py-20">
                <div className="max-w-6xl mx-auto md:px-4 sm:px-6 md:mt-20 mt-10">
                    <div className="flex justify-center">
                        <div className="grid gap-4 text-center text-white">
                            <h2 className="text-3xl md:text-6xl font-extrabold mb-3">
                                {Title}
                            </h2>
                            <p className="text-xl">{Description}</p>
                        </div>
                    </div>
                </div>
            </Disclosure>
            <Disclosure as="section" className="bg-gray-50 py-6 px-4 md:px-0 md:py-20">
                <div className="max-w-6xl mx-auto md:px-4 sm:px-6 my-10">
                    <div className="grid md:grid-cols-3 grid-cols-1 gap-4">
                        <div className="grid shadow-none hover:shadow-lg rounded-lg">
                            <a href="#_" className="block">
                                <img 
                                    className="object-cover w-full overflow-hidden rounded-t-lg shadow-sm max-h-56" 
                                    src="https://dizz.in.ua/wp-content/uploads/2019/12/Veb-dizayn-trendyi-2020.png" 
                                />
                            </a>
                            <div className="grid gap-3 p-6 bg-white rounded-b-lg">
                                <div>
                                    <div className="bg-purple-500 table px-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white">
                                        <span>Updates</span>
                                    </div>                                    
                                </div>
                                <a href="#_" className="text-lg font-bold sm:text-xl md:text-2xl text-gray-900 hover:text-pink-600">
                                    Dark mode design output.
                                </a>
                                <p className="text-sm text-gray-600">Learn the attributes you need to gain in order to build a future and create a life that you are truly happy with.</p>
                                <p className="pt-2 text-xs font-medium text-gray-500">
                                    <a href="#_" className="mr-1 underline">Mary Jane</a> · 
                                    <span className="mx-1">April 17, 2021</span> · 
                                    <span className="mx-1 text-gray-600">3 min. read</span>
                                </p>                                    
                            </div>
                        </div> 
                    </div>
                </div>
            </Disclosure>
        </IndexLayout>
    )
}
