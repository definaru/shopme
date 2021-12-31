import React from 'react'
import { Swiper, SwiperSlide } from 'swiper/react'
import SwiperCore, { Scrollbar, Mousewheel } from 'swiper/core'
SwiperCore.use([Scrollbar, Mousewheel])


export function Table({children, thead = [], action = true, margin = 'pb-40', mousewheel = true, border = 'border'}) 
{

    const CheckboxClass = 'form-tick appearance-none h-5 w-5 border border-gray-300 dark:border-gray-900 rounded-md checked:bg-pink-600 checked:border-transparent focus:outline-none'
    
    return (
        <div className="w-full overflow-hidden">
            <Swiper scrollbar={{"hide": false}} mousewheel={mousewheel} className="bg-gray-50 dark:bg-transparent">
                <SwiperSlide className={margin}>
                    <table className={`w-full ${border}`}>
                        {/*divide-y divide-gray-200 align-middle inline-block min-  relative z-0 overflow-x-auto */}
                        <thead className="bg-gray-100 dark:bg-gray-800">
                            <th className="p-4 w-12">
                                <div>
                                    <label className="flex justify-center items-center">
                                        <input 
                                            type="checkbox" 
                                            className={CheckboxClass} 
                                        />
                                    </label>
                                </div>
                            </th>
                            {thead.map((item, i) => (
                                <th 
                                    key={i} 
                                    scope="col"
                                    className={
                                        `px-5 py-2
                                        ${i === 0 ? ' pl-0' : ''} 
                                        text-left text-xs font-medium text-gray-500 uppercase tracking-wider`
                                    }
                                >
                                    {item.name}
                                </th>                                
                            ))}
                            {action ?
                            <th scope="col" className="relative px-5 py-2">
                                <span className="sr-only">Actions</span>
                            </th> : ''}
                        </thead>
                        {children}
                    </table>
                </SwiperSlide>
                <SwiperSlide />
            </Swiper>             
        </div>

    )
}
