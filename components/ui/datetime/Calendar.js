import React, { useState, useContext, forwardRef } from 'react'
import { ShopContext } from '../../context/ShopContext'
import { CalendarIcon } from '@heroicons/react/outline'
import DatePicker from 'react-datepicker'
import 'react-datepicker/dist/react-datepicker.css'


export function Calendar() 
{
    const {theme} = useContext(ShopContext)
    const [startDate, setStartDate] = useState(new Date())
    const date = new Date().toLocaleDateString('ru')
    const CustomInput = forwardRef(({ value, onClick }, ref) => (
        <button className="bg-transparent" onClick={onClick} ref={ref}>
            {value}
        </button>
    ))

    return (
        <div className="flex items-center space-x-2 text-sm text-gray-800 dark:text-gray-50 relative z-10">
            <DatePicker 
                selected={startDate}
                calendarClassName={theme ? 'dark_calendar' : 'white_calendar'}
                onChange={(date) => setStartDate(date)} 
                //isClearable
                customInput={<CustomInput />}
                dateFormat="MMMM d, yyyy"
                placeholderText={date}
            />
            <CalendarIcon className="w-4 h-4 text-gray-400" data-status={theme} />
        </div>
    )
}
