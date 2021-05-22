<?php
/**
 * Created by PhpStorm.
 * User: Burak
 * Date: 22.05.2021
 * Time: 11:42
 */
//json ile çalışıldığı unutulmamalıdır

try {
	file_put_contents( "../../error.json", "\r\n".date("Y-m-d H:i:s")."\r\n".json_encode( $_POST ), FILE_APPEND );
	$returnData = array(
		'draw'            => $_POST['draw']++,//cross site scripting önlemi için gereklidir
		//'recordsTotal'    => 57,//toplam veritabanındaki kayıt sayısıdır
		//'recordsFiltered' => 15,//toplam filtrelenmiş kayıtlar örneğin like ile dönen sonuçlar gibi
//		'data'            => $results//burada ise tabloda gösterilecek veri sunulacak
	);

	if ( isset( $_POST ) ) {
		include_once "../database/dataBaseCon.php";
		$database    = new dataBaseCon();
		if (isset($_POST['search']['value']) && !empty($_POST['search']['value'])){
			$results     = $database->getCustomers( $_POST['length'], $_POST['start'] ,$_POST['search']['value']);
		}else{
			$results     = $database->getCustomers( $_POST['length'], $_POST['start'] );
		}

		$countRecods = count( $results );
		if (isset($_POST['search']['value']) && !empty($_POST['search']['value'])){
			$Total=$database->likeQueryTotal($_POST['search']['value'])['total'];
		}else{
			$Total=$database->countRows()['total'];
		}

		//search end
		$returnData['data']            = $results;
		if (isset($_POST['search']['value']) && !empty($_POST['search']['value'])){
			$returnData['recordsFiltered'] = $Total;// doğrusu bu ama bunu yapınca doğru sonuçlar vermiyor
			$returnData['recordsTotal']    = $Total;
//
		}else{
			$returnData['recordsFiltered'] = $Total;
			$returnData['recordsTotal']    = $Total;
		}


	}

} catch ( Exception $ex ) {
	$returnData['error'] = $ex->getMessage();
	file_put_contents( "../../error.json", "\r\n".date("Y-m-d H:i:s")."\r\n".json_encode( $ex ), FILE_APPEND );
}



file_put_contents( "../../kontrol.json", "\r\n".date("Y-m-d H:i:s")."\r\n".json_encode( $returnData ), FILE_APPEND );
echo json_encode( $returnData );
