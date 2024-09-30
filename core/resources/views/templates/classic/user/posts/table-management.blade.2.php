@extends($activeTheme.'layouts.app')
@section('title', ___('my_tables'))

{{-- CSS ve JS kütüphaneleri --}}
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.js"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script crossorigin src="https://unpkg.com/react@17/umd/react.development.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@17/umd/react-dom.development.js"></script>
<script src="https://unpkg.com/@babel/standalone/babel.min.js" data-presets="env,react"></script>

<script>
    tailwind.config = {
        prefix: "tw-",
        corePlugins: {
            preflight: false,
        }
    };
</script>

@section('header_buttons')
<div class="dashboard-box">
@if(!empty($menu_languages))
    <div class="btn-group bootstrap-select user-lang-switcher">
        <button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown"
                title="{{$default_menu_language->name}}">
            <span class="filter-option pull-left" id="user-lang">{{ strtoupper($default_menu_language->code)}}</span>&nbsp;
            <span class="caret"></span>
        </button>
        <div class="dropdown-menu scrollable-menu open">
            <ul class="dropdown-menu inner">
                @foreach($menu_languages as $lang)
                    <li data-code="{{$lang->code}}">
                        <a role="menuitem" tabindex="-1" rel="alternate"
                           href="#">{{$lang->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
</div>
@endsection

@section('content')
<div id="table-management-root"></div>

<div id="table-detail-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">
    <!--Tabs -->
    <div class="sign-in-form">
        <div class="popup-tabs-container">
            <!-- Tab -->
            <div class="popup-tab-content">
                <div id="table-details"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts_vendor')
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script src="{{ asset('assets/global/js/jquery.ui.touch-punch.min.js') }}"></script>
<script src="{{ asset($activeThemeAssets.'js/qr_script.js?ver='.config('appinfo.version')) }}"></script>
<script src="{{ asset('assets/global/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset($activeThemeAssets.'js/jquery-qrcode.min.js') }}"></script>

<script type="text/babel">
    // React ve Pusher ile Tablo Yönetimi
    const { useState, useEffect } = React;

    function StatusText(props) {
        var status = props.status;
        var text = '';
        var colorClass = '';

        switch (status) {
            case 'ready':
                text = 'Masa Hazır';
                colorClass = 'tw-text-green-500';
                break;
            case 'waiting':
                text = 'Sipariş Bekleniyor';
                colorClass = 'tw-text-yellow-500';
                break;
            case 'full':
                text = 'Masa Dolu';
                colorClass = 'tw-text-red-500';
                break;
            default:
                text = 'Masa Hazır';
                colorClass = 'tw-text-green-500';
                break;
        }

        return React.createElement(
            'p',
            { className: 'status-text ' + colorClass },
            text
        );
    }

    function TableHeader(props) {
        var status = props.status;
        var colorClass = '';

        switch (status) {
            case 'ready':
                colorClass = 'tw-bg-green-200';
                break;
            case 'waiting':
                colorClass = 'tw-bg-yellow-200';
                break;
            case 'full':
                colorClass = 'tw-bg-red-200';
                break;
            default:
            colorClass = 'tw-bg-green-200';
                break;
        }

        return React.createElement(
            'div',
            { className: 'tw-p-2 tw-flex tw-justify-between tw-items-center ' + colorClass },
            React.createElement(
                'span',
                { className: 'tw-font-bold tw-text-lg ' + getTextColor(status) },
                'Masa ' + props.tableId
            )
        );
    }

    function getTextColor(status) {
        switch (status) {
            case 'ready':
                return 'tw-text-green-800';
            case 'waiting':
                return 'tw-text-yellow-800';
            case 'full':
                return 'tw-text-red-800';
            default:
                                return 'tw-text-green-800';

        }
    }

    function TableContent(props) {
        return React.createElement(
            'div',
            { className: 'tw-p-6 tw-flex justify-between' },
            React.createElement(
                'div',
                { className: 'tw-flex-grow' },
                React.createElement(StatusText, { status: props.status })
            )
        );
    }

    function TableContainer(props) {
        var status = props.status;
        var bgColorClass = '';

        switch (status) {
            case 'ready':
                bgColorClass = 'tw-bg-green-100';
                break;
            case 'waiting':
                bgColorClass = 'tw-bg-yellow-100';
                break;
            case 'full':
                bgColorClass = 'tw-bg-red-100';
                break;
            default:
                bgColorClass = 'tw-bg-green-100';
                break;
        }

        const handleTableClick = () => {
            const tableId = props.table.id;
            const restoid = props.table.restoid;
            localStorage.setItem('tableid', JSON.stringify(tableId));
            localStorage.setItem('restoid', JSON.stringify(restoid));
            var url = `{{ route("gettabledetail", ["restaurant" => "__RESTOID__", "tableId" => "__TABLEID__"]) }}`;
            url = url.replace('__RESTOID__', restoid).replace('__TABLEID__', tableId);

            $.ajax({
                url: url,
                method: 'GET',
                success: function(data) {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        var postDetail = data.postDetail;
                        var table = data.table;
                        var orders = data.orders;

                        var details = `<div class="tw-h-10">   <button id="download-button" type="button" class="tw-bg-blue-500 tw-text-white tw-px-4 tw-py-2 tw-rounded">
        QR Kartını İndir
    </button></div>
                            <div class="tw-relative"> 
                              
                            <div class=" tw-w-40 tw-left-0"> <div id="qr-cards" class="tw-place-content-center  tw-bg-white tw-shadow-md tw-rounded-lg tw-p-4 tw-max-w-40 tw-mb-4 tw-text-center">
                                <!-- İşletme logosu -->
                                <div class="tw-mb-4">
                                    ${postDetail.resImageUrl}
                                </div>
                                <!-- QR Kod Alanı -->
                                <div class="tw-mb-4 tw-flex tw-justify-center">
                                    <div id="qr-wrapper" class="tw-max-w-40" data-url="${table.url}"></div>
                                </div>
                                <!-- Masa Numarası -->
                                <div class="tw-font-extrabold tw-text-xl tw-mb-2">Masa ${table.table_id}</div>
                                <div class=" tw-mb-2">Menüye ulaşmak için tarayın</div>

                            </div> </div>
          
          <div class="tw-flex tw-justify-center tw-space-x-6 tw-items-center" id="tableorderContainer">
 
    <button id="update-table-status" type="button" class="tw-bg-green-500 tw-text-white tw-px-4 tw-py-2 tw-rounded">
        Güncelle
    </button>
    <button id="add-order-button" class="tw-bg-amber-500 tw-text-white tw-px-4 tw-py-2 tw-rounded" data-url="${table.table_id}">
        Sipariş Ekle
    </button>
</div>
                            <select id="table-status-dropdown" class="form-control">
                                <option value="ready">{{__('Ready')}}</option>
                                <option value="waiting">{{__('Waiting')}}</option>
                                <option value="full">Full</option>
                            </select>
                           `;
                        
                        details += `
                            <div class="tw-bg-white tw-shadow-md tw-rounded-lg tw-p-4 ">
                                <h3 class="tw-text-lg tw-font-bold tw-mb-2">Siparişler</h3>
                                <ul class="tw-list-disc tw-pl-5">`;

                        if (data.order && data.order.items) {
                            data.order.items.forEach(function(item) {
                                var totalPrice = formatPrice(item.quantity * item.product_price);
                                details += `
                                    <li class="tw-mb-2">
                                        <div class="tw-font-semibold">Ürün: ${item.product_name}</div>
                                        <div class="tw-text-sm">
                                            Fiyatı: ${item.product_price}₺, 
                                            Miktar: ${item.quantity} x = ${totalPrice}
                                        </div>
                                    </li>
                                    <hr class="tw-my-2"/>`;
                            });
                            details += `</ul>`;
                        } else {
                            details += `<li>Bu masa için sipariş bulunmamaktadır.</li></ul>`;
                        }
                        let baseRoute = "{{ route('publicView', $post->slug) }}";
                        let tableUrl = table.qr_text;

// Dinamik URL oluşturma
let fullUrl = baseRoute + '?qr-id=' + tableUrl;
                        $('#table-details').html(details); 
                     
                    
                        $('#qr-wrapper').qrcode({
                            typeNumber: 10,
                            text: fullUrl,
                            render: 'image',
                            fontname: 'Nunito',
                            size: 100,
                            ecLevel: 'H',
                            minVersion: 3,
                        });

                        $('#download-button').on('click', function () {
                            html2canvas(document.getElementById("qr-cards"), {backgroundColor:null}).then(function(canvas) {
                                var imgData = canvas.toDataURL("image/png");
                                var link = document.createElement('a');
                                link.href = imgData;
                                link.download = 'QR_Kartı.jpg';
                                link.click();
                            });
                        });

                
                        
                        $(document).on('click', '#add-order-button', function(e) {
                         e.preventDefault();
                         var postid = JSON.parse(localStorage.getItem('restoid'));
                         var tableId = JSON.parse(localStorage.getItem('tableid'));
                         var url = "{{ route('orders.addOrder', ['restaurant' => ':restaurantId', 'tableId' => ':tableId']) }}";
                         url = url.replace(':restaurantId', postid).replace(':tableId', tableId); // Parametreleri değiştiriyoruz


window.location.href = url; 

                        });
                    }

                    $(document).off('click','#update-table-status').on('click', '#update-table-status', function(e) {
        e.preventDefault();
        
        var status = $('#table-status-dropdown').val();
   

        const restoid = JSON.parse(localStorage.getItem('restoid'));
        const tableid = JSON.parse(localStorage.getItem('tableid'));
    
 
        
        if (!tableId || !restoid) {
            alert("Masa veya Restoran ID'si bulunamadı.");
            return;
        }
        
        var url = "{{ route('table.update', ['tableId' => ':tableId', 'status' => ':status']) }}";
        url = url.replace(':tableId', parseInt(tableId)).replace(':status', status);

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                status: status,
                tableId: tableId,
                restoid: restoid
            },
            success: function(response) {
                if (response.success) {
                   


                    $.magnificPopup.close();

                } else {
                    alert('Failed to update table status');
                }
            },
            error: function(xhr) {
                console.log('Error:', xhr);
                alert('An error occurred while updating the table status.');
            }
        });
    });


function updateTableStatus(tableId, newStatus) {
    console.log(tableId, newStatus);
    var tableElement = document.querySelector('[data-table-id="' + tableId + '"]');
    if (tableElement) {
        tableElement.setAttribute('data-status', newStatus);
        var statusText = tableElement.querySelector('.status-text');
        if (statusText) {
            statusText.textContent = getStatusText(newStatus);
        }
    }
}


                    // Buraya at bakalım
                },
                error: function(xhr) {
                    alert('Bir hata oluştu: ' + xhr.responseText); 
                }
            });

            $.magnificPopup.open({
                items: {
                    src: '#table-detail-dialog',
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

            $('#table-id').val(tableId);
        };

        return React.createElement(
            'div',
            { className: 'tw-p-2 ' + bgColorClass, id:"table-container", "data-table-id":props.table.table_id, "data-post-id":props.table.restoid},
            React.createElement(
                'div',
                { className: 'tw-shadow-lg tw-rounded-lg tw-overflow-hidden', onClick: handleTableClick },
                React.createElement(TableHeader, { tableId: props.table.table_id, status: status }),
                React.createElement(TableContent, { status: status })
            )
        );
    }

    function TableRow(props) {
        return React.createElement(
            'div',
            { className: 'tw-grid tw-grid-cols-2 md:tw-grid-cols-4 lg:tw-grid-cols-5 tw-gap-3' },
            props.tables.map(function (table) {
                return React.createElement(TableContainer, { key: table.id, table: table, status: table.status });
            })
        );
    }

    function Tables() {
        const [tables, setTables] = useState(@json($tables));
        const [pusherConfig] = useState({
            key: 'efa75e80aaf604f9e648',
            cluster: 'us3'
        });

        useEffect(function () {
            if (!pusherConfig) return;

            var pusher = new Pusher(pusherConfig.key, {
                cluster: pusherConfig.cluster
            });

            var channel = pusher.subscribe('update_table');
            channel.bind('UpdateTableTrackingEvent', function (data) {
                setTables(function (prevTables) {
                    return prevTables.map(function (table) {
                        return table.id === data.id ? Object.assign({}, table, { status: data.status }) : table;
                    });
                });
            });

            return function () {
                channel.unbind_all();
                channel.unsubscribe();
            };
        }, [pusherConfig]);

        if (!pusherConfig) {
            return React.createElement('div', null, 'Loading...');
        }

        return React.createElement(
            'div',
            { className: 'tw-container tw-mx-auto' },
            React.createElement(TableRow, { tables: tables })
        );
    }

    ReactDOM.render(
        React.createElement(Tables, null),
        document.getElementById('table-management-root')
    );
</script>

<script>

   
   

    function formatPrice(price) {
        let formattedPrice = price.toFixed(2);
        formattedPrice = formattedPrice.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        return formattedPrice + " ₺";
    }
</script>
@endpush