import React, { useState, useEffect  } from 'react'
import Link from 'next/link'
import { AuthLayout } from '../components/layout/AuthLayout'
import { useForm } from 'react-hook-form'
import { useRouter } from 'next/router'
import { FormFeedback } from '../components/widget/FormFeedback'
import { VscLoading } from 'react-icons/vsc'


export default function Login() 
{

    const Title = 'Войти'
    const ClassInput = 'w-full py-3 px-6 rounded border border-gray-300 focus:outline-none focus:border-gray-600'
    const ClassInputError = 'w-full py-3 px-6 rounded border border-red-600 focus:outline-none focus:border-gray-600'

    const [valid, setValid] = useState(null)
    const [loading, setLoading] = useState(false)

    const router = useRouter()
    const { register, handleSubmit, watch, formState: { errors } } = useForm()
    const email = watch('email')
    const password = watch('password')

    const onSubmit = data => {
        console.log(data)
        setValid(data)
    }

    useEffect(() => {
        if(valid !== null) {
            setLoading(true);
            sessionStorage.setItem('user', email);
            setTimeout(() => {router.push('/dashboard')}, 500) 
        } 
    }, [valid])

    const isValidEmail = () => {
        if(email === 'test@yandex.ru') {
            return true
        }
        else return false
    }
  
    const isValidPass = () => {
        if(password === 'qwerty') {
            return true
        } 
        else return false
    }

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
                    <form onSubmit={handleSubmit(onSubmit)} className="flex flex-col w-full mt-10">
                        <div>
                            <label className="font-medium mt-4 block text-sm mb-2">
                                Логин
                            </label>
                            <input 
                                type="text"
                                {...register('email', { 
                                    required: true,
                                    pattern: /^((([0-9A-Za-z]{1}[-0-9A-z\.]{1,}[0-9A-Za-z]{1})|([0-9А-Яа-я]{1}[-0-9А-я\.]{1,}[0-9А-Яа-я]{1}))@([-0-9A-Za-z]{1,}\.){1,2}[-A-Za-z]{2,})$/u,
                                    validate: {isValidEmail} 
                                })} 
                                className={errors.email ? `${ClassInputError}` : `${ClassInput}`}
                                placeholder="Введите ваш e-mail"
                                defaultValue={email}
                            />
                            {
                                errors.email &&
                                <>
                                    {errors.email.type === 'required' && 
                                        <FormFeedback>Укажите ваш e-mail адрес</FormFeedback>
                                    }      
                                    {errors.email.type === 'pattern' && 
                                        <FormFeedback>Данный адрес не является электронной почтой</FormFeedback>
                                    } 
                                    {errors.email.type === 'isValidEmail' && 
                                        <FormFeedback>Логин указан не верно или не существует</FormFeedback>
                                    }  
                                </>
                            }                           
                        </div>
                        <div>
                            <div className="flex justify-between mb-2">
                                <div>
                                    <label className="font-medium mt-4 block text-sm">
                                        Пароль
                                    </label>
                                </div>
                                <div>
                                    <Link href="/reset-password">
                                        <a className="text-gray-800 mt-4 block no-underline hover:text-pink-600 hover:underline text-sm">
                                            Забыл пароль?
                                        </a>
                                    </Link>
                                </div>
                            </div>
                            <input 
                                type="password" 
                                {...register('password', { 
                                    required: true,
                                    validate: {isValidPass}
                                })}
                                className={errors.password ? `${ClassInputError}` : `${ClassInput}`}
                                placeholder="Введите ваш пароль" 
                                defaultValue={password}
                            />   
                            {
                                errors.password &&
                                <>
                                    {errors.password.type === 'required' && 
                                        <FormFeedback>Введите ваш пароль</FormFeedback>
                                    }
                                    {errors.password.type === 'isValidPass' && 
                                        <FormFeedback>Не верно указан пароль</FormFeedback>
                                    }  
                                </>
                            } 
                        </div>
                        <div>
                            <button className="font-bold w-full bg-pink-600 hover:bg-pink-700 text-gray-50 py-4 text-xl text-center rounded mt-8 focus:outline-none">
                                {loading ? 
                                <div className="flex justify-center">
                                    <VscLoading className="animate-spin h-7 w-7 mr-3"/> Loading...
                                </div>
                                : Title}
                            </button>
                        </div>
                    </form>
                    {/* <pre>{JSON.stringify(valid, null, 2)}</pre> */}
                </div>
            </div>            
        </AuthLayout>
    )
}
