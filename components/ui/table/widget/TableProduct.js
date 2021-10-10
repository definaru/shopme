import React from 'react'
import Link from 'next/link'
import { MdMoreVert } from 'react-icons/md'
import { PriceFormat } from '../../../helper/digital/PriceFormat'
import { FaPen } from 'react-icons/fa'
import { DropdownMenu } from '../../dropdown/DropdownMenu'


export function TableProduct({list = [], dropdown = []}) 
{
    return (
        <tbody class="bg-white divide-y divide-gray-200">
        {list.map((item, index) => (
            <tr key={index} className="border-b border-gray-50 bg-transparent hover:bg-gray-50">
                <td className="px-5 py-2 whitespace-nowrap text-sm text-gray-500">
                    <label data-id={item.id}>
                        <input 
                            type="checkbox" 
                            className="form-tick appearance-none h-5 w-5 border border-gray-300 rounded-md checked:bg-pink-600 checked:border-transparent focus:outline-none" 
                        />
                    </label>
                </td>
                <td className="px-5 py-2 pl-0 whitespace-nowrap text-sm text-gray-600">
                    <Link href="/dashboard/product/[href]" as={`/dashboard/product/${item.href}`}>
                        <a className="flex items-center mr-20">
                            <img 
                                className="rounded w-10 h-10 object-cover" 
                                src={item.image} 
                                alt={item.title}
                            />
                            <div className="font-bold px-5">
                                <h5 className="text-gray-500 hover:text-pink-600 text-sm mb-0">
                                    {item.title}
                                </h5>
                            </div>
                        </a>                                        
                    </Link>
                </td>
                <td className="pl-5 pr-16 py-2 whitespace-nowrap text-sm text-gray-500">
                    {item.type}
                </td>
                <td className="pl-5 pr-16 py-2 whitespace-nowrap text-sm text-gray-500">
                    <a href={item.vendor.href} className="no-underline hover:underline text-pink-600 hover:text-gray-500">
                        {item.vendor.name}
                    </a>
                </td>
                <td className="pl-5 pr-16 py-2 whitespace-nowrap text-sm text-gray-500">
                    <label class="switch">
                        <input type="checkbox" defaultChecked={item.stocks} />
                        <span class="slider round"></span>
                    </label>
                </td>
                <td className="pl-5 pr-16 py-2 whitespace-nowrap text-sm text-gray-500">
                    <small className="bg-indigo-50 text-indigo-500 px-4 py-1 rounded-md font-medium">
                        #{item.SKU}
                    </small>
                </td>
                <td className="pl-5 pr-16 py-2 whitespace-nowrap text-sm text-gray-500">
                    <span className="bg-green-100 text-green-600 px-4 py-1 rounded-md font-bold">
                        {PriceFormat(item.price)} ₽
                    </span>
                </td>
                <td className="pl-5 pr-16 py-2 whitespace-nowrap text-sm text-gray-500">
                    {item.quantity}
                </td>
                <td className="pl-5 pr-16 py-2 whitespace-nowrap text-sm text-gray-500">
                    {item.variants}
                </td>
                <td className="px-5 py-2 whitespace-nowrap text-sm text-gray-500">
                    <div className="flex" role="group">
                        <Link href="/dashboard/product/[href]" as={`/dashboard/product/${item.href}`}>
                            <a className="flex items-center space-x-2 border border-r-0 rounded-l-md px-5 py-2 bg-white">
                                <FaPen className="w-3 h-3 text-gray-500" /> <span>Edit</span>
                            </a>
                        </Link>
                        <DropdownMenu 
                            options={<MdMoreVert className="w-6 h-6" />} 
                            lists={dropdown}
                            link={item.id}
                        />
                    </div>
                </td>
            </tr>    
        ))}
        </tbody>
    )
}
