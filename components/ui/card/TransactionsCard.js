import React from 'react'
import { PriceFormat } from '../../helper/digital/PriceFormat'
import { GetStatus } from '../../helper/status/GetStatus'
import { GetAvatar } from '../avatar/GetAvatar'


export function TransactionsCard(props) 
{
    return (
        <div className="flex justify-between items-center p-4 bg-white hover:bg-gray-50 cursor-pointer border-b border-gray-100">
            <div className="flex items-center">
                <GetAvatar item={props.item} />
                <div className="grid pl-3">
                    <h3 className="font-semibold">{props.item.user.name}</h3>
                    <small className="text-sx text-gray-400">{props.item.user.type}</small>
                </div>
            </div>
            <div className="flex items-center w-2/4 justify-end">
                <div className="text-left w-1/3">
                    <GetStatus status={props.item.status} point={false} />
                </div>
                <div className="grid text-right w-2/3 place-items-end">
                    <strong className={props.item.profit ? 'text-green-500 font-bold text-md' : 'font-semibold text-md'}>
                        {props.item.profit ? '' : '-'}{PriceFormat(props.item.price)} ₽ RUB
                    </strong>
                    <small className="text-xs text-gray-400">{props.item.date}</small>
                </div>                
            </div>
        </div>
    )
}
