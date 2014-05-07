<?php
/**
*  TimezoneHelper.php
*  CakePHP Helper. Generates user friendly timezone options for use in forms.
*
* @author Rob Mcvey
* @copyright Rob McVey, 17 May, 2013
* @package default
**/
App::uses('AppHelper', 'View/Helper');

class TimezoneHelper extends AppHelper {
	
/**
* Array list of the complete ISO 3166-1 countries and their official codes
* @var array
*/
	protected $countries = array(
		'AF' => 'Afghanistan',
		'AX' => 'Åland Islands',
		'AL' => 'Albania',
		'DZ' => 'Algeria',
		'AS' => 'American Samoa',
		'AD' => 'Andorra',
		'AO' => 'Angola',
		'AI' => 'Anguilla',
		'AQ' => 'Antarctica',
		'AG' => 'Antigua and Barbuda',
		'AR' => 'Argentina',
		'AM' => 'Armenia',
		'AW' => 'Aruba',
		'AU' => 'Australia',
		'AT' => 'Austria',
		'AZ' => 'Azerbaijan',
		'BS' => 'Bahamas',
		'BH' => 'Bahrain',
		'BD' => 'Bangladesh',
		'BB' => 'Barbados',
		'BY' => 'Belarus',
		'BE' => 'Belgium',
		'BZ' => 'Belize',
		'BJ' => 'Benin',
		'BM' => 'Bermuda',
		'BT' => 'Bhutan',
		'BO' => 'Bolivia, Plurinational State of',
		'BQ' => 'Bonaire, Sint Eustatius and Saba',
		'BA' => 'Bosnia and Herzegovina',
		'BW' => 'Botswana',
		//'BV' => 'Bouvet Island',
		'BR' => 'Brazil',
		'IO' => 'British Indian Ocean Territory',
		'BN' => 'Brunei Darussalam',
		'BG' => 'Bulgaria',
		'BF' => 'Burkina Faso',
		'BI' => 'Burundi',
		'KH' => 'Cambodia',
		'CM' => 'Cameroon',
		'CA' => 'Canada',
		'CV' => 'Cape Verde',
		'KY' => 'Cayman Islands',
		'CF' => 'Central African Republic',
		'TD' => 'Chad',
		'CL' => 'Chile',
		'CN' => 'China',
		'CX' => 'Christmas Island',
		'CC' => 'Cocos (Keeling) Islands',
		'CO' => 'Colombia',
		'KM' => 'Comoros',
		'CG' => 'Congo',
		'CD' => 'Congo, the Democratic Republic of the',
		'CK' => 'Cook Islands',
		'CR' => 'Costa Rica',
		'CI' => 'Côte d\'Ivoire',
		'HR' => 'Croatia',
		'CU' => 'Cuba',
		'CW' => 'Curaçao',
		'CY' => 'Cyprus',
		'CZ' => 'Czech Republic',
		'DK' => 'Denmark',
		'DJ' => 'Djibouti',
		'DM' => 'Dominica',
		'DO' => 'Dominican Republic',
		'EC' => 'Ecuador',
		'EG' => 'Egypt',
		'SV' => 'El Salvador',
		'GQ' => 'Equatorial Guinea',
		'ER' => 'Eritrea',
		'EE' => 'Estonia',
		'ET' => 'Ethiopia',
		'FK' => 'Falkland Islands (Malvinas)',
		'FO' => 'Faroe Islands',
		'FJ' => 'Fiji',
		'FI' => 'Finland',
		'FR' => 'France',
		'GF' => 'French Guiana',
		'PF' => 'French Polynesia',
		'TF' => 'French Southern Territories',
		'GA' => 'Gabon',
		'GM' => 'Gambia',
		'GE' => 'Georgia',
		'DE' => 'Germany',
		'GH' => 'Ghana',
		'GI' => 'Gibraltar',
		'GR' => 'Greece',
		'GL' => 'Greenland',
		'GD' => 'Grenada',
		'GP' => 'Guadeloupe',
		'GU' => 'Guam',
		'GT' => 'Guatemala',
		'GG' => 'Guernsey',
		'GN' => 'Guinea',
		'GW' => 'Guinea-Bissau',
		'GY' => 'Guyana',
		'HT' => 'Haiti',
		//'HM' => 'Heard Island and McDonald Islands',
		'VA' => 'Holy See (Vatican City State)',
		'HN' => 'Honduras',
		'HK' => 'Hong Kong',
		'HU' => 'Hungary',
		'IS' => 'Iceland',
		'IN' => 'India',
		'ID' => 'Indonesia',
		'IR' => 'Iran, Islamic Republic of',
		'IQ' => 'Iraq',
		'IE' => 'Ireland',
		'IM' => 'Isle of Man',
		'IL' => 'Israel',
		'IT' => 'Italy',
		'JM' => 'Jamaica',
		'JP' => 'Japan',
		'JE' => 'Jersey',
		'JO' => 'Jordan',
		'KZ' => 'Kazakhstan',
		'KE' => 'Kenya',
		'KI' => 'Kiribati',
		'KP' => 'Korea, Democratic People\'s Republic of',
		'KR' => 'Korea, Republic of',
		'KW' => 'Kuwait',
		'KG' => 'Kyrgyzstan',
		'LA' => 'Lao People\'s Democratic Republic',
		'LV' => 'Latvia',
		'LB' => 'Lebanon',
		'LS' => 'Lesotho',
		'LR' => 'Liberia',
		'LY' => 'Libya',
		'LI' => 'Liechtenstein',
		'LT' => 'Lithuania',
		'LU' => 'Luxembourg',
		'MO' => 'Macao',
		'MK' => 'Macedonia, The Former Yugoslav Republic of',
		'MG' => 'Madagascar',
		'MW' => 'Malawi',
		'MY' => 'Malaysia',
		'MV' => 'Maldives',
		'ML' => 'Mali',
		'MT' => 'Malta',
		'MH' => 'Marshall Islands',
		'MQ' => 'Martinique',
		'MR' => 'Mauritania',
		'MU' => 'Mauritius',
		'YT' => 'Mayotte',
		'MX' => 'Mexico',
		'FM' => 'Micronesia, Federated States of',
		'MD' => 'Moldova, Republic of',
		'MC' => 'Monaco',
		'MN' => 'Mongolia',
		'ME' => 'Montenegro',
		'MS' => 'Montserrat',
		'MA' => 'Morocco',
		'MZ' => 'Mozambique',
		'MM' => 'Myanmar',
		'NA' => 'Namibia',
		'NR' => 'Nauru',
		'NP' => 'Nepal',
		'NL' => 'Netherlands',
		'NC' => 'New Caledonia',
		'NZ' => 'New Zealand',
		'NI' => 'Nicaragua',
		'NE' => 'Niger',
		'NG' => 'Nigeria',
		'NU' => 'Niue',
		'NF' => 'Norfolk Island',
		'MP' => 'Northern Mariana Islands',
		'NO' => 'Norway',
		'OM' => 'Oman',
		'PK' => 'Pakistan',
		'PW' => 'Palau',
		'PS' => 'Palestine, State of',
		'PA' => 'Panama',
		'PG' => 'Papua New Guinea',
		'PY' => 'Paraguay',
		'PE' => 'Peru',
		'PH' => 'Philippines',
		'PN' => 'Pitcairn',
		'PL' => 'Poland',
		'PT' => 'Portugal',
		'PR' => 'Puerto Rico',
		'QA' => 'Qatar',
		'RE' => 'Réunion',
		'RO' => 'Romania',
		'RU' => 'Russian Federation',
		'RW' => 'Rwanda',
		'BL' => 'Saint Barthélemy',
		'SH' => 'Saint Helena, Ascension and Tristan da Cunha',
		'KN' => 'Saint Kitts and Nevis',
		'LC' => 'Saint Lucia',
		'MF' => 'Saint Martin (French part)',
		'PM' => 'Saint Pierre and Miquelon',
		'VC' => 'Saint Vincent and the Grenadines',
		'WS' => 'Samoa',
		'SM' => 'San Marino',
		'ST' => 'Sao Tome and Principe',
		'SA' => 'Saudi Arabia',
		'SN' => 'Senegal',
		'RS' => 'Serbia',
		'SC' => 'Seychelles',
		'SL' => 'Sierra Leone',
		'SG' => 'Singapore',
		'SX' => 'Sint Maarten (Dutch part)',
		'SK' => 'Slovakia',
		'SI' => 'Slovenia',
		'SB' => 'Solomon Islands',
		'SO' => 'Somalia',
		'ZA' => 'South Africa',
		'GS' => 'South Georgia and the South Sandwich Islands',
		'SS' => 'South Sudan',
		'ES' => 'Spain',
		'LK' => 'Sri Lanka',
		'SD' => 'Sudan',
		'SR' => 'Suriname',
		'SJ' => 'Svalbard and Jan Mayen',
		'SZ' => 'Swaziland',
		'SE' => 'Sweden',
		'CH' => 'Switzerland',
		'SY' => 'Syrian Arab Republic',
		'TW' => 'Taiwan, Province of China',
		'TJ' => 'Tajikistan',
		'TZ' => 'Tanzania, United Republic of',
		'TH' => 'Thailand',
		'TL' => 'Timor-Leste',
		'TG' => 'Togo',
		'TK' => 'Tokelau',
		'TO' => 'Tonga',
		'TT' => 'Trinidad and Tobago',
		'TN' => 'Tunisia',
		'TR' => 'Turkey',
		'TM' => 'Turkmenistan',
		'TC' => 'Turks and Caicos Islands',
		'TV' => 'Tuvalu',
		'UG' => 'Uganda',
		'UA' => 'Ukraine',
		'AE' => 'United Arab Emirates',
		'GB' => 'United Kingdom',
		'US' => 'United States',
		'UM' => 'United States Minor Outlying Islands',
		'UY' => 'Uruguay',
		'UZ' => 'Uzbekistan',
		'VU' => 'Vanuatu',
		'VE' => 'Venezuela, Bolivarian Republic of',
		'VN' => 'Viet Nam',
		'VG' => 'Virgin Islands, British',
		'VI' => 'Virgin Islands, U.S.',
		'WF' => 'Wallis and Futuna',
		'EH' => 'Western Sahara',
		'YE' => 'Yemen',
		'ZM' => 'Zambia',
		'ZW' => 'Zimbabwe',
	);
	
/**
 * Return HTML select input of Timezone options
 *
 * @return void
 * @author Rob Mcvey
 **/
	public function select($fieldName = null, $options = null, $attributes = array()) {
		$options = $this->options();
		if (!empty($attributes)) {
			if (isset($attributes['value']) && !is_null($attributes['value'])) {
				$value = $attributes['value'];
			}
			if (isset($attributes['class']) && !is_null($attributes['class'])) {
				$class = $attributes['class'];
			}
		}

		/*This make possible have a localized table name */
		$tmp = explode('.', $fieldName);
		if (count($tmp) == 1) {
			$tblName = Inflector::camelize(Inflector::singularize($this->params['controller']));
			$field = "data[$tblName][$fieldName]";
		} else {
			$field = "data[$tmp[0]][$tmp[1]]";
			$tblName = $tmp[0];
		}

		if (isset($class)) {
			$select = "<select id=\"${tblName}Timezone\" class=\"$class\" name=\"$field\">\n";
		} else {
			$select = "<select id=\"${tblName}Timezone\" name=\"$field\">\n";
		}

		// Default option when none passed
		if (!isset($value) || empty($value)) {
			$choosePrompt = __('Select from list');
			$select .= "<option value=\"\" selected=\"selected\">$choosePrompt</option>\n";
		}

		// Format the options to extract our default value (the users aready saved timezone)
		foreach ($options as $country => $timezones) {
			$select .= "<optgroup label=\"$country\">\n";
			foreach ($timezones as $identifier => $option) {
				$selected = "";
				if (isset($value) && $identifier == $value) {
					$selected = " selected=\"selected\"";
				}
				$select .= "\t<option$selected value=\"$identifier\">$option</option>\n";
				$formatted[$identifier] = $option;
			}
			$select .= "</optgroup>\n";
		}
		$select .= "</select>";
		return $select;
	}
	
	
/**
 * Returns array of select options for use in CakePHP's FormHelper::input()
 *
 * @return array $options Formatted options for every possible timezone
 * @author Rob Mcvey
 **/
	public function options() {
		$options = $this->_formattedTimeZoneOptions();
		return $options;
	}
	
/**
 * Returns an array of all Countries
 *
 * @return void
 * @author Rob Mcvey
 **/
	public function getCountries() {
		return $this->countries;
	}

/**
 * Creates an array of all possible times zones for every Country in the world
 *
 * @return void
 * @author Rob Mcvey
 **/
	protected function _formattedTimeZoneOptions() {
		// Create a default timezone object.
		$DateTimeZone = new DateTimeZone('Europe/London');
		
		// Get our list of ISO array of codes => countries
		$countries = $this->getCountries();
		
		// Create an array of ALL possible timezones that exist in each Country
		$options = array();
		foreach ($countries as $code => $country) {
			$options[$country] = $DateTimeZone->listIdentifiers($DateTimeZone::PER_COUNTRY , $code);
		}
		
		// Format the timezone options, grouping each by the offset from GMT
		// as we only need to present the user with one version of their offset.
		// E.g. We show "Australia GMT +6" only once in the list (even though there 
		// may be several +6 timeszone identifiers for Australia. Showing them all
		// is confusing for the user)
		$formattedAndGrouped = array();
		foreach ($options as $country => $timezones) {
			if (empty($timezones)) {
				continue;
			}
			$formatted = array();
			foreach ($timezones as $k => $timezone) {
				try {
					// DateTime and DateTimeZone objects for this option
					$DateTimeZoneForLocality = new DateTimeZone($timezone);
					$DateTimeForLocality = new DateTime('now' , $DateTimeZoneForLocality);
					
					// What is the GMT offset
					$offsetInSeconds = $DateTimeZoneForLocality->getOffset($DateTimeForLocality);
					
					// Always show 2 decimals on timezone offsets e.g. -04.00
					// E.g. 3600 becomes +01.00
					$roundedOffsetHours =  number_format($offsetInSeconds / 3600 , 2 , ':' , "");
					
					// Preix zero and positive numbers wih +
					if ($roundedOffsetHours >= 0) {
						$roundedOffsetHours = sprintf('+%s' , $roundedOffsetHours);
					}
					
					// Format with a leading "GMT" and prepend with the local time
					// Resulting in an option "GMT +10 (23:09pm)"
					$localTime = $DateTimeForLocality->format("G:ia");
					$roundedOffsetHours = sprintf('GMT %s (%s)' , $roundedOffsetHours , $localTime);
					
					// Group by the timezone offset
					$formatted[$roundedOffsetHours] = $timezone;
					
				} catch(Exception $e) {
				 	continue; // DateTime and DateTimeZone will only throw if invalid identifier
				}
				
			}
			// Sort by offset
			ksort($formatted);
			// Flip around, PHP timezone indentifier becomes the key, and the user 
			// friendly option the val
			$formattedAndGrouped[$country] = array_flip($formatted);
		}
		return($formattedAndGrouped);
	}

}
	
