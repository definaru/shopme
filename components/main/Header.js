import React, { useContext } from 'react'
import { FiSearch, FiMenu } from 'react-icons/fi'
import { AvatarContent } from './widget/AvatarContent'
import { Activity } from './widget/Activity'
import { WebApps } from './widget/WebApps'
import { Notify } from './widget/Notify'
import { ShopContext } from '../context/ShopContext'


export function Header() 
{
    const { menu, setMenu } = useContext(ShopContext)
    const toggle = () => setMenu(!menu)

    return (
        <div className={`flex items-center justify-between w-full ${menu ? 'pl-20' : 'pl-64'} border-b border-gray-50 bg-white fixed z-20 px-8 py-1`}>
            <div className="flex items-center">
                <FiMenu onClick={toggle} className="cursor-pointer w-6 h-6 text-gray-500 ml-3 mr-5" />
                <div className="flex items-center px-4 py-2 rounded bg-white hover:bg-gray-100 focus:bg-gray-50">
                    <FiSearch className="opacity-25 mr-2" />
                    <input 
                        type="search" 
                        name="search" 
                        placeholder="Search ..."
                        className="placeholder-gray-300 bg-transparent focus:outline-none" 
                    />
                </div>
            </div>
            <div>
                <div className="flex items-center flex-row gap-2">
                    <Notify />
                    <WebApps />
                    <Activity />
                    <AvatarContent />
                </div>
            </div>
        </div>
        )
}
