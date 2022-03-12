$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });



var date = new Date();
var today = date.getFullYear()+'-'+(date.getMonth()+1)+'-'+date.getDate();
var customerphone = $("#customerphone");
var customername = $("#customername");
var nocustomer = $("#nocustomer");
var afterbuttonl = $("#afterbuttonl");
nocustomer.addClass("d-none")
$("#customeraddstatus").addClass("d-none")
customername.prop("disabled", true)
$("#sendorder").prop("disabled", true)
afterbuttonl.html('تاوەکوو (ناوی داواکار) نیشان نەدرێت، ناتوانیت داواکاری بنێریت')

console.log(today);

    // check if customer in database or not
    $("#checkisav").on("click", function () {

        $.post("/ajax/checkcustomer", {customerp : customerphone.val()})

        .done(function(responce){
            $("#addcustomertodt").addClass("d-none");
            nocustomer.addClass("d-none")
            customername.val(responce.customer_name)
            $("#sendorder").prop("disabled", false)
            customername.prop("disabled", true)
            $("#customeraddstatus").addClass("d-none")
        })
        .fail(function(xhr, status, error){
            $("#sendorder").prop("disabled", true);
            $("#customeraddstatus").addClass("d-none")
            nocustomer.removeClass("d-none")
            customername.prop("disabled", false)
            customername.val("");
            $("#addcustomertodt").removeClass("d-none");

        })
    });

    // add unkowned customer to database
    $("#addcustomertodt").on("click" , function(){
        $.post("/ajax/addcustomer" , {customername : customername.val(), customerphone : customerphone.val()})
        .done(function(responce){
            $("#customeraddstatus").removeClass("d-none")
            $("#customeraddstatus").html("داواکار بە سەرکەوتووی زیادکرا، کلیک لە دوگمەی دڵنیابوونەوە بکە");
            console.log(responce)
        })
        .fail(function(xhr, status, error){
            $("#customeraddstatus").html("کێشەیەک بوونی هەیە");
            $("#customeraddstatus").removeClass("d-none")
            console.log(xhr)
            console.log(status)
            console.log(error)

        })
    });

    // send order
    $("#sendorder").on("click" , function(){
        console.log("start send");
        var weight = $("#weight");
        var type = $("#type");
        var price = $("#price");
        var location = $("#location");
        var customer_phone = $("#customerphone");
        var driver = $("#driver");

        $.post("/ajax/addorder" , {
            order_weight : weight.val(),
            order_type : type.val(),
            order_price : price.val(),
            order_location : location.val(),
            customer_phone : customer_phone.val(),
            order_driver : driver.val()
            })
        .done(function(responce){
            console.log("sescuss")
            console.log(responce)

            weight.val('');
            type.val('.');
            price.val('');
            location.val('');
            customer_phone.val('');
            customername.val('');
            driver.val('.');
            afterbuttonl.html('داواکاری بەسەرکەوتووی نێردرا')
        })
        .fail(function(xhr, status, error){
            console.log(xhr)
            console.log(status)
            console.log(error)

        })
    });
    var path = $(location).attr("pathname");

    $("#addfsub").on("click", function () {
        var path = $(location).attr("pathname");
        path = path.substring(7);
       console.log("updating status for "+path)
       $.post("/ajax/updateorderstatus", {orderid : path, state : 3})

       .done(function(responce){
           console.log("updated")
       })
       .fail(function(xhr, status, error){
          console.log("failed")

       })
    });

   if (($(location).attr("pathname").substring(1)).startsWith("order")) {
    $.post("/ajax/buttonstate", {orderid : path.substring(7)})

    .done(function(responce){
        console.log(responce.status)
        if(responce.status==1 || responce.status==0){
            $("#addfsub").prop("disabled", true)
        }
    })
    .fail(function(xhr, status, error){
       console.log(xhr)
       console.log(status)
       console.log(error)

    })
   }

   $("#submitsub").on("click", function(){
       var orderid = path.substring(7);
       var weight = $("#subweightform").val();
       var price = $("#subpriceform").val();
       var type = $("#subtypeform").val();
       var driver = $("#subdriverform").val();

       $.post("/ajax/submitsubstring", {orderid : orderid, weight : weight, price : price, type : type, driver : driver})

       .done(function(responce){
           console.log("updated"+responce)
       })
       .fail(function(xhr, status, error){
          console.log("failed")

       })
   })

});
