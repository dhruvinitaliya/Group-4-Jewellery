<?php
require('fpdf/fpdf.php');
require 'class/cart.php';

session_start();
$user_id =  $_SESSION["id"];

class PDF extends FPDF {
    function Header() {
        $this->SetFont('Arial','B',16);
        $this->Cell(0,10,'Shopping Cart Summary',0,1,'C');
        $this->Ln(10); 
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

$cart = new Cart();
$cart_items = $cart->getCartItemsForUser($user_id);

$total = 0;

$pdf->Cell(0, 10, 'User Details', 0, 1, 'L');
$pdf->Cell(0, 10, 'Name: ' . $_SESSION["user"]['name'], 0, 1, 'L');
$pdf->Cell(0, 10, 'Email: ' . $_SESSION["user"]['email'], 0, 1, 'L');
$pdf->Ln(10); 


$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(50, 10, 'Product', 1, 0, 'C');
$pdf->Cell(50, 10, 'Quantity', 1, 0, 'C');
$pdf->Cell(40, 10, 'Price', 1, 0, 'C');
$pdf->Cell(40, 10, 'Total', 1, 1, 'C'); 


$pdf->SetFont('Arial', '', 12);


foreach ($cart_items as $item) {
    $item_total = $item['price'] * $item['quantity'];
    $total += $item_total;
    $pdf->Cell(50, 10, $item['name'], 1, 0);
    $pdf->Cell(50, 10, $item['quantity'], 1, 0);
    $pdf->Cell(40, 10, '$' . $item['price'], 1, 0, 'R');
    $pdf->Cell(40, 10, '$' . number_format($item_total, 2), 1, 1, 'R'); 
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(140, 10, 'Total', 1, 0);
$pdf->Cell(40, 10, '$' . number_format($total, 2), 1, 1, 'R');

$pdf->Output('D', 'ShoppingCartSummary.pdf');
?>
