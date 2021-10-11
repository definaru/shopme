import React, { useState } from 'react'
import Link from 'next/link'
import { MainLayout } from '../../components/layout/MainLayout'
import { MdFileDownload, MdFileUpload, MdFilterList, MdDehaze, MdApps, MdMoreVert } from 'react-icons/md'
import { FiPlus } from 'react-icons/fi'
import { FiSearch } from 'react-icons/fi'
import { Table } from '../../components/ui/table/Table'
import { ProductData } from '../../components/data/ProductData'
import { TrashIcon, ArchiveIcon, RefreshIcon, XIcon } from '@heroicons/react/outline'
import { TableProduct } from '../../components/ui/table/widget/TableProduct'
import { CardGridProduct } from '../../components/ui/card/CardGridProduct'


export default function Product() 
{
    const Title = 'Продукты'
    const Product = ProductData()
    const [tabs, setTabs] = useState('All products')
    const [design, setDesign] = useState('list')
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
            <div className="w-full h-full mb-40">
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
                <div className="w-full h-screen table">
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
                            <div onClick={() => setDesign('list')} className={`cursor-pointer px-4 py-1 flex items-center space-x-2 ${design === 'list' ? 'bg-white' : 'bg-gray-50'} border border-gray-100 rounded-l-md`}>
                                <MdDehaze className="w-6 h-6" />
                            </div>
                            <div onClick={() => setDesign('grid')} className={`cursor-pointer px-4 py-1 flex items-center space-x-2 ${design === 'grid' ? 'bg-white' : 'bg-gray-50'} border border-gray-100 rounded-r-md`}>
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
                                <div className="cursor-pointer px-3 py-2 flex items-center space-x-2 bg-white border border-gray-50 rounded">
                                    <MdFilterList className="w-6 h-6" />
                                    <span>Filter</span>
                                </div>                        
                                <div className="px-3 py-2 flex items-center space-x-2 bg-white border border-gray-50 rounded">
                                    <MdMoreVert className="w-6 h-6" />
                                </div>
                            </div>
                        </div>
                        {design === 'list' ?
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
                            <TableProduct list={Product} dropdown={Menus} />
                        </Table> : ''}
                    </div>
                    {design === 'grid' ? <CardGridProduct list={Product} dropdown={Menus} /> : ''}
                </div>                
            </div>
        </MainLayout>
    )
}
