@extends('layout.default')

<div id="layouts" data-bind="loading: loading">
	<div class="loader" style="display: none;">
		<div class="progress"></div>
	</div>

	<div data-bind="with: currentPage">
		<div data-bind="template: {name: &#39;layout-&#39;+layout+&#39;-tpl&#39;, data: view.viewModel, afterRender: view.pageAfterRender}">
			<div class="canvas full">
				<div class="page-960">
					<div id="content" class="content" data-bind="template: tpl(), visible: !view.loading()">
						<h1><i class="icon icon-globe"></i> Receive appointments online</h1>

						<div class="promote-booking-site paper-block">
							<div class="site-example promote-image macbook">
								<a class="overlay" href="https://hans-c.reservio.com/" target="_blank" data-bind="click: openPageImage"> <span class="btn btn-grey">Show booking page</span> </a>
							</div>

							<h2>Your booking page</h2>
							<p>
								Clients can easily book online on this page. Your schedule and business information are also available here.
							</p>

							<div class="site-address">
								<span class="link"> <span data-bind="click: selectAddress" class="text"> https://hans-c.reservio.com/ <a data-bind="click: openPage" href="https://hans-c.reservio.com/" target="_blank" title="Open in new window"><i class="icon icon-new-window"></i></a> </span> <span class="arrow"></span> </span>
							</div>
							<p class="site-address-tip">
								Tip: Copy this link and share it with your clients.
							</p>

							<h3><span>Share your page</span></h3>
							<ul class="share-options">
								<li class="facebook">
									<a data-bind="click: shareOnFacebook" href="https://app.reservio.com/en/login/#" title="Share on Facebook" class="icon icon-share-facebook"></a>
								</li>
								<li class="twitter">
									<a data-bind="click: shareOnTwitter" href="https://app.reservio.com/en/login/#" title="Tweet" class="icon icon-share-twitter"></a>
								</li>
								<li class="gplus">
									<a data-bind="click: shareOnGplus" href="https://app.reservio.com/en/login/#" title="Share on Google+" class="icon icon-share-gplus"></a>
								</li>
								<!--<li class="email"><a href="#" title="Send by e-mail" class="icon icon-share-email"></a></li>-->
							</ul>

							<div class="clear"></div>
						</div>

						<div class="promote-booking-integration paper-block">
							<h2>Booking for website</h2>
							<p>
								Have your own website or Facebook Page? Add booking form with these simple plugins.
							</p>
							<ul class="integration-options">
								<li>
									<a data-bind="click: getButtonClicked" href="https://app.reservio.com/en/login/#">
									<div class="promote-image button">
										<span>Your website</span>
									</div> </a>
									<h3>Booking Button</h3>
									<p>
										Style your button and start accepting bookings on your website.
									</p>
									<a data-bind="click: getButtonClicked" href="https://app.reservio.com/en/login/#" class="btn btn-grey">Get button</a>
								</li>
								<li>
									<a data-bind="click: getTextLinkClicked" href="https://app.reservio.com/en/login/#">
									<div class="promote-image link">
										<span>Your website</span>
									</div> </a>
									<h3>Text Link</h3>
									<p>
										Quickly link to your online booking form from anywhere.
									</p>
									<a data-bind="click: getTextLinkClicked" href="https://app.reservio.com/en/login/#" class="btn btn-grey">Get link</a>
								</li>
								<li class="last-col">
									<a data-bind="click: installFbTabClicked" href="https://app.reservio.com/en/login/#">
									<div class="promote-image facebook">
										<span>Your page</span>
									</div> </a>
									<h3>Booking for Facebook Page</h3>
									<div data-bind="template: {name: fbTabTpl(), data: $root.data.account().fbPage}">
										<p>
											Let your fans easily book appointment from Facebook.
										</p>
										<a data-bind="click: $parent.installFbTabClicked" href="https://app.reservio.com/en/login/#" class="btn btn-grey">Add Facebook tab</a>
									</div>
								</li>
							</ul>
							<div class="clear"></div>
						</div>

						<div class="clear"></div>
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