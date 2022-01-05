import React, { useContext } from 'react'
import Select from 'react-select'
import { ShopContext } from '../../../context/ShopContext'
import { dataCurrency } from '../../../data/dataCurrency'
//import { jsx } from '@emotion/react'

export function SelectCurrency({classes})
{
    const options = dataCurrency()
    const {currency, setCurrency} = useContext(ShopContext)

    const onSelect = (option) => {
        const id = option.value
        setCurrency(id)
        console.log(id)
    }

    return (
        <>
            <Select 
                closeMenuOnSelect={false}
                options={options} 
                onChange={onSelect}
                defaultValue={options[0]}
                classNamePrefix="shopme-select"
                className={classes}
                components={
                    { 
                        //DropdownIndicator:() => null, 
                        IndicatorSeparator:() => null 
                    }
                }
            />
        </>
    )
}