import React from 'react'
import Link from 'next/link'
import { FaPen, FaTimes } from 'react-icons/fa'
import { PriceFormat } from '../../helper/digital/PriceFormat'
import { GetCard } from './GetCard'

export function CardGridProduct({list = [], dropdown = []}) 
{
    return (
        <div className="table w-full mt-4">
            <div className="grid grid-cols-3 gap-6">
                {list.map((item, index) => (
                <GetCard margin="m-0" key={index}>
                    <div className="grid">
                        <Link href="/dashboard/product/[href]" as={`/dashboard/product/${item.href}`}>
                            <a>
                                <img 
                                    src={item.image} 
                                    alt={item.title}
                                    className="w-full" 
                                />
                                <h3 className="text-2xl font-bold py-4 text-gray-900 dark:text-gray-50">{item.title}</h3>
                            </a>
                        </Link>
                        <div>
                            <div className="flex items-center justify-between nav-in">
                                <p className="bg-white text-gray-600 dark:text-gray-400 dark:bg-gray-900">Type:</p>
                                <p className="bg-white text-gray-400 dark:text-gray-500 dark:bg-gray-900">{item.type}</p>
                            </div>
                            <div className="flex items-center justify-between nav-in">
                                <p className="bg-white text-gray-600 dark:text-gray-400 dark:bg-gray-900">Vendor:</p>
                                <p className="bg-white text-gray-400 dark:text-gray-500 dark:bg-gray-900">{item.vendor.name}</p>
                            </div>
                            <div className="flex items-center justify-between nav-in">
                                <p className="bg-white text-gray-600 dark:text-gray-400 dark:bg-gray-900">Stocks:</p>
                                <p className="bg-white text-gray-400 dark:text-gray-500 dark:bg-gray-900">{item.stocks === true ? 'yes' : 'no'}</p>
                            </div>
                            <div className="flex items-center justify-between nav-in">
                                <p className="bg-white text-gray-600 dark:text-gray-400 dark:bg-gray-900">Quantity:</p>
                                <p className="bg-white text-gray-500 dark:text-gray-500 dark:bg-gray-900">{item.quantity} шт.</p>
                            </div>
                            <div className="flex items-center justify-between py-3 mb-4">
                                <small className="bg-indigo-50 text-indigo-500 dark:text-indigo-100 dark:bg-purple-900 px-4 py-1 rounded-md font-medium">
                                    #{item.SKU}
                                </small>
                                <span className="bg-green-50 text-green-600 dark:text-green-100 text-xl dark:bg-green-900 px-4 py-1 rounded-md font-bold">
                                    {PriceFormat(item.price)} ₽
                                </span>                            
                            </div>

                        </div>
                        <div className="flex items-center justify-between mt-3 pt-3 space-x-4 border-t border-gray-50 dark:border-gray-800">
                            <div className="flex justify-center w-full cursor-pointer items-center space-x-2 font-semibold px-5 py-2 rounded-md bg-white dark:bg-gray-800 text-gray-500 dark:text-gray-100 border border-gray-200 dark:border-gray-800">
                                <FaPen className="w-3 h-3 text-gray-500" /> 
                                <span>Edit</span>
                            </div>
                            <div className="flex justify-center w-full cursor-pointer items-center space-x-2 px-5 py-2 rounded-md bg-pink-600 text-white">
                                <FaTimes className="w-3 h-3" /> 
                                <span>Delete</span>
                            </div>
                        </div>
                    </div>
                </GetCard>
                ))}
            </div>            
        </div>
    )
}
