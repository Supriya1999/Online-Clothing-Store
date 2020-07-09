<?php
require('fpdf18/fpdf.php');

//db connection
include('server.php');

//get invoices data
$query = mysqli_query($db,"select * from orders
	inner join address using(orderid)
	where
	orderid = '".$_GET['order']."'");
$invoice = mysqli_fetch_array($query);

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130	,5,'Cloths & Carts',0,0);
$pdf->Cell(59	,5,'INVOICE',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130	,5,'TCOER',0,0);
$pdf->Cell(59	,5,'',0,1);//end of line

$pdf->Cell(130	,5,'Pune, India',0,0);
$pdf->Cell(25	,5,'Date',0,0);
$pdf->Cell(26	,5,'27/10/2018',0,1);//end of line

$pdf->Cell(130	,5,'Phone [+12345678]',0,0);
$pdf->Cell(25	,5,'User:',0,0);
$pdf->Cell(34	,5,$invoice['user'],0,1);//end of line

$pdf->Cell(130	,5,'Fax [+12345678]',0,0);
$pdf->Cell(25	,5,'OrderID:',0,0);
$pdf->Cell(34	,5,$_GET['order'],0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//billing address
$pdf->Cell(100	,5,'Bill to',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$invoice['fname'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$invoice['lname'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$invoice['newaddress'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$invoice['phone'],0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(130	,5,'Description',1,0);
$pdf->Cell(25	,5,'Quantity',1,0);
$pdf->Cell(34	,5,'Amount',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

//items
$query = mysqli_query($db,"select * from orders inner join product using(pid) where orderid = '".$_GET['order']."'");
$tax = 100; //total tax
$amount = 0; //total amount
$delivery=50;
//display the items
while($item = mysqli_fetch_array($query)){
	$pdf->Cell(130	,5,$item['pname'],1,0);
	//add thousand separator using number_format function
	$pdf->Cell(25	,5,number_format($item['quantity']),1,0,'M');
	$pdf->Cell(34	,5,number_format($item['price']),1,1,'R');//end of line
	//accumulate tax and amount
	$amount=$item['amount']-150;

}

//summary
$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Subtotal',0,0);
$pdf->Cell(7	,5,'Rs',1,0);
$pdf->Cell(27	,5,number_format($amount),1,1,'R');//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Tax Rate',0,0);
$pdf->Cell(7	,5,'Rs',1,0);
$pdf->Cell(27	,5,'100',1,1,'R');//end of line


$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Delivery',0,0);
$pdf->Cell(7	,5,'Rs',1,0);
$pdf->Cell(27	,5,'50',1,1,'R');//end of line


$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Total Due',0,0);
$pdf->Cell(7	,5,'Rs',1,0);
$pdf->Cell(27	,5,number_format($amount + $tax+$delivery),1,1,'R');//end of line





















$pdf->Output();
?>
