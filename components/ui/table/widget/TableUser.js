import React from 'react'
import { GetStatus } from '../../../helper/status/GetStatus'
import { GetAvatar } from '../../avatar/GetAvatar'

export function TableUser({list = []}) 
{
    return (
        <tbody className="bg-white divide-y divide-gray-200">
            {list.map((item, index) => (
                <tr key={index} className="border-b border-gray-50 bg-transparent hover:bg-gray-50">
                    <td className="px-5 py-2 whitespace-nowrap text-sm text-gray-500">
                        <label data-id={item.id}>
                            <input 
                                type="checkbox" 
                                className="form-tick appearance-none h-5 w-5 border border-gray-300 rounded-md checked:bg-pink-600 checked:border-transparent focus:outline-none" 
                            />
                        </label>
                    </td>
                    <td className="px-5 py-2 pl-0 whitespace-nowrap text-sm text-gray-600">
                        <a className="flex items-center mr-5" href={item.user.href}>
                            <GetAvatar item={item} />
                            <div className="font-bold px-3">
                                <h5 className="text-gray-500 hover:text-pink-600 text-sm mb-0">
                                    {item.user.name}
                                </h5>
                            </div>
                        </a>
                    </td>
                    <td className="px-5 py-2 whitespace-nowrap text-sm text-gray-500">
                        <GetStatus status={item.status} point={true} />
                    </td>
                    <td className="px-5 py-2 whitespace-nowrap text-sm text-gray-500">
                        {item.type}
                    </td>
                    <td className="px-5 py-2 whitespace-nowrap text-sm text-gray-500">
                        <a href={`mailto:${item.email}`} className="no-underline hover:underline text-pink-700">
                            {item.email}
                        </a>
                    </td>
                    <td className="px-5 py-2 whitespace-nowrap text-sm text-gray-500">
                        {item.signed}
                    </td>                    
                    <td className="px-5 py-2 whitespace-nowrap text-sm text-gray-500">
                        <strong>{item.user_id}</strong>
                    </td>                    
                </tr>
            ))}
        </tbody>
    )
}
