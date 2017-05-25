function updateSubTotal(num) {

		//console.log(num);
		$(function(){
    		$("#quantity"+num).change(function(){
        		 $("#subTotal"+num).val($(this).val() * $("#price"+num).val());
    		});
		});

}


function calcTotal(num) {

    var total = 0;
    for (var i = 0; i < num; i++) {
        total = total + parseFloat($("#subTotal" + i).val());
    }
    $("#total").val(total);
}


function updateTotal (num) {




    /*
    var currentQuantity = parseInt($("#quantity"+num).val());
    $(function(){
    	$("#quantity"+num).change(function(){
    	    if (currentQuantity < parseInt($("#quantity"+num).val())) {
    	        $("#total").val(parseFloat($("#total").val()) + parseFloat($("#price"+num).val()));
    	    } else {
    	        $("#total").val(parseFloat($("#total").val()) - parseFloat($("#price"+num).val()));
    	    }
	    });
	});
    */


}


	$(function() {
	var pop = $('.popbtn');
	var row = $('.row:not(:first):not(:last)');


	pop.popover({
		trigger: 'manual',
		html: true,
		container: 'body',
		placement: 'left',
		animation: false,
		content: function() {
			return $('#popover').html();
		}
	});


	pop.on('click', function(e) {
		pop.popover('toggle');
		pop.not(this).popover('hide');
	});

	$(window).on('resize', function() {
		pop.popover('hide');
	});

	row.on('touchend', function(e) {
		$(this).find('.popbtn').popover('toggle');
		row.not(this).find('.popbtn').popover('hide');
		return false;
	});

});
