import Swal from 'sweetalert2'

export function GetModal(title, text, icon = 'success', func = '') 
{

    const modal = Swal.fire({
        title: title,
        text: text,
        icon: icon,
        showCancelButton: true,
        confirmButtonColor: '#db2777',
        cancelButtonColor: '#111',
        cancelButtonText: 'Отмена',
        confirmButtonText: 'Да'
    }).then((result) => {
        if (result.isConfirmed) {
            // Swal.fire({
            //     title: 'Deleted!',
            //     text: 'Your file has been deleted.',
            //     icon: 'success',
            //     confirmButtonColor: '#222',
            // })
            func()
        }
    });

    return modal;
}