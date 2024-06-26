import Link from 'next/link'
import { Fragment, useContext } from 'react'
import { Popover, Transition } from '@headlessui/react'
import { Disclosure } from '@headlessui/react'
import { ReceiptTaxIcon, ChartBarIcon, CursorClickIcon, MenuIcon, PlayIcon, PresentationChartLineIcon, XIcon } from '@heroicons/react/outline'
import { ChevronDownIcon } from '@heroicons/react/solid'
import { ShopContext } from '../context/ShopContext'
import Dropdown from '../ui/dropdown/Dropdown'


export function Header() 
{
    const { user, setUser } = useContext(ShopContext)

    const solutions = [
        {
            name: 'Партнёрская программа',
            description: 'Зарабатывайте на продвижении, лёгкий старт без вложений.',
            href: '#',
            icon: ChartBarIcon,
        },
        {
            name: 'Интернет-магазины',
            description: 'Публикуйте товары или услуги, и экономьте на рекламе.',
            href: '#',
            icon: CursorClickIcon,
        }
    ]
    const callsToAction = [
        { 
            name: 'Смотреть видео', 
            href: '/product', 
            icon: PlayIcon 
        }
    ]
    const resources = [
        {
            name: 'Компаниям',
            description: 'Узнайте, как раскрутить свой интернет-магазин без вложений в рекламу.',
            href: '#',
            icon: PresentationChartLineIcon,
        },
        {
            name: 'Партнёрам',
            description: 'Как заработать с нуля, без вложений и открытия компании.',
            href: '#',
            icon: ReceiptTaxIcon,
        }
    ]

    function classNames(...classes) {
        return classes.filter(Boolean).join(' ')
    }

    return (
        <Disclosure as="header" className="w-full fixed z-50">
            <Popover className="relative bg-white">
                {({ open }) => (
                    <>
                    <div className="max-w-6xl mx-auto px-4 sm:px-6">
                        <div className="flex justify-between items-center py-6 md:justify-start md:space-x-10">
                        <div className="flex justify-start lg:w-0 lg:flex-1">
                            <Link href="/">
                                <a>
                                    <img
                                        className="h-8 w-auto sm:h-10"
                                        src="/access/img/logo.svg"
                                        alt="Shop Me"
                                    />
                                </a>                        
                            </Link>
                        </div>
                        <div className="-mr-2 -my-2 md:hidden">
                            <Popover.Button className="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none">
                                <MenuIcon className="h-6 w-6" />
                            </Popover.Button>
                        </div>
                        <Popover.Group as="nav" className="hidden md:flex space-x-10">
                            <Popover className="relative">
                            {({ open }) => (
                                <>
                                <Popover.Button
                                    className={classNames(
                                    open ? 'text-gray-900' : 'text-gray-500',
                                    'group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none'
                                    )}
                                >
                                    <span>Продукты</span>
                                    <ChevronDownIcon
                                        className={classNames(
                                            open ? 'text-gray-600' : 'text-gray-400',
                                            'ml-2 h-5 w-5 group-hover:text-gray-500'
                                        )}
                                    />
                                </Popover.Button>

                                <Transition
                                    show={open}
                                    as={Fragment}
                                    enter="transition ease-out duration-200"
                                    enterFrom="opacity-0 translate-y-1"
                                    enterTo="opacity-100 translate-y-0"
                                    leave="transition ease-in duration-150"
                                    leaveFrom="opacity-100 translate-y-0"
                                    leaveTo="opacity-0 translate-y-1"
                                >
                                    <Popover.Panel
                                        static
                                        className="absolute z-10 -ml-4 mt-3 transform px-2 w-screen max-w-md sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2"
                                    >
                                    <div className="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                        <div className="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
                                            {solutions.map((item) => (
                                                <a
                                                    key={item.name}
                                                    href={item.href}
                                                    className="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50"
                                                >
                                                    <item.icon className="flex-shrink-0 h-6 w-6 text-pink-600" />
                                                    <div className="ml-4">
                                                        <p className="text-base font-medium text-gray-900">{item.name}</p>
                                                        <p className="mt-1 text-sm text-gray-500">{item.description}</p>
                                                    </div>
                                                </a>
                                            ))}
                                        </div>
                                        <div className="px-5 py-5 bg-gray-50 space-y-6 sm:flex sm:space-y-0 sm:space-x-10 sm:px-8">
                                        {callsToAction.map((item) => (
                                            <div key={item.name} className="flow-root">
                                                <Link href={item.href}>
                                                    <a className="-m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-100">
                                                        <item.icon className="flex-shrink-0 h-6 w-6 text-gray-400" />
                                                        <span className="ml-3">{item.name}</span>
                                                    </a>                                                
                                                </Link>
                                            </div>
                                        ))}
                                        </div>
                                    </div>
                                    </Popover.Panel>
                                </Transition>
                                </>
                            )}
                            </Popover>

                            <a href="https://documenter.getpostman.com/view/9480348/TzkyP1Ph" className="text-base font-medium text-gray-500 hover:text-gray-900">
                                API
                            </a>
                            <Link href="/partners">
                                <a className="text-base font-medium text-gray-500 hover:text-gray-900">
                                    Интеграции
                                </a>                            
                            </Link>
                            <Popover className="relative">
                            {({ open }) => (
                                <>
                                    <Popover.Button
                                        className={classNames(
                                        open ? 'text-gray-900' : 'text-gray-500',
                                        'group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none'
                                        )}
                                    >
                                        <span>О платформе</span>
                                        <ChevronDownIcon
                                            className={classNames(
                                                open ? 'text-gray-600' : 'text-gray-400',
                                                'ml-2 h-5 w-5 group-hover:text-gray-500'
                                            )}
                                        />
                                    </Popover.Button>

                                    <Transition
                                        show={open}
                                        as={Fragment}
                                        enter="transition ease-out duration-200"
                                        enterFrom="opacity-0 translate-y-1"
                                        enterTo="opacity-100 translate-y-0"
                                        leave="transition ease-in duration-150"
                                        leaveFrom="opacity-100 translate-y-0"
                                        leaveTo="opacity-0 translate-y-1"
                                    >
                                        <Popover.Panel
                                            static
                                            className="absolute z-10 left-1/2 transform -translate-x-1/2 mt-3 px-2 w-screen max-w-md sm:px-0"
                                        >
                                            <div className="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                                <div className="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
                                                    {resources.map((item) => (
                                                        <a
                                                            key={item.name}
                                                            href={item.href}
                                                            className="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50"
                                                        >
                                                            <item.icon className="flex-shrink-0 h-6 w-6 text-pink-600" />
                                                            <div className="ml-4">
                                                                <p className="text-base font-bold text-gray-900">{item.name}</p>
                                                                <p className="mt-1 text-sm text-gray-500">{item.description}</p>
                                                            </div>
                                                        </a>
                                                    ))}
                                                </div>
                                                <div className="px-5 py-5 bg-gray-50 sm:px-8 sm:py-8">
                                                    <div>
                                                        <h3 className="text-sm tracking-wide font-medium text-gray-500 uppercase">
                                                            Возможности платформы
                                                        </h3>
                                                    </div>
                                                    <div className="mt-5 text-sm">
                                                        <a href="#" className="font-medium text-pink-600 hover:text-pink-700">
                                                            {' '} Смотреть всё <span aria-hidden="true">&rarr;</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </Popover.Panel>
                                    </Transition>
                                </>
                            )}
                            </Popover>
                            <Dropdown 
                                arrow={true}
                                image={true}
                                list={[
                                    {current: 'ru', header: 'Русский'},
                                    {current: 'en', header: 'English'},
                                    {current: 'ee', header: 'Eesti'},
                                    {current: 'ch', header: '中國人'}
                                ]}
                            />
                        </Popover.Group>
                        <div className="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
                            {user !== null ?
                                <div className="flex items-center">
                                    <div className="flex-none mr-3">
                                        <Link href="/dashboard">
                                            <a>
                                                <img 
                                                    src={user.avatar} 
                                                    alt={user.username+' '+user.lastname}  
                                                    className="object-cover object-center border-4 border-gray-100 dark:border-gray-900 w-12 h-12 rounded-full" 
                                                />                                        
                                            </a>
                                        </Link>
                                    </div>
                                    <div className="flex flex-col text-base">
                                        <Link href="/dashboard">
                                            <a className="font-semibold no-underline hover:underline text-gray-900 dark:text-gray-200 hover:text-gray-600">
                                                {user.username+' '+user.lastname} 
                                            </a>
                                        </Link>
                                    </div>
                                </div> :
                                <>
                                    <Link href="/login">
                                        <a className="whitespace-nowrap text-base font-extrabold text-gray-500 hover:text-gray-900">
                                            Войти{/* Sign in */}
                                        </a>                            
                                    </Link>
                                    <Link href="/signup">
                                        <a className="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border rounded-md shadow-sm text-base font-medium text-white bg-pink-600 hover:bg-pink-700">
                                            Регистрация{/* Sign up */}
                                        </a>                            
                                    </Link>                                
                                </>
                            }

                        </div>
                        </div>
                    </div>

                    <Transition
                        show={open} // Mobile Menu
                        as={Fragment}
                        enter="duration-200 ease-out"
                        enterFrom="opacity-0 scale-95"
                        enterTo="opacity-100 scale-100"
                        leave="duration-100 ease-in"
                        leaveFrom="opacity-100 scale-100"
                        leaveTo="opacity-0 scale-95"
                    >
                        <Popover.Panel
                            focus
                            static
                            className="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden"
                        >
                            <div className="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
                                <div className="pt-5 pb-6 px-5">
                                    <div className="flex items-center justify-between">
                                        <div>
                                            <img
                                                className="h-8 w-auto"
                                                src="/access/img/favicon-32x32.png"
                                                alt="ShopMe"
                                            />
                                        </div>
                                        <div className="-mr-2">
                                            <Popover.Button className="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none">
                                                <span className="sr-only">Close menu</span>
                                                <XIcon className="h-6 w-6" />
                                            </Popover.Button>
                                        </div>
                                    </div>
                                    <div className="mt-6">
                                        <nav className="grid gap-y-8">
                                            {solutions.map((item) => (
                                                <a
                                                    key={item.name}
                                                    href={item.href}
                                                    className="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50"
                                                >
                                                    <item.icon className="flex-shrink-0 h-6 w-6 text-pink-600" />
                                                    <span className="ml-3 text-base font-medium text-gray-900">
                                                        {item.name}
                                                    </span>
                                                </a>
                                            ))}
                                        </nav>
                                    </div>
                                </div>
                                <div className="py-6 px-5 space-y-6">
                                    <div className="grid grid-cols-2 gap-y-4 gap-x-8">
                                        <a href="#" className="text-base font-medium text-gray-900 hover:text-gray-700">
                                            Продукты
                                        </a>
                                        <a href="https://documenter.getpostman.com/view/9480348/TzkyP1Ph" className="text-base font-medium text-gray-900 hover:text-gray-700">
                                            API
                                        </a>
                                        <a href="#" className="text-base font-medium text-gray-900 hover:text-gray-700">
                                            Интеграции
                                        </a>
                                        <a href="#" className="text-base font-medium text-gray-900 hover:text-gray-700">
                                            Обучение
                                        </a>
                                    </div>
                                    <div>
                                        <Link href="/signup">
                                            <a className="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-pink-600 hover:bg-pink-700">
                                                Sign up
                                            </a>
                                        </Link>
                                        <p className="mt-6 text-center text-base font-medium text-gray-500">
                                            Existing customer?{' '}
                                            <Link href="/login">
                                                <a className="text-pink-600 hover:text-indigo-500">
                                                    Sign in
                                                </a>                                                
                                            </Link>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </Popover.Panel>
                    </Transition>
                    </>
                )}
            </Popover>            
        </Disclosure>
    )
}