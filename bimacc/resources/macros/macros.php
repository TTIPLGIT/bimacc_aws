<?php
/**
* Macro helpers
*
*/


/**
* Locale macro
* Generates the dropdown menu of available languages
*/
Form::macro('locales', function ($name = "locale", $selected = null, $class = null, $id = null) {

    $locales = array(
      ''=> " ",
      'en'=> "English, US",
      'en-GB'=> "English, UK",
      'af'=> "Afrikaans",
      'ar'=> "Arabic",
      'bg'=> "Bulgarian",
      'zh-CN'=> "Chinese Simplified",
      'zh-TW'=> "Chinese Traditional",
      'hr'=> "Croatian",
      'cs'=> "Czech",
      'da'=> "Danish",
      'nl'=> "Dutch",
      'en-ID'=> "English, Indonesia",
      'et'=> "Estonian",
      'fi'=> "Finnish",
      'fr'=> "French",
      'de'=> "German",
      'el'=> "Greek",
      'he'=> "Hebrew",
      'hu'=> "Hungarian",
      'is' => 'Icelandic',
      'id'=> "Indonesian",
      'ga-IE'=> "Irish",
      'it'=> "Italian",
      'ja'=> "Japanese",
      'ko'=> "Korean",
      'lv'=>'Latvian',
      'lt'=> "Lithuanian",
      'ms'=> "Malay",
      'mi'=> "Maori",
      'mk'=> "Macedonian",
      'mn'=> "Mongolian",
      'no'=> "Norwegian",
      'fa'=> "Persian",
      'pl'=> "Polish",
      'pt-PT'=> "Portuguese",
      'pt-BR'=> "Portuguese, Brazilian",
      'ro'=> "Romanian",
      'ru'=> "Russian",
      'sr-CS' => 'Serbian (Latin)',
      'sl'=> "Slovenian",
      'es-ES'=> "Spanish",
      'es-CO'=> "Spanish, Colombia",
      'es-VE'=> "Spanish, Venezuela",
      'sv-SE'=> "Swedish",
      'tl'=> "Tagalog",
      'ta'=> "Tamil",
      'th'=> "Thai",
      'tr'=> "Turkish",
      'uk'=> "Ukranian",
      'vi'=> "Vietnamese",
      'zu'=> "Zulu",
  );

    $idclause='';
    if($id) {
      $idclause=" id='$id'";
  }
  $select = '<select name="'.$name.'" class="'.$class.'"  style="min-width:301px"'.$idclause.'>';

  foreach ($locales as $abbr => $locale) {
    $select .= '<option value="'.$abbr.'"'.($selected == $abbr ? ' selected="selected"' : '').'>'.$locale.'</option> ';
}

$select .= '</select>';

return $select;

});


/**
* Country macro
* Generates the dropdown menu of countries for the profile form
*/
Form::macro('countries', function ($name = "country", $selected = null, $class = "country", $id = "country") {

    $countries = array(
       ''=>'',
        'AF'=>'Afghanistan',
        'AL'=>'Albania',
        'DZ'=>'Algeria',
        'AS'=>'American Samoa',
        'AD'=>'Andorra',
        'AO'=>'Angola',
        'AI'=>'Anguilla',
        'AQ'=>'Antarctica',
        
        'AG'=>'Antigua And Barbuda',
        'AR'=>'Argentina',
        'AM'=>'Armenia',
        'AW'=>'Aruba',
        'AU'=>'Australia',
        'AT'=>'Austria',
    // 'AC'=>'Ascension Island',
        
        

        'AZ'=>'Azerbaijan',
     // 'AX'=>'Ãƒâ€¦land',
        
        
        
        'BS'=>'Bahamas',  
        'BH'=>'Bahrain',
        'BD'=>'Bangladesh',
        'BB'=>'Barbados',
        'BY'=>'Belarus',
        'BE'=>'Belgium',
        'BZ'=>'Belize',
        'BJ'=>'Benin',
        'BM'=>'Bermuda',
        'BT'=>'Bhutan',
        'BO'=>'Bolivia',
        'BA'=>'Bosnia And Herzegovina',
        
        'BW'=>'Botswana',
        'BR'=>'Brazil',
        'BN'=>'Brunei Darussalam',
        'BG'=>'Bulgaria',
        'BF'=>'Burkina Faso',
        'BI'=>'Burundi',
        
        
        
        
        
        
        
        
        
    // 'BV'=>'Bouvet Island',
        
        
        
    // 'IO'=>'British Indian Ocean Territory',
        'KH'=>'Cambodia',
        'CM'=>'Cameroon',
        'CA'=>'Canada',
        'CV'=>'Cape Verde',
        'KY'=>'Cayman Islands',
        'CF'=>'Central African Republic',
        'TD'=>'Chad',
        'CL'=>'Chile',
        
        'CX'=>'Christmas Island',
        'CC'=>'Cocos (Keeling) Islands',
        'CO'=>'Colombia',
        'KM'=>'Comoros',
        'CD'=>'Congo (Democratic Republic)',
        'CG'=>'Congo (Republic)',

        'CK'=>'Cook Islands',
        'CR'=>'Costa Rica',
        'CI'=>'Côte d\'Ivoire',
        'HR'=>'Croatia (local name: Hrvatska)',
        'CU'=>'Cuba',
        'CY'=>'Cyprus',
        'CZ'=>'Czech Republic',
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        'DK'=>'Denmark',
        'DJ'=>'Djibouti',
        
        'DM'=>'Dominica',
        'DO'=>'Dominican Republic',
        'TI'=>'East Timor',
        'TP'=>'East Timor (old code)',
        'EC'=>'Ecuador',
        'EG'=>'Egypt',
        'SV'=>'El Salvador',
        'GQ'=>'Equatorial Guinea',
        'ER'=>'Eritrea',
        'EE'=>'Estonia',
        
        
        'ET'=>'Ethiopia',
        'EU'=>'European Union',
        
        
        
        'FK'=>'Falkland Islands (Malvinas)',
        'FO'=>'Faroe Islands',
        'FJ'=>'Fiji',

        'FI'=>'Finland',
        
        
        'FR'=>'France',
        'GF'=>'French Guiana',
        'PF'=>'French Polynesia',
        'TF'=>'French Southern Territories',
        
        

        'GA'=>'Gabon',
        'GM'=>'Gambia',
        'GE'=>'Georgia',
        'DE'=>'Germany',
        'GH'=>'Ghana',
        'GI'=>'Gibraltar',
        'GR'=>'Greece',
        'GL'=>'Greenland',
        'GD'=>'Grenada',
        'GP'=>'Guadeloupe',
        'GU'=>'Guam',
        'GT'=>'Guatemala',
        'GN'=>'Guinea',
        'GW'=>'Guinea-Bissau',
        'GG'=>'Guernsey',
        'GY'=>'Guyana',
        
        'HT'=>'Haiti',
        'HM'=>'Heard And Mc Donald Islands',
        'HN'=>'Honduras',
        'HK'=>'Hong Kong',
        
        
        
        'HU'=>'Hungary',
        'IS'=>'Iceland',
        'IN'=>'India',
        'ID'=>'Indonesia',
        
        'IR'=>'Iran, Islamic Republic Of',
        'IQ'=>'Iraq',
        'IE'=>'Ireland',
        'IM'=>'Isle of Man',
        'IL'=>'Israel',
        'IT'=>'Italy',
        
        
        
        
        
        
        'JM'=>'Jamaica',
        'JP'=>'Japan',
        'JE'=>'Jersey',
        
        'JO'=>'Jordan',
        
        'KZ'=>'Kazakhstan',
        'KE'=>'Kenya',
        'KI'=>'Kiribati',
        

        
        
        
        'KR'=>'Korea, Republic Of',
        'KW'=>'Kuwait',
        'KG'=>'Kyrgyzstan',

        'LA'=>'Lao People\'s Democratic Republic',
        'LV'=>'Latvia',
        'LB'=>'Lebanon',
        'LS'=>'Lesotho',
        'LR'=>'Liberia',
        'LY'=>'Libyan Arab Jamahiriya',
        'LI'=>'Liechtenstein',
        'LT'=>'Lithuania',
        'LU'=>'Luxembourg',
        
        

        
        
        
        
        
        
        
        
        
        
        'MO'=>'Macau',
        'MK'=>'Macedonia, The Former Yugoslav Republic Of',
        'MG'=>'Madagascar',
        'MY'=>'Malaysia',   
        'MW'=>'Malawi',
        'MV'=>'Maldives',
        'ML'=>'Mali',
        'MT'=>'Malta',
        'MH'=>'Marshall Islands',
        'MQ'=>'Martinique',
        'MU'=>'Mauritius',
        
        'MR'=>'Mauritania',

        'YT'=>'Mayotte',
        'FM'=>'Micronesia, Federated States Of',
        'MD'=>'Moldova, Republic Of',
        'MC'=>'Monaco',
        'MN'=>'Mongolia',
        'ME'=>'Montenegro',
        'MS'=>'Montserrat',
        'MA'=>'Morocco',
        'MZ'=>'Mozambique',
        
        'MX'=>'Mexico',
        'MM'=>'Myanmar',
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        'NA'=>'Namibia',  
        'NR'=>'Nauru',
        'NP'=>'Nepal',
        'NC'=>'New Caledonia',
        'NZ'=>'New Zealand',
        'NL'=>'Netherlands',
        'AN'=>'Netherlands Antilles',
        'NI'=>'Nicaragua',
        'NE'=>'Niger',
        'NG'=>'Nigeria',
        'NU'=>'Niue',
        'NF'=>'Norfolk Island',
        'MP'=>'Northern Mariana Islands',
        'NO'=>'Norway',   
        
        
        
        
        
        
        
        
        
        
        
        
        'OM'=>'Oman',

        'PK'=>'Pakistan',
        'PW'=>'Palau',
        'PS'=>'Palestine',
        'PA'=>'Panama',
        'PG'=>'Papua New Guinea',
        'PY'=>'Paraguay',
        'CN'=>'People\'s Republic of China',
        'PE'=>'Peru',
        
        
        'PH'=>'Philippines, Republic of the',
        'PN'=>'Pitcairn',
        'PL'=>'Poland',
        'PT'=>'Portugal',
        
        'PR'=>'Puerto Rico',
        
        
        'QA'=>'Qatar',

        'RE'=>'Reunion',
        'RO'=>'Romania',
        'RU'=>'Russian Federation',
        'RW'=>'Rwanda',

        'KN'=>'Saint Kitts And Nevis',
        'LC'=>'Saint Lucia',

        'VC'=>'Saint Vincent And The Grenadines',
        'SM'=>'San Marino',
        'WS'=>'Samoa',
        'ST'=>'Sao Tome And Principe',
        'SA'=>'Saudi Arabia',
        'UK'=>'Scotland',
        'SN'=>'Senegal',
        'RS'=>'Serbia',
        'SC'=>'Seychelles',
        'SL'=>'Sierra Leone',
        'SG'=>'Singapore',
        'SI'=>'Slovenia',
        'SK'=>'Slovakia (Slovak Republic)',
        'SB'=>'Solomon Islands',
        'SO'=>'Somalia',
        'ZA'=>'South Africa',
        'GS'=>'South Georgia And The South Sandwich Islands',
        'SU'=>'Soviet Union',
        'ES'=>'Spain',
        'LK'=>'Sri Lanka',
        'SH'=>'St. Helena',

        'PM'=>'St. Pierre And Miquelon',
        'SD'=>'Sudan',
        'SR'=>'Suriname',
        
        'SJ'=>'Svalbard And Jan Mayen Islands',
        'SZ'=>'Swaziland',
        'SE'=>'Sweden', 
        'CH'=>'Switzerland',

        'SY'=>'Syrian Arab Republic',
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        'TZ'=>'Tanzania, United Republic Of',
        'TW'=>'Taiwan',
        'TJ'=>'Tajikistan',

        
        
        'TH'=>'Thailand',
        'TG'=>'Togo',
        'TK'=>'Tokelau',
        'TO'=>'Tonga',
        'TT'=>'Trinidad And Tobago',
        'TR'=>'Turkey',

        'TM'=>'Turkmenistan',
        
        
        'TC'=>'Turks And Caicos Islands',
        
        
        'TN'=>'Tunisia',
        'TV'=>'Tuvalu',
        
        
        'UG'=>'Uganda',
        'UA'=>'Ukraine',
        
        'UU'=>'United Arab Emirates',
        'UK'=>'United Kingdom',
        'US'=>'United States',
        'UM'=>'United States Minor Outlying Islands',
        'UY'=>'Uruguay',

        'UZ'=>'Uzbekistan',
        
        'VU'=>'Vanuatu',
        'VA'=>'Vatican City State (Holy See)',
        'VE'=>'Venezuela',
        'VN'=>'Viet Nam',
        'VG'=>'Virgin Islands (British)',
        'VI'=>'Virgin Islands (U.S.)',
        
        
        

        'WF'=>'Wallis And Futuna Islands',
        
        

        'YE'=>'Yemen',
        'ZM'=>'Zambia',
        'ZW'=>'Zimbabwe'
    );


$idclause='';
if($id) {
  $idclause=" id='$id'";
}




$select = '<select name="'.$name.'" class="'.$class.'"  style=""'.$idclause.'>';

foreach ($countries as $abbr => $country) {
    $select .= '<option value="'.strtoupper($abbr).'"'.(strtoupper($selected)== strtoupper($abbr) ? ' selected="selected"' : '').'>'.$country.'</option> ';
}

$select .= '</select>';

return $select;

});


Form::macro('countries_edit', function ($name = "country", $selected = null, $class = "country", $id = "country_edit") {

    $countries = array(
       
        'AF'=>'Afghanistan',
        'AL'=>'Albania',
        'DZ'=>'Algeria',
        'AS'=>'American Samoa',
        'AD'=>'Andorra',
        'AO'=>'Angola',
        'AI'=>'Anguilla',
        'AQ'=>'Antarctica',
        
        'AG'=>'Antigua And Barbuda',
        'AR'=>'Argentina',
        'AM'=>'Armenia',
        'AW'=>'Aruba',
        'AU'=>'Australia',
        'AT'=>'Austria',
    // 'AC'=>'Ascension Island',
        
        

        'AZ'=>'Azerbaijan',
     // 'AX'=>'Ãƒâ€¦land',
        
        
        
        'BS'=>'Bahamas',  
        'BH'=>'Bahrain',
        'BD'=>'Bangladesh',
        'BB'=>'Barbados',
        'BY'=>'Belarus',
        'BE'=>'Belgium',
        'BZ'=>'Belize',
        'BJ'=>'Benin',
        'BM'=>'Bermuda',
        'BT'=>'Bhutan',
        'BO'=>'Bolivia',
        'BA'=>'Bosnia And Herzegovina',
        
        'BW'=>'Botswana',
        'BR'=>'Brazil',
        'BN'=>'Brunei Darussalam',
        'BG'=>'Bulgaria',
        'BF'=>'Burkina Faso',
        'BI'=>'Burundi',
        
        
        
        
        
        
        
        
        
    // 'BV'=>'Bouvet Island',
        
        
        
    // 'IO'=>'British Indian Ocean Territory',
        'KH'=>'Cambodia',
        'CM'=>'Cameroon',
        'CA'=>'Canada',
        'CV'=>'Cape Verde',
        'KY'=>'Cayman Islands',
        'CF'=>'Central African Republic',
        'TD'=>'Chad',
        'CL'=>'Chile',
        
        'CX'=>'Christmas Island',
        'CC'=>'Cocos (Keeling) Islands',
        'CO'=>'Colombia',
        'KM'=>'Comoros',
        'CD'=>'Congo (Democratic Republic)',
        'CG'=>'Congo (Republic)',

        'CK'=>'Cook Islands',
        'CR'=>'Costa Rica',
        'CI'=>'Côte d\'Ivoire',
        'HR'=>'Croatia (local name: Hrvatska)',
        'CU'=>'Cuba',
        'CY'=>'Cyprus',
        'CZ'=>'Czech Republic',
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        'DK'=>'Denmark',
        'DJ'=>'Djibouti',
        
        'DM'=>'Dominica',
        'DO'=>'Dominican Republic',
        'TI'=>'East Timor',
        'TP'=>'East Timor (old code)',
        'EC'=>'Ecuador',
        'EG'=>'Egypt',
        'SV'=>'El Salvador',
        'GQ'=>'Equatorial Guinea',
        'ER'=>'Eritrea',
        'EE'=>'Estonia',
        
        
        'ET'=>'Ethiopia',
        'EU'=>'European Union',
        
        
        
        'FK'=>'Falkland Islands (Malvinas)',
        'FO'=>'Faroe Islands',
        'FJ'=>'Fiji',

        'FI'=>'Finland',
        
        
        'FR'=>'France',
        'GF'=>'French Guiana',
        'PF'=>'French Polynesia',
        'TF'=>'French Southern Territories',
        
        

        'GA'=>'Gabon',
        'GM'=>'Gambia',
        'GE'=>'Georgia',
        'DE'=>'Germany',
        'GH'=>'Ghana',
        'GI'=>'Gibraltar',
        'GR'=>'Greece',
        'GL'=>'Greenland',
        'GD'=>'Grenada',
        'GP'=>'Guadeloupe',
        'GU'=>'Guam',
        'GT'=>'Guatemala',
        'GN'=>'Guinea',
        'GW'=>'Guinea-Bissau',
        'GG'=>'Guernsey',
        'GY'=>'Guyana',
        
        'HT'=>'Haiti',
        'HM'=>'Heard And Mc Donald Islands',
        'HN'=>'Honduras',
        'HK'=>'Hong Kong',
        
        
        
        'HU'=>'Hungary',
        'IS'=>'Iceland',
        'IN'=>'India',
        'ID'=>'Indonesia',
        
        'IR'=>'Iran, Islamic Republic Of',
        'IQ'=>'Iraq',
        'IE'=>'Ireland',
        'IM'=>'Isle of Man',
        'IL'=>'Israel',
        'IT'=>'Italy',
        
        
        
        
        
        
        'JM'=>'Jamaica',
        'JP'=>'Japan',
        'JE'=>'Jersey',
        
        'JO'=>'Jordan',
        
        'KZ'=>'Kazakhstan',
        'KE'=>'Kenya',
        'KI'=>'Kiribati',
        

        
        
        
        'KR'=>'Korea, Republic Of',
        'KW'=>'Kuwait',
        'KG'=>'Kyrgyzstan',

        'LA'=>'Lao People\'s Democratic Republic',
        'LV'=>'Latvia',
        'LB'=>'Lebanon',
        'LS'=>'Lesotho',
        'LR'=>'Liberia',
        'LY'=>'Libyan Arab Jamahiriya',
        'LI'=>'Liechtenstein',
        'LT'=>'Lithuania',
        'LU'=>'Luxembourg',
        
        

        
        
        
        
        
        
        
        
        
        
        'MO'=>'Macau',
        'MK'=>'Macedonia, The Former Yugoslav Republic Of',
        'MG'=>'Madagascar',
        'MY'=>'Malaysia',   
        'MW'=>'Malawi',
        'MV'=>'Maldives',
        'ML'=>'Mali',
        'MT'=>'Malta',
        'MH'=>'Marshall Islands',
        'MQ'=>'Martinique',
        'MU'=>'Mauritius',
        
        'MR'=>'Mauritania',

        'YT'=>'Mayotte',
        'FM'=>'Micronesia, Federated States Of',
        'MD'=>'Moldova, Republic Of',
        'MC'=>'Monaco',
        'MN'=>'Mongolia',
        'ME'=>'Montenegro',
        'MS'=>'Montserrat',
        'MA'=>'Morocco',
        'MZ'=>'Mozambique',
        
        'MX'=>'Mexico',
        'MM'=>'Myanmar',
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        'NA'=>'Namibia',  
        'NR'=>'Nauru',
        'NP'=>'Nepal',
        'NC'=>'New Caledonia',
        'NZ'=>'New Zealand',
        'NL'=>'Netherlands',
        'AN'=>'Netherlands Antilles',
        'NI'=>'Nicaragua',
        'NE'=>'Niger',
        'NG'=>'Nigeria',
        'NU'=>'Niue',
        'NF'=>'Norfolk Island',
        'MP'=>'Northern Mariana Islands',
        'NO'=>'Norway',   
        
        
        
        
        
        
        
        
        
        
        
        
        'OM'=>'Oman',

        'PK'=>'Pakistan',
        'PW'=>'Palau',
        'PS'=>'Palestine',
        'PA'=>'Panama',
        'PG'=>'Papua New Guinea',
        'PY'=>'Paraguay',
        'CN'=>'People\'s Republic of China',
        'PE'=>'Peru',
        
        
        'PH'=>'Philippines, Republic of the',
        'PN'=>'Pitcairn',
        'PL'=>'Poland',
        'PT'=>'Portugal',
        
        'PR'=>'Puerto Rico',
        
        
        'QA'=>'Qatar',

        'RE'=>'Reunion',
        'RO'=>'Romania',
        'RU'=>'Russian Federation',
        'RW'=>'Rwanda',

        'KN'=>'Saint Kitts And Nevis',
        'LC'=>'Saint Lucia',

        'VC'=>'Saint Vincent And The Grenadines',
        'SM'=>'San Marino',
        'WS'=>'Samoa',
        'ST'=>'Sao Tome And Principe',
        'SA'=>'Saudi Arabia',
        'UK'=>'Scotland',
        'SN'=>'Senegal',
        'RS'=>'Serbia',
        'SC'=>'Seychelles',
        'SL'=>'Sierra Leone',
        'SG'=>'Singapore',
        'SI'=>'Slovenia',
        'SK'=>'Slovakia (Slovak Republic)',
        'SB'=>'Solomon Islands',
        'SO'=>'Somalia',
        'ZA'=>'South Africa',
        'GS'=>'South Georgia And The South Sandwich Islands',
        'SU'=>'Soviet Union',
        'ES'=>'Spain',
        'LK'=>'Sri Lanka',
        'SH'=>'St. Helena',

        'PM'=>'St. Pierre And Miquelon',
        'SD'=>'Sudan',
        'SR'=>'Suriname',
        
        'SJ'=>'Svalbard And Jan Mayen Islands',
        'SZ'=>'Swaziland',
        'SE'=>'Sweden', 
        'CH'=>'Switzerland',

        'SY'=>'Syrian Arab Republic',
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        'TZ'=>'Tanzania, United Republic Of',
        'TW'=>'Taiwan',
        'TJ'=>'Tajikistan',

        
        
        'TH'=>'Thailand',
        'TG'=>'Togo',
        'TK'=>'Tokelau',
        'TO'=>'Tonga',
        'TT'=>'Trinidad And Tobago',
        'TR'=>'Turkey',

        'TM'=>'Turkmenistan',
        
        
        'TC'=>'Turks And Caicos Islands',
        
        
        'TN'=>'Tunisia',
        'TV'=>'Tuvalu',
        
        
        'UG'=>'Uganda',
        'UA'=>'Ukraine',
        
        'UU'=>'United Arab Emirates',
        'UK'=>'United Kingdom',
        'US'=>'United States',
        'UM'=>'United States Minor Outlying Islands',
        'UY'=>'Uruguay',

        'UZ'=>'Uzbekistan',
        
        'VU'=>'Vanuatu',
        'VA'=>'Vatican City State (Holy See)',
        'VE'=>'Venezuela',
        'VN'=>'Viet Nam',
        'VG'=>'Virgin Islands (British)',
        'VI'=>'Virgin Islands (U.S.)',
        
        
        

        'WF'=>'Wallis And Futuna Islands',
        
        

        'YE'=>'Yemen',
        'ZM'=>'Zambia',
        'ZW'=>'Zimbabwe'
    );


$idclause='';
if($id) {
  $idclause=" id='$id'";
}




$select = '<select name="'.$name.'" class="'.$class.'"  style=""'.$idclause.'>';

foreach ($countries as $abbr => $country) {
    $select .= '<option value="'.strtoupper($abbr).'"'.(strtoupper($selected)== strtoupper($abbr) ? ' selected="selected"' : '').'>'.$country.'</option> ';
}

$select .= '</select>';

return $select;

});



Form::macro('date_display_format', function ($name = "date_display_format", $selected = null, $class = null) {

    $formats = [
        'Y-m-d',
        'Y-m-d',
        'D M d, Y',
        'M j, Y',
        'd M, Y',
        'm/d/Y',
        'n/d/y',
        'd/m/Y',
        'm/j/Y',
        'd.m.Y',
    ];

    foreach ($formats as $format) {

        $date_display_formats[$format] = Carbon::parse(date('Y').'-'.date('m').'-25')->format($format);
    }
    $select = '<select name="'.$name.'" class="'.$class.'" style="min-width:250px">';
    foreach ($date_display_formats as $format => $date_display_format) {
        $select .= '<option value="'.$format.'"'.($selected == $format ? ' selected="selected"' : '').'>'.$date_display_format.'</option> ';
    }

    $select .= '</select>';
    return $select;

});


Form::macro('time_display_format', function ($name = "time_display_format", $selected = null, $class = null) {

    $formats = [
        'g:iA',
        'h:iA',
        'H:i',
    ];

    foreach ($formats as $format) {
        $time_display_formats[$format] = Carbon::now()->format($format);
    }
    $select = '<select name="'.$name.'" class="'.$class.'" style="min-width:150px">';
    foreach ($time_display_formats as $format => $time_display_format) {
        $select .= '<option value="'.$format.'"'.($selected == $format ? ' selected="selected"' : '').'>'.$time_display_format.'</option> ';
    }

    $select .= '</select>';
    return $select;

});

/**
* Barcode macro
* Generates the dropdown menu of available 1D barcodes
*/
Form::macro('alt_barcode_types', function ($name = "alt_barcode", $selected = null, $class = null) {

    $barcode_types = array(
        'C128',
        'C39',
        'PDF417',
        'EAN5',

    );

    $select = '<select name="'.$name.'" class="'.$class.'">';
    foreach ($barcode_types as $barcode_type) {
        $select .= '<option value="'.$barcode_type.'"'.($selected == $barcode_type ? ' selected="selected"' : '').'>'.$barcode_type.'</option> ';
    }

    $select .= '</select>';

    return $select;

});


/**
* Barcode macro
* Generates the dropdown menu of available 2D barcodes
*/
Form::macro('barcode_types', function ($name = "barcode_type", $selected = null, $class = null) {

    $barcode_types = array(
        'QRCODE',
        'DATAMATRIX',

    );

    $select = '<select name="'.$name.'" class="'.$class.'">';
    foreach ($barcode_types as $barcode_type) {
        $select .= '<option value="'.$barcode_type.'"'.($selected == $barcode_type ? ' selected="selected"' : '').'>'.$barcode_type.'</option> ';
    }

    $select .= '</select>';

    return $select;

});

Form::macro('username_format', function ($name = "username_format", $selected = null, $class = null) {

    $formats = array(
        'firstname.lastname' => trans('general.firstname_lastname_format'),
        'firstname' => trans('general.first_name_format'),
        'filastname' => trans('general.filastname_format'),
        'lastnamefirstinitial' => trans('general.lastnamefirstinitial_format'),
        'firstname_lastname' => trans('general.firstname_lastname_underscore_format'),

    );

    $select = '<select name="'.$name.'" class="'.$class.'" style="width: 100%">';
    foreach ($formats as $format => $label) {
        $select .= '<option value="'.$format.'"'.($selected == $format ? ' selected="selected"' : '').'>'.$label.'</option> '."\n";
    }

    $select .= '</select>';

    return $select;

});

Form::macro('two_factor_options', function ($name = "two_factor_enabled", $selected = null, $class = null) {

    $formats = array(
        '' => trans('admin/settings/general.two_factor_disabled'),
        '1' => trans('admin/settings/general.two_factor_optional'),
        '2' => trans('admin/settings/general.two_factor_required'),

    );

    $select = '<select name="'.$name.'" class="'.$class.'">';
    foreach ($formats as $format => $label) {
        $select .= '<option value="'.$format.'"'.($selected == $format ? ' selected="selected"' : '').'>'.$label.'</option> '."\n";
    }

    $select .= '</select>';

    return $select;

});


Form::macro('customfield_elements', function ($name = "customfield_elements", $selected = null, $class = null) {

    $formats = array(
        'text' => 'Text Box',
        'listbox' => 'List Box',
        'textarea' => 'Textarea (multi-line) ',
     //   'checkbox' => 'Checkbox',
     //   'radio' => 'Radio Buttons',
    );

    $select = '<select name="'.$name.'" class="'.$class.'" style="width: 100%">';
    foreach ($formats as $format => $label) {
        $select .= '<option value="'.$format.'"'.($selected == $format ? ' selected="selected"' : '').'>'.$label.'</option> '."\n";
    }

    $select .= '</select>';

    return $select;

});



Form::macro('skin', function ($name = "skin", $selected = null, $class = null) {

    $formats = array(
        '' => 'Default Blue',
        'green-dark' => 'Green Dark',
        'red-dark' => 'Red Dark',
        'orange-dark' => 'Orange Dark',
    );

    $select = '<select name="'.$name.'" class="'.$class.'" style="width: 250px">';
    foreach ($formats as $format => $label) {
        $select .= '<option value="'.$format.'"'.($selected == $format ? ' selected="selected"' : '').'>'.$label.'</option> '."\n";
    }

    $select .= '</select>';
    return $select;

});
