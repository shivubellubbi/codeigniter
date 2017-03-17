# GenralModel
# how to use
 copy file GenralModel.php in your model directory i.e Application/model/
  GenralModel.php file in controler constructer or autoload in config folder file autoload.php.
 ex: $autoload['model'] = array('GenralModel'); //here my helper file name GenralModel.php
 
1) call is_logged_in() function in your controller

  Ex: Cotroller Offers.php.

      <?php
        defined('BASEPATH') OR exit('No direct script access allowed');
        
        class Offers extends CI_Controller {
        
            private $tbl_name = 'tbl_name';
	           private $id_name  = 'id_name';
            
            function __construct() {
              parent::__construct();
              date_default_timezone_set('Asia/Calcutta');
              $this->load->library('upload');
              $this->load->model('GenralModel'); // you can avoid it if you auto loaded
              $this->load->library('session');
              is_logged_in();
            } 
            
            public function index() {
               $data['offers'] = $this->GenralModel->getAll($this->tbl_name);
               $this->load->view('admin/offers/index.php', $data);
              }
            public function store() {
               $this->GenralModel->store($this->tbl_name);
            }
          }
       ?>
       
2) then in view call it where ever it required.

  Ex: header.php.
  
  
       here: <?=$someveriable?> is same as <?php echo $someveriable ?>
       <li class="<?=addActiveClass('contact')?>"> <a href="<?=base_url()?>Sitetwo/contact">Contact Us</a></li>
