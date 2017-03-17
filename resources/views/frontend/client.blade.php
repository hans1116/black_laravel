@extends('layout.default')

<
<div id="layouts" data-bind="loading: loading">
	<div class="loader" style="display: none;">
		<div class="progress"></div>
	</div>

	<div data-bind="with: currentPage">
		<div data-bind="template: {name: &#39;layout-&#39;+layout+&#39;-tpl&#39;, data: view.viewModel, afterRender: view.pageAfterRender}">
			<div class="canvas full" data-bind="scroll: view.scroll">
				<div class="page-960">
					<div class="two-col-panel clients-panel">
						<div class="clients-menu white-paper">
							<form class="clients-filter" data-bind="submit: $root.clientsFilterSubmitted">
								<input type="text" id="clients-filter" class="clients-filter" placeholder="Search client" data-bind="value: $root.clientsFilter, valueUpdate: &#39;keyup&#39;">
								<i class="icon icon-search" data-bind="css: $root.clientsFilter() != &#39;&#39; ? &#39;icon-close&#39; : &#39;icon-search&#39;, click: $root.clearClientsFilter"></i>
							</form>
						</div>
						<div class="clients-export white-paper">
							<h3> Import clients </h3>
							<ul class="clients-export-options">
								<li class="csv">
									<a data-bind="click: $root.importClientsClicked.bind($root)" href="https://app.reservio.com/en/login/#" title="Import from CSV">csv</a>
								</li>
								<li class="gmail">
									<a href="https://app.reservio.com/contacts/import-gmail-contacts/" title="Import from Gmail">Gmail</a>
								</li>
							</ul>
						</div>
						<div class="clients-export white-paper">
							<h3> Export clients </h3>

							<ul class="clients-export-options">
								<li class="csv">
									<a data-bind="click: $root.exportClientsCsvClicked.bind($root)" href="https://app.reservio.com/en/login/#" title="Export to CSV">csv</a>
								</li>
								<li class="pdf">
									<a data-bind="click: $root.exportClientsPdfClicked.bind($root)" href="https://app.reservio.com/en/login/#" title="Export to PDF">pdf</a>
								</li>
							</ul>
						</div>

					</div>
					<div class="two-col-content" data-bind="template: tpl(), visible: !view.loading()">
						<a href="https://app.reservio.com/en/login/#/clients/form/add" class="btn btn-blue controls">New client</a>

						<h2 class="clients-filter-title" data-bind="visible: $root.clientsFilter() == &#39;&#39;">Clients (<span data-bind="text: clientCount">2</span>)</h2>
						<h2 class="clients-filter-title" data-bind="visible: $root.clientsFilter() != &#39;&#39;" style="display: none;">Search result for '<span data-bind="text: $root.clientsFilter"></span>' (<span data-bind="text: clientCount">2</span>)</h2>

						<!-- ko if: clients().length > 0 -->
						<ul class="clients-list" data-bind="foreach: clients, delegatedHandler: &#39;click&#39;">
							<!-- ko ifnot: isOverLimit -->
							<li class="client-card">
								<a href="https://app.reservio.com/en/login/#/clients/detail/1" data-bind="attr: {href: &#39;#/clients/detail/&#39;+id()}">
								<div class="client-card-picture" data-bind="profilePicture: $data">
									<div class="profile-pic c1">
										He
									</div>
								</div>
								<ul>
									<li class="name">
										<i class="icon icon-coupon" data-bind="visible: clients_coupons().length &gt; 0, event: { mouseover: function(c, e) {return $parent.showCouponDetail($data, e)}, mouseout: $parent.hideCouponDetail }" style="display: none;"></i><span data-bind="text: name">hey</span>
									</li>
									<li data-bind="text: email"></li>
									<li data-bind="text: phone"></li>
								</ul> </a>
							</li>
							<!-- /ko -->
							<!-- ko if: isOverLimit --><!-- /ko -->

							<!-- ko ifnot: isOverLimit -->
							<li class="client-card">
								<a href="https://app.reservio.com/en/login/#/clients/detail/2" data-bind="attr: {href: &#39;#/clients/detail/&#39;+id()}">
								<div class="client-card-picture" data-bind="profilePicture: $data">
									<div class="profile-pic c2">
										Hi
									</div>
								</div>
								<ul>
									<li class="name">
										<i class="icon icon-coupon" data-bind="visible: clients_coupons().length &gt; 0, event: { mouseover: function(c, e) {return $parent.showCouponDetail($data, e)}, mouseout: $parent.hideCouponDetail }" style="display: none;"></i><span data-bind="text: name">hi</span>
									</li>
									<li data-bind="text: email"></li>
									<li data-bind="text: phone">
										1112341223
									</li>
								</ul> </a>
							</li>
							<!-- /ko -->
							<!-- ko if: isOverLimit --><!-- /ko -->
						</ul>
						<!-- /ko -->
						<!-- ko if: !clientsLoading() && clients().length == 0 --><!-- /ko -->
					</div>
					<div class="clear"></div>
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