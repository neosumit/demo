<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userlist extends CI_Controller
{

    function __construct()
    {
        parent:: __construct();
        $this->load->model('Admin_Insert');
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->library('upload');
        $this->load->helper(array('form', 'url'));
        //$this->load->helper('form');
        //$this->load->library('session');
    }

    /**
     * display all register user list to admin
     * apply pagination on table data
     * apply both side sorting on columns
     * @data = user_name
     *         user_email
     *         user_id
     * @package CodeIgniter
     * @subpackage Controller
     * @author Sumit Desai
     */
    public function index()
    {
        if ($this->session->userdata('session')) {

            //$data['user'] = $this->Admin_Insert->list_product();
            $x = $this->session->userdata('id');                //fetch session id
            $perpage = $this->Admin_Insert->fetch_perpage($x);  //fetch perpage data from databse
            $config = array();
            $config["base_url"] = base_url() . "admin/userlist/index";//set base url
            $total_row = $this->Admin_Insert->record_count_user();    //count all users row
            $config["total_rows"] = $total_row;
            $config["per_page"] = $perpage;
            $config['use_page_numbers'] = TRUE;
            $config['num_links'] = $total_row;
            $config['cur_tag_open'] = '&nbsp;<a class="current">';
            $config['cur_tag_close'] = '</a>';
            $config['next_link'] = 'Next';
            $config['prev_link'] = 'Previous';
            $this->pagination->initialize($config);
            if ($this->uri->segment(4)) {
                $page = ($this->uri->segment(4));
            } else {
                $page = 1;
            }
            $data['user'] = $this->Admin_Insert->fetch_user_data($config["per_page"], $page);
            $str_links = $this->pagination->create_links();
            $data["links"] = explode('&nbsp;', $str_links);             //generate link for pagination
            $sortorder = 'DESC';                                        //apply sorting
            if($this->input->get('sortorder') == 'DESC')
                $sortorder = 'ASC';

            $data["sortorder"] = $sortorder;

            $this->load->view('header');
            $this->load->view('footer');
            $this->load->view('user_list', $data);
        } else {
            redirect('admin/login');
        }
    }

    /**
     * delete suspicious user from admin panal
     * @package CodeIgniter
     * @subpackage Controller
     * @author Sumit Desai
     */
    public function delete_userlist_data()                                   //delete img
    {
        $this->Admin_Insert->userlist_delete();
        redirect('admin/userlist');
    }

    /**
     * display user data to admin..
     * display user personal data
     * display user address data
     * @package CodeIgniter
     * @subpackage Controller
     * @author Sumit Desai
     */
    public function view_user_data()
    {
        $data['user'] = $this->Admin_Insert->userlist_data();
        $data['user_address'] = $this->Admin_Insert->useraddress_data();
        $this->load->view('header');
        $this->load->view('footer');
        $this->load->view('user_details', $data);
    }

    /**
     * search user from user list
     * using search keyword witch come from front end
     * match keyword with all columns
     * apply sorting ojn all columns
     * @package CodeIgniter
     * @subpackage Controller
     * @author Sumit Desai
     */
    public function search_user()
    {
        $user_ser=$this->input->post('search');
        $user_serach=trim($user_ser);
        $data['user']=$this->Admin_Insert->user_search($user_serach);
        $sortorder = 'DESC';
        if($this->input->get('sortorder') == 'DESC')
            $sortorder = 'ASC';
        $data['sort']="sort";
        $data["sortorder"] = $sortorder;
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );
        $this->load->view('header');
        $this->load->view('footer');
        $this->load->view('user_list',$data);
    }
}