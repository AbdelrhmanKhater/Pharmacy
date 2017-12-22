<script>
window.onload = function(){
	
	$( "#form" ).on( "submit", function( event ) {
		event.preventDefault();

  console.log( $( this ).serializeArray() );
		Send("./php/Pharmacies_ctrl.php","POST",function(data){
			
		},$( this ).serialize());	
	});
}
</script>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Pharmacies Management</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->

		<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Add a new branch
					</div>

					<div class="panel-body">

						<div class="row">

							<div class="col-lg-12">
								<form role="form" id="form">
								<label>Pharmacy ID</label>
								<div class="form-group input-group">
									<span class="input-group-addon">@</span>
									<input type="text" name="Pharmacy_Number" class="form-control" placeholder="Use a unique single letter, or leave empty for auto generation.">
								</div>
								<div class="form-group">
									<label>Address</label>
									<input class="form-control" name="Pharmacy_Address" placeholder="Enter text">
								</div>
								<div class="form-group">
									<label>Phone Numbers</label>
									<div id="phoneBoxList">
										<input class="form-control phoneBox" name="addPhone[]" placeholder="Ex: 1003004000, 555-111-999">
									</div>
									
									<div class="formAddButtonDiv">
										<span class="formAddButton btn btn-primary btn-xs" onclick="formAddBox('pharmacy','phone')">
											<i class="fa fa-plus"></i> Add Phone
										</span>
									</div>
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
						Modify an existing branch
					</div>

					<div class="panel-body">

						<div class="row">

							<div class="col-lg-12">
								<form role="form">
								<div class="form-group">
									<label>Pharmacy</label>
									<select class="form-control">
										<option>Select pharmacy..</option>
										<option>A</option>
										<option>B</option>
										<option>C</option>
									</select>
								</div>
									<fieldset disabled>
										<div class="form-group">
											<label>Address</label>
											<input class="form-control" placeholder="Enter text">
										</div>
										<div class="form-group">
											<label>Phone Numbers</label>
											<input class="form-control" placeholder="Ex: 1003004000, 555-111-999">
											<p>Separate multiple phone numbers by comma.</p>
										</div>
										<div class="form-group">
											<label>Admin Employee</label>
											<select class="form-control">
												<option>Select employee..</option>
											</select>
										</div>
										<button type="submit" class="btn btn-primary">Apply Changes</button>
										<button type="submit" class="btn btn-danger">Remove Branch</button>
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
