import Link from 'next/link'
import { Fragment } from 'react'
import { Menu, Transition } from '@headlessui/react'
import { FiChevronsRight } from 'react-icons/fi'
import { FaCircle } from "react-icons/fa"
import { FiBell } from 'react-icons/fi'
import { Scrollbars } from 'react-custom-scrollbars'


export function Notify() 
{

    const onData = [
        {
            image: '/access/img/img3.jpg',
            header: 'Brian Warner',
            text: 'changed an issue from "In Progress" to ',
            href: '#',
            status: 'Review',
            color: 'bg-green-400',
            time: '2hr'
        },
        {
            image: '',
            header: 'Klara Hampton',
            text: 'mentioned you in a comment',
            href: '#',
            status: 'Nice work, love!',
            color: 'table bg-indigo-400',
            time: '10hr'
        },
        {
            image: '/access/img/img10.jpg',
            header: 'Ruby Walter',
            text: 'joined the Slack group HS Team',
            href: '#',
            status: '',
            color: '',
            time: '17DY'
        },        
        {
            image: '/access/img/google.svg',
            header: 'from Google',
            text: 'Start using forms to capture the information of prospects visiting your Google website',
            href: '#',
            status: '',
            color: '',
            time: '3DY'
        },
        {
            image: '/access/img/img7.jpg',
            header: 'Sara Villar',
            text: 'completed ',
            href: '#',
            status: 'FD-7 task',
            color: 'bg-red-400 block w-full',
            time: '2MN'
        }
    ]

    return (
        <Menu as="div" className="relative">
            <div className="bg-white relative hover:bg-gray-50 rounded-full w-10 h-10 cursor-pointer grid place-items-center">
                <Menu.Button className="focus:outline-none">
                    <FaCircle className="text-red-600 w-2 h-2 absolute top-1 right-1 animate-ping" />
                    <FaCircle className="text-red-600 w-2 h-2 absolute top-1 right-1" />
                    <FiBell className="w-5 h-5 text-gray-400 hover:text-gray-500" />
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
                <Menu.Items className="absolute right-0 w-96 mt-2 origin-top-right bg-white divide-y divide-gray-100 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                    <div className="px-6 py-3 flex items-center justify-between">
                        <h2 className="text-black font-semibold text-md">
                            {'Notifications'}
                        </h2>
                        <p className="text-sm text-gray-400">
                            Messages 
                            <span className="text-pink-700 bg-pink-200 px-2 py-0.5 ml-3 font-bold rounded-full leading-none">
                                5
                            </span>
                        </p>
                    </div>
                    <Scrollbars 
                        autoHide
                        universal 
                        autoHideTimeout={500}
                        style={{ width: '100%', height: 250 }}
                    >
                        <div className="p-0">
                            {onData?.map((item, i) => (
                            <Menu.Item key={i}>
                                <a href={item.href} className="flex justify-between items-center border-b border-gray-50 rounded bg-white hover:bg-gray-50 px-6 py-3">
                                    <div className="w-1/5 flex items-center">
                                        <FaCircle className="w-3 h-3 text-pink-600 mr-3 flex-none" />
                                        {item.image ? 
                                        <img 
                                            src={item.image}
                                            alt={item.header} 
                                            className="w-9 h-9 rounded-full mr-5 flex-none" 
                                        /> : 
                                        <div className="w-9 h-9 bg-gray-200 rounded-full mr-5 text-center grid place-items-center flex-none">
                                            {item.header[0]}
                                        </div>}
                                    </div>
                                    <div className="flex justify-between w-4/5 ml-4">
                                        <div className="flex flex-col text-sm">
                                            <h2 className="text-gray-800 font-semibold text-md">
                                                {item.header}
                                            </h2>                                    
                                            <p className="text-sm text-gray-500">
                                                <small>{item.text}</small>
                                                {item.status ?
                                                <small className={`${item.color} text-gray-50 rounded-full px-2 py-0`}>
                                                    {item.status}
                                                </small> : ''}                                        
                                            </p>
                                        </div>                                    
                                        <small className="text-right text-gray-300 text-sm">
                                            {item.time}
                                        </small>
                                    </div>
                                </a>
                            </Menu.Item>                            
                            ))}
                        </div>
                    </Scrollbars>



                    <div className="p-0">
                        <Link href="/dashboard/apps">
                            <a className="px-6 py-4 flex items-center justify-center text-pink-600 text-sm bg-white hover:text-gray-800 hover:bg-gray-50">
                                Смотреть всё <FiChevronsRight className="ml-3 w-4" />
                            </a>
                        </Link>
                    </div>
                </Menu.Items>
            </Transition>
        </Menu>
    )
}
