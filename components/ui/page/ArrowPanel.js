import React, { useContext } from 'react'
import { ArrowNarrowLeftIcon, ArrowNarrowRightIcon } from '@heroicons/react/outline'
import { ShopContext } from '../../context/ShopContext'
import ReactTooltip from 'react-tooltip'


export function ArrowPanel() 
{
    const {theme} = useContext(ShopContext)
    const color = theme ? 'dark' : 'light'

    return (
        <div className="flex items-center space-x-2">
            <a 
                href="#" 
                data-for='left'
                data-tip='Предыдущий товар'
                className="group bg-gray-50 dark:bg-gray-900 relative hover:bg-gray-100 dark:hover:bg-gray-800 rounded-full w-10 h-10 cursor-pointer grid place-items-center"
            >
                <ArrowNarrowLeftIcon className="w-5 h-5 flex-none text-gray-500 dark:text-gray-300 group-hover:text-pink-500" />
            </a>
            <ReactTooltip id='left' place="top" type={color} effect="solid"/>
            <a 
                href="#" 
                data-for='right'
                data-tip='Следующий товар'
                className="group bg-gray-50 dark:bg-gray-900 relative hover:bg-gray-100 dark:hover:bg-gray-800 rounded-full w-10 h-10 cursor-pointer grid place-items-center"
            >
                <ArrowNarrowRightIcon className="w-5 h-5 flex-none text-gray-500 dark:text-gray-300 group-hover:text-pink-500" />
            </a>
            <ReactTooltip id='right' place="top" type={color} effect="solid"/>
        </div>
    )
}
