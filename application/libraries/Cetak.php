<?php 

class Cetak {

	protected $ci;
	
	function __construct()
	{
		$this->ci =& get_instance();
	}

	function userCertificate($konten,$filename,$data) {
		require_once 'vendor/autoload.php';		

		$mpdf = new \Mpdf\Mpdf([
			    'mode' => 'utf-8',
			    'format' => 'A4',
			    'orientation' => 'P',
			    'margin_left' => 0,
		    	'margin_right' => 0,
		    	'margin_top' => 0,
		    	'margin_bottom' => 0
			]
		);
		
		$content = $this->ci->load->view($konten,$data, true);
		// test($content);
		$mpdf->WriteHTML($content);
		$mpdf->Output($filename.".pdf","I");
	}

}

?>