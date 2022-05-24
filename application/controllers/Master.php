<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Examples2 extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');

        $this->load->library('grocery_CRUD');
    }

    public function _example_output($output = null)
    {
        $this->load->view('example2.php', (array) $output);
    }

    public function offices()
    {
        $output = $this->grocery_crud->render();

        $this->_example_output($output);
    }

    public function index()
    {

        $this->_example_output((object) array('output' => '', 'js_files' => array(), 'css_files' => array()));
    }

    public function Author()
    {

        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('author');
            $crud->set_subject('Author');
            $crud->required_fields('fullname', 'email');
            $crud->columns('author_id','fullname', 'email');

            $output = $crud->render();

            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function Bookcategory()
    {

        $crud = new grocery_CRUD();

        $crud->set_theme('datatables');
        $crud->set_table('book_category');
        $crud->set_subject('Bookcategory');
        $crud->required_fields('name');
        $crud->columns('book_category_id', 'name');

        $output = $crud->render();

        $this->_example_output($output);
        
    }

    public function Level()
    {

        $crud = new grocery_CRUD();

        $crud->set_theme('datatables');
        $crud->set_table('level');
        $crud->set_subject('Level');
        $crud->required_fields('name');
        $crud->columns('level_id', 'name');

        $output = $crud->render();

        $this->_example_output($output);
        
    }

    public function Supplier()
    {

        $crud = new grocery_CRUD();

        $crud->set_theme('datatables');
        $crud->set_table('supplier');
        $crud->set_subject('Supplier');
        $crud->required_fields('name', 'phone', 'address');
        $crud->columns('supplier_id', 'name', 'email', 'phone', 'address');

        $output = $crud->render();

        $this->_example_output($output);
        
    }


    public function Customer()
    {

        $crud = new grocery_CRUD();

        $crud->set_theme('datatables');
        $crud->set_table('customer');
        $crud->set_subject('Customer');
        $crud->required_fields('name', 'email', 'phone', 'gender', 'address');
        $crud->columns('name', 'email', 'no_member', 'phone', 'gender', 'address');

        $output = $crud->render();

        $this->_example_output($output);
        
    }

    public function Book()
    {
        if ($this->session->userdata('employee_id') != null) {
            $crud = new grocery_CRUD();

            $crud->set_table('book');

            $crud->set_relation_n_n('author', 'book_author', 'author', 'book_id', 'author_id', 'fullname');
            $crud->set_relation_n_n('category', 'book_bookcat', 'book_category', 'book_id', 'book_category_id', 'name');
            $crud->set_subject('book');
            $crud->columns('title', 'author', 'category', 'description', 'release_year', 'pages', 'price', 'stock');
            $output = $crud->render();
            $this->_master_output();
        } else {
            echo '<script language=JavaScript>alert("Anda Bukan Employee, Silahkan Login") onclick=location.href="../auth/Employee"</script';
        }
    }
}