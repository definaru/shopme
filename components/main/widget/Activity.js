import Link from 'next/link'
import { Fragment, useContext } from 'react'
import { FiActivity } from 'react-icons/fi'
import { Dialog, Transition } from '@headlessui/react'
import { FiChevronsRight } from 'react-icons/fi'
import { Panel } from './Panel'
import { ShopContext } from '../../context/ShopContext'


export function Activity() 
{
    const { open, setOpen } = useContext(ShopContext)

    return (
        <>
        <div className="bg-white hover:bg-gray-50 rounded-full w-10 h-10 cursor-pointer grid place-items-center" onClick={() => setOpen(true)}>
            <FiActivity className="w-5 h-5 text-gray-400 hover:text-gray-500" />
        </div>
        <Transition.Root show={open} as={Fragment}>
            <Dialog as="div" static className="fixed z-30 inset-0 overflow-hidden" open={open} onClose={setOpen}>
                <div className="absolute inset-0 overflow-hidden">
                    <Transition.Child
                        as={Fragment}
                        enter="ease-in-out duration-500"
                        enterFrom="opacity-0"
                        enterTo="opacity-100"
                        leave="ease-in-out duration-500"
                        leaveFrom="opacity-100"
                        leaveTo="opacity-0"
                    >
                        <Dialog.Overlay className="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
                    </Transition.Child>
                    <div className="fixed inset-y-0 right-0 pl-10 max-w-full flex">
                        <Transition.Child
                            as={Fragment}
                            enter="transform transition ease-in-out duration-500 sm:duration-700"
                            enterFrom="translate-x-full"
                            enterTo="translate-x-0"
                            leave="transform transition ease-in-out duration-500 sm:duration-700"
                            leaveFrom="translate-x-0"
                            leaveTo="translate-x-full"
                        >
                            <div className="relative w-96 max-w-md">
                                <Transition.Child
                                    as={Fragment}
                                    enter="ease-in-out duration-500"
                                    enterFrom="opacity-0"
                                    enterTo="opacity-100"
                                    leave="ease-in-out duration-500"
                                    leaveFrom="opacity-100"
                                    leaveTo="opacity-0"
                                >
                                    <div className="absolute top-0 left-0 -ml-8 pt-4 pr-2 flex sm:-ml-10 sm:pr-4">
                                        <button
                                            className="rounded-md focus:outline-none"
                                            onClick={() => setOpen(false)}
                                        >
                                        </button>
                                    </div>
                                </Transition.Child>
                                <div className="h-full flex flex-col bg-white shadow-xl overflow-hidden">
                                    <Panel open={open} setOpen={setOpen} />
                                    <div className="flex justify-center w-full">
                                        <Link href="/dashboard/activity">
                                            <a className="flex justify-center items-center mx-2 rounded relative z-10 bg-white py-4 font-bold border border-gray-100 hover:shadow-md w-full">
                                                Смотреть всё
                                                <FiChevronsRight className="ml-3 w-4" />
                                            </a>
                                        </Link>
                                    </div>
                                </div>
                            </div>
                        </Transition.Child>
                    </div>
                </div>
            </Dialog>
        </Transition.Root>
        </>
    )
}
