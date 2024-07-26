<div class="modal modal-blur fade" id="addEmployee" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
   <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title">Add Employee</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <div class="form-group mb-3">
            <label for="">Full Name</label>
            <input type="text" class="form-control shadow-none" id="fullname">
         </div>
         <div class="form-group mb-3">
            <label for="">Email Address</label>
            <input type="text" class="form-control shadow-none" id="emailAddress">
         </div>
         <div class="form-group mb-3">
            <label for="">Password</label>
            <input type="text" class="form-control shadow-none" id="password">
         </div>
         <div class="form-group mb-3">
            <label for="">Choose Restriction</label>
            <select id="role" class="form-control shadow-none">
               <option value="">Select</option>
               <option value="csr">CSR</option>
            </select>
         </div>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn me-auto" data-bs-dismiss="modal">Cancel</button>
         <button class="btn btn-primary" id="submitEmployee">Submit</button>
      </div>
   </div>
   </div>
</div>