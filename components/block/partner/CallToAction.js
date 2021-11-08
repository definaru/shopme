import React, { useContext } from 'react'
import Link from 'next/link'
import { Disclosure } from '@headlessui/react'
import { ShopContext } from '../../context/ShopContext'

export function CallToAction() 
{
    const {web} = useContext(ShopContext)

    return (
        <Disclosure as="section" className="bg-white py-20 md:py-40">
            <div className="max-w-5xl mx-auto px-4 sm:px-6">
                <div className="grid gap-7 text-center">
                    <p className="font-medium text-gray-500 text-md">
                        ХОТИТЕ СОТРУДНИЧАТЬ С НАМИ?
                    </p>
                    <h2 className="text-5xl font-bold text-black">
                        Присоединяйтесь к партнерской экосистеме {web.company} сегодня
                    </h2>
                    <div className="flex justify-center">
                        <Link href="/signup">
                            <a className="table mt-4 shadow-sm font-bold uppercase hover:shadow-lg px-10 py-4 rounded-full hover:text-gray-900 hover:bg-gray-50 text-pink-50 bg-pink-600">
                                Стать партнером
                            </a>
                        </Link>                        
                    </div>
                </div>
            </div>            
        </Disclosure>
    )
}
