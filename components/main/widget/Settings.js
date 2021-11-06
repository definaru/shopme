import React, { useContext } from 'react'
import { FiSliders } from 'react-icons/fi'
import { ShopContext } from '../../context/ShopContext'


export function Settings() 
{
    const { theme, setTheme } = useContext(ShopContext)
    const toggle = () => setTheme(!theme)

    return (
        <div onClick={toggle} className="bg-gray-50 dark:bg-gray-800 relative dark:hover:bg-gray-900 hover:bg-gray-100 rounded-full w-10 h-10 cursor-pointer grid place-items-center">
            <FiSliders className="dark:text-gray-50 text-gray-900" />
        </div>
    )
}
