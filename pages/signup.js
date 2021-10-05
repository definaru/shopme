import React from 'react'
import Link from 'next/link'
import { AuthLayout } from '../components/layout/AuthLayout'

export default function Signup() 
{
    const Title = 'Create your account'

    return (
        <AuthLayout title={Title}>
            <div className="max-w-md mx-auto md:mt-5">
                <div className="flex flex-col justify-center items-center">
                    <div className="text-center">
                        <h2 className="text-3xl font-bold mb-4">
                            {Title}
                        </h2>
                        <h4 className="text-gray-500">
                            Already have an account? &#160;
                            <Link href="/login">
                                <a className="text-pink-600 no-underline hover:text-gray-800 hover:underline">Sign in here</a>
                            </Link>
                        </h4>
                    </div>
                    <div className="flex flex-col w-full">
                        <div className="flex flex-col justify-center">

                            <button className="flex justify-center items-center rounded-lg py-3 md:px-14 px-8 my-4 md:mx-10 shadow bg-gray-900 hover:bg-gray-50 hover:text-gray-900 text-gray-50">
                                <img src="/access/img/google_icon.svg" className="w-6 mr-2 md:mr-3" />
                                <span className="font-bold">Sign up with Google</span>
                            </button>

                            <p className="text-center border-b w-full">
                                <span className="relative -bottom-3 px-5 bg-white text-gray-500">OR</span>
                            </p>                          
                        </div>
                        <div className="mt-5">
                            <label className="font-medium mt-4 block text-sm">Full name</label>
                            <input 
                                type="text" 
                                className="w-full py-3 px-6 rounded border border-gray-300 focus:outline-none focus:border-gray-600" 
                                placeholder="User Name" 
                            />
                        </div>
                        <div>
                            <label className="font-medium mt-4 block text-sm">Your email</label>
                            <input 
                                type="text" 
                                className="w-full py-3 px-6 rounded border border-gray-300 focus:outline-none focus:border-gray-600" 
                                placeholder="Markwilliams@example.com" 
                            />                            
                        </div>
                        <div>
                            <label className="font-medium mt-4 block text-sm">Password</label>
                            <input 
                                type="password" 
                                className="w-full py-3 px-6 rounded border border-gray-300 focus:outline-none focus:border-gray-600" 
                                placeholder="8+ characters required" 
                            />                            
                        </div>
                        <div>
                            <button className="font-bold w-full bg-pink-600 hover:bg-pink-700 text-gray-50 py-4 text-xl text-center rounded mt-8">
                                Зарегистрироваться
                            </button>
                        </div>
                    </div>
                </div>
            </div>            
        </AuthLayout>

    )
}
