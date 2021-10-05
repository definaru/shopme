import React from 'react'
import Link from 'next/link'
import Head from 'next/head'
import { Disclosure } from '@headlessui/react'

export default function Custom404() 
{
    return (
        <>
            <Head>
                <title>Page Not Found</title>
            </Head>
            <Disclosure as="section" className="bg-white py-10 md:py-20 mt-1">
                <div className="max-w-5xl mx-auto px-4 sm:px-6">
                    <div className="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-6 py-16">
                        <div>
                            <img 
                                src="/access/img/404.svg" 
                                alt="Error 500" 
                                className="w-full" 
                            />
                        </div>                        
                        <div className="ml-20 mt-20">
                            <h6 className="text-gray-800 mb-5 text-2xl font-bold">Opss...</h6>
                            <h1 className="text-pink-600 text-4xl font-bold">Page Not Found</h1>
                            <p className="text-lg py-5 text-gray-600 block mb-2">
                                Looks like you followed a bad link. If you think this is a problem with us, please tell us.
                            </p>    
                            <Link href="/">
                                <a className="table px-10 py-4 rounded-md bg-pink-600 text-white font-medium hover:bg-pink-700">
                                    Go back home
                                </a>
                            </Link>                    
                        </div>
                    </div>
                </div>
            </Disclosure>
        </>
    )
}