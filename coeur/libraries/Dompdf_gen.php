<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Name:  DOMPDF
* 
* Author: Jd Fiscus
* 	 	  jdfiscus@gmail.com
*         @iamfiscus
*          
*
* Origin API Class: http://code.google.com/p/dompdf/
* 
* Location: http://github.com/iamfiscus/Codeigniter-DOMPDF/
*          
* Created:  06.22.2010 
* 
* Description:  This is a Codeigniter library which allows you to convert HTML to PDF with the DOMPDF library
* 
*/

require_once(APPPATH.'third_party/dompdf/autoload.inc.php');
use Dompdf\Dompdf;

class Dompdf_gen {

    public function __construct(){

        $pdf = new Dompdf();

        $CI = & get_instance();
        $CI->dompdf = $pdf;
        $CI->dompdf->set_option('isRemoteEnabled', TRUE);
    }

}