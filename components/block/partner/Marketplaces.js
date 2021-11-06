import React from 'react'
import Link from 'next/link'
import { Disclosure } from '@headlessui/react'
import { FaCheckCircle } from 'react-icons/fa'
import { DataMarketplaces } from '../../data/DataMarketplaces'


export function Marketplaces() 
{

    return (
        <>
        {DataMarketplaces().map((block, index) => (
        <Disclosure key={index} as="section" className="bg-gray-50 py-10 md:py-20 -mt-1 border-t border-gray-100">
            <div className="max-w-6xl mx-auto px-4 sm:px-6">
                <div className="grid">
                    <div className="grid gap-7 grid-cols-2 pb-10 border-b border-gray-100">
                        <div  className="grid gap-7">
                            <h2 className="text-left text-4xl font-bold">
                                {block.head}
                            </h2>
                            <p className="text-gray-600 text-base">{block.description}</p>                            
                        </div>
                        <div>
                            <p className="grid gap-1 bg-white rounded-lg shadow-sm px-12 py-5">
                                <strong>Примечание:</strong> 
                                <div className="flex items-center justify-start space-x-3">
                                    <span>Галочка обозначает прямую интеграцию.</span> 
                                    <FaCheckCircle className="text-green-500 w-5 h-5" />                                
                                </div>
                            </p>                            
                        </div>
                    </div>
                    <div className="grid grid-cols-1 md:grid-cols-4 gap-5 md:gap-6 py-16">
                        {block.app.map((item, i) => (
                            <div key={i} className="block mb-8">
                                <Link href={item.href}>
                                    <a className="flex group">
                                        <div className="relative">
                                            <FaCheckCircle className="ml-2 absolute -top-2 -right-2 bg-white rounded-full text-green-500 w-6 h-6" />
                                            <div className="w-20 h-20 shadow-md rounded-md overflow-hidden flex items-center">
                                                <img 
                                                    src={item.image} 
                                                    alt={item.header}
                                                    className="w-full object-cover object-center" 
                                                />  
                                            </div>
                                        </div>
                                        <div className="pl-6">
                                            <h3 className="text-xl font-extrabold block text-gray-900 group-hover:text-red-500">
                                                {item.header}
                                            </h3>
                                            <p className="text-sm text-gray-500">
                                                {item.text}
                                            </p>
                                        </div>
                                    </a>
                                </Link>
                            </div>                            
                        ))}
                    </div>
                </div>
            </div>            
        </Disclosure>            
        ))}
        </>
    )
}
