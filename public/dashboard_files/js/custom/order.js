
var myArray = new Array();
$(document).ready(function () {

    //add product btn
    $("body").on("click", "button.add-product-btn", function (e) {

        e.preventDefault();
        var name = $(this).data('name');
        var id = $(this).data('id');
        var price = $(this).data('price');
       // var price =  $(this).closest('tr').find('price').val(); //150

        //var quantity = Number($(this).data('quantity'), 2);
     //   alert(id);

        $(this).removeClass('btn-success').addClass('btn-default hidden');

        var html =
            `<tr>
                <td>${name}</td>
                <td><input type="double" name="products[${id}][quantity]" data-price="${price}" class="form-control input-sm product-quantity" min="1" value="1"></td>
                <td><input type="double" name="products[${id}][price]"  class="form-control input-sm product-price1" min="0" value=${price}></td>
                 <td><input type="double" name="products[${id}][transport]" class="form-control input-sm product-transport" min="0" value="0"></td>
       
                <td class="product-price">${price}</td>   
            

                
                <td><button class="btn btn-danger btn-sm remove-product-btn" data-id="${id}"><span class="fa fa-trash"></span></button></td>
            </tr>`;
        $('.order-list').append(html);
   // console.log(html);
        //to calculate total price
        calculateTotal();
    });//end of add product btn
    $("body").on("click", "button.add-store-btn", function (e) {

        e.preventDefault();
        var name = $(this).data('name');
        var id = $(this).data('id');
        var product_id = $(this).data('product_id');

        $(this).removeClass('btn-success').addClass('btn-default hidden');
    
        var html =
            `<tr>
                <td>${name}</td>
                <td><input type="number" name="stores[${id}][first_stock]" class="form-control input-sm product-first_stock" min="0" value="0"></td>
                <td><input type="number" name="stores[${id}][stock]"  class="form-control input-sm product-stock" min="0" value="0"></td>
                <td><input type="number" name="stores[${id}][product_id]"  class="form-control  hidden" min="0" value=${product_id}></td>

                <td><button class="btn btn-danger btn-sm remove-store-btn" data-id="${id}"><span class="fa fa-trash"></span></button></td>
            </tr>`;

        $('.order-list').append(html);
    });//end of add store btn
    
    //disabled btn
    $('body').on('click', '.disabled', function(e) {

        e.preventDefault();

    });//end of disabled

    //remove product btn
    $('body').on('click', '.remove-product-btn', function(e) {

        e.preventDefault();
        var id = $(this).data('id');
        // var id =  $(this).closest('tr').find('.product-id').val(); //150

        $(this).closest('tr').remove();
        $('#product-' + id).removeClass('btn-default hidden').addClass('btn-success');

        //to calculate total price
        calculateTotal();

    });//end of remove product btn
    $('body').on('click', '.remove-store-btn', function(e) {

        e.preventDefault();
        var id = $(this).data('id');

        $(this).closest('tr').remove();
        $('#store-' + id).removeClass('btn-default hidden').addClass('btn-success');

    });//end of remove store btn

    //change product quantity
    $('body').on('keyup change', '.product-quantity', function() {
        
        var transport = parseFloat($(this).val()); //2

        var quantity = Number($(this).val()); //2
        var unitPrice =  $(this).closest('tr').find('.product-price1').val(); //150

        $(this).closest('tr').find('.product-price').html(Number(quantity * unitPrice + transport, 2));
        calculateTotal();

    });//end of product quantity change
    //change product quantity
    $('body').on('keyup change', '.disc1', function() {

    //     var disc1 = parseFloat($(this).val()); //2
    //     var totalPrice =  parseFloat($('.total-price').html()); //150
    //    // alert(totalPrice+disc1);

    //     $('.total-price').html(Number(totalPrice - disc1, 2));
       calculateTotal();

    });//end of disc1 change
    //change product quantity
    $('body').on('keyup change', '.disc2', function() {

        calculateTotal();

    });//end of disc2 change
    //change product quantity
    $('body').on('keyup change', '.disc3', function() {

        calculateTotal();

        
    });//end of disc3 change
    //change product quantity
    $('body').on('keyup change', '.adds1', function() {

        calculateTotal();

        
    });//end of adds1 change
    //change product quantity
    $('body').on('keyup change', '.adds2', function() {

        calculateTotal();

        
    });//end of adds2 change
    //change product quantity
    $('body').on('keyup change', '.product-transport', function() {

        var transport = parseFloat($(this).val()); //2
        var unitPrice =  $(this).closest('tr').find('.product-price1').val(); //150
        var quantity =  $(this).closest('tr').find('.product-quantity').val(); //150

        $(this).closest('tr').find('.product-price').html(Number(quantity * unitPrice + transport, 2));
        calculateTotal();

    });//end of transport change

        //change product price
        $('body').on('keyup change', '.product-price1', function() {
           
            var transport = parseFloat($(this).val()); //2

            var unitPrice = Number($(this).val()); //2
            var quantity =  $(this).closest('tr').find('.product-quantity').val(); //150

           // console.log(quantity);
           $(this).closest('tr').find('.product-price').html(Number(quantity * unitPrice + transport, 2));
           calculateTotal();
    
        });//end of product price change
        //list all order products
        $('.order-products').on('click', function(e) {

            e.preventDefault();
    
            $('#loading').css('display', 'flex');
            
            var url = $(this).data('url');
            var method = $(this).data('method');
            $.ajax({
                url: url,
                method: method,
                success: function(data) {
    
                    $('#loading').css('display', 'none');
                    $('#order-product-list').empty();
                    $('#order-product-list').append(data);
    
                }
            })
    
        });//end of order products click
    
    //list all  products for new order
    $('.order-prods').on('click', function(e) {
        e.preventDefault();
        $('#loading').css('display', 'flex');

        var url = $(this).data('url');
        var method = $(this).data('method');
        $.ajax({
            url: url,
            method: method,
            success: function(data) {
                $('#loading').css('display', 'none');
                $('#order-prod-list').empty();
                $('#order-prod-list').append(data);
       

            }
            });

        })
                        $('#order-prod-list table tr').each(function(row, tr){
                TableData = TableData 
                    + $(tr).find('td:eq(0)').text() + ' '  // Task No.

                    console.log(data);


   });//end of order prods click

    //print order
    $(document).on('click', '.print-btn', function() {

        $('#print-area').printThis();

    });//end of click function

});//end of document ready

//calculate the total
function calculateTotal() {

    var price = 0;
    var price1 = parseFloat($('.total-price').val());

    $('.order-list .product-price').each(function() {
        
        price += parseFloat($(this).html());

    });
       $('.total-price').html(Number(price, 2));
      
       var disc1 = parseFloat($('.disc1').val()); //150
       var disc2 = parseFloat($('.disc2').val()); //150
       var disc3 = parseFloat($('.disc3').val()); //150
       var adds1 = parseFloat($('.adds1').val()); //150
       var adds2 = parseFloat($('.adds2').val()); //150
   
       var totalPrice =  parseFloat($('.total-price').html()); //150
       console.log(Number(totalPrice + adds1 + adds2 - disc1 - disc2 - disc3,2));

       $('.total-price').html(Number(totalPrice + adds1 + adds2 - disc1 - disc2 - disc3,2 ));
   
 
    //end of product price



    //check if price > 0
    if (price > 0) {

        $('#add-order-form-btn').removeClass('disabled')

    } else {

        $('#add-order-form-btn').addClass('disabled')

    }//end of else

}//end of calculate total
