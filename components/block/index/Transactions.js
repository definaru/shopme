import React from 'react'
import { GetCard } from '../../ui/card/GetCard'
import { TransactionsCard } from '../../ui/card/TransactionsCard'
import { Calendar } from '../../ui/datetime/Calendar'


export function Transactions() 
{

    const List = [
        {
            user: {
                image: '',
                name: 'Bob Dean',
                type: 'Transfer to bank account'
            },
            status: 'Pending',
            price: '290',
            date: '15 May, 2021',
            profit: true
        },
        {
            user: {
                image: 'https://htmlstream.com/front-dashboard/assets/svg/brands/slack.svg',
                name: 'Slack',
                type: 'Subscription payment'
            },
            status: 'Completed',
            price: '11',
            date: '12 May, 2021',
            profit: false
        },
        {
            user: {
                image: 'https://htmlstream.com/front-dashboard/assets/svg/brands/bank-of-america.svg',
                name: 'Bank of America',
                type: 'Withdrawal to bank account'
            },
            status: 'Completed',
            price: '3500',
            date: '10 May, 2021',
            profit: true
        },
        {
            user: {
                image: 'https://htmlstream.com/front-dashboard/assets/svg/brands/spotify.svg',
                name: 'Spotify',
                type: 'Subscription payment'
            },
            status: 'Failed',
            price: '10',
            date: '02 May, 2021',
            profit: false
        }
    ]

    return (
        <>
            <GetCard 
                header="Последние транзакции"
                headstyle="p-4" 
                headWidget={<Calendar />}
                style="p-0"
            >
                {List.map((item, i) => 
                    <TransactionsCard key={i} item={item} />
                )}
            </GetCard>
        </>
    )
}
