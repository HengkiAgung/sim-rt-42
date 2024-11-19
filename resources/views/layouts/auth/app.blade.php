<!DOCTYPE html>
<html lang="en">

<head>
    <base href="../" />
    <title>@yield('title-apps', 'SIM RT 42') | SIM RT 42</title>
    <meta charset="utf-8" />
    <meta name="description" content="SIM RT 42 DESC" />
    <meta name="keywords" content="SIM RT 42" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="SIM RT 42 by ODS" />
    <meta property="og:site_name" content="SIM RT 42" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" />

    <link href="{{ asset('sense') }}/plugin/datatables/datatables.bundle.css" rel="stylesheet"
        type="text/css" />

    @stack('css')

    {{-- <link href="{{ asset('sense') }}/plugin/global/plugins.bundle.css" rel="stylesheet" type="text/css" /> --}}
    {{-- <link href="{{ asset('sense') }}/css/style.bundle.css" rel="stylesheet" type="text/css" /> --}}

    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


    <link href="{{ asset('sense') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('sense') }}/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    @yield('content')

    {{-- <div id="kt_scrolltop" class="scrolltop bg-info" data-kt-scrolltop="true">
    <i class="fa-solid fa-arrow-up text-white"></i>
</div> --}}

    {{-- <script src="{{ asset('sense') }}/plugin/global/plugins.bundle.js"></script> --}}

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('sense') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('sense') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('sense') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('sense') }}/js/sb-admin-2.min.js"></script>

    <script src="{{ asset('sense') }}/plugin/datatables/datatables.bundle.js"></script>

    <script>
        function generateDatatable({
            tableName,
            ajaxLink,
            columnData = [],
            elementName,
            functionCallback = () => {},
            filters = null
        }) {
            window[tableName] = $(elementName)
                .DataTable({
                    processing: true,
                    serverSide: true,
                    retrieve: true,
                    deferRender: true,
                    responsive: false,
                    aaSorting: [],
                    drawCallback: functionCallback,
                    ajax: {
                        url: ajaxLink,
                        data: function(data) {
                            data.filters = filters
                        },
                    },
                    language: {
                        "lengthMenu": "Show _MENU_",
                        "emptyTable": "Tidak ada data terbaru 📁",
                        "zeroRecords": "Data tidak ditemukan 😞",
                    },
                    dom: "<'row mb-2'" +
                        "<'col-12 col-lg-6 d-flex align-items-center justify-content-start'l>" +
                        "<'col-12 col-lg-6 d-flex align-items-center justify-content-lg-end justify-content-start 'f>" +
                        ">" +

                        "<'table-responsive'tr>" +

                        "<'row'" +
                        "<'col-12 col-lg-5 d-flex align-items-center justify-content-center justify-content-lg-start'i>" +
                        "<'col-12 col-lg-7 d-flex align-items-center justify-content-center justify-content-lg-end'p>" +
                        ">",

                    columns: columnData,
                    columnDefs: [{
                            targets: 0,
                            className: 'text-center',
                        },
                        {
                            targets: -1,
                            orderable: false,
                            searchable: false,
                            className: 'text-center',
                        },
                    ],
                });
        }

        function submitForm({
            formId,
            ajaxLink,
            validationMessages = {},
            successCallback = () => {},
            failCallback = () => {}
        }) {
            $(`#${formId}_form`).validate({
                messages: validationMessages,
                submitHandler: function(form) {
                    const formData = new FormData(form);
                    $(`#${formId}_submit`).attr('disabled', 'disabled');
                    $.ajax({
                        data: formData,
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        url: ajaxLink,
                        type: "POST",
                        success: function(data) {
                            $(`#${formId}_cancel`).click();
                            toastr.success(data.status, 'Selamat 🚀 !');

                            successCallback(data);
                        },
                        error: function(xhr, status, errorThrown) {
                            $(`#${formId}_submit`).removeAttr('disabled', 'disabled');
                            const data = JSON.parse(xhr.responseText);
                            toastr.error(errorThrown, 'Opps!');

                            if (data.errors == null) {
                                toastr.error(data.message, 'Opps!');
                                return;
                            }

                            if (Object.keys(data.errors).length >= 1) {
                                Object.keys(data.errors).forEach(keyError => {
                                    const error = data.errors[keyError];

                                    error.forEach(msg => {
                                        toastr.error(msg, data.message);
                                    });
                                });
                                return;
                            }
                        }
                    });
                }
            });
        }

    </script>
    @stack('js')
</body>

</html>
