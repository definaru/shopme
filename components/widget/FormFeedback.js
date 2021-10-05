import React from 'react'

export function FormFeedback({children, classes = 'mt-2 text-red-400'}) 
{
    return (
        <div className={`text-xs ${classes}`}>
            {children}
        </div>
    )
}