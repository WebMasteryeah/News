<?php
class News extends CI_Controller{
    
    public function __construct(){
        //calls the contructor of its parent class CI_Controller
        parent::__construct(); 
        //loads the model, so it can be used in all other methods
        //in this controller
        $this->load->model('news_model'); 
    }
    
    //view all news items
    public function index(){
        
        $this->load->library('table');  //for table->add_row() in master.php
        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->helper('text');
        
        //get data from Model
        $data['news']=$this->news_model->get_news();
        
        //passing retrieved data to view
        $data['title'] = 'News archive';  //tab title
        $data['content'] = $this->load->view('news/'.'index', $data, TRUE); //content
        $data['viewA'] = 'active' ;
        $data['createA'] = '';
        $data['deleteA'] = '';
        $this->load->view('templates/master', $data);
        
    }
    
    //view for a specific news item.
    public function view($slug){
        
        $this->load->helper('html');
        $this->load->helper('url');
        
        $data['news_item']=$this->news_model->get_news($slug);
        $data['news']=$this->news_model->get_news($slug);
        
        if(empty($data['news_item'])){
            show_404();
        }
        echo $slug;
        $data['title'] = $data['news_item']['title'];
        $data['content'] = $this->load->view('news/view', $data, TRUE); //content
        $data['viewA'] = 'active' ;
        $data['createA'] = '';
        $data['deleteA'] = '';
        $this->load->view('templates/master', $data);
    }
    
    //create a news item
    public function create(){
        
        $this->load->helper('url');  //for base_url() in master.php
        $this->load->helper('html');  // for doctype('html5') in master.php
        $this->load->helper('form');  // for form_open() in create.php
        $this->load->library('form_validation'); // for validation_errors() in create.php
        
        $data['title'] = 'Create a news item';
        $data['viewA'] = '' ;
        $data['createA'] = 'active';
        $data['deleteA'] = '';
        
        //rules for the form validation are set
        //The set_rules() method takes three arguments; 
        //  the name of the input field - the exact name you've given the form field. 
        //  the name to be used in error messages - A "human" name for this field.
        //  the rule. 
        //In this case the title and text fields are required.
        //http://localhost/Lab6/user_guide/libraries/form_validation.html
        $this->form_validation->set_rules('title', 'Title', 'required');        
        $this->form_validation->set_rules('text', 'Text', 'required');
        
        //condition that checks whether the form validation ran successfully
        if ($this->form_validation->run() === FALSE){  //if it did not
            //the form is diplayed
            $data['content'] = $this->load->view('news/'.'create', $data, TRUE); //content
            $this->load->view('templates/master', $data);

        } else { //if it was submitted and passd all the rules,
                 //the model is called
            $this->news_model->set_news(); 
            redirect('news', 'refresh');
            //redirect('news', 'refresh'); // view is loaded to display a success message
        }
    }
    
    // delete the selected article from view
    // do not delete from database
    public function deleteView(){
        
        //$slug = $_GET['slug'];
        $this->load->library('table');  //for table->add_row() in master.php
        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->helper('text');
        
        //get data from Model
        $data['news']=$this->news_model->get_news();
        
        $data['title'] = 'Delete a news item';
        //$data['slug'] = $slug;
        $data['content'] = $this->load->view('news/deleteView', $data, TRUE); //content
        $data['viewA'] = '' ;
        $data['createA'] = '';
        $data['deleteA'] = 'active';
        $this->load->view('templates/master', $data);
    }
    
        // delete the selected article from view
    // do not delete from database
    public function delete($slug){
        
        $this->load->library('table');  //for table->add_row() in master.php
        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->helper('text');     
        $this->load->helper('form');
        
        $data['title'] = 'Delete a news item';
        $data['slug'] = $slug;
        $data['content'] = $this->load->view('news/delete', $data, TRUE); //content
        $data['viewA'] = '' ;
        $data['createA'] = '';
        $data['deleteA'] = 'active';
        $this->load->view('templates/master', $data);
        
        $submitted = $this->input->post('submit');
        
        if($submitted == 'Yes'){
            $this->news_model->delete_news($slug);
            redirect('news', 'refresh');
        }
        if($submitted == 'No'){
            redirect('news/deleteView', 'refresh');
        }
    }
    
}
?>
