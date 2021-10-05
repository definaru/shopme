import { Fragment, useState } from 'react'
import { Listbox, Transition } from '@headlessui/react'
import { SelectorIcon } from '@heroicons/react/solid'
import { ListLang } from '../lang/data/ListLang'


export function Languech() 
{

    const Lang = ListLang()

    const [selected, setSelected] = useState(Lang[0])

    return (
        <div className="w-60">
            <Listbox value={selected} onChange={setSelected}>
                <div className="relative">
                <Listbox.Button className="relative w-full py-2 pl-3 pr-10 text-left rounded-lg cursor-default focus:shadow-md focus:bg-white focus:outline-none focus-visible:ring-opacity-75 focus-visible:border-white sm:text-sm">
                    <span className="truncate flex">
                        <img src={selected.flag} alt={selected.name} className="w-6 h-4 mr-2 mt-1 border" />
                        {selected.name}
                    </span>
                    <span className="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                        <SelectorIcon className="w-5 h-5 text-gray-400" />
                    </span>
                </Listbox.Button>
                <Transition
                    as={Fragment}
                    leave="transition ease-in duration-100"
                    leaveFrom="opacity-100"
                    leaveTo="opacity-0"
                >
                    <Listbox.Options className="absolute w-full py-1 mt-1 overflow-auto text-base bg-white rounded-md shadow-lg max-h-60 ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
                    {Lang.map((lang, i) => (
                        <Listbox.Option key={i} className={({ active }) => `${active ? 'text-pink-600 bg-pink-100' : 'text-gray-900'} cursor-pointer select-none relative py-2 px-4`} value={lang}>
                        {({ selected, active }) => (
                            <>
                            <span
                                className={`${
                                selected ? 'font-medium' : 'font-normal'
                                } truncate flex`}
                            >
                                <img src={lang.flag} alt={lang.name} className="w-6 h-4 mr-2 border" />
                                {lang.name}
                            </span>
                            {selected ? (
                                <span className={`${active ? 'bg-pink-600' : 'text-pink-600'} absolute inset-y-0 left-0 flex items-center pl-3`}>
                                    
                                </span>
                            ) : null}
                            </>
                        )}
                        </Listbox.Option>
                    ))}
                    </Listbox.Options>
                </Transition>
                </div>
            </Listbox>
        </div>
    )
}
