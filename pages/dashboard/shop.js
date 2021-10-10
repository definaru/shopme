import React from 'react'
import Link from 'next/link'
import { MainLayout } from '../../components/layout/MainLayout'
import { ToastContainer, toast } from 'react-toastify'
import Swal from 'sweetalert2'
import 'react-toastify/dist/ReactToastify.css'


export default function Shop() 
{
    const Title = 'Магазины'

    return (
        <MainLayout title={`${Title} | ShopMe`}>
            <div className="grid gap-5">
                <button className="table px-5 py-2 rounded-md bg-gray-900 text-gray-50" onClick={() => toast.success("Wow so easy !", { theme: "colored" })}>Notify !</button>
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

                <ToastContainer
                    position="bottom-right"
                    //autoClose={5000}
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
