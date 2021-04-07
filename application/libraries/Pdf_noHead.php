<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
class Pdf_noHead extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }


    // Page footer
    public function Footer() {
         
    $this->SetY(-18);
    $html="
    <p>
    <hr style='width:98%;'>
    <br><br><span style='font-size: medium'>PT LEITER INDONESIA</span><br><span style='font-size:2pt '>Ruko Prominence Alam Sutera 38F/53-22 Jln. Jalur Sutera Prominence, Alam Sutera, Tangerang 15143 Banten - INDONESIA<br>Tel: 021-2958-6786 &nbsp;&nbsp; Fax: 021-29490663</span>
    </p>";
    $this->SetFontSize(8);
    $this->SetTextColor(128, 179, 128);
    //$this->writeHTML($html, false, true, false, 0);
    //$this->WriteHTML($html, true, 0, true, 0);     
    //$this->Cell(0, 27, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    $this->WriteHTML($html, false, true, false, true);                    
    }
}
?>