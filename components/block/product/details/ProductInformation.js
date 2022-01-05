import React, { useContext } from 'react'
import { ShopContext } from '../../../context/ShopContext'
import { GetCard } from '../../../ui/card/GetCard'
import { Label } from '../../../ui/form/label'


export function ProductInformation(props) 
{
    const {GlobalClass} = useContext(ShopContext)
    

    return (
        <>
            <GetCard 
                header="Информация о товаре"
                headstyle="p-4"
                style="p-4"
            >
                <div className="grid grid-cols-12 gap-5">
                    
                    <div className="col-span-3">
                        <img 
                            src={props.details.image} 
                            alt={props.details.title} 
                            className="w-full object-cover rounded-md" 
                        />
                    </div>
                    <div className="flex flex-col space-y-2 col-span-9">
                        <div>
                            <Label name="Имя" id="name" title="Продукты - товары или услуги, которые вы продаете." />
                            <input 
                                type="text" 
                                placeholder="Название товара..." 
                                defaultValue={props.details.title}
                                className={GlobalClass().InputClass}
                            />                            
                        </div>
                        <div className="grid grid-cols-2 gap-5">
                            <div>
                                <Label name="SKU" />
                                <input 
                                    type="text" 
                                    placeholder="Например. 348121032" 
                                    defaultValue={props.details.SKU}
                                    className={GlobalClass().InputClass}
                                /> 
                            </div>
                            <div>
                                <Label name="Масса" />
                                <div className="flex">
                                    <input 
                                        type="text" 
                                        placeholder="0,0" 
                                        defaultValue={''}
                                        className={GlobalClass('rounded-l-md border-r-0 md:w-3/5').InputClass}
                                    /> 
                                    <select value={'фунт'} className={GlobalClass('rounded-r-md md:w-2/5').InputClass}>
                                        <option value={'фунт'}>фунт</option>
                                        <option value={'унция'}>унция</option>
                                        <option value={'кг'}>кг</option>
                                        <option value={'г'}>г</option>
                                    </select>                          
                                </div>

                                <small className="text-gray-400 block mt-2 text-xs leading-tight">
                                    Используется для расчета стоимости доставки при оформлении 
                                    заказа и маркировки цен во время выполнения заказа.
                                </small>
                            </div>
                        </div>
                    </div>
                    
                    <div className="col-span-12">
                        <Label name="Описание" sub="(необязательно)" />
                        <textarea 
                            rows="5"
                            defaultValue={''}
                            placeholder="Описание товара..."
                            className={GlobalClass().InputClass+' resize-none'}
                        />
                    </div> 
                </div>

                {/* {<pre>{JSON.stringify(props.details, null, 4)}</pre>} */}
            </GetCard>
        </>
    )
}
