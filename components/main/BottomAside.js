import React, { useContext } from 'react'
import { FiSliders } from 'react-icons/fi'
import { Question } from './widget/Question'
import { Flags } from './widget/Flags'
import { ShopContext } from '../context/ShopContext'


export function BottomAside() 
{
    const { menu } = useContext(ShopContext)
    const classes = menu ? 'flex-col' : 'flex-row space-x-5'

    return (
        <div className={`fixed bottom-0 -left-1.5 ${menu ? 'w-20' : 'w-60'} bg-white`}>
            <div className="block px-6 py-3 border-t border-gray-100">
                <div className={`flex items-center ${classes} justify-center text-gray-700`}>
                    <div className="bg-white relative hover:bg-gray-50 rounded-full w-10 h-10 cursor-pointer grid place-items-center">
                        <FiSliders />
                    </div>
                    <Question />
                    <Flags />
                </div>
            </div>
        </div>  
    )
}
