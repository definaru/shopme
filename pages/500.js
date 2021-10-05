import React from 'react'
import Link from 'next/link'
import Head from 'next/head'
import { Disclosure } from '@headlessui/react'


export default function Custom500() 
{
    return (
        <>
            <Head>
                <title>Server-side error occurred</title>
            </Head>
            <Disclosure as="section" className="bg-white py-10 md:py-16 mt-1">
                <div className="max-w-5xl mx-auto px-4 sm:px-6">
                    <div className="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-6 py-16">
                        <div className="mt-20">
                            <h6 className="text-gray-800 mb-5 text-2xl font-bold">500 - Server-side error occurred</h6>
                            <h1 className="text-pink-600 text-5xl font-bold">Something has gone seriously wrong</h1>
                            <p className="text-lg py-5 text-gray-600">It's always time for a coffee break. We should be back by the time you finish your coffee.</p>    
                            <Link href="/">
                                <a className="table px-10 py-4 font-bold rounded-md bg-pink-600 text-white hover:bg-pink-700">
                                    Go back home
                                </a>
                            </Link>                    
                        </div>
                        <div>
                            <img 
                                src="/access/img/500.svg" 
                                alt="Error 500" 
                                className="ml-20 w-full" 
                            />
                        </div>
                    </div>
                </div>
            </Disclosure>
        </>
    )
}