import React from 'react'
import Link from 'next/link'
import { useRouter } from 'next/router'
import { MainLayout } from '../../../components/layout/MainLayout'
import { ProductData } from '../../../components/data/ProductData'
import { MdContentCopy } from 'react-icons/md'
import { FaEye } from 'react-icons/fa'
import { ProductInformation } from '../../../components/block/product/details/ProductInformation'
import { Pricing } from '../../../components/block/product/details/Pricing'
import { BreadCrumbs } from '../../../components/ui/page/BreadCrumbs'
import { ArrowPanel } from '../../../components/ui/page/ArrowPanel'


export default function DetailProduct() 
{
    const router = useRouter()
    const { href } = router.query
    const detailProduct = href ? ProductData().filter(name => name.href.includes(href))[0] : {} 
    const { id, image, title, type, vendor, stocks, SKU, price, quantity, variants } = detailProduct
    const Title = title
    const variable = [
        {href: '/dashboard/product', name: 'Products'}
    ]

    return (
        <MainLayout title={Title}>
            <div className="w-full block mt-5">
                <div className="max-w-6xl mx-auto">
                    <BreadCrumbs home={true} links={variable} end="Product details" />
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
                        <ArrowPanel />
                    </div>
                    <div className="grid grid-cols-12 gap-5">
                        <div className="col-span-8">
                            <ProductInformation 
                                details={detailProduct} 
                            />
                        </div>
                        <div className="col-span-4">
                            <Pricing details={detailProduct} />
                        </div>
                    </div>
                </div>                   
            </div>
        </MainLayout>
    )
}
