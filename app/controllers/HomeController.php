<?php
use Log;
class HomeController extends BaseController {
	public static $email_receiver_address = 'martina.horutova@gmail.com';
	public static $email_receiver_name = 'Skoro nevěsta';
	public static $email_subject = 'Konec hry :)';
	public static $email_message = 'Martinko, přijeď do Abácie ve Valmezu. Máme na pátek od 14hod. objednaný welness. Já tam na tebe počkám...do té doby nikomu nic neříkej, ať je trošku sranda :). A neboj, nebudeš to platit :D';
	public static $email_reject_subject = "Tak to nedopadlo";
	public static $email_reject_message = "Tak Marta me nechce...";
	/*
	 * |--------------------------------------------------------------------------
	 * | Default Home Controller
	 * |--------------------------------------------------------------------------
	 * |
	 * | You may wish to use controllers instead of, or in addition to, Closure
	 * | based routes. That's great! Here is an example controller method to
	 * | get you started. To route to this controller, just add the route:
	 * |
	 * |	Route::get('/', 'HomeController@showWelcome');
	 * |
	 */
	public function sendConfirmation() {
		Mail::send ( 'emails.message', array (
				'email_body' => self::$email_message 
		), function ($message) {
			$message->to ( self::$email_receiver_address, self::$email_receiver_name )->cc ( 'martin.bay016@gmail.com', 'Martin Bayer' )->subject ( self::$email_subject );
		} );
		Log::info ( 'Confirmation email sent.' );
	}
// 	public function sendConfirmation() {
// 		$to = "martin.bay016@gmail.com";
// 		$subject = "HTML email";
		
// 		$message = "
// <html>
// <head>
// <title>HTML email</title>
// </head>
// <body>
// <p>This email contains HTML Tags!</p>
// <table>
// <tr>
// <th>Firstname</th>
// <th>Lastname</th>
// </tr>
// <tr>
// <td>John</td>
// <td>Doe</td>
// </tr>
// </table>
// </body>
// </html>
// ";
		
// 		// Always set content-type when sending HTML email
// 		$headers = "MIME-Version: 1.0" . "\r\n";
// 		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		
// 		// More headers
// 		$headers .= 'From: <admin@willumarryme.com>' . "\r\n";
// 		$headers .= 'Cc: martin.bayer@morosystems.cz' . "\r\n";
		
// 		mail ( $to, $subject, $message, $headers );
// 	}
	public function sendRejection() {
		Mail::send ( 'emails.message', array (
				'email_body' => self::$email_reject_message 
		), function ($message) {
			$message->to ( 'martin.bay016@gmail.com', 'Martin Bayer' )->subject ( self::$email_reject_subject );
		} );
		Log::info ( 'Rejection email sent.' );
	}
	function createPageData() {
		$data = array ();
		$title = "Vezmeš si mě?";
		$data ['title'] = $title;
		$data ['advantages'] = "Výhody";
		$data ['disadvantages'] = "Nevýhody";
		$data ['decision'] = "Rozhodnutí";
		$data ['check_advantages'] = "Prohlédnout si výhody...";
		$data ['page1_title'] = "Hotovooooo:)...a nebo ne?";
		$data ['page1_subtitle'] = "Milá Martinko, právě jsi dokončila svou Vánoční hru, ale byla to opravdu Vánoční hra? Ne vždy je vše takové, jaké se zdá býti. Projdi si následující stránky s výhodami a nevýhodami, které by ti měly pomoci při volbě tvé odpovědi na jednoduchou otázku...";
		$data ['advantages_subtitle'] = "Mezi nesporné výhody tvého případného kladného rozhodnutí patří:";
		$data ['advantageslist'] [0] = "dostupnost intelektuální péče";
		$data ['advantageslist'] [1] = "odpovědi na všechnoooo";
		$data ['advantageslist'] [2] = "velikost";
		$data ['advantageslist'] [3] = "stříbrná cihla k tomu";
		$data ['advantageslist'] [4] = "správa elektronických zařízení a multimediálního vybavení domácnosti";
		$data ['advantageslist'] [5] = "příprava kvalitní stravy na požádání";
		$data ['advantageslist'] [6] = "váha";
		$data ['advantages_nextpage'] = "A teď pár nevýhod...";
		
		$data ['disadvantages_subtitle'] = "Mezi nesporné nevýhody tvého případného záporného rozhodnutí patří:";
		$data ['disadvantageslist'] [0] = "neschopnost zacházet s vrtačkou";
		$data ['disadvantageslist'] [1] = "neustálé rýpání";
		$data ['disadvantageslist'] [2] = "slabost na prsa";
		$data ['disadvantageslist'] [3] = "dělání si co mě napadne";
		$data ['disadvantageslist'] [4] = "váha";
		$data ['disadvantageslist'] [5] = "nenechám tě ho udělat :)";
		$data ['disadvantages_nextpage'] = "Jak se rozhodneš?";
		
		$data ['decision_title'] = "Rozhodnutí";
		$data ['decision_text'] = "Moje Martinko, miluji tě z celého srdce a vím, že s tebou chci strávit zbytek života a doufám, že nám to klapne. Co ty na to?";
		$data ['decision_question'] = "Vezmeš si mě?";
		$data ['decision_yes'] = "Ano";
		$data ['decision_no'] = "Ne";
		
		$data ['unbelievablemodal_title'] = "Opravdu mě chceš odmítnout?";
		$data ['congrats_title'] = "Děkuji ti za projevenou důvěru :)";
		$data ['congrats_text'] = "Přeji nám oběma hodně lásky...to ostatní buď bude nebo nebude. Miluji tě...";
		$data ['congrats_text_checkemail'] = "A teď se běž podívat na svůj Gmail, máš tam další a poslední zprávu...";
		
		return $data;
	}
	public function showHomepage() {
		$pageData = $this->createPageData ();
		return View::make ( 'homepage', $pageData );
	}
}
