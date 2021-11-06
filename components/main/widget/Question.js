import React, { Fragment } from 'react'
import { FiHelpCircle, FiMessageSquare, FiBook, FiCommand, FiTerminal, FiGift } from 'react-icons/fi'
import { Popover, Transition } from '@headlessui/react'


export function Question() 
{

    const ClassStyle = 'dark:text-gray-50 text-gray-800 hover:text-pink-600 dark:hover:text-pink-400 hover:bg-gray-50 dark:hover:bg-gray-900 flex rounded-md items-center w-full px-2 py-2 text-sm cursor-pointer'
    const list = [
        {
            section: 'Помощь',
            link: [
                {
                    name: 'Resources & tutorials',
                    href: '#',
                    icon: FiBook
                },
                {
                    name: 'Keyboard shortcuts',
                    href: '#',
                    icon: FiCommand
                },
                {
                    name: 'Connect other apps',
                    href: '#',
                    icon: FiTerminal
                },
                {
                    name: 'What`s new?',
                    href: '#',
                    icon: FiGift
                }
            ]
        },
        {
            section: 'Контакты',
            link: [
                {
                    name: 'Контакты поддержки',
                    href: '#',
                    icon: FiMessageSquare
                }
            ]
        }
    ]

    return (
        <Popover>
        {({ open }) => (
          <>
            <Popover.Button show={`top`} className="bg-gray-50 dark:bg-gray-800 relative hover:bg-gray-100 dark:hover:bg-gray-900 rounded-full w-10 h-10 cursor-pointer grid place-items-center">
                <FiHelpCircle className="w-5 h-5 dark:text-gray-50 text-gray-900" />
            </Popover.Button>
            <Transition
                as={Fragment}
                enter="transition ease-out duration-200"
                enterFrom="opacity-0 translate-y-1"
                enterTo="opacity-100 translate-y-0"
                leave="transition ease-in duration-150"
                leaveFrom="opacity-100 translate-y-0"
                leaveTo="opacity-0 translate-y-1"
            >
                <Popover.Panel className="absolute w-52 -top-80 left-32 z-10 max-w-sm px-4 mt-3 transform -translate-x-1/2 sm:px-0 lg:max-w-3xl">
                    <div className="overflow-hidden rounded-lg shadow-lg ring-1 ring-black ring-opacity-5">
                        <div className="relative grid gap-1 bg-white dark:bg-gray-800 p-2 grid-cols-1">
                            {list.map((item, i) => (
                                <React.Fragment key={i}>
                                <div className="p-2 text-sm border-b dark:border-gray-700 text-gray-400 dark:text-gray-600">{item.section}</div>
                                {item.link?.map((text, idx) => (
                                    <div key={idx} className={ClassStyle}>
                                        <text.icon className="text-gray-400 mr-2" />
                                        {text.name}
                                    </div>                                    
                                ))}
                                </React.Fragment>
                            ))}
                        </div>
                    </div>
                </Popover.Panel>
            </Transition>
          </>
        )}
    </Popover>
    )
}
