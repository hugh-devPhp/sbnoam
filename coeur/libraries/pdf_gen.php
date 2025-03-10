<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


require_once(APPPATH.'third_party/dompdf_new/autoload.inc.php');
use Dompdf\Dompdf;

class Pdf_gen {

	public function generate($html, $filename='', $stream=TRUE, $paper = 'A4', $orientation = "portrait")
	{
		$dompdf = new DOMPDF();
		$dompdf->loadHtml($html);
		$dompdf->setPaper($paper, $orientation);
		$dompdf->render();
		if ($stream) {
			$dompdf->stream($filename.".pdf", array("Attachment" => 0));
		} else {
			return $dompdf->output();
		}
	}
}