@extends('layout.app')

@section('style')
@stop

@section('content')
    <div class="row">
        <h2 class="text-primary">Requested Vehicles History</h2>

        <div class="row mb-3">
            <div class="col-xl-4">
                <label>From date</label>
                <input type="text" class="from-date form-control" id="date" value="<?php echo date('Y-m-d', strtotime('-1 month')); ?>">
            </div>
            <div class="col-xl-4">
                <label>To date</label>
                <input type="text" class="to-date form-control" id="date" value="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="col-xl-1">
                <label></label>
                <button class="btn btn-info form-control filter">Filter</button>
            </div>
        </div>

        <table class="table table-striped table-hover" id="history-table">
            <thead>
                <tr>
                    <th>Requested By</th>
                    <th>Time Out Date</th>
                    <th>Time In Date</th>
                    <th>Destination</th>
                    <th>Purpose</th>
                    <th>Preferred Vehicle</th>
                    <th>Driver</th>
                    <th>Is Approved?</th>
                    <th>Approved Vehicle</th>
                    <th>Is Denied?</th>
                    <th>Denied Reason</th>
                </tr>
            </thead>
            <tbody class="requested-vehicles"></tbody>
        </table>
    </div>
@stop

@section('script')
<script>
    $(document)
        .ready(function(e) {
            flatpickr("#date", {});
            flatpickr("#datetime", {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
            });  
        })
        .on('click', '.filter', function(e) {
            $.ajax({
				type		: 'POST',
				url		: "{{url ('/')}}/get_all_requests",
                data    : {
                    'from_date' : $('.from-date').val(),
                    'to_date'   : $('.to-date').val(),
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
				dataType	: 'json',
				success	: function (data) {
                    if (data[0] == 'e') {
                        display_alert ('History', 'To Date can not be a date before the From Date.', 0);
                        return;
                    }

                    if (data[0] == 'n') {
                        $(".requested-vehicles").html("No Data Found.");
                        return;
                    }

                    $(".requested-vehicles").html("");

                    let finalHTML = '';

                    $.each(data, function(key, val) {
                        finalHTML += `
                            <tr>
                                <td>${val.supervisor}</td>
                                <td>${val.timeout_date}</td>
                                <td>${val.timein_date}</td>
                                <td>${val.destination}</td>
                                <td>${val.purpose}</td>
                                <td>${val.preferred_vehicle}</td>
                                <td>${val.driver}</td>
                                <td>${val.is_approved}</td>
                                <td>${val.approved_vehicle}</td>
                                <td>${val.is_denied}</td>
                                <td>${val.deny_reason}</td>
                            </tr>
                        `;
                    });

                    $(".requested-vehicles").append(finalHTML);
                    $('#history-table').DataTable();
				},
				error		: function (request, status, error) {
					console.log (request.status, request.responseText);
				},
				async		: false
			});
        })
</script>
@stop