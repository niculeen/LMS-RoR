


<?php
echo '<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"> </script>';
ob_start();
	function generateRandomString($length = 8) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	function checkear_si_existe_usuario($nombre_, $email_, $pass_, $curso_) {
        $curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => "https://www.medfamudec.cl/api/v1/accounts/self/users?search_term=". $email_,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
		  "Authorization: Bearer 9ti3w1qAhRctzFU44O7fXWeI4rwi0qL68Ljgp9LReiDCwFlIiTglTbXuuGYJ99yj",
		  "Cookie: log_session_id=588ad1e9c77b746f596fd239d20dd465; _token_canvas=PjJ96Q%2BxnVLu4qeWhi10Aph8eBBSl3rpt8nt0ybXHh4Wpuo1gl7dII0DIbYnMu5I6WJh1WlDLUNJ1JTKMPjX%2FglXHhUdJb%2FONN1MDdA4wM1p4%2FXMIRLor8Z4aGCDvg2odUgn%2Fd5ARZMPUWeZvDXKlA%3D%3D; _legacy_normandy_session=Zt9oPy8eKyrtD7em6R_6AA+gw6fLhXkfCx0OdEBsb6p-R62aE1maW2q6-eGFkkYZO3rgGvHfOZ41i4qFfkMBY9lz4jKwSniIHug5kRfzCdsEA1lwKPH9qABxXiDmMmJ7FlmdlsdWbGpoRa7CaNyMMfWAudRIUm9NWMcUTCGx8y6kCP_26Gt8Jz4tMLpOC3FN0E.RRqgvUTuwbSUvFYz9Tq2F32rtgI.Xv6HLA; _normandy_session=Zt9oPy8eKyrtD7em6R_6AA+gw6fLhXkfCx0OdEBsb6p-R62aE1maW2q6-eGFkkYZO3rgGvHfOZ41i4qFfkMBY9lz4jKwSniIHug5kRfzCdsEA1lwKPH9qABxXiDmMmJ7FlmdlsdWbGpoRa7CaNyMMfWAudRIUm9NWMcUTCGx8y6kCP_26Gt8Jz4tMLpOC3FN0E.RRqgvUTuwbSUvFYz9Tq2F32rtgI.Xv6HLA; _csrf_token=lFdeK42Eg86%2BY26HsqZna4WhokPnyVeaBX6pGxXGLOL2EQpM47Ta%2Fd1TV7LQ918Z9eKRDLa9Ye1EMJ9yU5Raqw%3D%3D"
		),
		));
		$response = curl_exec($curl);
		$parsed = json_decode($response, true);
		if (count($parsed) == 0){
			//echo "CREAR CUENTA";




			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://www.medfamudec.cl/api/v1/accounts/1/users",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS =>"{\n    \"user\":{\n        \"name\":\"" . $nombre_ . "\",\n        \"sortable_name\":\"" . $nombre_ . "\",\n        \"short_name\":\"" . $nombre_ . "\"\n    },\n    \"pseudonym\":{\n        \"send_confirmation\":false,\n        \"unique_id\":\"" . $email_ . "\",\n        \"password\":\"" . $pass_ . "\"\n    }\n}",
			  CURLOPT_HTTPHEADER => array(
			    "Authorization: Bearer 9ti3w1qAhRctzFU44O7fXWeI4rwi0qL68Ljgp9LReiDCwFlIiTglTbXuuGYJ99yj",
			    "Content-Type: application/json",
			    "Cookie: _token_canvas=PjJ96Q%2BxnVLu4qeWhi10Aph8eBBSl3rpt8nt0ybXHh4Wpuo1gl7dII0DIbYnMu5I6WJh1WlDLUNJ1JTKMPjX%2FglXHhUdJb%2FONN1MDdA4wM1p4%2FXMIRLor8Z4aGCDvg2odUgn%2Fd5ARZMPUWeZvDXKlA%3D%3D; _csrf_token=%2BODoluMQYMgVKqtrKke3OwmARrHzjK5SG4jPHWiTG56W0Lym02gQhj4B%2FBxAf%2FYJUcx107K9yQdr3ZZ7EeUj6w%3D%3D; log_session_id=eff8ec2ea5f367b8fee23e065241b2e1; _legacy_normandy_session=zB5oxvaRo-BDGhTbNc4GKw.YoxuKlUFXmQAQZchPlKef2nzG6Yz5-cl2XSe3XTOESdoRGLju3rv1bLNvFZnMMMAPpGWRR1oOBLFFgbAIpl9Rr_tgCDUoRMmopceWuKcvkyFURCpfqJVIgBzlzmdd5-c.yK3dUx7iSXIoX6XpqyNdjPkdqL4.XwV2pw; _normandy_session=zB5oxvaRo-BDGhTbNc4GKw.YoxuKlUFXmQAQZchPlKef2nzG6Yz5-cl2XSe3XTOESdoRGLju3rv1bLNvFZnMMMAPpGWRR1oOBLFFgbAIpl9Rr_tgCDUoRMmopceWuKcvkyFURCpfqJVIgBzlzmdd5-c.yK3dUx7iSXIoX6XpqyNdjPkdqL4.XwV2pw"
			  ),
			));

			$response2 = curl_exec($curl);

			curl_close($curl);




			/*
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => "https://www.medfamudec.cl/api/v1/accounts/1/users",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS =>"{\n    \"user\":{\n        \"name\":\"" . $nombre_ . "\",\n        \"sortable_name\":\"" . $nombre_ . "\",\n        \"short_name\":\"" . $nombre_ . "\"\n    },\n    \"pseudonym\":{\n        \"send_confirmation\":false,\n        \"unique_id\":\"" . $email_ . "\",\n        \"password\":\"" . $pass_ . "\"\n    }\n}",
			CURLOPT_HTTPHEADER => array(
			"Authorization: Bearer 9ti3w1qAhRctzFU44O7fXWeI4rwi0qL68Ljgp9LReiDCwFlIiTglTbXuuGYJ99yj",
			"Content-Type: application/json",
			"Cookie: log_session_id=588ad1e9c77b746f596fd239d20dd465; _token_canvas=PjJ96Q%2BxnVLu4qeWhi10Aph8eBBSl3rpt8nt0ybXHh4Wpuo1gl7dII0DIbYnMu5I6WJh1WlDLUNJ1JTKMPjX%2FglXHhUdJb%2FONN1MDdA4wM1p4%2FXMIRLor8Z4aGCDvg2odUgn%2Fd5ARZMPUWeZvDXKlA%3D%3D; _legacy_normandy_session=Zt9oPy8eKyrtD7em6R_6AA+gw6fLhXkfCx0OdEBsb6p-R62aE1maW2q6-eGFkkYZO3rgGvHfOZ41i4qFfkMBY9lz4jKwSniIHug5kRfzCdsEA1lwKPH9qABxXiDmMmJ7FlmdlsdWbGpoRa7CaNyMMfWAudRIUm9NWMcUTCGx8y6kCP_26Gt8Jz4tMLpOC3FN0E.RRqgvUTuwbSUvFYz9Tq2F32rtgI.Xv6HLA; _normandy_session=Zt9oPy8eKyrtD7em6R_6AA+gw6fLhXkfCx0OdEBsb6p-R62aE1maW2q6-eGFkkYZO3rgGvHfOZ41i4qFfkMBY9lz4jKwSniIHug5kRfzCdsEA1lwKPH9qABxXiDmMmJ7FlmdlsdWbGpoRa7CaNyMMfWAudRIUm9NWMcUTCGx8y6kCP_26Gt8Jz4tMLpOC3FN0E.RRqgvUTuwbSUvFYz9Tq2F32rtgI.Xv6HLA; _csrf_token=7%2FKMmHl4sU9RkJ4jp7gY4%2FLLoyIQEzbiAkmV2lFo0feNtNj%2FF0jofDKgpxbF6SCRgoiQbUFnAJVDB6OzFzqnvg%3D%3D"
			),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			*/



			$array_response = json_decode($response, true);

			$curl = curl_init();
			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://www.medfamudec.cl/api/v1/courses/". $curso_ ."/enrollments",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => array('enrollment[user_id]' => $array_response['id'],'enrollment[type]' => 'StudentEnrollment'),
			  CURLOPT_HTTPHEADER => array(
			    "Authorization: Bearer 9ti3w1qAhRctzFU44O7fXWeI4rwi0qL68Ljgp9LReiDCwFlIiTglTbXuuGYJ99yj",
			    "Cookie: _token_canvas=PjJ96Q%2BxnVLu4qeWhi10Aph8eBBSl3rpt8nt0ybXHh4Wpuo1gl7dII0DIbYnMu5I6WJh1WlDLUNJ1JTKMPjX%2FglXHhUdJb%2FONN1MDdA4wM1p4%2FXMIRLor8Z4aGCDvg2odUgn%2Fd5ARZMPUWeZvDXKlA%3D%3D; log_session_id=682c90000c0486de3e80ec683b564ee7; _legacy_normandy_session=L4vFzk7fJbc63ji5itykCw.O7zJ--mEib3Ck9MBznv3cMPMptY2CHh_qimQRgp1WcbIe86qD9OcK285xiCFK7G6UAWbqaYqmGBPC4zESaoPl2W-S1ImEYoC5TX0hdepKro0bpvqXODiAql2kSAehUvk.2wfVM9NHJJa7kh5Rk-YA4VcoA7M.Xv7ahA; _normandy_session=L4vFzk7fJbc63ji5itykCw.O7zJ--mEib3Ck9MBznv3cMPMptY2CHh_qimQRgp1WcbIe86qD9OcK285xiCFK7G6UAWbqaYqmGBPC4zESaoPl2W-S1ImEYoC5TX0hdepKro0bpvqXODiAql2kSAehUvk.2wfVM9NHJJa7kh5Rk-YA4VcoA7M.Xv7ahA; _csrf_token=G9Mx%2BoH1jziMZ%2BSzhs2U%2F%2FwyU%2FaOMDjoetmWJPmxH%2BZqlmei58C7QchMo%2F63l9eI01kmm%2F8BUoc8t6ZSn8YvsQ%3D%3D"
			  ),
			));

			$response2 = curl_exec($curl);

			curl_close($curl);
			usleep(1000000);


			// ENRROLAR ESTUDIANTE

















			//echo $response;
			echo "<script type='text/javascript'>document.getElementById('conectar').click()</script>";
		} else{
			$curl = curl_init();
			print_r($curso_);
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://medfamudec.cl/api/v1/courses/". $curso_ ."/enrollments",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => array('enrollment[user_id]' => $parsed[0]['id'],'enrollment[type]' => 'StudentEnrollment'),
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer 9ti3w1qAhRctzFU44O7fXWeI4rwi0qL68Ljgp9LReiDCwFlIiTglTbXuuGYJ99yj",
    "Cookie: log_session_id=8248e79f7bc99811785f8c094efb6ba2; _csrf_token=1cFy85%2BNM3cXTcZ9pOJIcHSHKoCfZnlUgyUzporstUaHhCi5%2Bf5KHVIftU%2FC2hkcI%2BtazusJQBL5UHbC7pn3bQ%3D%3D; _legacy_normandy_session=Q-8ioUwLC6lLFNPDs_7Mbw.DcH3B8JnCFz6-cyHXIOjzezJp85DGjHpvjPu0nJcsNhssS1ecre6LdBudDSVv3n83Frj4qqzVT-XcGlnfdzUpL55tAxkMCg7EU5wZ5Gx2KbmbEDiv7A0KGuWXA855xpv.ZbI8AwUPp_IVibwW5r4iEMTLclY.XwhZnA; _normandy_session=Q-8ioUwLC6lLFNPDs_7Mbw.DcH3B8JnCFz6-cyHXIOjzezJp85DGjHpvjPu0nJcsNhssS1ecre6LdBudDSVv3n83Frj4qqzVT-XcGlnfdzUpL55tAxkMCg7EU5wZ5Gx2KbmbEDiv7A0KGuWXA855xpv.ZbI8AwUPp_IVibwW5r4iEMTLclY.XwhZnA"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
usleep(1000000);
			/*      ESTO ESTA MALO
			echo "**********-------- \n";
			print_r($parsed[0]['id']);
			echo "**********-------- \n";
			$curl = curl_init();
			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://www.medfamudec.cl/api/v1/courses/". $curso_ ."/enrollments",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => array('enrollment[user_id]' => $parsed[0]['id'],'enrollment[type]' => 'StudentEnrollment'),
			  CURLOPT_HTTPHEADER => array(
			    "Authorization: Bearer 9ti3w1qAhRctzFU44O7fXWeI4rwi0qL68Ljgp9LReiDCwFlIiTglTbXuuGYJ99yj",
			    "Cookie: _token_canvas=PjJ96Q%2BxnVLu4qeWhi10Aph8eBBSl3rpt8nt0ybXHh4Wpuo1gl7dII0DIbYnMu5I6WJh1WlDLUNJ1JTKMPjX%2FglXHhUdJb%2FONN1MDdA4wM1p4%2FXMIRLor8Z4aGCDvg2odUgn%2Fd5ARZMPUWeZvDXKlA%3D%3D; log_session_id=682c90000c0486de3e80ec683b564ee7; _legacy_normandy_session=L4vFzk7fJbc63ji5itykCw.O7zJ--mEib3Ck9MBznv3cMPMptY2CHh_qimQRgp1WcbIe86qD9OcK285xiCFK7G6UAWbqaYqmGBPC4zESaoPl2W-S1ImEYoC5TX0hdepKro0bpvqXODiAql2kSAehUvk.2wfVM9NHJJa7kh5Rk-YA4VcoA7M.Xv7ahA; _normandy_session=L4vFzk7fJbc63ji5itykCw.O7zJ--mEib3Ck9MBznv3cMPMptY2CHh_qimQRgp1WcbIe86qD9OcK285xiCFK7G6UAWbqaYqmGBPC4zESaoPl2W-S1ImEYoC5TX0hdepKro0bpvqXODiAql2kSAehUvk.2wfVM9NHJJa7kh5Rk-YA4VcoA7M.Xv7ahA; _csrf_token=G9Mx%2BoH1jziMZ%2BSzhs2U%2F%2FwyU%2FaOMDjoetmWJPmxH%2BZqlmei58C7QchMo%2F63l9eI01kmm%2F8BUoc8t6ZSn8YvsQ%3D%3D"
			  ),
			));

			$response2 = curl_exec($curl);

			curl_close($curl);


			***************************************************************/
			echo "<script type='text/javascript'>document.getElementById('conectar').click()</script>";
		}
		//echo "| <br>";
		//echo "\n \n \n \n";
     }


    
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	$encryption_key = "xasdk4idcmxmnxnz@#¢ssdkri3344$$%44wss"; 
	$options = 0; 
	$encryption_iv = '1234567891011121';
	$ciphering = "AES-256-CBC";
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		//echo "POST";
		$token_cookie = $_POST['token'];
		$decryption=openssl_decrypt ($token_cookie, $ciphering,  $encryption_key, $options, $encryption_iv); 
		$dataa = explode("          ", $decryption);
		if (!empty($decryption)){
			include 'validate_session.php';
			// Nombre: $dataa[0]
			// Email: $dataa[1]
			// Pass: $dataa[2]
			// cursoid: $dataa[3]
			// CSRF_token: $_COOKIE['_csrf_token']
			echo "<form style=\"display: none;\" action=\"/login/canvas\" method=\"post\" id=\"dateForm\">";
			echo '<input style=\"display: none;\" type="text" name="pseudonym_session[unique_id]" value="'. $dataa[1].'"></input>';
			echo '<input style=\"display: none;\" type="text" name="pseudonym_session[password]"  value="'. $dataa[2].'"></input>';
			echo '<input style=\"display: none;\" type="text" name="authenticity_token"  value="'. $_COOKIE['_csrf_token'].'"></input>';
			echo '<input style=\"display: none;\" type="text" name="redirect_to_ssl"  value="1"></input>';
			echo "<input style=\"display: none;\" id=\"conectar\" type=\"submit\">";
			echo "</form>";

			// Mostrar redireccionamiento
			checkear_si_existe_usuario($dataa[0],$dataa[1],$dataa[2],$dataa[3]);
			// Pasos a seguir logear api
			// // Crear cuenta
			// // // Actualizar contraseña
$token = strtr( utf8_encode($TCLST[0]), $normalizeChars) . ' ' . strtr( utf8_encode($TCLST[1]), $normalizeChars). '          ' . $TCLST[2] . '          ' . sha1($new_pass_). '          ' . $idcanvas;
			
		} else {
			echo "Inicie Nuevamente";
		}
	} else {
		include 'validate_session.php';
		$token_cookie = $_GET['token'];
		setcookie('_token_canvas', $token_cookie, time() + (86400 * 30*3), "/"); // 86400 = 1 day
		$decryption=openssl_decrypt ($token_cookie, $ciphering,  $encryption_key, $options, $encryption_iv); 
		$dataa = explode("          ", $decryption);
		echo '<iframe src="https://www.medfamudec.cl/courses/'. $dataa[3].'" style="display:none;" onload="onLoadHandler();"></iframe>';
		echo "
		<script type='text/javascript'>
			function getCsrfToken() {
				var csrfRegex = new RegExp('^_csrf_token=(.*)$');
				var csrf;
				var cookies = document.cookie.split(';');
				for (var i = 0; i < cookies.length; i++) { var cookie = cookies[i].trim(); var match = csrfRegex.exec(cookie); if (match) { csrf = decodeURIComponent(match[1]); break; } } return csrf; } /* * Function which returns a promise (and error if rejected) if response status is OK */ function status(response) { if (response.status >= 200 && response.status < 300) {
				return Promise.resolve(response)
			} else {
				return Promise.reject(new Error(response.statusText))
			}
		}
		</script>
		<script type='text/javascript'>
		function onLoadHandler() {
			console.log(getCsrfToken())
			document.getElementById('iniciar').click()
		}
		</script>
		";


		echo "<form action=\"canvas_connect.php\" method=\"post\" id=\"dateForm\">
				<input style=\"display: none;\" value=\"".$token_cookie."\" name=\"token\">
				<input style=\"display: none;\" name=\"uuu\">
				<input style=\"display: none;\" name=\"ppp\" >
				<input style=\"display: none;\" id=\"iniciar\" type=\"submit\">
			</form>";
	}
	
	// type=\"hidden\"


	ob_end_flush();
?>

