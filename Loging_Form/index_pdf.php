<?php
	ini_set('display_errors', '1');
	include_once(functions.php);
	function fetch_data() {
		$output = '';
		//$con = mysqli_connect('localhost','root','root','books_db');
		$query = "SELECT * FROM stage_1";
		$result = mysqli_query($con, $query);
		//var_dump($result);
		while($row = mysqli_fetch_array($result)) {
			$output .= '
				<tr>
					<td> '.$row['id'].' </td>
					<td> '.$row['username'].' </td>
					<td> '.$row['password'].' </td>
					<td> '.$row['email'].' </td>
				</tr>
			';
		}
		return $output;
	}

	if(isset($_POST['create-pdf'])) {
		require_once("tcpdf/tcpdf.php");  //including class librarry of TCPDF
		$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		//this object create new document
		$obj_pdf->SetCreator(PDF_CREATOR);
		$obj_pdf->SetTitle("Export HTML Table Date to PDF using TCPDF in PHP"); 
		$obj_pdf->SetHeaderData('','', PDF_HEADER_TITLE, PDF_HEADER_STRING);
		$obj_pdf->SetHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$obj_pdf->SetFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA)); 
		$obj_pdf->SetDefaultMonospacedFont('helvetica');
		$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER); 
		$obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
		$obj_pdf->setPrintHeader(false);
		$obj_pdf->setPrintFooter(false);  //or true
		$obj_pdf->SetAutoPageBreak(TRUE, 10);
		$obj_pdf->SetFont('helvetica','', 12);

		$content = '';
		
		$content = '
			<h3 align="center"> Export HTML Table Date to PDF using TCPDF in PHP </h3>
			<table border="1" cellspacing="0" cellpadding""5>
				<tr>
					<th width="5%">ID</th>
					<th width="30%">User Name</th>
					<th width="20%">Password</th>
					<th width="20%">Email</th>
				</tr>
		';

		$content .= fetch_data();
		$content .= '</table>';

		$obj_pdf->writeHTML($content); //through this function we can print data in html fomate
		$obj_pdf->Output("sample.pdf", "I");

	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>TCPDF</title>
	<meta http-equiv="X-UA-compatible" content="IE-edge">
	<meta name="viewport" content="width-device-width">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
</head>
<body>
	<br /><br />
	<div class="container" style="width: 700px;">
		<h3 align="center">Export HTML Data to PDF Using TCPDF in PHP </h3>
		<br />
		<dir class="table-responsive">
			<table class="table table-bordered">
				<tr>
					<th width="5%">ID</th>
					<th width="30%">User Name</th>
					<th width="20%">Password</th>
					<th width="20%">Email</th>
				</tr>
				<?php

				echo fetch_data();

				?>
				
			</table>
			<br/>
			<form method="post">
				<input type="submit" class="btn btn-danger" name="create-pdf" value="Create PDF">
			</form>	
		</dir>
	</div>

</body>
</html>