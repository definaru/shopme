import Link from 'next/link'
import { Fragment, useContext } from 'react'
import { Menu, Transition } from '@headlessui/react'
import { FiLogOut, FiUser, FiSliders } from 'react-icons/fi'
import { FaCircle } from 'react-icons/fa'
import { ShopContext } from '../../context/ShopContext'


export function AvatarContent() 
{
    const { user, setUser } = useContext(ShopContext)
    const ClassStyle = 'text-gray-600 hover:text-pink-600 hover:bg-gray-50 flex rounded-md items-center w-full px-2 py-2 text-sm'

    return (
        <Menu as="div" className="relative mt-1">
            <div>
                <Menu.Button className="focus:outline-none">
                    <img 
                        src={user.avatar} 
                        alt={user.username+' '+user.lastname} 
                        className="object-cover object-center border-4 border-gray-100 w-10 h-10 rounded-full cursor-pointer" 
                    />
                    <FaCircle className="text-green-600 w-3 h-3 absolute bottom-1 right-1 border-2 border-white rounded-full" />
                </Menu.Button>
            </div>
            <Transition
                as={Fragment}
                enter="transition ease-out duration-100"
                enterFrom="transform opacity-0 scale-95"
                enterTo="transform opacity-100 scale-100"
                leave="transition ease-in duration-75"
                leaveFrom="transform opacity-100 scale-100"
                leaveTo="transform opacity-0 scale-95"
            >
                <Menu.Items className="absolute right-0 w-60 mt-2 origin-top-right bg-white divide-y divide-gray-100 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                    <div className="px-1 py-1">
                        <div className="flex items-center py-2 px-3">
                            <div className="flex-none mr-3">
                                <Link href="/dashboard/profile">
                                    <a>
                                        <img 
                                            src={user.avatar} 
                                            alt={user.username+' '+user.lastname}  
                                            className="object-cover object-center border-4 border-gray-100 w-12 h-12 rounded-full" 
                                        />                                        
                                    </a>
                                </Link>
                            </div>
                            <div className="flex flex-col text-sm">
                                <Link href="/dashboard/profile">
                                    <a className="font-semibold no-underline hover:underline text-gray-900 hover:text-gray-600">
                                        {user.username+' '+user.lastname} 
                                    </a>
                                </Link>
                                <p className="overflow-ellipsis overflow-hidden block w-36 text-gray-400">
                                    <small>
                                        {user.email} 
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div className="px-1 py-1">
                        <Menu.Item>
                            <Link href="/dashboard/account">
                                <a className={ClassStyle}>
                                    <FiUser className="ml-3 text-gray-900 mr-3" /> Аккаунт
                                </a>                                
                            </Link>
                        </Menu.Item>
                        <Menu.Item>
                            <Link href="/dashboard/setting">
                                <a className={ClassStyle}>
                                    <FiSliders className="ml-3 text-gray-900 mr-3" /> Настройки
                                </a>
                            </Link>
                        </Menu.Item>
                    </div>
                    <div className="px-1 py-1">
                        <Menu.Item>
                            <button className={ClassStyle} onClick={() => setUser(null)}>
                                <FiLogOut className="ml-3 text-gray-900 mr-3" /> Выйти
                            </button>
                        </Menu.Item>
                    </div>
                </Menu.Items>
            </Transition>
        </Menu>
    )
}