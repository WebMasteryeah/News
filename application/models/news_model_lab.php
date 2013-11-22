<?php

// creates a new model by extending CI_Model and 
// loads the database library.
// This will make the database class available through the $this->db object
class News_model extends CI_Model{
    
    //****************Setting up your mode****************
    
    //load the database library
    public function __construct(){
        $this->load->database();
    }
    
    // get all of our post from our database
    //      to do this, the database abstraction layer that is included with 
    //      CodeIgniter - Active Recorde - is used
    //      This makes it possible to write your 'queries' once and make them work on 
    //      all supported database systems.     
    public function get_news($slug=FALSE){
        //$this->load->database();
        //You can get all news records, or get a news item by its slug.
        if($slug===FALSE){
            $query = $this->db->get('news'); //get news record
            return $query->result_array();
        }
        
        $query = $this->db->get_where('news',array('slug'=>$slug)); //get a new item by its slug
        return $query->row_array();
    }
    
    //wrtie the data to database/
    //inserting the new item into the database
    public function set_news(){
        
        $this->load->helper('url'); //url helper

        //strips down the string you pass it, replacing all spaces by dashes(-)
        //and make sure everything is in lowercase char.
        $slug = url_title($this->input->post('title'), 'dash', TRUE); //shapes nice slug for creating URLs
        
        //Each element corresponds with a column in the database table
        // post() from the input library makes sure the data is sanitized,
        //protecting you from nasty attacks from others
        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => $this->input->post('text')
        );

        return $this->db->insert('news', $data);
    }
    
    
}
    
?>
