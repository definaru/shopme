import React from 'react'
import { Disclosure, Transition } from '@headlessui/react'
import { ChevronUpIcon } from '@heroicons/react/solid'


export function Faq() 
{

    const onDataQ = [
        {
            header: 'А что за оффер?',
            text: 'Брокер, представленный в 136 странах мира и завоевавший 12 престижных международных наград всего за шесть лет. Это Olymp Trade. Основной доход брокера состоит из комиссий и спредов от торговли трейдера на различных финансовых активах. Начав работать с нами, можно получать от 50% до 60% дохода брокера с каждого трейдера, приведенного на платформу.'
        },
        {
            header: 'Как это работает?',
            text: 'Партнерская ссылка размещается на своем сайте или в рекламном объявлении. Пользователи по ссылке регистрируются как трейдеры и вносят депозит. Партнер получает до 60% от всех комиссий с каждого привлеченного трейдера + доход от субпартнерства.'
        }, 
        {
            header: 'А если я не знаю о партнерках ничего?',
            text: 'Чтобы стать партнером не нужно платить за вступление. А привлекать клиентов можно даже без опыта. Средний доход новичка в нашей партнерке только за первый месяц работы $240, и это не предел.'
        }
    ]

    return (
        <React.Fragment>
            <Disclosure as="section" className="bg-gray-50 py-6 px-4 md:px-0 md:py-20">
                <div className="max-w-2xl mx-auto px-0 md:px-6 py-20">
                    <div className="flex justify-center">
                        <h2 className="text-2xl md:text-4xl text-gray-900 font-extrabold mb-14">
                            Ответы на вопросы
                        </h2>
                    </div>
                    <div className="flex flex-col w-full text-xl space-y-4">
                        {onDataQ?.map((item, idx) => (
                            <Disclosure as="div" key={idx}>
                            {({ open }) => (
                                <>
                                <Disclosure.Button className={`${open ? 'bg-white bg-opacity-80 rounded-t' : 'bg-gray-50 rounded-lg'} flex justify-between text-sm md:text-lg w-full px-4 py-2 font-medium text-left hover:bg-white bg-opacity-25 focus:outline-none`}>
                                    <span>{item.header}</span>
                                    <ChevronUpIcon className={`${open ? '' : 'transform rotate-180'} w-5 h-5 text-gray-900 flex-none`}
                                />
                                </Disclosure.Button>
                                <Transition
                                    show={open}
                                    enter="transition duration-300 ease-out"
                                    enterFrom="transform scale-95 opacity-0"
                                    enterTo="transform scale-100 opacity-100"
                                    leave="transition duration-200 ease-out"
                                    leaveFrom="transform scale-100 opacity-100"
                                    leaveTo="transform scale-95 opacity-0"
                                >
                                    <Disclosure.Panel className={`p-4 text-base font-light text-gray-400 ${open ? 'bg-white bg-opacity-80 rounded-b' : ''}`}>
                                        {item.text}
                                    </Disclosure.Panel>
                                </Transition>
                                </>
                            )}
                            </Disclosure>                
                        ))}
                    </div>
                </div>

            </Disclosure> 
            <Disclosure as="section" className="bg-pink-600 py-6 px-4 md:px-0 md:py-20">
                <div className="max-w-6xl mx-auto md:px-4 sm:px-6">
                    <div className="flex flex-col">
                        <div className="flex justify-center">
                            <h2 className="text-2xl md:text-5xl text-white font-extrabold mb-3">Остались вопросы?</h2>
                        </div>
                        <div className="flex justify-center text-center text-gray-50">
                            <p>
                                {`Напишите нам на `}
                                <a href="mailto:info@shopme.su" className="text-gray-200 hover:text-pink-200 border-b border-dotted border-pink-200 hover:border-pink-300 hover:border-solid">
                                    info@shopme.su
                                </a>, 
                                {` ответим обязательно`}
                            </p>
                        </div>
                    </div>
                </div>
            </Disclosure>           
        </React.Fragment>

    )
}