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

    <link href="{{ asset('sense') }}/plugin/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />

    @stack('css')

    {{-- <link href="{{ asset('sense') }}/plugin/global/plugins.bundle.css" rel="stylesheet" type="text/css" /> --}}
    {{-- <link href="{{ asset('sense') }}/css/style.bundle.css" rel="stylesheet" type="text/css" /> --}}

    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css"
        integrity="sha512-9xKTRVabjVeZmc+GUW8GgSmcREDunMM+Dt/GrzchfN8tkwHizc5RP4Ok/MXFFy5rIjJjzhndFScTceq5e6GvVQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('sense') }}/css/sb-admin-2.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <style>
        .page-link:has(.previous) {
            background-image: url("{{ asset('sense/img/left.svg') }}");
            background-repeat: no-repeat;
            background-size: auto;
            background-position: center;
            height: 34px;
            widows: 50px;
            /* Styles for the .page-link element if it contains an <i> tag */
        }

        .page-link:has(.next) {
            background-image: url("{{ asset('sense/img/right.svg') }}");
            background-repeat: no-repeat;
            background-size: auto;
            background-position: center;
            height: 34px;
            widows: 50px;
            /* Styles for the .page-link element if it contains an <i> tag */
        }
    </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('layouts.navbar.sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                @include('layouts.navbar.navbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; RT 42 Balikpapan Selatan Sungai Nangka 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>


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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>

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
            $(`#${formId}_form`).submit(function(event) {
                event.preventDefault();
                const formData = new FormData($(`#${formId}_form`)[0]);
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
                        alert(data.status);

                        successCallback(data);
                    },
                    error: function(xhr, status, errorThrown) {
                        $(`#${formId}_submit`).removeAttr('disabled', 'disabled');
                        const data = JSON.parse(xhr.responseText);
                        alert(errorThrown, 'Opps!');

                        if (data.errors == null) {
                            alert(data.message + 'Opps!');
                            return;
                        }

                        if (Object.keys(data.errors).length >= 1) {
                            Object.keys(data.errors).forEach(keyError => {
                                const error = data.errors[keyError];

                                error.forEach(msg => {
                                    alert(msg, data.message);
                                });
                            });
                            return;
                        }
                    }
                });
            });

        }
    </script>
    @stack('js')
</body>

</html>
