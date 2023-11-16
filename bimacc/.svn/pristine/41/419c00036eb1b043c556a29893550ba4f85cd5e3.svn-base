<?php
namespace App\Http\Controllers;

class EncryptDecryptMasterController extends Controller
{
	const METHOD = 'aes-256-ctr';

	public static function encrypt($message, $key, $encode = false)
	{
		$nonceSize = openssl_cipher_iv_length(self::METHOD);
		$nonce = openssl_random_pseudo_bytes($nonceSize);
		$ciphertext = openssl_encrypt(
			$message,
			self::METHOD,
			$key,
			OPENSSL_RAW_DATA,
			$nonce
		);
		if ($encode) {
			return base64_encode($nonce.$ciphertext);
		}
		return $nonce.$ciphertext;
	}

	public static function decrypt($message, $key, $encoded = false)
	{
		if ($encoded) {
			$message = base64_decode($message, true);
			if ($message === false) {
				throw new Exception('Encryption failure');
			}
		}
		$nonceSize = openssl_cipher_iv_length(self::METHOD);
		$nonce = mb_substr($message, 0, $nonceSize, '8bit');
		$ciphertext = mb_substr($message, $nonceSize, null, '8bit');
		$plaintext = openssl_decrypt(
			$ciphertext,
			self::METHOD,
			$key,
			OPENSSL_RAW_DATA,
			$nonce
		);
		return $plaintext;
	}

}





	//  require_once('wp-encrypt-decrypt.php');
	// class Wordpress_model extends CI_Model
	// {
	// 	function __construct() {

	// 		$this->load->library("curl_library");			
	// 	}

	// 	function WordpressLogin()
	// 	{
	// 		//echo("arg1");exit();
	// 		$wpURL = "http://49.207.182.10:91/code/wp-remote-login.php";
	// 		$key = hex2bin('000102030405060708090a0b0c0d0e0f101112131415161718191a1b1c1d1e1f');
	// 		$secretArray = array();
	//         $secretArray['remember'] = '1';
	//         $secretArray['userName'] = $this->session->userdata('loginID');
	//         $secretArray['password'] = $this->session->userdata('password');
	//         if ($this->session->userdata('Role') == 'Parent'){
	//         $secretArray['redirectURL'] = 'location: http://49.207.182.10:91/code/manage-children';	
	//         }
	//         elseif ($this->session->userdata('Role') == 'student'){
	//         $secretArray['redirectURL'] = 'location: http://49.207.182.10:91/code/child-subscription';	
	//         }
	//         else  {
	//         	 $secretArray['redirectURL'] = 'location: http://49.207.182.10:91/code/manage-subscription-2';
	//         }
	       
	//         $encrypted = Encrypt_Decrypt_Master::encrypt(serialize($secretArray), $key);
	// 		$encrypted_string_hex = bin2hex($encrypted);
	// 		header("location: ".$wpURL."?secretKey=".$encrypted_string_hex);
	// 		exit;
	// 	}
	// }

?>	