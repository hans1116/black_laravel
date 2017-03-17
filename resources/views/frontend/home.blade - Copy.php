@extends('layout.default')

<div id="layouts" data-bind="loading: loading">
	<div class="loader" style="display: none;">
		<div class="progress"></div>
	</div>

	<div data-bind="with: currentPage">
		<div data-bind="template: {name: &#39;layout-&#39;+layout+&#39;-tpl&#39;, data: view.viewModel, afterRender: view.pageAfterRender}">
			<div class="toolbar no-padding">
				<div id="cal-tools">
					<a id="calendar-create-event" class="btn btn-blue action-btn" data-bind="click: createEventClicked">Create appointment</a>

					<div id="month-cal">
						<div class="datepicker week" id="datepicker">

							<div class="top">
								<span class="month">March 2017</span><a class="prev"><i class="icon icon-arrow-left"></i></a><a class="next"><i class="icon icon-arrow-right"></i></a>
							</div>
							<div class="body">
								<div class="days">
									<span>Mo</span><span>Tu</span><span>We</span><span>Th</span><span>Fr</span><span>Sa</span><span>Su</span>
								</div>
								<div class="weeks">
									<div class="week">
										<a class="different-month" href="https://localhost/#">27</a><a class="different-month" href="https://localhost/#">28</a><a class="" href="https://localhost/#">1</a><a class="" href="https://localhost/#">2</a><a class="" href="https://localhost/#">3</a><a class="" href="https://localhost/#">4</a><a class="" href="https://localhost/#">5</a>
									</div>
									<div class="week">
										<a class="" href="https://localhost/#">6</a><a class="" href="https://localhost/#">7</a><a class="" href="https://localhost/#">8</a><a class="" href="https://localhost/#">9</a><a class="" href="https://localhost/#">10</a><a class="" href="https://localhost/#">11</a><a class="" href="https://localhost/#">12</a>
									</div>
									<div class="week active">
										<a class="" href="https://localhost/#">13</a><a class="" href="https://localhost/#">14</a><a class="today active" href="https://localhost/#">15</a><a class="" href="https://localhost/#">16</a><a class="" href="https://localhost/#">17</a><a class="" href="https://localhost/#">18</a><a class="" href="https://localhost/#">19</a>
									</div>
									<div class="week">
										<a class="" href="https://localhost/#">20</a><a class="" href="https://localhost/#">21</a><a class="" href="https://localhost/#">22</a><a class="" href="https://localhost/#">23</a><a class="" href="https://localhost/#">24</a><a class="" href="https://localhost/#">25</a><a class="" href="https://localhost/#">26</a>
									</div>
									<div class="week">
										<a class="" href="https://localhost/#">27</a><a class="" href="https://localhost/#">28</a><a class="" href="https://localhost/#">29</a><a class="" href="https://localhost/#">30</a><a class="" href="https://localhost/#">31</a><a class="different-month" href="https://localhost/#">1</a><a class="different-month" href="https://localhost/#">2</a>
									</div>
									<div class="week">
										<a class="different-month" href="https://localhost/#">3</a><a class="different-month" href="https://localhost/#">4</a><a class="different-month" href="https://localhost/#">5</a><a class="different-month" href="https://localhost/#">6</a><a class="different-month" href="https://localhost/#">7</a><a class="different-month" href="https://localhost/#">8</a><a class="different-month" href="https://localhost/#">9</a>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="filters" class="scrollable visible">
					<div class="scrollbar disable" style="height: 581px;">
						<div class="track" style="height: 581px;">
							<div class="thumb" style="top: 0px; height: 579px;">
								<div class="end"></div>
							</div>
						</div>
					</div>
					<div class="viewport" style="height: 581px;">
						<div class="overview" style="top: 0px;">
							<div id="filter-scroll" class="scroll" data-bind="template: {name: &#39;resources-services-tpl&#39;}">
								<ul class="nav">
									<li class="nav-header">
										Staff <a href="https://localhost/#/business/resources" class="hidden" data-bind="click: resourceEditClicked">Edit</a>
									</li>

									<li>
										<a href="https://localhost/#" class="resource-filter selected" data-bind="click: function(i, e) {resourceClicked(0, e)}, selected: selectedResourceId() == 0"><i class="icon icon-person"></i> All staff</a>
									</li>

									<!-- ko foreach: $root.data.resources -->
									<li>
										<a href="https://localhost/#" class="resource-filter" data-bind="click: $parent.resourceClicked, selected: $parent.selectedResourceId() == data.id()"> <i class="icon icon-person"></i> <span data-bind="text: data.name">Hans C</span> <span class="filter-dropdown-btn icon icon-arrow-down"></span> </a>
									</li>
									<!-- /ko -->

									<li>
										<a href="https://localhost/#" class="resource-filter" data-bind="click: function(i, e) {resourceClicked(-1, e)}, selected: selectedResourceId() == -1"><i class="icon icon-person"></i> Not assigned</a>
									</li>

									<li class="nav-header">
										Services <a href="https://localhost/#/business/services" class="hidden" data-bind="click: serviceEditClicked">Edit</a>
									</li>

									<li>
										<a href="https://localhost/#" class="service-filter selected" data-bind="click: function(i, e) {serviceClicked(0, e)}, selected: selectedServiceId() == 0"> <i class="icon icon-service"></i> All services </a>
									</li>
									<!-- ko foreach: $root.data.services -->
									<li>
										<a href="https://localhost/#" class="service-filter" data-bind="click: $parent.serviceClicked, selected: $parent.selectedServiceId() == data.id()"><i class="icon icon-service"></i> <span data-bind="text: data.name">Service</span> <span class="filter-dropdown-btn icon icon-arrow-down"></span> </a>
									</li>
									<!-- /ko -->
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div id="upcoming-indicator" data-bind="with: $root.acl.bookings">
					<h3>Bookings per month</h3>
					<p>
						<span data-bind="text: count">1</span>
					</p>
				</div>
			</div>

			<div class="canvas noscroll">
				<div id="canvas-scroll" class="scroll">
					<!-- ko with: notifications -->
					<div id="calendar-notifications" class="calendar-notifications" data-bind="fadeVisible: shown" style="display: none;">
						<div class="calendar-notification" data-bind="style: { right: requests().length &lt;= 1 ? &#39;-1px&#39; : &#39;&#39;}" style="right: -1px;">
							<div class="calendar-notification-item" style="position: absolute;left:0;right:0;top:0;bottom:0;" data-bind="template: {name: &#39;request-tpl&#39;, data: selectedRequest(), &#39;if&#39;: selectedRequest()}"></div>
						</div>

						<div class="buttons" data-bind="visible: requests().length &gt; 1" style="display: none;">
							<a href="https://localhost/#" data-bind="click: prevClicked"><i class="icon icon-arrow-up"></i></a>
							<a href="https://localhost/#" data-bind="click: nextClicked"><i class="icon icon-arrow-down"></i></a>
						</div>
					</div>
					<!-- /ko -->
					<div class="paper" data-bind="style: {top: notifications.requests().length == 0 ? &#39;0px&#39; : &#39;56px&#39;}" style="top: 0px;">
						<div id="calendar">
							<div class="calendar-header" style="">
								<h1 data-bind="html: calendarTitle">March 13 - 19 <small>2017</small></h1>

								<div class="btn-group controls">
									<a href="https://localhost/#" class="btn btn-grey prev" data-bind="click: prevClicked"><i class="icon icon-arrow-left"></i></a><a href="https://localhost/#" class="btn btn-grey today" data-bind="click: todayClicked">Today</a><a href="https://localhost/#" class="btn btn-grey next" data-bind="click: nextClicked"><i class="icon icon-arrow-right"></i></a>

									<span style="position: relative; margin-left: 10px;"> <a href="https://localhost/#" class="btn btn-grey calendar-settings-button dropdown" data-bind="click: toggleSettings"><i class="icon icon-settings"></i></a>
										<ul id="calendar-settings" class="btn-drop right" style="display: none">
											<li>
												<a href="https://localhost/#/synchronization" data-bind="click: syncClicked">Sync calendar</a>
											</li>
											<li>
												<a href="https://localhost/#" data-bind="click: printClicked">Print</a>
											</li>
											<li>
												<a href="https://localhost/#/business/settings">Settings</a>
											</li>
										</ul> </span>
								</div>

								<div class="btn-group controls-center view-select" data-bind="foreach: views">
									<a href="https://localhost/#" class="btn btn-grey" data-bind="css: {active: $parent.selectedView() == $data}, text: $parent.viewsLang[$index()], click: $parent.changeViewClicked">Agenda</a><a href="https://localhost/#" class="btn btn-grey" data-bind="css: {active: $parent.selectedView() == $data}, text: $parent.viewsLang[$index()], click: $parent.changeViewClicked">Day</a><a href="https://localhost/#" class="btn btn-grey active" data-bind="css: {active: $parent.selectedView() == $data}, text: $parent.viewsLang[$index()], click: $parent.changeViewClicked">Week</a>
								</div>
							</div>
							<div class="calendar-content fc">
								<div class="fc-content" style="position: relative; min-height: 1px;">
									<div class="fc-view fc-view-agendaWeek active-view fc-agenda" style="position: relative;" unselectable="on">
										<table style="width:100%" class="fc-agenda-days fc-border-separate" cellspacing="0">
											<thead>
												<tr class="fc-first fc-last">
													<th class="fc-agenda-axis fc-widget-header fc-first" style="width: 30px;">&nbsp;</th>
													<th class="fc-undefined fc-col0 fc-widget-header" style="width: 225px;">Monday <strong>13</strong></th>
													<th class="fc-undefined fc-col1 fc-widget-header" style="width: 224px;">Tuesday <strong>14</strong></th>
													<th class="fc-undefined fc-col2 fc-widget-header fc-state-highlight fc-today" style="width: 224px;">Wednesday <strong>15</strong></th>
													<th class="fc-undefined fc-col3 fc-widget-header" style="width: 224px;">Thursday <strong>16</strong></th>
													<th class="fc-undefined fc-col4 fc-widget-header" style="width: 224px;">Friday <strong>17</strong></th>
													<th class="fc-undefined fc-col5 fc-widget-header" style="width: 224px;">Saturday <strong>18</strong></th>
													<th class="fc-undefined fc-col6 fc-widget-header">Sunday <strong>19</strong></th>
													<th class="fc-agenda-gutter fc-widget-header fc-last" style="width: 6px;">&nbsp;</th>
												</tr>
											</thead>
											<tbody>
												<tr class="fc-first fc-last">
													<th class="fc-agenda-axis fc-widget-header fc-first">&nbsp;</th>
													<td class="fc-undefined fc-col0 fc-widget-content">
													<div style="height: 798px;">
														<div class="fc-day-content">
															<div style="position:relative">
																&nbsp;
															</div>
														</div>
													</div></td>
													<td class="fc-undefined fc-col1 fc-widget-content">
													<div>
														<div class="fc-day-content">
															<div style="position:relative">
																&nbsp;
															</div>
														</div>
													</div></td>
													<td class="fc-undefined fc-col2 fc-widget-content fc-state-highlight fc-today">
													<div>
														<div class="fc-day-content">
															<div style="position:relative">
																&nbsp;
															</div>
														</div>
													</div></td>
													<td class="fc-undefined fc-col3 fc-widget-content">
													<div>
														<div class="fc-day-content">
															<div style="position:relative">
																&nbsp;
															</div>
														</div>
													</div></td>
													<td class="fc-undefined fc-col4 fc-widget-content">
													<div>
														<div class="fc-day-content">
															<div style="position:relative">
																&nbsp;
															</div>
														</div>
													</div></td>
													<td class="fc-undefined fc-col5 fc-widget-content">
													<div>
														<div class="fc-day-content">
															<div style="position:relative">
																&nbsp;
															</div>
														</div>
													</div></td>
													<td class="fc-undefined fc-col6 fc-widget-content">
													<div>
														<div class="fc-day-content">
															<div style="position:relative">
																&nbsp;
															</div>
														</div>
													</div></td>
													<td class="fc-agenda-gutter fc-widget-content fc-last" style="width: 16px;">&nbsp;</td>
												</tr>
											</tbody>
										</table>
										<div style="position: absolute; z-index: 2; left: 0px; width: 100%; top: 30px;">
											<div style="position: absolute; width: 100%; overflow-x: hidden; overflow-y: auto; height: 797px;" class="overflow-content">
												<div style="position:relative;width:100%;overflow:hidden" class="popover-holder slot-content">
													<div style="position:absolute;z-index:8;top:0;left:0">
														<div class="editable" style="height: 1535px; width: 1641px; left: 41px;"></div>
														<div class="fc-event fc-event-skin fc-event-vert fc-event-draggable fc-corner-top fc-corner-bottom" style="position: absolute; top: 576px; left: 512px; background-color: rgb(18, 99, 187); border-color: rgb(12, 69, 130); width: 221.39999999999998px; height: 59px;" id="fc-event-1">
															<div class="fc-event-inner fc-event-skin" style="background-color: rgb(18, 99, 187); border-color: rgb(12, 69, 130); width: 218.39999999999998px;">
																<div class="fc-event-icons"></div>
																<div class="fc-event-head fc-event-skin" style="background-color:#1263bb;border-color:#0c4582">
																	<div class="fc-event-time">
																		hey
																		<br>
																		<p style="font-size: 9px;line-height: 10px;">
																			Service
																		</p>
																	</div>
																</div>
																<div class="fc-event-content">
																	<div class="fc-event-title">
																		9:00 am - hey
																	</div>
																</div><div class="fc-event-bg"></div>
															</div>
															<div class="ui-resizable-handle ui-resizable-s">
																=
															</div>
														</div>
													</div>
													<div style="position:absolute;z-index:0;top:0;left:0">
														<div class="fc-closed fc-col0" style="height: 576px; top: 0px; width: 234px; left: 43px;"></div><div class="fc-closed fc-col0" style="height: 384px; top: 1152px; width: 234px; left: 43px;"></div><div class="fc-closed fc-col1" style="height: 576px; top: 0px; width: 234px; left: 279px;"></div><div class="fc-closed fc-col1" style="height: 384px; top: 1152px; width: 234px; left: 279px;"></div><div class="fc-closed fc-col2" style="height: 576px; top: 0px; width: 234px; left: 514px;"></div><div class="fc-closed fc-col2" style="height: 384px; top: 1152px; width: 234px; left: 514px;"></div><div class="fc-closed fc-col3" style="height: 576px; top: 0px; width: 234px; left: 749px;"></div><div class="fc-closed fc-col3" style="height: 384px; top: 1152px; width: 234px; left: 749px;"></div><div class="fc-closed fc-col4" style="height: 576px; top: 0px; width: 234px; left: 984px;"></div><div class="fc-closed fc-col4" style="height: 384px; top: 1152px; width: 234px; left: 984px;"></div><div class="fc-closed fc-col5" style="height: 1536px; top: 0px; width: 234px; left: 1219px;"></div><div class="fc-closed fc-col6" style="height: 1536px; top: 0px; width: 234px; left: 1454px;"></div>
													</div>
													<table class="fc-agenda-slots" style="width:100%; z-index: 2; position: relative;" cellspacing="0">
														<tbody>
															<tr class="fc-slot0 ">
																<th class="fc-agenda-axis fc-widget-header" style="width: 32px;"><span>12 am</span></th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot1 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot2 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot3 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot4 ">
																<th class="fc-agenda-axis fc-widget-header"><span>1 am</span></th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot5 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot6 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot7 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot8 ">
																<th class="fc-agenda-axis fc-widget-header"><span>2 am</span></th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot9 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot10 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot11 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot12 ">
																<th class="fc-agenda-axis fc-widget-header"><span>3 am</span></th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot13 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot14 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot15 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot16 ">
																<th class="fc-agenda-axis fc-widget-header"><span>4 am</span></th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot17 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot18 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot19 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot20 ">
																<th class="fc-agenda-axis fc-widget-header"><span>5 am</span></th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot21 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot22 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot23 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot24 ">
																<th class="fc-agenda-axis fc-widget-header"><span>6 am</span></th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot25 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot26 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot27 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot28 ">
																<th class="fc-agenda-axis fc-widget-header"><span>7 am</span></th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot29 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot30 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot31 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot32 ">
																<th class="fc-agenda-axis fc-widget-header"><span>8 am</span></th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot33 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot34 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot35 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot36 ">
																<th class="fc-agenda-axis fc-widget-header"><span>9 am</span></th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot37 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot38 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot39 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot40 ">
																<th class="fc-agenda-axis fc-widget-header"><span>10 am</span></th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot41 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot42 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot43 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot44 ">
																<th class="fc-agenda-axis fc-widget-header"><span>11 am</span></th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot45 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot46 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot47 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot48 ">
																<th class="fc-agenda-axis fc-widget-header"><span>12 pm</span></th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot49 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot50 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot51 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot52 ">
																<th class="fc-agenda-axis fc-widget-header"><span>1 pm</span></th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot53 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot54 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot55 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot56 ">
																<th class="fc-agenda-axis fc-widget-header"><span>2 pm</span></th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot57 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot58 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot59 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot60 ">
																<th class="fc-agenda-axis fc-widget-header"><span>3 pm</span></th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot61 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot62 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot63 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot64 ">
																<th class="fc-agenda-axis fc-widget-header"><span>4 pm</span></th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot65 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot66 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot67 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot68 ">
																<th class="fc-agenda-axis fc-widget-header"><span>5 pm</span></th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot69 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot70 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot71 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot72 ">
																<th class="fc-agenda-axis fc-widget-header"><span>6 pm</span></th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot73 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot74 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot75 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot76 ">
																<th class="fc-agenda-axis fc-widget-header"><span>7 pm</span></th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot77 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot78 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot79 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot80 ">
																<th class="fc-agenda-axis fc-widget-header"><span>8 pm</span></th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot81 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot82 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot83 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot84 ">
																<th class="fc-agenda-axis fc-widget-header"><span>9 pm</span></th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot85 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot86 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot87 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot88 ">
																<th class="fc-agenda-axis fc-widget-header"><span>10 pm</span></th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot89 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot90 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot91 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot92 ">
																<th class="fc-agenda-axis fc-widget-header"><span>11 pm</span></th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot93 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot94 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
															<tr class="fc-slot95 fc-minor">
																<th class="fc-agenda-axis fc-widget-header">&nbsp;</th><td class="fc-widget-content fc-widget-content-even">
																<div style="position:relative">
																	&nbsp;
																</div></td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="loading"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">jQuery("#datepicker").datepicker();</script>