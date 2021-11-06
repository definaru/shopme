import Link from 'next/link'
import { Fragment } from 'react'
import { Menu, Transition } from '@headlessui/react'
import { FiGrid, FiChevronsRight } from 'react-icons/fi'
import { Scrollbars } from 'react-custom-scrollbars'


export function WebApps() 
{

    const onData = [
        {
            image: '/access/img/apps/atlassian.svg',
            header: 'Atlassian',
            text: 'Security and control across Cloud',
            href: '#',
            status: '',
            color: ''
        },
        {
            image: '/access/img/apps/slack.svg',
            header: 'Slack',
            text: 'Email collaboration software',
            href: '#',
            status: 'TRY',
            color: 'bg-indigo-500'
        },
        {
            image: '/access/img/apps/google-webdev.svg',
            header: 'Google webdev',
            text: 'Work involved in developing a website',
            href: '#',
            status: '',
            color: ''
        },
        {
            image: '/access/img/apps/frontapp.svg',
            header: 'Frontapp',
            text: 'The inbox for teams',
            href: '#',
            status: '',
            color: ''
        },
        {
            image: '/access/img/apps/review-rating-shield.svg',
            header: 'HS Support',
            text: 'Customer service and support',
            href: '#',
            status: 'Apply',
            color: 'bg-green-500'
        }
    ]

    return (
        <Menu as="div" className="relative">
            <div className="bg-gray-50 dark:bg-gray-800 dark:hover:bg-gray-900 hover:bg-gray-100 rounded-full w-10 h-10 cursor-pointer grid place-items-center">
                <Menu.Button className="focus:outline-none">
                    <FiGrid className="w-5 h-5 text-gray-400 hover:text-gray-500 dark:text-red-50 dark:hover:text-gray-100" />
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
                <Menu.Items className="absolute right-0 w-80 mt-2 origin-top-right bg-white dark:bg-gray-800 divide-y divide-gray-100 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                    <div className="px-6 py-3 border-b border-gray-50 dark:border-gray-700">
                        <h2 className="text-black dark:text-white font-semibold text-md">
                            {'Web apps & services'}
                        </h2>
                    </div>
                    <Scrollbars 
                        autoHide
                        universal 
                        autoHideTimeout={500}
                        style={{ width: '100%', height: 250, border: 'none' }}
                    >
                        <div className="p-0">
                            {onData?.map((item, i) => (
                            <Menu.Item key={i}>
                                <a href={item.href} className="flex items-center bg-white dark:bg-gray-800 dark:hover:bg-gray-900 hover:bg-gray-50 px-6 py-3">
                                    <div>
                                        <img 
                                            src={item.image}
                                            alt={item.header} 
                                            className="w-7 mr-5" 
                                        />
                                    </div>
                                    <div className="flex flex-col text-sm">
                                        <h2 className="text-gray-800 dark:text-gray-100 font-semibold text-md">
                                            {item.header}
                                            {item.status ?
                                            <small className={`${item.color} text-gray-50 ml-2 rounded-full px-2 py-0.5`}>
                                                {item.status}
                                            </small> : ''}
                                        </h2>                                    
                                        <p className="text-sm text-gray-500">
                                            <small>{item.text}</small>
                                        </p>
                                    </div>
                                </a>
                            </Menu.Item>                            
                            ))}
                        </div>
                    </Scrollbars>
                    <div className="p-0">
                        <Link href="/dashboard/apps">
                            <a className="px-6 py-4 rounded-b-md border-t border-gray-50 dark:border-gray-900 flex items-center justify-center text-pink-600 text-sm bg-white dark:bg-gray-800 hover:text-gray-800 dark:hover:text-white hover:bg-gray-50 dark:hover:bg-gray-900">
                                Смотреть все приложения <FiChevronsRight className="ml-3 w-4" />
                            </a>
                        </Link>
                    </div>
                </Menu.Items>
            </Transition>
        </Menu>
    )
}
