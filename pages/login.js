import React from 'react'
import Link from 'next/link'
import { AuthLayout } from '../components/layout/AuthLayout'
import { LoginDetail } from '../components/block/login/LoginDetail'


export default function Login() 
{

    const Title = 'Войти'

    return (
        <AuthLayout title={Title}>
            <div className="max-w-md mx-auto mt-5">
                <div className="flex flex-col justify-center items-center">
                    <div className="text-center">
                        <h2 className="text-3xl font-bold mb-4">
                            {Title}
                        </h2>
                        <h4 className="text-gray-500">
                            Еще нет учетной записи? &#160;
                            <Link href="/signup">
                                <a className="text-pink-600 no-underline hover:text-gray-800 hover:underline">
                                    Создать
                                </a>
                            </Link>
                        </h4>
                    </div>
                    <LoginDetail title={Title} />
                </div>
            </div>            
        </AuthLayout>
    )
}
