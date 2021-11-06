import React, { useContext } from 'react'
import { FaCircle } from 'react-icons/fa'
import { FiX } from 'react-icons/fi'
import { Scrollbars } from 'react-custom-scrollbars'
import { ShopContext } from '../../context/ShopContext'


export function Panel(props) 
{

    const { theme } = useContext(ShopContext)

    const onData = [
        {
            avatar: 'https://randomuser.me/api/portraits/women/36.jpg',
            name: 'Marilou Harcourt',
            info: 'Added 2 files to task',
            product: 'FD-7',
            href: '#',
            date: 'NOW',
            status: '',
            files: [
                {
                    icon: '/access/img/files/word.svg',
                    name: 'weekly-reports.docx',
                    size: '4kb'
                }
            ]
        },
        {
            avatar: 'https://randomuser.me/api/portraits/men/9.jpg',
            name: 'Carter Richards',
            info: 'Marked',
            product: 'FR-6',
            href: '#',
            date: 'TODAY',
            status: 'Completed',
            files: []
        },
        {
            avatar: 'https://randomuser.me/api/portraits/men/26.jpg',
            name: 'Jian Van der Rijt',
            info: 'Added 2 files to task',
            product: 'FD-7',
            href: '#',
            date: 'NOW',
            status: '',
            files: [
                {
                    icon: '/access/img/files/excel.svg',
                    name: 'weekly-reports.xls',
                    size: '12kb'
                },
                {
                    icon: '/access/img/files/word.svg',
                    name: 'weekly-reports.docx',
                    size: '4kb'
                }
            ]
        }
    ]

    return (
        <div>
            <div className={`flex items-center justify-between px-6 py-3  border-b ${theme ? 'bg-gray-800 border-gray-900' : 'bg-white border-gray-200 '}`}>
                <div>
                    <h2 className={`font-bold text-lg ${theme ? 'text-gray-50' : 'text-black'}`}>
                        Activity stream
                    </h2>
                </div>                
                <div onClick={() => props.setOpen(false)} className={`p-2 rounded-full ${theme ? 'hover:bg-gray-700' : 'hover:bg-gray-100'}`}>
                    <FiX className={`cursor-pointer flex-none w-4 h-4 ${theme ? 'text-gray-50' : 'text-black'}`} />
                </div>                
            </div>
            <Scrollbars 
                autoHide
                universal 
                autoHideTimeout={500}
                style={{ width: '100%', height: 500 }}
            >
                <div className={`border-l-2 h-screen absolute left-11 top-10 z-0 ${theme ? 'border-gray-700' : 'border-gray-200'}`}></div>
                <ul className="relative z-10 px-6">
                {onData?.map((item, i) => (
                    <li key={i} className="py-4">
                        <div className="flex">
                            <div>
                                <img 
                                    src={item.avatar} 
                                    alt={item.name} 
                                    className={`w-11 h-11 rounded-full mr-4 flex-none border-4 ${theme ? 'border-gray-700' : 'border-white'}`} 
                                />
                            </div>
                            <div className="flex flex-col w-full">
                                <div className={`font-semibold text-md pb-1 mt-2 ${theme ? 'text-gray-200' : 'text-black'}`}>
                                    {item.name}
                                </div>
                                <div className="text-gray-500 text-sm">
                                    <small>
                                        {item.info} &middot; 
                                        <a href={item.href} className="text-pink-500 mx-2">
                                            {item.product}
                                        </a>
                                        {item.status ?
                                        <span className={`inline-table px-1 py-1 text-green-500 font-medium rounded-lg ${theme ? 'bg-green-900' : 'bg-green-100'}`}>
                                            <small className="flex space-x-2 items-center font-bold leading-none">
                                                <FaCircle className="w-2 h-2 mr-1" />{item.status}&#160;
                                            </small>
                                        </span> : ''}
                                    </small>
                                </div>
                                {item.files.length ?
                                <div className={`p-4 border rounded my-1 ${theme ? 'bg-gray-700 border-gray-700' : 'bg-gray-50 border-gray-100'}`}>
                                    <div className="flex">
                                        {item.files?.map((file, index) => (
                                            <div key={index} className="flex items-center">
                                                <img src={file.icon} alt={file.name} className="w-8 mr-2" />
                                                <div className="flex flex-col text-sm w-24 text-left leading-tight">
                                                    <p>
                                                        <small className={`truncate w-16 block font-medium ${theme ? 'text-gray-200' : 'text-gray-800'}`}>
                                                            {file.name}
                                                        </small>
                                                    </p>
                                                    <p>
                                                        <small className={theme ? 'text-gray-400' : 'text-gray-300'}>
                                                            {file.size}
                                                        </small>
                                                    </p>
                                                </div>
                                            </div>
                                        ))}                                    
                                    </div>
                                </div> : ''}
                                <div className="text-gray-300 text-sm">{item.date}</div>
                            </div>
                        </div>
                    </li>
                ))}                
                </ul>
            </Scrollbars>
        </div>
    )
}
