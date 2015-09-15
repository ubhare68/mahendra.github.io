<?php
/*
Plugin Name: WooCommerce All Currencies
Plugin URI: http://www.algoritmika.com/shop/wordpress-woocommerce-all-currencies-plugin/
Description: Adds all worlds currencies to WooCommerce WordPress Plugin.
Version: 1.0.2
Author: Algoritmika Ltd.
Author URI: http://www.algoritmika.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
?>
<?php
if ( ! class_exists( 'wooallcurlite_plugin' ) ) {

	class wooallcurlite_plugin{
		
		public function __construct(){
		
			$this->currencies_list = array(
				"AFN"    => "Afghan afghani",
				"ALL"    => "Albanian lek",
				"DZD"    => "Algerian dinar",
				"AOA"    => "Angolan kwanza",
				"ARS"    => "Argentine peso",
				"AMD"    => "Armenian dram",
				"AWG"    => "Aruban florin",
				"AUD"    => "Australian dollar",
				"AZN"    => "Azerbaijani manat",
				"BSD"    => "Bahamian dollar",
				"BHD"    => "Bahraini dinar",
				"BDT"    => "Bangladeshi taka",
				"BBD"    => "Barbadian dollar",
				"BYR"    => "Belarusian ruble",
				"BZD"    => "Belize dollar",
				"BTN"    => "Bhutanese ngultrum",
				"BOB"    => "Bolivian boliviano",
				"BAM"    => "Bosnia and Herzegovina konvertibilna marka",
				"BWP"    => "Botswana pula",
				"BRL"    => "Brazilian real",
				"GBP"    => "British pound",
				"BND"    => "Brunei dollar",
				"BGN"    => "Bulgarian lev",
				"BIF"    => "Burundi franc",
				"KYD"    => "Cayman Islands dollar",
				"KHR"    => "Cambodian riel",
				"CAD"    => "Canadian dollar",
				"CVE"    => "Cape Verdean escudo",
				"XAF"    => "Central African CFA franc",
				"GQE"    => "Central African CFA franc",
				"XPF"    => "CFP franc",
				"CLP"    => "Chilean peso",
				"CNY"    => "Chinese renminbi",
				"COP"    => "Colombian peso",
				"KMF"    => "Comorian franc",
				"CDF"    => "Congolese franc",
				"CRC"    => "Costa Rican colon",
				"HRK"    => "Croatian kuna",
				"CUC"    => "Cuban peso",
				"CZK"    => "Czech koruna",
				"DKK"    => "Danish krone",
				"DJF"    => "Djiboutian franc",
				"DOP"    => "Dominican peso",
				"XCD"    => "East Caribbean dollar",
				"EGP"    => "Egyptian pound",
				"ERN"    => "Eritrean nakfa",
				"EEK"    => "Estonian kroon",
				"ETB"    => "Ethiopian birr",
				"EUR"    => "European euro",
				"FKP"    => "Falkland Islands pound",
				"FJD"    => "Fijian dollar",
				"GMD"    => "Gambian dalasi",
				"GEL"    => "Georgian lari",
				"GHS"    => "Ghanaian cedi",
				"GIP"    => "Gibraltar pound",
				"GTQ"    => "Guatemalan quetzal",
				"GNF"    => "Guinean franc",
				"GYD"    => "Guyanese dollar",
				"HTG"    => "Haitian gourde",
				"HNL"    => "Honduran lempira",
				"HKD"    => "Hong Kong dollar",
				"HUF"    => "Hungarian forint",
				"ISK"    => "Icelandic króna",
				"INR"    => "Indian rupee",
				"IDR"    => "Indonesian rupiah",
				"IRR"    => "Iranian rial",
				"IQD"    => "Iraqi dinar",
				"ILS"    => "Israeli new sheqel",
				"YER"    => "Yemeni rial",
				"JMD"    => "Jamaican dollar",
				"JPY"    => "Japanese yen",
				"JOD"    => "Jordanian dinar",
				"KZT"    => "Kazakhstani tenge",
				"KES"    => "Kenyan shilling",
				"KGS"    => "Kyrgyzstani som",
				"KWD"    => "Kuwaiti dinar",
				"LAK"    => "Lao kip",
				"LVL"    => "Latvian lats",
				"LBP"    => "Lebanese lira",
				"LSL"    => "Lesotho loti",
				"LRD"    => "Liberian dollar",
				"LYD"    => "Libyan dinar",
				"LTL"    => "Lithuanian litas",
				"MOP"    => "Macanese pataca",
				"MKD"    => "Macedonian denar",
				"MGA"    => "Malagasy ariary",
				"MYR"    => "Malaysian ringgit",
				"MWK"    => "Malawian kwacha",
				"MVR"    => "Maldivian rufiyaa",
				"MRO"    => "Mauritanian ouguiya",
				"MUR"    => "Mauritian rupee",
				"MXN"    => "Mexican peso",
				"MMK"    => "Myanma kyat",
				"MDL"    => "Moldovan leu",
				"MNT"    => "Mongolian tugrik",
				"MAD"    => "Moroccan dirham",
				"MZM"    => "Mozambican metical",
				"NAD"    => "Namibian dollar",
				"NPR"    => "Nepalese rupee",
				"ANG"    => "Netherlands Antillean gulden",
				"TWD"    => "New Taiwan dollar",
				"NZD"    => "New Zealand dollar",
				"NIO"    => "Nicaraguan cordoba",
				"NGN"    => "Nigerian naira",
				"KPW"    => "North Korean won",
				"NOK"    => "Norwegian krone",
				"OMR"    => "Omani rial",
				"TOP"    => "Paanga",
				"PKR"    => "Pakistani rupee",
				"PAB"    => "Panamanian balboa",
				"PGK"    => "Papua New Guinean kina",
				"PYG"    => "Paraguayan guarani",
				"PEN"    => "Peruvian nuevo sol",
				"PHP"    => "Philippine peso",
				"PLN"    => "Polish zloty",
				"QAR"    => "Qatari riyal",
				"RON"    => "Romanian leu",
				"RUB"    => "Russian ruble",
				"RWF"    => "Rwandan franc",
				"SHP"    => "Saint Helena pound",
				"WST"    => "Samoan tala",
				"STD"    => "Sao Tome and Principe dobra",
				"SAR"    => "Saudi riyal",
				"SCR"    => "Seychellois rupee",
				"RSD"    => "Serbian dinar",
				"SLL"    => "Sierra Leonean leone",
				"SGD"    => "Singapore dollar",
				"SYP"    => "Syrian pound",
				"SKK"    => "Slovak koruna",
				"SBD"    => "Solomon Islands dollar",
				"SOS"    => "Somali shilling",
				"ZAR"    => "South African rand",
				"KRW"    => "South Korean won",
				"XDR"    => "Special Drawing Rights",
				"LKR"    => "Sri Lankan rupee",
				"SDG"    => "Sudanese pound",
				"SRD"    => "Surinamese dollar",
				"SZL"    => "Swazi lilangeni",
				"SEK"    => "Swedish krona",
				"CHF"    => "Swiss franc",
				"TJS"    => "Tajikistani somoni",
				"TZS"    => "Tanzanian shilling",
				"THB"    => "Thai baht",
				"TTD"    => "Trinidad and Tobago dollar",
				"TND"    => "Tunisian dinar",
				"TRY"    => "Turkish new lira",
				"TMM"    => "Turkmen manat",
				"AED"    => "UAE dirham",
				"UGX"    => "Ugandan shilling",
				"UAH"    => "Ukrainian hryvnia",
				"USD"    => "United States dollar",
				"UYU"    => "Uruguayan peso",
				"UZS"    => "Uzbekistani som",
				"VUV"    => "Vanuatu vatu",
				"VEB"    => "Venezuelan bolivar",
				"VND"    => "Vietnamese dong",
				"XOF"    => "West African CFA franc",
				"ZMK"    => "Zambian kwacha",
				"ZWD"    => "Zimbabwean dollar",
				
				"RMB"    => "Chinese Yuan",
			);
			$this->currencies_symbols_list = array(
				"AFN"    => "AFN",
				"ALL"    => "ALL",
				"DZD"    => "DZD",
				"AOA"    => "AOA",
				"ARS"    => "ARS",
				"AMD"    => "AMD",
				"AWG"    => "AWG",
				"AUD"    => "&#36;",
				"AZN"    => "AZN",
				"BSD"    => "BSD",
				"BHD"    => "BHD",
				"BDT"    => "BDT",
				"BBD"    => "BBD",
				"BYR"    => "BYR",
				"BZD"    => "BZD",
				"BTN"    => "BTN",
				"BOB"    => "BOB",
				"BAM"    => "BAM",
				"BWP"    => "BWP",
				"BRL"    => "&#82;&#36;",
				"GBP"    => "&pound;",
				"BND"    => "BND",
				"BGN"    => "BGN",
				"BIF"    => "BIF",
				"KYD"    => "KYD",
				"KHR"    => "KHR",
				"CAD"    => "CAD",
				"CVE"    => "CVE",
				"XAF"    => "XAF",
				"GQE"    => "GQE",
				"XPF"    => "XPF",
				"CLP"    => "CLP",
				"CNY"    => "&yen;",
				"COP"    => "COP",
				"KMF"    => "KMF",
				"CDF"    => "CDF",
				"CRC"    => "CRC",
				"HRK"    => "HRK",
				"CUC"    => "CUC",
				"CZK"    => "&#75;&#269;",
				"DKK"    => "&#107;&#114;",
				"DJF"    => "DJF",
				"DOP"    => "DOP",
				"XCD"    => "XCD",
				"EGP"    => "EGP",
				"ERN"    => "ERN",
				"EEK"    => "EEK",
				"ETB"    => "ETB",
				"EUR"    => "&euro;",
				"FKP"    => "FKP",
				"FJD"    => "FJD",
				"GMD"    => "GMD",
				"GEL"    => "GEL",
				"GHS"    => "GHS",
				"GIP"    => "GIP",
				"GTQ"    => "GTQ",
				"GNF"    => "GNF",
				"GYD"    => "GYD",
				"HTG"    => "HTG",
				"HNL"    => "HNL",
				"HKD"    => "&#36;",
				"HUF"    => "&#70;&#116;",
				"ISK"    => "ISK",
				"INR"    => "&#8377;",
				"IDR"    => "Rp",
				"IRR"    => "IRR",
				"IQD"    => "IQD",
				"ILS"    => "&#8362;",
				"YER"    => "YER",
				"JMD"    => "JMD",
				"JPY"    => "&yen;",
				"JOD"    => "JOD",
				"KZT"    => "KZT",
				"KES"    => "KES",
				"KGS"    => "KGS",
				"KWD"    => "KWD",
				"LAK"    => "LAK",
				"LVL"    => "LVL",
				"LBP"    => "LBP",
				"LSL"    => "LSL",
				"LRD"    => "LRD",
				"LYD"    => "LYD",
				"LTL"    => "LTL",
				"MOP"    => "MOP",
				"MKD"    => "MKD",
				"MGA"    => "MGA",
				"MYR"    => "&#82;&#77;",
				"MWK"    => "MWK",
				"MVR"    => "MVR",
				"MRO"    => "MRO",
				"MUR"    => "MUR",
				"MXN"    => "&#36;",
				"MMK"    => "MMK",
				"MDL"    => "MDL",
				"MNT"    => "MNT",
				"MAD"    => "MAD",
				"MZM"    => "MZM",
				"NAD"    => "NAD",
				"NPR"    => "NPR",
				"ANG"    => "ANG",
				"TWD"    => "&#78;&#84;&#36;",
				"NZD"    => "&#36;",
				"NIO"    => "NIO",
				"NGN"    => "NGN",
				"KPW"    => "KPW",
				"NOK"    => "&#107;&#114;",
				"OMR"    => "OMR",
				"TOP"    => "TOP",
				"PKR"    => "PKR",
				"PAB"    => "PAB",
				"PGK"    => "PGK",
				"PYG"    => "PYG",
				"PEN"    => "PEN",
				"PHP"    => "&#8369;",
				"PLN"    => "&#122;&#322;",
				"QAR"    => "QAR",
				"RON"    => "lei",
				"RUB"    => "RUB",
				"RWF"    => "RWF",
				"SHP"    => "SHP",
				"WST"    => "WST",
				"STD"    => "STD",
				"SAR"    => "SAR",
				"SCR"    => "SCR",
				"RSD"    => "RSD",
				"SLL"    => "SLL",
				"SGD"    => "&#36;",
				"SYP"    => "SYP",
				"SKK"    => "SKK",
				"SBD"    => "SBD",
				"SOS"    => "SOS",
				"ZAR"    => "&#82;",
				"KRW"    => "&#8361;",
				"XDR"    => "XDR",
				"LKR"    => "LKR",
				"SDG"    => "SDG",
				"SRD"    => "SRD",
				"SZL"    => "SZL",
				"SEK"    => "&#107;&#114;",
				"CHF"    => "&#67;&#72;&#70;",
				"TJS"    => "TJS",
				"TZS"    => "TZS",
				"THB"    => "&#3647;",
				"TTD"    => "TTD",
				"TND"    => "TND",
				"TRY"    => "&#84;&#76;",
				"TMM"    => "TMM",
				"AED"    => "AED",
				"UGX"    => "UGX",
				"UAH"    => "UAH",
				"USD"    => "&#36;",
				"UYU"    => "UYU",
				"UZS"    => "UZS",
				"VUV"    => "VUV",
				"VEB"    => "VEB",
				"VND"    => "VND",
				"XOF"    => "XOF",
				"ZMK"    => "ZMK",
				"ZWD"    => "ZWD",		
				
				"RMB"    => "&yen;",
			);

			//$this->items = array();			
		
			add_filter( 'woocommerce_currencies', array($this, 'add_all_currencies'), 99);
			add_filter( 'woocommerce_currency_symbol', array($this, 'add_all_currencies_symbols'), 99, 2);
		
			//Settings
			if(is_admin()){
				add_action('admin_menu', array($this, 'add_plugin_options_page'));
			}
		}
		
		function add_all_currencies( $currencies ) {

			foreach ($this->currencies_list as $currency_id => $currency_name)
				$currencies[$currency_id] = __( $currency_name, 'woocommerce' );
		
			asort ($currencies);
		
			return $currencies;
		}
		 
		function add_all_currencies_symbols( $currency_symbol, $currency ) {
		
			$options = get_option('wooallcurlite_option_group');
			if (empty($options[$currency])) return $this->currencies_symbols_list[$currency];
		
			return $options[$currency];
		}
		
		public function add_plugin_options_page(){
			add_submenu_page( 'woocommerce', 'WooCommerce All Currencies Settings Admin', 'All Currencies Settings', 'manage_options', 'wooallcurlite-settings-admin', array($this, 'create_admin_page'));
		}

		public function create_admin_page(){
			?>
		<div class="wrap">
			<h2>WooCommerce All Currencies Options</h2>			
			<form method="post">
				<?php submit_button(); ?>				
				<div id="message" class="updated">
					<p><strong><?php _e('You need <a href="http://www.algoritmika.com/shop/wordpress-woocommerce-all-currencies-pro-plugin/">\'WooCommerce All Currencies Pro\'</a> plugin version to change these settings.') ?></strong></p>
				</div>
				<table class="form-table">
				<?php foreach ($this->currencies_list as $currency_id => $currency_name) { 
					$field_id = $currency_id.'_id'; 
					$currency_symbol = $this->currencies_symbols_list[$currency_id];?>
					<tr valign="top"><th scope="row"><?=$currency_name;?></th><td><input type="text" readonly style="width:75px;" id="<?=$field_id;?>" name="wooallcurlite_option_group[<?=$currency_id;?>]" value="<?=$currency_symbol;?>" /></td></tr><?php } ?>				
				</table>
				<?php submit_button(); ?>
			</form>
		</div>
		<?php
		}
	}
}

$wooallcurlite_plugin = &new wooallcurlite_plugin();



 
