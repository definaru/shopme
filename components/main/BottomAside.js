import React, { useContext } from 'react'
import { Question } from './widget/Question'
import { Settings } from './widget/Settings'
import { Flags } from './widget/Flags'
import { ShopContext } from '../context/ShopContext'


export function BottomAside() 
{
    const { menu } = useContext(ShopContext)
    const classes = menu ? 'flex-col space-y-3' : 'flex-row space-x-5'

    return (
        <div className={`fixed bottom-0 -left-1.5 ${menu ? 'w-20' : 'w-60'} bg-white dark:bg-gray-900`}>
            <div className="block px-6 py-3 border-t border-gray-100 dark:border-gray-800">
                <div className={`flex items-center ${classes} justify-center text-gray-700`}>
                    <Settings />
                    <Question />
                    <Flags />
                </div>
            </div>
        </div>  
    )
}
