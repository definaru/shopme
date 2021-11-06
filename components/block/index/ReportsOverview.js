import React from 'react'
import { FaCircle } from 'react-icons/fa'
import { GetCard } from '../../ui/card/GetCard'
import { MdFileDownload, MdQuestionAnswer, MdShare, MdRepeat } from 'react-icons/md'
import { FiMoreVertical } from 'react-icons/fi'
import { DropdownMenu } from '../../ui/dropdown/DropdownMenu'


export function ReportsOverview() 
{

    const Menus = [
        {
            title: 'SETTINGS'         
        },
        {
            header: 'Share chart',
            href: '#',
            icon: MdShare            
        },
        {
            header: 'Download',
            href: '#',   
            icon: MdFileDownload         
        },
        {
            header: 'Connect other apps',
            href: '#',   
            icon: MdRepeat         
        },
        {
            title: 'FEEDBACK'
        },
        {
            header: 'Report',
            href: '#',
            icon: MdQuestionAnswer
        }
    ]

    function Select(props) {
        // {props.toWhat}
        return (
            <DropdownMenu
                options={<FiMoreVertical className="w-5 h-5" />} 
                lists={Menus}
                style='relative dark:text-gray-50 hover:bg-gray-50 rounded-full w-10 h-10 cursor-pointer grid place-items-center'
            />
        )
    }
    
    return (
        <>
            <GetCard 
                header="Обзор отчетов"
                headstyle="px-4 py-2" 
                headWidget={<Select />}
                style="px-4 pt-4"
            >
                <h2 className="text-2xl font-bold py-3 text-gray-900 dark:text-gray-100">7,431.14 ₽ RUB</h2>
                <div className="relative z-0 overflow-hidden w-full h-3 rounded-full bg-pink-50 dark:bg-gray-700 my-2">
                    <div className="absolute left-0 h-3 bg-pink-500" style={{width: '15%', zIndex: 10}}></div>
                    <div className="absolute left-0 h-3 bg-pink-400" style={{width: '40%', zIndex: 9}}></div>
                    <div className="absolute left-0 h-3 bg-pink-300" style={{width: '70%', zIndex: 8}}></div>
                </div>
                <div className="flex justify-between items-center text-xs text-gray-600 dark:text-gray-300 mb-4">
                    <div>0%</div>
                    <div>100%</div>
                </div>

                <table className="w-full">
                    <tr className="border-t border-gray-100 dark:border-gray-800">
                        <td className="px-4 py-4">
                            <div className="flex items-center space-x-2 text-gray-500">
                                <FaCircle className="w-3 h-3 text-pink-500" />
                                <span>Gross value</span>
                            </div>
                        </td>
                        <td className="px-4 py-4 text-gray-900 dark:text-gray-200">
                            <i>3,500.71 ₽</i>
                        </td>
                        <td className="px-4 py-4 text-right">
                            <span className="px-2 py-1 text-green-500 bg-green-100 dark:bg-green-900 text-xs font-bold rounded">
                                +12.1%
                            </span>
                        </td>
                    </tr>

                    <tr className="border-t border-gray-100 dark:border-gray-800">
                        <td className="px-4 py-4">
                            <div className="flex items-center space-x-2 text-gray-500">
                                <FaCircle className="w-3 h-3 text-pink-400" />
                                <span>Net volume from sales</span>
                            </div>
                        </td>
                        <td className="px-4 py-4 text-gray-900 dark:text-gray-200">
                            <i>2,980.45 ₽</i>
                        </td>
                        <td className="px-4 py-4 text-right">
                            <span className="px-2 py-1 text-yellow-500 bg-yellow-100 dark:bg-yellow-800 text-xs font-bold rounded">
                                +6.9%
                            </span>
                        </td>
                    </tr>

                    <tr className="border-t border-gray-100 dark:border-gray-800">
                        <td className="px-4 py-4">
                            <div className="flex items-center space-x-2 text-gray-500">
                                <FaCircle className="w-3 h-3 text-pink-300" />
                                <span>Gross value</span>
                            </div>
                        </td>
                        <td className="px-4 py-4 text-gray-900 dark:text-gray-200">
                            <i>950.00 ₽</i>
                        </td>
                        <td className="px-4 py-4 text-right">
                            <span className="px-2 py-1 text-red-500 bg-red-100 dark:bg-red-900 text-xs font-bold rounded">
                                -1.5%
                            </span>
                        </td>
                    </tr>
                </table>
                
            </GetCard>
        </>
    )
}
