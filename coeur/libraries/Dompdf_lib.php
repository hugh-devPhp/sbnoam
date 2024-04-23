<?php
/**
 * Created by PhpStorm.
 * User: Ferd
 * Date: 13/04/2017
 * Time: 09:38
 */

require_once(APPPATH.'third_party/dompdf/autoload.inc.php');
use Dompdf\Dompdf;

class Dompdf_lib {

    public function __construct() {
        $pdf = new Dompdf();

        $CI =& get_instance();
        $CI->domp = $pdf;
        $CI->domp->set_option('isRemoteEnabled', TRUE);

    }

}

?>