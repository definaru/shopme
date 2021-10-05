import React from 'react'
import { ChipsStatus } from '../../ui/chips/ChipsStatus'


export function GetStatus({status, point}) 
{
    if(status === 'Successful') {
        return <ChipsStatus color="green" point={point}>{status}</ChipsStatus>
    } else if (status === 'Completed') {
        return <ChipsStatus color="green" point={point}>{status}</ChipsStatus>
    } else if (status === 'Pending') {
        return <ChipsStatus color="yellow" point={point}>{status}</ChipsStatus>
    } else if (status === 'Failed') {
        return <ChipsStatus color="red" point={point}>{status}</ChipsStatus>
    } else if (status === 'Overdue') {
        return <ChipsStatus color="red" point={point}>{status}</ChipsStatus>
    }
    return (
        <ChipsStatus>{status}</ChipsStatus>
    )
}
