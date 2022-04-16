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
									<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Event Create</h1>
									<!--end::Title-->
									<!--begin::Separator-->
									<span class="h-20px border-gray-200 border-start mx-4"></span>
									<!--end::Separator-->
									<!--begin::Breadcrumb-->
									<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
										<!--begin::Item-->
										<li class="breadcrumb-item text-muted">
											<a href="{{url('home')}}" class="text-muted text-hover-primary">Home</a>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item">
											<span class="bullet bg-gray-200 w-5px h-2px"></span>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item text-muted">Event</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item">
											<span class="bullet bg-gray-200 w-5px h-2px"></span>
										</li>
										
									</ul>
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
								<!--begin::Card-->
								<div class="card">
									
									<!--begin::Card body-->
									<div class="card-body pt-0">
                                    <form id="new_event_form" class="form fv-plugins-bootstrap5 fv-plugins-framework">
													<!--begin::Heading-->
													<div class="mb-13 text-center">
														<!--begin::Title-->
														<h1 class="mb-3">Create Event</h1>
														<!--end::Title-->
																											</div>
													<!--end::Heading-->
													<!--begin::Input group-->
													<div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
														<!--begin::Label-->
														<label class="d-flex align-items-center fs-6 fw-bold mb-2">
															<span class="required">Event Name</span>
															<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Specify a subject for your issue" aria-label="Specify a subject for your issue"></i>
														</label>
														<!--end::Label-->
														<input type="text" class="form-control form-control-solid"  name="name">
													<div class="fv-plugins-message-container invalid-feedback"></div></div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<!--end::Input group-->
													<!--begin::Input group-->
                                                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
														<label class="fs-6 fw-bold mb-2">Description</label>
														<textarea class="form-control form-control-solid" rows="4" name="description" ></textarea>
													<div class="fv-plugins-message-container invalid-feedback"></div></div>
													
													<div class="row g-9 mb-8">
														
														<!--begin::Col-->
														<div class="col-md-12 fv-row fv-plugins-icon-container">
															<label class="required fs-6 fw-bold mb-2">Start Date</label>
															<!--begin::Input-->
															<div class="position-relative d-flex align-items-center">
																<!--begin::Icon-->
																<div class="symbol symbol-20px me-4 position-absolute ms-4">
																	<span class="symbol-label bg-secondary">
																		<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
																		<span class="svg-icon">
																			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																				<rect x="2" y="2" width="9" height="9" rx="2" fill="black"></rect>
																				<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black"></rect>
																				<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black"></rect>
																				<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black"></rect>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</span>
																</div>
																<!--end::Icon-->
																<!--begin::Datepicker-->
																<input class="form-control form-control-solid ps-12 flatpickr-input" placeholder="Select a date" name="start_date" type="date" >
																<!--end::Datepicker-->
															</div>
															
														<div class="fv-plugins-message-container invalid-feedback"></div></div>
														<!--end::Col-->
													</div>
													<div class="row g-9 mb-8">
														
														<!--begin::Col-->
														<div class="col-md-12 fv-row fv-plugins-icon-container">
															<label class="required fs-6 fw-bold mb-2">End Date</label>
															<!--begin::Input-->
															<div class="position-relative d-flex align-items-center">
																<!--begin::Icon-->
																<div class="symbol symbol-20px me-4 position-absolute ms-4">
																	<span class="symbol-label bg-secondary">
																		<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
																		<span class="svg-icon">
																			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																				<rect x="2" y="2" width="9" height="9" rx="2" fill="black"></rect>
																				<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black"></rect>
																				<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black"></rect>
																				<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black"></rect>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</span>
																</div>
																<!--end::Icon-->
																<!--begin::Datepicker-->
																<input class="form-control form-control-solid ps-12 flatpickr-input" placeholder="Select a date" name="end_date" type="date" id="kt_calendar_datepicker_start_date" >
																<!--end::Datepicker-->
															</div>
															
														<div class="fv-plugins-message-container invalid-feedback"></div></div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<!--end::Input group-->
                                                    <div class="row g-9 mb-8">
														<!--begin::Col-->
														<div class="col-md-12 fv-row">
															<label class="required fs-6 fw-bold mb-2">Recurrence Type</label>
                                                            <select class="form-select form-select-solid select2-hidden-accessible" data-control="select2" data-hide-search="true" data-placeholder="Select a Recurrence type" name="recurrence_type" data-select2-id="select2-data-10-alf8" tabindex="-1" aria-hidden="true">
																<option value="" data-select2-id="select2-data-12-egnf">Recurrence Type</option>
																<option value="single">Single (Occurs event only one time)</option>
																<option value="daily">Daily (Occurs event daily)
</option>
																<option value="weekly">Weekly (Occurs event every weekly)
</option>
																<option value="monthly">Monthly (Occurs event every month)
</option>
																<option value="yearly">Yearly (Occurs event every year)
</option>
																</select>
                                                                
                                                            </div>
														<!--end::Col-->
														<!--begin::Col-->
														
													</div>

													<!--end::Input group-->
													
													<!--begin::Actions-->
													<div class="text-center">
														<button type="reset" id="kt_modal_new_ticket_cancel" class="btn btn-light me-3">Cancel</button>
														<button type="submit" id="new_ticket_submit" class="btn btn-primary">
															<span class="indicator-label">Submit</span>
															<span class="indicator-progress">Please wait...
															<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
														</button>
													</div>
													<!--end::Actions-->
												<div></div></form>
									</div>
									<!--end::Card body-->
								</div>
									</div>
							<!--end::Container-->
						</div>
						<!--end::Post-->
					</div>
                    @endsection
