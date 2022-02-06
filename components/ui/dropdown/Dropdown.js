import { useEffect, Fragment, useContext } from 'react'
import { Menu, Transition } from '@headlessui/react'
import { ChevronDownIcon, CheckIcon } from '@heroicons/react/solid'
import { ShopContext } from '../../context/ShopContext'


export default function Dropdown({
    arrow = false,
    image = false,
    style = 'text-base',
    list = []
}) 
{
    const {lang, setLang} = useContext(ShopContext)

    useEffect(() => {
        const langues = localStorage.getItem('lang') ? localStorage.getItem('lang') : lang
        localStorage.setItem('lang', langues)   
        setLang(langues)    
    }, []);

    return (
        <Menu as="div" className="relative inline-block text-left">
            <div>
                <Menu.Button className={`text-gray-500 group bg-white rounded-md inline-flex items-center font-medium hover:text-gray-900 focus:outline-none ${style}`}>
                    {image ? 
                    <img 
                        src={`/access/img/flags/${lang}.svg`} 
                        className="w-7 h-5 object-cover shadow border-t" 
                        alt={lang}
                    /> 
                    : lang}
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
                <Menu.Items className="origin-top-right absolute right-0 mt-0 w-40 rounded-md shadow-lg bg-white z-20 focus:outline-none">
                    <div className="py-1">
                        {list.map((item, i) => (
                        <Menu.Item key={i}>
                            <div 
                                onClick={() => setLang(`${item.current}`)}
                                className={`cursor-pointer ${lang === item.current ? 'bg-gray-50' : 'bg-transparent'} flex justify-between items-center space-x-2 hover:bg-gray-100 text-gray-600 hover:text-gray-900 px-5 py-2 text-sm`}
                            >
                                <span className={lang === item.current ? 'font-bold' : ''}>{item.header}</span>
                                {lang === item.current ? <CheckIcon className="w-4 h-4 text-pink-600" /> : ''}
                            </div>
                        </Menu.Item>                            
                        ))}
                    </div>
                </Menu.Items>
            </Transition>       
        </Menu>
    )
}
