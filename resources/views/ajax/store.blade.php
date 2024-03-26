
<script>
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
$(document).ready(function(){
    $(document).on('click','.add_product',function(e){
        e.preventDefault();
        let arrs = ['title','price','x_price','main_image','desc','st1_image','st2_image','st3_image','st4_image'];
        for(arr of arrs){
            $('#'+arr+'_err').html(' ')
        }
        $.ajax({
            url:'{{route("Product.store")}}',
            method:'post',
            data:new FormData($("#addForm")[0]),
            contentType: false,
            cache: false,
            processData:false,
            success:function(res){
                if(res.status=='success'){
                    Swal.fire({
                    title: 'Success',
                    text: 'New Product has been Added',
                    icon: 'success',
                    confirmButtonText: 'OK'

                    }).then((result) =>{
                        location.reload();
                    })
                    
                }
              
            },
            error:function(err){
                let error = err.responseJSON;
                $.each(error.errors,function(index,value){
                    console.log(index+'reson:  '+value)
                    $('#'+index+'_err').html(value)
                });
                }
            
        })
    })
});


$(document).ready(function(){
    $(document).on('click','#add_order',function(e){
        e.preventDefault();
        // hide form and show loading
        $('#order_form').hide();
        $('#spinner').show();
        let arrs = ['full_name','quantity','city','address','phone'];
        for(arr of arrs){
            $('#'+arr+'_err').html(' ')
        }
        $.ajax({
            url:'{{route("Order.store")}}',
            method:'post',
            data:new FormData($("#order_form")[0]),
            contentType: false,
            cache: false,
            processData:false,
            success:function(res){
                if(res.status=='success'){
                   
                    $('#spinner').hide();
                    Swal.fire({
                    title: 'Success',
                    text: ' تم اضافة طلبك بنجاح',
                    icon: 'success',
                    confirmButtonText: 'حسنا'

                    }).then((result) =>{
                        location.reload();
                    })
                    
                }
              
            },
            error:function(err){
                $('#order_form').show();
                $('#spinner').hide();
                let error = err.responseJSON;
                $.each(error.errors,function(index,value){
                    console.log(index+'reson:  '+value)
                    $('#'+index+'_err').html(value)
                });
                }
            
        })
    })
});


$(document).on('click', '#edit-Product', function() {
  let id = $(this).data('id');
  $.ajax({
    url: "{{ route('Product.edit', ':id') }}".replace(':id', id),
    method: 'get',
   
    success: function(res) {
        if(res.status=='success'){
        $('#up_title').val(res.data.title);
        $('#up_price').val(res.data.price);
        $('#up_description').val(res.data.desc);
        $('#product_id').val(res.data.id);
        $('#old_image').attr('src', "{{asset('images/')}}" + "/"+res.data.main_image);
        $('#old_st1_image').attr('src', "{{asset('images/')}}" + "/"+res.data.st1_image);
        $('#old_st2_image').attr('src', "{{asset('images/')}}" + "/"+res.data.st2_image);
        $('#old_st3_image').attr('src', "{{asset('images/')}}" + "/"+res.data.st3_image);
        $('#old_st4_image').attr('src', "{{asset('images/')}}" + "/"+res.data.st4_image);
        $('#up_x_price').val(res.data.x_price);
        


        
        

        $('#edit_Product_Modal').modal('show');
          
        }
   
    },
    error:function(err){
        Swal.fire({
        title: 'Error! Not Found',
        text: 'This Product is not existing Try Again',
        icon: 'error',
        confirmButtonText: 'OK'
        })


    }
  });
});


$('#up_image').change(function(){
    let reader = new FileReader();
    reader.onload = function(e){$('#old_image').attr('src', e.target.result);}
    reader.readAsDataURL(this.files[0]);
});

$('#up_st1_image').change(function(){
    let reader = new FileReader();
    reader.onload = function(e){$('#old_st1_image').attr('src', e.target.result);}
    reader.readAsDataURL(this.files[0]);
});

$('#up_st2_image').change(function(){
    let reader = new FileReader();
    reader.onload = function(e){$('#old_st2_image').attr('src', e.target.result);}
    reader.readAsDataURL(this.files[0]);
});
$('#up_st3_image').change(function(){
    let reader = new FileReader();
    reader.onload = function(e){$('#old_st3_image').attr('src', e.target.result);}
    reader.readAsDataURL(this.files[0]);
});

$('#up_st4_image').change(function(){
    let reader = new FileReader();
    reader.onload = function(e){$('#old_st4_image').attr('src', e.target.result);}
    reader.readAsDataURL(this.files[0]);
});






$(document).on('click', '.edit_product', function(e) {
    e.preventDefault();
    let id = $('#product_id').val();
    let arrs = ['title','price','x_price','main_image','desc','st1_image','st2_image','st3_image','st4_image'];
        for(arr of arrs){
            $('#'+arr+'_err').html(' ')
        }
    $.ajax({ 
        url: "{{ route('Product.update',':id') }}".replace(':id', id),
        method: 'post',
        data: new FormData($("#edit_Form")[0]),
        contentType: false, 
        cache: false,
        processData:false,
        success: function(res) {
           
            Swal.fire({
        title: 'Success',
        text: 'This Product has been Updated',
        icon: 'success',
        confirmButtonText: 'OK'

        }).then((result) =>{
            location.reload();
        })

           
        },
        error: function(err) {
            let error = err.responseJSON;
            $.each(error.errors, function(index, value) {
                console.log(index + ' reason: ' + value)
                $('#up_' + index + '_err').html(value)
            });
        }
    });
});





$(document).on('click', '#delete-product', function() {
  let id = $(this).data('id');
  Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    $.ajax({
    url: "{{ route('Product.destroy', ':id') }}".replace(':id', id),
    method: 'delete',
   
    success: function(res) {
        Swal.fire({
        title: 'Success',
        text: 'This Product has been Deleted',
        icon: 'success',
        confirmButtonText: 'OK'

        }).then((result) =>{
            location.reload();
        })
            
        },
    error:function(err){
        Swal.fire({
        title: 'Error! Not Found',
        text: 'This Product is not existing Try Again',
        icon: 'error',
        confirmButtonText: 'OK'
        })


    }
  });
  }
})
 
});








// order 

$(document).on('click', '#edit-order', function() {
  let id = $(this).data('id');
        $('#order_id').val(id);

        $('#edit_Order_Modal').modal('show');
});


$(document).on('click', '.edit_order', function(e) {
    e.preventDefault();
    let id = $('#order_id').val();
            $('#status_err').html(' ')
    
    $.ajax({ 
        url: "{{ route('Order.update',':id') }}".replace(':id', id),
        method: 'post',
        data: new FormData($("#edit_order_form")[0]),
        contentType: false, 
        cache: false,
        processData:false,
        success: function(res) {
           
            Swal.fire({
        title: 'Success',
        text: 'This Oreder has been Updated',
        icon: 'success',
        confirmButtonText: 'OK'

        }).then((result) =>{
            location.reload();
        })

           
        },
        error: function(err) {
            let error = err.responseJSON;
            $.each(error.errors, function(index, value) {
                console.log(index + ' reason: ' + value)
                $(index +'_err').html(value)
            });
        }
    });
});




$(document).on('click', '#delete-order', function() {
  let id = $(this).data('id');
  Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    $.ajax({
    url: "{{ route('Order.destroy', ':id') }}".replace(':id', id),
    method: 'delete',
   
    success: function(res) {
        Swal.fire({
        title: 'Success',
        text: 'This Order has been Deleted',
        icon: 'success',
        confirmButtonText: 'OK'

        }).then((result) =>{
            location.reload();
        })
            
        },
    error:function(err){
        Swal.fire({
        title: 'Error! Not Found',
        text: 'This Order is not existing Try Again',
        icon: 'error',
        confirmButtonText: 'OK'
        })


    }
  });
  }
})
 
});

</script>