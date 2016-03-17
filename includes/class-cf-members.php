<?php
/**
 * Singleton to hold instances of the CF_Member class
 *
 * @package   cf-members
 * @author    Josh Pollock <Josh@JoshPress.net>
 * @license   GPL-2.0+
 * @link
 * @copyright 2016 Josh Pollock
 */
class CF_Members {

	/**
	 * Hold instance
	 *
	 * @since 0.1.0
	 *
	 * @var CF_Members
	 */
	protected static $instance;

	/**
	 * Array of CF_Member objects
	 *
	 * @since 0.1.0
	 *
	 * @var array
	 */
	protected $members;

	/**
	 * Constructor -- don't call.
	 *
	 * @since 0.1.0
	 *
	 */
	protected function __construct(){}

	/**
	 * Get instance of class
	 *
	 * @since 0.1.0
	 *
	 * @return \CF_Members
	 */
	public static function instance(){
		if( null == static::$instance ){
			static::$instance = new self();
		}

		return static::$instance;
	}

	/**
	 * Add member object to the store
	 *
	 * @since 0.1.0
	 *
	 * @param \CF_Member $member
	 */
	public function add_member( CF_Member $member ){
		$this->members[ sanitize_key( $member->get_plan() ) ] = $member;

	}

	/**
	 * Get member of object from store
	 *
	 * @since 0.1.0
	 *
	 * @param string $plan_slug
	 * @param array $proccesor_details Optional. Details from processor
	 *
	 * @return CF_Member|void
	 */
	public function get_member( $plan_slug){
		if( isset( $this->members[ sanitize_key( $plan_slug ) ] ) ){
			return $this->members[ sanitize_key( $plan_slug ) ];
		}
	}



}
