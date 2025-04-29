@section('APP-CSS')
@endsection
<!-- Add Equipment Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content shadow-lg border-0">
            <form id="addModalForm">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title text-white fw-bold" id="addModalLabel">Add Equipment</h5>
                    <button type="button" class="btn-close btn-close-white" data-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="equipment_name" class="form-label fw-bold">Equipment Name</label>
                            <input type="text" class="form-control" id="equipment_name" name="equipment_name"
                                required>
                        </div>
                        <div class="col-md-12">
                            <label for="quantity" class="form-label fw-bold">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="submit" class="btn btn-primary">Add Equipment</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
