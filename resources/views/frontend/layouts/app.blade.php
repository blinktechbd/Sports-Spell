<!DOCTYPE html>
<html lang="bn">
@push('appendCss')
    <style>
        input.form-control-danger:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
        }
        textarea.form-control-danger:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
        }

        .modal-header .btn-close {
            font-size: 12px !important;
            filter: invert(29%) sepia(83%) saturate(4776%) hue-rotate(353deg) brightness(94%) contrast(112%);
        }
        .btn-close-white {

            filter: brightness(0) invert(1);
        }
        #scrollTopBtn {
            display: none;
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 999;
            width: 40px;
            height: 40px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 50%;
            font-size: 24px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease;
        }

        #scrollTopBtn:hover {
            background-color: #dc3545;
        }
    </style>
@endpush

<head>
    @include('frontend.layouts.head')
</head>

<body>
    <div class="container-fluid bg-danger sticky-header">
        <div class="container">
            @include('frontend.layouts.header')
        </div>
    </div>

    <div class="wrapper">
        @yield('content')
    </div>

    <div class="container-fluid footer">
        @include('frontend.layouts.footer')
    </div>
    @include('frontend.layouts.scripts')

    <!-- Search Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('contentSearch') }}" method="get">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="searchModalLabel">Search</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="search" class="form-control form-control-danger"
                            placeholder="Type title to search..." required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-danger">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <button onclick="scrollToTop()" id="scrollTopBtn" title="Go to top" class="d-flex justify-content-center align-items-center"><i class="fa fa-arrow-up"></i></button>
</body>

</html>
