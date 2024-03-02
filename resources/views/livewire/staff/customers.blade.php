 <div class="row">
     <!--Edit Item Modal-->
     <div wire:ignore.self class="modal fade" id="editCustomerModal" tabindex="-1" data-backdrop="static" role="dialog"
         data-keyboard="false" aria-labelledby="modelTitleId" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title">Edit Customer Info</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <form wire:submit.prevent="updateCustomerData">
                         <div class="row">
                             <div class="form-group col-6">
                                 <label for="item-name">FirstName</label>
                                 <input type="text" class="form-control" id="item-name"
                                     wire:model.debounce.lazy="firstname" placeholder="Enter customer Firstname">
                                 @error('item_name')
                                     <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                 @enderror
                             </div>
                             <div class="form-group col-6">
                                 <label for="item-name">LastName</label>
                                 <input type="text" class="form-control" id="item-name"
                                     wire:model.debounce.lazy="firstname" placeholder="Enter customer Firstname">
                                 @error('item_name')
                                     <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                 @enderror
                             </div>
                         </div>
                         <div class="row">
                             <div class="form-group col-6">
                                 <label for="item-category">Phone</label>
                                 <input type="text" class="form-control" wire:model.lazy="phone">
                             </div>
                             @error('phone')
                                 <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                             @enderror
                             <div class="form-group col-6">
                                 <div>
                                     <label for="item-priceunit">Date of Birth</label>
                                     <input type="date" class="form-control" wire:model.lazy="dob">
                                 </div>
                                 @error('dob')
                                     <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                 @enderror
                             </div>
                         </div>
                         <div class="row">
                             <div class="form-group col-6">
                                 <div>
                                     <label for="item-priceunit">Address</label>
                                     <input type="text" class="form-control" wire:model.lazy="address">
                                 </div>
                                 @error('address')
                                     <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                 @enderror
                             </div>
                             <div class="form-group col-6">
                                 <div>
                                     <label for="">Gender</label>
                                     <select name="" class="form-control" wire:model.lazy="gender">
                                         <option value="">--Select Gender--</option>
                                         <option value="male">Male</option>
                                         <option value="female">Female</option>
                                         <option value="other">Other</option>
                                     </select>
                                     @error('gender')
                                         <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                     @enderror
                                 </div>
                             </div>
                         </div>
                     </form>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary" wire:click="updateCustomerData">Update User</button>
                 </div>
             </div>
         </div>
     </div>
     <div class="col-12">
         <div class="card-box">
             <h4 class="header-title">Customers Section</h4>
             </h4>
             <p class="sub-header">
                 Staffs can view and manage customers data from this page
             </p>
             @if (session()->has('message'))
                 <div class="alert alert-success text-center">{{ session('message') }}</div>
             @endif
             <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                 <div class="row">
                     <div class="col-sm-12 col-md-6">
                         <div class="dataTables_length" id="datatable_length">
                             <label>Show
                                 <select aria-controls="datatable" wire:model="per_page"
                                     class="custom-select custom-select-sm form-control form-control-sm">
                                     <option value="10">10</option>
                                     <option value="25">25</option>
                                     <option value="50">50</option>
                                     <option value="100">100</option>
                                 </select>
                                 entries</label>
                             @error('per_page')
                                 <span class="text-danger">{{ $message }}</span>
                             @enderror
                         </div>
                     </div>
                 </div>

                 <div class="row">
                     <div class="col-sm-12 col-md-6">
                         @php
                             session(['customersData' => $customerData]);
                         @endphp
                         <div class="dt-buttons btn-group">

                             <a type="button" href="{{ route('export_users_excel') }}" target="_blank"
                                 class="btn btn-secondary buttons-excel buttons-html5"
                                 type="button"><span>Excel</span>
                             </a>
                             <a href="{{ route('export_users') }}" target="_blank" type="button"
                                 class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0"
                                 type="button"><span>PDF</span>
                             </a>
                         </div>
                     </div>
                     <div class="col-sm-12 col-md-6">
                         <div id="datatable-buttons_filter" class="dataTables_filter">
                             <label>Search:<input type="search" wire:model="search"
                                     class="form-control form-control-sm" placeholder=""
                                     aria-controls="datatable-buttons"></label>
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-sm-12 table-responsive">
                         <table id="datatable-buttons"
                             class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed"
                             style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                             aria-describedby="datatable-buttons_info">
                             <thead>
                                 <tr role="row">
                                     <th>#</th>
                                     <th>FirstName</th>
                                     <th>LastName</th>
                                     <th>Phone</th>
                                     <th>DOB</th>
                                     <th>Address</th>
                                     <th>Gender</th>
                                     <th>Email</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>

                             <tbody>
                                 @if ($customers->count() > 0)
                                     @foreach ($customers as $customer)
                                         <tr>
                                             <td>{{ $loop->iteration }}</td>
                                             <td>{{ $customer->firstname }}</td>
                                             <td>{{ $customer->lastname }}</td>
                                             <td>{{ $customer->phone }}</td>
                                             <td>{{ $customer->dob }}</td>
                                             <td>{{ $customer->address }}</td>
                                             <td>{{ $customer->gender }}</td>
                                             <td>{{ $customer->email }}</td>
                                             <td>
                                                 <button class="btn btn-sm btn-dark"
                                                     wire:click="editCustomer({{ $customer->customer_id }})">
                                                     <i class="fa fa-eye"></i>
                                                 </button>
                                                 <button onclick="alert('Staffs are unable to delete customer record')"
                                                     class="btn btn-sm btn-danger">
                                                     <i class="fa fa-trash"></i>
                                                 </button>
                                             </td>

                                         </tr>
                                     @endforeach
                                 @else
                                     <tr>
                                         <td colspan="7" class="text-center">No Customer Found</td>
                                     </tr>
                                 @endif
                             </tbody>
                         </table>
                     </div>
                 </div>
                 <!-- Pagination buttons -->
                 <div class="row">
                     <div class="col-sm-12 col-md-5">
                         <div class="dataTables_info" id="datatable-buttons_info" role="status" aria-live="polite">
                             Showing {{ $customers->firstItem() }} to {{ $customers->lastItem() }} of
                             {{ $customers->total() }}
                             entries
                         </div>
                     </div>
                     <div class="col-sm-12 col-md-7">
                         <div class="d-flex justiy-content-center flex-wrap">
                             {{ $customers->links('vendor.livewire.bootstrap') }}
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 @push('scripts')
     <script>
         window.addEventListener('close-modal', event => {
             $('#editCustomerModal').modal('hide');
         });
         window.addEventListener('show-edit-customer-modal', event => {
             $('#editCustomerModal').modal('show');
         });
         window.addEventListener('show-delete-alert', event => {
             $('#sa-warning').modal('show');
         })
     </script>
     <script>
         window.addEventListener('show-delete-alert', event => {
             Swal.fire({
                 title: 'Are you sure?',
                 text: "You won't be able to revert this!",
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Yes, delete'
             }).then((result) => {
                 if (result.isConfirmed) {
                     Livewire.emit('deleteItemData')
                 } else {
                     // Swal.close();
                 }
             })
         })

         window.addEventListener('customerDeleted', event => {
             Swal.fire(
                 'Deleted',
                 'Item has been deleted',
                 'success',
             )
         })
     </script>
 @endpush
