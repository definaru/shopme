import React from 'react'
import { GetCard } from '../card/GetCard'

export function FirstScreen({
    title = 'Здравствуйте, приятно вас видеть!',
    text = 'Теперь вы находитесь в нескольких минутах от творчества, чем когда-либо прежде. Наслаждайтесь!',
    button = 'Создать мой первый проект',
    func = ''
}) 
{
    return (
        <div className="mt-8">
            <GetCard>
                <div className="max-w-xl mx-auto py-20 text-center">
                    <div className="grid gap-7">
                        <img src="/access/img/graphs.svg" alt={title} className="w-full px-20" />
                        <h1 className="font-semibold text-3xl text-gray-900">
                            {title}
                        </h1>
                        <p className="font-normal text-gray-500 text-md">
                            {text}
                        </p>
                        <div className="flex justify-center">
                            <div onClick={() => func(true)} className="cursor-pointer font-bold table bg-pink-600 hover:bg-gray-900 text-white px-9 py-3 rounded">
                                {button}
                            </div>                            
                        </div>
                    </div>
                </div>                 
            </GetCard>
        </div>
    )
}
