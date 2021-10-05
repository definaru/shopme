import React from 'react'
import { FaRegQuestionCircle } from 'react-icons/fa'
import { GetCard } from '../../../ui/card/GetCard'


export function ProductInformation(props) 
{
    const InputClass = 'px-4 py-2 rounded border border-gray-200 w-full focus:border-gray-300 focus:outline-none'

    return (
        <>
            <GetCard 
                header="Информация о товаре"
                headstyle="p-4"
                style="p-4"
            >
                <div className="grid grid-cols-12 gap-5">
                    <div class="col-span-3">
                        <img 
                            src={props.details.image} 
                            alt={props.details.title} 
                            className="w-full object-cover rounded-md" 
                        />
                    </div>
                    <div class="flex flex-col space-y-2 col-span-9">
                        <div>
                            <label className="flex items-center space-x-2 mb-1 text-xs">
                                <strong>Имя</strong> 
                                <FaRegQuestionCircle 
                                    className="text-gray-400 cursor-pointer" 
                                    title="Продукты - товары или услуги, которые вы продаете." 
                                />
                            </label>
                            <input 
                                type="text" 
                                placeholder="Название товара..." 
                                value={props.details.title}
                                className={InputClass}
                            />                            
                        </div>
                        <div className="grid grid-cols-2 gap-5">
                            <div>
                                <label className="font-semibold mb-1 text-xs">SKU</label>
                                <input 
                                    type="text" 
                                    placeholder="Например. 348121032" 
                                    value={props.details.SKU}
                                    className={InputClass}
                                /> 
                            </div>
                            <div>
                                <label className="font-semibold mb-1 text-xs">Масса</label>
                                <input 
                                    type="text" 
                                    placeholder="0,0" 
                                    value={''}
                                    className={InputClass}
                                /> 
                                <small className="text-gray-400 block mt-2 text-xs leading-tight">
                                <p>Используется для расчета стоимости доставки при оформлении 
                                заказа и маркировки цен во время выполнения заказа.</p>
                                </small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-span-12">
                        <label className="font-semibold block mb-1 text-sm">
                            Описание <small className="text-gray-400 font-normal">(необязательно)</small>
                        </label>
                        <textarea 
                            rows="5"
                            placeholder="Описание товара..."
                            className={InputClass}
                        />
                    </div> 
                    
                </div>
                {/* {<pre>{JSON.stringify(props.details, null, 4)}</pre>} */}
            </GetCard>
        </>
    )
}
