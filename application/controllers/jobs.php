<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobs extends CI_Controller {

    public function access_map(){
        return array(
            'index'=>'view',
            'update'=>'edit'
        );
    }

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');

    }

    public function index()
    {

        // Component
        $this->output->enable_profiler(TRUE); //Profiler Debug
        $this->load->model('Midae_model');
        $data['user_meta'] = $this->Midae_model->get_user_meta();
        $data['top_title'] = ucwords(strtolower($this->uri->segment('1'))); //URI title.
        $data['top_desc']  = "Change your page purpose here"; //function purpose here.
        //End of component

        $crud  = new grocery_CRUD();
        $state = $crud->getState();
        $crud->set_theme('datatables');
        $crud->set_table('jobs');
        $crud->set_subject('Jobs');
        
        $crud->unset_print();
        
        $crud->callback_before_insert(array($this,'_last_update'));
        
        
        if($state == "add" | $state == "edit") //nk display add form dengan edit form
        {
            $data['staff']     = $this->Midae_model->get_staff_member();
            $data['top_title'] = ucwords(strtolower($this->uri->segment('1'))); //URI title.
            $data['top_desc']  = "Change your page purpose here"; //function purpose here.*/
            $data['website']   = $this->Midae_model->get_website(); //get websites from database
            $data['customer']  = $this->Midae_model->get_customer(); //get customers from database
            $this->load->view('job.php',$data);

           if($this->input->post('save')) // if save button click
           {
                $postData = $this->input->post(); //get ALL input post data from form
                print_r($postData);
                date_default_timezone_set('Asia/Kuala_Lumpur');
                $data = array(

                    'customer_id'         => $postData['customer_id'],
                    'website_id'          => $postData['website_id'],
                    'job_title'           => $postData['job_title'],
                    'job_date_start'      => $postData['job_date_start'],
                    'job_start_time'      => $postData['job_start_time'],
                    'job_end_time'        => $postData['job_end_time'],
                    'job_due_date'        => $postData['job_due_date'],
                    'job_complete_date'   => $postData['job_complete_date'],
                    'user_id'             => $postData['user_id'],
                    'job_tax'             => $postData['job_tax'],
                    'job_currency'        => $postData['job_currency'],
                    'job_type'            => $postData['job_type'],
                    'job_status'          => $postData['job_status'],
                    'job_description'     => $postData['job_description'],
                    'job_hour'            => $postData['job_hour'],
                    'job_quote_date'      => $postData['job_quote_date'],
                    'job_renewal_date'    => $postData['job_renewal_date'],
                    'job_task_type'       => $postData['job_task_type'],
                    'job_discount_amount' => $postData['job_discount_amount'],
                    'job_discount_name'   => $postData['job_discount_name'],
                    'job_discount_type'   => $postData['job_discount_type'],
                    'last_update'         => date("Y-m-d")

                    );
    
            $this->Midae_model->insert_new_data($data,'jobs'); //insert data into JOBS table
               
      

           }
           


        }
        /*elseif ($state == "read") 
        {
            $crud->fields('lead_name','lead_firstname','lead_lastname','lead_email','lead_phone','lead_mobile','lead_fax','lead_address','lead_postcode','lead_state','country_id','last_update');
            $crud->callback_before_insert(array($this,'_last_update'));
            $output = $crud->render();
            $output = array_merge($data,(array)$output);
            $this->load->view('cruds.php',$output);
        }*/
        else
        {
            $crud->columns('job_title','job_date','job_due_date','job_type','job_status');
            $output = $crud->render();
            $output = array_merge($data,(array)$output);
            $this->load->view('cruds.php',$output);
        }


           

    }

}

/* End of file dashboard.php */
/* Location: ./application/controllers/leads.php */