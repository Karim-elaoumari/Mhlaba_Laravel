




<!-- Modal -->
<div class="modal fade" id="edit_Order_Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" align='right' dir="rtl">
  <div class="modal-dialog modal-sm" style="color: aquamarine">
    <div class="modal-content bg-black ">
      <div class="modal-body">
      
        <form action="" method="POST" id="edit_order_form">
          @csrf
          @method('PUT')
          <input type="hidden" name="order_id" id="order_id">
          <div class="form-outline mb-4">
            <label class="form-label" for="form7Example1">Status</label>
           <select name="status" id='order_status'>
            <option value="pending">Pending</option>
            <option value='to_delivery'>To deliver</option>
            <option value="delivered"> delivered</option>
            <option value="canceled">Canceled</option>
           </select>
            <p class="error_message text-danger" id="status_err"></p>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button"  class="btn btn-primary edit_order">Edit Order</button>
      </form>
      </div>
    </div>
  </div>
</div>

