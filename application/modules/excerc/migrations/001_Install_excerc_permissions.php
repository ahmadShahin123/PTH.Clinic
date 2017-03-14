<?php defined('BASEPATH') || exit('No direct script access allowed');

class Migration_Install_excerc_permissions extends Migration
{
	/**
	 * @var array Permissions to Migrate
	 */
	private $permissionValues = array(
		array(
			'name' => 'Excerc.Content.View',
			'description' => 'View Excerc Content',
			'status' => 'active',
		),
		array(
			'name' => 'Excerc.Content.Create',
			'description' => 'Create Excerc Content',
			'status' => 'active',
		),
		array(
			'name' => 'Excerc.Content.Edit',
			'description' => 'Edit Excerc Content',
			'status' => 'active',
		),
		array(
			'name' => 'Excerc.Content.Delete',
			'description' => 'Delete Excerc Content',
			'status' => 'active',
		),
		array(
			'name' => 'Excerc.Reports.View',
			'description' => 'View Excerc Reports',
			'status' => 'active',
		),
		array(
			'name' => 'Excerc.Reports.Create',
			'description' => 'Create Excerc Reports',
			'status' => 'active',
		),
		array(
			'name' => 'Excerc.Reports.Edit',
			'description' => 'Edit Excerc Reports',
			'status' => 'active',
		),
		array(
			'name' => 'Excerc.Reports.Delete',
			'description' => 'Delete Excerc Reports',
			'status' => 'active',
		),
		array(
			'name' => 'Excerc.Settings.View',
			'description' => 'View Excerc Settings',
			'status' => 'active',
		),
		array(
			'name' => 'Excerc.Settings.Create',
			'description' => 'Create Excerc Settings',
			'status' => 'active',
		),
		array(
			'name' => 'Excerc.Settings.Edit',
			'description' => 'Edit Excerc Settings',
			'status' => 'active',
		),
		array(
			'name' => 'Excerc.Settings.Delete',
			'description' => 'Delete Excerc Settings',
			'status' => 'active',
		),
		array(
			'name' => 'Excerc.Developer.View',
			'description' => 'View Excerc Developer',
			'status' => 'active',
		),
		array(
			'name' => 'Excerc.Developer.Create',
			'description' => 'Create Excerc Developer',
			'status' => 'active',
		),
		array(
			'name' => 'Excerc.Developer.Edit',
			'description' => 'Edit Excerc Developer',
			'status' => 'active',
		),
		array(
			'name' => 'Excerc.Developer.Delete',
			'description' => 'Delete Excerc Developer',
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