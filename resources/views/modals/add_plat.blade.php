




<!-- Modal -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Plat Form</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="error_message" id=""></p>
        <form action="" method="POST" id="addForm" enctype="multipart/form-data">
          @csrf
          @method('POST')
          <div class="form-outline mb-4">
            <input type="text" name="title" id="title" class="form-control title" />
            <label class="form-label" for="form7Example1">Title</label>
            <p class="error_message text-danger" id="title_err"></p>
          </div>
          
          <!-- Email input -->
          <div class="row g-1">
            <div class=" col form-outline mb-4">
                <input type="number" name="price" id="price" class="form-control price" step="0.01"/>
                <label class="form-label" for="form7Example2">Price</label>
                <p class="error_message text-danger" id="price_err"></p>
            </div>
            <div class="col">
                <select id="categorie" name="categorie" class="form-select categorie">
                    <option selected>Categorie</option>
                    @foreach ($categories as $categ)
                    <option value="{{$categ->id}}"> {{$categ->name}}</option>
                    @endforeach
                  </select>
                  <p class="error_message text-danger" id="categorie_err"></p>
            </div>
           

          </div>
          <label class="form-label" for="customFile">Image</label>
<input type="file" name="image" class="form-control image " id="image" />
<p class="error_message text-danger" id="image_err"></p>
<div class="form-outline">
<textarea class="form-control mt-3 description" name="description" id="description" rows="4"></textarea>
<label class="form-label" for="textAreaExample">Description</label>
<p class="error_message text-danger" id="description_err"></p>
</div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button"  class="btn btn-primary add_plat">ADD PLAT</button>
      </form>
      </div>
    </div>
  </div>
</div>