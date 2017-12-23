<script>
window.onload=function(){
$( "#AddCustomer" ).on( "submit", function( event ) {
  event.preventDefault();
  var name = $('#Name').val();
	var address = $('#Address').val();
	var phone = $('#Phone').val();
	Send("./php/Customers_ctrl.php","POST",function(data){
       alert(data.msg);
	},"Name="+name+"&Address="+address+"&Phone="+phone);
});
}
</script>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Customers Management</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->

		<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Add a new customer
					</div>

					<div class="panel-body">

						<div class="row">
							
							<div class="col-lg-12">
								<form role="form" id="AddCustomer">
								<div class="form-group">
									<label>Name</label>
									<input id="Name" class="form-control" placeholder="Enter name..">
								</div>
								<div class="form-group">
									<label>Address</label>
									<input id="Address" class="form-control" placeholder="Enter address..">
								</div>
								<!--<div class="form-group">
									<label>Email Address</label>
									<input class="form-control" placeholder="Enter email address..">
								</div>-->
								<div class="form-group">
									<label>Phone Number</label>
									<input class="form-control" placeholder="Ex: 1003004000">
								</div>
								<button type="submit" class="btn btn-default btn-success">Submit Button</button>
								<button type="reset" class="btn btn-default">Reset Button</button>
							</form>
							</div>

						</div>

					</div>
					<!-- /.panel-body -->
				</div>
				<!-- /.panel -->
			</div>
			<!-- /.col-lg-6 -->


			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Modify an existing customer
					</div>

					<div class="panel-body">

						<div class="row">

							<div class="col-lg-12">
								<form role="form">
									<label>Phone Numbers</label>
									<div class="form-group input-group">
										<span class="input-group-addon">#</span>
										<input class="form-control" placeholder="Ex: 1003004000">
									</div>
									<fieldset disabled>
										<div class="form-group">
											<label>Name</label>
											<input class="form-control" placeholder="Enter text">
										</div>
										<div class="form-group">
											<label>Address</label>
											<input class="form-control" placeholder="Enter text">
										</div>
										<!--<div class="form-group">
											<label>Email Address</label>
											<input class="form-control" placeholder="Enter text">
										</div>-->
										
										<button type="submit" class="btn btn-primary">Apply Changes</button>
										<button type="submit" class="btn btn-danger">Remove Customer</button>
									</fieldset>
								</form>
							</div>

						</div>

					</div>
					<!-- /.panel-body -->
				</div>
				<!-- /.panel -->
			</div>
			<!-- /.col-lg-6 -->


		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</div>
