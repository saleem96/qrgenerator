@extends('master')
@section('content')
<?php
session_start();
$_SESSION["user_id"] = auth()->user()->id;


?>
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
                               Qr-codes

                            </h3>

                        </div>

                    </div>
                    <a href="/qrcdr/"
                    {{-- class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle"> --}}
                     <button class="btn btn-primary float-xl-right" style="margin-top:15px;">CREATE QR-CODE</button>
                 </a>
                </div>


            </div>
        </div>
    </div>
    <div class="m-content">
        <div class="row">
        <div class="col-xl-12">

            <div class="m-portlet m-portlet--mobile">




                @foreach ($qr_detail as $detail)
                <div class="m-portlet__body clearfix col-xl-12" style="" >
                    <div>
                         <div style="" class="col-xl-6 float-left">
                        <div class="form-group m-form__group row">
                            <i class="flaticon-network"></i>
                            <div class="col-6">
                                {{--  <input class="form-control m-input" type="text" value="social link" id="example-text-input">  --}}
                                <h2> {{ $detail->section }}</h2>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <i class="flaticon-notes"></i>
                            <div class="col-md-10" width="30%" style="word-wrap: break-word">

                                <span> {{ $detail->data }}</span>
                            </div>
                        </div>



                        <div class="form-group m-form__group row">
                            <i class="flaticon-calendar"></i>
                            <div class="col-6">
                                @if($detail->created_at)

                                <span>{{ Carbon\Carbon::parse($detail->created_at)->format('Y-m-d') }}</span>
                                    @endif
                            </div>
                        </div>

                    </div>



                    <div style="" class="col-xl-3 float-left">
                        <div class="form-group m-form__group row">

                            <div class="col-6">

                                 <img width="150px" height="130px" class="" src="{{ asset('qrcdr/qrcodes/'.$detail->image) }}">
                            </div>
                        </div>


                    </div>

                    <div style="" class="col-xl-3 float-left">
                        <div class="form-group m-form__group row">
                            <div style="margin-top:85px;margin-left:55px">
                                <a href="download/{{$detail->image}}">
                                <button class="btn btn-primary " type="submit">
                                    Download
                                </button>
                            </a>

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
                                                        @if($detail->status==1)
                                                        <li class="m-nav__item">
                                                            <a href="pause/{{ $detail->id }}" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-danger"></i>
                                                                <span class="m-nav__link-text">
                                                                    Pause
                                                                </span>
                                                            </a>
                                                        </li>
                                                        @else
                                                        <li class="m-nav__item">
                                                            <a href="start/{{ $detail->id }}" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-danger"></i>
                                                                <span class="m-nav__link-text">
                                                                    start
                                                                </span>
                                                            </a>
                                                        </li>
                                                        @endif

                                                        <li class="m-nav__item">

                                                            <a href="delete/{{ $detail->id }}" class="m-nav__link">
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

                            </div>
                            </div>
                        </div>
                    </div>


                </div>
                <hr>
                @endforeach

                </div>

                </div>

            </div>

        </div>

         </div>

        </div>

    </div>


</div>




@endsection
