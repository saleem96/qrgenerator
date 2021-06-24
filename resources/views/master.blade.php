<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Version: 5.0.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" >
<!-- begin::Head -->
<head>
	<meta charset="utf-8" />
	<title>
		Qr generator | Dashboard
	</title>

	<meta name="description" content="Latest updates and statistic charts">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<!--begin::Web font -->

	<!--begin::Datepicker -->
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css" />
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="//use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

<!--End::Datepicker -->


	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
	</script>
	<!--end::Web font -->
	<!--begin::Base Styles -->
	<!--begin::Page Vendors -->
	<link href="/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Page Vendors -->
	<link href="/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
	<link href="/assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Base Styles -->
	<link rel="shortcut icon" href="assets/demo/default/media/img/logo/favicon.ico" />
</head>
<!-- end::Head -->
<!-- end::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
	<!-- BEGIN: Header -->
	@include('header')
	<!-- END: Header -->
	<!-- begin::Body -->
	<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
		<!-- BEGIN: Left Aside -->

		@include('sidebar')
		<!-- END: Left Aside -->



		@yield('content')

        {{--  @include('navbar')  --}}
	</div>
	<!-- end:: Body -->
	<!-- begin::Footer -->
	@include('footer')
</div>
<!-- end:: Page -->
<!-- begin::Quick Sidebar -->
<div id="m_quick_sidebar" class="m-quick-sidebar m-quick-sidebar--tabbed m-quick-sidebar--skin-light">
	<div class="m-quick-sidebar__content m--hide">
				<span id="m_quick_sidebar_close" class="m-quick-sidebar__close">
					<i class="la la-close"></i>
				</span>
		<ul id="m_quick_sidebar_tabs" class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">
			<li class="nav-item m-tabs__item">
				<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_quick_sidebar_tabs_messenger" role="tab">
					Messages
				</a>
			</li>
			<li class="nav-item m-tabs__item">
				<a class="nav-link m-tabs__link" 		data-toggle="tab" href="#m_quick_sidebar_tabs_settings" role="tab">
					Settings
				</a>
			</li>
			<li class="nav-item m-tabs__item">
				<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_quick_sidebar_tabs_logs" role="tab">
					Logs
				</a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active m-scrollable" id="m_quick_sidebar_tabs_messenger" role="tabpanel">
				<div class="m-messenger m-messenger--message-arrow m-messenger--skin-light">
					<div class="m-messenger__messages">
						<div class="m-messenger__message m-messenger__message--in">
							<div class="m-messenger__message-pic">
								<img src="assets/app/media/img//users/user3.jpg" alt=""/>
							</div>
							<div class="m-messenger__message-body">
								<div class="m-messenger__message-arrow"></div>
								<div class="m-messenger__message-content">
									<div class="m-messenger__message-username">
										Megan wrote
									</div>
									<div class="m-messenger__message-text">
										Hi Bob. What time will be the meeting ?
									</div>
								</div>
							</div>
						</div>
						<div class="m-messenger__message m-messenger__message--out">
							<div class="m-messenger__message-body">
								<div class="m-messenger__message-arrow"></div>
								<div class="m-messenger__message-content">
									<div class="m-messenger__message-text">
										Hi Megan. It's at 2.30PM
									</div>
								</div>
							</div>
						</div>
						<div class="m-messenger__message m-messenger__message--in">
							<div class="m-messenger__message-pic">
								<img src="assets/app/media/img//users/user3.jpg" alt=""/>
							</div>
							<div class="m-messenger__message-body">
								<div class="m-messenger__message-arrow"></div>
								<div class="m-messenger__message-content">
									<div class="m-messenger__message-username">
										Megan wrote
									</div>
									<div class="m-messenger__message-text">
										Will the development team be joining ?
									</div>
								</div>
							</div>
						</div>
						<div class="m-messenger__message m-messenger__message--out">
							<div class="m-messenger__message-body">
								<div class="m-messenger__message-arrow"></div>
								<div class="m-messenger__message-content">
									<div class="m-messenger__message-text">
										Yes sure. I invited them as well
									</div>
								</div>
							</div>
						</div>
						<div class="m-messenger__datetime">
							2:30PM
						</div>
						<div class="m-messenger__message m-messenger__message--in">
							<div class="m-messenger__message-pic">
								<img src="assets/app/media/img//users/user3.jpg"  alt=""/>
							</div>
							<div class="m-messenger__message-body">
								<div class="m-messenger__message-arrow"></div>
								<div class="m-messenger__message-content">
									<div class="m-messenger__message-username">
										Megan wrote
									</div>
									<div class="m-messenger__message-text">
										Noted. For the Coca-Cola Mobile App project as well ?
									</div>
								</div>
							</div>
						</div>
						<div class="m-messenger__message m-messenger__message--out">
							<div class="m-messenger__message-body">
								<div class="m-messenger__message-arrow"></div>
								<div class="m-messenger__message-content">
									<div class="m-messenger__message-text">
										Yes, sure.
									</div>
								</div>
							</div>
						</div>
						<div class="m-messenger__message m-messenger__message--out">
							<div class="m-messenger__message-body">
								<div class="m-messenger__message-arrow"></div>
								<div class="m-messenger__message-content">
									<div class="m-messenger__message-text">
										Please also prepare the quotation for the Loop CRM project as well.
									</div>
								</div>
							</div>
						</div>
						<div class="m-messenger__datetime">
							3:15PM
						</div>
						<div class="m-messenger__message m-messenger__message--in">
							<div class="m-messenger__message-no-pic m--bg-fill-danger">
										<span>
											M
										</span>
							</div>
							<div class="m-messenger__message-body">
								<div class="m-messenger__message-arrow"></div>
								<div class="m-messenger__message-content">
									<div class="m-messenger__message-username">
										Megan wrote
									</div>
									<div class="m-messenger__message-text">
										Noted. I will prepare it.
									</div>
								</div>
							</div>
						</div>
						<div class="m-messenger__message m-messenger__message--out">
							<div class="m-messenger__message-body">
								<div class="m-messenger__message-arrow"></div>
								<div class="m-messenger__message-content">
									<div class="m-messenger__message-text">
										Thanks Megan. I will see you later.
									</div>
								</div>
							</div>
						</div>
						<div class="m-messenger__message m-messenger__message--in">
							<div class="m-messenger__message-pic">
								<img src="assets/app/media/img//users/user3.jpg"  alt=""/>
							</div>
							<div class="m-messenger__message-body">
								<div class="m-messenger__message-arrow"></div>
								<div class="m-messenger__message-content">
									<div class="m-messenger__message-username">
										Megan wrote
									</div>
									<div class="m-messenger__message-text">
										Sure. See you in the meeting soon.
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="m-messenger__seperator"></div>
					<div class="m-messenger__form">
						<div class="m-messenger__form-controls">
							<input type="text" name="" placeholder="Type here..." class="m-messenger__form-input">
						</div>
						<div class="m-messenger__form-tools">
							<a href="" class="m-messenger__form-attachment">
								<i class="la la-paperclip"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane  m-scrollable" id="m_quick_sidebar_tabs_settings" role="tabpanel">
				<div class="m-list-settings">
					<div class="m-list-settings__group">
						<div class="m-list-settings__heading">
							General Settings
						</div>
						<div class="m-list-settings__item">
									<span class="m-list-settings__item-label">
										Email Notifications
									</span>
							<span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" checked="checked" name="">
												<span></span>
											</label>
										</span>
									</span>
						</div>
						<div class="m-list-settings__item">
									<span class="m-list-settings__item-label">
										Site Tracking
									</span>
							<span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
						</div>
						<div class="m-list-settings__item">
									<span class="m-list-settings__item-label">
										SMS Alerts
									</span>
							<span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
						</div>
						<div class="m-list-settings__item">
									<span class="m-list-settings__item-label">
										Backup Storage
									</span>
							<span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
						</div>
						<div class="m-list-settings__item">
									<span class="m-list-settings__item-label">
										Audit Logs
									</span>
							<span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" checked="checked" name="">
												<span></span>
											</label>
										</span>
									</span>
						</div>
					</div>
					<div class="m-list-settings__group">
						<div class="m-list-settings__heading">
							System Settings
						</div>
						<div class="m-list-settings__item">
									<span class="m-list-settings__item-label">
										System Logs
									</span>
							<span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
						</div>
						<div class="m-list-settings__item">
									<span class="m-list-settings__item-label">
										Error Reporting
									</span>
							<span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
						</div>
						<div class="m-list-settings__item">
									<span class="m-list-settings__item-label">
										Applications Logs
									</span>
							<span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
						</div>
						<div class="m-list-settings__item">
									<span class="m-list-settings__item-label">
										Backup Servers
									</span>
							<span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" checked="checked" name="">
												<span></span>
											</label>
										</span>
									</span>
						</div>
						<div class="m-list-settings__item">
									<span class="m-list-settings__item-label">
										Audit Logs
									</span>
							<span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane  m-scrollable" id="m_quick_sidebar_tabs_logs" role="tabpanel">
				<div class="m-list-timeline">
					<div class="m-list-timeline__group">
						<div class="m-list-timeline__heading">
							System Logs
						</div>
						<div class="m-list-timeline__items">
							<div class="m-list-timeline__item">
								<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
								<a href="" class="m-list-timeline__text">
									12 new users registered
									<span class="m-badge m-badge--warning m-badge--wide">
												important
											</span>
								</a>
								<span class="m-list-timeline__time">
											Just now
										</span>
							</div>
							<div class="m-list-timeline__item">
								<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
								<a href="" class="m-list-timeline__text">
									System shutdown
								</a>
								<span class="m-list-timeline__time">
											11 mins
										</span>
							</div>
							<div class="m-list-timeline__item">
								<span class="m-list-timeline__badge m-list-timeline__badge--state-danger"></span>
								<a href="" class="m-list-timeline__text">
									New invoice received
								</a>
								<span class="m-list-timeline__time">
											20 mins
										</span>
							</div>
							<div class="m-list-timeline__item">
								<span class="m-list-timeline__badge m-list-timeline__badge--state-warning"></span>
								<a href="" class="m-list-timeline__text">
									Database overloaded 89%
									<span class="m-badge m-badge--success m-badge--wide">
												resolved
											</span>
								</a>
								<span class="m-list-timeline__time">
											1 hr
										</span>
							</div>
							<div class="m-list-timeline__item">
								<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
								<a href="" class="m-list-timeline__text">
									System error
								</a>
								<span class="m-list-timeline__time">
											2 hrs
										</span>
							</div>
							<div class="m-list-timeline__item">
								<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
								<a href="" class="m-list-timeline__text">
									Production server down
									<span class="m-badge m-badge--danger m-badge--wide">
												pending
											</span>
								</a>
								<span class="m-list-timeline__time">
											3 hrs
										</span>
							</div>
							<div class="m-list-timeline__item">
								<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
								<a href="" class="m-list-timeline__text">
									Production server up
								</a>
								<span class="m-list-timeline__time">
											5 hrs
										</span>
							</div>
						</div>
					</div>
					<div class="m-list-timeline__group">
						<div class="m-list-timeline__heading">
							Applications Logs
						</div>
						<div class="m-list-timeline__items">
							<div class="m-list-timeline__item">
								<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
								<a href="" class="m-list-timeline__text">
									New order received
									<span class="m-badge m-badge--info m-badge--wide">
												urgent
											</span>
								</a>
								<span class="m-list-timeline__time">
											7 hrs
										</span>
							</div>
							<div class="m-list-timeline__item">
								<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
								<a href="" class="m-list-timeline__text">
									12 new users registered
								</a>
								<span class="m-list-timeline__time">
											Just now
										</span>
							</div>
							<div class="m-list-timeline__item">
								<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
								<a href="" class="m-list-timeline__text">
									System shutdown
								</a>
								<span class="m-list-timeline__time">
											11 mins
										</span>
							</div>
							<div class="m-list-timeline__item">
								<span class="m-list-timeline__badge m-list-timeline__badge--state-danger"></span>
								<a href="" class="m-list-timeline__text">
									New invoices received
								</a>
								<span class="m-list-timeline__time">
											20 mins
										</span>
							</div>
							<div class="m-list-timeline__item">
								<span class="m-list-timeline__badge m-list-timeline__badge--state-warning"></span>
								<a href="" class="m-list-timeline__text">
									Database overloaded 89%
								</a>
								<span class="m-list-timeline__time">
											1 hr
										</span>
							</div>
							<div class="m-list-timeline__item">
								<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
								<a href="" class="m-list-timeline__text">
									System error
									<span class="m-badge m-badge--info m-badge--wide">
												pending
											</span>
								</a>
								<span class="m-list-timeline__time">
											2 hrs
										</span>
							</div>
							<div class="m-list-timeline__item">
								<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
								<a href="" class="m-list-timeline__text">
									Production server down
								</a>
								<span class="m-list-timeline__time">
											3 hrs
										</span>
							</div>
						</div>
					</div>
					<div class="m-list-timeline__group">
						<div class="m-list-timeline__heading">
							Server Logs
						</div>
						<div class="m-list-timeline__items">
							<div class="m-list-timeline__item">
								<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
								<a href="" class="m-list-timeline__text">
									Production server up
								</a>
								<span class="m-list-timeline__time">
											5 hrs
										</span>
							</div>
							<div class="m-list-timeline__item">
								<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
								<a href="" class="m-list-timeline__text">
									New order received
								</a>
								<span class="m-list-timeline__time">
											7 hrs
										</span>
							</div>
							<div class="m-list-timeline__item">
								<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
								<a href="" class="m-list-timeline__text">
									12 new users registered
								</a>
								<span class="m-list-timeline__time">
											Just now
										</span>
							</div>
							<div class="m-list-timeline__item">
								<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
								<a href="" class="m-list-timeline__text">
									System shutdown
								</a>
								<span class="m-list-timeline__time">
											11 mins
										</span>
							</div>
							<div class="m-list-timeline__item">
								<span class="m-list-timeline__badge m-list-timeline__badge--state-danger"></span>
								<a href="" class="m-list-timeline__text">
									New invoice received
								</a>
								<span class="m-list-timeline__time">
											20 mins
										</span>
							</div>
							<div class="m-list-timeline__item">
								<span class="m-list-timeline__badge m-list-timeline__badge--state-warning"></span>
								<a href="" class="m-list-timeline__text">
									Database overloaded 89%
								</a>
								<span class="m-list-timeline__time">
											1 hr
										</span>
							</div>
							<div class="m-list-timeline__item">
								<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
								<a href="" class="m-list-timeline__text">
									System error
								</a>
								<span class="m-list-timeline__time">
											2 hrs
										</span>
							</div>
							<div class="m-list-timeline__item">
								<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
								<a href="" class="m-list-timeline__text">
									Production server down
								</a>
								<span class="m-list-timeline__time">
											3 hrs
										</span>
							</div>
							<div class="m-list-timeline__item">
								<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
								<a href="" class="m-list-timeline__text">
									Production server up
								</a>
								<span class="m-list-timeline__time">
											5 hrs
										</span>
							</div>
							<div class="m-list-timeline__item">
								<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
								<a href="" class="m-list-timeline__text">
									New order received
								</a>
								<span class="m-list-timeline__time">
											1117 hrs
										</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- end::Quick Sidebar -->
<!-- begin::Scroll Top -->
<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
	<i class="la la-arrow-up"></i>
</div>
<!-- end::Scroll Top -->		    <!-- begin::Quick Nav -->
{{--<ul class="m-nav-sticky" style="margin-top: 30px;">--}}
	<!--
			<li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Showcase" data-placement="left">
				<a href="">
					<i class="la la-eye"></i>
				</a>
			</li>
			<li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Pre-sale Chat" data-placement="left">
				<a href="" >
					<i class="la la-comments-o"></i>
				</a>
			</li>
			-->
	{{--<li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Purchase" data-placement="left">--}}
		{{--<a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" target="_blank">--}}
			{{--<i class="la la-cart-arrow-down"></i>--}}
		{{--</a>--}}
	{{--</li>--}}
	{{--<li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Documentation" data-placement="left">--}}
		{{--<a href="http://keenthemes.com/metronic/documentation.html" target="_blank">--}}
			{{--<i class="la la-code-fork"></i>--}}
		{{--</a>--}}
	{{--</li>--}}
	{{--<li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Support" data-placement="left">--}}
		{{--<a href="http://keenthemes.com/forums/forum/support/metronic5/" target="_blank">--}}
			{{--<i class="la la-life-ring"></i>--}}
		{{--</a>--}}
	{{--</li>--}}
{{--</ul>--}}
<!-- begin::Quick Nav -->
<!--begin::Base Scripts -->
<script src="/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="/assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
<script src="/assets/demo/default/custom/components/forms/widgets/bootstrap-datetimepicker.js" type="text/javascript"></script>
<!--end::Base Scripts -->
<!--begin::Page Vendors -->
<script src="/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
<!--end::Page Vendors -->
<!--begin::Page Snippets -->
<script src="/assets/app/js/dashboard.js" type="text/javascript"></script>
<script src="/assets/demo/default/custom/components/forms/widgets/bootstrap-daterangepicker.js" type="text/javascript"></script>
<!--end::Page Snippets -->
@yield('script')

</body>
<!-- end::Body -->
</html>
