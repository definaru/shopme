import React from 'react'

export function GetCard({children, header = '', headWidget = '', headstyle = 'px-4 py-2', style = 'p-4 '}) 
{
    return (
        <div className={`${header ? '' : style}bg-white rounded shadow-sm my-4`}>
            {header ? 
            <div className={`flex items-center justify-between ${headstyle} border-b border-gray-50`}>
                <h4 class="font-semibold text-md">
                    {header}
                </h4>
                {headWidget}
            </div> : ''}
            <div className={`${header ? style : ''}`}>
                {children}
            </div>
        </div>
    )
}
