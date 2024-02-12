<?php
require_once 'loader.php';
require_once 'libs/tcpdf/tcpdf.php';

class MYPDF extends TCPDF
{
    public function Header()
    {
        $this->SetFont('helvetica', 'B', 20);
        $this->Cell(0, 15, 'E-PERPUS', 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }

    public function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('helvetica', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

$tgl_cetak = date("Y-m-d h:i:sa");

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Laporan Peminjaman');
$pdf->SetSubject('Laporan Peminjaman');

$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->setFontSubsetting(true);
$pdf->SetFont('dejavusans', '', 14, '', true);

$pdf->AddPage();

$pdf->SetFont('helvetica', 'M', 12);
$pdf->Write(0, 'Laporan Peminjaman', '', 0, 'L', true, 0, false, false, 0);
$pdf->Write(0, 'Tanggal cetak  : ' . $tgl_cetak . '', '', 0, 'L', true, 0, false, false, 0);
$pdf->Write(0, '', '', 0, 'L', true, 0, false, false, 0);
$pdf->Write(0, '', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('dejavusans', '', 7, '', true);


$pinjaman = $pinjam->all();

$html = <<<EOD
<h1>Student  list</h1>
<table cellspacing="0" cellpadding="1" border="1" style="border-color:gray;">
    <thead>
        <tr style="background-color:green;color:white;">
            <th><b>No</b></th>
            <th><b>No Pinjam</b></th>
            <th><b>Peminjam</b></th>
            <th><b>Tanggal Pinjam</b></th>
            <th><b>Tanggal Kembali</b></th>
            <th><b>Status</b></th>
        </tr>
    </thead>
  <tbody>
EOD;

$i = 0;
foreach (array_reverse($pinjam->data()) as $pinjaman) {
    $i++;
    $html .= <<<EOD
    <tr>
        <td>{$i}</td>
        <td>{$pinjaman->id}</td>
        <td>{$pinjaman->username}</td>
        <td>{$pinjaman->tanggal_pinjam}</td>
        <td>{$pinjaman->tanggal_kembali}</td>
        <td>{$pinjaman->status}</td>
    </tr>
EOD;
}



$html .= <<<EOD
  </tbody>
</table>
EOD;

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$pdf->Output('helo_world.pdf', 'I');
