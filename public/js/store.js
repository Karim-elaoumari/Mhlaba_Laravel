
$(document).ready(function(){
    $(document).on('click','.add_plat',function(e){
        e.preventDefault();
        let title = $('#title').val();
        let price = $('#price').val();
        let image = $('#image')[0].files[0];
        let description  = $('#description').val();
        let categorie     =$('#categorie').val();
        $.ajax({
            url:'{{route("Plat.store")}}',
            method:'post',
            data:{title:title,price:price,image:image,description:description,categorie:categorie},
            success:function(res){

            },
            error:function(err){
                let error = err.responseJson;
                $.each(error.errors,function(index,value){
                    $('.error_message').append('<span class="text-danger" >'+value+'</span><br>');
                });
                }
            
        })
    })
})



