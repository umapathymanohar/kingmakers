<html>
<head>
	<meta charset="UTF-8">
	<title>Payment</title>


	<style>
		body{
			
			display: block;
			font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
			font-size: 12px;
			height: 199px;
			line-height: 18px;
			margin-bottom: 0px;
			margin-left: 0px;
			margin-right: 0px;
			margin-top: 0px;
			
		}
		.container{
			color: rgb(128, 128, 132);
			display: block;
			font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
			font-size: 12px;
			height: 436px;
			line-height: 18px;
			
			margin-right: 161.5px;
			width: 740px;
		}

		hr {
			margin: 18px 0;
			border: 0;
			
			border-top-width: 1px;
			border-top-style: solid;
			border-top-color: #000;

			border-bottom-width: 1px;
			border-bottom-style: solid;
			border-bottom-color: white;

		}

		hr.space {
			border: none !important;
		}

		form {
			margin: 0 0 18px;
		}


		legend {
			display: block;
			width: 100%;
			padding: 0;
			margin-bottom: 27px;
			font-size: 19.5px;
			line-height: 36px;
			color: #333333;
			border: 0;
			border-bottom-width: 1px;
			border-bottom-style: solid;
			border-bottom-color: #eee;

			
		}


		legend {
			font-size: 13px !important;
			font-weight: bold;
			
			border-bottom-width: 1px;
			border-bottom-style: solid;
			border-bottom-color: #000;

			line-height: 25px;
			margin-bottom: 0;
		}


		.row-fluid {
			width: 100%;
		}


		.row-fluid:after {
			clear: both;
		}


		.row-fluid > [class*="span"]:first-child {
			margin-left: 0;

		}
		.row-fluid > .span6 {
			width: 48.936%;
		}

		.row-fluid > [class*="span"] {
			float: left;
			margin-left: 2.128%;
		}

		.form-horizontal .control-group {
			margin-bottom: 18px;
		}


		.form-horizontal .control-group:after {
			clear: both;
		}


		.form-horizontal .control-label {
			float: left;
			width: 140px;
			padding-top: 5px;
			text-align: right;
		}

		label {
			font-size: 12px !important;
		}

		label {
			display: block;
			margin-bottom: 5px;
			color: #333333;
		}

		.form-horizontal .controls {
			margin-left: 160px;
			line-height: 30px;
		}

		td {
			text-align: right; 
		}

	</style>

</head>
<body>
	

	<?php 


	$results = DB::select('SELECT sr.id, sr.studentDateOfJoining, sr.student_id,  fc.courseFees, fc.studentCourse,  fc.remainingAmount, sr.studentName, fc.initialPayment  FROM studentregistrations as sr inner join feecollections as fc on fc.student_id = sr.student_id  where sr.id ="' . $id . '"');

	?>



	<div class="container">
		<div style="text-align:center">

			<img width="350" src="http://www.indicushost.com/kingmakers/public/assets/images/logo.png" alt="">
	<p>S-48, 20th Street, 6th Avenue, (Near K-4 Police Station), Anna Nagar, Chennai - 600 040.</p>			
	<h3>FEE RECEIPT</h3>
		</div>
	

	<table style="font-size:12px;">
			
				<tr>
					<td width="350">&nbsp;</td>
					
					<td style="text-align:left" width="100"><b>Reciept Number:</b></td>
					<td ><b>KM00{{$results[0]->id}}</b></td>
				</tr>

				<tr>
					<td width="350">&nbsp;</td>
					
					<td style="text-align:left" width="100"><b>Date & Time:</b></td>
					<td ><b>{{date('d-m-Y H:i:s')}}</b></td>
				</tr>

			</table>
			
		<form class="form-horizontal" s >


			<legend style="text-align:center">

			</legend>


			<table style="font-size:12px;">
				<tr>
					<td style="text-align:left" width="75"><b>Student Name:</b></td>
					<td style="text-align:left" width="50"><b>{{$results[0]->studentName}}</b></td>
					<td width="50">&nbsp;</td>
					<td width="50"></td>
					<td style="text-align:left" width="100"><b>Student Course:</b></td>
					<td ><b>{{$results[0]->studentCourse}}</b></td>
				</tr>
				<tr>
					<td style="text-align:left"><b>Student ID:</b></td>
					<td style="text-align:right"><b>{{$results[0]->student_id}}</b></td>
				 
				</tr>

			</table>
			

		 		
			<div class="row-fluid" style="border-top:1px solid #000;">
				 
				<table>
					<tbody>
				 

						<tr>
							<td style="text-align:left"><b>Total Fees (in Rs.)</b></td>
							<td style="text-align:right">{{$results[0]->courseFees}}</td>
							<td width="100">&nbsp;</td>
							<td width="150" style="text-align:left"><b>Joining Date</b></td>
							<td style="text-align:right">{{$results[0]->studentDateOfJoining}}</td>

						</tr>
						<tr>
							<td style="text-align:left" width="75"><b>Initial Payment(in Rs.)</b></td>
							<td style="text-align:right" width="120">{{$results[0]->initialPayment}}</td>
							<td width="50">&nbsp;</td>
							<td style="text-align:left"><b>Payment Date</b></td>
							<td style="text-align:right">{{$results[0]->studentDateOfJoining}}</td>
			
						</tr>

						<tr>
							<td></td>
							<td></td>
						 <td width="50">&nbsp;</td>
							<td style="text-align:left"><b>Payment Amount (in Rs.)</b></td>
							<td style="text-align:right">{{$results[0]->initialPayment}}</td>

						</tr>
					</tbody>
				</table>
			 
				<hr> 
<hr class="space">  
 
<table>
					<tbody>
					<tr>
						<td style="width:100px; float:left">Student Copy</td>
						<td style="width:575px; float:right">Issuing Authority</td>
					</tr>
					</tbody>
				</table>
						
<hr class="space"> 
			
				<hr style="border:none; border-bottom:1px dashed #ccc">

			</div>

		</form>
	</div>



	<div class="container">
		<div style="text-align:center">

			<img width="350" src="http://www.indicushost.com/kingmakers/public/assets/images/logo.png" alt="">
	<p>S-48, 20th Street, 6th Avenue, (Near K-4 Police Station), Anna Nagar, Chennai - 600 040.</p>			
	<h3>FEE RECEIPT</h3>
		</div>
	

	<table style="font-size:12px;">
			
				<tr>
					<td width="350">&nbsp;</td>
					
					<td style="text-align:left" width="100"><b>Reciept Number:</b></td>
					<td ><b>KM00{{$results[0]->id}}</b></td>
				</tr>

				<tr>
					<td width="350">&nbsp;</td>
					
					<td style="text-align:left" width="100"><b>Date & Time:</b></td>
					<td ><b>{{date('d-m-Y H:i:s')}}</b></td>
				</tr>

			</table>
			
		<form class="form-horizontal" s >


			<legend style="text-align:center">

			</legend>


			<table style="font-size:12px;">
				<tr>
					<td style="text-align:left" width="75"><b>Student Name:</b></td>
					<td style="text-align:left" width="50"><b>{{$results[0]->studentName}}</b></td>
					<td width="50">&nbsp;</td>
					<td width="50"></td>
					<td style="text-align:left" width="100"><b>Student Course:</b></td>
					<td ><b>{{$results[0]->studentCourse}}</b></td>
				</tr>
				<tr>
					<td style="text-align:left"><b>Student ID:</b></td>
					<td style="text-align:right"><b>{{$results[0]->student_id}}</b></td>
				 
				</tr>

			</table>
			

		 		
			<div class="row-fluid" style="border-top:1px solid #000;">
				 
				<table>
					<tbody>
				 

						<tr>
							<td style="text-align:left"><b>Total Fees (in Rs.)</b></td>
							<td style="text-align:right">{{$results[0]->courseFees}}</td>
							<td width="100">&nbsp;</td>
							<td width="150" style="text-align:left"><b>Installment Date</b></td>
							<td style="text-align:right"> {{$results[0]->studentDateOfJoining}}</td>

						</tr>
						<tr>
							<td style="text-align:left" width="75"><b>Initial Payment(in Rs.)</b></td>
							<td style="text-align:right" width="120">{{$results[0]->initialPayment}}</td>
							<td width="50">&nbsp;</td>
							<td style="text-align:left"><b>Payment Date</b></td>
							<td style="text-align:right">{{$results[0]->studentDateOfJoining}}</td>
			
						</tr>
 

						<tr>
							<td></td>
							<td></td>
						 <td width="50">&nbsp;</td>
							<td style="text-align:left"><b>Payment Amount (in Rs.)</b></td>
							<td style="text-align:right">{{$results[0]->initialPayment}} </td>

						</tr>
					</tbody>
				</table>
			 
				<hr> 
 <hr class="space"> 
<table>
					<tbody>
					<tr>
						<td style="width:100px; float:left">Academy Copy</td>
						<td style="width:575px; float:right">Issuing Authority</td>
					</tr>
					</tbody>
				</table>
						
			
		

			</div>

		</form>
	</div>

</body>
</html>