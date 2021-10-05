import React from 'react'

export function GetAvatar(props) 
{
    if(props.item.user.image) {
        return (
            <img 
                className="rounded-full w-10 h-10 object-cover" 
                src={props.item.user.image} 
                alt={props.item.user.name}
            />
        )
    }
    return (
        <div className="grid place-content-center rounded-full w-10 h-10 bg-pink-200 text-pink-600 text-center font-semibold text-2xl">
            {props.item.user.name[0]}
        </div>
    )
}
