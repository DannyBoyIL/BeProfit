/* Bootstrap 5 JS included */
/* vanillajs-datepicker 1.1.4 JS included */

const getDatePickerTitle = elem => {
    // From the label or the aria-label
    const label = elem.nextElementSibling;
    let titleText = '';
    if (label && label.tagName === 'LABEL') {
        titleText = label.textContent;
    } else {
        titleText = elem.getAttribute('aria-label') || '';
    }
    return titleText;
}

const elems = document.querySelectorAll('.datepicker_input');
for (const elem of elems) {
    const datepicker = new Datepicker(elem, {
        'format': 'dd/mm/yyyy', // UK format
        title: getDatePickerTitle(elem)
    });
}

$('div.ms-area').fadeOut();

$('#init').on('submit', function ($event) {

    $event.preventDefault();
    var $ms = $(this).find('div.ms-area');

    $.ajax({
        url: 'http://' + BASE_URL + 'Controller.php',
        type: "POST",
        data: {
            method: 'init'
        },
        success: function (data) {
            data = JSON.parse(data);
            console.log(data);
            length = data.data.length;

            if (length) {
                return $ms.removeClass('alert-warning')
                        .addClass('alert-primary')
                        .fadeIn().delay(3000).fadeOut(1000)
                        .text(`${length} records return successfully. ${data.db} new insertions or updates. Check Console or Network for json response.`);
            }
            return $ms.removeClass('alert-primary')
                    .addClass('alert-warning')
                    .fadeIn().delay(3000).fadeOut(1000)
                    .text(`${length} records return successfully. ${data.db} new insertions or updates. Check Console or Network for json response.`);
        },
        failue: function (error, e) {
            console.log(error, e);
            $ms.removeClass('alert-primary')
                    .addClass('alert-warning')
                    .fadeIn().delay(3000).fadeOut(1000)
                    .text('Couldn\'t return records. Check Console or Network for json response.');
        }
    });
});

$('#index').on('submit', function ($event) {

    $event.preventDefault();
    var $ms = $(this).find('div.ms-area');

    $.ajax({
        url: 'http://' + BASE_URL + 'Controller.php',
        type: "POST",
        data: {
            method: 'index'
        },
        success: function (data) {
            data = JSON.parse(data);
            console.log(data);
            length = data.data.length;

            if (length) {
                return $ms.removeClass('alert-warning')
                        .addClass('alert-primary')
                        .fadeIn().delay(3000).fadeOut(1000)
                        .text(`${length} records return successfully. Check Console or Network for json response.`);
            }
            return $ms.removeClass('alert-primary')
                    .addClass('alert-warning')
                    .fadeIn().delay(3000).fadeOut(1000)
                    .text(`${length} records return successfully. Check Console or Network for json response.`);
        },
        failue: function (error, e) {
            console.log(error, e);
            $ms.removeClass('alert-primary')
                    .addClass('alert-warning')
                    .fadeIn().delay(3000).fadeOut(1000)
                    .text('Couldn\'t return records. Check Console or Network for json response.');
        }
    });
});

$('#show').on('submit', function ($event) {

    $event.preventDefault();
    var data = new FormData($event.target);
    var $ms = $(this).find('div.ms-area');

    $.ajax({
        url: 'http://' + BASE_URL + 'Controller.php',
        type: "POST",
        processData: false,
        contentType: false,
        data: data,
        success: function (data) {
            data = JSON.parse(data);
            console.log(data);
            if (data.data) {
                return $ms.removeClass('alert-warning')
                        .addClass('alert-primary')
                        .fadeIn().delay(3000).fadeOut(1000)
                        .text('Single record was created successfully. Check Console or Network for json response.');
            }
            return $ms.removeClass('alert-primary')
                    .addClass('alert-warning')
                    .fadeIn().delay(3000).fadeOut(1000)
                    .text('Couldn\'t create single record. Check Console or Network for json response.');
        },
        failue: function (error, e) {
            console.log(error, e);
            $ms.removeClass('alert-primary')
                    .addClass('alert-warning')
                    .fadeIn().delay(3000).fadeOut(1000)
                    .text('Couldn\'t create single record. Check Console or Network for json response.');
        }
    });
});

$('#create').on('submit', function ($event) {

    $event.preventDefault();
    var $ms = $(this).find('div.ms-area');

    $.ajax({
        url: 'http://' + BASE_URL + 'Controller.php',
        type: "POST",
        data: {
            data: {
                order_id: "2978100000000",
                shop_id: "50026315945",
                total_price: "0.1",
                subtotal_price: "0.1",
                total_weight: "0",
                total_tax: "0",
                currency: "ILS",
                financial_status: "paid",
                total_discounts: "0",
                name: "#1001",
                fulfillment_status: "fulfilled",
                country: "US",
                province: "CA",
                total_production_cost: "321",
                total_items: "1",
                total_order_shipping_cost: "500",
                total_order_handling_cost: "1000",
                processed_at: "2020-10-25 11:44:45",
                created_at: "2020-10-25 11:44:45",
                updated_at: "2020-10-25 12:30:00",
                closed_at: "2020-10-25 12:30:00"
            },
            method: 'createOrUpdate'
        },
        success: function (data) {
            data = JSON.parse(data);
            console.log(data);
            if (data.success) {
                return $ms.removeClass('alert-warning')
                        .addClass('alert-primary')
                        .fadeIn().delay(3000).fadeOut(1000)
                        .text('Single record was created successfully. Check Console or Network for json response.');
            }
            return $ms.removeClass('alert-primary')
                    .addClass('alert-warning')
                    .fadeIn().delay(3000).fadeOut(1000)
                    .text('Couldn\'t create single record. Check Console or Network for json response.');
        },
        failue: function (error, e) {
            console.log(error, e);
            $ms.removeClass('alert-primary')
                    .addClass('alert-warning')
                    .fadeIn().delay(3000).fadeOut(1000)
                    .text('Couldn\'t create single record. Check Console or Network for json response.');
        }
    });
});

$('#update').on('submit', function ($event) {

    $event.preventDefault();
    var $ms = $(this).find('div.ms-area');

    $.ajax({
        url: 'http://' + BASE_URL + 'Controller.php',
        type: "POST",
        data: {
            data: {
                order_id: "2978192457897",
                shop_id: "50026315945",
                total_price: "0.1",
                subtotal_price: "0.1",
                total_weight: "0",
                total_tax: "1",
                currency: "ILS",
                financial_status: "paid",
                total_discounts: "0",
                name: "#1001",
                fulfillment_status: "fulfilled",
                country: "US",
                province: "CA",
                total_production_cost: "555",
                total_items: "1",
                total_order_shipping_cost: "50",
                total_order_handling_cost: "100",
                processed_at: "2020-10-25 11:44:45",
                created_at: "2020-10-25 11:44:45",
                updated_at: "2020-10-25 12:30:00",
                closed_at: "2020-10-25 12:30:00"
            },
            method: 'createOrUpdate'
        },
        success: function (data) {
            data = JSON.parse(data);
            console.log(data);
            if (data.success) {
                return $ms.removeClass('alert-warning')
                        .addClass('alert-primary')
                        .fadeIn().delay(3000).fadeOut(1000)
                        .text('Single record was updated successfully. Check Console or Network for json response.');
            }
            return $ms.removeClass('alert-primary')
                    .addClass('alert-warning')
                    .fadeIn().delay(3000).fadeOut(1000)
                    .text('Couldn\'t update single record. Check Console or Network for json response.');
        },
        failue: function (error, e) {
            console.log(error, e);
            $ms.removeClass('alert-primary')
                    .addClass('alert-warning')
                    .fadeIn().delay(3000).fadeOut(1000)
                    .text('Couldn\'t update single record. Check Console or Network for json response.');
        }
    });
});

$('#delete').on('submit', function ($event) {

    $event.preventDefault();
    var data = new FormData($event.target);
    var $ms = $(this).find('div.ms-area');

    $.ajax({
        url: 'http://' + BASE_URL + 'Controller.php',
        type: "POST",
        processData: false,
        contentType: false,
        data: data,
        success: function (data) {
            data = JSON.parse(data);
            console.log(data);
            if (data.success) {
                return $ms.removeClass('alert-warning')
                        .addClass('alert-primary')
                        .fadeIn().delay(3000).fadeOut(1000)
                        .text(`Record ${data.data.id} was deleted successfully. Check Console or Network for json response.`);
            }
            return $ms.removeClass('alert-primary')
                    .addClass('alert-warning')
                    .fadeIn().delay(3000).fadeOut(1000)
                    .text(`Couldn\'t delete record ${data.data.id}. Check Console or Network for json response.`);
        },
        failue: function (error, e) {
            console.log(error, e);
            $ms.removeClass('alert-primary')
                    .addClass('alert-warning')
                    .fadeIn().delay(3000).fadeOut(1000)
                    .text('Couldn\'t delete single record. Check Console or Network for json response.');
        }
    });
});

$('#summery').on('submit', function ($event) {

    $event.preventDefault();
    var data = new FormData($event.target);
    var $ms = $(this).find('div.ms-area');

    $.ajax({
        url: 'http://' + BASE_URL + 'Controller.php',
        type: "POST",
        processData: false,
        contentType: false,
        data: data,
        success: function (data) {
            data = JSON.parse(data);
            console.log(data);
            if (data.data) {
                return $ms.removeClass('alert-warning')
                        .addClass('alert-primary')
                        .fadeIn().delay(3000).fadeOut(1000)
                        .text('Summery was fetched successfully. Check Console or Network for json response.');
            }
            return $ms.removeClass('alert-primary')
                    .addClass('alert-warning')
                    .fadeIn().delay(3000).fadeOut(1000)
                    .text('Couldn\'t fetch summery. Check Console or Network for json response.');
        },
        failue: function (error, e) {
            console.log(error, e);
            $ms.removeClass('alert-primary')
                    .addClass('alert-warning')
                    .fadeIn().delay(3000).fadeOut(1000)
                    .text('Couldn\'t fetch summery. Check Console or Network for json response.');
        }
    });
});