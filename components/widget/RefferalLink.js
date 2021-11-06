import React, { useState, useEffect, useContext }  from 'react'
import { FaRegCopy } from 'react-icons/fa'
import { CopyToClipboard } from 'react-copy-to-clipboard'
import { ShopContext } from '../context/ShopContext'


export function RefferalLink() 
{
    const Refferal = 'https://shopme.ee/wer9n8x3453465'
    const {toast} = useContext(ShopContext)
    const [copied, setCopied] = useState(false)

    useEffect(() => {
        if (copied) {
            toast.success("Link copied to clipboard", { theme: "colored", autoClose: 5000 })
            setCopied(false)
        }
    }, [copied])

    return (
        <div className="relative -top-10">
            <label className="text-gray-600 dark:text-gray-400 text-sm block mb-2">Ваша рефферальная ссылка:</label>
            <div className="flex group">
                <CopyToClipboard
                    text={Refferal}
                    onCopy={() => setCopied(true)}
                >
                    <div className="select-all w-80 bg-transparent border-r-0 focus:outline-none text-gray-900 dark:text-gray-100 rounded-l-md border border-gray-100 dark:border-gray-800 px-4 py-3" >
                        {Refferal}
                    </div>
                </CopyToClipboard>
                <CopyToClipboard
                    text={Refferal}
                    onCopy={() => setCopied(true)}
                >
                    <button className="group bg-transparent text-gray-800 dark:text-gray-100 flex items-center cursor-pointer border border-gray-100 dark:border-gray-800 px-4 py-3 rounded-r-md focus:bg-gray-100 dark:focus:bg-gray-700">
                        <FaRegCopy className="dark:group-focus:text-green-500 group-focus:text-pink-500 w-5 h-5" />
                    </button>
                </CopyToClipboard>
            </div>
        </div>
    )
}
