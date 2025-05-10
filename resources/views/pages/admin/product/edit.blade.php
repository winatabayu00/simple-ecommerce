@extends('layouts.app')

@section('page-content')
    <div id="kt_app_content" class="app-content  flex-column-fluid ">
        <div id="kt_app_content_container" class="app-container  container-fluid ">
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <div class="d-flex flex-column flex-column-fluid">
                    <form action="#" id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('pages.admin.product._input')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
