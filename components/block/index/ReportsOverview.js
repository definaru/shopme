import React from 'react'
import { FaCircle } from 'react-icons/fa'
import { GetCard } from '../../ui/card/GetCard'

export function ReportsOverview() 
{
    return (
        <>
            <GetCard 
                header="Обзор отчетов"
                headstyle="p-4" 
                headWidget={<div>...</div>}
            >
                <h2 className="text-2xl font-bold py-3">7,431.14 ₽ RUB</h2>
                <div className="relative overflow-hidden w-full h-3 rounded-full bg-pink-50 my-2">
                    <div className="absolute left-0 h-3 bg-pink-500" style={{width: '15%', zIndex: 10}}></div>
                    <div className="absolute left-0 h-3 bg-pink-400" style={{width: '40%', zIndex: 9}}></div>
                    <div className="absolute left-0 h-3 bg-pink-300" style={{width: '70%', zIndex: 8}}></div>
                </div>
                <div className="flex justify-between items-center text-xs text-gray-600 mb-4">
                    <div>0%</div>
                    <div>100%</div>
                </div>

                <table className="w-full">
                    <tr className="border-t border-gray-100">
                        <td className="px-4 py-4">
                            <div className="flex items-center space-x-2 text-gray-500">
                                <FaCircle className="w-3 h-3 text-pink-500" />
                                <span>Gross value</span>
                            </div>
                        </td>
                        <td className="px-4 py-4">
                            <i>3,500.71 ₽</i>
                        </td>
                        <td className="px-4 py-4 text-right">
                            <span className="px-2 py-1 text-green-500 bg-green-100 text-xs font-bold rounded">
                                +12.1%
                            </span>
                        </td>
                    </tr>

                    <tr className="border-t border-gray-100">
                        <td className="px-4 py-4">
                            <div className="flex items-center space-x-2 text-gray-500">
                                <FaCircle className="w-3 h-3 text-pink-400" />
                                <span>Net volume from sales</span>
                            </div>
                        </td>
                        <td className="px-4 py-4">
                            <i>2,980.45 ₽</i>
                        </td>
                        <td className="px-4 py-4 text-right">
                            <span className="px-2 py-1 text-yellow-500 bg-yellow-100 text-xs font-bold rounded">
                                +6.9%
                            </span>
                        </td>
                    </tr>

                    <tr className="border-t border-gray-100">
                        <td className="px-4 py-4">
                            <div className="flex items-center space-x-2 text-gray-500">
                                <FaCircle className="w-3 h-3 text-pink-300" />
                                <span>Gross value</span>
                            </div>
                        </td>
                        <td className="px-4 py-4">
                            <i>950.00 ₽</i>
                        </td>
                        <td className="px-4 py-4 text-right">
                            <span className="px-2 py-1 text-red-500 bg-red-100 text-xs font-bold rounded">
                                -1.5%
                            </span>
                        </td>
                    </tr>
                </table>
                
            </GetCard>
        </>
    )
}
