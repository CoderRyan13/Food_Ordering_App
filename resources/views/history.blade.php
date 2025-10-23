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
 <body class="m-4" style="font-size: 20px;"> <!-- background-color: #575653;  -->
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
     <div class="fw-bold fs-2 my-2 mx-4">Midway Orders History</div> <!-- style="color: #f7ff66;" -->

    <table class="table table-striped table-hover orders-table">
        <thead>
            <tr>
                <th class="text-center">Order Date</th>
                <th class="text-center">Table Number</th>
                <th class="text-center">Item Count</th>
                <th class="text-center">Cost Total</th>
                <th class="text-center">Orders</th>
                <th class="text-center"></th>
            </tr>
        </thead>
        <tbody class="tbl-body"></tbody>
    </table>

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
				url		: "{{url ('/')}}/recieve_Allorders",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
				dataType	: 'json',
				success	: function (data) {
                    let finalHTML = '';
                    let orders = '';

                    $.each(data, function(key, val) {
                        let comments = "";
                        let subitems = '';
                        $.each(JSON.parse(val.orders), function(k, v) {
                            if(v.subitems) {
                                subitems = v.subitems;
                            }
                            if(v.comments) {
                                comments = v.comments;
                            }
                            orders += `
                                <div class="my-2 py-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="fw-bold">${v.item}</div>
                                        <div>x${v.quantity} <span class="ms-3">$${Number(v.item_cost).toFixed(2)}</span> </div>
                                    </div>
                                    <div>${subitems}</div>
                                    <div class="mt-2 ms-2">${comments}</div>
                                </div>
                            `;
                        });
                        let date = new Date(val.created_on);
                        let formatted = date.toLocaleString('en-US', {
                            timeZone: 'UTC',
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric',
                            hour: '2-digit',
                            minute: '2-digit'
                        });

                        // finalHTML += `
                        // <div class='card-${val.id}'>
                        //     <div class="card custom-card">
                        //         <div class="card-header" style="background-color: #575653; color: #fff;">
                        //             <div class="d-flex align-items-center justify-content-between">
                        //                 <div class="fw-bold" style="color: #f7ff66;">${val.table_number}</div>
                        //                 <div>Total Items: <span style="color: #f7ff66;" class="fw-bold">${val.item_count}</span></div>
                        //             </div>
                        //         </div>
                        //         <div class="card-body">
                        //             <div>Time Ordered: ${formatted}</div>
                        //             <div>${orders}</div>
                        //         </div>
                        //         <div class="card-footer text-end d-flex align-items-center justify-content-between">
                        //             <div>Total Cost: <span class="fw-bold">$${Number(val.cost_total).toFixed(2)}</span></div>
                        //             <button id="${val.id}" class="btn btn-success print">Print</button>
                        //         </div>
                        //     </div>
                        // </div>
                        // `;



                        finalHTML += ` 
                            <tr> 
                                <td class="text-start">${formatted}</td> 
                                <td class="text-start">${val.table_number}</td> 
                                <td class="text-start">${val.item_count}</td> 
                                <td class="text-start">${val.cost_total}</td> 
                                <td class="text-start">${orders}</td> 
                                <td class="text-start"><button class='btn btn-success print' id='${val.id}'>Print</button></td> 
                            </tr> 
                        `; 
                        orders = '';
                    });

                    $(".tbl-body").append(finalHTML);
                    $('.orders-table').DataTable({ order: [], });
				},
				error		: function (request, status, error) {
					console.log (request.status, request.responseText);
				},
				async		: false
			});
        })
        .on('click', '.print', function(e) {
            const $row = $(this).closest('tr');
            const orderDate = $row.find('td').eq(0).text();
            const tableNumber = $row.find('td').eq(1).text();
            const itemCount = $row.find('td').eq(2).text();
            const costTotal = $row.find('td').eq(3).text();
            const orders = $row.find('td').eq(4).text();

            // Build the receipt-style HTML
            const receiptHtml = `
                <html>
                    <head>
                        <title>Receipt - Table ${tableNumber}</title>
                        <style>
                            body {
                                font-family: 'Courier New', monospace;
                                width: 280px; /* simulate small receipt width */
                                margin: 0 auto;
                                text-align: center;
                                padding: 10px;
                            }
                            h2 {
                                margin-bottom: 5px;
                                border-bottom: 1px dashed #000;
                                padding-bottom: 5px;
                            }
                            .section {
                                text-align: left;
                                margin-top: 10px;
                            }
                            .section p {
                                margin: 3px 0;
                                font-size: 14px;
                            }
                            .total {
                                border-top: 1px dashed #000;
                                margin-top: 10px;
                                padding-top: 5px;
                                font-weight: bold;
                                font-size: 15px;
                                text-align: right;
                            }
                            .thank-you {
                                margin-top: 15px;
                                font-size: 13px;
                                border-top: 1px dashed #000;
                                padding-top: 10px;
                            }
                        </style>
                    </head>
                    <body>
                        <h2>🍽️ Midway Receipt</h2>
                        <div class="section">
                            <p><strong>Date:</strong> ${orderDate}</p>
                            <p><strong>Table:</strong> ${tableNumber}</p>
                            <p><strong>Items:</strong> ${itemCount}</p>
                        </div>
                        <div class="section">
                            <p><strong>Order Details:</strong></p>
                            <p>${orders}</p>
                        </div>
                        <div class="total">
                            Total: ${costTotal}
                        </div>
                        <div class="thank-you">
                            <p>Thank you for dining with us!</p>
                            <p>~ Have a great day ~</p>
                        </div>
                    </body>
                </html>
            `;

            // Open new window and print
            const printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write(receiptHtml);
            printWindow.document.close();
            printWindow.print();
        })
</script>
</html>