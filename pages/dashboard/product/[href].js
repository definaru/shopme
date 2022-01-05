import React, { useEffect } from 'react'
import { useRouter } from 'next/router'
import { MainLayout } from '../../../components/layout/MainLayout'
import { ProductData } from '../../../components/data/ProductData'
import { MdContentCopy } from 'react-icons/md'
import { FaEye } from 'react-icons/fa'
import { ProductInformation } from '../../../components/block/product/details/ProductInformation'
import { Variants } from '../../../components/block/product/details/Variants'
import { Pricing } from '../../../components/block/product/details/Pricing'
import { BreadCrumbs } from '../../../components/ui/page/BreadCrumbs'
import { ArrowPanel } from '../../../components/ui/page/ArrowPanel'
import { HeadPanel } from '../../../components/ui/page/HeadPanel'


export default function DetailProduct() 
{
    const router = useRouter()
    const { href } = router.query
    const detailProduct = href ? ProductData().filter(name => name.href.includes(href))[0] : {} 
    const { id, image, title, type, vendor, stocks, SKU, price, quantity, variants } = detailProduct
    const Title = title

    useEffect(() => {
        if(detailProduct === undefined) {
            setTimeout(() => {router.push('/404')}, 5000) 
        }
    }, [detailProduct])

    const variable = [
        {href: '/dashboard/product', name: 'Products'}
    ]
    const menu = [
        {
            href: '#',
            icon: MdContentCopy,
            button: 'Duplicate'
        },
        {
            href: '#',
            icon: FaEye,
            button: 'Preview'
        }
    ]

    return (
        <MainLayout title={Title}>
            <div className="w-full block mt-5">
                <div className="max-w-6xl mx-auto">
                    <BreadCrumbs home={true} links={variable} end="Product details" />
                    <HeadPanel title={title} list={menu} widget={<ArrowPanel />} />
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
                    <Variants />
                </div>                   
            </div>
        </MainLayout>
    )
}
