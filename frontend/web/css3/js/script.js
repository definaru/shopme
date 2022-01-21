$(function () {
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });
});


function get_new_step(element) {
    var data_id = jQuery(element).parents('.block_item').attr('data-id'),
        data_step = jQuery(element).parents('.block_item').attr('data-step')*1 + 1*1;

    
    jQuery(element).parents('.table_item_input TBODY').append('<tr><td><div class="block_item_input"><input type="number" min="0" class="form-control" placeholder="От (кол-во)" name="Pricepartner[pills_price]['+ data_id +']['+ data_step +'][num]"></td><td><input type="number" min="0" class="form-control" placeholder="Цена" name="Pricepartner[pills_price]['+ data_id +']['+ data_step +'][price]"></td><td><a class="btn btn-default" onclick="jQuery(this).parent().parent().remove();"><i class="fa fa-times"></i></a></td></tr>');

    jQuery(element).parents('.block_item').attr('data-step', data_step);
}


function catalog_index_readmore(id) {
	var read_more = jQuery('#catalog-tr-'+id).attr('data-read-more');
	if (read_more == 'none') {
		jQuery('#catalog-tr-'+id).attr('data-read-more', 'view');
		jQuery('#catalog-tr-desc-'+id).slideDown(300);
		jQuery('#catalog-tr-'+id).find('.catalog-tr-read-more .fa').removeClass('fa-plus');
		jQuery('#catalog-tr-'+id).find('.catalog-tr-read-more .fa').addClass('fa-minus');
	} else {
		jQuery('#catalog-tr-'+id).attr('data-read-more', 'none');
		jQuery('#catalog-tr-desc-'+id).slideUp(300);
		jQuery('#catalog-tr-'+id).find('.catalog-tr-read-more .fa').addClass('fa-plus');
		jQuery('#catalog-tr-'+id).find('.catalog-tr-read-more .fa').removeClass('fa-minus');
	}
}

var as = $('#loginblock').html();
var help = $('.help-block-error').html();
var urls = $('#loginblockurl').html();

if(as === help) {
    $('.help-block-error').html('');
    $('#loginblockinfo').html('<div class="alert alert-danger text-center">' +as + ' '+ urls +'</div>');
}