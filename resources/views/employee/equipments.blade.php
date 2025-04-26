@extends('layouts.master')
@section('equipments-active', 'active')
@section('equipment-active', 'active')
@section('APP-CONTENT')
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Equipment List</h4>
            </div>
            <div class="iq-card-header-toolbar d-flex align-items-center">
                <button type="button" id="addBtn" class="btn btn-primary" data-toggle="modal" data-target="#addModal" class="btn btn-primary">Add New</button>
            </div>
        </div>
        <div class="iq-card-body">
            <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered mt-4" role="grid"
                    aria-describedby="user-list-page-info">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Equipment Name</th>
                            <th>Quantity</th>
                            <th>Remaining</th>
                            <th>Rented</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($equipments as $equipment)
                            <tr>
                                <td>{{ $equipment->id }}</td>
                                <td>{{ ucwords($equipment->equipment_name) }}</td>
                                <td>{{ $equipment->quantity }}</td>
                                <td>
                                    @if ($equipment->available_quantity <= 0)
                                        <span class="badge badge-danger">Out of Stock</span>
                                    @elseif($equipment->available_quantity < 3)
                                        <span class="badge badge-warning">Low Stock
                                            ({{ $equipment->available_quantity }})
                                        </span>
                                    @else
                                        <span class="badge badge-success">{{ $equipment->available_quantity }}
                                            Available</span>
                                    @endif
                                </td>
                                <td><span class="badge badge-primary">{{ $equipment->rented_quantity ?? 0 }} Rented</span>
                                </td>
                                <td>
                                    @if ($equipment->status === 'Available')
                                        <span class="badge badge-success">Available</span>
                                    @elseif ($equipment->status === 'inactive')
                                        <span class="badge badge-secondary">Not Available</span>
                                    @else
                                        <span class="badge badge-warning">Unknown</span>
                                    @endif
                                </td>
                                <td>{{ date('F j, Y', strtotime($equipment->created_at)) }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary editBtn" data-id="{{ $equipment->id }}"
                                        data-toggle="modal" data-target="#editModal">Edit</button>
                                    <button type="button" class="btn btn-danger deleteBtn" data-id="{{ $equipment->id }}"
                                        data-toggle="modal" data-target="#deleteModal">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('modals.add_equipment')
    @include('modals.edit_equipment')
    @include('modals.delete_equipment')
@endsection
@section('APP-SCRIPT')
    <script>
        $(document).ready(function() {
            let equipmentID = null;

            $('.deleteBtn').on('click', function() {
                const id = $(this).data('id');
                const deleteModal = $('#deleteModal');
                deleteModal.find('.confirmDelete').data('id', id);
                setModalMessage(deleteModal);
                deleteModal.modal('show');
            });

            $('.confirmDelete').on('click', function() {
                const id = $(this).data('id');
                $.ajax({
                    url: `/equipments/${id}`,
                    method: 'DELETE',
                    dataType: 'JSON',
                    success: function(response) {
                        if (response.success) {
                            $('#deleteModal').modal('hide');
                            showContainerMessage(response.message, 'success');
                            setTimeout(() => location.reload(), 1000);
                        } else {
                            showModalMessage(response.message, 'error');
                        }
                    },
                    error: function(err) {
                        console.error('Error deleting user:', err);
                        showModalMessage('An unexpected error occurred. Please try again.',
                            'error');
                    }
                });
            });

            $('.editBtn').on('click', function() {
                const id = $(this).data('id');
                $.ajax({
                    url: `/equipments/${id}`,
                    method: 'GET',
                    dataType: 'JSON',
                    cache: false,
                    success: function(response) {
                        const data = response.data;
                        equipmentID = data.id;
                        $('#editModal').find('input[name="equipment_name"]').val(data.equipment_name);
                        $('#editModal').find('input[name="quantity"]').val(data.quantity);
                        $('#editModal').modal('show');
                    },
                    error: function(err) {
                        console.error('Error fetching equipment data:', err);
                    }
                });
            });

            $('#addModalForm').submit(function(e) {
                e.preventDefault();
                const addModal = $('#addModal');
                setModalMessage(addModal);
                const formData = $(this).serialize();
                $.ajax({
                    url: '/equipments',
                    method: 'POST',
                    data: formData,
                    dataType: 'JSON',
                    success: function(response) {
                        if (response.success) {
                            $('#addModal').modal('hide');
                            showContainerMessage(response.message, 'success');
                            setTimeout(() => location.reload(), 1000);
                        }
                    },
                    error: function(err) {
                        if (err.status === 422) {
                            const errors = err.responseJSON.errors;
                            let errorMessages = '';
                            for (const field in errors) {
                                errorMessages += `${errors[field].join(', ')}\n`;
                            }
                            showModalMessage(errorMessages, 'error');
                        } else {
                            console.error('Error adding user:', err);
                            showModalMessage('An unexpected error occurred. Please try again.',
                                'error');
                        }
                    }
                });
            });

            $('#editModalForm').submit(function(e) {
                e.preventDefault();
                const editModal = $('#editModal');
                setModalMessage(editModal);
                const formData = $(this).serialize();
                $.ajax({
                    url: `/equipments/${equipmentID}`,
                    method: 'PUT',
                    data: formData,
                    dataType: 'JSON',
                    success: function(response) {
                        if (response.success) {
                            $('#editModal').modal('hide');
                            showContainerMessage(response.message, 'success');
                            setTimeout(() => location.reload(), 1000);
                        }
                    },
                    error: function(err) {
                        if (err.status === 422) {
                            const errors = err.responseJSON.errors;
                            let errorMessages = '';
                            for (const field in errors) {
                                errorMessages += `${errors[field].join(', ')}\n`;
                            }
                            showModalMessage(errorMessages, 'error');
                        } else {
                            console.error('Error updating user:', err);
                            showModalMessage('An unexpected error occurred. Please try again.',
                                'error');
                        }
                    }
                });
            });

        });
    </script>
@endsection
