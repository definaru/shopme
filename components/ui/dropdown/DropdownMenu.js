import Link from 'next/link'
import { Fragment } from 'react'
import { Menu, Transition } from '@headlessui/react'
import { ChevronDownIcon } from '@heroicons/react/solid'
import { TrashIcon, ArchiveIcon, RefreshIcon, XIcon } from '@heroicons/react/outline'

export function DropdownMenu({
    options = 'Select', 
    arrow = false, 
    style = 'border rounded-r-md px-3 py-2 bg-white',
    link = 0
}) 
{

    const Menus = [
        {
            header: 'Delete',
            href: `/delete/${link}`,
            icon: TrashIcon
        },
        {
            header: 'Archive',
            href: `/archive/${link}`,
            icon: ArchiveIcon
        },
        {
            header: 'Upload',
            href: `/upload/${link}`,
            icon: RefreshIcon
        },
        {
            header: 'Unpublish',
            href: `/unpublish/${link}`,
            icon: XIcon
        }
    ]
    
    return (
        <Menu as="div" className="relative inline-block text-left">
            <div>
                <Menu.Button className={`inline-flex justify-center w-full cursor-pointer ${style} hover:bg-gray-50 focus:outline-none`}>
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
                <Menu.Items className="origin-top-right absolute right-0 mt-1 w-48 rounded-md shadow-lg bg-white z-20 focus:outline-none">
                    <div className="py-1">
                        {Menus.map((item, i) => (
                        <Menu.Item key={i}>
                            <Link href={item.href}>
                                <a className="group bg-transparent flex items-center space-x-2 hover:bg-gray-100 text-gray-600 hover:text-gray-900 px-5 py-2 text-sm">
                                    <item.icon className="w-4 h-4 text-gray-400 group-hover:text-pink-600" />
                                    <span>{item.header}</span>
                                </a>
                            </Link>
                        </Menu.Item>                            
                        ))}
                    </div>
                </Menu.Items>
            </Transition>
        </Menu>
    )
}
