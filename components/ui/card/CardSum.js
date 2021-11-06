import React, { useState } from 'react'
import { FiMoreVertical } from 'react-icons/fi'
import { FaEye, FaTimes } from 'react-icons/fa'
import { PriceFormat } from '../../helper/digital/PriceFormat'
import { DropdownMenu } from '../dropdown/DropdownMenu'

export function CardSum({list = []}) 
{
    const [lists, setList] = useState(list)
    const Menus = [
        {
            header: 'Посмотреть',
            href: '/dashboard/income',
            icon: FaEye            
        },
        {
            header: 'Скрыть',
            href: '#',
            icon: FaTimes            
        }
    ]

    function deleteActive(id)
    {
        setList(lists.filter(i => i.id !== id))
    }

    return (
        <>
            {lists.map((items, i) => (
                <div key={i} className="flex justify-between bg-white dark:bg-gray-900 shadow-sm rounded-md px-5 py-4 relative h-28">
                    <div className="flex items-center">
                        <div className="pr-4">
                            <div className={`rounded-full w-16 h-16 cursor-pointer grid place-items-center ${items.background} focus:outline-none`}>
                                <items.icon className={`${items.color} w-8 h-8`} />
                            </div>
                        </div>
                        <div className="flex-1">
                            <h3 className="text-3xl font-bold mb-0.5 text-gray-900 dark:text-gray-50">{PriceFormat(items.price)} {items.preffix}</h3>
                            <p className="font-medium text-gray-500 text-sm">
                                {items.text}
                            </p>
                        </div>
                    </div>
                    <div className="flex-none">
                        <DropdownMenu 
                            options={<FiMoreVertical className="w-5 h-5 dark:text-gray-50 text-gray-800" />} 
                            lists={Menus}
                            func={() => deleteActive(items.id)}
                            link={items.action}
                            style='relative hover:bg-gray-50 rounded-full w-10 h-10 cursor-pointer grid place-items-center absolute -top-2 -right-2'
                        />
                    </div>
                </div>
            ))}        
        </>
    )
}
