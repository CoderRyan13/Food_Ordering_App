@extends('layout.app')

@section('style')
@stop

@section('content')
    <div class="row">
        <h2 class="text-primary">Calendar</h2>

        <div id='calendar'></div>
    </div>
@stop

@section('script')
<script>
    let cal = [];
    $(document)
        .ready(function(e) {
            $.ajax({
				type		: 'POST',
				url		: "{{url ('/')}}/get_approved",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
				dataType	: 'json',
				success	: function (data) {
                    $.each(data, function(key, val) {
                        let veh_num = val.approved_vehicle.slice(-3);
                        cal.push({ title: `${val.driver} ( ${veh_num} )`, start: `${val.timeout_date}` },);
                    });

                    var calendarEl = document.getElementById('calendar');
                    var calendar = new FullCalendar.Calendar(calendarEl, { 
                        initialView: 'dayGridMonth' ,
                        events: cal,
                    });
                    calendar.render();
				},
				error		: function (request, status, error) {
					console.log (request.status, request.responseText);
				},
				async		: false
			});
        })
</script>
@stop