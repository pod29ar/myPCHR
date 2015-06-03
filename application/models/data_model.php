<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	// OTHERS
	function delivery_date()
	{
		$today = date('j-M-Y',strtotime("today"));
		$date = array('Today');
		for ($x=1; $x<7; $x++) {
			array_push($date, date('j-M-Y',strtotime("+${x} day")));
		}

		return $date;
	}

	function delivery_time()
	{
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$now = strtotime("now");
		list($hour, $minute) =  explode(':', date('H:i', $now));
		$minute += 45 - ($minute % 15); // 45 = 30 mins buffer + minute is rounded up to nearest QUARTER
		if ($minute >= 60):
			$hour++;
			$minute = $minute % 60;
		endif;
		if ($hour < 11) $time = "11:00";
		else $time = "${hour}:${minute}";

		$dif = 0;
		$delTime = array('Now');
		while ($now < strtotime("today 23:30")) {
			$now = strtotime("+${dif} minutes ${time}");
			array_push($delTime, date('h:i A', $now));
			$dif += 15;
		}

		return $delTime;
	}

	// USER RELATED
	function checking_user($code)
	{
		$shortstory = 2;
		$longstory = strlen($code) - $shortstory;

		$cohort = substr($code, 0, $shortstory);
		$user = substr($code, $shortstory, $longstory);
		$query = $this->db->get_where(
			'participant',
			array(
				'participant_cohort' => $cohort,
				'participant_code' => $user
				)
			);
		if ($query->num_rows() == 0):
			return FALSE;
		else:
			foreach ($query->result() as $row):
				$id = $row->participant_id;
			endforeach;
			$this->session->set_userdata(
				array(
					'ghost' => $id
					)
				);
			return TRUE;
		endif;
	}

	function registering_time($page, $step, $flag)
	{
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$participant = $this->session->userdata('ghost');
		$design = $this->session->userdata('opted');
		$time = date('Y-m-d H:i:s');

		$data = array(
			'timer_participant' => $participant,
			'tm_design'         => $design,
			'tm_page'           => $page,
			'tm_step'           => $step,
			'tm_flag'           => $flag,
			'tm_register_time'  => $time
			);
		$this->db->insert('timer', $data);
		$id = $this->db->insert_id();
		if (count($id) == 0)
			return FALSE;
		else
			return TRUE;
	}

	function logging_in($name, $pass)
	{
		$cartprice = $this->session->userdata('cartprice');
		$credential = array(
			'username' => $name,
			'email'    => $name.'@mail.com',
			'password' => $pass,
			'fname'    => 'John',
			'lname'    => 'Smith',
			'dob'      => '01/01/1981',
			'contact'  => array('0123456789'),
			);
		if (empty($cartprice)) $credential['cartprice'] = 'RM0.00';

		$this->session->set_userdata($credential);
		$this->store_address();
	}

	function registering($input)
	{
		$cartprice = $this->session->userdata('cartprice');
		$contact = array(
			'0125436798', // $input['mobile']
			'034567890',  // $input['home']
			'031256890'   // $input['office']
			);
		foreach ($contact as $key => $value)
			if (empty($value)) unset($contact[$key]);

		$register = array('contact' => $contact);
		if ( $this->session->userdata('email') == '' ):
			// faking registration
			$register['username'] = 'johnsmith';
			$register['email']    = 'john@mail.com';
			$register['password'] = 'password';
			$register['fname']    = 'John';
			$register['lname']    = 'Smith';
		endif;
		if (empty($cartprice)) $register['cartprice'] = 'RM0.00';

		$this->session->set_userdata($register);
		$this->store_address($input);
	}

	function store_address($input = '')
	{
		// if (empty($input)):
			$address = array(
				'addrNick'    => 'Home',
				'addrType'    => 'Resident',
				'addrBuild'   => '21',
				'addrComplex' => '',
				'addrStreet'  => 'JLN 1/1',
				'suburb'      => 'Seksyen 1',
				'postcode'    => '43300',
				'addrCity'    => 'Bandar Baru Bangi',
				'addrState'   => 'Selangor'
				);
		/*
		else:
			$address = array(
				'addrNick'    => $input['addrNick'],
				'addrType'    => $input['addrType'],
				'addrBuild'   => $input['addrBuild'],
				'addrComplex' => $input['addrComplex'],
				'addrStreet'  => $input['addrStreet'],
				'suburb'      => $input['suburb'],
				'postcode'    => $input['postcode'],
				'addrCity'    => $input['addrCity'],
				'addrState'   => $input['addrState']
				);
		endif;
		*/

		// storing to session
		if ($this->session->userdata('address1') == ''):
			$sessadr = array('address1' => $address);
		elseif ($this->session->userdata('address2') == ''):
			$sessadr = array('address2' => $address);
		endif;
		$this->session->set_userdata($sessadr);
	}

	function get_basic_data()
	{
		$resp = array();
		$email = $this->session->userdata('email');
		$contact = $this->session->userdata('contact');
		if ( ! empty($email)):
			$resp['username'] = $this->session->userdata('username');
			$resp['email']    = $this->session->userdata('email');
			$resp['fname']    = $this->session->userdata('fname');
			$resp['lname']    = $this->session->userdata('lname');
			$resp['dob']      = $this->session->userdata('dob');
		endif;
		if (isset($contact[0])) $resp['conmobile'] = $contact[0];
		if (isset($contact[1])) $resp['conhome']   = $contact[1];
		if (isset($contact[2])) $resp['conoffice'] = $contact[2];
		return $resp;
	}

	function get_address_data()
	{
		$resp = array();
		for ($x=1; $x<3; $x++) {
			$addr = $this->session->userdata('address'.$x);
			if ( ! empty($addr)):
				$comp  = ''; if ( ! empty($addr['addrComplex'])) $comp  = $addr['addrComplex'].', ';
				$block = ''; if ( ! empty($addr['addrBlock']))   $block = $addr['addrBlock'].', ';
				$fullAddr = $addr['addrBuild'].', '.$block.$comp.$addr['addrStreet'].', '.
				$addr['suburb'].', '.$addr['postcode'].', '.$addr['addrCity'].', '.$addr['addrState'];
				$one = array(
					'addrNick' => $addr['addrNick'],
					'addrType' => $addr['addrType'],
					'fullAddr' => $fullAddr
					);
				array_push($resp, $one);
			endif;
		}
		return $resp;
	}

	function get_particular_address($id)
	{
		$address = $this->session->userdata($id);
		if ( ! empty($address)) return $address;
		else return FALSE;
	}

	function selecting_address($input)
	{
		$order = array(
			'sel_method'  => $input['deltake'],
			'sel_address' => $input['addrNick'],
			'sel_date'    => $input['orderDate'],
			'sel_time'    => $input['orderTime']
			);
		$this->session->set_userdata($order);
	}

	function menu_crust()
	{
		$crustArray = array(
			array(
				'name'      => 'Classic Hand Tossed',
				'image'     => 'assets/img/crust_classic.png',
				'desc'      => 'Made from fresh dough using a unique oil-free screen-baking process',
				'available' => 'personal regular large',
				'price'     => array(
					'personal'    => '10.80',
					'regular'     => '23.80',
					'large'       => '32.80',
					'extra-large' => '0.00'
					)
				),
			array(
				// same rule as above
				'name'      => 'Crunchy Thin Crust',
				'image'     => 'assets/img/crust_thin.png',
				'desc'      => 'A light and crispy crust that enables you to really enjoy your favorite toppings',
				'available' => 'regular large',
				'price'     => array(
					'personal'    => '10.80',
					'regular'     => '23.80',
					'large'       => '32.80',
					'extra-large' => '0.00'
					)
				),
			array(
				// same rule as above
				'name'      => 'New York Crust',
				'image'     => 'assets/img/crust_ny.png',
				'desc'      => 'Lighter hand-stretched crust, done the New Yorker way',
				'available' => 'regular large extra-large',
				'price'     => array(
					'personal'    => '0.00',
					'regular'     => '23.80',
					'large'       => '32.80',
					'extra-large' => '42.80'
					)
				),
			array(
				// same rule as above
				'name'      => 'Cheese Burst',
				'image'     => 'assets/img/crust_double.png',
				'desc'      => 'Two crunchy thin crusts with a layer of creamy cheddar cheese sauce in between (Surcharge Applies)',
				'available' => 'regular large',
				'price'     => array(
					'personal'    => '0.00',
					'regular'     => '23.80',
					'large'       => '32.80',
					'extra-large' => '0.00'
					)
				),
			array(
				// same rule as above
				'name'      => 'Extreme Edge',
				'image'     => 'assets/img/crust_extreme.png',
				'desc'      => 'Stuffed with mozzarella cheese, garlic and herbs, and topped with parmesan cheese, breadcrumbs and parsley for extra crunch (Surcharge Applies)',
				'available' => 'regular large',
				'price'     => array(
					'personal'    => '0.00',
					'regular'     => '23.80',
					'large'       => '32.80',
					'extra-large' => '0.00'
					)
				)
			);
		return $crustArray;
	}

	function menu_pizza()
	{
		$pizzaArray = array(
			array(
				// same rule as above
				'name'      => 'Tropical Sambal Prawn',
				'image'     => 'assets/img/pizza_mood/sambal_prawn.jpg',
				'desc'      => 'Succulent Prawns marinated in herbs & spices, Fresh Onions, Juicy Pineapples, Red Chillies on our new and authentic sambal sauce. (Surcharge Applies)',
				'type'      => 'first class',
				'available' => 'regular large extra-large',
				'price'     => array(
					'personal'    => '0.00',
					'regular'     => '3.50',
					'large'       => '5.00',
					'extra-large' => '7.00'
					),
				'indicator' => array('surcharge', 'spicy', 'seafood'),
				'new'       => TRUE
				),
			array(
				// same rule as above
				'name'      => 'Sambal Surf & Turf',
				'image'     => 'assets/img/pizza_mood/sambal_side_turf.jpg',
				'desc'      => 'Succulent Prawns marinated in herbs & spices, Shredded Chicken, Juicy Pineapples and Green Peppers on our new and authentic sambal sauce. (Surcharge Applies)',
				'type'      => 'first class',
				'available' => 'regular large extra-large',
				'price'     => array(
					'personal'    => '0.00',
					'regular'     => '3.50',
					'large'       => '5.00',
					'extra-large' => '7.00'
					),
				'indicator' => array('surcharge', 'spicy', 'seafood'),
				'new'       => TRUE
				),
			array(
				// modify below as needed
				'name'      => '7-Meat Wonder',
				'image'     => 'assets/img/pizza_mood/7meat.jpg',
				'desc'      => '7 fantastic toppings; Chicken Pepperoni, Shredded Chicken, Roasted Chicken, Beef Pepperoni, Ground Beef, Beef Sausage, Chicken Potpourri Sausage (Surcharge Applies)',
				'type'      => 'first class',
				'available' => 'regular large extra-large',
				'price'     => array(
					'personal'    => '0.00',
					'regular'     => '3.50',
					'large'       => '5.00',
					'extra-large' => '7.00'
					),
				'indicator' => array('surcharge', 'chicken', 'beef')
				),
			array(
				// same rule as above
				'name'      => 'Ultimate Hawaiian',
				'image'     => 'assets/img/pizza_mood/ultimate_hawaiian.jpg',
				'desc'      => 'Loads of delicious roasted chicken, shredded chicken, juicy pineapples and fresh mushrooms on our brand new pizza sauce (Surcharge Applies)',
				'type'      => 'first class',
				'available' => 'regular large extra-large',
				'price'     => array(
					'personal'    => '0.00',
					'regular'     => '3.50',
					'large'       => '5.00',
					'extra-large' => '7.00'
					),
				'indicator' => array('surcharge', 'signature', 'chicken')
				),
			array(
				// same rule as above
				'name'      => 'Meatasaurus',
				'image'     => 'assets/img/pizza_mood/meatasaurus.jpg',
				'desc'      => 'Generous portions of everyone\'s favorite beef pepperoni, ground beef and fresh mushrooms on our new blended smoky BBQ sauce (Surcharge Applies)',
				'type'      => 'first class',
				'available' => 'regular large extra-large',
				'price'     => array(
					'personal'    => '0.00',
					'regular'     => '3.50',
					'large'       => '5.00',
					'extra-large' => '7.00'
					),
				'indicator' => array('surcharge', 'smoky', 'beef')
				),
			array(
				// same rule as above
				'name'      => 'Prawn Passion',
				'image'     => 'assets/img/pizza_mood/pesto_prawn.jpg',
				'desc'      => 'Succulent prawns, marinated in Italian herbs and spices, juicy cherry tomatoes & onions on our new pesto passion sauce! (Surcharge Applies)',
				'type'      => 'first class',
				'available' => 'regular large extra-large',
				'price'     => array(
					'personal'    => '0.00',
					'regular'     => '3.50',
					'large'       => '5.00',
					'extra-large' => '7.00'
					),
				'indicator' => array('surcharge', 'pesto', 'seafood')
				),
			array(
				// same rule as above
				'name'      => 'Chicken Perfection',
				'image'     => 'assets/img/pizza_mood/pesto_chicken.jpg',
				'desc'      => 'Delicious roasted chicken breast, fresh mushrooms, juicy cherry tomatoes & onions on our new pesto passion sauce! (Surcharge Applies)',
				'type'      => 'first class',
				'available' => 'regular large extra-large',
				'price'     => array(
					'personal'    => '0.00',
					'regular'     => '3.50',
					'large'       => '5.00',
					'extra-large' => '7.00'
					),
				'indicator' => array('surcharge', 'pesto', 'chicken')
				),
			array(
				// same rule as above
				'name'      => 'Tuna Extreme',
				'image'     => 'assets/img/pizza_mood/pesto_tuna.jpg',
				'desc'      => 'Tuna chunks, imported Belgian spinach, olives & onions on our new pesto passion sauce! (Surcharge Applies)',
				'type'      => 'first class',
				'available' => 'regular large extra-large',
				'price'     => array(
					'personal'    => '0.00',
					'regular'     => '3.50',
					'large'       => '5.00',
					'extra-large' => '7.00'
					),
				'indicator' => array('surcharge', 'pesto', 'seafood')
				),
			array(
				// same rule as above
				'name'      => 'Prawn Sensation',
				'image'     => 'assets/img/pizza_mood/prawn_pizza.jpg',
				'desc'      => 'Succulent prawns, marinated in Italian herbs & spices, imported Belgian spinach, juicy cherry tomatoes & onions with our brand new pizza sauce! (Surcharge Applies)',
				'type'      => 'first class',
				'available' => 'regular large extra-large',
				'price'     => array(
					'personal'    => '0.00',
					'regular'     => '3.50',
					'large'       => '5.00',
					'extra-large' => '7.00'
					),
				'indicator' => array('surcharge', 'signature', 'seafood')
				),
			array(
				// same rule as above
				'name'      => 'Sambal Vegie',
				'image'     => 'assets/img/pizza_mood/sambal_pizza_vegie.jpg',
				'desc'      => 'Fresh Mushrooms, Green Peppers, Onions, Ripe Olives and Cherry Tomatoes on our new and authentic sambal sauce.',
				'type'      => 'speciality',
				'available' => 'regular large extra-large',
				'price'     => array(
					'personal'    => '0.00',
					'regular'     => '0.00',
					'large'       => '0.00',
					'extra-large' => '0.00'
					),
				'indicator' => array('spicy'),
				'new'       => TRUE
				),
			array(
				// same rule as above
				'name'      => 'BBQ Chicken',
				'image'     => 'assets/img/pizza_mood/bbq.jpg',
				'desc'      => 'Succulent shredded chicken, fresh onions, green pepper topped with 100% mozzarella cheese & tangy BBQ sauce',
				'type'      => 'speciality',
				'available' => 'regular large extra-large',
				'price'     => array(
					'personal'    => '0.00',
					'regular'     => '0.00',
					'large'       => '0.00',
					'extra-large' => '0.00'
					),
				'indicator' => array('signature', 'chicken')
				),
			array(
				// same rule as above
				'name'      => 'Extravaganzza',
				'image'     => 'assets/img/pizza_mood/extravaganza.jpg',
				'desc'      => 'Our signature pizza loved by the world. Topped with beef pepperoni, ground beef, fresh onions, green pepper, mushroom and ripe olives. Need we say more?',
				'type'      => 'speciality',
				'available' => 'regular large extra-large',
				'price'     => array(
					'personal'    => '0.00',
					'regular'     => '0.00',
					'large'       => '0.00',
					'extra-large' => '0.00'
					),
				'indicator' => array('signature', 'beef')
				),
			array(
				// same rule as above
				'name'      => 'Classified Chicken',
				'image'     => 'assets/img/pizza_mood/classified_chicken.jpg',
				'desc'      => '100% Mozzarella Cheese with Succulent Smoked Chicken Breast, Fresh Onions and Mushrooms',
				'type'      => 'speciality',
				'available' => 'regular large extra-large',
				'price'     => array(
					'personal'    => '0.00',
					'regular'     => '0.00',
					'large'       => '0.00',
					'extra-large' => '0.00'
					),
				'indicator' => array('secret', 'chicken')
				),
			array(
				// same rule as above
				'name'      => 'Plain Cheese',
				'image'     => 'assets/img/pizza_mood/plain_cheese.jpg',
				'desc'      => '100% mozarella cheese + extra cheese',
				'type'      => 'speciality',
				'available' => 'regular large extra-large',
				'price'     => array(
					'personal'    => '0.00',
					'regular'     => '0.00',
					'large'       => '0.00',
					'extra-large' => '0.00'
					),
				'indicator' => array()
				),
			array(
				// same rule as above
				'name'      => 'Beef Pepperoni',
				'image'     => 'assets/img/pizza_mood/beef_pepperoni.jpg',
				'desc'      => 'The all time favorite with generous portions of beef pepperoni and 100% mozzarella cheese.',
				'type'      => 'speciality',
				'available' => 'personal regular large extra-large',
				'price'     => array(
					'personal'    => '0.00',
					'regular'     => '0.00',
					'large'       => '0.00',
					'extra-large' => '0.00'
					),
				'indicator' => array('signature', 'beef')
				),
			array(
				// same rule as above
				'name'      => 'Chicken Pepperoni',
				'image'     => 'assets/img/pizza_mood/first_class_pepperoni.jpg',
				'desc'      => 'The all time favorite with generous portions of chicken pepperoni and 100% mozzarella cheese.',
				'type'      => 'speciality',
				'available' => 'personal regular large extra-large',
				'price'     => array(
					'personal'    => '0.00',
					'regular'     => '0.00',
					'large'       => '0.00',
					'extra-large' => '0.00'
					),
				'indicator' => array('signature', 'chicken')
				),
			array(
				// same rule as above
				'name'      => 'Classic Chicken',
				'image'     => 'assets/img/pizza_mood/classic_chicken.jpg',
				'desc'      => 'Loaded with succulent shredded, fresh onions, green pepper, and ripe olives. Truly delicious!',
				'type'      => 'speciality',
				'available' => 'regular large extra-large',
				'price'     => array(
					'personal'    => '0.00',
					'regular'     => '0.00',
					'large'       => '0.00',
					'extra-large' => '0.00'
					),
				'indicator' => array('signature', 'chicken')
				),
			array(
				// same rule as above
				'name'      => 'Flaming Tuna',
				'image'     => 'assets/img/pizza_mood/flaming_tuna.jpg',
				'desc'      => 'Delicious tuna chunks, fresh onions topped with red-hot chilies! Get ready for a spicy encounter.',
				'type'      => 'speciality',
				'available' => 'regular large extra-large',
				'price'     => array(
					'personal'    => '0.00',
					'regular'     => '0.00',
					'large'       => '0.00',
					'extra-large' => '0.00'
					),
				'indicator' => array('spicy', 'seafood')
				),
			array(
				// same rule as above
				'name'      => 'Meat Mania',
				'image'     => 'assets/img/pizza_mood/meat_mania.jpg',
				'desc'      => 'Meat lovers, get ready to meet your match! Loaded with beef pepperoni, beef sausages, ground beef, chicken potpourri sausages and ripe olives.',
				'type'      => 'speciality',
				'available' => 'regular large extra-large',
				'price'     => array(
					'personal'    => '0.00',
					'regular'     => '0.00',
					'large'       => '0.00',
					'extra-large' => '0.00'
					),
				'indicator' => array('signature', 'beef')
				),
			array(
				// same rule as above
				'name'      => 'Seafood Delight',
				'image'     => 'assets/img/pizza_mood/seafood_delight.jpg',
				'desc'      => 'Our seafood specialty is overflowing with succulent crab meat, delicious tuna chunks, fresh onions and green pepper.',
				'type'      => 'speciality',
				'available' => 'regular large extra-large',
				'price'     => array(
					'personal'    => '0.00',
					'regular'     => '3.50',
					'large'       => '5.00',
					'extra-large' => '7.00'
					),
				'indicator' => array('signature', 'seafood')
				),
			array(
				// same rule as above
				'name'      => 'Spicy Sambal',
				'image'     => 'assets/img/pizza_mood/spicy_sambal.jpg',
				'desc'      => 'A uniquely Malaysian creation with succulent shredded chicken, anchovies, red-hot chilies, green pepper and fresh onions!',
				'type'      => 'speciality',
				'available' => 'regular large extra-large',
				'price'     => array(
					'personal'    => '0.00',
					'regular'     => '0.00',
					'large'       => '0.00',
					'extra-large' => '0.00'
					),
				'indicator' => array('spicy', 'chicken')
				),
			array(
				// same rule as above
				'name'      => 'Spicy Sausage',
				'image'     => 'assets/img/pizza_mood/spicy_sausage.jpg',
				'desc'      => 'A fiery mix of chicken potpourri sausages, red-hot chilies, and juicy pineapples. A hot favorite!',
				'type'      => 'speciality',
				'available' => 'personal regular large extra-large',
				'price'     => array(
					'personal'    => '0.00',
					'regular'     => '0.00',
					'large'       => '0.00',
					'extra-large' => '0.00'
					),
				'indicator' => array('spicy', 'chicken')
				),
			array(
				// same rule as above
				'name'      => 'Tuna Temptation',
				'image'     => 'assets/img/pizza_mood/tuna_temptation.jpg',
				'desc'      => 'Delicious tuna chunks surrounded with fresh onions and juicy pineapples. Truly tempting!',
				'type'      => 'speciality',
				'available' => 'regular large extra-large',
				'price'     => array(
					'personal'    => '0.00',
					'regular'     => '0.00',
					'large'       => '0.00',
					'extra-large' => '0.00'
					),
				'indicator' => array('secret', 'seafood')
				),
			array(
				// same rule as above
				'name'      => 'Vegie Fiesta',
				'image'     => 'assets/img/pizza_mood/vegie_fiesta.jpg',
				'desc'      => 'A veggie lover`s dream. Fresh Onions, mushrooms, green pepper and juicy pineapples.',
				'type'      => 'speciality',
				'available' => 'regular large extra-large',
				'price'     => array(
					'personal'    => '0.00',
					'regular'     => '0.00',
					'large'       => '0.00',
					'extra-large' => '0.00'
					),
				'indicator' => array('secret', 'vegetarian')
				),
			array(
				// same rule as above
				'name'      => 'Vegie Galore',
				'image'     => 'assets/img/pizza_mood/vegie_galore.jpg',
				'desc'      => 'A delightful mix of fresh onions, green pepper, cherry tomatoes, and mushrooms.',
				'type'      => 'speciality',
				'available' => 'personal regular large extra-large',
				'price'     => array(
					'personal'    => '0.00',
					'regular'     => '0.00',
					'large'       => '0.00',
					'extra-large' => '0.00'
					),
				'indicator' => array('signature', 'vegetarian')
				),
			array(
				// same rule as above
				'name'      => 'Half & Half',
				'image'     => 'assets/img/pizza_mood/half-&-half.jpg',
				'desc'      => 'Your choice. Combine any 2 of our delicious pizzas in 1. Just ensure that they have the same pizza sauce.',
				'type'      => 'custom pizza',
				'available' => 'regular large extra-large',
				'price'     => array(
					'personal'    => '0.00',
					'regular'     => '0.00',
					'large'       => '0.00',
					'extra-large' => '0.00'
					),
				'indicator' => array()
				),
			array(
				// same rule as above
				'name'      => 'Make Your Own',
				'image'     => 'assets/img/pizza_fake/05.jpg',
				'desc'      => 'Create your very own just the way you want it. All you have to do is to choose your favorite toppings!',
				'type'      => 'custom pizza',
				'available' => 'regular large extra-large',
				'price'     => array(
					'personal'    => '0.00',
					'regular'     => '0.00',
					'large'       => '0.00',
					'extra-large' => '0.00'
					),
				'indicator' => array()
				)
			);
		return $pizzaArray;
	}

	function menu_side()
	{
		$sideArray = array(
			array(
				// modify this as needed
				'name'  => 'Starter Box',
				'image' => 'assets/img/sides/starterbox_duo.png',
				'desc'  => 'Roasted Chicken Drummet (6pcs), Crazy Chicken Crunchies Original',
				'type'  => 'chicken',
				'price' => array(
					'normal' => '25.60',
					'addon'  => '19.80'
					) // first is normal price, second is add on price
				),
			array(
				// modify this as needed
				'name'  => 'Cheesy Chicken Roll',
				'image' => 'assets/img/sides/cheesy_chicken_roll.png',
				'desc'  => 'Cheesy Chicken Roll',
				'type'  => 'chicken',
				'price' => array(
					'normal' => '10.80',
					'addon'  => '7.80'
					) // first is normal price, second is add on price
				),
			array(
				// modify this as needed
				'name'  => 'Roasted Chicken Drummet (6 Pcs)',
				'image' => 'assets/img/sides/roasted_chicken_drummet.png',
				'desc'  => 'Juicy chicken drummet marinated in dried oregano, black pepper and garlic then roasted to perfection',
				'type'  => 'chicken',
				'price' => array(
					'normal' => '12.80',
					'addon'  => '0.00'
					) // first is normal price, second is add on price
				),
			array(
				// modify this as needed
				'name'  => 'Crazy Chicken Crunchies (Original)',
				'image' => 'assets/img/sides/crazy_chicken_crunchies_original.png',
				'desc'  => 'New Original flavor of our delicious Crazy Chicken Crunchies. Tender cuts of succulent chicken breast, marinated and breaded then baked to perfection',
				'type'  => 'chicken',
				'price' => array(
					'normal' => '13.80',
					'addon'  => '10.80'
					) // first is normal price, second is add on price
				),
			array(
				// modify this as needed
				'name'  => 'Crazy Chicken Crunchies (Tom Yam)',
				'image' => 'assets/img/sides/crazy_chicken_crunchies_tomyam.png',
				'desc'  => 'Marinated in authentic Tom Yam spices for that `Crazy` kick! Crispy on the outside and packed with flavor on the inside',
				'type'  => 'chicken',
				'price' => array(
					'normal' => '13.80',
					'addon'  => '10.80'
					) // first is normal price, second is add on price
				),
			array(
				// modify this as needed
				'name'  => 'BBQ Chicken Wings',
				'image' => 'assets/img/sides/chicken_wings_bbq.png',
				'desc'  => 'Juicy and tender roasted chicken wings tossed with tangy BBQ sauce.',
				'type'  => 'chicken',
				'price' => array(
					'normal' => '13.80',
					'addon'  => '11.80'
					) // first is normal price, second is add on price
				),
			array(
				// modify this as needed
				'name'  => 'Plain Chicken Wings',
				'image' => 'assets/img/sides/chicken_wings_bbq.png',
				'desc'  => 'Well seasoned roasted chicken wings, tender and juicy.',
				'type'  => 'chicken',
				'price' => array(
					'normal' => '13.80',
					'addon'  => '9.80'
					) // first is normal price, second is add on price
				),
			array(
				// modify this as needed
				'name'  => 'Spaghetti Bolognese',
				'image' => 'assets/img/sides/spaghetti.png',
				'desc'  => 'The all-time favourite dish, chicken are slow simmered in a tomato-based sauce, full of mild sweet onions, herbs and a special blend of seasonings. Hearty, mild and comforting!',
				'type'  => 'chicken',
				'price' => array(
					'normal' => '11.80',
					'addon'  => '8.80'
					) // first is normal price, second is add on price
				),
			array(
				// modify this as needed
				'name'  => 'Chicken Lasagna',
				'image' => 'assets/img/sides/lasagna.png',
				'desc'  => 'Hot and saucy lasagna, made with pasta noodles and stuffed with three layers of rich meat sauce and mozzarella cheese.',
				'type'  => 'chicken',
				'price' => array(
					'normal' => '11.80',
					'addon'  => '8.80'
					) // first is normal price, second is add on price
				),
			array(
				// modify this as needed
				'name'  => 'Breadstix',
				'image' => 'assets/img/sides/breadstix.png',
				'desc'  => 'Sink your teeth into 8 baked treats filled with garlic goodness',
				'type'  => 'bread',
				'price' => array(
					'normal' => '6.80',
					'addon'  => '4.80'
					) // first is normal price, second is add on price
				),
			array(
				// modify this as needed
				'name'  => 'Twisty Bread',
				'image' => 'assets/img/sides/twisty_bread.png',
				'desc'  => 'Enjoy 6 pieces of freshly-baked twisty garlic wholesomeness',
				'type'  => 'bread',
				'price' => array(
					'normal' => '6.80',
					'addon'  => '4.80'
					) // first is normal price, second is add on price
				),
			array(
				// modify this as needed
				'name'  => 'Cinnastix',
				'image' => 'assets/img/sides/cinnastix.png',
				'desc'  => 'Soft and fluffy breadsticks,sprinkled with cinnamon and sugar,then baked to perfection.Served with sweet icing',
				'type'  => 'bread',
				'price' => array(
					'normal' => '6.80',
					'addon'  => '4.80'
					) // first is normal price, second is add on price
				),
			array(
				// modify this as needed
				'name'  => '6 inch Banana Kaya',
				'image' => 'assets/img/sides/banana_kaya.png',
				'desc'  => 'A mouth watering Malaysian favorite! Oven baked with fresh banana slices,sweet pandan kaya,topped with cheese and sprinkled with icing sugar. A must try!',
				'type'  => 'Dessert',
				'price' => array(
					'normal' => '6.80',
					'addon'  => '4.80'
					) // first is normal price, second is add on price
				),
			array(
				// modify this as needed
				'name'  => 'Chocolate Lava',
				'image' => 'assets/img/sides/chocolate_lava.png',
				'desc'  => 'Discover a lusciously melted soft chocolate centre, overflowing with chocolatey goodness',
				'type'  => 'Dessert',
				'price' => array(
					'normal' => '9.80',
					'addon'  => '8.80'
					) // first is normal price, second is add on price
				),
			);
		return $sideArray;
	}

	function menu_beverage()
	{
		$beverageArray = array(
			array(
				// modify this as needed
				'name'  => '7Up 1.5L',
				'image' => 'assets/img/beverages/7up_bottle.png',
				'desc'  => '7Up',
				'size'  => 'bottle',
				'price' => array(
					'normal' => '3.50',
					'addon'  => '2.80'
					) // first is normal price, second is add on price
				),
			array(
				// modify this as needed
				'name'  => 'Revive 1.5L',
				'image' => 'assets/img/beverages/revive_bottle.png',
				'desc'  => 'revive',
				'size'  => 'bottle',
				'price' => array(
					'normal' => '3.50',
					'addon'  => '2.80'
					) // first is normal price, second is add on price
				),
			array(
				// modify this as needed
				'name'  => 'Lipton 1.5L',
				'image' => 'assets/img/beverages/lipton_bottle.png',
				'desc'  => 'lipton',
				'size'  => 'bottle',
				'price' => array(
					'normal' => '3.50',
					'addon'  => '2.80'
					) // first is normal price, second is add on price
				),
			array(
				// modify this as needed
				'name'  => 'Pepsi 1.5L',
				'image' => 'assets/img/beverages/pepsi_bottle.png',
				'desc'  => 'pepsi',
				'size'  => 'bottle',
				'price' => array(
					'normal' => '3.50',
					'addon'  => '2.80'
					) // first is normal price, second is add on price
				),
			array(
				// modify this as needed
				'name'  => '7Up 325mL',
				'image' => 'assets/img/beverages/7up_can.png',
				'desc'  => '7Up',
				'size'  => 'can',
				'price' => array(
					'normal' => '3.50',
					'addon'  => '2.80'
					) // first is normal price, second is add on price
				),
			array(
				// modify this as needed
				'name'  => 'Revive 325mL',
				'image' => 'assets/img/beverages/revive_can.png',
				'desc'  => 'revive',
				'size'  => 'can',
				'price' => array(
					'normal' => '3.50',
					'addon'  => '2.80'
					) // first is normal price, second is add on price
				),
			array(
				// modify this as needed
				'name'  => 'Lipton 325mL',
				'image' => 'assets/img/beverages/lipton_can.png',
				'desc'  => 'lipton',
				'size'  => 'can',
				'price' => array(
					'normal' => '3.50',
					'addon'  => '2.80'
					) // first is normal price, second is add on price
				),
			array(
				// modify this as needed
				'name'  => 'Pepsi 325mL',
				'image' => 'assets/img/beverages/pepsi_can.png',
				'desc'  => 'pepsi',
				'size'  => 'can',
				'price' => array(
					'normal' => '3.50',
					'addon'  => '2.80'
					) // first is normal price, second is add on price
				)
			);
		return $beverageArray;
	}

	function menu_condiment()
	{
		$condimentArray = array(
			array(
				// modify this as needed
				'name'  => 'Salsa Sauce',
				'image' => 'assets/img/condiments/salsa_sauce.png',
				'desc'  => 'salsa sauce',
				'price' => array(
					'normal' => '0.50',
					'addon'  => '0.00'
					) // first is normal price, second is add on price
				),
			array(
				// modify this as needed
				'name'  => 'Chilly Flakes',
				'image' => 'assets/img/condiments/chiliflakes.png',
				'desc'  => 'chilly flakes',
				'price' => array(
					'normal' => '0.30',
					'addon'  => '0.00'
					) // first is normal price, second is add on price
				),
			array(
				// modify this as needed
				'name'  => 'Tangy Cheese Dip',
				'image' => 'assets/img/condiments/garlic_sauce.png',
				'desc'  => 'lipton',
				'price' => array(
					'normal' => '0.50',
					'addon'  => '0.00'
					) // first is normal price, second is add on price
				)
			);
		return $condimentArray;
	}

	function menu_meal()
	{
		$mealArray = array(
			// group meal
			array(
				'group' => '2 Pizza Deal',
				'meals' => array(
					// meals
					array(
						'name'  => 'Deal A',
						'price' => '30.00',
						'save'  => '19.60',
						'size'  => '4',
						// items
						'items' => array(
							array(
								'type' => 'pizza',
								'size' => 'regular',
								'desc' => '',
								'amount' => '2',
								'image' => 'http://placehold.it/90x90'
								)
							)
						),
					// meals
					array(
						'name'  => 'Deal B',
						'price' => '50.00',
						'save'  => '19.60',
						'size'  => '4',
						// items
						'items' => array(
							array(
								'type' => 'pizza',
								'size' => 'large',
								'desc' => '',
								'amount' => '2',
								'image' => 'http://placehold.it/90x90'
								)
							)
						),
					// meals
					array(
						'name'  => 'Deal C',
						'price' => '70.00',
						'save'  => '19.60',
						'size'  => '4',
						// items
						'items' => array(
							array(
								'type' => 'pizza',
								'size' => 'extra large',
								'desc' => '',
								'amount' => '2',
								'image' => 'http://placehold.it/90x90'
								)
							)
						)
					),
				),
			// group meal
			array(
				'group' => 'The New Incredible Meals',
				'meals' => array(
					// meals
					array(
						'name'  => 'Incredible A',
						'price' => '40.00',
						'save'  => '23.20',
						'size'  => '4',
						// items
						'items' => array(
							array(
								'type' => 'pizza',
								'size' => 'regular',
								'desc' => '',
								'amount' => '2',
								'image' => 'http://placehold.it/90x90'
								),
							array(
								'type' => 'side',
								'size' => '',
								'desc' => 'breadstix',
								'amount' => '1',
								'image' => 'http://placehold.it/90x90'
								),
							array(
								'type' => 'side',
								'size' => '',
								'desc' => 'twisty bread;banana kaya',
								'amount' => '1',
								'image' => 'http://placehold.it/90x90'
								)
							)
						),
					// meals
					array(
						'name'  => 'Incredible B',
						'price' => '50.00',
						'save'  => '27.00',
						'size'  => '4',
						// items
						'items' => array(
							array(
								'type' => 'pizza',
								'size' => 'regular',
								'desc' => '',
								'amount' => '2',
								'image' => 'http://placehold.it/90x90'
								),
							array(
								'type' => 'side',
								'size' => '',
								'desc' => 'breadstix',
								'amount' => '1',
								'image' => 'http://placehold.it/90x90'
								),
							array(
								'type' => 'side',
								'size' => '',
								'desc' => 'twisty bread;banana kaya',
								'amount' => '1',
								'image' => 'http://placehold.it/90x90'
								),
							array(
								'type' => 'side',
								'size' => '',
								'desc' => 'crazy chicken crunchies',
								'amount' => '1',
								'image' => 'http://placehold.it/90x90'
								)
							)
						),
					// meals
					array(
						'name'  => 'Incredible C',
						'price' => '60.00',
						'save'  => '35.00',
						'size'  => '4',
						// items
						'items' => array(
							array(
								'type' => 'pizza',
								'size' => 'regular',
								'desc' => '',
								'amount' => '3',
								'image' => 'http://placehold.it/90x90'
								),
							array(
								'type' => 'side',
								'size' => '',
								'desc' => 'breadstix',
								'amount' => '1',
								'image' => 'http://placehold.it/90x90'
								),
							array(
								'type' => 'side',
								'size' => '',
								'desc' => 'chicken wings;crazy chicken crunchies',
								'amount' => '1',
								'image' => 'http://placehold.it/90x90'
								)
							)
						),
					// meals
					array(
						'name'  => 'Incredible D',
						'price' => '100.00',
						'save'  => '58.40',
						'size'  => '4',
						// items
						'items' => array(
							array(
								'type' => 'pizza',
								'size' => 'regular',
								'desc' => '',
								'amount' => '5',
								'image' => 'http://placehold.it/90x90'
								),
							array(
								'type' => 'side',
								'size' => '',
								'desc' => 'twisty bread',
								'amount' => '1',
								'image' => 'http://placehold.it/90x90'
								),
							array(
								'type' => 'side',
								'size' => '',
								'desc' => 'starter box',
								'amount' => '1',
								'image' => 'http://placehold.it/90x90'
								)
							)
						)
					),
				),
			array(
				'group' => 'Combo Deal',
				'meals' => array(
					// meals
					array(
						'name'  => 'Combo A',
						'price' => '31.80',
						'save'  => '6.80',
						'size'  => '4',
						// items
						'items' => array(
							array(
								'type' => 'pizza',
								'size' => 'regular',
								'desc' => '',
								'amount' => '1',
								'image' => 'http://placehold.it/90x90'
								),
							array(
								'type' => 'side',
								'size' => '',
								'desc' => 'breadstix',
								'amount' => '1',
								'image' => 'http://placehold.it/90x90'
								),
							array(
								'type' => 'beverage',
								'size' => 'can',
								'desc' => '',
								'amount' => '2',
								'image' => 'http://placehold.it/90x90'
								)
							)
						),
					// meals
					array(
						'name'  => 'Combo B',
						'price' => '41.80',
						'save'  => '6.80',
						'size'  => '4',
						// items
						'items' => array(
							array(
								'type' => 'pizza',
								'size' => 'large',
								'desc' => '',
								'amount' => '1',
								'image' => 'http://placehold.it/90x90'
								),
							array(
								'type' => 'side',
								'size' => '',
								'desc' => 'breadstix',
								'amount' => '1',
								'image' => 'http://placehold.it/90x90'
								),
							array(
								'type' => 'beverage',
								'size' => 'can',
								'desc' => '',
								'amount' => '2',
								'image' => 'http://placehold.it/90x90'
								),
							)
						),
					// meals
					array(
						'name'  => 'Combo C',
						'price' => '43.80',
						'save'  => '18.40',
						'size'  => '4',
						// items
						'items' => array(
							array(
								'type' => 'pizza',
								'size' => 'regular',
								'desc' => '',
								'amount' => '2',
								'image' => 'http://placehold.it/90x90'
								),
							array(
								'type' => 'side',
								'size' => '',
								'desc' => 'breadstix',
								'amount' => '1',
								'image' => 'http://placehold.it/90x90'
								),
							array(
								'type' => 'beverage',
								'size' => 'bottle',
								'desc' => '',
								'amount' => '1',
								'image' => 'http://placehold.it/90x90'
								)
							)
						),
					// meals
					array(
						'name'  => 'Combo D',
						'price' => '54.80',
						'save'  => '17.40',
						'size'  => '4',
						// items
						'items' => array(
							array(
								'type' => 'pizza',
								'size' => 'large',
								'desc' => '',
								'amount' => '1',
								'image' => 'http://placehold.it/90x90'
								),
							array(
								'type' => 'pizza',
								'size' => 'regular',
								'desc' => '',
								'amount' => '1',
								'image' => 'http://placehold.it/90x90'
								),
							array(
								'type' => 'side',
								'size' => '',
								'desc' => 'breadstix',
								'amount' => '1',
								'image' => 'http://placehold.it/90x90'
								),
							array(
								'type' => 'beverage',
								'size' => 'bottle',
								'desc' => '',
								'amount' => '1',
								'image' => 'http://placehold.it/90x90'
								)
							)
						)
					),
				),
			);
		return $mealArray;
	}

	function menu_topping()
	{
		$topingArray = array(
			array(
				'name' => 'Cheese',
				'image' => 'http://placehold.it/90x90',
				'price' => '2.00',
				'type' => 'misc'
				),
			array(
				'name' => 'Butter Oil',
				'image' => 'http://placehold.it/90x90',
				'price' => '2.00',
				'type' => 'misc'
				),
			array(
				'name' => 'Beef Sausage',
				'image' => 'http://placehold.it/90x90',
				'price' => '2.00',
				'type' => 'meat'
				),
			array(
				'name' => 'Roasted Chicken',
				'image' => 'http://placehold.it/90x90',
				'price' => '2.00',
				'type' => 'meat'
				),
			array(
				'name' => 'Beef Pepperoni',
				'image' => 'http://placehold.it/90x90',
				'price' => '2.00',
				'type' => 'meat'
				),
			array(
				'name' => 'Ground Beef',
				'image' => 'http://placehold.it/90x90',
				'price' => '2.00',
				'type' => 'meat'
				),
			array(
				'name' => 'Shredded Chicken',
				'image' => 'http://placehold.it/90x90',
				'price' => '2.00',
				'type' => 'meat'
				),
			array(
				'name' => 'Chicken Pepperoni',
				'image' => 'http://placehold.it/90x90',
				'price' => '2.00',
				'type' => 'meat'
				),
			array(
				'name' => 'Chicken Potpourri',
				'image' => 'http://placehold.it/90x90',
				'price' => '2.00',
				'type' => 'meat'
				),
			array(
				'name' => 'Ikan Bilis',
				'image' => 'http://placehold.it/90x90',
				'price' => '2.00',
				'type' => 'seafood'
				),
			array(
				'name' => 'Tuna Chunk',
				'image' => 'http://placehold.it/90x90',
				'price' => '2.00',
				'type' => 'seafood'
				),
			array(
				'name' => 'Prawn',
				'image' => 'http://placehold.it/90x90',
				'price' => '2.00',
				'type' => 'seafood'
				),
			array(
				'name' => 'Crab Filament',
				'image' => 'http://placehold.it/90x90',
				'price' => '2.00',
				'type' => 'seafood'
				),
			array(
				'name' => 'Fresh Mushroom',
				'image' => 'http://placehold.it/90x90',
				'price' => '2.00',
				'type' => 'vegetable'
				),
			array(
				'name' => 'Sliced Onions',
				'image' => 'http://placehold.it/90x90',
				'price' => '2.00',
				'type' => 'vegetable'
				),
			array(
				'name' => 'Diced Tomato',
				'image' => 'http://placehold.it/90x90',
				'price' => '2.00',
				'type' => 'vegetable'
				),
			array(
				'name' => 'Spinach',
				'image' => 'http://placehold.it/90x90',
				'price' => '2.00',
				'type' => 'vegetable'
				),
			array(
				'name' => 'Green Pepper',
				'image' => 'http://placehold.it/90x90',
				'price' => '2.00',
				'type' => 'vegetable'
				),
			array(
				'name' => 'Riped Olives',
				'image' => 'http://placehold.it/90x90',
				'price' => '2.00',
				'type' => 'vegetable'
				),
			array(
				'name' => 'Pineapple',
				'image' => 'http://placehold.it/90x90',
				'price' => '2.00',
				'type' => 'vegetable'
				),
			array(
				'name' => 'Pickled Red Chilli',
				'image' => 'http://placehold.it/90x90',
				'price' => '2.00',
				'type' => 'vegetable'
				)
			);
		return $topingArray;
	}

	function get_orders()
	{
		$resp = array();
		$x = 0;
		while ($this->session->userdata('order'.$x) != '') {
			$order = $this->session->userdata('order'.$x);
			array_push($resp, $order);
			$x++;
		}
		return $resp;
	}

	function get_item($item, $trip = '')
	{
		$name = $item->name;
		$type = $item->type;
		$resp = $this->loading_item($name, $type);
		$resp['oru'] = $this->session->userdata($trip);
		$resp['aka'] = $type;
		if ( ! empty($trip))
			$resp['trip'] = $trip;
		return $resp;
	}

	function get_meal_item($meal)
	{
		$resp = array();
		$menu = $this->loading_menu('meal', 'all', 'all');
		for ($x=0; $x<count($menu); $x++) {
			$mn = $menu[$x]['meals'];
			for ($y=0; $y<count($mn); $y++) {
				$m = $mn[$y];
				if (in_array($meal, $m))
					$resp = $m;
			}
		}
		return $resp;
	}

	function retrieve_cart()
	{
		$resp     = array(); $pizza     = array(); $side = array();
		$beverage = array(); $condiment = array(); $meal = array();

		$x = 0;
		while ($this->session->userdata('order'.$x) != '') {
			$order = $this->session->userdata('order'.$x);

			switch ($order->type) {
				case 'meal':
					$thisMeal = array();
					for ($y=0; $y<count($order->items); $y++) {
						$item = $order->items[$y];
						$item = $this->get_item($item);
						array_push($thisMeal, $item);
					}
					$theItem = $this->get_meal_item($order->name);
					$resp[$order->name] = array(
						'trip'   => 'order'.$x,
						'item'   => $thisMeal,
						'detail' => $theItem
						);
					break;

				case 'pizza':
					$item = $this->get_item($order, 'order'.$x);
					array_push($pizza, $item);
					break;

				case 'side':
					$item = $this->get_item($order, 'order'.$x);
					array_push($side, $item);
					break;

				case 'beverage':
					$item = $this->get_item($order, 'order'.$x);
					array_push($beverage, $item);
					break;

				case 'condiment':
					$item = $this->get_item($order, 'order'.$x);
					array_push($condiment, $item);
					break;
				
				default:
					# code...
					break;
			}

			$x++;
		}

		if ( ! empty($pizza))     $resp['pizza']     = $pizza;
		if ( ! empty($side))      $resp['side']      = $side;
		if ( ! empty($beverage))  $resp['beverage']  = $beverage;
		if ( ! empty($condiment)) $resp['condiment'] = $condiment;

		$resp['extra'] = array(
			array(
				'name'  => '7Up 325mL',
				'image' => 'assets/img/beverages/7up_can.png',
				'desc'  => '7Up 325mL',
				'type'  => 'can',
				'price' => '3.50 2.80',
				'aka'   => 'special',
				'trip'  => 'orderx'
				)
			);

		/*echo '<pre>';
		print_r($this->session->userdata('order1'));
		print_r($resp);
		echo '</pre>';
		exit;*/

		return $resp;
	}

	function destroying_order()
	{
		$x = 0;
		while ($this->session->userdata('order'.$x) != '') {
			$this->session->unset_userdata('order'.$x);
			$x++;
		}
		$this->session->set_userdata(array('cartprice' => 'RM0.00'));
	}

	// new models
	function filtering_menu($menu, $filter, $needle)
	{
		$keyToRemove = array();

		// search the item to remove
		for ($x=0; $x<count($menu); $x++) {
			$mx = $menu[$x];
			if (array_key_exists($filter, $mx) && ! stristr($mx[$filter], $needle) && $needle != 'all')
				array_push($keyToRemove, $x);
		}
		// remove the item
		for ($y=0; $y<count($keyToRemove); $y++) {
			$ky = $keyToRemove[$y];
			unset($menu[$ky]);
		}
		// fix the index
		$menu = array_values($menu);

		return $menu;
	}
	
	function loading_menu($type, $size, $desc)
	{
		// load menu per type
		$funcMenu = 'menu_'.$type;
		$menu = $this->$funcMenu();

		// filter by size
		$menu = $this->filtering_menu($menu, 'size', $size);
		// filter by description
		$description = explode('-', $desc);
		$resp = array();
		if ( $desc != 'all'):
			$innerMenu = '';
			foreach ($description as $ds):
				$ds = str_replace('%20', ' ', $ds);
				$innerMenu = $this->filtering_menu($menu, 'name', $ds);
				foreach ($innerMenu as $im)
					array_push($resp, $im);
			endforeach;
		else:
			$resp = $menu;
		endif;

		return $resp;
	}

	function loading_item($name, $type)
	{
		$result = '';
		$getMenu = $this->loading_menu($type, 'all', 'all');
		for ($x=0; $x<count($getMenu); $x++) {
			$m = $getMenu[$x];
			if (array_key_exists('name', $m) && $m['name'] == $name):
				$result = $m;
			endif;
		}
		return $result;
	}

	function count_price($price)
	{
		$tax = 6 * $price / 100;
		$grandTotal = $price + $tax;
		$rounded = round($grandTotal, 1, PHP_ROUND_HALF_UP);
		$diffRound = $rounded - $grandTotal;
		$resp = array(
			'subtotal' => $price,
			'taxed' => $tax,
			'grand' => $grandTotal,
			'differ' => $diffRound,
			'final' => $rounded
			);
		return $resp;
	}

	function store_orders($orders, $flag)
	{
		$x = 0;
		$price = 0.00;
		$orders = json_decode($orders);

		// check previous stored orders
		while ($this->session->userdata('order'.$x) != '') {
			$thisOrder = $this->session->userdata('order'.$x);
			$price += $thisOrder->total;
			$x++;
		}

		// set new cart price
		$price += $orders->total;
		$calculated = $this->count_price($price);
		$this->session->set_userdata(array('calculated' => $calculated));
		$this->session->set_userdata(array('cartprice' => 'RM'.$calculated['final']));
		// store new order
		$this->session->set_userdata(array('order'.$x => $orders));

		return array(
			'message' => 'success!',
			);
	}

	function loading_pizza()
	{
		// load all menu
		$menu = $this->menu_pizza();

		$keyToRemove = array();
		// search the item to remove
		for ($x=0; $x<count($menu); $x++) {
			$mx = $menu[$x];
			if (array_key_exists('type', $mx) && stristr($mx['type'], 'custom pizza'))
				array_push($keyToRemove, $x);
		}
		// remove the item
		for ($y=0; $y<count($keyToRemove); $y++) {
			$ky = $keyToRemove[$y];
			unset($menu[$ky]);
		}
		// fix the index
		$menu = array_values($menu);

		return $menu;
	}

	function signing_out()
	{
		$this->session->unset_userdata(
			array(
				'username'    => '',
				'email'       => '',
				'password'    => '',
				'fname'       => '',
				'lname'       => '',
				'dob'         => '',
				'contact'     => '',
				'cartprice'   => '',
				'address1'    => '',
				'sel_method'  => '',
				'sel_address' => '',
				'sel_time'    => '',
				'sel_date'    => '',
				'popper'      => '',
				)
			);
		$this->destroying_order();
	}

	function unset_order($trip, $current)
	{
		$order = substr($trip, -1, 1);
		$moveOrder = $order + 1;

		while ($this->session->userdata('order'.$moveOrder) != '') {
			$new = $this->session->userdata('order'.$moveOrder);
			$this->session->set_userdata(array('order'.$order => $new));

			$oldChecker = $moveOrder + 1;
			if ( $this->session->userdata('order'.$oldChecker) == '')
				$this->session->unset_userdata('order'.$moveOrder);

			$moveOrder++;
		}
		if ( $current == 0)
			$this->session->unset_userdata('order0');
	}

	function removing_item($trip)
	{
		$tribeca = $this->session->userdata($trip);
		$bank = $this->session->userdata('calculated');

		$current = $bank['subtotal'];
		$money = $tribeca->total;

		$current -= $money;
		if ($current < 0) $current = 0;

		$calculated = $this->count_price($current);
		$this->session->set_userdata(array('calculated' => $calculated));
		$this->session->set_userdata(array('cartprice' => 'RM'.$calculated['final']));

		$this->unset_order($trip, $current);

		$response = array('status' => 'success');
		return $response;
	}

}
