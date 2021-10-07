import React from 'react'
import Link from 'next/link'
import { MainLayout } from '../../components/layout/MainLayout'
import { FiPlus, FiMoreVertical } from 'react-icons/fi'
import { AnaliticsContent } from '../../components/main/widget/AnaliticsContent'
import { ImportForm } from '../../components/main/widget/ImportForm'
import { MonthlyExpenses } from '../../components/main/widget/MonthlyExpenses'
import { Table } from '../../components/ui/table/Table'
import { FiSearch } from 'react-icons/fi'
import { DropdownSelect } from '../../components/ui/dropdown/DropdownSelect'
import { TableUser } from '../../components/ui/table/widget/TableUser'
import { Transactions } from '../../components/block/index/Transactions'
import { ReportsOverview } from '../../components/block/index/ReportsOverview'
import { DropdownMenu } from '../../components/ui/dropdown/DropdownMenu'
import { MdFileDownload, MdQuestionAnswer, MdShare, MdRepeat } from 'react-icons/md'


export default function Index() 
{

    const Title = 'Dashboard'
    const Lists = [
        {
            id: 1,
            user: {
                image: 'https://htmlstream.com/front-dashboard/assets/img/160x160/img10.jpg',
                name: 'Amanda Harvey',
                href: '#'
            },
            status: 'Successful',
            type: 'Unassigned',
            email: 'amanda@example.com',
            signed: '1 year ago',
            user_id: '67989'
        },
        {
            id: 2,
            user: {
                image: '',
                name: 'Anne Richard',
                href: '#'
            },
            status: 'Successful',
            type: 'Subscription',
            email: 'anne@example.com',
            signed: '6 months ago',
            user_id: '67326'
        },
        {
            id: 3,
            user: {
                image: 'https://htmlstream.com/front-dashboard/assets/img/160x160/img3.jpg',
                name: 'David Harrison',
                href: '#'
            },
            status: 'Overdue',
            type: 'Non-subscription',
            email: 'david@example.com',
            signed: '6 months ago',
            user_id: '55821'
        },
        {
            id: 4,
            user: {
                image: 'https://htmlstream.com/front-dashboard/assets/img/160x160/img5.jpg',
                name: 'Finch Hoot',
                href: '#'
            },
            status: 'Pending',
            type: 'Subscription',
            email: 'finch@example.com',
            signed: '1 year ago',
            user_id: '85214'
        }
    ]
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

    return (
        <MainLayout title={`${Title} | ShopMe`}>
            <div className="w-full h-full mb-80">
                <div className="flex items-center justify-between py-5 border-b border-gray-100 mb-5">
                    <div>
                        <h1 className="text-3xl font-bold text-gray-900">
                            {Title}
                        </h1>
                    </div>
                    <div>
                        <Link href="/dashboard/addtask">
                            <a className="table px-10 py-4 rounded bg-pink-600 hover:bg-pink-700 text-md text-yellow-50">
                                <div className="flex items-center gap-2 font-semibold">
                                    <FiPlus className="text-white w-5 h-5" />
                                     <span>Создать проект</span> 
                                </div>
                            </a>
                        </Link>
                    </div>
                </div>
                <AnaliticsContent />
                <div className="grid grid-cols-12 gap-5 my-5">
                    <div className="col-span-5 bg-white rounded shadow-sm">
                        <div className="flex flex-col">
                            <div className="flex items-center justify-between p-4 border-b border-gray-50">
                                <h4 className="font-semibold text-md">Импортировать данные в ShopMe</h4>
                                <DropdownMenu 
                                    options={<FiMoreVertical className="w-5 h-5" />} 
                                    lists={Menus}
                                    style='relative hover:bg-gray-50 rounded-full w-10 h-10 cursor-pointer grid place-items-center'
                                />
                            </div>                                
                            <div className="p-4">
                                <p className="text-sm text-gray-400">
                                    Смотрите и разговаривайте со своими пользователями и лидерами сразу, 
                                    импортируя свои данные на платформу ShopMe.
                                </p>
                                <div className="flex flex-col mt-4">
                                    <div className="py-4 border-b">
                                        <h4 className="font-semibold text-md">Import users from:</h4>
                                    </div>
                                    <ImportForm />
                                    <div className="py-4 px-3">
                                        <p>
                                            <small className="text-gray-400">
                                                Или вы можете синхронизировать данные с ShopMe, 
                                                чтобы ваши данные всегда были актуальными.
                                            </small>
                                        </p>
                                    </div>
                                </div>
                                
                            </div>                                
                        </div>
                    </div>
                    <div className="col-span-7 bg-white rounded shadow-sm">
                        <MonthlyExpenses />
                    </div>
                </div>

                <div className="grid bg-white rounded shadow-sm mb-3">
                    <div className="flex items-center justify-between px-4 py-1 border-b border-gray-50">
                        <div>
                            <div className="text-lg font-bold">
                                Пользователи
                            </div>
                        </div>                        
                        <div className="flex space-x-2">
                            <div className="flex space-x-2">
                                <div className="flex items-center">
                                    <p className="pr-3 text-gray-500 text-sm">Статус:</p>
                                    <DropdownSelect 
                                        style='px-3 py-2 text-sm space-x-2 bg-white border border-gray-50 rounded'
                                        arrow={true}
                                        list={
                                        [
                                            {header: 'Все'},
                                            {header: 'Успешные'},
                                            {header: 'Заблокированы'},
                                            {header: 'Ожидают'}
                                        ]
                                    } />
                                    <p className="px-3 text-gray-500 text-sm">Зарегистрирован:</p>
                                    <DropdownSelect 
                                        style='px-3 py-2 text-sm space-x-2 bg-white border border-gray-50 rounded'
                                        arrow={true}
                                        list={
                                        [
                                            {header: 'Весь период'},
                                            {header: '1 год назад'},
                                            {header: '6 месяцев назад'}
                                        ]
                                    } />
                                </div>
                            </div>  
                            <div className="flex items-center px-2 py-2 rounded bg-white hover:bg-gray-100 focus:bg-gray-50">
                                <FiSearch className="opacity-25 mr-2" />
                                <input 
                                    type="search" 
                                    name="search" 
                                    placeholder="Поиск..." 
                                    className="placeholder-gray-300 bg-transparent focus:outline-none text-sm"
                                />
                            </div>
                        </div>
                    </div>
                    <Table 
                        action={false}
                        thead={[
                            {name: 'Ф.И.О.'},
                            {name: 'СТАТУС'},
                            {name: 'ТИП'},
                            {name: 'E-MAIL'},
                            {name: 'Зарегистрирован'},
                            {name: 'USER ID'}
                        ]}
                    >
                        <TableUser list={Lists} />
                    </Table>                    
                </div>
                <div className="grid md:grid-cols-2 grid-cols-1 md:gap-5 gap-0">
                    <div>
                        <Transactions />
                    </div>
                    <div>
                        <ReportsOverview />
                    </div>
                </div>
                		
            </div>
        </MainLayout>
    )
}
