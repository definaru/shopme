import React, { useContext } from 'react'
import { ShopContext } from '../../context/ShopContext'

export function Count({count, color='bg-pink-600'}) 
{
    const { menu } = useContext(ShopContext)
    if(count === '') {
        return ''
    }
    return (
        <span className={`flex items-center font-bold leading-none rounded-full ${menu ? '-mt-4 px-1 py-0.5 text-xs' : 'px-2 py-0 text-sm'} text-white ${color}`}>
            {count}
        </span>
    )
}
