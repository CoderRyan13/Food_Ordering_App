@extends('layout.app')

@section('style')
@stop

@section('content')
    <div class="row">
        <h2 class="text-primary">Drivers</h2>

        <button class="add-driver-btn btn btn-outline-primary w-25 mb-2">Add a Driver</button>

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
                <th>Driver</th>
                <th></th>
            </tr>
            <tbody class="drivers"></tbody>
        </table>
    </div>
@stop

@section('script')
<script>
    $(document)
        .ready(function(e) {
            $.ajax({
				type		: 'POST',
				url		: "{{url ('/')}}/get_all_drivers",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
				dataType	: 'json',
				success	: function (data) {
                    let finalHTML = '';

                    $.each(data, function(key, val) {
                        finalHTML += `
                            <tr>
                                <td>${val.driver}</td>
                                <td><button id="${val.id}" class="btn btn-sm btn-outline-danger remove-driver">Remove</button></td>
                            </tr>
                        `;
                    });

                    $(".drivers").append(finalHTML);
				},
				error		: function (request, status, error) {
					console.log (request.status, request.responseText);
				},
				async		: false
			});
        })
        .on('click', '.add-driver-btn', function(e) {
            $('.open-modal').trigger('click');
            $('.modal-title').html(`Add a driver`);
            $('.modal-body').html(`
                <div class="row">
                    <label>Driver Name: </label>
                    <input type="text" class="form-control driver-name">
                </div>
                <div class="text-end mt-3">
                    <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary add-driver">Add Driver</button>
                </div>
            `);
        })
        .on('click', '.add-driver', function(e) {
            $('.btn-close').trigger('click');
            $.ajax({
				type		: 'POST',
				url		: "{{url ('/')}}/add_driver",
                data    : {
                    'driver' : $('.driver-name').val(),
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
				dataType	: 'json',
				success	: function (data) {
                    if (data.trim() == 'y') {
                        display_alert ('Add Driver', 'Driver has been added.', 1);
                        setTimeout("location.href = '/driver';",1500);
                    } else if(data.trim() == 'n') {
                        display_alert ('Add Driver', 'Driver could not be added at this moment.', 0);
                        setTimeout("location.href = '/driver';",1500);
                    } else if(data.trim() == 'e') {
                        display_alert ('Add Driver', 'Driver field required.', 3);
                        setTimeout("location.href = '/driver';",1500);
                    }
				},
				error		: function (request, status, error) {
					console.log (request.status, request.responseText);
				},
				async		: false
			});
        })
        .on('click', '.remove-driver', function(e) {
            let id = this.id;
            $('.btn-close').trigger('click');
            $.ajax({
				type		: 'POST',
				url		: "{{url ('/')}}/remove_driver",
                data    : { 'id' : id },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
				dataType	: 'json',
				success	: function (data) {
                    if (data.trim() == 'y') {
                        display_alert ('Remove Driver', 'Driver has been removed.', 1);
                        setTimeout("location.href = '/driver';",1500);
                    } else {
                        display_alert ('Remove Driver', 'Driver could not be removed at this moment.', 0);
                        setTimeout("location.href = '/driver';",1500);
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