import { Fragment } from 'react'
import { Popover, Transition } from '@headlessui/react'
import { ListLang } from '../../block/index/lang/data/ListLang'


export function Flags(props)
{
    const ClassStyle = 'dark:text-gray-50 text-gray-600 dark:hover:text-pink-400 hover:text-pink-600 dark:hover:bg-gray-900 hover:bg-gray-50 flex rounded-md items-center w-full px-2 py-2 text-sm cursor-pointer'
    const list = ListLang()

    return (
      <Popover>
        {({ open }) => (
          <>
            <Popover.Button show={`top`} className="bg-gray-50 dark:bg-gray-800 relative dark:hover:bg-gray-900 hover:bg-gray-100 rounded-full w-10 h-10 cursor-pointer grid place-items-center">
                <img 
                    src="/access/img/flags/gb.svg" 
                    className="w-5 h-5 object-cover rounded-full" 
                    alt="en" 
                />
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
                <Popover.Panel className="absolute w-48 -top-48 left-36 z-10 max-w-sm px-4 mt-3 transform -translate-x-1/2 sm:px-0 lg:max-w-3xl">
                    <div className="overflow-hidden rounded-lg shadow-lg ring-1 ring-black ring-opacity-5">
                        <div className="relative grid gap-1 bg-white dark:bg-gray-800 p-2 grid-cols-1">
                            {list.map((item) => (
                                <a
                                    key={item.name}
                                    className={ClassStyle}
                                >
                                        <img src={item.flag} alt={item.name} className="w-6 h-4 mr-2 border dark:border-gray-900" />
                                        {item.name}
                                </a>
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