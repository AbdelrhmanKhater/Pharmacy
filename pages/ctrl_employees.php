<script>

	
window.onload=function(){
	$( "#AddEmpForm" ).on( "submit", function( event ) {
		//prevent default event of submit button
		event.preventDefault();	
		
		//
		var opACC 	= $('input[name=optionsACC]:checked').val();
		var opSH 	= $('input[name=optionsShift]:checked').val();
		var opPH	= $('#optionsPH').val();
		var Username= $('#Username').val();
		var Password= $('#Password').val();
		var FName 	= $('#FName').val();
		var LName 	= $('#LName').val();
		var Address = $('#Address').val();
		var Salary 	= $('#Salary').val();
		var Phone 	= $('#Phone').val();
		
		
		Send("./php/Employees_ctrl.php?action=add","POST",function(data){
			alert(data.type);
			$("#resAddEmp").click();
			$("#resModiEmp").click();
		},"Pharmacy_ID="+opPH+"&FName="+FName+"&LName="+LName+"&Phone="+Phone+"&Address="+Address+"&User_Name="+Username+"&Password="+Password+"&Salary="+Salary+"&Type="+opACC+"&Shift="+opSH);
		
	});
	
	
	$( "#DelEmp" ).on( "click", function( event ) {
		var Empolyee_ID = $('#Empolyee_ID').val();
		Send("./php/Employees_ctrl.php?action=delete","POST",function(data){
		   alert(data.msg);
		   $("#resModiEmp").click();
		   $('#field').prop('disabled', true);
		},"Empolyee_ID="+Empolyee_ID);
	});
	
	
	$( "#EUsername" ).autocomplete({
			minLength:1,
			
			source: function( request, response ) {
				Send("./php/Employees_ctrl.php?action=auto","POST", function (data) {
					response($.map(data, function (value, key) {
						return {
							label: value.User_Name,
							value: value.Empolyee_ID
						};
					}),);
				},"q=" + request.term);
			},
			
			select: function( event, ui ){
				Send("./php/Employees_ctrl.php?action=number","POST",function (data){
					if(data !="null"){
						//$('input[name=EoptionsACC]:checked').val();
						//$('input[name=EoptionsShift]:checked').val();
						//$('#EoptionsPH').val();
						$('#EUsername').val(data.User_Name);
						$('#EEUsername').val(data.User_Name);
						$('#EFName').val(data.FName);
						$('#ELName').val(data.LName);
						$('#EAddress').val(data.Address);
						$('#ESalary').val(data.Salary);
						$('#EPhone').val(data.Phone);
						$('#EHire_date').val(data.Hire_Date);
						$('#Empolyee_ID').val(data.Empolyee_ID);
						$("#field").removeAttr('disabled');
					}
				},"q="+ui.item.value);
				return false;
			}
	});
	
	$( "#EditEmpForm" ).on( "submit", function( event ) {
		//prevent default event of submit button
		event.preventDefault();	
		//get all fields values
		var opACC 	= $('input[name=EoptionsACC]:checked').val();
		var opSH 	= $('input[name=EoptionsShift]:checked').val();
		var opPH	= $('#EoptionsPH').val();
		var Username= $('#EEUsername').val();
		var Password= $('#EPassword').val();
		var FName 	= $('#EFName').val();
		var LName 	= $('#ELName').val();
		var Address = $('#EAddress').val();
		var Salary 	= $('#ESalary').val();
		var Phone 	= $('#EPhone').val();
		var Hire_Date=$('#EHire_date').val();
		var Empolyee_ID = $('#Empolyee_ID').val();
		
		//call php file to store data in DB with action=add
		Send("./php/Employees_ctrl.php?action=edit","POST",function(data){
			alert(data.msg);
		},"Empolyee_ID="+Empolyee_ID+"&Pharmacy_ID="+opPH+"&FName="+FName+"&LName="+LName+"&Phone="+Phone+"&Address="+Address+"&User_Name="+Username+"&Password="+Password+"&Salary="+Salary+"&Type="+opACC+"&Shift="+opSH+"&Hire_Date="+Hire_Date);
	
	});
	
	
	
	
}

</script>

<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Employees Management</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->

		<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Add a new employee
					</div>

					<div class="panel-body">

						<div class="row">

							<div class="col-lg-12">
								<form id="AddEmpForm" role="form">
									<label>Username</label>
									<div class="form-group input-group">
										<span class="input-group-addon">@</span>
										<input id="Username" type="text" class="form-control" placeholder="Username">
									</div>
									<div class="form-group">
										<label>Password</label>
										<input id="Password" class="form-control" type="password">
										<p class="help-block">This will be modified by the employee later.</p>
									</div>
									<div class="form-group">
										<label>First Name</label>
										<input id="FName" class="form-control" placeholder="Enter text">
									</div>
									<div class="form-group">
										<label>Last Name</label>
										<input id="LName" class="form-control" placeholder="Enter text">
									</div>
									<div class="form-group">
										<label>Address</label>
										<input id="Address" class="form-control" placeholder="Enter text">
									</div>
									<div class="form-group">
										<label>Salary</label>
										<input id="Salary" class="form-control" placeholder="Enter text">
									</div>
									<div class="form-group">
										<label>Phone</label>
										<input id="Phone" class="form-control" placeholder="Enter text">
									</div>
									<div class="form-group">
										<label>Pharmacy</label>
										<select id="optionsPH" class="form-control">
											<option></option>
										<?
											
											include_once("php/MySQLi.php");
											$res=$db->fetch("SELECT Pharmacy_ID FROM pharmacies",true);
											for($i=0;$i<count($res);$i++)
												ECHO "<option value=".$res[$i]['Pharmacy_ID'].">".$res[$i]['Pharmacy_ID']."</option>";

										?>
										</select>
									</div>
									<div class="form-group">
										<label>Account Type</label>
										<div class="radio">
											<label>
												<input type="radio" name="optionsACC" value="Admin" checked>Admin
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="optionsACC" value="Sales">Sales
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="optionsACC" value="Pharmacist">Pharmacist
											</label>
										</div>
									</div>
								
									<div class="form-group">
										<label>Shift</label>
										<div class="radio">
											<label>
												<input type="radio" name="optionsShift" value="A" checked>A
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="optionsShift" value="B">B
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="optionsShift" value="C">C
											</label>
										</div>
									</div>
									<button type="submit" class="btn btn-default btn-success">Submit Button</button>
									<button id="resAddEmp" type="reset" class="btn btn-default">Reset Button</button>
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
						Modify current employee
					</div>

					<div class="panel-body">

						<div class="row">
							<div class="col-lg-12">
								<form id="EditEmpForm" role="form">
									
									<label>Username</label>
									<div class="form-group input-group">
										<span class="input-group-addon">@</span>
										<input id="EUsername" type="text" class="form-control" placeholder="Username">
									</div>
									<fieldset id="field" disabled>
										<label>Username</label>
										<div class="form-group input-group">
											<span class="input-group-addon">@</span>
											<input id="EEUsername" type="text" class="form-control" placeholder="Username">
										</div>
										<div class="form-group">
											<label>Password</label>
											<input id="EPassword" class="form-control" type="password">
											<p class="help-block">This will be modified by the employee later.</p>
										</div>
										<div class="form-group input-group" style="display:none">
											<input id="Empolyee_ID" type="text" class="form-control" placeholder="Search..">
										</div>
										
										<div class="form-group">
											<label for="disabledSelect">First Name</label>
											<input id="EFName" class="form-control" class="disabledInput" type="text" placeholder="Disabled input">
										</div>
										
										
										<div class="form-group">
											<label for="disabledSelect">Last Name</label>
											<input  id="ELName" class="form-control" class="disabledInput" type="text" placeholder="Disabled input">
										</div>
										<div class="form-group">
											<label>Address</label>
											<input id="EAddress" class="form-control" placeholder="Enter text">
										</div>
										<div class="form-group">
											<label>Salary</label>
											<input id="ESalary" class="form-control" placeholder="Enter text">
										</div>
										<div class="form-group">
											<label>Phone</label>
											<input id="EPhone" class="form-control" placeholder="Enter text">
										</div>
										<div class="form-group">
											<label>Pharmacy</label>
											<select id="EoptionsPH" class="form-control">
												<option></option>
												<?
													
													include_once("php/MySQLi.php");
													$res=$db->fetch("SELECT Pharmacy_ID FROM pharmacies",true);
													for($i=0;$i<count($res);$i++)
														ECHO "<option value=".$res[$i]['Pharmacy_ID'].">".$res[$i]['Pharmacy_ID']."</option>";

												?>
											</select>
										</div>
										<div class="form-group">
											<label>Hire-date</label>
											<input id="EHire_date" class="form-control" placeholder="Enter text">
										</div>
										<div class="form-group">
											<label>Account Type</label>
											<div class="radio">
												<label>
													<input type="radio" name="EoptionsACC" value="Admin" checked>Admin
												</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="EoptionsACC" value="Sales">Sales
												</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="EoptionsACC" value="Pharmacist">Pharmacist
												</label>
											</div>
											<div class="form-group">
										<label>Shift</label>
											<div class="radio">
												<label>
													<input type="radio" name="EoptionsShift" value="A" checked>A
												</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="EoptionsShift" value="B">B
												</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="EoptionsShift" value="C">C
												</label>
											</div>
										</div>
										</div>
										<button type="submit" class="btn btn-primary">Apply Changes</button>
										<button id="DelEmp" type="button" class="btn btn-danger">Remove Employee</button>
										<button id="resModiEmp" type="reset" class="btn btn-default">Reset Button</button>
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
