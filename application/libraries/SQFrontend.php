<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SQFrontend {

	protected $CI;
	private $tpl_prefix;
    // public $ciConfig = array();

	public function __construct()
    {
            // Assign the CodeIgniter super-object
            $this->CI =& get_instance();
            $this->tpl_prefix = 'tpl_';
            // $this->config = $config;
            // _pre($this->CI->router->routes);
    }

    public function template_name($filename)
    {
    	return $this->tpl_prefix . $filename .'.php';
    }

    public function get_view_dir($filename = null)
    {
    	return APPPATH . 'views' . DIRECTORY_SEPARATOR . $filename;
    }

    public function get_template_dir($filename = null)
    {
    	return $this->get_view_dir('templates') . DIRECTORY_SEPARATOR . $filename;
    }

    public function get_root_url($filename = null)
    {
        return base_url( $filename );
    }

    public function get_assets_url($filename = null)
    {
        return $this->get_root_url('assets') . '/' . $filename;
    }

    public function node_modules_url($filename = null)
    {
        echo $this->get_root_url('node_modules') . '/' . $filename;
    }

    public function get_stylesheet_url($filename = null)
    {
        return $this->get_assets_url('css') . '/' . $filename;
    }

    public function get_javascript_url($filename = null)
    {
        return $this->get_assets_url('js') . '/' . $filename;
    }

    public function is_template($filename)
    {
    	// echo $this->get_template_dir($filename);

    	if( file_exists($this->get_template_dir($filename)) )
    		return $this->get_template_dir($filename);

    	else if( file_exists($this->get_view_dir($filename)) )
    		return $this->get_view_dir($filename);

    	return false;
    }

    public function get_template_part($filename)
    {
    	$located = '';
    	$filename = $this->template_name($filename);

    	if( $this->is_template($filename) )
    		$located = $this->is_template($filename);

    	return $located;
    }

    public function template_load($name, $data = null)
    {
        $this->CI->load->helper('url');
        $data['SQFrontend'] = $this;

        if( !isset($data['is_sidebar']) )
            $data['is_sidebar'] = false;
        
        $this->CI->load->view('common/header', $data);
        $this->CI->load->view('templates/'. $this->template_name($name), $data);
        $this->CI->load->view('common/footer', $data);
    }

    public function template_view_load($name, $data = null)
    {
        $this->CI->load->helper('url');
        $data['SQFrontend'] = $this;
        
        $this->CI->load->view('templates/'. $this->template_name($name), $data);
    }

    public function get_ngurl_states()
    {
        $ci_rewrite_routes = $this->CI->router->routes['ci_rewrite_routes'];
        $ng_urls = array();
        // $ng_urls['states'] = array();
        // _pre($ci_rewrite_routes);

        foreach($ci_rewrite_routes as $key => $ci_route) {
            if( @empty($ci_route['callback']) )
                $ci_route['callback'] = 'callback/' . $key;

            $ng_urls[] = array(
                'name' => $key,
                'url' => $ci_route['url'],
                'templateUrl' => $ci_route['callback']
            );
        }

        return json_encode($ng_urls);
    }

    public function routing_builds()
    {
        $html = '<script>ci_main.states = ' . $this->get_ngurl_states() . ';</script>';

        return $html;
    }
}