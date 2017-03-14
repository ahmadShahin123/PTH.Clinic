<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Excerc controller
 */
class Excerc extends Front_Controller
{
    protected $permissionCreate = 'Excerc.Excerc.Create';
    protected $permissionDelete = 'Excerc.Excerc.Delete';
    protected $permissionEdit   = 'Excerc.Excerc.Edit';
    protected $permissionView   = 'Excerc.Excerc.View';

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->lang->load('excerc');
        
        

        Assets::add_module_js('excerc', 'excerc.js');
    }

    /**
     * Display a list of excerc data.
     *
     * @return void
     */
    public function index()
    {
        
        
        
        
        

        Template::render();
    }
    
}