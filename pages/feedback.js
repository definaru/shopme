import React, { useState } from 'react'
import Link from 'next/link'
import { IndexLayout } from '../components/layout/IndexLayout'
import { dataFeedback } from '../components/data/dataFeedback'
import { Disclosure } from '@headlessui/react'
import { BsArrowReturnRight } from 'react-icons/bs'
import { FiChevronDown, FiX } from 'react-icons/fi'


export default function Feedback() 
{
    const Title = 'Обратная связь'
    const Description = 'Платформа `Shop Me` поможет решить ваши вопросы.'
    

    const lists = dataFeedback()

    const [open, setOpen] = useState('')
    const [select, setSelect] = useState('Выберите из списка...')
    const [result, setResult] = useState(null)
    const Data = open ? lists.filter(name => name.slug.includes(open))[0] : ''
    const { image, header, text, description, list, slug } = Data

    const handleChange = (e) => {
        setSelect(e.target.value)
        setResult(list.filter(a => a.value.includes(e.target.value))[0])
    }

    const Close = () => {
        setOpen('')
        setSelect('Выберите из списка...')
        setResult(null)
    }

    return (
        <IndexLayout title={Title} description={Description}>
            <Disclosure as="section" className="bg-pink-600 py-6 px-4 md:px-0 md:py-20">
                <div className="max-w-6xl mx-auto md:px-4 sm:px-6 md:mt-20 mt-10">
                    <div className="flex flex-col">
                        <div className="flex justify-center">
                            <h2 className="text-2xl md:text-5xl text-white font-extrabold mb-3">
                                {Title}
                            </h2>
                        </div>
                    </div>
                </div>
            </Disclosure> 
            <Disclosure as="section" className="bg-gray-50 py-6 px-4 md:px-0 md:py-20">
                <div className="max-w-6xl mx-auto md:px-4 sm:px-6">
                    <div className="grid gap-3 text-center">
                        <p className="text-sm text-gray-400">МЫ МОЖЕМ ВАМ ПОМОЧЬ</p>
                        <h2 className="text-gray-900 font-bold text-4xl">Какой У Вас Вопрос ?</h2>
                    </div>                     
                </div>
                <div className="max-w-6xl mx-auto md:px-4 sm:px-6">
                    {open ?
                        <div className="grid grid-cols-3 gap-7 bg-white shadow-md rounded mt-10">
                            <div className="pl-10 py-10">
                                <img 
                                    src={image} 
                                    alt={header} 
                                    className="w-full" 
                                />
                            </div>
                            <div className="col-span-2 relative p-10">
                                <button 
                                    onClick={Close} 
                                    className="cursor-pointer text-2xl text-gray-900 absolute top-6 right-6"
                                >
                                    <FiX />
                                </button>
                                <div className="grid h-full">
                                    <div className="grid gap-5 place-content-center">
                                        <h2 className="font-bold text-4xl text-black">{header}</h2>
                                        <p className="text-xl text-gray-600">{description}</p>
                                        {list ?
                                        <div className="grid gap-4 mr-20">
                                            <div className="relative">
                                                <select value={select} onChange={handleChange} className="w-full appearance-none bg-gray-100 border border-gray-100 rounded px-4 py-3 focus:outline-none focus:border-gray-200">
                                                    <option disabled>Выберите из списка...</option>
                                                    {list.map((items, index) => (
                                                        <option key={index} value={items.value}>{items.value}</option>
                                                    ))}
                                                </select>
                                                <div className="absolute flex inset-y-0 items-center px-3 py-1 mt-1 mb-1 mr-1 right-0 text-gray-700 bg-gray-100 rounded-r pointer-events-none">
                                                    <FiChevronDown className="w-5 h-5" />
                                                </div>
                                            </div>

                                            {result === null ? '' :
                                            <div>
                                                <p>{result.answer}</p>
                                                <div>
                                                    <Link href={result.href.link}>
                                                        <a className="border-b hover:border-gray-700 hover:text-gray-700 border-pink-600 text-pink-600">
                                                            {result.href.button}
                                                        </a>
                                                    </Link>                                            
                                                </div>                                            
                                            </div>}
                                        </div> : ''}                                        
                                    </div>

                                </div>
                            </div>
                        </div> :
                        <div className="grid grid-cols-3 gap-7 mt-14">
                            {lists.map((item, i) => (
                                <div key={i} onClick={() => setOpen(item.slug)} className="grid gap-4 group cursor-pointer rounded shadow-md bg-white text-center p-10">
                                    <div className="flex justify-center">
                                        <img 
                                            src={item.image} 
                                            alt={item.header} 
                                            className="w-32 h-32 block filter grayscale group-hover:grayscale-0" 
                                        />
                                    </div>
                                    <h6 className="font-bold text-2xl text-gray-700 group-hover:text-black">{item.header}</h6>
                                    <p className="text-gray-400 group-hover:text-gray-600">
                                        {item.text}
                                    </p>
                                </div>
                            ))}
                        </div>                        
                    }
                    

                    <div className="max-w-6xl mx-auto mt-10">
                        <div className="grid gap-4 rounded bg-cover bg-no-repeat bg-top text-white shadow-md p-10 bg-gray-900" style={{backgroundImage: 'url(https://defina.ru/img/159364263444344.svg)'}}>
                            <h2 className="text-6xl font-extrabold">Defina Community</h2>
                            <p className="text-3xl block font-light">Здесь находятся решения.</p>
                            <div className="block my-2">
                                <a href="https://defina.ru/community" className="table bg-pink-600 hover:bg-indigo-900 rounded text-2xl shadow px-14 py-4 text-white font-bold" target="_blank">
                                    <div className="flex items-center space-x-2">
                                        <BsArrowReturnRight className="w-7 h-7 stroke-1" /> 
                                        <span>Перейти</span>                                    
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </Disclosure>
           
        </IndexLayout>
    )
}
