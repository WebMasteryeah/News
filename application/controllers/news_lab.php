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
        
        $this->load->helper('html');
        
        //get data from Model
        $data['news']=$this->news_model->get_news();
        
        //passing retrieved data to view
        $data['title'] = 'News archive';
        $data['content'] = $this->load->view('news/'.'index', $data, TRUE); //content
        $this->load->view('templates/master', $data);
        
    }
    
    //view for a specific new item.
    public function view($slug){
        
        $this->load->helper('html');
        
        $data['news_item']=$this->news_model->get_news($slug);
        $data['news']=$this->news_model->get_news($slug);
        
        if(empty($data['news_item'])){
            show_404();
        }
        
        $data['title'] = $data['news_item']['title'];
        
        $data['content'] = $this->load->view('news/view', $data, TRUE); //content
        $this->load->view('templates/master', $data);
    }
    
    
    public function create(){
        
        $this->load->helper('html');  // for doctype('html5') in master.php
        $this->load->helper('form');  // for form_open() in creat.php
        $this->load->library('form_validation'); // for validation_errors() in create.php
        
        $data['title'] = 'Create a news item';
        
        //rules for the form validation are set
        //The set_rules() method takes three arguments; 
        //  the name of the input field - the exact name you've given the form field. 
        //  the name to be used in error messages - A "human" name for this field.
        //  the rule. 
        //In this case the title and text fields are required.
        //http://localhost/Lab6/user_guide/libraries/form_validation.html
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'text', 'required');
        
        //condition that checks whether the form validation ran successfully
        if ($this->form_validation->run() === FALSE){  //if it did tno
            //the form is diplayed
            $this->load->view('news/create');//content
            
            //get data from Model
            $data['news']=$this->news_model->get_news();
            
            //passing retrieved data to view
            $data['title'] = 'News archive';
            $data['content'] = $this->load->view('news/'.'index', $data, TRUE); //content
            $this->load->view('templates/master', $data);

        } else { //if it was submitted and passd all the rules,
                 //the model is called
            $this->news_model->set_news(); 
            $this->load->view('news/success'); // view is loaded to display a success message
        }
    }
}
?>
