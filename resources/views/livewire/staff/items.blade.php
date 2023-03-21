<div class="row">
    <!-- Add Item Modal -->
    <div wire:ignore.self class="modal fade" id="addItemModal" tabindex="-1" data-backdrop="static" role="dialog"
        data-keyboard="false" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        wire:click="$set('showModal', false)">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="addNewItem">
                        <div class="form-group">
                            <label for="item-name">Item Name</label>
                            <div>
                                <input type="text" class="form-control" id="item-name" wire:model="item_name"
                                    placeholder="Enter item name">
                                @error('item_name')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="item-category">Item Category</label>
                                <input type="text" class="form-control" id="item-category" wire:model="item_category"
                                    placeholder="Enter item category">
                                @error('item_category')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="item-priceunit">Item Price</label>
                                <input type="number" class="form-control" id="item-priceunit" wire:model="item_price"
                                    placeholder="Enter item price">
                                @error('item_price')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="item-packageunit">Package Unit</label>
                                <input type="number" class="form-control" id="item-packageunit"
                                    wire:model.defer="package_unit" placeholder="Enter package unit">
                                @error('package_unit')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" wire:click="addNewItem">Add New Item</button>
                </div>
            </div>
        </div>
    </div>
    <!--Edit Item Modal-->
    <div wire:ignore.self class="modal fade" id="editItemModal" tabindex="-1" data-backdrop="static" role="dialog"
        data-keyboard="false" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Existing Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="editItemData">
                        <div class="form-group">
                            <label for="item-name">Item Name</label>
                            <div>
                                <input type="text" class="form-control" id="item-name" wire:model="item_name"
                                    placeholder="Enter item name">
                                @error('item_name')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="item-category">Item Category</label>
                                <input type="text" class="form-control" id="item-category"
                                    wire:model="item_category" placeholder="Enter item category">
                                @error('item_category')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="item-priceunit">Item Price</label>
                                <input type="number" class="form-control" id="item-priceunit"
                                    wire:model="item_price" placeholder="Enter item price">
                                @error('item_price')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="item-packageunit">Package Unit</label>
                                <input type="number" class="form-control" id="item-packageunit"
                                    wire:model.defer="package_unit" placeholder="Enter package unit">
                                @error('package_unit')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" wire:click="editItemData">Update Item</button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title">All Items Table</h4>
            <p class="sub-header">
                allows staff to manage the list of items that the laundry
                service provides. This module typically includes functionality
                to create, edit, delete, and view items.
            </p>
            @if (session()->has('message'))
                <div class="alert alert-success text-center">{{ session('message') }}</div>
            @endif

            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">
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

                        <div class="float-right mt-3">
                            <button class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                data-target="#addItemModal">
                                <i class="fa fa-plus"></i> Add item
                            </button>
                        </div>


                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 table-responsive">
                    <table id="datatable"
                        class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                        style="
                                  border-collapse: collapse;
                                  border-spacing: 0px;
                                  width: 100%;
                              "
                        role="grid" aria-describedby="datatable_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1"
                                    colspan="1" style="width: 20px" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending">
                                    ID
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                    colspan="1" style="width: 242px"
                                    aria-label="Position: activate to sort column ascending">
                                    Item Name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                    colspan="1" style="width: 113px"
                                    aria-label="Office: activate to sort column ascending">
                                    Item Category
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                    colspan="1" style="width: 108px"
                                    aria-label="Start date: activate to sort column ascending">
                                    Item Price
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                    colspan="1" style="width: 54px"
                                    aria-label="Age: activate to sort column ascending">
                                    Package Unit
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                    colspan="1" style="width: 88px"
                                    aria-label="Salary: activate to sort column ascending">
                                    Date Created
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                    colspan="1" style="width: 88px"
                                    aria-label="Salary: activate to sort column ascending">
                                    Date Updated
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                    colspan="1" style="width: 88px"
                                    aria-label="Salary: activate to sort column ascending">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($items->count() > 0)
                                @foreach ($items as $item)
                                    <tr role="row" class="odd">
                                        <td tabindex="0" class="sorting_1">
                                            {{ $item->id }}
                                        </td>
                                        <td>{{ $item->item_name }}</td>
                                        <td>{{ $item->item_category }}</td>
                                        <td>&#8358;{{ $item->item_price }}</td>
                                        <td>{{ $item->package_unit }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->updated_at }}</td>
                                        <td>
                                            <button class="fa fa-edit pr-3"
                                                wire:click="editItem({{ $item->id }})"></button>
                                            <button class="fa fa-trash text-danger"
                                                wire:click.prevent="deleteConfirm({{ $item->id }})"></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" style="text-align: center">
                                        No Item Found
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="mr-0 pl-0">
                        {{ $items->links('vendor.livewire.bootstrap') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            $('#addItemModal').modal('hide');
            $('#editItemModal').modal('hide');
        });
        window.addEventListener('show-edit-item-modal', event => {
            $('#editItemModal').modal('show');
        });
        window.addEventListener('show-delete-alert', event => {
            $('#sa-warning').modal('show');
        });
    </script>
    <!--Sweet alert delete script -->
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

        window.addEventListener('itemDeleted', event => {
            Swal.fire(
                'Deleted',
                'Item has been deleted',
                'success',
            )
        })
    </script>
@endpush
