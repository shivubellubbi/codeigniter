# Codeigniter
my own helper and libraray files for #PHP codeigniter framework
1) is_logged_in Sesson check for logged in user.
2) bootstrap active class

# how to use
 load helper file in controler constructer or autoload in config folder file autoload.php.
 ex: $autoload['helper'] = array('url', 'my'); //here my helper file name is my_helper.php 
 
1) call is_logged_in() function in your controller

  Ex: 
    <?php
        defined('BASEPATH') OR exit('No direct script access allowed');
        class Contact_us extends CI_Controller {
            function __construct() {
              parent::__construct();
              date_default_timezone_set('Asia/Calcutta');
              $this->load->library('upload');
              $this->load->model('GenralModel');
              $this->load->library('session');
              is_logged_in();

            }
            public function index() {
              if (!$this->GenralModel->getAll($this->tbl_name)) {
                $this->load->view('admin/contactus/cms/contactus.php');
                return;
              } else {
                $this->edit();
              }
              //$this->load->view('admin/about/index.php');
            }
          }

2) then in view call it where ever it required.

  Ex: <li class="<?=addActiveClass('contact')?>"> <a href="<?=base_url()?>Sitetwo/contact">Contact Us</a></li>
