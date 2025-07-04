<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <meta name="csrf-token" content="{{csrf_token ()}}">
    <!-- <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.min.css">

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
        .side-menu {
            position: fixed;
            left: 0;
            width: 350px;
            /* background-color: #575653;
            transition: all 0.5s ease;
            color: #fff; */
            height: 100vh;
        }
        .menu {
            font-size: 26px;
            position: relative;
            list-style-type: none;
            height: 100px;
            width: 80%;
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
<body style="background-color: #12171e">
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
    <div class="d-flex">
        <div class="m-4 flex-grow-1" style="padding-right: 350px;">
            <div class="row">
                <div class="col-xl-3 side-menu">
                    <div class="me-1 bg-white"><img src="{{url('/')}}/midway-icon.webp" alt="westrac" class="border rounded-circle" style="width: 90%; margin-left: 6px;"></div>
                    <div class="fw-bold fs-3 ms-2" style="color: #f7ff66">Menu</div>

                    <ul class="mt-2 d-flex flex-column nav nav-tabs" style="list-style-type: none;" role="tablist">
                        <li class="nav-item allmenu d-flex align-items-center justify-content-center mb-3 menu">
                            <a class="nav-link active text-decoration-none text-white px-3 py-2" data-bs-toggle="tab" role="tab" aria-current="page" href="#allmenu" aria-selected="true" style="margin-left: -15px;">
                                <i class="ri-restaurant-fill"></i>
                                <span class="nav-item ms-2">All Menu</span>
                            </a>
                        </li>
                        <li class="nav-item d-flex align-items-center justify-content-center mb-3 menu">
                            <a class="nav-link text-decoration-none text-white px-3 py-2" data-bs-toggle="tab" role="tab" aria-current="page" href="#breakfast" aria-selected="true" style="margin-left: -15px;">
                                <i class="ri-bread-line"></i>
                                <span class="nav-item ms-2">Breakfast</span>
                            </a>
                        </li>
                        <li class="nav-item d-flex align-items-center justify-content-center mb-3 menu">
                            <a class="nav-link text-decoration-none text-white px-3 py-2" data-bs-toggle="tab" role="tab" aria-current="page" href="#lunch" aria-selected="true" style="margin-left: -15px;">
                                <i class="ri-bowl-fill"></i>
                                <span class="nav-item ms-2">Lunch</span>
                            </a>
                        </li>
                        <li class="nav-item d-flex align-items-center justify-content-center mb-3 menu">
                            <a class="nav-link text-decoration-none text-white px-3 py-2" data-bs-toggle="tab" role="tab" aria-current="page" href="#kids" aria-selected="true" style="margin-left: -15px;">
                                <i class="ri-group-3-line"></i>
                                <span class="nav-item ms-2">Kids</span>
                            </a>
                        </li>
                        <li class="nav-item d-flex align-items-center justify-content-center mb-3 menu">
                            <a class="nav-link text-decoration-none text-white food px-3 py-2" data-bs-toggle="tab" role="tab" aria-current="page" href="#side-orders" aria-selected="true" style="margin-left: -15px;">
                                <i class="ri-restaurant-2-fill"></i>
                                <span class="nav-item ms-2">Side Orders</span>
                            </a>
                        </li>
                        <li class="nav-item d-flex align-items-center justify-content-center mb-3 menu">
                            <a class="nav-link text-decoration-none text-white px-3 py-2" data-bs-toggle="tab" role="tab" aria-current="page" href="#drinks" aria-selected="true" style="margin-left: -15px;">
                                <i class="ri-drinks-line"></i>
                                <span class="nav-item ms-2">Drinks</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-xl-9" style="margin-left: 350px;">
                    <!-- Search Bar -->
                    <div class="mb-3"><input type="text" placeholder="Search menu..." class="form-control searchbar"></div>

                    <div class="tab-content mt-2 mt-xl-0">
                        <div class="tab-pane show active text-white" id="allmenu" role="tabpanel">
                            <div class="allmenu-items" style="display: grid; column-gap: 30px; row-gap: 30px; grid-template-columns: 354px 354px 354px;"> <!-- auto auto auto; -->
                                <!-- Breakfast Menu -->
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Midway Breakfast</div>
                                            <div style="font-size: 12px;">Eggs cooked to your preference accompanied with refried beans, bacon, cheese, and fry jacks.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$14.75</div>
                                                <button id="Midway Breakfast" value="14.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Spanish Breakfast</div>
                                            <div style="font-size: 12px;">Scrambled eggs with onions and local greens or tomatoes accompanied with refried beans, cream, cheese, fried plantains and corn or flour tortilla.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$15.75</div>
                                                <button id="Spanish Breakfast" value="15.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Huevos Rancheros</div>
                                            <div style="font-size: 12px;">Sunny side-up eggs on a bed of corn tortillas, tapped with a chef-style tomato salsa, parmesan cheese, refried beans and your choice of bacon, ham or sausage.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$14.75</div>
                                                <button id="Huevos Rancheros" value="14.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">English Breakfast</div>
                                            <div style="font-size: 12px;">Sunny side-up eggs served with bacon, sausage, grilled tomato, baked beans and toast.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$19.75</div>
                                                <button id="English Breakfast" value="19.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Breakfast Nachos</div>
                                            <div style="font-size: 12px;">A bed of corn torilla chips scrambled with eggs and topped with beef, refried beans, sour cream, and pico de gallo.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$16.25</div>
                                                <button id="Breakfast Nachos" value="16.25" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Waffle Sandwich</div>
                                            <div style="font-size: 12px;">A waffle stuffed with ham, cheese, sliced tomato and home-made spread.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$16.75</div>
                                                <button id="Waffle Sandwich" value="16.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Pancakes</div>
                                            <div style="font-size: 12px;">Three pancakes accompanied with meat option bacon, ham or sausage and your choice of honey or syrup.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$13.75</div>
                                                <button id="Pancakes" value="13.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">French Toast</div>
                                            <div style="font-size: 12px;">Three slices of home-made bread soaked in a fresh mixture of milk, eggs, and cinnamon. Served with your choice of bacon, ham or sausage, and syrup or honey.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$14.75</div>
                                                <button id="French Toast" value="14.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Crepes</div>
                                            <div style="font-size: 12px;">Thin wrapped pancakes filled with cream cheese, fruits and topped with whipped cream. Served with your meat choice of bacon, ham or sausage, and syrup or honey.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$17.75</div>
                                                <button id="Crepes" value="17.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Breakfast Sliders</div>
                                            <div style="font-size: 12px;">Two Creole buns filled with ham, cheese, beans and eggs.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$8.75</div>
                                                <button id="Breakfast Sliders" value="8.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Breakfast Burrito</div>
                                            <div style="font-size: 12px;">A home-made flour tortilla filled with scrambled eggs, sausage, beans, and cheese.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$8.25</div>
                                                <button id="Breakfast Burrito" value="8.25" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Midway Chicken Wrap</div>
                                            <div style="font-size: 12px;">A home-made flour tortilla filled with grilled chicken, beans, lettuce, cheese, and pico de gallo.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$9.50</div>
                                                <button id="Midway Chicken Wrap" value="9.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Mexican Taco</div>
                                            <div style="font-size: 12px;">A grilled corn tortilla with a home-made mustard sauce filled with diced beef and pico de gallo.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$3.50</div>
                                                <button id="Mexican Taco" value="3.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Omelet</div>
                                            <div style="font-size: 12px;">Eggs filled with onions, sweet peppers, tomatoes, mushrooms, and your choice of ham or bacon, Omelets come with your choice of flour torilla, corn torilla, fry jacks or toast.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$17.50</div>
                                                <button id="Omelet" value="17.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Lunch Menu -->
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Small Rice & Beans</div>
                                            <div style="font-size: 12px;">Rice and beans served with stew chicken, fried plantain and your choice of coleslaw or potato salad.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$7.50</div>
                                                <button id="Small Rice & Beans" value="7.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Regular Rice & Beans</div>
                                            <div style="font-size: 12px;">Rice and beans served with stew chicken, fried plantain and your choice of coleslaw or potato salad.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$12.00</div>
                                                <button id="Regular Rice & Beans" value="12.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Large Rice & Beans</div>
                                            <div style="font-size: 12px;">Rice and beans served with stew chicken, fried plantain and your choice of coleslaw or potato salad.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$16.50</div>
                                                <button id="Large Rice & Beans" value="16.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Small Fried Chicken</div>
                                            <div style="font-size: 12px;">Crispy fried chicken seasoned with our special spice mix, served with fries and coleslaw.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$7.50</div>
                                                <button id="Small Fried Chicken" value="7.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Regular Fried Chicken</div>
                                            <div style="font-size: 12px;">Crispy fried chicken seasoned with our special spice mix, served with fries and coleslaw.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$12.00</div>
                                                <button id="Regular Fried Chicken" value="12.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Large Fried Chicken</div>
                                            <div style="font-size: 12px;">Crispy fried chicken seasoned with our special spice mix, served with fries and coleslaw.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$16.50</div>
                                                <button id="Large Fried Chicken" value="16.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Chicken Strips</div>
                                            <div style="font-size: 12px;">Deep fried breaded chicken strips with a side of fries, coleslaw and our home-made ranch dip or sweet and sour sauce.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$17.25</div>
                                                <button id="Chicken Strips" value="17.25" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Beef Burger</div>
                                            <div style="font-size: 12px;">Burger come with cheese, sliced tomatoes, lettuce, pickles and onions.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$14.75</div>
                                                <button id="Beef Burger" value="14.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Chicken Strip Burger</div>
                                            <div style="font-size: 12px;">Burger come with cheese, sliced tomatoes, lettuce, pickles and onions.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$14.25</div>
                                                <button id="Chicken Strip Burger" value="14.25" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Fish Burger</div>
                                            <div style="font-size: 12px;">Burger come with cheese, sliced tomatoes, lettuce, pickles and onions.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$19.75</div>
                                                <button id="Fish Burger" value="19.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">6pc Wings</div>
                                            <div style="font-size: 12px;">Deep fried wings served with your choice of sauce and either garlic bread or fries. Sause Flavors: BBQ, Hot, Spicy Mango, Lemon Pepper, Spicy Orange</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$18.00</div>
                                                <button id="6pc Wings" value="18.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">9pc Wings</div>
                                            <div style="font-size: 12px;">Deep fried wings served with your choice of sauce and either garlic bread or fries. Sause Flavors: BBQ, Hot, Spicy Mango, Lemon Pepper, Spicy Orange</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$24.75</div>
                                                <button id="9pc Wings" value="24.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">12pc Wings</div>
                                            <div style="font-size: 12px;">Deep fried wings served with your choice of sauce and either garlic bread or fries. Sause Flavors: BBQ, Hot, Spicy Mango, Lemon Pepper, Spicy Orange</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$33.50</div>
                                                <button id="12pc Wings" value="33.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">7" Pepperoni Pizza</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$10.25</div>
                                                <button id='7" Pepperoni Pizza' value="10.25" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">10" Pepperoni Pizza</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$15.75</div>
                                                <button id='10" Pepperoni Pizza' value="15.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">7" Meat Lovers Pizza</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$13.25</div>
                                                <button id='7" Meat Lovers Pizza' value="13.25" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">10" Meat Lovers Pizza</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$18.00</div>
                                                <button id='10" Meat Lovers Pizza' value="18.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">7" Hawaiian Pizza</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$12.00</div>
                                                <button id='7" Hawaiian Pizza' value="12.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">10" Hawaiian Pizza</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$16.00</div>
                                                <button id='10" Hawaiian Pizza' value="16.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">7" Margarita Pizza</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$12.50</div>
                                                <button id='7" Margarita Pizza' value="12.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">10" Margarita Pizza</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$17.00</div>
                                                <button id='10" Margarita Pizza' value="17.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">7" Bianca Pizza</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$9.75</div>
                                                <button id='7" Bianca Pizza' value="9.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">10" Bianca Pizza</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$15.00</div>
                                                <button id='10" Bianca Pizza' value="15.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">T-bone Steak</div>
                                            <div style="font-size: 12px;">Comes along with two side options: Potato salad, Garden Salad, Coleslaw, Fries, Steam Vegetables, Rice & Beans, White Rice, or Potato Wedges. Steak Sauce options: Mushroom Sauce, Mustard Sauce, BBQ Sauce.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$37.75</div>
                                                <button id='T-bone Steak' value="37.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Sirloin Steak</div>
                                            <div style="font-size: 12px;">Comes along with two side options: Potato salad, Garden Salad, Coleslaw, Fries, Steam Vegetables, Rice & Beans, White Rice, or Potato Wedges. Steak Sauce options: Mushroom Sauce, Mustard Sauce, BBQ Sauce.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$35.75</div>
                                                <button id='Sirloin Steak' value="35.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Pork Chops</div>
                                            <div style="font-size: 12px;">Comes along with two side options: Potato salad, Garden Salad, Coleslaw, Fries, Steam Vegetables, Rice & Beans, White Rice, or Potato Wedges.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$22.75</div>
                                                <button id='Pork Chops' value="22.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Fish Fillet</div>
                                            <div style="font-size: 12px;">Comes along with two side options: Potato salad, Garden Salad, Coleslaw, Fries, Steam Vegetables, Rice & Beans, White Rice, or Potato Wedges.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$36.25</div>
                                                <button id='Fish Fillet' value="36.25" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Fried Shrimp</div>
                                            <div style="font-size: 12px;">Comes along with two side options: Potato salad, Garden Salad, Coleslaw, Fries, Steam Vegetables, Rice & Beans, White Rice, or Potato Wedges.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$33.25</div>
                                                <button id='Fried Shrimp' value="33.25" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Chicken Fajitas</div>
                                            <div style="font-size: 12px;">Served with a side of refried beans, sour cream, pico de gallo and your choice of white rice or flour tortilla.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$16.50</div>
                                                <button id='Chicken Fajitas' value="16.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Beef Fajitas</div>
                                            <div style="font-size: 12px;">Served with a side of refried beans, sour cream, pico de gallo and your choice of white rice or flour tortilla.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$18.50</div>
                                                <button id='Beef Fajitas' value="18.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Veggie Fajitas</div>
                                            <div style="font-size: 12px;">Served with a side of refried beans, sour cream, pico de gallo and your choice of white rice or flour tortilla.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$15.50</div>
                                                <button id='Veggie Fajitas' value="15.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Chicken Alfredo Pasta</div>
                                            <div style="font-size: 12px;">Rich and creamy Alfredo Sauce and Fettuccini noodles topped with grilled chicken and a sprinkle of fresh basil along with a side of garlic bread.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$26.50</div>
                                                <button id='Chicken Alfredo Pasta' value="26.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Shrimp Alfredo Pasta</div>
                                            <div style="font-size: 12px;">Rich and creamy Alfredo Sauce and Fettuccini noodles topped with grilled shrimp and a sprinkle of fresh basil along with a side of garlic bread.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$34.25</div>
                                                <button id='Shrimp Alfredo Pasta' value="34.25" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Spicy Chicken Penne Pasta</div>
                                            <div style="font-size: 12px;">Sautéed bite sized grilled chicken breast and mushrooms mixed in a creamy tomato sauce and Penne noodles along with a side of garlic bread.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$28.50</div>
                                                <button id='Spicy Chicken Penne Pasta' value="28.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Spicy Shrimp Penne Pasta</div>
                                            <div style="font-size: 12px;">Sautéed bite sized grilled shrimp and mushrooms mixed in a creamy tomato sauce and Penne noodles along with a side of garlic bread.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$37.25</div>
                                                <button id='Spicy Shrimp Penne Pasta' value="37.25" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Mango Shrimp Ceviche</div>
                                            <div style="font-size: 12px;">Tender shrimp marinated in fresh citrus juice, tossed with sweet mango, red onion and cilantro. Served with home-made corn tortilla chips and a side of habanero.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$22.50</div>
                                                <button id='Mango Shrimp Ceviche' value="22.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Caesar Salad</div>
                                            <div style="font-size: 12px;">Fresh chopped Romaine lettuce, sprinkled with Parmesan cheese and home-made croutons mixed with Caesar dressing. Dressings: Ranch, Caesar, Clear Italian, Mexican Dressing or Blue Cheese.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$14.00</div>
                                                <button id='Caesar Salad' value="14.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Super House Salad</div>
                                            <div style="font-size: 12px;">Fresh chopped Romaine lettuce with sliced cucumber, tomatoes, sliced carrots, onions, sweet corn, crispy bacon bits and fried crushed tortilla chips. Dressings: Ranch, Caesar, Clear Italian, Mexican Dressing or Blue Cheese.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$13.25</div>
                                                <button id='Super House Salad' value="13.25" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Kids Menu -->
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Jr. Burger with Potato Chips</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$11.75</div>
                                                <button id='Jr. Burger with Potato Chips' value="11.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Rice & Beans with Stew Chicken</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$7.50</div>
                                                <button id='Rice & Beans with Stew Chicken' value="7.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Chicken Tenders with Fries</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$8.75</div>
                                                <button id='Chicken Tenders with Fries' value="8.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Mini Cheese and Pepperoni Pizza</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$10.25</div>
                                                <button id='Mini Cheese and Pepperoni Pizza' value="10.25" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane text-white" id="breakfast" role="tabpanel">
                            <div class="allmenu-items" style="display: grid; column-gap: 30px; row-gap: 30px; grid-template-columns: 354px 354px 354px;">
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Midway Breakfast</div>
                                            <div style="font-size: 12px;">Eggs cooked to your preference accompanied with refried beans, bacon, cheese, and fry jacks.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$14.75</div>
                                                <button id="Midway Breakfast" value="14.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Spanish Breakfast</div>
                                            <div style="font-size: 12px;">Scrambled eggs with onions and local greens or tomatoes accompanied with refried beans, cream, cheese, fried plantains and corn or flour tortilla.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$15.75</div>
                                                <button id="Spanish Breakfast" value="15.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Huevos Rancheros</div>
                                            <div style="font-size: 12px;">Sunny side-up eggs on a bed of corn tortillas, tapped with a chef-style tomato salsa, parmesan cheese, refried beans and your choice of bacon, ham or sausage.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$14.75</div>
                                                <button id="Huevos Rancheros" value="14.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">English Breakfast</div>
                                            <div style="font-size: 12px;">Sunny side-up eggs served with bacon, sausage, grilled tomato, baked beans and toast.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$19.75</div>
                                                <button id="English Breakfast" value="19.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Breakfast Nachos</div>
                                            <div style="font-size: 12px;">A bed of corn torilla chips scrambled with eggs and topped with beef, refried beans, sour cream, and pico de gallo.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$16.25</div>
                                                <button id="Breakfast Nachos" value="16.25" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Waffle Sandwich</div>
                                            <div style="font-size: 12px;">A waffle stuffed with ham, cheese, sliced tomato and home-made spread.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$16.75</div>
                                                <button id="Waffle Sandwich" value="16.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Pancakes</div>
                                            <div style="font-size: 12px;">Three pancakes accompanied with meat option bacon, ham or sausage and your choice of honey or syrup.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$13.75</div>
                                                <button id="Pancakes" value="13.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">French Toast</div>
                                            <div style="font-size: 12px;">Three slices of home-made bread soaked in a fresh mixture of milk, eggs, and cinnamon. Served with your choice of bacon, ham or sausage, and syrup or honey.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$14.75</div>
                                                <button id="French Toast" value="14.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Crepes</div>
                                            <div style="font-size: 12px;">Thin wrapped pancakes filled with cream cheese, fruits and topped with whipped cream. Served with your meat choice of bacon, ham or sausage, and syrup or honey.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$17.75</div>
                                                <button id="Crepes" value="17.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Breakfast Sliders</div>
                                            <div style="font-size: 12px;">Two Creole buns filled with ham, cheese, beans and eggs.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$8.75</div>
                                                <button id="Breakfast Sliders" value="8.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Breakfast Burrito</div>
                                            <div style="font-size: 12px;">A home-made flour tortilla filled with scrambled eggs, sausage, beans, and cheese.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$8.25</div>
                                                <button id="Breakfast Burrito" value="8.25" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Midway Chicken Wrap</div>
                                            <div style="font-size: 12px;">A home-made flour tortilla filled with grilled chicken, beans, lettuce, cheese, and pico de gallo.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$9.50</div>
                                                <button id="Midway Chicken Wrap" value="9.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Mexican Taco</div>
                                            <div style="font-size: 12px;">A grilled corn tortilla with a home-made mustard sauce filled with diced beef and pico de gallo.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$3.50</div>
                                                <button id="Mexican Taco" value="3.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Omelet</div>
                                            <div style="font-size: 12px;">Eggs filled with onions, sweet peppers, tomatoes, mushrooms, and your choice of ham or bacon, Omelets come with your choice of flour torilla, corn torilla, fry jacks or toast.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$17.50</div>
                                                <button id="Omelet" value="17.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane text-white" id="lunch" role="tabpanel">
                            <div class="allmenu-items" style="display: grid; column-gap: 30px; row-gap: 30px; grid-template-columns: 354px 354px 354px;">
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Small Rice & Beans</div>
                                            <div style="font-size: 12px;">Rice and beans served with stew chicken, fried plantain and your choice of coleslaw or potato salad.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$7.50</div>
                                                <button id="Small Rice & Beans" value="7.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Regular Rice & Beans</div>
                                            <div style="font-size: 12px;">Rice and beans served with stew chicken, fried plantain and your choice of coleslaw or potato salad.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$12.00</div>
                                                <button id="Regular Rice & Beans" value="12.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Large Rice & Beans</div>
                                            <div style="font-size: 12px;">Rice and beans served with stew chicken, fried plantain and your choice of coleslaw or potato salad.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$16.50</div>
                                                <button id="Large Rice & Beans" value="16.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Small Fried Chicken</div>
                                            <div style="font-size: 12px;">Crispy fried chicken seasoned with our special spice mix, served with fries and coleslaw.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$7.50</div>
                                                <button id="Small Fried Chicken" value="7.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Regular Fried Chicken</div>
                                            <div style="font-size: 12px;">Crispy fried chicken seasoned with our special spice mix, served with fries and coleslaw.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$12.00</div>
                                                <button id="Regular Fried Chicken" value="12.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Large Fried Chicken</div>
                                            <div style="font-size: 12px;">Crispy fried chicken seasoned with our special spice mix, served with fries and coleslaw.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$16.50</div>
                                                <button id="Large Fried Chicken" value="16.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Chicken Strips</div>
                                            <div style="font-size: 12px;">Deep fried breaded chicken strips with a side of fries, coleslaw and our home-made ranch dip or sweet and sour sauce.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$17.25</div>
                                                <button id="Chicken Strips" value="17.25" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Beef Burger</div>
                                            <div style="font-size: 12px;">Burger come with cheese, sliced tomatoes, lettuce, pickles and onions.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$14.75</div>
                                                <button id="Beef Burger" value="14.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Chicken Strip Burger</div>
                                            <div style="font-size: 12px;">Burger come with cheese, sliced tomatoes, lettuce, pickles and onions.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$14.25</div>
                                                <button id="Chicken Strip Burger" value="14.25" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Fish Burger</div>
                                            <div style="font-size: 12px;">Burger come with cheese, sliced tomatoes, lettuce, pickles and onions.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$19.75</div>
                                                <button id="Fish Burger" value="19.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">6pc Wings</div>
                                            <div style="font-size: 12px;">Deep fried wings served with your choice of sauce and either garlic bread or fries. Sause Flavors: BBQ, Hot, Spicy Mango, Lemon Pepper, Spicy Orange</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$18.00</div>
                                                <button id="6pc Wings" value="18.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">9pc Wings</div>
                                            <div style="font-size: 12px;">Deep fried wings served with your choice of sauce and either garlic bread or fries. Sause Flavors: BBQ, Hot, Spicy Mango, Lemon Pepper, Spicy Orange</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$24.75</div>
                                                <button id="9pc Wings" value="24.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">12pc Wings</div>
                                            <div style="font-size: 12px;">Deep fried wings served with your choice of sauce and either garlic bread or fries. Sause Flavors: BBQ, Hot, Spicy Mango, Lemon Pepper, Spicy Orange</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$33.50</div>
                                                <button id="12pc Wings" value="33.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">7" Pepperoni Pizza</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$10.25</div>
                                                <button id='7" Pepperoni Pizza' value="10.25" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">10" Pepperoni Pizza</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$15.75</div>
                                                <button id='10" Pepperoni Pizza' value="15.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">7" Meat Lovers Pizza</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$13.25</div>
                                                <button id='7" Meat Lovers Pizza' value="13.25" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">10" Meat Lovers Pizza</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$18.00</div>
                                                <button id='10" Meat Lovers Pizza' value="18.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">7" Hawaiian Pizza</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$12.00</div>
                                                <button id='7" Hawaiian Pizza' value="12.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">10" Hawaiian Pizza</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$16.00</div>
                                                <button id='10" Hawaiian Pizza' value="16.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">7" Margarita Pizza</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$12.50</div>
                                                <button id='7" Margarita Pizza' value="12.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">10" Margarita Pizza</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$17.00</div>
                                                <button id='10" Margarita Pizza' value="17.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">7" Bianca Pizza</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$9.75</div>
                                                <button id='7" Bianca Pizza' value="9.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">10" Bianca Pizza</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$15.00</div>
                                                <button id='10" Bianca Pizza' value="15.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">T-bone Steak</div>
                                            <div style="font-size: 12px;">Comes along with two side options: Potato salad, Garden Salad, Coleslaw, Fries, Steam Vegetables, Rice & Beans, White Rice, or Potato Wedges. Steak Sauce options: Mushroom Sauce, Mustard Sauce, BBQ Sauce.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$37.75</div>
                                                <button id='T-bone Steak' value="37.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Sirloin Steak</div>
                                            <div style="font-size: 12px;">Comes along with two side options: Potato salad, Garden Salad, Coleslaw, Fries, Steam Vegetables, Rice & Beans, White Rice, or Potato Wedges. Steak Sauce options: Mushroom Sauce, Mustard Sauce, BBQ Sauce.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$35.75</div>
                                                <button id='Sirloin Steak' value="35.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Pork Chops</div>
                                            <div style="font-size: 12px;">Comes along with two side options: Potato salad, Garden Salad, Coleslaw, Fries, Steam Vegetables, Rice & Beans, White Rice, or Potato Wedges.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$22.75</div>
                                                <button id='Pork Chops' value="22.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Fish Fillet</div>
                                            <div style="font-size: 12px;">Comes along with two side options: Potato salad, Garden Salad, Coleslaw, Fries, Steam Vegetables, Rice & Beans, White Rice, or Potato Wedges.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$36.25</div>
                                                <button id='Fish Fillet' value="36.25" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Fried Shrimp</div>
                                            <div style="font-size: 12px;">Comes along with two side options: Potato salad, Garden Salad, Coleslaw, Fries, Steam Vegetables, Rice & Beans, White Rice, or Potato Wedges.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$33.25</div>
                                                <button id='Fried Shrimp' value="33.25" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Chicken Fajitas</div>
                                            <div style="font-size: 12px;">Served with a side of refried beans, sour cream, pico de gallo and your choice of white rice or flour tortilla.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$16.50</div>
                                                <button id='Chicken Fajitas' value="16.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Beef Fajitas</div>
                                            <div style="font-size: 12px;">Served with a side of refried beans, sour cream, pico de gallo and your choice of white rice or flour tortilla.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$18.50</div>
                                                <button id='Beef Fajitas' value="18.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Veggie Fajitas</div>
                                            <div style="font-size: 12px;">Served with a side of refried beans, sour cream, pico de gallo and your choice of white rice or flour tortilla.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$15.50</div>
                                                <button id='Veggie Fajitas' value="15.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Chicken Alfredo Pasta</div>
                                            <div style="font-size: 12px;">Rich and creamy Alfredo Sauce and Fettuccini noodles topped with grilled chicken and a sprinkle of fresh basil along with a side of garlic bread.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$26.50</div>
                                                <button id='Chicken Alfredo Pasta' value="26.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Shrimp Alfredo Pasta</div>
                                            <div style="font-size: 12px;">Rich and creamy Alfredo Sauce and Fettuccini noodles topped with grilled shrimp and a sprinkle of fresh basil along with a side of garlic bread.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$34.25</div>
                                                <button id='Shrimp Alfredo Pasta' value="34.25" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Spicy Chicken Penne Pasta</div>
                                            <div style="font-size: 12px;">Sautéed bite sized grilled chicken breast and mushrooms mixed in a creamy tomato sauce and Penne noodles along with a side of garlic bread.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$28.50</div>
                                                <button id='Spicy Chicken Penne Pasta' value="28.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Spicy Shrimp Penne Pasta</div>
                                            <div style="font-size: 12px;">Sautéed bite sized grilled shrimp and mushrooms mixed in a creamy tomato sauce and Penne noodles along with a side of garlic bread.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$37.25</div>
                                                <button id='Spicy Shrimp Penne Pasta' value="37.25" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Mango Shrimp Ceviche</div>
                                            <div style="font-size: 12px;">Tender shrimp marinated in fresh citrus juice, tossed with sweet mango, red onion and cilantro. Served with home-made corn tortilla chips and a side of habanero.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$22.50</div>
                                                <button id='Mango Shrimp Ceviche' value="22.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Caesar Salad</div>
                                            <div style="font-size: 12px;">Fresh chopped Romaine lettuce, sprinkled with Parmesan cheese and home-made croutons mixed with Caesar dressing. Dressings: Ranch, Caesar, Clear Italian, Mexican Dressing or Blue Cheese.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$14.00</div>
                                                <button id='Caesar Salad' value="14.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div class="text-center"><img src="{{url('/')}}/curry.jpg" alt="curry" style="width: 100%; height: 180px; border-radius: 8px;"></div>
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Super House Salad</div>
                                            <div style="font-size: 12px;">Fresh chopped Romaine lettuce with sliced cucumber, tomatoes, sliced carrots, onions, sweet corn, crispy bacon bits and fried crushed tortilla chips. Dressings: Ranch, Caesar, Clear Italian, Mexican Dressing or Blue Cheese.</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$13.25</div>
                                                <button id='Super House Salad' value="13.25" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane text-white" id="kids" role="tabpanel">
                            <div class="allmenu-items" style="display: grid; column-gap: 30px; row-gap: 30px; grid-template-columns: 354px 354px 354px;">
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Jr. Burger with Potato Chips</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$11.75</div>
                                                <button id='Jr. Burger with Potato Chips' value="11.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Rice & Beans with Stew Chicken</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$7.50</div>
                                                <button id='Rice & Beans with Stew Chicken' value="7.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Chicken Tenders with Fries</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$8.75</div>
                                                <button id='Chicken Tenders with Fries' value="8.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Mini Cheese and Pepperoni Pizza</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$10.25</div>
                                                <button id='Mini Cheese and Pepperoni Pizza' value="10.25" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane text-white" id="side-orders" role="tabpanel">
                            <div class="fw-bold fs-3 ms-2 border-bottom border-warning my-3" style="color: #f7ff66">Breakfast Sides</div>
                            <div class="allmenu-items" style="display: grid; column-gap: 30px; row-gap: 30px; grid-template-columns: 354px 354px 354px;">
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Pancake</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$5.00</div>
                                                <button id="Pancake" value="5.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Pancake Blueberry Filling</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$3.50</div>
                                                <button id="Pancake Blueberry Filling" value="3.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Pancake Strawberry Filling</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$3.50</div>
                                                <button id="Pancake Strawberry Filling" value="3.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Eggs</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$3.00</div>
                                                <button id="Eggs" value="3.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Hash Brown</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$4.50</div>
                                                <button id="Hash Brown" value="4.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Flour Tortilla</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$1.00</div>
                                                <button id="Flour Tortilla" value="1.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Corn Tortillas</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$1.00</div>
                                                <button id="Corn Tortillas" value="1.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Toasted Bread</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$4.50</div>
                                                <button id="Toasted Bread" value="4.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Fried Jacks</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$4.50</div>
                                                <button id="Fried Jacks" value="4.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Refried Beans</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$4.50</div>
                                                <button id="Refried Beans" value="4.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Bacon</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$4.50</div>
                                                <button id="Bacon" value="4.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Ham</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$4.50</div>
                                                <button id="Ham" value="4.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Sausages</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$4.50</div>
                                                <button id="Sausages" value="4.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Cheese</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$3.00</div>
                                                <button id="Cheese" value="3.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Granola</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$4.50</div>
                                                <button id="Granola" value="4.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Nutella</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$4.50</div>
                                                <button id="Nutella" value="4.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Jalapenos</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$1.50</div>
                                                <button id="Jalapenos" value="1.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Habaneros</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$1.50</div>
                                                <button id="Habaneros" value="1.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Burger Sides -->
                            <div class="fw-bold fs-3 ms-2 border-bottom border-warning my-3" style="color: #f7ff66">Burger Sides</div>
                            <div class="allmenu-items" style="display: grid; column-gap: 30px; row-gap: 30px; grid-template-columns: 354px 354px 354px;">
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Cheese</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$2.00</div>
                                                <button id="Cheese" value="2.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Bacon</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$2.00</div>
                                                <button id="Bacon" value="2.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Fries</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$4.50</div>
                                                <button id="Fries" value="4.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Onion Rings</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$4.50</div>
                                                <button id="Onion Rings" value="4.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Grilled Sweet pepper</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$2.00</div>
                                                <button id="Grilled Sweet pepper" value="2.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Mushrooms</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$2.00</div>
                                                <button id="Mushrooms" value="2.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                            </div>
                            <!-- Pizza Toppings -->
                            <div class="fw-bold fs-3 ms-2 border-bottom border-warning my-3" style="color: #f7ff66">Pizza Toppings</div>
                            <div class="allmenu-items" style="display: grid; column-gap: 30px; row-gap: 30px; grid-template-columns: 354px 354px 354px;">
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Mushrooms</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$1.50</div>
                                                <button id="Mushrooms" value="1.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Sausage</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$1.50</div>
                                                <button id="Sausage" value="1.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Green Peppers</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$1.50</div>
                                                <button id="Green Peppers" value="1.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Pepperoni</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$1.50</div>
                                                <button id="Pepperoni" value="1.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Pineapple</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$1.50</div>
                                                <button id="Pineapple" value="1.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Olives</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$1.50</div>
                                                <button id="Olives" value="1.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Ground Beef</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$1.50</div>
                                                <button id="Ground Beef" value="1.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Habanero</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$1.50</div>
                                                <button id="Habanero" value="1.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Extra Cheese</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$1.50</div>
                                                <button id="Extra Cheese" value="1.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                            </div>
                            <!-- Salad Sides -->
                            <div class="fw-bold fs-3 ms-2 border-bottom border-warning my-3" style="color: #f7ff66">Salad Sides</div>
                            <div class="allmenu-items" style="display: grid; column-gap: 30px; row-gap: 30px; grid-template-columns: 354px 354px 354px;">
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Grilled Chicken</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$6.00</div>
                                                <button id="Grilled Chicken" value="6.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Grilled Shrimp</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$18.75</div>
                                                <button id="Grilled Shrimp" value="18.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                            </div>
                            <!-- Lunch Sides -->
                            <div class="fw-bold fs-3 ms-2 border-bottom border-warning my-3" style="color: #f7ff66">Lunch Sides</div>
                            <div class="allmenu-items" style="display: grid; column-gap: 30px; row-gap: 30px; grid-template-columns: 354px 354px 354px;">
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Shrimp</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$18.75</div>
                                                <button id="Shrimp" value="18.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Fish</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$19.75</div>
                                                <button id="Fish" value="19.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Grilled Chicken Breast</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$6.00</div>
                                                <button id="Grilled Chicken Breast" value="6.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Beef Patty</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$5.75</div>
                                                <button id="Beef Patty" value="5.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Fries</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$4.50</div>
                                                <button id="Fries" value="4.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Mashed Potatoes</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$4.50</div>
                                                <button id="Mashed Potatoes" value="4.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Steam Vegetables</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$7.25</div>
                                                <button id="Steam Vegetables" value="7.25" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Garden Salad</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$4.50</div>
                                                <button id="Garden Salad" value="4.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Potato Wedges</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$4.50</div>
                                                <button id="Potato Wedges" value="4.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Rice & Beans</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$4.50</div>
                                                <button id="Rice & Beans" value="4.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">White Rice</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$4.50</div>
                                                <button id="White Rice" value="4.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Stew Beans</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$4.50</div>
                                                <button id="Stew Beans" value="4.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Garlic Bread</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$4.50</div>
                                                <button id="Garlic Bread" value="4.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Onion Rings</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$4.50</div>
                                                <button id="Onion Rings" value="4.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Coleslaw</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$4.50</div>
                                                <button id="Coleslaw" value="4.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Potato Salad</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$4.50</div>
                                                <button id="Potato Salad" value="4.50" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Flour Tortilla</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$1.00</div>
                                                <button id="Flour Tortilla" value="1.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Corn Tortilla</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$1.00</div>
                                                <button id="Corn Tortilla" value="1.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane text-white" id="drinks" role="tabpanel">
                            <div class="allmenu-items" style="display: grid; column-gap: 30px; row-gap: 30px; grid-template-columns: 354px 354px 354px;">
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Natural Juices</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$2.75</div>
                                                <button id="Natural Juices" value="2.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Large Natural Juices</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$3.75</div>
                                                <button id="Large Natural Juices" value="3.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Iced Tea</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$2.00</div>
                                                <button id="Iced Tea" value="2.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Plastic Softdrinks</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$2.00</div>
                                                <button id="Plastic Softdrinks" value="2.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Glass Softdrinks</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$1.25</div>
                                                <button id="Glass Softdrinks" value="1.25" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Coffee</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$1.00</div>
                                                <button id="Coffee" value="1.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Hot Tea</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$1.00</div>
                                                <button id="Hot Tea" value="1.00" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card">
                                    <div class="card-body d-flex flex-column" style="background-color: #f7ff66; font-family: 'Lucida Console', 'Courier New', monospace;">
                                        <div>
                                            <div class="fs-4 fw-bold food-item">Kids Size Natural Juice</div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="fw-bold">$2.75</div>
                                                <button id='Kids Size Natural Juice' value="2.75" class="btn btn-sm btn-warning add">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
        .on('keypress', '.searchbar', function(e) {
            const searchTerm = $(this).val().toLowerCase();

            $('.allmenu-items .card').each(function () {
                const itemName = $(this).find('.food-item').text().toLowerCase();
                $(this).toggle(itemName.includes(searchTerm));
            });
        })
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
                            <div>x${arr.quantity} <span class="ms-3">$${arr.item_cost.toFixed(2)}</span> </div>
                        </div>
                        <div>${arr.comments}</div>
                    </div>
                `;
            });
            $('.orders').html(html);

            $('.item-total').html(`Items (${item_count}) Total`);
            $('.cost-total').html(`$ ${cost_total.toFixed(2)}`);
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
                            <span class="me-2">$${arr.item_cost.toFixed(2)}</span><button id="${index}" class="btn btn-success edit-order me-2"><i class="ri-edit-2-line"></i></button><button id="${index}" class="btn btn-danger del-order"><i class="ri-delete-bin-line"></i></button>
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