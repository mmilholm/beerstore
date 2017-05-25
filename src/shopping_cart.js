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
