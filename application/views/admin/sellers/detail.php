<?php $this->load->view('templates/meta_tags'); ?>
</head>
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">

	<!--NAVBAR-->
	<!--===================================================-->
	<?php $this->load->view('templates/head_navbar'); ?>
	<!--===================================================-->
	<!--END NAVBAR-->

	<div class="boxed">

		<!--CONTENT CONTAINER-->
		<!--===================================================-->
		<div id="content-container">
			<div id="page-head">
				<!--Page Title-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<div id="page-title">
					<h1 class="page-header text-overflow">Seller</h1>
				</div>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End page title-->
				<!--Breadcrumb-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Dashboard</a></li>
					<li>All sellers</li>
					<li class="active">Philip Sokoya</li>
				</ol>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End breadcrumb-->
			</div>
			<!--Page content-->
			<!--===================================================-->
			<div id="page-content">

				<div class="row">
					<div class="col-md-6">
						<div class="panel">
							<div class="panel-body text-center">
								<img alt="Profile Picture" class="img-md img-circle mar-btm"
									 src="/admin/assets/img/profile-photos/1.png">
								<p class="text-lg text-semibold mar-no text-main"><?= ucwords($seller->first_name . ' ' . $seller->last_name); ?></p>
								<p class="text-semibold mar-no text-main">Registration No : <?= $seller->reg_no; ?></p>
								<p class="text-muted"><?= $seller->legal_company_name; ?></p>

								<?php if ($seller->account_status == "pending") : ?>
									<button class="btn btn-primary mar-ver"><i class="demo-pli-lock-user icon-fw"></i>Approve
										Seller
									</button>
									<button class="btn btn-danger mar-ver"><i class="demo-pli-checked-user icon-fw"></i>Reject
										Seller
									</button>
								<?php else : ?>
									<button class="btn btn-danger mar-ver"><i class="demo-pli-lock-user icon-fw"></i>Block
									</button>
									<button class="btn btn-primary mar-ver"><i
											class="demo-pli-checked-user icon-fw"></i>Verify
									</button>
									<button class="btn btn-warning mar-ver"><i
											class="demo-pli-warning-window icon-fw"></i>Suspend
									</button>
								<?php endif; ?>
								<ul class="list-unstyled text-center bord-top pad-top mar-no row">
									<li class="col-xs-4">
										<span class="text-lg text-semibold text-main">1,245</span>
										<p class="text-muted mar-no">Sold Items</p>
									</li>
									<li class="col-xs-4">
										<span class="text-lg text-semibold text-main">24</span>
										<p class="text-muted mar-no">Active Promotions</p>
									</li>
									<li class="col-xs-4">
										<span class="text-lg text-semibold text-main">450</span>
										<p class="text-muted mar-no">All Products</p>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="tab-base">

							<!--Nav tabs-->
							<ul class="nav nav-tabs tabs-right">
								<li class="active">
									<a data-toggle="tab" href="#demo-rgt-tab-1">Details</a>
								</li>
								<li>
									<a data-toggle="tab" href="#demo-rgt-tab-2">Bank Details</a>
								</li>
								<li>
									<a data-toggle="tab" href="#demo-rgt-tab-3">Account Details</a>
								</li>
								<li>
									<a data-toggle="tab" href="#demo-rgt-tab-4">Settings</a>
								</li>
							</ul>

							<!--Tabs Content-->
							<div class="tab-content">
								<div id="demo-rgt-tab-1" class="tab-pane fade active in">
									<p class="text-main text-semibold">Email</p>
									<p><?= $seller->email; ?></p>
									<p class="text-main text-semibold">Company Name</p>
									<p><?= $seller->legal_company_name; ?></p>
									<p class="text-main text-semibold">Address</p>
									<p><?= $seller->address; ?></p>
									<p class="text-main text-semibold">Registration No</p>
									<p><?= $seller->reg_no; ?></p>
									<p class="text-main text-semibold">Main Category</p>
									<p><?= $seller->main_category; ?></p>
									<p class="text-main text-semibold">Terms & Conditions</p>
									<p><?= $seller->terms; ?></p>
								</div>
								<div id="demo-rgt-tab-2" class="tab-pane fade">
									<p class="text-main text-semibold">Bank Name</p>
									<p><?= $seller->bank_name; ?></p>
									<p class="text-main text-semibold">Account Name</p>
									<p><?= $seller->account_name; ?></p>
									<p class="text-main text-semibold">Account Number</p>
									<p><?= $seller->account_number; ?></p>
									<p class="text-main text-semibold">Bvn Number</p>
									<p><?= $seller->bvn; ?></p>

								</div>
								<div id="demo-rgt-tab-3" class="tab-pane fade">
									<p class="text-main text-semibold">Products Active?</p>
									<p><?= ($seller->disable_products == 1) ? 'Active' : 'Not Active'; ?></p>
									<p class="text-main text-semibold">Account Status</p>
									<p>
										<button
											class="btn btn-<?= ($seller->account_status == 'approved' || $seller->account_status == 'verified') ? 'success' : 'danger' ?> btn-rounded"><?= ucwords($seller->account_status); ?></button>
									</p>
									<p><strong><?= $seller->account_status; ?></strong></p>
									<p class="text-main text-semibold">Date Registered</p>
									<p><?= neatDate($seller->date_registered); ?></p>
									<p class="text-main text-semibold">Last Login</p>
									<p><?= neatDate($seller->last_login); ?></p>
									<p class="text-main text-semibold">IP Address</p>
									<p><?= $seller->ip; ?></p>
								</div>
								<div id="demo-rgt-tab-4" class="tab-pane fade">
									<p class="text-main text-semibold">Overall Settings</p>
									<p>Coming Soon...</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--===================================================-->
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Philip Sokoya Products</h3>
					</div>
					<div class="panel-body">
						<table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0"
							   width="100%">
							<thead>
							<tr>
								<th>Product Id</th>
								<th>Name</th>
								<th class="min-tablet">SKU</th>
								<th class="min-tablet">Quantity Sold</th>
								<th class="min-desktop">Product Status</th>
								<th class="min-desktop">Created At</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>1542</td>
								<td>Samsung Galaxy S9 - BLACK (Dual Sim) - Official Warranty</td>
								<td>X5PJUH</td>
								<td>61</td>
								<td>
									<div class="label label-table label-success">Approved</div>
								</td>
								<td>10/6/2018</td>
							</tr>
							<tr>
								<td>1532</td>
								<td>Samsung Galaxy J6 - Purple</td>
								<td>BYZZSP</td>
								<td>None Sold</td>
								<td>
									<div class="label label-table label-danger">Pending</div>
								</td>
								<td>10/17/2018</td>
							</tr>
							<tr>
								<td>1525</td>
								<td>Nokia - 2 - 5&quot; - 1GB RAM, 8GB ROM - Android 7.0 8MP + 5MP - White</td>
								<td>31WUJE</td>
								<td>82</td>
								<td>
									<div class="label label-table label-success">Approved</div>
								</td>
								<td>10/2/2018</td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!--===================================================-->
				<!--End page content-->
			</div>
		</div>
		<!--===================================================-->
		<!--End page content-->
		<!--===================================================-->
		<!--END CONTENT CONTAINER-->


		<!--ASIDE-->
		<!--===================================================-->
		<?php $this->load->view('templates/aside_menu'); ?>
		<!--===================================================-->
		<!--END ASIDE-->

		<!--MAIN NAVIGATION-->
		<!--===================================================-->
		<?php $this->load->view('templates/menu'); ?>
		<!--===================================================-->
		<!--END MAIN NAVIGATION-->

	</div>


	<!-- FOOTER -->
	<!--===================================================-->
	<?php $this->load->view('templates/footer'); ?>
	<!--===================================================-->
	<!-- END FOOTER -->


	<!-- SCROLL PAGE BUTTON -->
	<!--===================================================-->
	<button class="scroll-top btn">
		<i class="pci-chevron chevron-up"></i>
	</button>
	<!--===================================================-->
</div>
<!--===================================================-->
<!-- END OF CONTAINER -->
<!--JAVASCRIPT-->
<!--=================================================-->


<?php $this->load->view('templates/scripts'); ?>
<script>
	$('#demo-dt-basic').dataTable({
		"responsive": true,
		"language": {
			"paginate": {
				"previous": '<i class="demo-psi-arrow-left"></i>',
				"next": '<i class="demo-psi-arrow-right"></i>'
			}
		}
	});

</script>
<!--	<script src="/assets/plugins/datatables/media/js/jquery.dataTables.js"></script>-->
</body>

</html>
