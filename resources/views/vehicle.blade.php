@extends('layout.app')

@section('style')
@stop

@section('content')
    <div class="row">
        <h2 class="text-primary">Vehicles</h2>

        <button class="add-vehicle-btn btn btn-outline-primary w-25 mb-2">Add a Vehicle</button>

        <div class="row">
            <button type="button" class="btn btn-primary mb-2 w-25 open-modal d-none" data-bs-toggle="modal" data-bs-target="#openModal">Open Modal</button>
            <div class="modal fade" id="openModal" tabindex="-1"	aria-labelledby="openModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="openModalLabel1">#</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">#</div>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-striped table-hover">
            <tr>
                <th>Vehicle</th>
                <th>Vehicle #</th>
                <th></th>
            </tr>
            <tbody class="vehicles"></tbody>
        </table>
    </div>
@stop

@section('script')
<script>
    $(document)
        .ready(function(e) {
            $.ajax({
				type		: 'POST',
				url		: "{{url ('/')}}/get_all_vehicles",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
				dataType	: 'json',
				success	: function (data) {
                    let finalHTML = '';

                    $.each(data, function(key, val) {
                        finalHTML += `
                            <tr>
                                <td>${val.vehicle}</td>
                                <td>${val.vehicle_number}</td>
                                <td><button id="${val.id}" class="btn btn-sm btn-outline-danger remove-vehicle">Remove</button></td>
                            </tr>
                        `;
                    });

                    $(".vehicles").append(finalHTML);
				},
				error		: function (request, status, error) {
					console.log (request.status, request.responseText);
				},
				async		: false
			});
        })
        .on('click', '.add-vehicle-btn', function(e) {
            $('.open-modal').trigger('click');
            $('.modal-title').html(`Add a vehicle`);
            $('.modal-body').html(`
                <div class="row">
                    <label>Vehicle Name: </label>
                    <input type="text" class="form-control vehicle-name">

                    <label class="mt-2">Vehicle Number: </label>
                    <input type="text" class="form-control vehicle-number">
                </div>
                <div class="text-end mt-3">
                    <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary add-vehicle">Add Vehicle</button>
                </div>
            `);
        })
        .on('click', '.add-vehicle', function(e) {
            $('.btn-close').trigger('click');
            $.ajax({
				type		: 'POST',
				url		: "{{url ('/')}}/add_vehicle",
                data    : {
                    'vehicle' : $('.vehicle-name').val(),
                    'vehicle_number' : $('.vehicle-number').val()
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
				dataType	: 'json',
				success	: function (data) {
                    if (data.trim() == 'y') {
                        display_alert ('Add Vehicle', 'Vehicle has been added.', 1);
                        setTimeout("location.href = '/vehicle';",1500);
                    } else {
                        display_alert ('Add Vehicle', 'Vehicle could not be added at this moment.', 0);
                        setTimeout("location.href = '/vehicle';",1500);
                    }
				},
				error		: function (request, status, error) {
					console.log (request.status, request.responseText);
				},
				async		: false
			});
        })
        .on('click', '.remove-vehicle', function(e) {
            let id = this.id;
            $('.btn-close').trigger('click');
            $.ajax({
				type		: 'POST',
				url		: "{{url ('/')}}/remove_vehicle",
                data    : { 'id' : id },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
				dataType	: 'json',
				success	: function (data) {
                    if (data.trim() == 'y') {
                        display_alert ('Remove Vehicle', 'Vehicle has been removed.', 1);
                        setTimeout("location.href = '/vehicle';",1500);
                    } else {
                        display_alert ('Remove Vehicle', 'Vehicle could not be removed at this moment.', 0);
                        setTimeout("location.href = '/vehicle';",1500);
                    }
				},
				error		: function (request, status, error) {
					console.log (request.status, request.responseText);
				},
				async		: false
			});
        })
</script>
@stop