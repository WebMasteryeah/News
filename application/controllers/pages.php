<?php

// The pages class is extending the CI_Controller class. 
// This means that the new pages class can access the methods and 
// variables defined in the CI_Controller class (
// system/core/Controller.php).

// ???? 
// The controller is what will become the center of every request to 
// your web application. In very technical CodeIgniter discussions, 
// it may be referred to as the super object. Like any php class, 
// you refer to it within your controllers as $this. 
// Referring to $this is how you will load libraries, 
// views, and generally command the framework.

class Pages extends CI_Controller {

    // In order to load pages such as home.php about.php in views/pages/
	public function view($page = 'home') //view method that accept one argument
	{
        //checks whether the page actually exists. 
        //PHP's native file_exists() function is used to 
        //check whether the file is where it's expected to be.
        if ( ! file_exists('application/views/pages/'.$page.'.php')){
            
            // Whoops, we don't have a page for that!
            show_404(); //is a buildt in CodeIgniter function that renders the default error page.
        }

        $this->load->helper('html');
        $this->load->helper('url');
        //Each value in the $data array is assigned to a variable with the name of its key
        //So the value of $data['title'] in the controller is equivalent to $title in view
        $data['title'] = ucfirst($page); // Capitalize the first letter
        
        //$data array contains all the parameteres required to specify the vies(s)
        //so it is passed to both the content view and the master view 
        $data['content'] = $this->load->view('pages/'.$page, $data, TRUE); //content
        $this->load->view('templates/master', $data);  //master view
//        //In header template, the $title variable was used to customize the page title.
//        //The value of title is defined in this method, but instead of assigning the value of variable, 
//        //it is assigned to the title element in the $data array.
//        $this->load->view('templates/header', $data);
//        $this->load->view('pages/'.$page, $data);
//        //to pass values to the view
//        $this->load->view('templates/footer', $data);

	}
}
