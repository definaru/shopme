import React from 'react'

export function Table({children, thead = [], action = true}) 
{

    const CheckboxClass = 'form-tick appearance-none h-5 w-5 border border-gray-300 rounded-md checked:bg-pink-600 checked:border-transparent focus:outline-none'
    
    return (
        <div className="relative z-0 overflow-x-auto">
            <div className="align-middle inline-block min-w-full">
                <div>
                    <table className="min-w-full divide-y divide-gray-200">
                        <thead className="bg-gray-100">
                            <th className="p-4 w-12">
                                <div>
                                    <label>
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
                </div>
            </div>
        </div>
    )
}