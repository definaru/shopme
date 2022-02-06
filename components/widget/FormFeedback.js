import React from 'react'

export function FormFeedback({children, classes = 'mt-2 text-red-400 focus:text-red-600'}) 
{
    return (
        <div className={`text-xs ${classes}`}>
            {children}
        </div>
    )
}