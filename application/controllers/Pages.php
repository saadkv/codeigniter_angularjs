<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	/*public function index()
	{
		$this->load->view('welcome_message');
	}*/

	// private $sq;
	protected $_lib;
	// protected $CI;

	public function __construct() {
		parent::__construct();// you have missed this line.
		// $this->CI =& get_instance();
		// $this->sq = $this->CI->load->library('sqfrontend');
		$this->load->library('sqfrontend');
		$this->load->library('session');

		$this->_lib = $this->sqfrontend;
	}

	public function main()
    {
    	$this->_lib->template_load('main');
    }

	public function home($page = 'home')
    {
    	$data['title'] = ucfirst($page); // Capitalize the first letter
		$this->session->set_userdata('name', 1);
        $this->_lib->template_view_load($page, $data);
    }

	public function contact($page = 'contact')
    {
    	$data['title'] = ucfirst($page); // Capitalize the first letter
        $data['is_sidebar'] = true;

        $this->_lib->template_view_load($page, $data);
    }

	public function portfolio_func($page = 'portfolio')
    {
		_pre($_SESSION);
    	$this->_lib->template_view_load($page);
    }

	public function help($page = 'help')
    {
    	$data['title'] = ucfirst($page); // Capitalize the first letter
        $data['is_sidebar'] = true;

        $this->_lib->template_view_load($page, $data);
    }

	public function products_method($page = 'products')
    {
    	$data['title'] = ucfirst($page); // Capitalize the first letter
        $data['is_sidebar'] = true;

        $this->_lib->template_view_load($page, $data);
    }

	public function otherwise($page = '404')
    {
    	echo '<h1>Not Found</h1><a ui-sref="home">Back Home</a><br><a ui-sref="help">Back help</a>'; //$this->_lib->template_view_load($page, $data);
    }

	public function view($page = 'page')
    {
    	// var_dump( $this->_lib->is_template($page) );
    	// var_dump( $this->_lib->get_template_part($page) );
    	_pre($page);

    	if( empty($this->_lib->get_template_part($page) ) )
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        // echo '<pre>';
        // print_r( $this->sqfrontend->template_load($page, $data) );
        // echo '</pre>';
        if( $page == 'contact' ) {
        	$data['is_sidebar'] = true;
        }
        $this->_lib->template_load($page, $data);
    }
}
