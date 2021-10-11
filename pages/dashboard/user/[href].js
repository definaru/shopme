import React from 'react'
import Link from 'next/link'
import { useRouter } from 'next/router'
import { MainLayout } from '../../../components/layout/MainLayout'
import { UserList } from '../../../components/data/UserList'
import { BiBuildings, BiMap, BiCalendar, BiPencil, BiListUl } from 'react-icons/bi'
import { GoVerified } from 'react-icons/go'
import { FiMoreVertical } from 'react-icons/fi'
import ReactTooltip from 'react-tooltip'
import { GetCard } from '../../../components/ui/card/GetCard'
import { MdFileDownload, MdQuestionAnswer, MdShare, MdRepeat, MdPhone } from 'react-icons/md'
import { FaBriefcase, FaCircle, FaMailBulk, FaUserFriends } from 'react-icons/fa'
import { DropdownMenu } from '../../../components/ui/dropdown/DropdownMenu'


export default function DetailUser() 
{
    const router = useRouter()
    const { href } = router.query
    const detailUser = href ? UserList().filter(name => name.user_id.includes(href))[0] : {} 
    const { id, user, status, type, email, signed, user_id } = detailUser
    const Title = href ? user?.name : 'Profile'
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

    function Select() 
    {
        return (
            <DropdownMenu
                options={<FiMoreVertical className="w-5 h-5" />} 
                lists={Menus}
                style='relative rounded-full w-10 h-10 cursor-pointer grid place-items-center'
            />
        )
    }

    return (
        <MainLayout title={`${Title} | ShopMe`}>
            <div className="w-full block mt-10">
                <div className="max-w-5xl mx-auto">
                    <div 
                        className="w-full block relative p-20 rounded-lg bg-cover bg-no-repeat bg-center bg-pink-600" 
                        style={{backgroundImage: `url(/access/img/service.png)`}}
                    >
                        <div className="flex justify-center">
                            <div className="top-20 absolute">
                                <img 
                                    src={href ? user?.image : ''} 
                                    alt={href ? user?.name : ''} 
                                    className="w-28 h-28 object-cover object-center rounded-full border-4 border-white"
                                />
                                <FaCircle className="text-green-500 w-6 h-6 absolute bottom-1 right-2 border-4 rounded-full border-white" />
                            </div>
                        </div>
                    </div>
                    <div className="w-full mt-5">
                        <div className="max-w-3xl mx-auto text-center">
                            <div className="flex justify-center items-center space-x-2">
                                <h3 className="py-4 text-3xl font-semibold">
                                    {href ? user?.name : ''} 
                                </h3>
                                <spav
                                    data-for='verified'
                                    data-tip='Аккаунт подтверждён'
                                    className="cursor-pointer"
                                >
                                    <GoVerified className="w-4 h-4 text-green-500" />
                                </spav>
                                <ReactTooltip id='verified' place="top" type="light" effect="solid"/>
                            </div>
                            <div className="flex justify-center space-x-8 text-gray-500">
                                <div className="flex items-center space-x-2">
                                    <BiBuildings /> <span>Pixeel Ltd.</span>
                                </div>
                                <div className="flex items-center space-x-2">
                                    <BiMap /> <a href="#" className="text-pink-600 no-underline hover:underline">London, UK</a>
                                </div>
                                <div className="flex items-center space-x-2">
                                    <BiCalendar /> <span>Joined March 2013</span>
                                </div>
                            </div>
                        </div>                        
                    </div>

                    <div className="flex justify-between w-full border-b border-gray-200 mt-5">
                        <div className="flex font-medium">
                            <div className="cursor-pointer border-b-4 border-pink-600 px-5 py-3">Profile</div>
                            <div className="cursor-pointer border-b-4 border-transparent px-5 py-3">Teams</div>
                            <div className="cursor-pointer border-b-4 border-transparent px-5 py-3">Projects</div>
                            <div className="cursor-pointer border-b-4 border-transparent px-5 py-3">Connections</div>
                        </div>
                        <div className="flex justify-end space-x-2 mb-2">
                            <div className="bg-white cursor-pointer flex items-center space-x-2 rounded-md px-4 py-2 shadow-sm">
                                <BiPencil className="text-xl" /> <span>Edit profile</span>
                            </div>
                            <div className="bg-white cursor-pointer flex items-center rounded-md px-4 py-2 shadow-sm">
                                <BiListUl className="text-xl" />
                            </div>
                            <div className="bg-white rounded-md px-1 flex items-center shadow-sm">
                                <Select />
                            </div>
                        </div>
                    </div>
                    
                    <div className="grid grid-cols-12 gap-5">
                        <div className="col-span-4">

                            <GetCard style="px-6 py-4 ">
                                <h2 className="text-lg font-semibold pb-3 text-gray-500">Complete your profile</h2>
                                <div className="flex items-center space-x-3">
                                    <div className="relative overflow-hidden w-full h-3 rounded-full bg-pink-50 my-2">
                                        <div className="absolute left-0 h-3 bg-pink-500" style={{width: '15%', zIndex: 10}} />
                                    </div>                                    
                                    <div>15%</div>
                                </div>
                            </GetCard>

                            <GetCard 
                                header="Profile"
                                headWidget={<div className="bg-white cursor-pointer space-x-2 rounded-md px-4 py-1 border">Edit</div>}
                            >
                                <div className="grid gap-9 text-gray-500">
                                    <div className="grid gap-2">
                                        <label className="font-semibold text-gray-400">CONTACTS</label>
                                        <p className="flex items-center space-x-2">
                                            <FaMailBulk className="text-gray-900" /> <a href={`mailto:${email}`} className="no-underline hover:underline">{email}</a>
                                        </p>
                                        <p className="flex items-center space-x-2">
                                            <MdPhone className="text-gray-900" /> <a href={`tel:${'+1 (555) 752-01-10'}`} className="no-underline hover:underline">+1 (555) 752-01-10</a>
                                        </p>
                                    </div>
                                    <div className="grid gap-2">
                                        <label className="font-semibold text-gray-400">TEAMS</label>
                                        <p className="flex items-center space-x-2">
                                            <FaUserFriends className="text-gray-900" /> 
                                            <span>You are not a member of any teams</span>
                                        </p>
                                        <p className="flex items-center space-x-2">
                                            <FaBriefcase className="text-gray-900" /> 
                                            <span>You are not working on any projects</span>
                                        </p>
                                    </div>
                                </div>
                            </GetCard>

                            <GetCard>
                                <div className="grid grid-cols-1 gap-5 place-items-center py-5 px-6">
                                    <img src="/access/img/unlock.svg" className="w-36" alt="Activity stream" />
                                    <h2 className="text-gray-900 font-semibold text-xl">
                                        2-step verification
                                    </h2>

                                    <p className="text-gray-600 text-sm text-center">
                                        Protect your account now and enable 2-step verification in the settings.
                                    </p>
                                    <a href="#" className="bg-black cursor-pointer flex items-center rounded-md px-8 py-3  hover:bg-pink-700 text-white">
                                        Enable Now
                                    </a>                                
                                </div>
                            </GetCard>

                        </div>
                        <div className="col-span-8">
                            <GetCard 
                                header="Activity stream"
                                headWidget={<Select />}
                            >
                                <div className="grid grid-cols-1 gap-4 place-items-center">
                                    <div className="py-16 flex text-center flex-col space-y-6">
                                        <img src="/access/img/yelling.svg" className="w-40" alt="Activity stream" />
                                        <p className="text-gray-400">No data to show</p>
                                        <div className="bg-white cursor-pointer flex items-center rounded-md px-4 py-2 border border-gray-900 hover:bg-gray-900 hover:text-white">
                                            Start your Activity
                                        </div>
                                    </div>                                    
                                </div>
                            </GetCard>
                            <GetCard 
                                header="Projects"
                                headWidget={<Select />}
                            >
                                <div className="grid grid-cols-1 gap-4 place-items-center">
                                    <div className="py-16 flex text-center flex-col space-y-6">
                                        <img src="/access/img/yelling.svg" className="w-40" alt="Projects" />
                                        <p className="text-gray-400">No data to show</p>
                                        <div className="bg-white cursor-pointer flex items-center rounded-md px-4 py-2 border border-gray-900 hover:bg-gray-900 hover:text-white">
                                            Start your Projects
                                        </div>
                                    </div>                                    
                                </div>
                            </GetCard>
                        </div>
                    </div>
                </div>            
            </div>            
        </MainLayout>
    )
}
