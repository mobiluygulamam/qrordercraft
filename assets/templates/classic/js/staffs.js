jQuery(function ($) {

    $(document).on('click', '.qr-staff-view', function (e) {
        e.preventDefault();
        var id = $(this).data('memberid');

        $('#order-print-content').html($('.order-print-tpl-' + id).html());

        $.magnificPopup.open({
            items: {
                src: '#staff-view',
                type: 'inline',
                fixedContentPos: false,
                fixedBgPos: true,
                overflowY: 'auto',
                closeBtnInside: true,
                preloader: false,
                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-zoom-in'
            }
        });
    });


    /* print order */
    $(document).on('click', '.order-print-button', function () {
        var mywindow = window.open('', 'qr_print', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Print</title> <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta http-equiv="X-UA-Compatible" content="ie=edge">');
        mywindow.document.write('<link rel="stylesheet" href="' + assetsUrl + '/templates/' + template_name + '/css/style.css" type="text/css" />');
        mywindow.document.write('</head><body><div class="order-print">');
        mywindow.document.write($('.order-print').html());
        mywindow.document.write('</div></body></html>');

        mywindow.print();
        //mywindow.close();
        mywindow.document.close();
        //return true;
    });

    /* Hearbeat */
    function getOrders() {
        $.ajax({
            type: "GET",
            url: location.href,
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                let orders = response.orders;
                if(!jQuery.isEmptyObject( orders )) {
                    for (var i in orders) {
                        if (orders.hasOwnProperty(i)) {
                            let $row = $(orders[i]);
                            $row.addClass('row-highlight');
                            $('#qr-orders-table').find('#order-rows').prepend($row);
                        }
                    }

                    $('.no-order-found').remove();


                }
            }
        });
    }

    setInterval(getOrders, 10000);
});