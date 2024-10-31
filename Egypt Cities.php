<?php
/**
*Plugin Name: NA E-Commerce Egypt Cities/States
*Description: Help to add all Egypt Cities/States for WooCommerce Check Out, And Setup to be transleted With WPML Plugin .
*Version: 1.0.0
*Contributors: [@peternapoleon , @kerrolos]
*Author: Peter F.Napoleon , Kerrolos Shehata
*Author URI: https://napoleoneg.com
*License: GPLv2 or later
*License URI:  https://www.gnu.org/licenses/gpl-2.0.html
*Text Domain: EgyptCitiesStates
*Domain Path:  /languages
*/

namespace EgyptCitiesStates;

/* Dena Direct Access */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
};


/**
 * Check if WooCommerce is active
 * And display error massage
 * */

if (!in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {

	function be_wc_check()
	{
		if (class_exists('woocommerce')) {

			global $bw_wc_active;
			$bw_wc_active = 'yes';

		} else {

			global $bw_wc_active;
			$bw_wc_active = 'no';

		}

	}

	add_action('admin_init', 'be_wc_check');

// show admin notice if WooCommerce is not activated
	function be_wc_admin_notice()
	{
		global $bw_wc_active;
		if ($bw_wc_active == 'no') {
			?>
			<div class="notice notice-error is-dismissible">
				<p>WooCommerce is not activated, please activate it to use <strong>NA E-Commerce Egypt Cities/States Plugin</strong>
				</p>
			</div>
			<?php
		}
	}

	add_action('admin_notices', 'be_wc_admin_notice');
}

// Change "city" checkout billing and shipping fields to a dropdown
add_filter( 'woocommerce_checkout_fields' , __NAMESPACE__.'\np_egypt_cities_states_cities' );
function np_egypt_cities_states_cities ( $naec ): array {

    // Define here in the array your desired cities (Here an example of cities)
    $option_cities = array(
         '' => __( 'Select your city' , 'EgyptCitiesStates' ),
		 'Cairo' =>  __('Cairo' , 'EgyptCitiesStates'),
		 'Giza' =>  __('Giza' , 'EgyptCitiesStates'),
		 'Sharqia' =>  __('Sharqia' , 'EgyptCitiesStates'),
		 'Qalyubiyya' =>  __('Qalyubiyya' , 'EgyptCitiesStates'),
		 'Monufia' =>  __('Monufia' , 'EgyptCitiesStates'),
		 'Alexandria' =>  __('Alexandria' , 'EgyptCitiesStates'),
		 'Ismailia' =>  __('Ismailia' , 'EgyptCitiesStates'),
		 'Damietta' =>  __('Damietta' , 'EgyptCitiesStates'),
		 'Matrouh' =>  __('Matrouh' , 'EgyptCitiesStates'),
		 'Gharbia' =>  __('Gharbia' , 'EgyptCitiesStates'),
		 'Kafr El Sheikh' =>  __('Kafr El Sheikh' , 'EgyptCitiesStates'),
		 'Suez' =>  __('Suez' , 'EgyptCitiesStates'),
		 'Red Sea' =>  __('Red Sea' , 'EgyptCitiesStates'),
		 'South Sinai' =>  __('South Sinai' , 'EgyptCitiesStates'),

    );

	$naec['billing']['billing_city']['type'] = 'select';
	$naec['billing']['billing_city']['options'] = $option_cities;
	$naec['shipping']['shipping_city']['type'] = 'select';
	$naec['shipping']['shipping_city']['options'] = $option_cities;

    return $naec;
}

// Change "states" checkout billing and shipping fields to a dropdown

add_filter( 'woocommerce_states', __NAMESPACE__.'\np_egypt_cities_states_states' );

function np_egypt_cities_states_states( $naes ) {

	$naes['EG'] = array(
    // Cairo
	'15 May City' => __('15 May City' , 'EgyptCitiesStates'),
	'Abdeen'=> __('Abdeen' , 'EgyptCitiesStates'),
	'Ain Shams' =>__('Ain Shams' , 'EgyptCitiesStates'),
	'Amreya' =>__('Amreya' , 'EgyptCitiesStates'),
	'Azbakeya' => __('Azbakeya' , 'EgyptCitiesStates'),
	'Bab El Sharia' =>  __('Bab El Sharia' , 'EgyptCitiesStates'),
	'Badr City' => __('Badr City' , 'EgyptCitiesStates'),
	'Bulaq'=> __('Bulaq' , 'EgyptCitiesStates'),
	'Dar El Salam' => __('Dar El Salam' , 'EgyptCitiesStates'),
	'El Basatin' =>  __('El Basatin' , 'EgyptCitiesStates'),
	'El Darb El Ahmar' =>__('El Darb El Ahmar' , 'EgyptCitiesStates'),
	'El Gamaliya'=> __('El Gamaliya' , 'EgyptCitiesStates'),
	'El Khalifa' => __('El Khalifa' , 'EgyptCitiesStates'),
	'El Marg' => __('El Marg' , 'EgyptCitiesStates'),
	'El Masara' => __('El Masara' , 'EgyptCitiesStates'),
	'El Matareya' =>  __('El Matareya' , 'EgyptCitiesStates'),
	'El Mokattam' =>  __('El Mokattam' , 'EgyptCitiesStates'),
	'El Muski' => __('El Muski' , 'EgyptCitiesStates'),
	'El Nozha' => __('El Nozha' , 'EgyptCitiesStates'),
	'El Sahel' => __('El Sahel' , 'EgyptCitiesStates'),
	'El Salam' => __('El Salam' , 'EgyptCitiesStates'),
	'El Sayeda Zeinab' =>  __('El Sayeda Zeinab' , 'EgyptCitiesStates'),
	'El Sharabiya' => __('El Sharabiya' , 'EgyptCitiesStates'),
	'El Shorouk' => __('El Shorouk' , 'EgyptCitiesStates'),
	'El Tebbin' => __('El Tebbin' , 'EgyptCitiesStates'),
	'El Weili' => __('El Weili' , 'EgyptCitiesStates'),
	'El Shourouk City' => __('El Shourouk City' , 'EgyptCitiesStates'),
	'El Obour City' => __('El Obour City' , 'EgyptCitiesStates'),
	'EL Salam City' => __('EL Salam City' , 'EgyptCitiesStates'),
	'El Saf' => __('El Saf' , 'EgyptCitiesStates'),
	'El Ayat' => __('El Ayat' , 'EgyptCitiesStates'),
	'El Badrasheen' => __('El Badrasheen' , 'EgyptCitiesStates'),
	'El Hawamdeya' => __('El Hawamdeya' , 'EgyptCitiesStates'),
	'El Zaher' => __('El Zaher' , 'EgyptCitiesStates'),
	'El Zawya El Hamra' => __('El Zawya El Hamra' , 'EgyptCitiesStates'),
	'Hadaiq El Qobbah' => __('Hadaiq El Qobbah' , 'EgyptCitiesStates'),
	'Heliopolis' => __('Heliopolis' , 'EgyptCitiesStates'),
	'Helwan' => __('Helwan' , 'EgyptCitiesStates'),
	'Maadi' => __('Maadi' , 'EgyptCitiesStates'),
	'Manshiyat Naser' => __('Manshiyat Naser' , 'EgyptCitiesStates'),
	'Nasr City 1' => __('Nasr City 1' , 'EgyptCitiesStates'),
	'New Cairo 1' => __('New Cairo 1' , 'EgyptCitiesStates'),
	'Old Cairo' => __('Old Cairo' , 'EgyptCitiesStates'),
	'Qasr El Nil' => __('Qasr El Nil' , 'EgyptCitiesStates'),
	'Rod El Farag' => __('Rod El Farag' , 'EgyptCitiesStates'),
	'Shubra' =>__('Shubra' , 'EgyptCitiesStates'),
	'Tura' =>__('Tura' , 'EgyptCitiesStates'),
	'Zamalek' =>__('Zamalek' , 'EgyptCitiesStates'),
	'Zeitoun' =>__('Zeitoun' , 'EgyptCitiesStates'),
	'Katamia' =>__('Katamia' , 'EgyptCitiesStates'),
	'Al Robeky' =>__('Al Robeky' , 'EgyptCitiesStates'),

	// Giza
	'Dokki' =>__('Dokki' , 'EgyptCitiesStates'),
	'Pyramids' =>__('Pyramids' , 'EgyptCitiesStates'),
	'Agouza' =>__('Agouza' , 'EgyptCitiesStates'),
	'El Omraniya' =>__('El Omraniya' , 'EgyptCitiesStates'),
	'El Warraq' => __('El Warraq' , 'EgyptCitiesStates'),
	'El Saff' =>__('El Saff' , 'EgyptCitiesStates'),
	'Talbia' =>__('Talbia' , 'EgyptCitiesStates'),
	'Ossim' =>__('Ossim' , 'EgyptCitiesStates'),
	'Bulaq' =>__('Bulaq' , 'EgyptCitiesStates'),
	'Imbaba' =>__('Imbaba' , 'EgyptCitiesStates'),
	'Kerdasa' =>__('Kerdasa' , 'EgyptCitiesStates'),
	'6th of October' =>__('6th of October' , 'EgyptCitiesStates'),
	'Sheikh Zayed' =>__('Sheikh Zayed' , 'EgyptCitiesStates'),


	// Sharqia
	'Abu Hammad' =>__('Abu Hammad' , 'EgyptCitiesStates'),
	'Abu Kebir' =>__('Abu Kebir' , 'EgyptCitiesStates'),
	'El Husseiniya' =>__('El Husseiniya' , 'EgyptCitiesStates'),
	'El Ibrahimiya' =>__('El Ibrahimiya' , 'EgyptCitiesStates'),
	'El Qanayat' =>__('El Qanayat' , 'EgyptCitiesStates'),
	'El Qurein' =>__('El Qurein' , 'EgyptCitiesStates'),
	'New Salhia' =>__('New Salhia' , 'EgyptCitiesStates'),
	'Awlad Saqr' =>__('Awlad Saqr' , 'EgyptCitiesStates'),
	'Zagazig ' =>__('Zagazig' , 'EgyptCitiesStates'),
	'Bilbeis' =>__('Bilbeis' , 'EgyptCitiesStates'),
	'Diyarb Negm' =>__('Diyarb Negm' , 'EgyptCitiesStates'),
	'10th Ramadan' =>__('10th Ramadan' , 'EgyptCitiesStates'),

	// Qalyubiyya
	'Khanka' =>__('Khanka' , 'EgyptCitiesStates'),
	'El Qanater El Khayreya' =>__('El Qanater El Khayreya' , 'EgyptCitiesStates'),
	'El Ubour' =>__('El Ubour' , 'EgyptCitiesStates'),
	'Banha' =>__('Banha' , 'EgyptCitiesStates'),
	'Kafr Shukr' =>__('Kafr Shukr' , 'EgyptCitiesStates'),
	'Qaha' =>__('Qaha' , 'EgyptCitiesStates'),
    'Qalyub' =>__('Qalyub' , 'EgyptCitiesStates'),
    'Shubra El Kheima' =>__('Shubra El Kheima' , 'EgyptCitiesStates'),
	'Shibin El Qanater' => __('Shibin El Qanater' , 'EgyptCitiesStates'),
	'Tukh' => __('Tukh' , 'EgyptCitiesStates'),

	// Monufia
	'El Bagour' =>  __('El Bagour' , 'EgyptCitiesStates'),
	'Ashmoun' =>  __('Ashmoun' , 'EgyptCitiesStates'),
	'El Shohada' =>  __('El Shohada' , 'EgyptCitiesStates'),
	'Birket el Sab' => __('Birket el Sab' , 'EgyptCitiesStates'),
	'Sadat City' =>  __('Sadat City' , 'EgyptCitiesStates'),
	'Menouf' =>  __('Menouf' , 'EgyptCitiesStates'),
	'Quweisna' => __('Quweisna' , 'EgyptCitiesStates'),
	'Shibin el Kom' => __('Shibin el Kom' , 'EgyptCitiesStates'),
	'Tala' =>  __('Tala' , 'EgyptCitiesStates'),

	// Alexandria

	'Dekhela' => __('Dekhela' , 'EgyptCitiesStates'),
	'Amreya' =>  __('Amreya' , 'EgyptCitiesStates'),
	'Ataren' => __('Ataren' , 'EgyptCitiesStates'),
	'Gomrok' => __('Gomrok' , 'EgyptCitiesStates'),
	'Labban' => __('Labban' , 'EgyptCitiesStates'),
	'Mansheya' =>  __('Mansheya' , 'EgyptCitiesStates'),
	'Montaza' =>  __('Montaza' , 'EgyptCitiesStates'),
	'El Raml' =>  __('El Raml' , 'EgyptCitiesStates'),
	'North Coast' =>  __('North Coast' , 'EgyptCitiesStates'),
	'Bab Sharqi' =>  __('Bab Sharqi' , 'EgyptCitiesStates'),
	'Borg El Arab' =>  __('Borg El Arab' , 'EgyptCitiesStates'),
	'Karmouz' =>  __('Karmouz' , 'EgyptCitiesStates'),
	'New Borg El Arab' =>  __('New Borg El Arab' , 'EgyptCitiesStates'),
	'Port al-Basal' =>  __('Port al-Basal' , 'EgyptCitiesStates'),
	'Moharam Bek' => __('Moharam Bek' , 'EgyptCitiesStates'),
	'Sidi Gaber' => __('Sidi Gaber' , 'EgyptCitiesStates'),

	// Ismailia
	'Abu Suwir' => __('Abu Suwir' , 'EgyptCitiesStates'),
	'Ismailia' => __('Ismailia' , 'EgyptCitiesStates'),
	'El Qantara' =>  __('El Qantara' , 'EgyptCitiesStates'),
	'El Qantara El Sharqiya' =>  __('El Qantara El Sharqiya' , 'EgyptCitiesStates'),
	'New Kasaseen' =>  __('New Kasaseen' , 'EgyptCitiesStates'),
	'Tell El Kebir' =>  __('Tell El Kebir' , 'EgyptCitiesStates'),
	'Fayid' =>  __('Fayid' , 'EgyptCitiesStates'),


	// Damietta
	'El Zarqa' =>   __('El Zarqa' , 'EgyptCitiesStates'),
	'Damietta' =>   __('Damietta' , 'EgyptCitiesStates'),
	'Faraskur' =>   __('Faraskur' , 'EgyptCitiesStates'),
	'Kafr El Battikh' =>   __('Kafr El Battikh' , 'EgyptCitiesStates'),
	'Kafr Saad' => __('Kafr Saad' , 'EgyptCitiesStates'),
	'New Damietta' => __('New Damietta' , 'EgyptCitiesStates'),
	'Ras El Bar' => __('Ras El Bar' , 'EgyptCitiesStates'),
	'Free Zone in Damietta' => __('Free Zone in Damietta' , 'EgyptCitiesStates'),

	// Matrouh
	'El Dabaa' =>  __('El Dabaa' , 'EgyptCitiesStates'),
	'El Alamein' => __('El Alamein' , 'EgyptCitiesStates'),
	'El Hamam' =>  __('El Hamam' , 'EgyptCitiesStates'),
	'El Negaila' =>  __('El Negaila' , 'EgyptCitiesStates'),
	'Sallum' =>  __('Sallum' , 'EgyptCitiesStates'),
	'Sidi Barrani' =>  __('Sidi Barrani' , 'EgyptCitiesStates'),
	'Siwa Oasis' =>  __('Siwa Oasis' , 'EgyptCitiesStates'),

	// Gharbia
	'El Mahalla El Kubra' =>  __('El Mahalla El Kubra' , 'EgyptCitiesStates'),
	'El Sunta' =>  __('El Sunta' , 'EgyptCitiesStates'),
	'Basyoun' =>  __('Basyoun' , 'EgyptCitiesStates'),
	'Kafr El Zayat' =>  __('Kafr El Zayat' , 'EgyptCitiesStates'),
	'Kotoor' =>  __('Kotoor' , 'EgyptCitiesStates'),
	'Samanoud' =>  __('Samanoud' , 'EgyptCitiesStates'),
	'Tanta' =>  __('Tanta' , 'EgyptCitiesStates'),
	'Zefta' =>  __('Zefta' , 'EgyptCitiesStates'),


	// Kafr El Sheikh
	'Burullus' => __('Burullus' , 'EgyptCitiesStates'),
	'El Hamool' =>  __('El Hamool' , 'EgyptCitiesStates'),
	'El Reyad' =>  __('El Reyad' , 'EgyptCitiesStates'),
	'Bila' => __('Bila' , 'EgyptCitiesStates'),
	'Desouk' => __('Desouk' , 'EgyptCitiesStates'),
	'Fuwa' =>  __('Fuwa' , 'EgyptCitiesStates'),
	'Kafr el Sheikh' =>  __('Kafr el Sheikh' , 'EgyptCitiesStates'),
	'Metoubes' =>  __('Metoubes' , 'EgyptCitiesStates'),
	'Qallin' =>  __('Qallin' , 'EgyptCitiesStates'),
	'Sidi Salem' =>  __('Sidi Salem' , 'EgyptCitiesStates'),

	// Suez
	'Arbaeen' =>  __('Arbaeen' , 'EgyptCitiesStates'),
	'Ganayen' => __('Ganayen' , 'EgyptCitiesStates'),
	'Suez' => __('Suez' , 'EgyptCitiesStates'),
	'Attaka' =>  __('Attaka' , 'EgyptCitiesStates'),
	'Faisal' =>  __('Faisal' , 'EgyptCitiesStates'),

	// Red Sea
	'Hurghada' =>  __('Hurghada' , 'EgyptCitiesStates'),
	'Marsa Alam' =>  __('Marsa Alam' , 'EgyptCitiesStates'),
	'Ras Gharib' => __('Ras Gharib' , 'EgyptCitiesStates'),
	'Safaga' =>  __('Safaga' , 'EgyptCitiesStates'),

	// South Sinai
	'Abu Radis' =>  __('Abu Radis' , 'EgyptCitiesStates'),
	'El Tor' =>  __('El Tor' , 'EgyptCitiesStates'),
	'Dahab' =>  __('Dahab' , 'EgyptCitiesStates'),
	'Nuweiba' =>  __('Nuweiba' , 'EgyptCitiesStates'),
	'Ras Sidr' =>  __('Ras Sidr' , 'EgyptCitiesStates'),
	'Saint Catherine' =>  __('Saint Catherine' , 'EgyptCitiesStates'),
	'Sharm El Sheikh' =>  __('Sharm El Sheikh' , 'EgyptCitiesStates'),
	'Taba' =>  __('Taba' , 'EgyptCitiesStates')
  );

	$naes['billing']['billing_states']['type'] = 'select';
	$naes['billing']['billing_states']['options'] = $naes;
	$naes['shipping']['shipping_states']['type'] = 'select';
	$naes['shipping']['shipping_states']['options'] = $naes;

  return $naes;
  
}


