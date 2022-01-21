yii.confirm = function (message, okCallback, cancelCallback) {
   swal({
	title: 'Выберите',
        text: message,
        type: 'warning',
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            cancelButtonClass: "btn-info",
            confirmButtonText: 'ДА',
            cancelButtonText: 'НЕТ',
            closeOnConfirm: false,
            closeOnCancel: true,
            allowOutsideClick: true
    }, okCallback);
};