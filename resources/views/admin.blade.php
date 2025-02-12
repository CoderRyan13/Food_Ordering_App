@extends('layout.app')

@section('style')
@stop

@section('content')
    <div class="row">
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

        <h2 class="text-primary">Requested Vehicles</h2>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Requested By</th>
                    <th>Time Out Date</th>
                    <th>Destination</th>
                    <th>Purpose</th>
                    <th>Preferred Vehicle</th>
                    <th>Driver</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="requested-vehicles"></tbody>
        </table>

        <h2 class="text-success" style="margin-top: 60px;">Approved Vehicles</h2>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Requested By</th>
                    <th>Time Out Date</th>
                    <th>Time In Date</th>
                    <th>Destination</th>
                    <th>Purpose</th>
                    <th>Preferred Vehicle</th>
                    <th>Driver</th>
                    <th>Approved Vehicle</th>
                </tr>
            </thead>
            <tbody class="approved-vehicles"></tbody>
        </table>

        <h2 class="text-danger" style="margin-top: 60px;">Denied Vehicles</h2>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Requested By</th>
                    <th>Time Out Date</th>
                    <th>Destination</th>
                    <th>Purpose</th>
                    <th>Preferred Vehicle</th>
                    <th>Driver</th>
                    <th>Reason</th>
                </tr>
            </thead>
            <tbody class="denied-vehicles"></tbody>
        </table>
    </div>
@stop

@section('script')
<script>
    $(document)
        .ready(function(e) {
            $.ajax({
				type		: 'POST',
				url		: "{{url ('/')}}/get_requests",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
				dataType	: 'json',
				success	: function (data) {
                    let finalHTML = '';

                    $.each(data, function(key, val) {
                        finalHTML += `
                            <tr>
                                <td>${val.supervisor}</td>
                                <td>${val.timeout_date}</td>
                                <td>${val.destination}</td>
                                <td>${val.purpose}</td>
                                <td>${val.preferred_vehicle}</td>
                                <td>${val.driver}</td>
                                <td>
                                    <button id="${val.id}" class="btn btn-sm btn-outline-primary approve">Approve</button>
                                    <button id="${val.id}" class="btn btn-sm btn-outline-danger deny">Deny</button>
                                </td>
                            </tr>
                        `;
                    });

                    $(".requested-vehicles").append(finalHTML);
				},
				error		: function (request, status, error) {
					console.log (request.status, request.responseText);
				},
				async		: false
			});

            $.ajax({
				type		: 'POST',
				url		: "{{url ('/')}}/get_approved",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
				dataType	: 'json',
				success	: function (data) {
                    let finalHTML = '';

                    // Create a new Date object for the current date and time
                    let currentDate = new Date();

                    // Set the time to the last moment of the day (23:59:59.999)
                    // currentDate.setHours(23);
                    // currentDate.setMinutes(59);
                    // currentDate.setSeconds(59);
                    // currentDate.setMilliseconds(999);

                    $.each(data, function(key, val) {
                        let color = '';

                        if (new Date(val.timeout_date) >= currentDate) { color = '#a7dafa'; };

                        finalHTML += `
                            <tr>
                                <td style="background-color: ${color};">${val.supervisor}</td>
                                <td style="background-color: ${color};">${val.timeout_date}</td>
                                <td style="background-color: ${color};">${val.timein_date}</td>
                                <td style="background-color: ${color};">${val.destination}</td>
                                <td style="background-color: ${color};">${val.purpose}</td>
                                <td style="background-color: ${color};">${val.preferred_vehicle}</td>
                                <td style="background-color: ${color};">${val.driver}</td>
                                <td style="background-color: ${color};">${val.approved_vehicle}</td>
                                <td style="background-color: ${color};"><button id="${val.id}" class="btn btn-sm btn-success edit-approve">Edit</button></td>
                            </tr>
                        `;
                    });

                    $(".approved-vehicles").append(finalHTML);
				},
				error		: function (request, status, error) {
					console.log (request.status, request.responseText);
				},
				async		: false
			});

            $.ajax({
				type		: 'POST',
				url		: "{{url ('/')}}/get_denied",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
				dataType	: 'json',
				success	: function (data) {
                    let finalHTML = '';

                    $.each(data, function(key, val) {
                        finalHTML += `
                            <tr>
                                <td>${val.supervisor}</td>
                                <td>${val.timeout_date}</td>
                                <td>${val.destination}</td>
                                <td>${val.purpose}</td>
                                <td>${val.preferred_vehicle}</td>
                                <td>${val.driver}</td>
                                <td>${val.deny_reason}</td>
                            </tr>
                        `;
                    });

                    $(".denied-vehicles").append(finalHTML);
				},
				error		: function (request, status, error) {
					console.log (request.status, request.responseText);
				},
				async		: false
			});
        })
        .on('click', '.approve', function(e) {
            let id = this.id;

            $.ajax({
				type		: 'POST',
				url		: "{{url ('/')}}/get_request",
                data    : {'id' : id},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
				dataType	: 'json',
				success	: function (data) {
                    $('.open-modal').trigger('click');
                    $('.modal-title').html(`Approve Vehicle Request`);
                    $('.modal-body').html(`
                        <div class="row">
                            <label>Select a vehicle to approve: </label>
                            <select class="form-control selected_vehicle"></select>
                        </div>
                        <div class="text-end mt-3">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" id="${id}" class="btn btn-primary approve-vehicle">Approve</button>
                        </div>
                    `);

                    $.ajax({
                        type		: 'POST',
                        url		: "{{url ('/')}}/get_all_vehicles",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType	: 'json',
                        success	: function (data) {
                            let finalHTML = '<option value="">-</option>';

                            $.each(data, function(key, val) {
                                finalHTML += `<option value="${val.vehicle} | ${val.vehicle_number}">${val.vehicle} | ${val.vehicle_number}</option>`;
                            });

                            $('.selected_vehicle').append(finalHTML);
                            $('.selected_vehicle').select2({dropdownParent: $("#openModal"), width: '90%'});
                        },
                        error		: function (request, status, error) {
                            console.log (request.status, request.responseText);
                        },
                        async		: false
                    });
				},
				error		: function (request, status, error) {
					console.log (request.status, request.responseText);
				},
				async		: false
			});
        })
        .on('click', '.deny', function(e) {
            let id = this.id;

            $('.open-modal').trigger('click');
            $('.modal-title').html(`Deny Vehicle Request`);
            $('.modal-body').html(`
                <div class="row">
                    <label>Reason: </label>
                    <input type="text" class="form-control deny-reason" />
                </div>
                <div class="text-end mt-3">
                    <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" id="${id}" class="btn btn-primary deny-vehicle">Deny</button>
                </div>
            `);
        })
        .on('click', '.approve-vehicle', function(e) {
            $('.btn-close').trigger('click');
	        let id = this.id;

            $.ajax({
				type		: 'POST',
				url		: "{{url ('/')}}/approve_vehicle",
                data    : {
                    'id' : id,
                    'vehicle' : $('.selected_vehicle').val()
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
				dataType	: 'json',
				success	: function (data) {
                    if (data.trim() == 'y') {
                        display_alert ('Approve', 'Vehicle Request has been approved.', 1);
                        setTimeout("location.href = '/admin';",1500);
                    } else {
                        display_alert ('Approve', 'Vehicle Request could not be approved at this moment.', 0);
                        setTimeout("location.href = '/admin';",1500);
                    }
				},
				error		: function (request, status, error) {
					console.log (request.status, request.responseText);
				},
				async		: false
			});
        })
        .on('click', '.deny-vehicle', function(e) {
            $('.btn-close').trigger('click');
	        let id = this.id;

            $.ajax({
				type		: 'POST',
				url		: "{{url ('/')}}/deny_vehicle",
                data    : {
                    'id' : id,
                    'deny_reason' : $('.deny-reason').val()
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
				dataType	: 'json',
				success	: function (data) {
                    if (data.trim() == 'y') {
                        display_alert ('Deny', 'Vehicle Request has been denied.', 1);
                        setTimeout("location.href = '/admin';",1500);
                    } else {
                        display_alert ('Deny', 'Vehicle Request could not be denied at this moment.', 0);
                        setTimeout("location.href = '/admin';",1500);
                    }
				},
				error		: function (request, status, error) {
					console.log (request.status, request.responseText);
				},
				async		: false
			});
        })
        .on('click', '.edit-approve', function(e) {
            let id = this.id;

            $('.open-modal').trigger('click');
            $('.modal-title').html(`Edit Approve Vehicle Request`);
            $('.modal-body').html(`
                <div class="row">
                    <div class="mb-2">
                        <label>Time OUT Date</label>
                        <input type="text" class="timeout-date form-control" id="datetime">
                    </div>
                    <div class="mb-2">
                        <label>Time IN Date</label>
                        <input type="text" class="timein-date form-control" id="datetime" value="<?php date_default_timezone_set("America/Belize"); echo date('Y-m-d H:i:s') ?>">
                    </div>
                    <div>
                        <label>Select a vehicle to approve: </label>
                        <select class="form-control edit_selected_vehicle"></select>
                    </div>
                </div>
                <div class="text-end mt-3">
                    <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" id="${id}" class="btn btn-primary apply-edit">Apply</button>
                </div>
            `);

            $.ajax({
                type		: 'POST',
                url		: "{{url ('/')}}/get_all_vehicles",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType	: 'json',
                success	: function (data) {
                    let finalHTML = '<option value="">-</option>';

                    $.each(data, function(key, val) {
                        finalHTML += `<option value="${val.vehicle} | ${val.vehicle_number}">${val.vehicle} | ${val.vehicle_number}</option>`;
                    });

                    $('.edit_selected_vehicle').append(finalHTML);
                    $('.edit_selected_vehicle').select2({dropdownParent: $("#openModal"), width: '90%'});
                },
                error		: function (request, status, error) {
                    console.log (request.status, request.responseText);
                },
                async		: false
            });

            flatpickr("#date", {});
            flatpickr("#datetime", {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                static: true
            });
        })
        .on('click', '.apply-edit', function(e) {
            $('.btn-close').trigger('click');
            let id = this.id;

            $.ajax({
                type		: 'POST',
                url		: "{{url ('/')}}/edit_approved",
                data    : {
                    'id' : id,
                    'timeout_date' : $('.timeout-date').val(),
                    'timein_date' : $('.timein-date').val(),
                    'approved_vehicle' : $('.edit_selected_vehicle').val(),
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType	: 'json',
                success	: function (data) {
                    if (data[0] == 'e') {
                        display_alert ('Edit', 'Atleast 1 field is required.', 0);
                        return;
                    }

                    else if (data[0] == 'i') {
                        display_alert ('Edit', 'Time IN date can not be a time lower than the Time Out date.', 0);
                        return;
                    }

                    else if (data[0] == 'y') {
                        display_alert ('Edit', 'Record has been updated.', 1);
                        setTimeout("location.href = '/admin';",1500);
                    } 
                    
                    else {
                        display_alert ('Edit', 'Record could not be updated at this moment.', 0);
                        setTimeout("location.href = '/admin';",1500);
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