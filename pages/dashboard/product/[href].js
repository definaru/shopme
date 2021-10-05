import React from 'react'
import Link from 'next/link'
import { useRouter } from 'next/router'
import { MainLayout } from '../../../components/layout/MainLayout'
import { ProductData } from '../../../components/data/ProductData'
import { MdContentCopy } from 'react-icons/md'
import { ArrowNarrowLeftIcon, ArrowNarrowRightIcon } from '@heroicons/react/outline'
import { FaEye } from 'react-icons/fa'
import { ProductInformation } from '../../../components/block/product/details/ProductInformation'
import { Pricing } from '../../../components/block/product/details/Pricing'


export default function DetailProduct() 
{
    const router = useRouter()
    const { href } = router.query
    const detailProduct = ProductData().filter(name => name.href.includes(href))[0]
    const { id, image, title, type, vendor, stocks, SKU, price, quantity, variants } = detailProduct
    const Title = title

    return (
        <MainLayout title={Title}>
            <div className="w-full block">
                <div className="flex text-xs pt-5 pb-2 space-x-1">
                    <Link href="/dashboard/product">
                        <a className="no-underline hover:underline text-gray-500">Products</a>
                    </Link>
                    <span> / Product details</span>
                </div>
                <div className="flex items-center justify-between pb-5 border-b border-gray-100 mb-5">
                    <div className="flex flex-col">
                        <h1 className="text-3xl font-bold text-gray-900">
                            {title}
                        </h1>
                        <div className="flex space-x-3 py-3">
                            <a href="#" className="flex items-center space-x-2 text-gray-500 hover:text-pink-600">
                                <MdContentCopy /><span>Duplicate</span>
                            </a>
                            <a href="#" className="flex items-center space-x-2 text-gray-500 hover:text-pink-600">
                                <FaEye /><span>Preview</span>
                            </a>
                        </div>
                    </div>
                    <div className="flex items-center space-x-2">
                        <a 
                            href="#" 
                            className="group bg-gray-50 relative hover:bg-gray-100 rounded-full w-10 h-10 cursor-pointer grid place-items-center"
                            title="Предыдущий товар"
                        >
                            <ArrowNarrowLeftIcon className="w-5 h-5 flex-none text-gray-500 group-hover:text-pink-500" />
                        </a>
                        <a 
                            href="#" 
                            className="group bg-gray-50 relative hover:bg-gray-100 rounded-full w-10 h-10 cursor-pointer grid place-items-center"
                            title="Следующий товар"
                        >
                            <ArrowNarrowRightIcon className="w-5 h-5 flex-none text-gray-500 group-hover:text-pink-500" />
                        </a>
                    </div>
                </div>
                <div className="grid grid-cols-12 gap-5">
                    <div class="col-span-8">
                        <ProductInformation 
                            details={detailProduct} 
                        />
                    </div>
                    <div class="col-span-4">
                        <Pricing details={detailProduct} />
                    </div>
                </div>
            </div>            
        </MainLayout>
    )
}
