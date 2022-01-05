import React, { useContext, useState } from 'react'
import { RiCloseLine } from 'react-icons/ri'
import { ShopContext } from '../../../context/ShopContext'
import { GetCard } from '../../../ui/card/GetCard'


export function Variants() 
{

    const datetime  = (new Date()).toLocaleDateString('ru-RU', { year: 'numeric', month: 'long', day: 'numeric' })
    const {currency, setCurrency, GlobalClass} = useContext(ShopContext)
    const dataBase = [
        {
            id: '1',
            datetime: datetime,
            size: '',
            color: '',
            price: '',
            quantity: '1',
            currency: currency
        }
    ]
    const [str, setStr] = useState(1)
    const [variable, setVariable] = useState(dataBase)
    
    const Delete = (id) => {
        setVariable(dataBase.filter((e) => e.id !== id ))
    }

    return (
        <div className="grid mb-40">
            <GetCard 
                header="Варианты"
                style="px-4 pt-2"
                margin=''
                headWidget={
                    <button onClick={() => setStr(str+1)} className="px-4 py-1 bg-white hover:bg-gray-100 dark:bg-gray-900 dark:hover:bg-gray-800 text-gray-900 dark:text-gray-100 rounded border border-gray-50 dark:border-gray-800 text-base">
                        + Добавить
                    </button>
                }
            >
                <div className="block w-full mb-5">
                    {[...Array(str)].map((item, i) => (
                        <div className="flex items-center justify-between border-b border-gray-50 dark:border-gray-800 py-2" key={i}>
                            <div><input type="text" className={GlobalClass().InputClass} placeholder="size"/></div>
                            <div className="w-20">
                                <input 
                                    type="color" 
                                    style={{padding: 0}}
                                    className={GlobalClass('w-20 h-10').InputClass} 
                                    placeholder="color"
                                />
                            </div>
                            <div className="flex space-x-2">
                                <input type="text" className={GlobalClass().InputClass} placeholder="price"/>
                                <span className="py-2 text-gray-900 dark:text-white">{currency}</span>
                            </div>
                            <div>
                                <input 
                                    type="number" 
                                    min={1} 
                                    defaultValue={1}
                                    className={GlobalClass().InputClass} 
                                    placeholder="Quantity" 
                                />
                            </div>
                            <div>
                                {str === 1 ? '' :
                                <button className="bg-pink-600 text-white px-4 py-3 rounded" onClick={() => setStr(str-1)}>
                                    <RiCloseLine />
                                </button>                                
                                }
                            </div>
                        </div>
                    ))}                    
                </div>
            </GetCard>
        </div>
    )
}