import React from 'react'
import Link from 'next/link'
import { AuthLayout } from '../components/layout/AuthLayout'
import { ArrowNarrowLeftIcon } from '@heroicons/react/solid'

export default function ResetPassword() 
{

    const Title = 'Reset Password'

    return (
        <AuthLayout title={Title}>
            <div className="max-w-sm mx-auto md:mt-5">
                <div className="flex flex-col justify-center items-center">
                    <div className="flex w-full h-96 items-center">
                        <div className="flex flex-col w-full">
                            <div className="text-center mt-2 md:mt-20">
                                <h2 className="text-3xl font-bold my-4">
                                    Forgot password?
                                </h2>
                                <h4 className="text-gray-500 py-5">
                                    Enter the email address you used when you joined 
                                    and we'll send you instructions to reset your password.
                                </h4>
                            </div>                            
                            <div>
                                <label className="font-medium mt-4 block text-sm mb-2">Your email</label>
                                <input 
                                    type="text" 
                                    className="w-full py-3 px-6 rounded border border-gray-300 focus:outline-none focus:border-gray-600" 
                                    placeholder="markwilliams@example.com" 
                                />                            
                            </div>
                            <div>
                                <button className="font-bold w-full bg-pink-600 hover:bg-pink-700 text-gray-50 py-4 text-xl text-center rounded mt-5 focus:outline-none">
                                    Отправить
                                </button>
                            </div>
                            <div className="flex justify-center">
                                <Link href="/login">
                                    <a className="flex text-pink-600 mt-5 hover:text-pink-900">
                                        <ArrowNarrowLeftIcon className="w-6 h-6 mr-2" /> Назад
                                    </a>
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AuthLayout>
    )
}
