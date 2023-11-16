<?php

	namespace App;

	use GuzzleHttp\Client;
	use Log;

	class AlfrescoDocument
	{
		// Get the user ticket
		public static function GetAlfrescoUserTicket()
	    {
	    	try
	    	{
	    		$client = new Client();
	    		$tokenRow = array();
				$tokenRow['username'] = 'admin';
	            $tokenRow['password'] = 'admin';
	    		$tokenURL = 'http://localhost:8080/alfresco/service/api/login';
	    		// Log::error('[Method => GetAlfrescoUserTicket => ticketcreation => Step6A =>Error Code:'.$tokenURL.'::'.env('DOCUMENT_USER').'::'.env('DOCUMENT_PASSWORD').'::'.auth()->user()->id.']');
	    		// Log::error('[Method => GetAlfrescoUserTicket => ticketcreation => Step6A =>Error Code:'.$tokenURL.'::'.env('DOCUMENT_USER').'::'.env('DOCUMENT_PASSWORD').']');
	            $tokenResponse = $client->request('POST', $tokenURL, [
	                'headers' => [
	                    'Content-Type' => 'application/json',
	                    'Cache-Control' => 'no-cache',
	                    'Accept' => 'application/json'
	                ],
	                'body' => json_encode($tokenRow)
	            ])->getBody()->getContents();
	            // Log::error('[Method => GetAlfrescoUserTicket => alfresco_logdetail3 => Step6 =>Error Code:'.$tokenResponse.'::'.auth()->user()->id.']');
	            // Log::error('[Method => GetAlfrescoUserTicket => alfresco_logdetail3 => Step6 =>Error Code:'.$tokenResponse.']');
	            
	            $objtokenRes = json_decode($tokenResponse);
	            $userTicket = $objtokenRes->data->ticket;
	            return $userTicket;
	    	}
	    	catch(Exception $exc)
	    	{
	    		echo $exc;
	    		 // Log::error('[Method => GetAlfrescoUserTicket => alfresco_logdetail4 => Error Code:'.$exc.'::'.auth()->user()->id.']');
	    		 Log::error('[Method => GetAlfrescoUserTicket => alfresco_logdetail4 => Error Code:'.$exc.']');
	    	}
	    }

	    // Create new folder
	    public static function SetAlfrescoFolder($parentFolder, $folderName, $folderTitle, $folderDescription)
	    {
	    	try
	    	{
	    		
	    		$client = new Client();
	    		// Log::error('[Method => SetAlfrescoFolder => alfresco_logdetail1A=> Step1A => Error Code: '.auth()->user()->id.']');
	    		Log::error('[Method => SetAlfrescoFolder => alfresco_logdetail1A=> Step1A => Error Code:]');

	    		$ticket = self::GetAlfrescoUserTicket();
	    		$folderURL = 'http://localhost:8080/alfresco/service/api/site/folder/bimacc-production'.'/'.$parentFolder.'?alf_ticket='.$ticket;
	    		// Log::error('[Method => SetAlfrescoFolder => alfresco_logdetail1=> Step1 => Error Code: '.$folderURL.'::'.auth()->user()->id.']');
	    		// Log::error('[Method => SetAlfrescoFolder => alfresco_logdetail1=> Step1 => Error Code: '.$folderURL.']');
	    		
	    		$folderData = array();
	    		$folderData['name'] = $folderName;
	    		$folderData['title'] = $folderTitle;
	    		$folderData['description'] = $folderDescription;
	    		$folderData['type'] = 'cm:folder';

	    		$folderResponse = $client->request('POST', $folderURL, [
	                'headers' => [
	                    'Content-Type' => 'application/json',
	                    'Cache-Control' => 'no-cache',
	                    'Accept' => 'application/json'
	                ],
	                'body' => json_encode($folderData)
	            ])->getBody()->getContents();
	            
	            $arrResponse = explode ('"', $folderResponse);
	            $folderPath = $arrResponse[3];
	            // echo $folderPath;exit;
	    		return $folderPath;
	    		 
	    	}
	    	catch(Exception $exc)
	    	{
                     // Log::error('[Method => SetAlfrescoFolder => alfresco_logdetail2 => Error Code:'.$exc.'::'.auth()->user()->id.']');
	    		Log::error('[Method => SetAlfrescoFolder => alfresco_logdetail2 => Error Code:'.$exc.']');
	    	}
	    }

	    // Create document
	    public static function SetAlfrescoDocument($fileDirPath, $fileName, $fileExtension, $fileDestination, $fileDescription)
	    {Log::info($fileDirPath.' : '.$fileName.' : '.$fileExtension.' : '.$fileDestination);

	    // Log::error('[Method => alfrescodocument_folder => file_result => success Code:'.$result.']');
	    	try
	    	{
	    		$mimeType = '';
		        switch ($fileExtension) {
		        	case 'xls':
		        		$mimeType = 'vnd.ms-excel';
		        		break;
		        	case 'xlsx':
		        		$mimeType = 'vnd.openxmlformats-officedocument.spreadsheetml.sheet';
		        		break;
		        	case 'doc':
		        		$mimeType = 'msword';
		        		break;
		        	case 'docx':
		        		$mimeType = 'vnd.openxmlformats-officedocument.wordprocessingml.document';
		        		break;
		        	case 'pdf':
		        		$mimeType = 'pdf';
		        		break;
		        	case 'jpeg':
		        		$mimeType = 'jpeg';
		        		break;
		        	case 'png':
		        		$mimeType = 'png';
		        		break;
		        	case 'ppt':
		        		$mimeType = 'vnd.ms-powerpoint';
		        		break;
		        	case 'pptx':
		        		$mimeType = 'vnd.openxmlformats-officedocument.presentationml.presentation';
		        		break;
		        	default:
		        		$mimeType = '';
		        		break;
		        }
		        $mimeType = 'content/'.$mimeType;
	    		$client = new Client();
	    		// Log::error('[Method => SetAlfrescoDocument => alfresco_logdetail1B => Step1B => Error Code: '.auth()->user()->id.']');
	    		Log::error('[Method => SetAlfrescoDocument => alfresco_logdetail1B => Step1B => Error Code:]');
	    		$ticket = self::GetAlfrescoUserTicket();
	    		$documentURL = 'http://localhost:8080/alfresco/service/api/upload?alf_ticket='.$ticket;

	    		$fileURL = $fileDirPath.'/'.$fileName;//echo $fileURL;exit;
	    		// Log::error('[Method => SetAlfrescoDocument => alfresco_logdetail5 => Step7 => success Code:'.$fileURL.'::'.$documentURL.'::'.auth()->user()->id.']');
	    		Log::error('[Method => SetAlfrescoDocument => alfresco_logdetail5 => Step7 => success Code:'.$fileURL.'::'.$documentURL.']');

	    		$curl_request = curl_init();
	    		// Log::error('[Method => SetAlfrescoDocument => alfresco_logdetail5A => Step7A => success Code:'.$curl_request.'::'.auth()->user()->id.']');
	    		Log::error('[Method => SetAlfrescoDocument => alfresco_logdetail5A => Step7A => success Code:'.$curl_request.']');
	    		// Log::info($fileURL);
		        curl_setopt($curl_request, CURLOPT_POST,true);
				curl_setopt($curl_request, CURLOPT_URL, $documentURL);
				curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl_request, CURLOPT_HEADER, false);
				$args = curl_file_create($fileURL,$mimeType,$fileName);
				curl_setopt($curl_request, CURLOPT_POSTFIELDS, array('destination'=>$fileDestination,'filedata'=>$args,'description'=>$fileDescription));


				$result = curl_exec($curl_request);
				Log::info($documentURL);
				// echo "uguhgh";exit;
		   		// Log::error('[Method => SetAlfrescoDocument => alfresco_logdetail6 => Step8 => success Code:'.$result.'::'.auth()->user()->id.']');
		   		Log::error('[Method => SetAlfrescoDocument => alfresco_logdetail6 => Step8 => success Code:'.$result.']');
 
		   		return $result;
	    	}
	    	catch(Exception $exc)
	    	{
	    		// Log::error('[Method => SetAlfrescoDocument => alfresco_logdetail7 => Error Code:'.$exc.'::'.auth()->user()->id.']');
	    		Log::error('[Method => SetAlfrescoDocument => alfresco_logdetail7 => Error Code:'.$exc.']');
	    		// echo $exc;exit;
	    	}
	    }
	}