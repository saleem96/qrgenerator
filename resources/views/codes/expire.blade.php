@extends('master')
@section('content')
<div class="container">
<div class="m-content">
    <div class="row">

        <div class="col-xl-12">
            <!--begin::Portlet-->
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Expired Qr-codes
                            </h3>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="m-content">
        <div class="row">
        <div class="col-xl-12">

            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Social
                                <small>
                                    qr-code-details
                                </small>
                            </h3>
                        </div>
                    </div>
                    <a href="/"
                    {{-- class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle"> --}}
                     <button class="btn btn-primary float-xl-right" style="margin-top:15px;">CREATE QR-CODE</button>
                 </a>
                </div>
                <div class="m-portlet__body clearfix col-xl-12">
                    <div class="form-group m-form__group row">
                        {{--  <label for="example-text-input" class="col-2 col-form-label">
                            Text
                        </label>  --}}
                        <i class="flaticon-network"></i>
                        <div class="col-6">
                            <input class="form-control m-input" type="text" value="social link" id="example-text-input">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        {{--  <label for="example-text-input" class="col-2 col-form-label">
                            Text
                        </label>  --}}
                        <i class="flaticon-infinity"></i>
                        <div class="col-3">
                            <input class="form-control m-input" type="text" value="short url link" id="example-text-input">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                    <i class="flaticon-calendar"></i>
                    <div class="col-md-11">

                        Mar 28, 2021
                    </div>
                    <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
                        <a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                            <i class="la la-plus m--hide"></i>
                            <i class="la la-ellipsis-h"></i>
                        </a>
                        <div class="m-dropdown__wrapper">
                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="left: auto; right: 21.5px;"></span>
                            <div class="m-dropdown__inner">
                                <div class="m-dropdown__body">
                                    <div class="m-dropdown__content">
                                        <ul class="m-nav">
                                            <li class="m-nav__section m-nav__section--first m--hide">
                                                <span class="m-nav__section-text">
                                                    Quick Actions
                                                </span>
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-danger"></i>
                                                    <span class="m-nav__link-text">
                                                        Pause
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-close"></i>
                                                    <span class="m-nav__link-text">
                                                        Delete
                                                    </span>
                                                </a>
                                            </li>


                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12" style="margin:9px;">
                        <button class="btn btn-primary float-right"
                                type="submit">
                             Download
                        </button>
                    </div>


                </div>


                </div>
            </div>
        </div>
         </div>
        </div>
    </div>


</div>




@endsection
