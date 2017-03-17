@extends('layout.default')

<div id="layouts" data-bind="loading: loading">
	<div class="loader" style="display: none;">
		<div class="progress"></div>
	</div>

	<div data-bind="with: currentPage">
		<div data-bind="template: {name: &#39;layout-&#39;+layout+&#39;-tpl&#39;, data: view.viewModel, afterRender: view.pageAfterRender}">
			<div class="canvas full" data-bind="scroll: view.scroll">
				<div class="container two-col">
					<div class="left-col" data-bind="template: leftColTpl">
						<ul class="nav">
							<li class="nav-header title">
								My business
							</li>

							<li>
								<a href="./dashborad_files/dashborad.htm" data-bind="selected: $root.isParentPage(&#39;businessDashboard&#39;)" class="selected"> <i class="icon icon-home"></i> Dashboard </a>
							</li>

							<li>
								<a href="https://app.reservio.com/en/login/#/business/details" data-bind="selected: $root.isParentPage(&#39;businessDetails&#39;)"> <i class="icon icon-description"></i> Business Details </a>
							</li>

							<li>
								<a href="https://app.reservio.com/en/login/#/business/resources" data-bind="selected: $root.isParentPage(&#39;businessResources&#39;)"> <i class="icon icon-person"></i> Staff </a>
							</li>

							<li>
								<a href="https://app.reservio.com/en/login/#/business/services" data-bind="selected: $root.isParentPage(&#39;businessServices&#39;)"> <i class="icon icon-service"></i> Services </a>
							</li>

							<li>
								<a href="https://app.reservio.com/en/login/#/business/holidays" data-bind="selected: $root.isParentPage(&#39;businessHolidays&#39;)"> <i class="icon icon-busy"></i> Holidays </a>
							</li>

							<li class="nav-header title">
								My account
							</li>

							<li>
								<a href="https://app.reservio.com/en/login/#/business/settings" data-bind="selected: $root.isParentPage(&#39;businessSettings&#39;)"> <i class="icon icon-settings"></i> Settings </a>
							</li>

							<li>
								<a href="https://app.reservio.com/en/login/#/business/orders" data-bind="selected: $root.isParentPage(&#39;businessOrders&#39;)"> <i class="icon icon-star"></i> Premium services </a>
							</li>
						</ul>
					</div>
					<div class="right-col" data-bind="loading: view.loading()">
						<div id="content" class="content" data-bind="template: tpl(), visible: !view.loading()">
							<h1>Dashboard</h1>

							<p class="subtitle">
								See your business overview in one place
							</p>
							<hr class="hr-top">

							<div class="dashboard-limits">
								<div class="dashboard-limit">
									<img src="/img/dashboardAccount.png" width="62" height="60">
									<h4 data-bind="text: data.account().plan.name">Pro Trial</h4>
									<p>
										Expires on <span data-bind="formatDate: data.account().plan.expire">03/28/2017</span>
									</p>

									<p>
										<a href="https://www.reservio.com/pricing/">Renew</a>
									</p>
								</div>
								<div class="dashboard-limit">
									<img src="/img/dashboardBookings.png" width="62" height="60">
									<h4>Bookings</h4>
									<p>
										<span data-bind="text: $root.acl.bookings.count">2</span>
									</p>
								</div>
								<div class="dashboard-limit">
									<img src="/img/dashboardMessages.png" width="62" height="60">
									<h4>SMS messages</h4>
									<p data-bind="text: data.account().sms_balance">
										4
									</p>
									<p>
										<a href="https://www.reservio.com/pricing/?smsPackage=1">Upgrade</a>
									</p>
								</div>
								<div class="clear"></div>
							</div>

							<hr class="hr-top">
							<div id="dashboard-extension">
								<div class="dashboard-extension">
									<img src="/img/chromeExtension.png" width="30" height="30">
									<p>
										<b>Install a Chrome extension</b> and get booking requests notifications.
									</p>
									<a href="https://app.reservio.com/en/login/#" data-bind="click: hideChromeExtensionInstall" id="install-button" class="btn btn-grey">Hide</a>
									<a href="https://app.reservio.com/en/login/#" data-bind="click: chromeExtensionInstall" id="install-button" class="btn btn-blue">Add to Chrome</a>

									<div class="clear"></div>
								</div>
								<hr class="hr-top">
							</div>

							<a href="https://app.reservio.com/en/login/#" class="btn btn-grey pull-right show-statistics" data-bind="click: showStatistics">Show statistics</a>
							<h2>Upcoming bookings</h2>
							<div id="dashboard-statistics" style="height: 170px;cursor:pointer;">
								<div style="position: relative;">
									<div dir="ltr" style="position: relative; width: 709px; height: 170px;">
										<div aria-label="A chart." style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;">
											<svg width="709" height="170" aria-label="A chart." style="overflow: hidden;">
												<defs id="defs">
													<clippath id="_ABSTRACT_RENDERER_ID_15">
														<rect x="0" y="20" width="709" height="120"></rect>
													</clippath>
												</defs><rect x="0" y="0" width="709" height="170" stroke="none" stroke-width="0" fill="#ffffff"></rect>
												<g>
													<rect x="0" y="20" width="709" height="120" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
													<g clip-path="url(https://app.reservio.com/en/login/#_ABSTRACT_RENDERER_ID_15)">
														<g>
															<rect x="4" y="128" width="43" height="11" stroke="none" stroke-width="0" fill="#1263bb"></rect><rect x="55" y="139" width="43" height="0.5" stroke="none" stroke-width="0" fill="#1263bb"></rect><rect x="105" y="139" width="43" height="0.5" stroke="none" stroke-width="0" fill="#1263bb"></rect><rect x="156" y="139" width="43" height="0.5" stroke="none" stroke-width="0" fill="#1263bb"></rect><rect x="207" y="139" width="43" height="0.5" stroke="none" stroke-width="0" fill="#1263bb"></rect><rect x="257" y="139" width="43" height="0.5" stroke="none" stroke-width="0" fill="#1263bb"></rect><rect x="308" y="139" width="43" height="0.5" stroke="none" stroke-width="0" fill="#1263bb"></rect><rect x="358" y="139" width="43" height="0.5" stroke="none" stroke-width="0" fill="#1263bb"></rect><rect x="409" y="139" width="43" height="0.5" stroke="none" stroke-width="0" fill="#1263bb"></rect><rect x="459" y="139" width="43" height="0.5" stroke="none" stroke-width="0" fill="#1263bb"></rect><rect x="510" y="139" width="43" height="0.5" stroke="none" stroke-width="0" fill="#1263bb"></rect><rect x="561" y="139" width="43" height="0.5" stroke="none" stroke-width="0" fill="#1263bb"></rect><rect x="611" y="139" width="43" height="0.5" stroke="none" stroke-width="0" fill="#1263bb"></rect><rect x="662" y="139" width="43" height="0.5" stroke="none" stroke-width="0" fill="#1263bb"></rect>
														</g>
														<g>
															<rect x="0" y="139" width="709" height="1" stroke="none" stroke-width="0" fill="#e2e2e2"></rect>
														</g>
														<g>
															<rect x="25" y="116" width="1" height="12" stroke="none" stroke-width="0" fill="#999999"></rect><rect x="76" y="127" width="1" height="12" stroke="none" stroke-width="0" fill="#999999"></rect><rect x="126" y="127" width="1" height="12" stroke="none" stroke-width="0" fill="#999999"></rect><rect x="177" y="127" width="1" height="12" stroke="none" stroke-width="0" fill="#999999"></rect><rect x="228" y="127" width="1" height="12" stroke="none" stroke-width="0" fill="#999999"></rect><rect x="278" y="127" width="1" height="12" stroke="none" stroke-width="0" fill="#999999"></rect><rect x="329" y="127" width="1" height="12" stroke="none" stroke-width="0" fill="#999999"></rect><rect x="379" y="127" width="1" height="12" stroke="none" stroke-width="0" fill="#999999"></rect><rect x="430" y="127" width="1" height="12" stroke="none" stroke-width="0" fill="#999999"></rect><rect x="480" y="127" width="1" height="12" stroke="none" stroke-width="0" fill="#999999"></rect><rect x="531" y="127" width="1" height="12" stroke="none" stroke-width="0" fill="#999999"></rect><rect x="582" y="127" width="1" height="12" stroke="none" stroke-width="0" fill="#999999"></rect><rect x="632" y="127" width="1" height="12" stroke="none" stroke-width="0" fill="#999999"></rect><rect x="683" y="127" width="1" height="12" stroke="none" stroke-width="0" fill="#999999"></rect>
														</g>
													</g><g></g>
													<g>
														<g>
															<text text-anchor="middle" x="228.07142857142856" y="156.35" font-family="Arial" font-size="11" stroke="none" stroke-width="0" fill="#777777">
																Mon, 20.3.
															</text>
														</g>
														<g>
															<text text-anchor="middle" x="582.0714285714286" y="156.35" font-family="Arial" font-size="11" stroke="none" stroke-width="0" fill="#777777">
																Mon, 27.3.
															</text>
														</g>
													</g>
													<g>
														<g>
															<g>
																<rect x="19.5" y="103.5" width="12" height="14" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
																<g>
																	<text text-anchor="middle" x="25" y="114.2" font-family="Arial" font-size="12" stroke="#ffffff" stroke-width="3" fill="#1263bb" aria-hidden="true">
																		1
																	</text>
																	<text text-anchor="middle" x="25" y="114.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#1263bb">
																		1
																	</text>
																</g><rect x="21.5" y="104" width="7" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
															</g>
														</g>
														<g>
															<g>
																<rect x="70.5" y="114.5" width="12" height="14" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
																<g>
																	<text text-anchor="middle" x="76" y="125.2" font-family="Arial" font-size="12" stroke="#ffffff" stroke-width="3" fill="#1263bb" aria-hidden="true">
																		0
																	</text>
																	<text text-anchor="middle" x="76" y="125.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#1263bb">
																		0
																	</text>
																</g><rect x="72.5" y="115" width="7" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
															</g>
														</g>
														<g>
															<g>
																<rect x="120.5" y="114.5" width="12" height="14" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
																<g>
																	<text text-anchor="middle" x="126" y="125.2" font-family="Arial" font-size="12" stroke="#ffffff" stroke-width="3" fill="#1263bb" aria-hidden="true">
																		0
																	</text>
																	<text text-anchor="middle" x="126" y="125.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#1263bb">
																		0
																	</text>
																</g><rect x="122.5" y="115" width="7" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
															</g>
														</g>
														<g>
															<g>
																<rect x="171.5" y="114.5" width="12" height="14" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
																<g>
																	<text text-anchor="middle" x="177" y="125.2" font-family="Arial" font-size="12" stroke="#ffffff" stroke-width="3" fill="#1263bb" aria-hidden="true">
																		0
																	</text>
																	<text text-anchor="middle" x="177" y="125.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#1263bb">
																		0
																	</text>
																</g><rect x="173.5" y="115" width="7" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
															</g>
														</g>
														<g>
															<g>
																<rect x="222.5" y="114.5" width="12" height="14" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
																<g>
																	<text text-anchor="middle" x="228" y="125.2" font-family="Arial" font-size="12" stroke="#ffffff" stroke-width="3" fill="#1263bb" aria-hidden="true">
																		0
																	</text>
																	<text text-anchor="middle" x="228" y="125.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#1263bb">
																		0
																	</text>
																</g><rect x="224.5" y="115" width="7" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
															</g>
														</g>
														<g>
															<g>
																<rect x="272.5" y="114.5" width="12" height="14" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
																<g>
																	<text text-anchor="middle" x="278" y="125.2" font-family="Arial" font-size="12" stroke="#ffffff" stroke-width="3" fill="#1263bb" aria-hidden="true">
																		0
																	</text>
																	<text text-anchor="middle" x="278" y="125.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#1263bb">
																		0
																	</text>
																</g><rect x="274.5" y="115" width="7" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
															</g>
														</g>
														<g>
															<g>
																<rect x="323.5" y="114.5" width="12" height="14" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
																<g>
																	<text text-anchor="middle" x="329" y="125.2" font-family="Arial" font-size="12" stroke="#ffffff" stroke-width="3" fill="#1263bb" aria-hidden="true">
																		0
																	</text>
																	<text text-anchor="middle" x="329" y="125.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#1263bb">
																		0
																	</text>
																</g><rect x="325.5" y="115" width="7" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
															</g>
														</g>
														<g>
															<g>
																<rect x="373.5" y="114.5" width="12" height="14" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
																<g>
																	<text text-anchor="middle" x="379" y="125.2" font-family="Arial" font-size="12" stroke="#ffffff" stroke-width="3" fill="#1263bb" aria-hidden="true">
																		0
																	</text>
																	<text text-anchor="middle" x="379" y="125.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#1263bb">
																		0
																	</text>
																</g><rect x="375.5" y="115" width="7" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
															</g>
														</g>
														<g>
															<g>
																<rect x="424.5" y="114.5" width="12" height="14" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
																<g>
																	<text text-anchor="middle" x="430" y="125.2" font-family="Arial" font-size="12" stroke="#ffffff" stroke-width="3" fill="#1263bb" aria-hidden="true">
																		0
																	</text>
																	<text text-anchor="middle" x="430" y="125.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#1263bb">
																		0
																	</text>
																</g><rect x="426.5" y="115" width="7" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
															</g>
														</g>
														<g>
															<g>
																<rect x="474.5" y="114.5" width="12" height="14" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
																<g>
																	<text text-anchor="middle" x="480" y="125.2" font-family="Arial" font-size="12" stroke="#ffffff" stroke-width="3" fill="#1263bb" aria-hidden="true">
																		0
																	</text>
																	<text text-anchor="middle" x="480" y="125.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#1263bb">
																		0
																	</text>
																</g><rect x="476.5" y="115" width="7" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
															</g>
														</g>
														<g>
															<g>
																<rect x="525.5" y="114.5" width="12" height="14" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
																<g>
																	<text text-anchor="middle" x="531" y="125.2" font-family="Arial" font-size="12" stroke="#ffffff" stroke-width="3" fill="#1263bb" aria-hidden="true">
																		0
																	</text>
																	<text text-anchor="middle" x="531" y="125.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#1263bb">
																		0
																	</text>
																</g><rect x="527.5" y="115" width="7" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
															</g>
														</g>
														<g>
															<g>
																<rect x="576.5" y="114.5" width="12" height="14" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
																<g>
																	<text text-anchor="middle" x="582" y="125.2" font-family="Arial" font-size="12" stroke="#ffffff" stroke-width="3" fill="#1263bb" aria-hidden="true">
																		0
																	</text>
																	<text text-anchor="middle" x="582" y="125.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#1263bb">
																		0
																	</text>
																</g><rect x="578.5" y="115" width="7" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
															</g>
														</g>
														<g>
															<g>
																<rect x="626.5" y="114.5" width="12" height="14" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
																<g>
																	<text text-anchor="middle" x="632" y="125.2" font-family="Arial" font-size="12" stroke="#ffffff" stroke-width="3" fill="#1263bb" aria-hidden="true">
																		0
																	</text>
																	<text text-anchor="middle" x="632" y="125.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#1263bb">
																		0
																	</text>
																</g><rect x="628.5" y="115" width="7" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
															</g>
														</g>
														<g>
															<g>
																<rect x="677.5" y="114.5" width="12" height="14" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
																<g>
																	<text text-anchor="middle" x="683" y="125.2" font-family="Arial" font-size="12" stroke="#ffffff" stroke-width="3" fill="#1263bb" aria-hidden="true">
																		0
																	</text>
																	<text text-anchor="middle" x="683" y="125.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#1263bb">
																		0
																	</text>
																</g><rect x="679.5" y="115" width="7" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
															</g>
														</g>
													</g>
												</g><g></g>
											</svg>
										</div>
									</div>
									<div aria-hidden="true" style="display: none; position: absolute; top: 180px; left: 719px; white-space: nowrap; font-family: Arial; font-size: 12px;">
										1
									</div><div></div>
								</div>
							</div>

							<hr class="hr-top">

							<h2 class="margin-bottom-15">Latest activity</h2>

							<div data-bind="template: {name: bookingTpl, foreach: $data.displayedActivities}, loading: $data.activityLoading()">
								<div class="block-story block-story-photo">
									<div class="photo">
										<div data-bind="profilePicture: {fb_id: client_fb_id, id: client_id, name: client_name}">
											<div class="profile-pic c2">
												Hi
											</div>
										</div>
									</div>
									<div class="story margin-left-60">
										<p>
											<!-- ko if: client.is_deleted || !_reservio.userRole.can_manage_clients --><!-- /ko -->
											<!-- ko ifnot: client.is_deleted || !_reservio.userRole.can_manage_clients -->
											<a data-bind="href: &#39;#/clients/detail/&#39;+client_id, text: client_name" href="https://app.reservio.com/en/login/#/clients/detail/2">hi</a>
											<!-- /ko -->
											<span data-bind="text: $root.lang.get(start &gt; new Date() ? &#39;activity-appointment-has&#39; : &#39;activity-appointment-had&#39;)">had an appointment on</span>
											<a data-bind="href: &#39;/#/calendar/agendaWeek/&#39;+start.getTime()+&#39;/0/0/&#39;+event_id+&#39;/0&#39;, formatDateTime: start" href="https://app.reservio.com/#/calendar/agendaWeek/1489634100000/0/0/2/0">03/16/2017, 11:15 am</a>
											<span data-bind="text: $root.lang.get(&#39;basic-forServiceResource&#39;).format({service: service_id ? service_name : null})"></span>
										</p>

										<p class="info">
											<span data-bind="formatDateTime: created">03/15/2017, 11:09 pm</span>
											<span data-bind="text: $root.lang.get(viaLanguage)">via Reservio Calendar</span>
										</p>
									</div>
								</div>

								<div class="block-story block-story-photo">
									<div class="photo">
										<div data-bind="profilePicture: {fb_id: client_fb_id, id: client_id, name: client_name}">
											<div class="profile-pic c1">
												He
											</div>
										</div>
									</div>
									<div class="story margin-left-60">
										<p>
											<!-- ko if: client.is_deleted || !_reservio.userRole.can_manage_clients --><!-- /ko -->
											<!-- ko ifnot: client.is_deleted || !_reservio.userRole.can_manage_clients -->
											<a data-bind="href: &#39;#/clients/detail/&#39;+client_id, text: client_name" href="https://app.reservio.com/en/login/#/clients/detail/1">hey</a>
											<!-- /ko -->
											<span data-bind="text: $root.lang.get(start &gt; new Date() ? &#39;activity-appointment-has&#39; : &#39;activity-appointment-had&#39;)">had an appointment on</span>
											<a data-bind="href: &#39;/#/calendar/agendaWeek/&#39;+start.getTime()+&#39;/0/0/&#39;+event_id+&#39;/0&#39;, formatDateTime: start" href="https://app.reservio.com/#/calendar/agendaWeek/1489539600000/0/0/1/0">03/15/2017, 9:00 am</a>
											<span data-bind="text: $root.lang.get(&#39;basic-forServiceResource&#39;).format({service: service_id ? service_name : null})"></span>
										</p>

										<p class="info">
											<span data-bind="formatDateTime: created">03/15/2017, 9:14 am</span>
											<span data-bind="text: $root.lang.get(viaLanguage)">via Reservio Calendar</span>
										</p>
									</div>
								</div>
								<div class="loader" style="display: none;">
									<div class="progress"></div>
								</div>
							</div>
							<p class="see-more" data-bind="visible: historyLimitReached()" style="display: none;">
								<a href="https://app.reservio.com/en/login/#" data-bind="click: $root.acl.showUpgradeModal($root.lang.get(&#39;modal-upgrade-clientsHistory-title&#39;), $root.lang.get(&#39;modal-upgrade-clientsHistory-text&#39;), &#39;clients-2.png&#39;)">Show history older than 3 months</a>
							</p>

							<div class="no-activity" data-bind="visible: noMoreActivity() &amp;&amp; !historyLimitReached(), text: noMoreActivity">
								No more activity
							</div>
						</div>
						<div class="loader" style="display: none;">
							<div class="progress"></div>
						</div>
					</div>
					<ul class="footer">
						<li>
							<a href="https://app.reservio.com/en/login/#" data-bind="click: $root.supportClicked">Support</a>
						</li>
						<li>
							© 2017 Reservio.com
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>