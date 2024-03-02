<div class="row">
    <!-- Add Category Modal -->
    <div wire:ignore.self class="modal fade" id="addCategoryModal" tabindex="-1" data-backdrop="static" role="dialog"
        data-keyboard="false" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        wire:click="$set('showModal', false)">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="addNewItem">
                        <div class="form-group">
                            <label for="item-name">Category Name</label>
                            <div>
                                <input type="text" class="form-control" id="category-name" wire:model="category_name"
                                    placeholder="Enter category name">
                                @error('category_name')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" wire:click="addNewCategory">Add New Category</button>
                </div>
            </div>
        </div>
    </div>
    <!--Edit Item Modal-->
    <div wire:ignore.self class="modal fade" id="editCategory" tabindex="-1" data-backdrop="static" role="dialog"
        data-keyboard="false" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Existing Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        wire:click="$set('showModal', false)">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="addNewItem">
                        <div class="form-group">
                            <label for="item-name">Category Name</label>
                            <div>
                                <input type="text" class="form-control" id="category-name" wire:model="category_name"
                                    placeholder="Enter category name">
                                @error('category_name')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" wire:click="editCategoryData">Add New Item</button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title">All Categories Table</h4>
            <p class="sub-header">
                allows staff to manage the list of Categories that the laundry
                service provides. This module typically includes functionality
                to create, edit, delete, and view Categories.
            </p>
            @if (session()->has('message'))
                <div class="alert alert-success text-center">{{ session('message') }}</div>
            @endif

            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
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
                    <div class="col-sm-12 col-md-6">
                        <button class="btn btn-primary waves-effect waves-light float-right" data-toggle="modal"
                            data-target="#addCategoryModal">
                            <i class="fa fa-plus"></i> Add item
                        </button>
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
                                <th tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                    style="width: 10px" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending">
                                    ID
                                </th>
                                <th tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                    style="width: 108px" aria-label="Start date: activate to sort column ascending">
                                    Category Name
                                </th>
                                <th tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                    style="width: 88px" aria-label="Salary: activate to sort column ascending">
                                    Date Created
                                </th>
                                <th tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                    style="width: 88px" aria-label="Salary: activate to sort column ascending">
                                    Date Updated
                                </th>
                                <th tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                    style="width: 88px" aria-label="Salary: activate to sort column ascending">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($categories->count() > 0)
                                @foreach ($categories as $category)
                                    <tr role="row" class="odd">
                                        <td tabindex="0" class="sorting_1">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->created_at }}</td>
                                        <td>{{ $category->updated_at }}</td>
                                        <td>
                                            <button class="fa fa-edit pr-3"
                                                wire:click="editCategory({{ $category->id }})"></button>
                                            <button class="fa fa-trash text-danger"
                                                wire:click.prevent="deleteConfirm({{ $category->id }})"></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" style="text-align: center">
                                        No Category Found
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="datatable-buttons_info" role="status" aria-live="polite">
                        Showing {{ $categories->firstItem() }} to {{ $categories->lastItem() }} of
                        {{ $categories->total() }}
                        entries
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="d-flex justiy-content-center flex-wrap">
                        {{ $categories->links('vendor.livewire.bootstrap') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            $('#addCategoryModal').modal('hide');
            $('#editCategory').modal('hide');
        });
        window.addEventListener('show-edit-category-modal', event => {
            $('#editCategory').modal('show');
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
                text: "All Items under this category will be deleted too!",
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
