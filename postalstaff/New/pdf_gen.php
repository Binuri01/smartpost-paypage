<?php
session_start();

require_once 'FPDF/fpdf.php';
require_once '../config/db.php';

date_default_timezone_set('Asia/Colombo');


$data = null; // initialize $data variable
$sql = "SELECT transactions.id, transactions.customer_id, transactions.product, customers.amount, transactions.created_at, transactions.status, customers.name FROM customers INNER JOIN transactions ON customers.id = transactions.customer_id";
$data = mysqli_query($con,$sql);

if(isset($_POST['btn_pdf'])){
    if(!empty($data)){
        class PDF extends FPDF{
            function __construct(){
                parent::__construct();
                $this->SetMargins(10,0,20);
            }
            
            function Header() {
                // Logo image
                $this->Image('assets/logo.png', 165, 10, 30);
            
                // Online Transactions text
                $this->SetFont('Arial', 'B', 15);
                $this->Cell(5);
                $this->Cell(30, 10, 'Online Transaction', 0, 0, 'L');

                // Horizontal line
                $this->Line(10, 38, 200, 38, 10);

                // Line break
                $this->Ln(20);
            }
           
            // Page footer
            function Footer(){
                // Position at 1.5 cm from bottom
                $this->SetY(-60);
                // Arial italic 8
                $this->SetFont('Arial','I',10);

                $this->Cell(0,10,'*This is a system generated document ',0,0,'L');
                $this->Ln(20);

                $this->SetFont('Arial','B',10);
                $this->Cell(0,10,'For more information, visit www.smartpost.lk ',0,0,'L');

                $this->SetFont('Arial','I',10);
                $date = 'Generated on: ' . date('Y-m-d H:i:s');
                $this->Cell(0,10,$date,0,1,'R');
                $this->Ln(15);

                // Page number
                $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
            }
        }
        
        $sql = "SELECT transactions.id, transactions.customer_id, transactions.product, customers.amount, transactions.created_at, transactions.status, customers.name FROM customers INNER JOIN transactions ON customers.id = transactions.customer_id WHERE transactions.id='ch_3Mve7AD6qbEya7gH1DOJYQ0P'";
        $data = mysqli_query($con,$sql);
        
        if(isset($_POST['btn_pdf'])){
            $pdf = new PDF();
            $pdf->AliasNbPages();
            $pdf->SetTopMargin(25);
            $pdf->SetFont('Arial','',12);
            $pdf->AddPage();
        
            // Arial bold 15
            $pdf->SetFont('Arial','B',20);
            // Move to the right
            $pdf->Cell(15);
            // Title
            $pdf->SetFillColor(240, 240, 240); // set light gr
            $pdf->Cell(160, 23, 'Transaction Summary', 0, 1, 'C', 1); // draw a cell with filled color and 0 border width
    
            // Move down to create space between title and image
            $pdf->Ln(20);
    
            // Logo
            $pdf->Image('assets/success2.png',96,75,12);


            while($row = mysqli_fetch_assoc($data)){
                $pdf->SetFont('Arial','B',14);
                $pdf->Cell(61); // move to the right by 40 mm
                $pdf->cell(w: 62, h: 10, txt: 'Rs. ' .$row['amount'].'.00', border: 0, ln: 1, align: 'C');
                $pdf->Ln(15);

                $pdf->SetFont('Arial','',12);
                $pdf->Cell(35); // move to the right by 40 mm
                $pdf->cell(w: 62, h: 10, txt: 'Transaction ID:        '.$row['id'], border: 0, ln: 1, align: 'L');
                $pdf->Ln(5);

                $pdf->Cell(35); // move to the right by 40 mm
                $pdf->cell(w: 62, h: 10, txt: 'Name:                      '.$row['name'], border: 0, ln: 1, align: 'L');
                $pdf->Ln(5);

                $pdf->Cell(35); // move to the right by 40 mm
                $pdf->cell(w: 62, h: 10, txt: 'Bill Type:                  ' .$row['product'], border: 0, ln: 1, align: 'L');
                $pdf->Ln(5);

                $pdf->Cell(35); // move to the right by 40 mm
                $pdf->cell(w: 62, h: 10, txt: 'Transaction Date:    ' .$row['created_at'], border: 0, ln: 1);
                $pdf->Ln(5);

                $pdf->Cell(35); // move to the right by 40 mm
                $pdf->cell(w: 62, h: 10, txt: 'Status:                     ' .$row['status'], border: 0, ln: 1, align: 'L');
            }
        
        
           $pdf->Output();
        }
        
    } else {
        echo "No data found!";
    }
}





