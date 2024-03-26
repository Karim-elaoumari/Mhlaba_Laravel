
<!-- Modal -->
<div class="modal fade" id="edit_Product_Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" align='right' dir="rtl">
  <div class="modal-dialog model-lx">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Plat Form</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="error_message" id=""></p>
        <form action="" method="POST" id="edit_Form" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <input type="hidden" name="product_id" id="product_id">
          <div class="form-outline mb-4">
            <label class="form-label" for="form7Example1">Title</label>
            <input type="text" name="title" id="up_title" class="form-control title" />
           
            <p class="error_message text-danger" id="up_title_err"></p>
          </div>
          <!-- Email input -->
          <div class="row g-1">
            <div class=" col form-outline mb-4">
              <label class="form-label" for="form7Example2">Price</label>
                <input type="number" name="price" id="up_price" class="form-control price" step="0.01"/>
             
                <p class="error_message text-danger" id="up_price_err"></p>
            </div>
            <div class="col">
              <label class="form-label" for="form7Example2">X-Price</label>
              <input type="number" name="x_price" id="up_x_price" class="form-control price" step="0.01"/>
              
              <p class="error_message text-danger" id="up_x_price_err"></p>
            </div>
           

          </div>



                          <label class="form-label" for="customFile">Image</label>
                <input type="file" name="main_image" class="form-control image " id="up_image" />
                <p class="error_message text-danger" id="up_main_image_err"></p>

                <div class="card" style="width: 23rem;margin:auto">
                  <img src="" id="old_image" class="card-img-top" alt="No image Found For this Plat" style="max-height:240px;width: 23rem;">
                </div>
                <div class="form-outline">
                  <label class="form-label" for="textAreaExample">Description</label>
                <textarea class="form-control mt-3 description" name="desc" id="up_description" rows="8"></textarea>
              
                <p class="error_message text-danger" id="up_desc_err"></p>
                </div>
            <hr>
                <div class="row g-1">
                  <div class=" col form-outline mb-4">
                    <label class="form-label" for="customFile">1st Image</label>
                      <div class="card" style="width: 10rem;margin:auto">
                        <img src="" id="old_st1_image" class="card-img-top" alt="No image Found For this product" style="max-height:240px;width: 10rem;">
                      </div>
                    <input type="file" name="st1_image" class="form-control image "  id="up_st1_image"/>
                    <p class="error_message text-danger" id="up_st1_image_err"></p>
                  </div>
                  <div class="col">
                    <label class="form-label" for="customFile">2 nd Image</label>
                    <div class="card" style="width: 10rem;margin:auto">
                      <img src="" id="old_st2_image" class="card-img-top" alt="No image Found For this product" style="max-height:240px;width: 10rem;">
                    </div>
                    <input type="file" name="st2_image" class="form-control image "  id="up_st2_image"/>
                    <p class="error_message text-danger" id="up_st2_image_err"></p>
                  </div>
                </div>
                <div class="row g-1">
                  <div class=" col form-outline mb-4">
                    <label class="form-label" for="customFile">3 rd Image</label>
                    <div class="card" style="width: 10rem;margin:auto">
                      <img src="" id="old_st3_image" class="card-img-top" alt="No image Found For this product" style="max-height:240px;width: 10rem;">
                    </div>
                    <input type="file" name="st3_image" class="form-control image " id="up_st3_image" />
                    <p class="error_message text-danger" id="up_st3_image_err"></p>
                  </div>
                  <div class="col">
                    <label class="form-label" for="customFile">4 rd Image</label>
                    <div class="card" style="width: 10rem;margin:auto">
                      <img src="" id="old_st4_image" class="card-img-top" alt="No image Found For this product" style="width: 10rem;">
                    </div>
                    <input type="file" name="st4_image" class="form-control image "  id="up_st4_image"/>
                    <p class="error_message text-danger" id="up_st4_image_err"></p>
                  </div>
                </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button"  class="btn btn-primary edit_product">Edit Product</button>
      </form>
      </div>
    </div>
  </div>
</div>