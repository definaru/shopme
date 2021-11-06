import { Fragment, useState } from 'react'
import { Menu, Transition } from '@headlessui/react'
import { ChevronDownIcon, CheckIcon } from '@heroicons/react/solid'


export function DropdownSelect({
    arrow = false,
    style = 'text-sm',
    list = []
}) 
{
    const choose = list.length ? list[0].header : 'All' 
    const [check, setCheck] = useState(choose)
    return (
        <Menu as="div" className="relative inline-block text-left">
            <div>
                <Menu.Button className={`flex items-center justify-center w-full cursor-pointer ${style} hover:bg-gray-50 focus:outline-none`}>
                    {check}
                    {arrow ? <ChevronDownIcon className="-mr-1 ml-2 w-5 h-5 text-gray-400" /> : ''}
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
                <Menu.Items className="origin-top-right absolute right-0 mt-0 w-40 rounded-md shadow-lg bg-white dark:bg-gray-900 z-20 focus:outline-none">
                    <div className="py-1">
                        {list.map((item, i) => (
                        <Menu.Item key={i}>
                            <div 
                                onClick={() => setCheck(`${item.header}`)}
                                className={`cursor-pointer ${check === item.header ? 'bg-gray-50 dark:bg-gray-800 dark:text-white' : 'bg-transparent text-gray-600 dark:text-gray-400'} flex justify-between items-center space-x-2 dark:hover:bg-gray-800  hover:bg-gray-100 dark:hover:text-gray-100 hover:text-gray-900 px-5 py-2 text-sm`}
                            >
                                <span className={check === item.header ? 'font-bold' : ''}>{item.header}</span>
                                {check === item.header ? <CheckIcon className="w-4 h-4 text-pink-600" /> : ''}
                            </div>
                        </Menu.Item>                            
                        ))}
                    </div>
                </Menu.Items>
            </Transition>       
        </Menu>
    )
}
