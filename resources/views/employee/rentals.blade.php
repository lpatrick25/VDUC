@extends('layouts.master')
@section('equipments-active', 'active')
@section('rental-active', 'active')
@section('APP-CONTENT')
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Rental List</h4>
            </div>
            <div class="iq-card-header-toolbar d-flex align-items-center">
                <button type="button" id="addBtn" class="btn btn-primary" data-toggle="modal" data-target="#addModal"
                    class="btn btn-primary">Add New</button>
            </div>
        </div>
        <div class="iq-card-body">
            <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered mt-4" role="grid"
                    aria-describedby="user-list-page-info">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Pick-Up Date</th>
                            <th>Return Date</th>
                            <th>Items Borrowed</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rentals as $rental)
                            <tr @if ($rental->status === 'Overdue') class="table-danger" @endif>
                                <td>{{ $rental->id }}</td>
                                <td>{{ $rental->user->full_name ?? 'N/A' }}</td>
                                <td>{{ date('F j, Y', strtotime($rental->pick_up_date)) }}</td>
                                <td>{{ date('F j, Y', strtotime($rental->return_date)) }}</td>
                                <td>
                                    @foreach ($rental->equipment as $equipment)
                                        <span class="badge badge-info">{{ $equipment->equipment_name }} (Qty:
                                            {{ $equipment->pivot->quantity }})</span>
                                    @endforeach
                                </td>
                                <td>
                                    @if ($rental->status === 'Returned')
                                        <span class="badge badge-success">Returned</span>
                                    @elseif ($rental->status === 'Overdue')
                                        <span class="badge badge-danger">Overdue</span>
                                    @elseif ($rental->status === 'Pending')
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif ($rental->status === 'Confirmed')
                                        <span class="badge badge-primary">Confirmed</span>
                                    @elseif ($rental->status === 'Released')
                                        <span class="badge badge-info">Released</span>
                                    @elseif ($rental->status === 'Cancelled')
                                        <span class="badge badge-dark">Cancelled</span>
                                    @else
                                        <span class="badge badge-secondary">Unknown</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($rental->status === 'Pending')
                                        <button type="button" class="btn btn-success confirmBtn"
                                            data-id="{{ $rental->id }}" title="Confirm">
                                            <i class="ri-check-line"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger cancelBtn"
                                            data-id="{{ $rental->id }}" title="Cancel">
                                            <i class="ri-close-line"></i>
                                        </button>
                                    @elseif ($rental->status === 'Confirmed')
                                        <button type="button" class="btn btn-info releaseBtn" data-id="{{ $rental->id }}"
                                            title="Release">
                                            <i class="ri-send-plane-line"></i>
                                        </button>
                                    @elseif ($rental->status === 'Released')
                                        <button type="button" class="btn btn-primary returnBtn"
                                            data-id="{{ $rental->id }}" title="Return">
                                            <i class="ri-arrow-go-back-line"></i>
                                        </button>
                                    @elseif ($rental->status === 'Overdue')
                                        <button type="button" class="btn btn-danger returnBtn"
                                            data-id="{{ $rental->id }}" title="Return (Overdue)">
                                            <i class="ri-time-line"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Return Rental Modal -->
    <div class="modal fade" id="returnModal" tabindex="-1" role="dialog" aria-labelledby="returnModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form id="returnForm">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Return Equipment Items</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" id="rental_id" name="rental_id">

                        <div id="equipmentItemsContainer">
                            <!-- Dynamically populated equipment items -->
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="ri-save-line"></i> Save Return
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Confirm Rental Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form id="confirmForm">
                <input type="hidden" name="rental_id" id="confirmRentalId">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirm Rental</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" id="confirmEquipmentList">
                        <!-- Dynamic equipment list will be inserted here -->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('APP-SCRIPT')
    <script>
        $(document).ready(function() {
            let rentalID = null;

            $('.cancelBtn, .releaseBtn').on('click', function() {
                const rentalId = $(this).data('id');
                const action = $(this).hasClass('confirmBtn') ? 'confirm' :
                    $(this).hasClass('cancelBtn') ? 'cancel' :
                    $(this).hasClass('releaseBtn') ? 'release' :
                    'return';

                $.post(`/employee/rentals/${rentalId}/action`, {
                        action: action,
                        _token: '{{ csrf_token() }}'
                    })
                    .done(function(response) {
                        showContainerMessage(response.message, 'success');
                        setTimeout(() => location.reload(), 1000);
                    })
                    .fail(function(xhr) {
                        showModalMessage(response.message ||
                            'An error occurred.',
                            'error');
                    });
            });

            $('.confirmBtn').on('click', function() {
                const rentalId = $(this).data('id');
                $('#confirmRentalId').val(rentalId);
                $('#confirmEquipmentList').empty();

                const confirmModal = $('#confirmModal');
                setModalMessage(confirmModal); // Clear any previous messages

                $.get('/employee/rentals/' + rentalId + '/items', function(response) {
                    if (response.success) {
                        showModalMessage(response.message, 'success');
                        response.data.items.forEach(item => {
                            const html = `
                                <div class="form-group">
                                    <label>${item.equipment_name} (Max: ${item.quantity})</label>
                                    <input type="number" class="form-control" name="items[${item.id}][quantity]" min="1" max="${item.quantity}" value="${item.quantity}">
                                    <input type="hidden" name="items[${item.id}][equipment_id]" value="${item.equipment_id}">
                                </div>
                            `;
                            $('#confirmEquipmentList').append(html);
                        });

                        $('#confirmModal').modal('show');
                    } else {
                        showModalMessage(response.message || 'Failed to retrieve rental items.',
                            'error');
                    }
                }).fail(function(xhr) {
                    showModalMessage(response.message ||
                        'An error occurred while fetching rental items.',
                        'error');
                });
            });

            $('#confirmForm').on('submit', function(e) {
                e.preventDefault();

                const confirmModal = $('#confirmModal');
                setModalMessage(confirmModal); // Clear any previous messages

                const formData = $(this).serialize();
                const submitButton = $(this).find('button[type="submit"]');

                submitButton.prop('disabled', true).text('Processing...');

                $.ajax({
                    url: '{{ route('rentals.confirm') }}',
                    type: 'POST',
                    data: formData,
                    dataType: 'JSON',
                    success: function(response) {
                        if (response.success) {
                            $('#confirmModal').modal('hide');
                            showContainerMessage(response.message, 'success');
                            setTimeout(() => location.reload(), 1000);
                        } else {
                            showModalMessage(response.message || 'Something went wrong.',
                                'error');
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
                            console.error('Error confirming rental:', err);
                            showModalMessage('An unexpected error occurred. Please try again.',
                                'error');
                        }
                    },
                    complete: function() {
                        submitButton.prop('disabled', false).text('Confirm');
                    }
                });
            });

            // When clicking Return button
            $('.returnBtn').on('click', function() {
                const rentalId = $(this).data('id');
                $('#rental_id').val(rentalId);

                // Clear previous
                $('#equipmentItemsContainer').empty();

                // Fetch rental equipment items (use your real API route)
                $.get('/employee/rentals/' + rentalId + '/items', function(data) {
                    data.items.forEach(function(item) {
                        const itemHtml = `
                            <div class="card mb-3" data-item-id="${item.id}">
                                <div class="card-body">
                                    <h5 class="card-title">${item.equipment_name} (Qty: ${item.quantity})</h5>

                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label>Okay</label>
                                            <input type="number" min="0" class="form-control qty-input" data-item-id="${item.id}" data-max="${item.quantity}" name="statuses[${item.id}][okay]" value="0">
                                        </div>
                                        <div class="form-group col">
                                            <label>Damaged</label>
                                            <input type="number" min="0" class="form-control qty-input" data-item-id="${item.id}" data-max="${item.quantity}" name="statuses[${item.id}][damaged]" value="0">
                                        </div>
                                        <div class="form-group col">
                                            <label>Lost</label>
                                            <input type="number" min="0" class="form-control qty-input" data-item-id="${item.id}" data-max="${item.quantity}" name="statuses[${item.id}][lost]" value="0">
                                        </div>
                                    </div>

                                    <input type="hidden" name="statuses[${item.id}][equipment_id]" value="${item.equipment_id}">
                                    <small class="text-danger d-none" id="error-${item.id}">Total quantity exceeds rented amount!</small>
                                </div>
                            </div>
                        `;

                        $('#equipmentItemsContainer').append(itemHtml);

                        // Attach input change listener
                        $(document).on('input', `.qty-input[data-item-id="${item.id}"]`,
                            function() {
                                const inputs = $(
                                    `.qty-input[data-item-id="${item.id}"]`);
                                let total = 0;

                                inputs.each(function() {
                                    total += parseInt($(this).val()) || 0;
                                });

                                const max = parseInt($(this).data('max'));

                                if (total > max) {
                                    $(`#error-${item.id}`).removeClass('d-none');
                                } else {
                                    $(`#error-${item.id}`).addClass('d-none');
                                }
                            });
                    });

                    $('#returnModal').modal('show');
                });
            });

            $('#returnForm').on('submit', function(e) {
                e.preventDefault();

                const returnModal = $('#returnModal');
                setModalMessage(returnModal); // Clear any previous messages

                const formData = $(this).serialize();
                const submitButton = $(this).find('button[type="submit"]');

                submitButton.prop('disabled', true).text('Processing...');

                $.ajax({
                    url: '/employee/rentals/' + $('#rental_id').val() + '/return',
                    type: 'POST',
                    data: formData,
                    dataType: 'JSON',
                    success: function(response) {
                        if (response.success) {
                            $('#returnModal').modal('hide');
                            showContainerMessage(response.message, 'success');
                            setTimeout(() => location.reload(), 1000);
                        } else {
                            showModalMessage(response.message || 'Something went wrong.', 'error');
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
                            console.error('Error returning rental:', err);
                            showModalMessage('An unexpected error occurred. Please try again.', 'error');
                        }
                    },
                    complete: function() {
                        submitButton.prop('disabled', false).text('Save Return');
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
                    url: `/rentals/${rentalID}`,
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
