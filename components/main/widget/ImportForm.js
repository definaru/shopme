import React from 'react'
import Link from 'next/link'
import { MdOpenInNew } from 'react-icons/md'

export function ImportForm() 
{

    const onData = [
        {
            image: '/access/img/capsule.svg',
            header: 'Capsule',
            text: 'Users',
            href: '#',
        },
        {
            image: '/access/img/mailchimp.svg',
            header: 'Mailchimp',
            text: 'Users',
            href: '#',
        },
        {
            image: '/access/img/google-webdev.svg',
            header: 'Webdev',
            text: 'Users',
            href: '#',
        }
    ]

    return (
        <>
            {onData?.map((item, i) => (
            <div className="py-4 border-b" key={i}>
                <div className="flex items-center">
                    <div>
                        <img 
                            src={item.image} 
                            className="flex-none w-10 h-10 mr-10" 
                            alt={item.header} 
                        />
                    </div>
                    <div className="flex flex-row justify-between w-full">
                        <div className="flex flex-col">
                            <h4 className="font-semibold">{item.header}</h4>
                            <span className="text-sm text-gray-400"><small>{item.text}</small></span>
                        </div>
                        <div>
                            <Link href={item.href}>
                                <a className="flex items-center bg-gray-800 hover:bg-pink-700 text-white text-sm py-3 px-5 rounded">
                                    Launch importer <MdOpenInNew className="ml-2" />
                                </a>                                
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
            ))}
        </>
    )
}
