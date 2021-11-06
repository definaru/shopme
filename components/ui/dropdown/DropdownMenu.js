import Link from 'next/link'
import React, { Fragment } from 'react'
import { Menu, Transition } from '@headlessui/react'
import { ChevronDownIcon } from '@heroicons/react/solid'


export function DropdownMenu({
    options = 'Select', 
    arrow = false, 
    func = '',
    style = 'border rounded-r-md px-3 py-2 w-full bg-white dark:bg-gray-900',
    link = 0,
    lists = []
}) 
{
    
    return (
        <Menu as="div" className="relative inline-block text-left">
            <div>
                <Menu.Button className={`inline-flex justify-center cursor-pointer ${style} dark:hover:bg-gray-800 hover:bg-gray-50 focus:outline-none`}>
                    {options}
                    {arrow ? <ChevronDownIcon className="-mr-1 ml-2 w-5 h-5" /> : ''}
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
                <Menu.Items className="origin-top-right absolute right-0 mt-0 w-48 rounded-md shadow-lg bg-white dark:bg-gray-800 z-20 focus:outline-none">
                    <div className="py-1">
                        {lists.map((item, i) => (
                        <React.Fragment key={i}>
                            {item.title ?
                            <div className="p-2 text-xs border-b border-gray-50 dark:border-gray-700 text-gray-300 dark:text-gray-500 pl-5">
                                {item.title}
                            </div> : 
                            <Menu.Item>
                                {func ? 
                                <div onClick={func} className="group cursor-pointer bg-transparent flex items-center space-x-2 hover:bg-gray-100 dark:text-gray-50 text-gray-600 dark:hover:text-gray-100 dark:hover:bg-gray-900 px-5 py-2 text-sm">
                                    {item.icon ? <item.icon className="w-4 h-4 text-gray-400 group-hover:text-pink-600" /> : ''}
                                    <span>{item.header}</span>
                                </div> :
                                <Link href={item.href+link}>
                                    <a className="group bg-transparent flex items-center space-x-2 hover:bg-gray-100 text-gray-600 dark:text-gray-200 dark:hover:bg-gray-900 px-5 py-2 text-sm">
                                        {item.icon ? <item.icon className="w-4 h-4 text-gray-400 group-hover:text-pink-600" /> : ''}
                                        <span>{item.header}</span>
                                    </a>
                                </Link>}
                            </Menu.Item>}
                        </React.Fragment>
                        ))}
                    </div>
                </Menu.Items>
            </Transition>
        </Menu>
    )
}
