import React from 'react'
import { PriceFormat } from '../../helper/digital/PriceFormat'

export function Country({list = [], link = ''}) 
{
    return (
        <>
            {list.length ? list.map((item, i) => (
                <div key={i} className="flex items-center justify-between space-x-2 py-4 border-b border-gray-50 dark:border-gray-800">
                    <div className="flex items-center space-x-3">
                        <img 
                            src={item.image} 
                            className="w-6 h-6 rounded-full"
                            alt="us" 
                        />
                        <span className="text-gray-500 dark:text-gray-600">
                            {item.name}
                        </span>
                    </div>
                    <strong className="text-gray-900 dark:text-gray-50">
                        ${PriceFormat(item.price)}
                    </strong>
                </div>
            )) : ''}
        </>
    )
}
