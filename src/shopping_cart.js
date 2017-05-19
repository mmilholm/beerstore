 $(function changeSubTotal(){
 	var count = 0;
 	var number = document.getElementById(count).value;
    $("#quantity" + number).change(function(){
         $("#subTotal" + number).val($(this).val() * $("#price" + number).val());
    });
});

