<?php defined('BASEPATH') || exit('No direct script access allowed');

class Articles_model extends BF_Model
{
    protected $table_name	= 'bf_articles';
	protected $key			= 'article_id';
	protected $date_format	= 'datetime';

	protected $log_user 	= false;
	protected $set_created	= false;
	protected $set_modified = false;
	protected $soft_deletes	= true;

    protected $deleted_field     = 'deleted';

	// Customize the operations of the model without recreating the insert,
    // update, etc. methods by adding the method names to act as callbacks here.
	protected $before_insert 	= array();
	protected $after_insert 	= array();
	protected $before_update 	= array();
	protected $after_update 	= array();
	protected $before_find 	    = array();
	protected $after_find 		= array();
	protected $before_delete 	= array();
	protected $after_delete 	= array();

	// For performance reasons, you may require your model to NOT return the id
	// of the last inserted row as it is a bit of a slow method. This is
    // primarily helpful when running big loops over data.
	protected $return_insert_id = true;

	// The default type for returned row data.
	protected $return_type = 'object';

	// Items that are always removed from data prior to inserts or updates.
	protected $protected_attributes = array();

	// You may need to move certain rules (like required) into the
	// $insert_validation_rules array and out of the standard validation array.
	// That way it is only required during inserts, not updates which may only
	// be updating a portion of the data.
	protected $validation_rules 		= array(
		array(
			'field' => 'title',
			'label' => 'lang:articles_field_title',
			'rules' => 'required|max_length[255]',
		),
		array(
			'field' => 'description',
			'label' => 'lang:articles_field_description',
			'rules' => 'required',
		),
		array(
			'field' => 'about_us',
			'label' => 'lang:articles_field_about_us',
			'rules' => 'max_length[1]',
		),
		array(
			'field' => 'video',
			'label' => 'lang:articles_field_video',
			'rules' => 'max_length[255]',
		),
		array(
			'field' => 'image',
			'label' => 'lang:articles_field_image',
			'rules' => 'required|max_length[255]',
		),
		array(
			'field' => 'deleted',
			'label' => 'lang:articles_field_deleted',
			'rules' => 'max_length[1]',
		),
		array(
			'field' => 'deleted_by',
			'label' => 'lang:articles_field_deleted_by',
			'rules' => 'max_length[11]',
		),
		array(
			'field' => 'created_on',
			'label' => 'lang:articles_field_created_on',
			'rules' => '',
		),
		array(
			'field' => 'created_by',
			'label' => 'lang:articles_field_created_by',
			'rules' => 'max_length[11]',
		),
		array(
			'field' => 'modified_on',
			'label' => 'lang:articles_field_modified_on',
			'rules' => '',
		),
		array(
			'field' => 'modified_by',
			'label' => 'lang:articles_field_modified_by',
			'rules' => 'max_length[11]',
		),
	);
	protected $insert_validation_rules  = array();
	protected $skip_validation 			= false;

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
}