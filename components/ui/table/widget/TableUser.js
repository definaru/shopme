import React from 'react'
import Link from 'next/link'
import { GetStatus } from '../../../helper/status/GetStatus'
import { GetAvatar } from '../../avatar/GetAvatar'


export function TableUser({list = []}) 
{
    return (
        <tbody className="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-black rounded-b-md">
            {list.map((item, index) => (
                <tr key={index} className="border-b border-gray-200 dark:border-0 bg-transparent dark:border-black dark:hover:bg-black hover:bg-gray-50">
                    <td className="px-5 py-2 whitespace-nowrap text-sm text-gray-500">
                        <label data-id={item.id}>
                            <input 
                                type="checkbox" 
                                className="form-tick appearance-none h-5 w-5 border dark:border-gray-700 border-gray-300 rounded-md checked:bg-pink-600 checked:border-transparent focus:outline-none" 
                            />
                        </label>
                    </td>
                    <td className="px-5 py-2 pl-0 whitespace-nowrap text-sm text-gray-600">
                        <Link href="/dashboard/user/[href]" as={`/dashboard/user/${item.user_id}`}>
                            <a className="flex items-center mr-5">
                                <GetAvatar item={item} />
                                <div className="font-bold px-3">
                                    <h5 className="text-gray-500 dark:text-gray-50 dark:hover:text-pink-600 hover:text-pink-600 text-sm mb-0">
                                        {item.user.name}
                                    </h5>
                                </div>
                            </a>
                        </Link>
                    </td>
                    <td className="px-5 py-2 whitespace-nowrap text-sm text-gray-500">
                        <GetStatus status={item.status} point={true} />
                    </td>
                    <td className="px-5 py-2 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200">
                        {item.type}
                    </td>
                    <td className="px-5 py-2 whitespace-nowrap text-sm text-gray-500">
                        <a href={`mailto:${item.email}`} className="no-underline hover:underline text-pink-700">
                            {item.email}
                        </a>
                    </td>
                    <td className="px-5 py-2 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200">
                        {item.signed}
                    </td>                    
                    <td className="px-5 py-2 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200">
                        <strong>{item.user_id}</strong>
                    </td>                    
                </tr>
            ))}
        </tbody>
    )
}
