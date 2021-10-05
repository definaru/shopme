import React from 'react'
import Link from 'next/link'
import { MainLayout } from '../../components/layout/MainLayout'


export default function AddTask() 
{

    const Title = 'Новая задача'

    return (
        <MainLayout title={`${Title} | ShopMe`}>
            <div className="w-full h-screen block">
                <div className="flex items-center justify-between py-5 border-b border-gray-100 mb-5">
                    <div>
                        <h1 className="text-3xl font-bold text-gray-900">
                            {Title}
                        </h1>
                    </div>
                    <div>
                        ...
                    </div>
                </div>
            </div>            
        </MainLayout>
    )
}
