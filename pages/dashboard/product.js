import React, { useState } from 'react'
import Link from 'next/link'
import { MainLayout } from '../../components/layout/MainLayout'
import { PriceFormat } from '../../components/helper/digital/PriceFormat'
import { MdFileDownload, MdFileUpload, MdFilterList, MdDehaze, MdApps, MdMoreVert } from 'react-icons/md'
import { FiPlus } from 'react-icons/fi'
import { FiSearch } from 'react-icons/fi'
import { FaPen } from 'react-icons/fa'
import { DropdownMenu } from '../../components/ui/dropdown/DropdownMenu'
import { Table } from '../../components/ui/table/Table'
import { ProductData } from '../../components/data/ProductData'
import { TrashIcon, ArchiveIcon, RefreshIcon, XIcon } from '@heroicons/react/outline'


export default function Product() 
{
    const Title = 'Продукты'
    const Product = ProductData()
    const [tabs, setTabs] = useState('All products')
    const Menus = [
        {
            header: 'Delete',
            href: `/delete/`,
            icon: TrashIcon
        },
        {
            header: 'Archive',
            href: `/archive/`,
            icon: ArchiveIcon
        },
        {
            header: 'Upload',
            href: `/upload/`,
            icon: RefreshIcon
        },
        {
            header: 'Unpublish',
            href: `/unpublish/`,
            icon: XIcon
        }
    ]

    return (
        <MainLayout title={`${Title} | ShopMe`}>
            <div className="w-full block">
                <div className="flex items-center justify-between py-5 border-b border-gray-100 mb-5">
                    <div className="flex flex-col">
                        <h1 className="text-3xl font-bold text-gray-900">
                            {Title} 
                            <small className="bg-gray-200 text-gray-400 text-sm px-3 py-1 rounded ml-3">
                                72,031
                            </small>
                        </h1>
                        <div className="flex space-x-3 py-3">
                            <a href="#" className="flex items-center space-x-2 text-gray-500 hover:text-pink-600">
                                <MdFileDownload /><span>Export</span>
                            </a>
                            <a href="#" className="flex items-center space-x-2 text-gray-500 hover:text-pink-600">
                                <MdFileUpload /><span>Import</span>
                            </a>
                        </div>
                    </div>
                    <div>
                        <Link href="/dashboard/add">
                            <a className="table px-8 py-3 rounded bg-pink-600 hover:bg-pink-700 text-md text-yellow-50">
                                <div className="flex items-center gap-2 font-semibold">
                                    <FiPlus className="text-white w-5 h-5" />
                                    <span>Add product</span>
                                </div>
                            </a>
                        </Link>
                    </div>
                </div>
            </div> 
            <div className="w-full h-screen block">
                <div className="flex justify-between border-b">
                    <div className="flex">
                        {['All products', 'Archived', 'Publish', 'Unpublish'].map((item, i) => (
                            <div 
                                key={i} 
                                onClick={() => setTabs(item)}
                                className={`
                                    px-7 py-3 border-b-4 cursor-pointer 
                                    ${tabs === item ? 
                                        'border-pink-600 font-bold' : 
                                        'border-transparent hover:border-gray-200 font-medium'
                                    }
                                `}
                            >
                                {item}
                            </div>
                        ))}
                    </div>
                    <div className="flex">
                        <div className="px-4 py-1 flex items-center space-x-2 bg-white border border-gray-100 rounded-l-md">
                            <MdDehaze className="w-6 h-6" />
                        </div>
                        <div className="px-4 py-1 flex items-center space-x-2 bg-gray-50 border border-gray-100 rounded-r-md">
                            <MdApps className="w-6 h-6" />
                        </div>
                    </div>
                </div>
                <div className="grid bg-white rounded shadow-sm mt-5">
                    <div className="flex items-center justify-between px-4 py-3 border-b border-gray-50">
                        <div>
                            <div className="flex items-center px-2 py-2 rounded bg-white hover:bg-gray-100 focus:bg-gray-50">
                                <FiSearch className="opacity-25 mr-2" />
                                <input 
                                    type="search" 
                                    name="search" 
                                    placeholder="Search products..." 
                                    className="placeholder-gray-300 bg-transparent focus:outline-none text-sm"
                                />
                            </div>
                        </div>
                        <div className="flex space-x-2">
                            <div className="px-3 py-2 flex items-center space-x-2 bg-white border border-gray-50 rounded">
                                <MdFilterList className="w-6 h-6" />
                                <span>Filter</span>
                            </div>                        
                            <div className="px-3 py-2 flex items-center space-x-2 bg-white border border-gray-50 rounded">
                                <MdMoreVert className="w-6 h-6" />
                            </div>
                        </div>
                    </div>
                    <Table
                        thead={[
                            {name: 'Product'},
                            {name: 'Type'},
                            {name: 'Vendor'},
                            {name: 'Stocks'},
                            {name: 'SKU'},
                            {name: 'Price'},
                            {name: 'Quantity'},
                            {name: 'Variants'}
                        ]}
                    >
                        <tbody class="bg-white divide-y divide-gray-200">
                        {Product.map((item, index) => (
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
                                        <a className="flex items-center mr-5">
                                            <img 
                                                className="rounded w-10 h-10 object-cover" 
                                                src={item.image} 
                                                alt={item.title}
                                            />
                                            <div className="font-bold px-3">
                                                <h5 className="text-gray-500 hover:text-pink-600 text-sm mb-0">
                                                    {item.title}
                                                </h5>
                                            </div>
                                        </a>                                        
                                    </Link>
                                </td>
                                <td className="px-5 py-2 whitespace-nowrap text-sm text-gray-500">
                                    {item.type}
                                </td>
                                <td className="px-5 py-2 whitespace-nowrap text-sm text-gray-500">
                                    <a href={item.vendor.href} className="no-underline hover:underline text-pink-600 hover:text-gray-500">
                                        {item.vendor.name}
                                    </a>
                                </td>
                                <td className="px-5 py-2 whitespace-nowrap text-sm text-gray-500">
                                    <label class="switch">
                                        <input type="checkbox" defaultChecked={item.stocks} />
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                                <td className="px-5 py-2 whitespace-nowrap text-sm text-gray-500">
                                    <small className="bg-indigo-50 text-indigo-500 px-4 py-1 rounded-md font-medium">
                                        #{item.SKU}
                                    </small>
                                </td>
                                <td className="px-5 py-2 whitespace-nowrap text-sm text-gray-500">
                                    <span className="bg-green-100 text-green-600 px-4 py-1 rounded-md font-bold">
                                        {PriceFormat(item.price)} ₽
                                    </span>
                                </td>
                                <td className="px-5 py-2 whitespace-nowrap text-sm text-gray-500">
                                    {item.quantity}
                                </td>
                                <td className="px-5 py-2 whitespace-nowrap text-sm text-gray-500">
                                    {item.variants}
                                </td>
                                <td className="px-5 py-2 whitespace-nowrap text-sm text-gray-500">
                                    <div className="flex" role="group">
                                        <a className="flex items-center space-x-2 border border-r-0 rounded-l-md px-5 py-2 bg-white" href="/ecommerce-product-details.html">
                                            <FaPen className="w-3 h-3 text-gray-500" /> <span>Edit</span>
                                        </a>
                                        <DropdownMenu 
                                            options={<MdMoreVert className="w-6 h-6" />} 
                                            lists={Menus}
                                            link={item.id}
                                        />
                                    </div>
                                </td>
                            </tr>    
                        ))}
                        </tbody>
                    </Table>
                </div>
            </div>
        </MainLayout>
    )
}
