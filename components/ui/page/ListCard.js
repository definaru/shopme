import React from 'react'

export function Listcard()
{
    return (
        <div className="flex space-x-3 absolute bottom-8 left-9">
            <img 
                src="/access/img/pay/credit_card_visa.svg" 
                alt="visa" 
                className="h-14 flex-none" 
            />
            <img 
                src="/access/img/pay/credit_eurocard_mastercard.svg" 
                alt="mastercard" 
                className="h-14 flex-none" 
            />
            <img 
                src="/access/img/pay/credit_card_maestro.svg" 
                alt="maestro" 
                className="h-14 flex-none" 
            />
            <img 
                src="/access/img/pay/credit_card_american_express.svg" 
                alt="american express" 
                className="h-14 flex-none" 
            />
            <img 
                src="/access/img/pay/credit_card_discover.svg" 
                alt="discover" 
                className="h-14 flex-none" 
            />
            <img 
                src="/access/img/pay/credit_card_paypal.svg" 
                alt="paypal" 
                className="h-14 flex-none" 
            />
        </div>
    );
}
