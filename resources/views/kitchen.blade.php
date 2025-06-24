<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <meta name="csrf-token" content="{{csrf_token ()}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <link href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css" rel="stylesheet" />
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
    </style>
</head>
<body style="background-color: #575653; font-size: 20px;">
    <div class="row">
        <button type="button" class="btn btn-primary mb-2 w-25 open-modal d-none" data-bs-toggle="modal" data-bs-target="#openModal">Open Modal</button>
        <div class="modal fade" id="openModal" tabindex="-1"	aria-labelledby="openModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #575653; color: white;">
                        <h6 class="modal-title" id="openModalLabel1">#</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="background-color: #f7ff66">#</div>
                </div>
            </div>
        </div>
    </div>
    <div class="fw-bold fs-2 my-2 mx-4" style="color: #f7ff66;">Midway Orders</div>
    <div class="contents m-4" style="display: grid; column-gap: 30px; row-gap: 30px; grid-template-columns: auto auto auto auto;"></div>
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="toastAlert" class="toast colored-toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toastHead toast-header text-fixed-white">
                <img class="bd-placeholder-img rounded me-2" src="{{url('/')}}/westrac_icon.png" alt="..." style="width: 20px;">
                <strong class="me-auto toastAlertTitle text-white"></strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
            <div class="toast-body toastAlertBody text-fixed-white"></div>
        </div>
    </div>
</body>
<script>
    let display_alert = (title, text, class_name) => {
        if (0 == class_name) {
            class_name = 'bg-danger-subtle';
            class_head = 'bg-danger';
        }
        else if (1 == class_name) {
            class_name = 'bg-success-subtle';
            class_head = 'bg-success';
        }
        else if (2 == class_name) {
            class_name = 'bg-info-subtle';
            class_head = 'bg-info';
        }
        else if (3 == class_name) {
            class_name = 'bg-warning-subtle';
            class_head = 'bg-warning';
        }

        $('#toastAlert').addClass(class_name);
        $('.toastHead').addClass(class_head);
        $('.toastAlertTitle').html(title);
        $('.toastAlertBody').html(text);

        const _toast = document.getElementById('toastAlert')
        const toast = new bootstrap.Toast(_toast);
        toast.show();
    }

    $(document)
        .ready(function(e) {
            $.ajax({
				type		: 'POST',
				url		: "{{url ('/')}}/recieve_orders",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
				dataType	: 'json',
				success	: function (data) {
                    let finalHTML = '';
                    let orders = '';

                    $.each(data, function(key, val) {
                        $.each(JSON.parse(val.orders), function(k, v) {
                            orders += `
                                <div class="my-2 py-4 border-bottom border-warning">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="fw-bold">${v.item}</div>
                                        <div>x${v.quantity} <span class="ms-3">$${Number(v.item_cost).toFixed(2)}</span> </div>
                                    </div>
                                    <div>${v.comments}</div>
                                </div>
                            `;
                        });
                        let date = new Date(val.created_on);
                        let formatted = date.toLocaleString('en-US', {
                            timeZone: 'UTC',
                            // year: 'numeric',
                            // month: 'long',
                            // day: 'numeric',
                            hour: '2-digit',
                            minute: '2-digit'
                        });

                        finalHTML += `
                        <div class='card-${val.id}'>
                            <div class="card custom-card">
                                <div class="card-header" style="background-color: #575653; color: #fff;">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="fw-bold" style="color: #f7ff66;">${val.table_number}</div>
                                        <div>Total Items: <span style="color: #f7ff66;" class="fw-bold">${val.item_count}</span></div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div>Time Ordered: ${formatted}</div>
                                    <div>${orders}</div>
                                </div>
                                <div class="card-footer text-end d-flex align-items-center justify-content-between">
                                    <div>Total Cost: <span class="fw-bold">$${Number(val.cost_total).toFixed(2)}</span></div>
                                    <button id="${val.id}" class="btn btn-success done">Done</button>
                                </div>
                            </div>
                        </div>
                        `;
                        orders = '';
                    });

                    $(".contents").append(finalHTML);
				},
				error		: function (request, status, error) {
					console.log (request.status, request.responseText);
				},
				async		: false
			});

            // setTimeout("location.href = '/kitchen';",30000);
        })
        .on('click', '.done', function(e) {
            let id = this.id;

            Swal.fire({
                title: 'Are you sure you are done? Order will be removed.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const printWindow = window.open('', '', 'height=600,width=800');

                    printWindow.document.write('<html><head><title>Print Order</title>');

                    // Load Bootstrap CSS (replace with your Bootstrap version if needed)
                    printWindow.document.write('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">');

                    printWindow.document.write('</head><body>');
                    printWindow.document.write($(`.card-${id}`).html());
                    printWindow.document.write('</body></html>');

                    printWindow.document.close();
                    printWindow.focus();
                    printWindow.print();
                    printWindow.close();

                    $.ajax({
                        type		: 'POST',
                        url		: "{{url ('/')}}/remove_order",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType	: 'json',
                        data : {'id': id},
                        success	: function (data) {
                            if (data.trim() == 'y') {
                                display_alert ('Order Status', 'Order has been removed Successfully', 1);
                                setTimeout("location.href = '/kitchen';",2000);
                            } else if (data.trim() == 'n') {
                                display_alert ('Order Status', 'Order could not have been removed. Try again.', 0);
                                setTimeout("location.href = '/kitchen';",2000);
                            } 
                        },
                        error		: function (request, status, error) {
                            console.log (request.status, request.responseText);
                        },
                        async		: false
                    });
                }
            });
        })
</script>
</html>