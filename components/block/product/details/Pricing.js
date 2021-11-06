import React, { useContext } from 'react'
import { MdStar } from 'react-icons/md'
import { ShopContext } from '../../../context/ShopContext'
import { GetCard } from '../../../ui/card/GetCard'
import { Label } from '../../../ui/form/label'


export function Pricing(props) 
{
    const {GlobalClass} = useContext(ShopContext)
    return (
        <>
            <GetCard 
                header="Ценообразование"
                headstyle="p-4"
                style="p-4"
            >
                <div>
                    <Label name="Цена" />
                    <div className="flex">
                        <input 
                            type="text" 
                            placeholder="Например. 348121032" 
                            value={props.details.price}
                            className={GlobalClass('rounded-l-md border-r-0 w-4/6').InputClass}
                        /> 
                        <select className={GlobalClass('rounded-r-md w-2/6').InputClass}>
                            <option value="USD">USD</option>
                            <option value="AED">AED</option>
                            <option value="AFN">AFN</option>
                            <option value="ALL">ALL</option>
                            <option value="AMD">AMD</option>
                            <option value="ANG">ANG</option>
                            <option value="AOA">AOA</option>
                            <option value="ARS">ARS</option>
                            <option value="AUD">AUD</option>
                            <option value="AWG">AWG</option>
                        </select>
                    </div>
                </div>
                <div className="grid gap-2 mt-3">
                    <div className="grid gap-3 py-4">
                        <p className="group flex items-center space-x-2 group">
                            <MdStar className="text-yellow-500 text-xl" /> 
                            <span className="text-pink-500 no-underline group-hover:underline text-sm cursor-pointer group-hover:text-gray-600">
                                Set "Compare to" price
                            </span>
                        </p>
                        <p className="flex items-center space-x-2 group">
                            <MdStar className="text-yellow-500 text-xl" /> 
                            <span className="text-pink-500 no-underline group-hover:underline text-sm cursor-pointer group-hover:text-gray-600">
                                Bulk discount pricing
                            </span>
                        </p>
                    </div>
                    <div className="w-full pt-2 border-t border-gray-100 dark:border-gray-800">
                        <div className="pt-1">
                            <Label 
                                name="Доступность" 
                                id="availability" 
                                title="Переключатель доступности продукта" 
                                size="flex items-center justify-between cursor-pointer text-base"
                            >
                                <div className="switch mt-1">
                                    <input type="checkbox" />
                                    <span class="slider round"></span>                            
                                </div>                                
                            </Label>
                        </div>
                    </div>
                </div>
                {/* {<pre>{JSON.stringify(props.details, null, 4)}</pre>} */}
            </GetCard>
        </>
    )
}
