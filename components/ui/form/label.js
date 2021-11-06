import React, { useContext, useRef } from 'react'
import ReactTooltip from 'react-tooltip'
import { FaRegQuestionCircle } from 'react-icons/fa'
import { ShopContext } from '../../context/ShopContext'


export function Label({children, name = '', title = '', sub = '', size = 'text-xs', id = 'title'}) 
{
    const {theme} = useContext(ShopContext)
    const color = theme ? 'dark' : 'light'
    const detect = useRef(id)

    return (
        <label className={size}>
            <span className="flex items-center space-x-2 mb-1">
                <strong className="text-gray-900 dark:text-gray-100">
                    {name}
                </strong> 
                {title ? 
                <>
                    <FaRegQuestionCircle 
                        data-for={detect.current}
                        data-tip={title}
                        className="text-gray-400 cursor-pointer"
                    />
                    <ReactTooltip id={detect.current} place="top" type={color} effect="solid"/>            
                </> : 
                sub ? <small className="text-gray-400 font-normal">
                    {sub}
                </small> : ''}                
            </span>

            {children}
        </label>
    )
}
