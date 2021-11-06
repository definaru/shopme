import React from 'react'

export function GetCard({
    children, 
    content = '',
    header = '', 
    footer = false,
    headWidget = '', 
    headstyle = 'px-4 py-2', style = 'p-4 ', margin = 'my-4'
}) 
{
    return (
        <div className={`${header ? '' : style}bg-white dark:bg-gray-900 rounded shadow-sm ${margin}`}>
            {header ? 
            <div className={`flex items-center justify-between ${headstyle} border-b border-gray-50 dark:border-gray-800`}>
                <h4 className="font-semibold text-md text-gray-900 dark:text-gray-100">
                    {header}
                </h4>
                {headWidget}
            </div> : ''}
            <div className={`${header ? style : ''}`}>
                {children}
            </div>
            {footer ?
            <div className={`flex items-center justify-end ${headstyle} border-t border-gray-50 dark:border-gray-800`}>
                {content}
            </div> : ''}
        </div>
    )
}
