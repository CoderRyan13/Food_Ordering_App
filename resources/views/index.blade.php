<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Request</title>
    <meta name="csrf-token" content="{{csrf_token ()}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body class="bg-black">
    <div class="d-flex align-items-center justify-content-center flex-column" style="height: 95vh;">
        
        <img src="westrac_white.png" alt="westrac" class="img-fluid mb-4">
        
        <div class="card custom-card col-lg-4 col-md-6 col-sm-10 px-4 py-3">
            <h3 class="text-center text-primary">Request Vehicle Form</h3>
            <form action="{{ url('/request_vehicle') }}" role="form" method="post">
                @csrf
                <div class="mt-2">
                    <label>Requested By</label>
                    <select name="supervisor" class="form-control supervisor" required></select>
                </div>
                <div class="mt-2">
                    <label>Time OUT Date</label>
                    <input type="text" class="form-control" id="datetime" name="timeout_date" value="<?php date_default_timezone_set("America/Belize"); echo date('Y-m-d H:i:s') ?>" required>
                </div>
                <div class="mt-2">
                    <label>Place of Destination</label>
                    <input type="text" class="form-control" name="destination" required>
                </div>
                <div class="mt-2">
                    <label>Purpose of Trip</label>
                    <input type="text" class="form-control" name="purpose" required>
                </div>
                <div class="mt-2">
                    <label>Preferred Vehicle</label>
                    <input type="text" class="form-control" name="preferred_vehicle">
                </div>
                <div class="mt-2">
                    <label>Driver</label>
                    <select name="driver" class="form-control driver" required></select>
                </div>
                <button class="btn btn-success mt-4 form-control">Submit</button>
            </form>
        </div>
    </div>
    <span class="d-flex justify-content-end"><a href="{{ url('/admin') }}" class="text-decoration-none text-black me-2">Admin</a></span>
</body>
<script>
    $(document)
        .ready(function(e) {
            flatpickr("#date", {});
            flatpickr("#datetime", {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
            });

            $.ajax({
				type		: 'POST',
				url		: "{{url ('/')}}/get_all_drivers",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
				dataType	: 'json',
				success	: function (data) {
                    let finalHTML = '<option value="">-</option>';

                    $.each(data, function(key, val) {
                        finalHTML += ` <option value="${val.driver}">${val.driver}</option> `;
                    });

                    $(".driver").append(finalHTML);
				},
				error		: function (request, status, error) {
					console.log (request.status, request.responseText);
				},
				async		: false
			});

            $.ajax({
				type		: 'POST',
				url		: "{{url ('/')}}/get_all_supervisors",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
				dataType	: 'json',
				success	: function (data) {
                    let finalHTML = '<option value="">-</option>';

                    $.each(data, function(key, val) {
                        finalHTML += ` <option value="${val.supervisor}">${val.supervisor}</option> `;
                    });

                    $(".supervisor").append(finalHTML);
				},
				error		: function (request, status, error) {
					console.log (request.status, request.responseText);
				},
				async		: false
			});

            $('.driver').select2();
            $('.supervisor').select2();
        })
</script>
</html>