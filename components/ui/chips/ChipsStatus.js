import React from 'react'
import { FaCircle } from 'react-icons/fa'

export function ChipsStatus({children, color = '', point = true}) 
{
    function bgColor(color) 
    {
        if(color === 'red') {
            return 'bg-red-500'
        } else if(color === 'green') {
            return 'bg-green-500'
        } else if(color === 'yellow') {
            return 'bg-yellow-500'
        } return 'bg-gray-500'
    }

    function textColor(color) 
    {
        if(color === 'red') {
            return 'text-red-500'
        } else if(color === 'green') {
            return 'text-green-500'
        } else if(color === 'yellow') {
            return 'text-yellow-500'
        } return 'text-gray-500'
    }

    return (
        <div className={`flex items-center justify-center space-x-1 text-xs px-2 py-1 rounded-full ${bgColor(color)} ${textColor(color)} bg-opacity-10`}>
            {point ? <FaCircle className={`w-2 h-2 flex-none ${textColor(color)}`} /> : ''}
            {point ? <span>{children}</span> : <small>{children}</small>}
        </div>
    )
}
