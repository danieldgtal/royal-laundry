<div class="row">
    <!-- Add Item Modal -->
    <div wire:ignore.self class="modal fade" id="addNewStaff" tabindex="-1" data-backdrop="static" role="dialog"
        data-keyboard="false" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Staff</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="addStaff">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="firstname">FirstName </label>
                                <input type="text" class="form-control" wire:model="firstname">
                                @error('firstname')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="lastname">LastName</label>
                                <input type="text" class="form-control" wire:model="lastname">
                                @error('lastname')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="phone">Phone </label>
                                <input type="phone" class="form-control" wire:model="phone" autocomplete="off">
                                @error('phone')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" wire:model="email" autocomplete="off">
                                @error('email')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="gender">Gender</label>
                                <select class="form-control" wire:model="gender">
                                    <option value="">--Gender--</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                @error('gender')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <div>
                                    <label for="item-category">Branch ID</label>
                                    <select class="form-control" wire:model="branch">
                                        <option value="">--Select Branch--</option>
                                        @foreach ($branches as $branch)
                                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('branch')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="gender">Password</label>
                                <input type="password" class="form-control" wire:model="password" autocomplete="off">
                                @error('password')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <div>
                                    <label for="Phone">Confirm Password</label>
                                    <input type="password" class="form-control" wire:model="password_confirmation">
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" wire:click="addStaff">Add New Staff
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Staff Modal -->
    <div wire:ignore.self class="modal fade" id="editStaffModal" tabindex="-1" data-backdrop="static" role="dialog"
        data-keyboard="false" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Staff Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="editStaffData">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="firstname">FirstName </label>
                                <input type="text" class="form-control" wire:model="firstname">
                                @error('firstname')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="lastname">LastName</label>
                                <input type="text" class="form-control" wire:model="lastname">
                                @error('lastname')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="phone">Phone </label>
                                <input type="phone" class="form-control" wire:model="phone" autocomplete="off">
                                @error('phone')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" wire:model="email" autocomplete="off">
                                @error('email')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="gender">Gender</label>
                                <select class="form-control" wire:model="gender">
                                    <option value="">--Gender--</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                @error('gender')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <div>
                                    <label for="item-category">Branch ID</label>
                                    <select class="form-control" wire:model="branch">
                                        <option value="">--Select Branch--</option>
                                        @foreach ($branches as $branch)
                                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('branch')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="gender">Password</label>
                                <input type="password" class="form-control" wire:model="password"
                                    autocomplete="off">
                                @error('password')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <div>
                                    <label for="Phone">Confirm Password</label>
                                    <input type="password" class="form-control" wire:model="password_confirmation">
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" wire:click="editStaffData">Update Staff
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title">Staff Management</h4>
            <p class="sub-header">
                Admin User priviledges, admin can add a new staff, delete staffs and change staff branches.
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
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                            data-target="#addNewStaff"><i class="fa fa-plus"></i> Add
                            Staff</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="datatable"
                            class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                            style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                            aria-describedby="datatable_info">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Staff ID</th>
                                    <th>Branch ID</th>
                                    <th>FirstName</th>
                                    <th>LastName</th>
                                    <th>Gender</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($staffs->count() > 0)
                                    @foreach ($staffs as $staff)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $staff->branch_id }}{{ '00' . $staff->staff_id }}</td>
                                            <td>
                                                @php
                                                    $branch = App\Models\Branch::find($staff->branch_id);
                                                @endphp
                                                {{ $branch->name }}
                                            </td>
                                            <td>{{ $staff->firstname }}</td>
                                            <td>{{ $staff->lastname }}</td>
                                            <td>{{ $staff->gender }}</td>
                                            <td>{{ $staff->email }}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary"
                                                    wire:click.prevent="editStaff({{ $staff->staff_id }})">Edit</button>
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    wire:click.prevent="deleteDialog({{ $staff->staff_id }})">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Pagination buttons -->
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="datatable-buttons_info" role="status" aria-live="polite">
                            Showing {{ $staffs->firstItem() }} to {{ $staffs->lastItem() }} of
                            {{ $staffs->total() }}
                            entries
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="d-flex justiy-content-center flex-wrap">
                            {{ $staffs->links('vendor.livewire.bootstrap') }}
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
            $('#addNewStaff').modal('hide');
            $('#editStaffModal').modal('hide');
        });
        window.addEventListener('show-edit-staff-model', event => {
            $('#editStaffModal').modal('show');
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
                text: "You won't be revert this staff!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('confirmDelete')
                }
            })
        })

        window.addEventListener('itemDeleted', event => {
            Swal.fire(
                'Deleted',
                'Staff has been deleted',
                'success',
            )
        })
    </script>
@endpush
