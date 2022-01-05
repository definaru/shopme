import React, { useContext } from 'react'
import { MdStar } from 'react-icons/md'
import { ShopContext } from '../../../context/ShopContext'
import { GetCard } from '../../../ui/card/GetCard'
import { Label } from '../../../ui/form/label'
import { SelectCurrency } from '../details/SelectCurrency'
import Select from 'react-select'


export function Pricing(props) 
{
    const {GlobalClass} = useContext(ShopContext)
    const ColourOption = [
        { value: 'ocean', label: 'Ocean', color: '#00B8D9', isFixed: true },
        { value: 'blue', label: 'Blue', color: '#0052CC', isDisabled: true },
        { value: 'purple', label: 'Purple', color: '#5243AA' },
        { value: 'red', label: 'Red', color: '#FF5630', isFixed: true },
        { value: 'orange', label: 'Orange', color: '#FF8B00' },
        { value: 'yellow', label: 'Yellow', color: '#FFC400' },
        { value: 'green', label: 'Green', color: '#36B37E' },
        { value: 'forest', label: 'Forest', color: '#00875A' },
        { value: 'slate', label: 'Slate', color: '#253858' },
        { value: 'silver', label: 'Silver', color: '#666666' }
    ]

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
                            defaultValue={props.details.price}
                            className={GlobalClass('rounded-l-md border-r-0 w-2/4').InputClass}
                        /> 
                        <SelectCurrency classes='w-44 shopme-select' />
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
                                    <span className="slider round" />                            
                                </div>                                
                            </Label>
                        </div>
                    </div>
                </div>
                {/* {<pre>{JSON.stringify(props.details, null, 4)}</pre>} */}
            </GetCard>

            <GetCard 
                header="Организация"
                headstyle="p-4"
                style="p-4"
            >
                <div className="grid gap-4">
                    <div>
                        <Label name="Продавец" />
                        <input 
                            type="text" 
                            placeholder="Имя или название компании" 
                            defaultValue={props.details?.vendor?.name ?? ''}
                            className={GlobalClass().InputClass}
                        />
                    </div>
                    <div>
                        <Label name="Категория" />
                        <select onChange={(e) => e.target.value} defaultValue={props.details?.type ?? ''} className={GlobalClass().InputClass}>
                            <option value={'Clothing'}>Clothing</option>
                            <option value={'Shoes'}>Shoes</option>
                            <option value={'Electronics'}>Electronics</option>
                            <option value={'Others'}>Others</option>
                        </select>
                    </div>
                    <div>
                        <Label name="Коллекция" />
                        <select onChange={(e) => e.target.value} defaultValue={'Summer'} className={GlobalClass().InputClass}>
                            <option value={'Winter'}>Winter</option>
                            <option value={'Spring'}>Spring</option>
                            <option value={'Summer'}>Summer</option>
                            <option value={'Autumn'}>Autumn</option>
                        </select>
                        <small className="text-gray-400 block mt-2 text-xs leading-tight">
                            Добавьте этот товар в коллекцию, чтобы его было легко найти в вашем магазине.
                        </small>
                    </div>
                    <div>
                        <Label name="Теги" />
                        <Select
                            isMulti
                            name="tags"
                            defaultValue={[ColourOption[3], ColourOption[4], ColourOption[7]]}
                            placeholder="Введите теги здесь"
                            options={ColourOption}
                            components={
                                { 
                                    DropdownIndicator:() => null, 
                                    IndicatorSeparator:() => null 
                                }
                            }
                            classNamePrefix="select-tag"
                        />
                    </div>
                </div>

            </GetCard>
        </>
    )
}
