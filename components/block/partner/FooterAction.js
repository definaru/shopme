import Link from 'next/link'
import React, { useContext } from 'react'
import { Disclosure } from '@headlessui/react'
import { ShopContext } from '../../context/ShopContext'

export function FooterAction() 
{
    const {web} = useContext(ShopContext)

    return (
        <Disclosure as="section" className="bg-pink-600 py-10 md:py-20 -mt-1 border-t border-gray-100">
            <div className="max-w-6xl mx-auto px-4 sm:px-6">
                <div className="flex justify-between items-center w-full">
                    <div className="grid gap-3 w-8/12">
                        <p className="text-pink-100 font-medium text-lg">Свяжитесь с {web.company}</p>
                        <h2 className="font-extrabold text-6xl text-white mb-4">Ищете полноценное решение?</h2>
                    </div>
                    <div className="w-4/12 flex justify-end">
                        <Link href="/become-partner">
                            <a className="table mt-4 shadow-sm font-bold uppercase hover:shadow-lg px-10 py-5 rounded-full text-gray-900 hover:bg-gray-900 hover:text-pink-50 bg-pink-50">
                                Запросить материал
                            </a>
                        </Link>  
                    </div>
                </div>
            </div>
        </Disclosure>
    )
}
