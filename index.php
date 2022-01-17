<?php
$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/css/datepicker-bs4.min.css">
        <style>
            .alert {
                margin-bottom: 0;
            }
            .accordion {
                margin-top: 1rem;
                border: 2px solid lightgray;
                border-radius: 3px;
                padding-top: 12px;
            }
        </style>
        <script>
            var BASE_URL = '<?= $url ?>';
        </script>
    </head>
    <body>

        <div class="container">

            <div class="row">

                <!-- Accordion Items -->
                <div class="accordion accordion-flush" id="accordionFlushExample">

                    <!-- First Item -->
                    <div class="accordion-item">
                        
                        <!-- Header -->
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Initiate
                            </button>
                        </h2>
                        <!-- /End Header -->
                        
                        <!-- Body -->
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">

                            <div class="accordion-body">

                                <form class="row g-3" id="init">                                    

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Submit Initiation</button>
                                    </div>

                                    <div class="ms-area alert alert-primary" role="alert"></div>

                                </form>

                            </div>
                            
                        </div>
                        <!-- /End Body -->
                        
                    </div>
                    <!-- /End First Item -->

                    <!-- Second Item -->
                    <div class="accordion-item">
                        
                        <!-- Header -->
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Get Orders
                            </button>
                        </h2>
                        <!-- /End Header -->
                        
                        <!-- Body -->
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">

                            <div class="accordion-body">

                                <form class="row g-3" id="index">                                    

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Fetch All Records</button>
                                    </div>

                                    <div class="ms-area alert alert-primary" role="alert"></div>

                                </form>

                            </div>
                            
                        </div>
                        <!-- /End Body -->
                        
                    </div>
                    <!-- /End Second Item -->

                    <!-- Third Item -->
                    <div class="accordion-item">
                        
                        <!-- Header -->
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Get Order
                            </button>
                        </h2>
                        <!-- End Header -->
                        
                        <!-- Body -->
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">

                            <div class="accordion-body">

                                <form class="row g-3" id="show">                                    
                                    <div class="col-2">
                                        <label for="order-id" class="form-label">Order ID</label>
                                        <input type="text" class="form-control" id="order-id" name="id" value="2978192457897">
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Fetch Single Record</button>
                                    </div>
                                    <input type="hidden" name="method" value="show">

                                    <div class="ms-area alert alert-primary" role="alert"></div>

                                </form>

                            </div>
                            
                        </div>
                        <!-- /End Body -->
                        
                    </div>
                    <!-- /End Third Item -->

                    <!-- Forth Item -->
                    <div class="accordion-item">
                        
                        <!-- Header -->
                        <h2 class="accordion-header" id="flush-headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                Create Order
                            </button>
                        </h2>
                        <!-- /End Header -->
                        
                        <!-- Body -->
                        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">

                            <div class="accordion-body">

                                <form class="row g-3" id="create">                                    
                                    <div class="col-2">
                                        <label for="order-id" class="form-label">Order ID</label>
                                        <input type="text" class="form-control" id="order-id" name="order_id" value="2978100000000" readonly>
                                    </div>
                                    <div class="col-2">
                                        <label for="shop-id" class="form-label">Shop ID</label>
                                        <input type="text" class="form-control" id="shop-id" name="shop_id" value="50026315945" readonly>
                                    </div>
                                    <div class="col-2">
                                        <label for="total-price" class="form-label">Total Price</label>
                                        <input type="text" class="form-control" id="total-price" name="total_price" value="0.1" readonly>
                                    </div>
                                    <div class="col-2">
                                        <label for="subtotal-price" class="form-label">Subtotal Price</label>
                                        <input type="text" class="form-control" id="subtotal-price" name="subtotal_price" value="0.1" readonly>
                                    </div>
                                    <div class="col-2">
                                        <label for="total-weight" class="form-label">Total Weight</label>
                                        <input type="text" class="form-control" id="total-weight" name="total_weight" value="0" readonly>
                                    </div>
                                    <div class="col-2">
                                        <label for="total-tax" class="form-label">Tax</label>
                                        <input type="text" class="form-control" id="production-cost" name="total_tax" value="0" readonly>
                                    </div>
                                    <div class="col-2">
                                        <label for="currency" class="form-label">Currency</label>
                                        <input type="text" class="form-control" id="currency" name="currency" value="ILS" readonly>
                                    </div>
                                    <div class="col-2">
                                        <label for="financial-status" class="form-label">Financial Status</label>
                                        <input type="text" class="form-control" id="financial-status" name="financial_status" value="paid" readonly>
                                    </div>
                                    <div class="col-2">
                                        <label for="total-discounts" class="form-label">Total Discounts</label>
                                        <input type="text" class="form-control" id="total-discounts" name="total_discounts" value="0" readonly>
                                    </div>
                                    <div class="col-2">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="#1001" readonly>
                                    </div>
                                    <div class="col-2">
                                        <label for="fulfillment-status" class="form-label">Fulfillment Status</label>
                                        <input type="text" class="form-control" id="fulfillment-status" name="fulfillment_status" value="fulfilled" readonly>
                                    </div>
                                    <div class="col-2">
                                        <label for="country" class="form-label">Country</label>
                                        <input type="text" class="form-control" id="country" name="country" value="US" readonly>
                                    </div>
                                    <div class="col-2">
                                        <label for="province" class="form-label">Province</label>
                                        <input type="text" class="form-control" id="province" name="province" value="CA" readonly>
                                    </div>
                                    <div class="col-2">
                                        <label for="total-production-cost" class="form-label">Production Cost</label>
                                        <input type="text" class="form-control" id="total-production-cost" name="total_production_cost" value="321" readonly>
                                    </div>
                                    <div class="col-2">
                                        <label for="total-items" class="form-label">Total Items</label>
                                        <input type="text" class="form-control" id="total-items" name="total_items" value="1" readonly>
                                    </div>
                                    <div class="col-2">
                                        <label for="total-order-shipping-cost" class="form-label">Shipping Cost</label>
                                        <input type="text" class="form-control" id="total-order-shipping-cost" name="total_order_shipping_cost" value="500" readonly>
                                    </div>
                                    <div class="col-2">
                                        <label for="total-order-handling-cost" class="form-label">Handling Cost</label>
                                        <input type="text" class="form-control" id="total-order-handling-cost" name="total_order_handling_cost" value="1000" readonly>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Create Single Record</button>
                                    </div>
                                    <input type="hidden" name="method" value="createOrUpdate">

                                    <div class="ms-area alert alert-primary" role="alert"></div>

                                </form>

                            </div>
                        </div>
                        <!-- /End Body -->
                        
                    </div>
                    <!-- /End Forth Item -->

                    <!-- Fifth Item -->
                    <div class="accordion-item">
                        
                        <!-- Header -->
                        <h2 class="accordion-header" id="flush-headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                Update Order
                            </button>
                        </h2>
                        <!-- /End Header -->
                        
                        <!-- Body -->
                        <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">

                            <div class="accordion-body">

                                <form class="row g-3" id="update">
                                    <div class="col-2">
                                        <label for="order-id" class="form-label">Order ID</label>
                                        <input type="text" class="form-control" id="order-id" name="order_id" value="2978192457897" readonly>
                                    </div>
                                    <div class="col-2">
                                        <label for="shipping-cost" class="form-label">Shipping Cost</label>
                                        <input type="text" class="form-control" id="shipping-cost" name="total_order_shipping_cost" value="50" readonly>
                                    </div>
                                    <div class="col-2">
                                        <label for="handling-cost" class="form-label">Handling Cost</label>
                                        <input type="text" class="form-control" id="handling-cost" name="total_order_handling_cost" value="100" readonly>
                                    </div>
                                    <div class="col-2">
                                        <label for="tax" class="form-label">Tax</label>
                                        <input type="text" class="form-control" id="tax" name="total_tax" value="1" readonly>
                                    </div>
                                    <div class="col-2">
                                        <label for="production-cost" class="form-label">Production Cost</label>
                                        <input type="text" class="form-control" id="production-cost" name="total_production_cost" value="555" readonly>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Update Single Record</button>
                                    </div>

                                    <div class="ms-area alert alert-primary" role="alert"></div>
                                </form>

                            </div>
                        </div>
                        <!-- /End Body -->
                        
                    </div>
                    <!-- /End Fifth Item -->

                    <!-- Sixth Item -->
                    <div class="accordion-item">
                        
                        <!-- Header -->
                        <h2 class="accordion-header" id="flush-headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                                Delete Order
                            </button>
                        </h2>
                        <!-- /End Header -->
                        
                        <!-- Body -->
                        <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">

                            <div class="accordion-body">

                                <form class="row g-3" id="delete">                                    
                                    <div class="col-2">
                                        <label for="order-id" class="form-label">Order ID</label>
                                        <input type="text" class="form-control" id="order-id" name="id" value="2978192457897">
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Delete Single Record</button>
                                    </div>
                                    <input type="hidden" name="method" value="delete">

                                    <div class="ms-area alert alert-primary" role="alert"></div>

                                </form>

                            </div>
                        </div>
                        <!-- /End Body -->
                        
                    </div>
                    <!-- End Sixth Item -->

                    <!-- Seventh Item -->
                    <div class="accordion-item">
                        
                        <!-- Header -->
                        <h2 class="accordion-header" id="flush-headingSeven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
                                Get Summery
                            </button>
                        </h2>
                        <!-- /End Header -->
                        
                        <!-- Body -->
                        <div id="flush-collapseSeven" class="accordion-collapse collapse" aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">

                            <div class="accordion-body">

                                <form class="row g-3" id="summery">
                                    <div class="col-2">                                   
                                        <label for="from" class="form-label">From</label>
                                        <div class="input-group mb-4">
                                            <i class="bi bi-calendar-date input-group-text"></i>
                                            <input type="text" class="datepicker_input form-control" id="from" name="from" placeholder="01/02/2021" required aria-label="From Date">
                                        </div>
                                    </div>
                                    <div class="col-2">                                   
                                        <label for="to" class="form-label">To</label>
                                        <div class="input-group mb-4">
                                            <i class="bi bi-calendar-date input-group-text"></i>
                                            <input type="text" class="datepicker_input form-control" id="to" name="to" placeholder="17/02/2021" required aria-label="To Date">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    <input type="hidden" name="method" value="summery">

                                    <div class="ms-area alert alert-primary" role="alert"></div>

                                </form>

                            </div>
                        </div>
                        <!-- /End Body -->
                        
                    </div>
                    <!-- /End Seventh Item -->
                    
                </div>
                <!-- /End Accordion Items -->
                
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/js/datepicker.min.js"></script>
    <script src="scripts.js"></script>
</html>