import React from 'react'

export function HeadPanel({
    title = '',
    widget = '',
    list = []
}) 
{
    return (
        <div className="flex items-center justify-between pb-5 border-b border-gray-100 dark:border-gray-800 mb-5">
            <div className="flex flex-col">
                <h1 className="text-3xl font-bold text-gray-900 dark:text-gray-100">
                    {title}
                </h1>
                <div className="flex space-x-3 py-3">
                    {list.length ? 
                    <>
                        {list.map((item, i) => (
                            <a key={i} href={item.href} className="flex items-center space-x-2 text-gray-500 hover:text-pink-600">
                                <item.icon /><span>{item.button}</span>
                            </a>                         
                        ))}
                    </>
                    : ''}
                </div>
            </div>
            {widget}
        </div>
    )
}
