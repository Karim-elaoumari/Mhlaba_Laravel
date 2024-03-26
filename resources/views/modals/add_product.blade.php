




<!-- Modal -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" align='right' dir="rtl">
  <div class="modal-dialog modal-lg" style="color: aquamarine">
    <div class="modal-content bg-black ">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel" style="color: aquamarine">Add Product Form</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="error_message" id=""></p>
        <form action="" method="POST" id="addForm" enctype="multipart/form-data">
          @csrf
          @method('POST')
          <div class="form-outline mb-4">
            <label class="form-label" for="form7Example1">Title</label>
            <input type="text" name="title"  class="form-control title" />
           
            <p class="error_message text-danger" id="title_err"></p>
          </div>
          
          <!-- Email input -->
          <div class="row g-1">
            <div class=" col form-outline mb-4">
              <label class="form-label" for="form7Example2">Price</label>
                <input type="number" name="price"  class="form-control price" step="0.01"/>
                
                <p class="error_message text-danger" id="price_err"></p>
            </div>
            <div class="col">
              <label class="form-label" for="form7Example2">X-Price</label>
              <input type="number" name="x_price"  class="form-control price" step="0.01"/>
              
              <p class="error_message text-danger" id="x_price_err"></p>
            </div>
           

          </div>

          <div class="row g-1">
            <div class=" col form-outline mb-4">
              <div class="form-group">
                <label for="productColors">Product Colors</label>
                <div id="colorFields">
                  <!-- Color input fields will be added here -->
                </div>
                <button type="button" class="btn btn-primary" id="addColorBtn">Add Color</button>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="productSizes">Product Sizes</label>
                <div id="sizeFields">
                  <!-- Size input fields will be added here -->
                </div>
                <button type="button" class="btn btn-primary" id="addSizeBtn">Add Size</button>
              </div>
            </div>
           

          </div>

         


          <label class="form-label" for="customFile">Image</label>
          <input type="file" name="main_image" class="form-control image "  />
          <p class="error_message text-danger" id="main_image_err"></p>
          <div class="form-outline">
                <label class="form-label" for="textAreaExample">Description</label>
              <textarea class="form-control mt-3 description" name="desc"  rows="12"></textarea>

              <p class="error_message text-danger" id="desc_err"></p>
          </div>



                <div class="row g-1">
                  <div class=" col form-outline mb-4">
                    <label class="form-label" for="customFile">1st Image</label>
                    <input type="file" name="st1_image" class="form-control image "  />
                    <p class="error_message text-danger" id="st1_image_err"></p>
                  </div>
                  <div class="col">
                    <label class="form-label" for="customFile">2 nd Image</label>
                    <input type="file" name="st2_image" class="form-control image "  />
                    <p class="error_message text-danger" id="st2_image_err"></p>
                  </div>
                </div>
                <div class="row g-1">
                  <div class=" col form-outline mb-4">
                    <label class="form-label" for="customFile">3 rd Image</label>
                    <input type="file" name="st3_image" class="form-control image "  />
                    <p class="error_message text-danger" id="st3_image_err"></p>
                  </div>
                  <div class="col">
                    <label class="form-label" for="customFile">4 rd Image</label>
                    <input type="file" name="st4_image" class="form-control image "  />
                    <p class="error_message text-danger" id="st4_image_err"></p>
                  </div>
                </div>



        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button"  class="btn btn-primary add_product">ADD Product</button>
      </form>
      </div>
    </div>
  </div>
</div>
<script>
  const colorFieldsContainer = document.getElementById("colorFields");
  const addColorBtn = document.getElementById("addColorBtn");

  let colorFieldIndex = 0;

  function createColorField() {
    const colorField = document.createElement("div");
    const colorPickerInput = document.createElement("input");
    colorPickerInput.type = "text"; // Spectrum works with text input
    colorPickerInput.name = "colors[]";

    const removeBtn = document.createElement("button");
    removeBtn.type = "button";
    removeBtn.classList.add("btn", "btn-danger", "remove-color","btn-sm");
    removeBtn.innerHTML = "<i class='bi bi-x'></i>";

    colorField.appendChild(colorPickerInput);
    colorField.appendChild(removeBtn);

    // Initialize Spectrum color picker
   

    removeBtn.addEventListener("click", () => {
      colorFieldsContainer.removeChild(colorField);
      colorFieldIndex--;
    });

    return colorField;
  }

  addColorBtn.addEventListener("click", () => {
    const colorField = createColorField();
    colorFieldsContainer.appendChild(colorField);
    colorFieldIndex++;
  });




  const sizeFieldsContainer = document.getElementById("sizeFields");
  const addSizeBtn = document.getElementById("addSizeBtn");

  let sizeFieldIndex = 0;

  function createSizeField() {
    const sizeField = document.createElement("div");
    const sizePickerInput = document.createElement("input");
    sizePickerInput.type = "number"; // Spectrum works with text input
    sizePickerInput.name = "sizes[]";

    const removeBtnn = document.createElement("button");
    removeBtnn.type = "button";
    removeBtnn.classList.add("btn", "btn-danger", "remove-color","btn-sm");
    removeBtnn.innerHTML = "<i class='bi bi-x'></i>";

    sizeField.appendChild(sizePickerInput);
    sizeField.appendChild(removeBtnn);

   

    removeBtnn.addEventListener("click", () => {
      sizeFieldsContainer.removeChild(sizeField);
      sizeFieldIndex--;
    });

    return sizeField;
  }

  addSizeBtn.addEventListener("click", () => {
    const sizeField = createSizeField();
    sizeFieldsContainer.appendChild(sizeField);
    sizeFieldIndex++;
  });
</script>
