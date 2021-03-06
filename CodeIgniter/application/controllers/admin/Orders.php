<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller
{

    function __construct()
    {
        parent:: __construct();
        $this->load->model('Admin_Insert');
        $this->load->model('User');
        $this->load->model('orderadmin');
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->library('upload');
        $this->load->helper(array('form', 'url'));

    }

    /**
     * pagination for on total order list
     * apply sorting on every column
     * @param $data - order_id
     *                user_name - who purches respective product
     *                status - product current status
     *                grand_total - total price with/without discount of order
     * @package CodeIgniter
     * @subpackage Controller
     * @author Sumit Desai
     */
    public function index()                                 //view user data
    {
        //check session set or not
        if($this->session->userdata('session'))
        {
            //using session get admin_id
            $x = $this->session->userdata('id');
            //set perpage as per admin seeting
            $perpage = $this->Admin_Insert->fetch_perpage($x);
            //if perpage not set by respective admin
            if (empty($perpage))
            {
                $perpage = 2; // set default page
            }
            $config = array();
            $config["base_url"] = base_url() . "admin/orders/index/";//url for pageniation on order list page
            $total_row = $this->orderadmin->order_record_count();    //total order witch are placed
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
            $data["order"] = $this->orderadmin->fetch_order_data($config["per_page"], $page);
            $str_links = $this->pagination->create_links();             //generate link fro pagination
            $data["links"] = explode('&nbsp;', $str_links);

            $sortorder = 'DESC';                                        //det defaoult sorting
            if($this->input->get('sortorder') == 'DESC')                //change sorting type
                $sortorder = 'ASC';

            $data["sortorder"] = $sortorder;                            //save sorting type
            $this->load->view('header');
            $this->load->view('footer');
            $this->load->view('orders', $data);
        }
        //if session not set
        else
        {
            redirect('admin/login');
        }

    }

    /**
     * search order by keyword enters from front end
     * search on the bases of all columns
     * sorting also apply on search data
     * @param search - keyword enter at front end
     * @package CodeIgniter
     * @subpackage Controller
     * @author Sumit Desai
     *
     */
    public function search_order()                          //search admin_user data
    {
        $order_ser=$this->input->post('search');
        $order_search=trim($order_ser);
        $data['order']=$this->orderadmin->order_search($order_search);

        $sortorder = 'DESC';                                //det defaoult sorting
        if($this->input->get('sortorder') == 'DESC')        //change sorting type
            $sortorder = 'ASC';

        $data['sort']="sort";
        $data["sortorder"] = $sortorder;                    //save sorting type
        $str_links = $this->pagination->create_links();     //generate link fro pagination
        $data["links"] = explode('&nbsp;',$str_links );
        $this->load->view('header');
        $this->load->view('footer');
        $this->load->view('orders',$data);
    }

    /**
     * view details of particular orders
     * @param o_id - order_id
     * @param data - status of particular product
     * @package CodeIgniter
     * @subpackage Controller
     * @author Sumit Desai
     */
    public function view_order()                            //view details of particular orders
    {
        $o_id=$this->uri->segment(4);
        $data['id']=$o_id;
        //fetch status of current product
        $data['status']=$this->orderadmin->status($o_id);
        $this->load->view('header');
        $this->load->view('footer');
        $this->load->view('view_orders', $data);
    }

    /**
     * change order status and send some message fro customer
     * send mail to customer with changes done on his/her order
     * $o_id(int) = order_id - fetch form front end form
     * $comment(string) = comment - fetch form front end form
     * $status(array) = status - new updated status of products
     * $data(array) = status(string)- new updated status of products
     *                comment(string)- msg fro customer
     *                order_id(int)- order_id
     *                modify_date(date)-current date
     * @package CodeIgniter
     * @subpackage Controller
     * @author Sumit Desai
     */
    public function update_order()
    {
        //fetch order_id from front end
        $o_id=$this->input->post('hidden');
        //fetch order_id from front end
        $comment= $this->input->post('comment');
        //array of status of product
        $status=array(
            'status' => $this->input->post('order_status'),
        );
        //chenge status in user_order table
        $this->orderadmin->order_status($o_id,$status);
        //array of user changes in order
        $data=array(
            'status' => $this->input->post('order_status'),
            'comment'=> $this->input->post('comment'),
            'order_id' =>$this->input->post('hidden'),
            'modify_date'=> date('y/m/d')
        );
        //chanegs updated in order_status table
        $this->orderadmin->order_update($o_id,$data);
        //send mail to cutomer of its order status
        /*$config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.wwindia.com',
            'smtp_port' => 25,
            'smtp_user' => 'sumit.desai@wwindia.com', // change it to yours
            'smtp_pass' => 'nb=np2^89mKn', // change it to yours
            'mailtype' => 'html', //'charset' => 'iso-8859-1',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );*/
        $message = $comment;
        $email=$this->Admin_Insert->fetch_email();
        $this->email->initialize($this->config->item('email'));
        $this->email->set_newline("\r\n");
        $this->email->from($email); // change it to yours
        $this->email->to('sumit.desai@wwindia.com');// change it to yours
        $this->email->subject('About Product Status');
        $this->email->message($message);
        //if error occurs in sending mail to customer
        if ($this->email->send())
        {
            redirect('admin/orders');

        } else
        {
            show_error($this->email->print_debugger());
        }
    }

    /**
     * fetch about user personal data
     * fetch about user address data
     * fetch about user order data
     * fetch about user shipping data
     * fetch about user payment data
     * @customer - user_name
     *             user_lastname
     * @address -  address_1
     *             city
     *             country
     *             zipcode
     * @order -    order_id
     *             shipping address
     *             billing address
     *             status -product current status
     *             added date
     * @shipping - user_name
     *             address_1
     *             payment_method
     * @payment -  payment_type
     *             getway_id
     *             transaction id
     *             payment date
     *             grand_total
     * @package CodeIgniter
     * @subpackage Controller
     * @author Sumit Desai
     */
    public function edit_order()
    {
        //order_id fetch from url
        $o_id=$this->uri->segment(4);
        //fetch user_id using order_id
        $u_id=$this->orderadmin->u_id($o_id);
        //fetch customer data
        $data['customer']= $this->orderadmin->user_data($u_id);
        //fetch address of customer
        $data['address'] = $this->orderadmin->user_address($u_id);
        //fetch order details
        $data['order']=$this->orderadmin->order_data($o_id);
        //fetch shipping details address,etc;
        $data['shipping']=$this->orderadmin->shipping_data($o_id);
        //fetch payment type and details
        $data['payment']=$this->orderadmin->payment($o_id);
        $this->load->view('header');
        $this->load->view('footer');
        $this->load->view('view_orderdetails', $data);
    }
    public function order_chart()
    {
        $total_mc = "";
        $total_jc = "";
//       $data_ap = $this->orderadmin->fetch_date_ap();
        $data_may_paypal = $this->orderadmin->fetch_date_may();
        $data_may_cod = $this->orderadmin->fetch_date_may_cod();
        $data_jun_paypal = $this->orderadmin->fetch_date_jun();
        $data_jun_cod = $this->orderadmin->fetch_date_jun_cod();

        foreach ($data_may_paypal as $value) {
            $value = (array)$value;
            $date_mp[] = $value['grand_total'];
            $total_mp = array_sum($date_mp);
        }
        foreach ($data_may_cod as $value) {
            $value = (array)$value;
            $date_mc[] = $value['grand_total'];
            $total_mc = array_sum($date_mc);
        }
        foreach ($data_jun_paypal as $value) {
            $value = (array)$value;
            $date_junep[] = $value['grand_total'];
            $total_jp = array_sum($date_junep);
        }
        foreach ($data_jun_cod as $value) {
            $value = (array)$value;
            $date_junec[] = $value['grand_total'];
            $total_jc = array_sum($date_junec);
        }


        $data_may_order = $this->orderadmin->fetch_date_may_order();

       foreach($data_may_order as $value)
       {
           $value=(array)$value;
           $may_order=$value['order_id'];
       }
        $data_jun_order = $this->orderadmin->fetch_date_jun_order();
        foreach($data_jun_order as $value)
        {
            $value=(array)$value;
            $june_order=$value['order_id'];
        }

        $order_data['total_m'] = $total_mc + $total_mp;
        $order_data['order_m'] = $may_order;
        $order_data['total_j'] = $total_jp + $total_jc;
        $order_data['order_j'] = $june_order;
        $this->load->view('header');
        $this->load->view('Sales_reports', $order_data);
    }



    public function pract_chart()
    {
        $data['year_graph'] = $this->User->get_data();
        $this->load->view('script_chart',$data);
    }

}