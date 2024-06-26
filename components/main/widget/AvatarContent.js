import Link from 'next/link'
import { useRouter } from 'next/router'
import { useEffect, Fragment, useContext } from 'react'
import { Menu, Transition } from '@headlessui/react'
import { FiLogOut, FiUser, FiSliders } from 'react-icons/fi'
import { FaCircle } from 'react-icons/fa'
import { ShopContext } from '../../context/ShopContext'
import { GetModal } from '../../ui/modal/GetModal'


export function AvatarContent() 
{

    const router = useRouter()
    const { theme, user, toast } = useContext(ShopContext)
    const ClassStyle = 'text-gray-600 dark:text-gray-300 hover:text-pink-600 dark:hover:bg-gray-900 hover:bg-gray-50 flex rounded-md items-center w-full px-2 py-2 text-sm'
    
    useEffect(() => {
        theme ? document.body.classList.add('dark') : document.body.classList.remove('dark')
    }, [theme])

    const Logout = () => {
        toast.success("Все сессии прерваны. До встречи!", { theme: "colored" })
        setTimeout(() => {router.push('/login?status=logout')}, 500)        
    }
    const handleClick = (e) => {
        e.preventDefault()
        GetModal(
            'Подтвердите действие',
            'Уверены что хотите выйти ?',
            'question',
            Logout
        )
    }

    return (
        <Menu as="div" className="relative mt-1">
            <div>
                <Menu.Button className="focus:outline-none">
                    <img 
                        src={user?.avatar} 
                        alt={user?.username+' '+user?.lastname} 
                        className="object-cover object-center border-4 border-gray-100 dark:border-gray-800 w-10 h-10 rounded-full cursor-pointer" 
                    />
                    <FaCircle className="text-green-600 w-3 h-3 absolute bottom-1 right-1 border-2 border-white dark:border-gray-800 rounded-full" />
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
                <Menu.Items className="absolute right-0 w-60 mt-2 origin-top-right bg-white dark:bg-gray-800 rounded-md shadow-lg focus:outline-none">
                    <div className="px-1 py-1 border-b border-gray-50 dark:border-gray-900">
                        <div className="flex items-center py-2 px-3">
                            <div className="flex-none mr-3">
                                <Link href="/dashboard/profile">
                                    <a>
                                        <img 
                                            src={user?.avatar} 
                                            alt={user?.username + ' ' + user?.lastname}  
                                            className="object-cover object-center border-4 border-gray-100 dark:border-gray-900 w-12 h-12 rounded-full" 
                                        />                                        
                                    </a>
                                </Link>
                            </div>
                            <div className="flex flex-col text-sm">
                                <Link href="/dashboard/profile">
                                    <a className="font-semibold no-underline hover:underline text-gray-900 dark:text-gray-200 hover:text-gray-600">
                                        {user?.username + ' ' + user?.lastname} 
                                    </a>
                                </Link>
                                <p className="overflow-ellipsis overflow-hidden block w-36 text-gray-400">
                                    <small>
                                        {user?.email} 
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div className="px-1 py-1">
                        <Menu.Item>
                            <Link href="/dashboard/account">
                                <a className={ClassStyle}>
                                    <FiUser className="ml-3 text-gray-900 dark:text-gray-500 mr-3" /> Аккаунт
                                </a>                                
                            </Link>
                        </Menu.Item>
                        <Menu.Item>
                            <Link href="/dashboard/setting">
                                <a className={ClassStyle}>
                                    <FiSliders className="ml-3 text-gray-900 dark:text-gray-500 mr-3" /> Настройки
                                </a>
                            </Link>
                        </Menu.Item>
                    </div>
                    <div className="px-1 py-1 bg-gray-50 dark:bg-gray-900 rounded-b-md">
                        <Menu.Item>
                            <button className={ClassStyle} onClick={handleClick}>
                                <FiLogOut className="ml-3 text-gray-900 dark:text-gray-500 mr-3" /> Выйти
                            </button>
                        </Menu.Item>
                    </div>
                </Menu.Items>
            </Transition>
        </Menu>
    )
}