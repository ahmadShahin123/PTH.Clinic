<?php defined('BASEPATH') || exit('No direct script access allowed');

class Migration_Install_articles_permissions extends Migration
{
	/**
	 * @var array Permissions to Migrate
	 */
	private $permissionValues = array(
		array(
			'name' => 'Articles.Content.View',
			'description' => 'View Articles Content',
			'status' => 'active',
		),
		array(
			'name' => 'Articles.Content.Create',
			'description' => 'Create Articles Content',
			'status' => 'active',
		),
		array(
			'name' => 'Articles.Content.Edit',
			'description' => 'Edit Articles Content',
			'status' => 'active',
		),
		array(
			'name' => 'Articles.Content.Delete',
			'description' => 'Delete Articles Content',
			'status' => 'active',
		),
		array(
			'name' => 'Articles.Reports.View',
			'description' => 'View Articles Reports',
			'status' => 'active',
		),
		array(
			'name' => 'Articles.Reports.Create',
			'description' => 'Create Articles Reports',
			'status' => 'active',
		),
		array(
			'name' => 'Articles.Reports.Edit',
			'description' => 'Edit Articles Reports',
			'status' => 'active',
		),
		array(
			'name' => 'Articles.Reports.Delete',
			'description' => 'Delete Articles Reports',
			'status' => 'active',
		),
		array(
			'name' => 'Articles.Settings.View',
			'description' => 'View Articles Settings',
			'status' => 'active',
		),
		array(
			'name' => 'Articles.Settings.Create',
			'description' => 'Create Articles Settings',
			'status' => 'active',
		),
		array(
			'name' => 'Articles.Settings.Edit',
			'description' => 'Edit Articles Settings',
			'status' => 'active',
		),
		array(
			'name' => 'Articles.Settings.Delete',
			'description' => 'Delete Articles Settings',
			'status' => 'active',
		),
		array(
			'name' => 'Articles.Developer.View',
			'description' => 'View Articles Developer',
			'status' => 'active',
		),
		array(
			'name' => 'Articles.Developer.Create',
			'description' => 'Create Articles Developer',
			'status' => 'active',
		),
		array(
			'name' => 'Articles.Developer.Edit',
			'description' => 'Edit Articles Developer',
			'status' => 'active',
		),
		array(
			'name' => 'Articles.Developer.Delete',
			'description' => 'Delete Articles Developer',
			'status' => 'active',
		),
    );

    /**
     * @var string The name of the permission key in the role_permissions table
     */
    private $permissionKey = 'permission_id';

    /**
     * @var string The name of the permission name field in the permissions table
     */
    private $permissionNameField = 'name';

	/**
	 * @var string The name of the role/permissions ref table
	 */
	private $rolePermissionsTable = 'role_permissions';

    /**
     * @var numeric The role id to which the permissions will be applied
     */
    private $roleId = '1';

    /**
     * @var string The name of the role key in the role_permissions table
     */
    private $roleKey = 'role_id';

	/**
	 * @var string The name of the permissions table
	 */
	private $tableName = 'permissions';

	//--------------------------------------------------------------------

	/**
	 * Install this version
	 *
	 * @return void
	 */
	public function up()
	{
		$rolePermissionsData = array();
		foreach ($this->permissionValues as $permissionValue) {
			$this->db->insert($this->tableName, $permissionValue);

			$rolePermissionsData[] = array(
                $this->roleKey       => $this->roleId,
                $this->permissionKey => $this->db->insert_id(),
			);
		}

		$this->db->insert_batch($this->rolePermissionsTable, $rolePermissionsData);
	}

	/**
	 * Uninstall this version
	 *
	 * @return void
	 */
	public function down()
	{
        $permissionNames = array();
		foreach ($this->permissionValues as $permissionValue) {
            $permissionNames[] = $permissionValue[$this->permissionNameField];
        }

        $query = $this->db->select($this->permissionKey)
                          ->where_in($this->permissionNameField, $permissionNames)
                          ->get($this->tableName);

        if ( ! $query->num_rows()) {
            return;
        }

        $permissionIds = array();
        foreach ($query->result() as $row) {
            $permissionIds[] = $row->{$this->permissionKey};
        }

        $this->db->where_in($this->permissionKey, $permissionIds)
                 ->delete($this->rolePermissionsTable);

        $this->db->where_in($this->permissionNameField, $permissionNames)
                 ->delete($this->tableName);
	}
}