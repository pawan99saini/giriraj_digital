@extends('layouts.app')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Toolbar-->
						<div class="toolbar" id="kt_toolbar">
							<!--begin::Container-->
							<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
								<!--begin::Page title-->
								<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
									<!--begin::Title-->
									<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">View Event Details</h1>
									<!--end::Title-->
									<!--begin::Separator-->
									<span class="h-20px border-gray-200 border-start mx-4"></span>
									<!--end::Separator-->
									<!--begin::Breadcrumb-->
									<!--end::Breadcrumb-->
								</div>
								<!--end::Page title-->
								
							</div>
							<!--end::Container-->
						</div>
						<!--end::Toolbar-->
						<!--begin::Post-->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
								<!--begin::Layout-->
								<div class="d-flex flex-column flex-xl-row">
									
									<!--begin::Content-->
									<div class="flex-lg-row-fluid ms-lg-15">
										<!--begin:::Tabs-->
										<ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
											
											
											<!--begin:::Tab item-->
											<li class="nav-item">
												<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_user_view_overview_events_and_logs_tab">Events Details</a>
											</li>
											<!--end:::Tab item-->
																					</ul>
										<!--end:::Tabs-->
										<!--begin:::Tab content-->
										<div class="tab-content" id="myTabContent">
											
											<!--begin:::Tab pane-->
											<div class="tab-pane fade show active" id="kt_user_view_overview_events_and_logs_tab" role="tabpanel">
												
												<!--begin::Card-->
												<div class="card pt-4 mb-6 mb-xl-9">
													<!--begin::Card header-->
													<div class="card-header border-0">
														<!--begin::Card title-->
														<div class="card-title">
															<h2>Events</h2>
														</div>
														<!--end::Card title-->
														
													</div>
													<!--end::Card header-->
													<!--begin::Card body-->
													<div class="card-body py-0">
														<!--begin::Table-->
														<table class="table align-middle table-row-dashed fs-6 text-gray-600 fw-bold gy-5" id="kt_table_customers_events">
															<!--begin::Table body-->
															<tbody>
																<!--begin::Table row-->
																<tr>
																	<!--begin::Event=-->
																	<td class="min-w-400px">Event Name</td>
																	<td class="pe-0 text-gray-600 text-end min-w-200px">{{$result->name}}</td>
																	<!--end::Timestamp=-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Event=-->
																	<td class="min-w-400px">Description</td>
																	<!--begin::Timestamp=-->
																	<td class="pe-0 text-gray-600 text-end min-w-200px">{{$result->description}}</td>
																	<!--end::Timestamp=-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Event=-->
																	<td class="min-w-400px">Start Date</td>
																	<!--end::Event=-->
																	<!--begin::Timestamp=-->
																	<td class="pe-0 text-gray-600 text-end min-w-200px">{{$result->start_date}}</td>
																	<!--end::Timestamp=-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Event=-->
																	<td class="min-w-400px">End Date</td>
																	<!--end::Event=-->
																	<!--begin::Timestamp=-->
																	<td class="pe-0 text-gray-600 text-end min-w-200px">{{$result->end_date}}</td>
																	<!--end::Timestamp=-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Event=-->
																	<td class="min-w-400px">Recurrence Type</td><!--end::Event=-->
																	<!--begin::Timestamp=-->
																	<td class="pe-0 text-gray-600 text-end min-w-200px">{{$result->recurrence_type}}</td>
																	<!--end::Timestamp=-->
																</tr>
																
															</tbody>
															<!--end::Table body-->
														</table>
														<!--end::Table-->
													</div>
													<!--end::Card body-->
												</div>
                                                <div class="card pt-4 mb-6 mb-xl-9">
													<!--begin::Card header-->
													<div class="card-header border-0">
														<!--begin::Card title-->
														<div class="card-title">
															<h2>Upcoming Event</h2>
														</div>
														<!--end::Card title-->
														
													</div>
													<!--end::Card header-->
													<!--begin::Card body-->
													<div class="card-body py-0">
														<!--begin::Table wrapper-->
														<div class="table-responsive">
															<!--begin::Table-->
															<table class="table align-middle table-row-dashed fw-bold text-gray-600 fs-6 gy-5" id="kt_table_users_logs">
																<!--begin::Table body-->
																<tbody>
																	<!--begin::Table row-->
																	<tr>
																		<th>S.no<th>
																		<th>Start Date<th>
																		<th>Recurrence Type<th>
																		<!--end::Timestamp=-->
																	</tr>
																	@php
																	$array = [1,2,3,4,5];
																	@endphp
																	@foreach($array as $k=>$val)
																	@php
											
																	$interval = (1*$val);
																	if($result->recurrence_type=='daily')
																	{
																		$interval = (1*$val);
																		$d = ' + '.$interval.' days';
																	}
																	else if($result->recurrence_type=='weekly')
																	{
																		$interval = (7*$val);

																		$d = ' +'.$interval.' day';
																	}
																	else if($result->recurrence_type=='monthly')
																	{
																		$interval = (1*$val);
																		$d = ' + '.$interval.' month';
																	}
																	else if($result->recurrence_type=='yearly')
																	{
																		$interval = (1*$val);
																		$d = ' + '.$interval.' years';
																	}
																	
																	$start_date = date('Y-m-d', strtotime($d, strtotime($result->start_date)));
																	if($start_date>$result->end_date)
																	{
																		continue;
																	}
																	@endphp
                                                                    <tr>
                                                                        <td>{{$k+1}}<td>
                                                                        <td>{{$start_date}}<td>
                                                                        <td>{{$result->recurrence_type}}<td>
                                                                    </tr>
																	@endforeach
																	<!--end::Table row-->
																	
																</tbody>
																<!--end::Table body-->
															</table>
															<!--end::Table-->
														</div>
														<!--end::Table wrapper-->
													</div>
													<!--end::Card body-->
												</div>
												<!--end::Card-->
											</div>
											<!--end:::Tab pane-->
										</div>
										<!--end:::Tab content-->
									</div>
									<!--end::Content-->
								</div>
								<!--end::Layout-->
								<!--begin::Modals-->
								<!--end::Modals-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Post-->
					</div>
                    @endsection
