
<script>
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
$(document).ready(function(){
    $(document).on('click','.add_plat',function(e){
        e.preventDefault();
        let arrs = ['title','price','image','categorie','description'];
        for(arr of arrs){
            $('#'+arr+'_err').html(' ')
        }
        $.ajax({
            url:'{{route("Plat.store")}}',
            method:'post',
            data:new FormData($("#addForm")[0]),
            contentType: false,
            cache: false,
            processData:false,
            success:function(res){
                if(res.status=='success'){
                    Swal.fire({
                    title: 'Success',
                    text: 'New Plat has been Added',
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


$(document).on('click', '#edit-plat', function() {
  let id = $(this).data('id');
  $.ajax({
    url: "{{ route('Plat.edit', ':id') }}".replace(':id', id),
    method: 'get',
   
    success: function(res) {
        if(res.status=='success'){
        $('#up_title').val(res.data.title);
        $('#up_price').val(res.data.price);
        $('#up_categorie').val(res.data.categorie_id);
        $('#up_description').val(res.data.desc);
        $('#plat_id').val(res.data.id);
        $('#old_image').attr('src', "{{asset('images/')}}" + "/"+res.data.image);
        

        $('#edit_plat_Modal').modal('show');
          
        }
   
    },
    error:function(err){
        Swal.fire({
        title: 'Error! Not Found',
        text: 'This Plat is not existing Try Again',
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





$(document).on('click', '.edit_plat', function(e) {
    e.preventDefault();
    let id = $('#plat_id').val();
    $.ajax({
        url: "{{ route('Plat.update',':id') }}".replace(':id', id),
        method: 'post',
        data: new FormData($("#edit_Form")[0]),
        contentType: false,
        cache: false,
        processData:false,
        success: function(res) {
           
            Swal.fire({
        title: 'Success',
        text: 'This Plat has been Updated',
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
                $('#' + index + '_err').html(value)
            });
        }
    });
});





$(document).on('click', '#delete-plat', function() {
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
    url: "{{ route('Plat.destroy', ':id') }}".replace(':id', id),
    method: 'delete',
   
    success: function(res) {
        Swal.fire({
        title: 'Success',
        text: 'This Plat has been Deleted',
        icon: 'success',
        confirmButtonText: 'OK'

        }).then((result) =>{
            location.reload();
        })
            
        },
    error:function(err){
        Swal.fire({
        title: 'Error! Not Found',
        text: 'This Plat is not existing Try Again',
        icon: 'error',
        confirmButtonText: 'OK'
        })


    }
  });
  }
})
 
});


$(document).on('click', '#change_role', function() {
  let id = $(this).data('id');
  Swal.fire({
  title: 'Are you sure?',
  text: "You whant To change Role of this User",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, Change!'
}).then((result) => {
  if (result.isConfirmed) {
    $.ajax({
    url: "{{ route('change_status') }}",
    method: "POST",
    data: {
        id: id
    },
   
    success: function(res) {
        Swal.fire({
        title: 'Success',
        text: 'This User has been Changed Role',
        icon: 'success',
        confirmButtonText: 'OK'

        }).then((result) =>{
            location.reload();
        })
            
        },
    error:function(err){
        Swal.fire({
        title: 'Error! Not Found',
        text: 'This User is not existing Try Again',
        icon: 'error',
        confirmButtonText: 'OK'
        })


    }
  });
  }
})
 
});

</script>