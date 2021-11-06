import axios from 'axios'
import React, { useState } from 'react'
import { MdFileDownload } from 'react-icons/md'
import { GetCard } from '../../components/ui/card/GetCard'
import { MainLayout } from '../../components/layout/MainLayout'
import { convertTimestamp } from '../../components/helper/time/convertTimestamp'
import { BytesToSize } from '../../components/helper/digital/BytesToSize'
import { ToastContainer, toast } from 'react-toastify'
import 'react-toastify/dist/ReactToastify.css'
// import Swal from 'sweetalert2'


export default function Shop() 
{
    const Title = 'Магазины'
    const [preview, setPreview] = useState('')
    const [file, setFile] = useState(null)
    const [lengths, setLengths] = useState(0)
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
        setLengths(e.target.files.length)

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
                    // console.log(JSON.stringify(response.data))    
                    setFile(null)  
                    setLengths(0)
                    setInfo(response.data)
                    toast.success("Uploaded file successlify!", { theme: "colored" })
                })
                .catch(function (error) {
                    console.log(error);
                })

        }
    }

    return (
        <MainLayout title={`${Title} | ShopMe`}>
            <div className="grid grid-cols-3 gap-4 mt-4">
                <GetCard>
                    <h2 className="font-bold text-xl mb-5">Добро пожаловать!</h2>
                    <p>На данный момент у вас нет ни одного проекта.</p>
                </GetCard>
                <GetCard>
                    <div className="block w-full">
                        {preview !== '' ? 
                        <figure className="relative">
                            <div onClick={() => setPreview('')} className="cursor-pointer absolute top-0 right-0 px-4 py-2 bg-white text-gray-900">X</div>
                            <img src={preview} className="w-full pb-5" alt="image preview" />
                            <div className={file === null ? 'hidden' : ''}>
                                <strong>{info.name}</strong>
                                <p>{convertTimestamp(String(info.lastModified).slice(0,-3))}</p>
                                <p><i>{info.type}</i></p>
                                <p>{BytesToSize(info.size)}</p>                                
                            </div>
                        </figure> : 
                        <label className="table w-full py-4 cursor-pointer text-center">
                            <div className="flex justify-center mb-5">
                                <div className="border-dashed border-2 rounded-full w-40 h-40 grid place-content-center">
                                    <MdFileDownload className="w-20 h-20 text-gray-300" />
                                </div>
                            </div>
                             <p className="text-gray-600">Выберите фавикон для проекта</p>
                            {/* Выбрано ${lengths} файлов */}
                            {/* {lengths === 0 ? 'Выберите фавикон для проекта' : ``} */}
                        
                            <input
                                type="file"
                                name="file"
                                accept=".png,.jpg"
                                multiple={true}
                                className="hidden"
                                onChange={handleImagePreview}
                            />                        
                        </label>}

                        <div className="table w-full my-5">
                            <input 
                                type="text" 
                                placeholder="Название проекта" 
                                className="rounded border px-5 py-3 w-full focus:outline-none focus:border-pink-600"
                            />
                        </div>
                        <div className="table w-full mt-5">
                            <button 
                                type="submit" 
                                className="bg-black text-center w-full py-3 rounded text-white"
                                onClick={handleSubmitFile} 
                                value="Submit"
                            >
                                Далее
                            </button>                        
                        </div>
                    </div>
                </GetCard>
                <GetCard>
                    Превью
                </GetCard>


                {/* <button className="table px-5 py-2 rounded-md bg-gray-900 text-gray-50" onClick={() => toast.success("Wow so easy !", { theme: "colored" })}>Notify !</button>
                <button className="table px-5 py-2 rounded-md bg-gray-900 text-gray-50" onClick={() => toast("Wow so easy !", { theme: "dark" })}>Notify !</button>
                <button 
                    className="table px-5 py-2 rounded-md bg-gray-900 text-gray-50" 
                    onClick={() => Swal.fire({
                        title: 'Good job!',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#db2777',
                        cancelButtonColor: '#222',
                        cancelButtonText: 'Close',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Your file has been deleted.',
                                icon: 'success',
                                confirmButtonColor: '#222',
                            })
                        }
                    })}
                >
                    Sweet Alert
                </button>

                 */}
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
            </div>            
        </MainLayout>
    )
}
