
    // Pusher configuration and React component setup

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
                text = 'Durum Bilinmiyor';
                colorClass = 'tw-text-gray-500';
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
                colorClass = 'tw-bg-gray-200';
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
                return 'tw-text-gray-800';
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
                bgColorClass = 'tw-bg-gray-100';
                break;
        }
        const handleTableClick = () => {
            // Masa ID'sini alın
            const tableId = props.table.id;
    
            // Masa ID'ye göre sipariş verilerini almak için AJAX GET isteği
            $.get('/get-orders/' + tableId, function() {
                // Verileri popup içinde gösterin
        
            });
            $.magnificPopup.open({
                items: {
                    src: '#table-popup-form',
                    type: 'inline'
                },
                closeBtnInside: true
            });
    
            // Popup içindeki gizli input'a masa ID'sini koyun
            $('#table-id').val(tableId);
        };
    
        return React.createElement(
            'div',
            { className: 'tw-p-2 ' + bgColorClass },
            React.createElement(
                'div',
                { className: 'tw-shadow-lg tw-rounded-lg tw-overflow-hidden', onClick: handleTableClick },
                React.createElement(TableHeader, { tableId: props.table.id, status: status }),
                React.createElement(TableContent, { status: status })
            )
        );
    }
    
    function TableRow(props) {
        return React.createElement(
            'div',
            { className: 'tw-grid tw-grid-cols-1 md:tw-grid-cols-2 lg:tw-grid-cols-3 tw-gap-6' },
            props.tables.map(function (table) {
                return React.createElement(TableContainer, { key: table.id, table: table, status: table.status });
            })
        );
    }
    
    function Tables() {
        const [, setTables] = useState(json(tablesData));
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
    
        return (
          <div className="tw-container tw-mx-auto">
              <TableRow tables={tablesData} />
          </div>
      );
    }
    

    
