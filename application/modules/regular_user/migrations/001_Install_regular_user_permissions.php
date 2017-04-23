<?php defined('BASEPATH') || exit('No direct script access allowed');

class Migration_Install_regular_user_permissions extends Migration
{
	/**
	 * @var array Permissions to Migrate
	 */
	private $permissionValues = array(
		array(
			'name' => 'Regular_user.Content.View',
			'description' => 'View Regular_user Content',
			'status' => 'active',
		),
		array(
			'name' => 'Regular_user.Content.Create',
			'description' => 'Create Regular_user Content',
			'status' => 'active',
		),
		array(
			'name' => 'Regular_user.Content.Edit',
			'description' => 'Edit Regular_user Content',
			'status' => 'active',
		),
		array(
			'name' => 'Regular_user.Content.Delete',
			'description' => 'Delete Regular_user Content',
			'status' => 'active',
		),
		array(
			'name' => 'Regular_user.Reports.View',
			'description' => 'View Regular_user Reports',
			'status' => 'active',
		),
		array(
			'name' => 'Regular_user.Reports.Create',
			'description' => 'Create Regular_user Reports',
			'status' => 'active',
		),
		array(
			'name' => 'Regular_user.Reports.Edit',
			'description' => 'Edit Regular_user Reports',
			'status' => 'active',
		),
		array(
			'name' => 'Regular_user.Reports.Delete',
			'description' => 'Delete Regular_user Reports',
			'status' => 'active',
		),
		array(
			'name' => 'Regular_user.Settings.View',
			'description' => 'View Regular_user Settings',
			'status' => 'active',
		),
		array(
			'name' => 'Regular_user.Settings.Create',
			'description' => 'Create Regular_user Settings',
			'status' => 'active',
		),
		array(
			'name' => 'Regular_user.Settings.Edit',
			'description' => 'Edit Regular_user Settings',
			'status' => 'active',
		),
		array(
			'name' => 'Regular_user.Settings.Delete',
			'description' => 'Delete Regular_user Settings',
			'status' => 'active',
		),
		array(
			'name' => 'Regular_user.Developer.View',
			'description' => 'View Regular_user Developer',
			'status' => 'active',
		),
		array(
			'name' => 'Regular_user.Developer.Create',
			'description' => 'Create Regular_user Developer',
			'status' => 'active',
		),
		array(
			'name' => 'Regular_user.Developer.Edit',
			'description' => 'Edit Regular_user Developer',
			'status' => 'active',
		),
		array(
			'name' => 'Regular_user.Developer.Delete',
			'description' => 'Delete Regular_user Developer',
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