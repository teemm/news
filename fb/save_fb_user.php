            <?php
	    session_start();
            define('FACEBOOK_APP_ID', '295551973929753');
            define('FACEBOOK_SECRET', '792daa3468cab0682ed2564e3e1943a9');

			// No need to change function body
            function parse_signed_request($signed_request, $secret) {
                list($encoded_sig, $payload) = explode('.', $signed_request, 2);

                // decode the data
                $sig = base64_url_decode($encoded_sig);
                $data = json_decode(base64_url_decode($payload), true);

                if (strtoupper($data['algorithm']) !== 'HMAC-SHA256') {
                    error_log('Unknown algorithm. Expected HMAC-SHA256');
                    return null;
                }

                // check sig
                $expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
                if ($sig !== $expected_sig) {
                    error_log('Bad Signed JSON signature!');
                    return null;
                }

                return $data;
            }

            function base64_url_decode($input) {
                return base64_decode(strtr($input, '-_', '+/'));
            }

            if ($_REQUEST) {
                $response = parse_signed_request($_REQUEST['signed_request'],
                                FACEBOOK_SECRET);
				
			//print_r($response);
		
				
                $fullname = $response["registration"]["name"];
                $email = $response["registration"]["email"];
                
               
            //    $command = "INSERT INTO users (fullname,email,password) VALUES('$fullname','$email','$password')";
		
		
		
		//$result=mysql_query($command);
echo  $fullname;
echo $email;
            } else {
                echo '$_REQUEST is empty';
            }
            ?>
      