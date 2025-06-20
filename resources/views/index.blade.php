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

    <style>
        .order-details {
            position: fixed;
            right: 0;
            width: 350px;
            background-color: #575653;
            transition: all 0.5s ease;
            color: #fff;
            height: 100vh;
            /* min-height: 100vh; */
        }
        .menu {
            font-size: 26px;
            position: relative;
            list-style-type: none;
            height: 120px;
            width: 90%;
            border-radius: 0.8rem;
            background-color: #575653;
            margin: 4px;
        }
        .menu a:hover, .menu button:hover {
            border-radius: 0.8rem;
            height: 120px;
            width: 110%;
            background-color: #f7ff66;
            color: #12171e !important;
        }
        .nav-tabs .nav-link.active {
            color: #f7ff66 !important; /* Yellow text */
            background-color: transparent; /* Optional: Keep background transparent */
        }
    </style>
</head>
<body>
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
    <div class="d-flex" style="background-color: #12171e;">
        <div class="m-4" style="padding-right: 350px;">
            <div class="row">
                <div class="col-xl-3">
                    <div class="me-1 bg-white"><img src="{{url('/')}}/midway-icon.webp" alt="westrac" class="border rounded-circle" style="width: 90%; margin-left: 6px;"></div>
                    <div class="fw-bold fs-3 ms-2" style="color: #f7ff66">Menu</div>

                    <ul class="mt-2 d-flex flex-column nav nav-tabs" style="list-style-type: none;" role="tablist">
                        <li class="nav-item allmenu d-flex align-items-center justify-content-center mb-3 menu">
                            <a class="nav-link active text-decoration-none text-white px-3 py-2" data-bs-toggle="tab" role="tab" aria-current="page" href="#allmenu" aria-selected="true" style="margin-left: -15px;">
                                <i class="bx bxs-grid-alt"></i>
                                <span class="nav-item ms-2">All Menu</span>
                            </a>
                        </li>
                        <li class="nav-item d-flex align-items-center justify-content-center mb-3 menu">
                            <a class="nav-link text-decoration-none text-white food px-3 py-2" data-bs-toggle="tab" role="tab" aria-current="page" href="#food" aria-selected="true" style="margin-left: -15px;">
                                <i class="bx bx-calendar"></i>
                                <span class="nav-item ms-2">Food</span>
                            </a>
                        </li>
                        <li class="nav-item d-flex align-items-center justify-content-center mb-3 menu">
                            <a class="nav-link text-decoration-none text-white px-3 py-2" data-bs-toggle="tab" role="tab" aria-current="page" href="#drinks" aria-selected="true" style="margin-left: -15px;">
                                <i class="bx bx-user"></i>
                                <span class="nav-item ms-2">Drinks</span>
                            </a>
                        </li>
                        <li class="nav-item d-flex align-items-center justify-content-center mb-3 menu">
                            <a class="nav-link text-decoration-none text-white px-3 py-2" data-bs-toggle="tab" role="tab" aria-current="page" href="#dessert" aria-selected="true" style="margin-left: -15px;">
                                <i class="bx bx-car"></i>
                                <span class="nav-item ms-2">Dessert</span>
                            </a>
                        </li>
                        <li class="nav-item d-flex align-items-center justify-content-center mb-3 menu">
                            <a class="nav-link text-decoration-none text-white px-3 py-2" data-bs-toggle="tab" role="tab" aria-current="page" href="#starter" aria-selected="true" style="margin-left: -15px;">
                                <i class="bx bx-body"></i>
                                <span class="nav-item ms-2">Starter</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-xl-9">
                    <div class="tab-content mt-2 mt-xl-0">
                        <div class="tab-pane show active text-white" id="allmenu" role="tabpanel">
                            <div style="display: grid; column-gap: 30px; row-gap: 30px; grid-template-columns: auto auto auto;">
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Curry</div>
                                            <div style="font-size: 12px;">a diverse category of dishes characterized by a sauce or gravy seasoned with spices, originating from the Indian subcontinent and now found globally.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$50</div>
                                                <button id="Curry" value="50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/salad.webp" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Salad</div>
                                            <div style="font-size: 12px;">a cold dish of various mixtures of raw or cooked vegetables, usually seasoned with oil, vinegar, or other dressing and sometimes accompanied by meat, fish, etc.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$30</div>
                                                <button id="Salad" value="30" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/frychicken.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Fry Chicken</div>
                                            <div style="font-size: 12px;">a dish where chicken pieces are coated in seasoned flour or batter and then cooked in hot oil or fat, resulting in a crispy exterior and tender, juicy interior.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$10</div>
                                                <button id="Fry&nbsp;Chicken" value="10" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Curry</div>
                                            <div style="font-size: 12px;">a diverse category of dishes characterized by a sauce or gravy seasoned with spices, originating from the Indian subcontinent and now found globally.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$50</div>
                                                <button id="Curry" value="50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/salad.webp" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Salad</div>
                                            <div style="font-size: 12px;">a cold dish of various mixtures of raw or cooked vegetables, usually seasoned with oil, vinegar, or other dressing and sometimes accompanied by meat, fish, etc.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$30</div>
                                                <button id="Salad" value="30" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/frychicken.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Fry Chicken</div>
                                            <div style="font-size: 12px;">a dish where chicken pieces are coated in seasoned flour or batter and then cooked in hot oil or fat, resulting in a crispy exterior and tender, juicy interior.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$10</div>
                                                <button id="Fry&nbsp;Chicken" value="10" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Curry</div>
                                            <div style="font-size: 12px;">a diverse category of dishes characterized by a sauce or gravy seasoned with spices, originating from the Indian subcontinent and now found globally.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$50</div>
                                                <button id="Curry" value="50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/salad.webp" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Salad</div>
                                            <div style="font-size: 12px;">a cold dish of various mixtures of raw or cooked vegetables, usually seasoned with oil, vinegar, or other dressing and sometimes accompanied by meat, fish, etc.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$30</div>
                                                <button id="Salad" value="30" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/frychicken.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Fry Chicken</div>
                                            <div style="font-size: 12px;">a dish where chicken pieces are coated in seasoned flour or batter and then cooked in hot oil or fat, resulting in a crispy exterior and tender, juicy interior.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$10</div>
                                                <button id="Fry&nbsp;Chicken" value="10" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane text-white" id="food" role="tabpanel">
                            How travel coupons make you a better lover. Why cultural solutions
                            are the new black. Why mom was right about travel insurances. How
                            family trip ideas can help you predict the future. <b>How carnival
                                cruises make you a better lover</b>. Why you'll never succeed at
                            daily deals. 11 ways cheapest flights can find you the love of your
                            life. The complete beginner's guide to mission trips.
                        </div>
                        <div class="tab-pane text-white" id="drinks" role="tabpanel">
                            Unbelievable healthy snack success stories. 12 facts about safe food
                            handling tips that will impress your friends. Restaurant weeks by
                            the numbers. Will mexican food ever rule the world? The 10 best thai
                            restaurant youtube videos. How restaurant weeks can make you sick.
                            The complete beginner's guide to cooking healthy food. Unbelievable
                            food stamp success stories.
                        </div>
                        <div class="tab-pane text-white" id="dessert" role="tabpanel">
                            Why delicious magazines are killing you. Why our world would end if
                            restaurants disappeared. Why restaurants are on crack about
                            restaurants. How restaurants are making the world a better place. 8
                            great articles about minute meals. Why our world would end if
                            healthy snacks disappeared. Why the world would end without mexican
                            food. The evolution of chef uniforms.
                        </div>
                        <div class="tab-pane text-white" id="starter" role="tabpanel">
                            Why delicious magazines are killing you. Why our world would end if
                            restaurants disappeared. Why restaurants are on crack about
                            restaurants. How restaurants are making the world a better place. 8
                            great articles about minute meals. Why our world would end if
                            healthy snacks disappeared. Why the world would end without mexican
                            food. The evolution of chef uniforms.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="order-details pt-4 ps-4 pe-2 pb-2">
            <div class="d-flex justify-content-between align-items-center">
                <div class="fs-2">Order Details</div>
                <div class="card custom-card">
                    <button class="btn btn-warning tbl fw-bold">T1</button>
                </div>
            </div>
            <div class="my-2 pb-2 border-bottom border-warning"><?php date_default_timezone_set("America/Belize"); echo date('Y-m-d H:i:s') ?></div>
            <div class="orders"></div>
            <div class="col-xl-10 position-absolute bottom-0">
                <div class="my-4 py-5 border-top border-warning d-flex align-items-center justify-content-between">
                    <div class="item-total">Items (0) Total</div>
                    <div class="cost-total fw-bold">$0</div>
                </div>
                <div><button class="btn form-control btn-warning mb-4 next">Next</button></div>
            </div>
        </div>
    </div>
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

    let item_count = 0;
    let cost_total = 0;
    let cart = [];

    $(document)
        .on('click', '.add', function(e) {
            let item = $(this).attr('id');
            let item_cost = $(this).val();
            $('.open-modal').trigger('click');
            $('.modal-title').html(`Add ${item} Order`);
            $('.modal-body').html(`
                <div>
                    <label for="quantity">Quantity: </label>
                    <input type="number" id="quantity" name="quantity" min="1" value="1" class="form-control">
                </div>
                <div class="mt-3">
                    <p><label for="comments">Comments: </label></p>
                    <textarea id="comments" name="comments" rows="4" class="form-control"></textarea>
                </div>
                <div class="text-end mt-3">
                    <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary add-order">Add</button>
                </div>
            `);
            $('.add-order').prop({item: item, item_cost: item_cost});
        })
        .on('click', '.add-order', function(e) {
            $('.btn-close').trigger('click');
            let item = this.item;
            let quantity = $('#quantity').val();
            let item_cost = Number(this.item_cost) * quantity;
            let comments = $('#comments').val();

            item_count += Number(quantity);
            cost_total += item_cost;
            cart.push({item: item, quantity: quantity, item_cost: item_cost, comments: comments});

            let html = '';
            cart.forEach(function(arr, index) {
                html += `
                    <div class="my-2 py-4 border-bottom border-warning">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="fw-bold">${arr.item}</div>
                            <div>x${arr.quantity} <span class="ms-3">$${arr.item_cost}</span> </div>
                        </div>
                        <div>${arr.comments}</div>
                    </div>
                `;
            });
            $('.orders').html(html);

            $('.item-total').html(`Items (${item_count}) Total`);
            $('.cost-total').html(`$ ${cost_total}`);
        })
        .on('click', '.tbl', function(e) {
            $('.open-modal').trigger('click');
            $('.modal-title').html(`Choose Table`);
            $('.modal-body').html(`
                <div>
                    <label for="choose_tbl">Choose a Table: </label>
                    <select name="choose_tbl" id="choose_tbl">
                        <option value="T1">T1</option>
                        <option value="T2">T2</option>
                        <option value="T3">T3</option>
                        <option value="T4">T4</option>
                        <option value="T5">T5</option>
                        <option value="T6">T6</option>
                        <option value="T7">T7</option>
                        <option value="T8">T8</option>
                        <option value="T9">T9</option>
                        <option value="T10">T10</option>
                        <option value="T11">T11</option>
                    </select>
                </div>
                <div class="text-end mt-3">
                    <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary tbl-choice">Choose</button>
                </div>
            `);
        })
        .on('click', '.tbl-choice', function(e) {
            $('.btn-close').trigger('click');
            $('.tbl').html($('#choose_tbl').val());
        })
        .on('click', '.next', function(e) {
            let html = "";
            cart.forEach(function(arr, index) {
                html += `
                    <div class="d-flex align-items-center justify-content-between mb-2 border-bottom border-warning">
                        <div>
                            <div>Item: <span class="fw-bold">${arr.item}</span></div>
                            <div>Quantity: ${arr.quantity}</div>
                            <div>Comments: ${arr.comments}</div>
                        </div>
                        <div>
                            <span class="me-2">$${arr.item_cost}</span><button id="${index}" class="btn btn-success edit-order me-2"><i class='bx bx-edit'></i></button><button id="${index}" class="btn btn-danger del-order"><i class='bx bx-trash'></i></button>
                        </div>
                    </div>
                `;
            });

            $('.open-modal').trigger('click');
            $('.modal-title').html(`Cart (${$('.tbl').html()})`);
            $('.modal-body').html(`
                ${html}
                <div>Items(<span class="fw-bold">${item_count}</span>) Total: <span class="fw-bold">$${cost_total}</span></div>
                <div class="text-end mt-3">
                    <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary submit-order">Submit Order</button>
                </div>
            `);
        })
        .on('click', '.del-order', function(e) {
            let id = this.id;
            item_count -= cart[id].quantity;
            cost_total -= cart[id].item_cost;
            cart.splice(id, 1);
            let html = '';

            cart.forEach(function(arr, index) {
                html += `
                    <div class="my-2 py-4 border-bottom border-warning">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="fw-bold">${arr.item}</div>
                            <div>x${arr.quantity} <span class="ms-3">$${arr.item_cost}</span> </div>
                        </div>
                        <div>${arr.comments}</div>
                    </div>
                `;
            });
            $('.orders').html(html);

            $('.item-total').html(`Items (${item_count}) Total`);
            $('.cost-total').html(`$ ${cost_total}`);

            $('.btn-close').trigger('click');
            setTimeout(() => {$('.next').trigger('click');}, 500);
        })
        .on('click', '.edit-order', function(e) {
            $('.btn-close').trigger('click');
            let id       = this.id;
            let quantity = cart[id].quantity;
            let comments = cart[id].comments;

            setTimeout(() => {$('.open-modal').trigger('click');}, 500);
            $('.modal-title').html(`Edit Order`);
            $('.modal-body').html(`
                <div>
                    <label for="quantity">Quantity: </label>
                    <input type="number" id="quantity" name="quantity" min="1" value="${quantity}" class="form-control edit-quantity">
                </div>
                <div class="mt-3">
                    <p><label for="comments">Comments: </label></p>
                    <textarea id="comments" name="comments" rows="4" class="form-control edit-comments">${comments}</textarea>
                </div>
                <div class="text-end mt-3">
                    <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" id="${id}" class="btn btn-primary make-edit">Edit</button>
                </div>
            `);
        })
        .on('click', '.make-edit', function(e) {
            $('.btn-close').trigger('click');
            let id = this.id;
            let old_quantity = cart[id].quantity;
            let old_cost = cart[id].item_cost;
            let item_cost = cart[id].item_cost / cart[id].quantity;
            cart[id].quantity = $('.edit-quantity').val();
            cart[id].comments = $('.edit-comments').val();
            cart[id].item_cost = cart[id].quantity * item_cost;
            let html = '';

            item_count = item_count - old_quantity + Number(cart[id].quantity);
            cost_total = cost_total - old_cost + cart[id].item_cost;

            cart.forEach(function(arr, index) {
                html += `
                    <div class="my-2 py-4 border-bottom border-warning">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="fw-bold">${arr.item}</div>
                            <div>x${arr.quantity} <span class="ms-3">$${arr.item_cost}</span> </div>
                        </div>
                        <div>${arr.comments}</div>
                    </div>
                `;
            });
            $('.orders').html(html);

            $('.item-total').html(`Items (${item_count}) Total`);
            $('.cost-total').html(`$ ${cost_total}`);
            setTimeout(() => {$('.next').trigger('click');}, 500);
        })
        .on('click', '.submit-order', function(e) {
            $('.btn-close').trigger('click');

            $.ajax({
				type		: 'POST',
				url		: "{{url ('/')}}/save_order",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
				dataType	: 'json',
                data : {
                    'table_number' : $('.tbl').html(),
                    'item_count'   : item_count,
                    'cost_total'   : cost_total,
                    'orders'       : cart,
                },
				success	: function (data) {
                    if (data.trim() == 'y') {
                        display_alert ('Order Status', 'Order has been submitted Successfully', 1);
                        setTimeout("location.href = '/';",2000);
                    } else if (data.trim() == 'n') {
                        display_alert ('Order Status', 'Order could not be submitted. Try again.', 0);
                        setTimeout("location.href = '/';",2000);
                    } else if (data.trim() == 'e') {
                        display_alert ('Order Status', 'All fields are required.', 3);
                        setTimeout("location.href = '/';",2000);
                    }
				},
				error		: function (request, status, error) {
					console.log (request.status, request.responseText);
				},
				async		: false
			});
        })
</script>
@yield('script')
</html>