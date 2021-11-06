import axios from 'axios'
import React, { useState } from 'react'
import { FaRegQuestionCircle, FaTimes } from 'react-icons/fa'
import { MdFileDownload } from 'react-icons/md'
import { GetCard } from '../../ui/card/GetCard'
import ReactTooltip from 'react-tooltip'
import { ToastContainer, toast } from 'react-toastify'
import 'react-toastify/dist/ReactToastify.css'


export function Project(props) 
{

    const [preview, setPreview] = useState('')
    const [file, setFile] = useState(null)
    const [info, setInfo] = useState(null)

    const handleImagePreview = (e) => {

        let image_as_base64 = URL.createObjectURL(e.target.files[0])
        let image_as_files = e.target.files[0]

        const reader = {
            size: image_as_files.size,
            name: image_as_files.name,
            lastModified: image_as_files.lastModified,
            lastModifiedDate: image_as_files.lastModifiedDate,
            type: image_as_files.type,
        }
        setInfo(reader)
        setPreview(image_as_base64)
        setFile(image_as_files)
    }

    const handleSubmitFile = () => {

        if (file !== null) {
            
            const item = new FormData()
            item.append('file', file)

            const config = {
                url: `https://shopme.su/api/v3/upload`,
                method: 'POST',
                mode: 'no-cors',
                data : item,
                headers: {
                    Accept: 'application/json',
                    'Content-Type': 'multipart/form-data charset=UTF-8'
                }
            }

            axios(config)
                .then(function (response) {
                    console.log(JSON.stringify(response.data))    
                    setFile(null)
                    setInfo(response.data)
                    toast.success("Uploaded file successlify!", { theme: "colored" })
                })
                .catch(function (error) {
                    console.log(error);
                    toast.error(error, { theme: "colored" })
                })

        }
    }

    function ButtonFooter() 
    {
        return (
            <div className="flex space-x-3">
                <div onClick={() => props.func(false)} className="font-bold cursor-pointer px-8 py-3 rounded border bg-gray-50 hover:bg-gray-100">Закрыть</div>
                <div onClick={handleSubmitFile} className="font-bold text-white cursor-pointer px-8 py-3 rounded border bg-pink-600 hover:bg-gray-900">Сохранить изменения</div>
            </div>
        )
    }

    return (
        <div className="mt-8">
            <GetCard 
                header="Details" 
                headstyle="px-8 py-4"
                style="pb-2 px-8 pt-4"
                footer={true}
                content={<ButtonFooter />}
                headWidget={<div onClick={() => props.func(false)} className="cursor-pointer"><FaTimes /></div>}
            >
                <div className="flex items-center">
                    <div className="mr-10">
                        {preview !== '' ? 
                        <figure className="py-4">
                            <p className="text-gray-400 mb-3">Project logo</p>
                            <img 
                                src={preview} 
                                className="w-28" 
                                alt="image preview" 
                            />
                        </figure> :
                        <label className="table w-full py-4 cursor-pointer text-center">
                            <p className="text-gray-400">Project logo</p>
                            <div className="flex justify-center mt-3">
                                <div className="bg-gray-50 border-dashed border-2 rounded-full w-28 h-28 grid place-content-center">
                                    <MdFileDownload className="w-16 h-16 text-gray-300" />
                                </div>
                            </div>
                            <input
                                type="file"
                                name="file"
                                accept=".png,.jpg"
                                multiple={true}
                                className="hidden"
                                onChange={handleImagePreview}
                            />                        
                        </label>}
                    </div>                    
                    <div>
                        {preview ?
                        <div 
                            className="px-7 py-2 rounded border cursor-pointer"
                            onClick={() => setPreview('')}
                        >
                            Delete
                        </div> : 
                        <ul className="text-gray-400 list-decimal grid gap-2 ml-10">
                            <li>Допускаются только логотипы компаний и существующих брендов</li>
                            <li>Запрещено нарушать авторские права</li>
                            <li>Файлы только с расширением .jpeg .jpg .png ( не более 1Gb )</li>
                        </ul>}
                    </div>                    
                </div>
                <div className="table w-full my-5">
                    <label className="flex items-center space-x-2 py-2">
                        <span className="font-bold">Project name</span>
                        <FaRegQuestionCircle 
                            data-for='question'
                            data-tip='Будет виден в публичных страницах и проектах' 
                            className="text-gray-500 cursor-pointer" 
                        />
                        <ReactTooltip id='question' place="top" type="dark" effect="solid"/>
                    </label>
                    <input 
                        type="text" 
                        name="project"
                        placeholder="Enter project name here" 
                        className="rounded border px-5 py-3 w-full focus:outline-none focus:border-pink-600"
                    />
                </div>
                <div className="table w-full my-5">
                    <label className="flex items-center space-x-2 py-2">
                        <span className="font-bold">Project description</span>
                        <small className="text-gray-500">(Optional)</small>
                    </label>
                    <textarea 
                        name="description"
                        placeholder="Type your message..."
                        rows="6"
                        className="rounded border px-5 py-3 w-full focus:outline-none focus:border-pink-600 resize-none"
                    />                    
                </div>

                <ToastContainer
                    position="bottom-right"
                    autoClose={5000}
                    autoClose={false}
                    hideProgressBar={false}
                    newestOnTop={false}
                    closeOnClick
                    rtl={false}
                    pauseOnFocusLoss
                    draggable
                    pauseOnHover
                />

            </GetCard>
        </div>
    )
}
