import React from 'react'
import { FaRegQuestionCircle } from 'react-icons/fa'
import { MdStar } from 'react-icons/md'
import { GetCard } from '../../../ui/card/GetCard'


export function Pricing(props) 
{
    const InputClass = 'px-4 py-2 rounded border border-gray-200 w-full focus:border-gray-300 focus:outline-none'

    return (
        <>
            <GetCard 
                header="Ценообразование"
                headstyle="p-4"
                style="p-4"
            >
                <div>
                    <label className="font-bold block mb-1 text-xs">Цена</label>
                    <div className="flex">
                        <input 
                            type="text" 
                            placeholder="Например. 348121032" 
                            value={props.details.price}
                            className={InputClass}
                        /> 
                        <select className={InputClass}>
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

                    <p><hr /></p>
                    <div className="w-full pt-2">
                        <label class="flex items-center justify-between">
                            <div className="flex items-center space-x-2 cursor-pointer">
                                <span>Доступность</span>                                 
                                <FaRegQuestionCircle 
                                    className="text-gray-400 flex-none cursor-pointer" 
                                    title="Переключатель доступности продукта Toggler." 
                                />
                            </div>
                            <div className="switch mt-1">
                                <input type="checkbox" />
                                <span class="slider round"></span>                            
                            </div>
                        </label>
                    </div>


                </div>
                {/* {<pre>{JSON.stringify(props.details, null, 4)}</pre>} */}
            </GetCard>
        </>
    )
}
