import React, { useEffect, useContext } from 'react'
import Link from 'next/link'
import { VscLoading } from 'react-icons/vsc'
import { useRouter } from 'next/router'
import { useForm } from 'react-hook-form'
import { useCryptoGenerator } from '../../helper/crypto/useCryptoGenerator'
import { FormFeedback } from '../../widget/FormFeedback'
import { ShopContext } from '../../context/ShopContext'


export function LoginDetail(props)
{
    const router = useRouter()
    const { status } = router.query
    const ClassInput = 'w-full py-3 px-6 rounded border border-gray-300 focus:outline-none focus:border-gray-600'
    const ClassInputError = 'w-full py-3 px-6 rounded border border-red-600 focus:outline-none focus:border-gray-600'

    const { loading, valid, toast, setValid, setLoading } = useContext(ShopContext)
    const { register, handleSubmit, watch, formState: { errors } } = useForm()
    const email = watch('email')
    const password = watch('password')

    if (status === 'logout') {
        toast.info("Вы успешно вышли из системы.", { theme: "colored" })
        setTimeout(() => {router.push('/login')}, 500)
    }

    const onSubmit = data => {
        console.log(data)
        setValid(true)
    }

    useEffect(() => {
        if(valid === true) {
            setLoading(true);
            const send = `${valid.email}:${Date.now()}`
            const result = useCryptoGenerator(send)
            const User = {
                id: 1,
                email: valid.email,
                token: result.encode,
                avatar: 'https://randomuser.me/api/portraits/med/women/14.jpg',
                username: 'Lola',
                lastname: 'Matthews'
            }
            sessionStorage.setItem('user', JSON.stringify(User));
            setTimeout(() => {router.push('/dashboard')}, 500)
        } else {
            sessionStorage.removeItem('user')
        }
    }, [valid])

    const isValidEmail = () => {
        return (email === 'lola.matthews@example.com') ? true : false
    }
  
    const isValidPass = () => {
        return (password === 'qwerty') ? true : false
    }


    return (
        <>
            <form onSubmit={handleSubmit(onSubmit)} className="flex flex-col w-full mt-10">
                <div>
                    <label className="font-medium mt-4 block text-sm mb-2 text-gray-500">
                        Логин
                    </label>
                    <input 
                        type="text"
						autoComplete="off" 
						autoCorrect="off" 
						autoCapitalize="words" 
						spellCheck="false"
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
                            <label className="font-medium mt-4 block text-sm text-gray-500">
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
                        : props.title}
                    </button>
                </div>
            </form>        
        </>

    )
}