function plusProduct(id) {
    console.log(id);
    $.ajax({
        url: '/edit/' + id + '/plus',
        method: 'POST',
        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
        success: function(response){
            let total =  response.id.quantity * response.id.price;
            $('span#total_item').html("$"+ response.total);
            $('#quantity_'+id).val(response.id.quantity);
            $('#count_'+ id).val('$' + total);
            $('#total_price').html('$' + response.total);
            $('#total_count').html(response.total_count);
            $('#cart').html(response.total_count);
          
            $('#total_quantity').html(response.total_count);
            
            console.log($('#item12'));
        },
        error: function(error){
            console.log(error);
        }
    });
}
function minusProduct(id) {
    $.ajax({
        url: '/edit/' + id + '/minus',
        method: 'POST',
        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
        success: function(response){
       
                if(response.id.quantity >= 0){
                let total =  response.id.quantity * response.id.price;
                $('span#total_item').html("$"+ response.total);
                
            $('#quantity_'+id).val(response.id.quantity);
            $('#count_'+ id).val('$' + total);
            $('#total_price').html('$' + response.total);
            $('#total_quantity').html(response.total_count);
            $('#cart').html(response.total_count);
                }
                else{
                    toastr.success('Product is not available in cart!')
                }
            
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function deleteProduct(id) {

    $.ajax({
        url: '/dellItem/' + id,
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            console.log(response);
            $('#total_quantity').html(response.total_count);
            $('span#total_item').html('$' + response.total);
            $('span#cart').html(0);
            
            $('#product_list_'+id).remove();
            $('#cart').html(response.total_count);
            $('#total_price').html('$' + response.total);
            $('#item').html('$'+response.total);
            $('#total_count').html(response.total_count);
            toastr.success('Product is deleted from cart.')
        },
        error: function(xhr, status, error) {
            console.error('Error deleting product');
        }
    });
}

  function addCartProduct(id){
    let quantity = $('#quantity').val();
    let price = $('#product_price').val();
    let image = $('#product_image').val();
    let name = $('#product_name').val();
    // let id = $('#id').val();

    $.ajax({
     url:'/add-button-cart',
     type:'POST',
     data: {
        id:id,
        quantity:quantity,
        price:price,
        name:name,
        image:image,

      },

     headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response) {
        $('#cart').html(response.total_count);
        $('#total_count').html(response.total_count);
        $('span#total_item').html('$'+ response.total);
        console.log(response.cost_all);
        toastr.success('Product is added to cart.')
    },
    error: function(xhr, status, error) {
        console.error('Error add button');
    }
    });


  }

  function calculateRange() {
    let max = $('#maxamount').val();
    let min = $('#minamount').val();
    console.log(min, max);
     $.ajax({
     url:'/filter-product',
     type:'POST',
     data: {
        min:min,
        max:max
      },

     headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response) {
        console.log(response.table_view);
        $('#product_list').html(response.table_view);
         $('#table2').html(response.table_view1);
        $('#count').html(response.count);
        
        console.log(response);
    },
    error: function(xhr, status, error) {
        console.error('Error add button');
    }
    });

  }
  $('.maxRange').on("mouseup",function(){
    calculateRange()
  });
  $('.minRange').on("mouseup",function(){
    calculateRange()
  });


function likeCart(id, event){
    event.preventDefault();
    console.log(id);
    let name = $('#name_' + id).val();
    let price = $('#price_' + id).val();
    let discount = $('#discount_' + id).val();
    let image = $('#image_' + id).val();

   $.ajax({
        url:'/add-like',
        type:'GET',
        data: {
            id:id,
            name:name,
            price:price,
            discount:discount,
            image:image
         },
        headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
       success: function(response) {
        if (response.success == true){
            // $('#product_'+id).removeClass('default');
            $('#product_'+id).removeClass('cart');
            $('#product_'+id).addClass('likecart');
       
        }
        else{
            $('#product_'+id).removeClass('likecart');
            $('#product_'+id).addClass('cart');
       
        }
    },
    error: function(xhr, status, error) {
        console.error('Error add button');
    }

    });
}

let quantity_input = $('#quantity');
quantity_input.onclick = function (e) {
  console.log(true);
}

function addCart(id,event){
event.preventDefault();
let name = $('#name_' + id).val();
let price = $('#price_' + id).val();
let image = $('#image_' + id).val();
let category_id = $('#category_id_' + id).val();


    $.ajax({
        url: '/add-cart',
        type: 'GET',
        data: {
            id: id,
            name: name,
            price: price,
            image: image,
            category_id: category_id,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            console.log(response);
            $('span#cart').html(response.all_quantity);
            $('span#total_item').html('$'+response.total);
    
            toastr.success('Product is added to cart.')
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
    
}

$('#dec').click(function() {
    if ($('#quantity').val() > 0) {
        $('#quantity').val(parseInt($('#quantity').val()) - 1);     
    }
});

$('#inc').click(function() {
    $('#quantity').val(parseInt($('#quantity').val()) + 1);
});
