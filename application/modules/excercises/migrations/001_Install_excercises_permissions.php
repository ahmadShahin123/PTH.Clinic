<?php defined('BASEPATH') || exit('No direct script access allowed');

class Migration_Install_excercises_permissions extends Migration
{
	/**
	 * @var array Permissions to Migrate
	 */
	private $permissionValues = array(
		array(
			'name' => 'Excercises.Content.View',
			'description' => 'View Excercises Content',
			'status' => 'active',
		),
		array(
			'name' => 'Excercises.Content.Create',
			'description' => 'Create Excercises Content',
			'status' => 'active',
		),
		array(
			'name' => 'Excercises.Content.Edit',
			'description' => 'Edit Excercises Content',
			'status' => 'active',
		),
		array(
			'name' => 'Excercises.Content.Delete',
			'description' => 'Delete Excercises Content',
			'status' => 'active',
		),
		array(
			'name' => 'Excercises.Reports.View',
			'description' => 'View Excercises Reports',
			'status' => 'active',
		),
		array(
			'name' => 'Excercises.Reports.Create',
			'description' => 'Create Excercises Reports',
			'status' => 'active',
		),
		array(
			'name' => 'Excercises.Reports.Edit',
			'description' => 'Edit Excercises Reports',
			'status' => 'active',
		),
		array(
			'name' => 'Excercises.Reports.Delete',
			'description' => 'Delete Excercises Reports',
			'status' => 'active',
		),
		array(
			'name' => 'Excercises.Settings.View',
			'description' => 'View Excercises Settings',
			'status' => 'active',
		),
		array(
			'name' => 'Excercises.Settings.Create',
			'description' => 'Create Excercises Settings',
			'status' => 'active',
		),
		array(
			'name' => 'Excercises.Settings.Edit',
			'description' => 'Edit Excercises Settings',
			'status' => 'active',
		),
		array(
			'name' => 'Excercises.Settings.Delete',
			'description' => 'Delete Excercises Settings',
			'status' => 'active',
		),
		array(
			'name' => 'Excercises.Developer.View',
			'description' => 'View Excercises Developer',
			'status' => 'active',
		),
		array(
			'name' => 'Excercises.Developer.Create',
			'description' => 'Create Excercises Developer',
			'status' => 'active',
		),
		array(
			'name' => 'Excercises.Developer.Edit',
			'description' => 'Edit Excercises Developer',
			'status' => 'active',
		),
		array(
			'name' => 'Excercises.Developer.Delete',
			'description' => 'Delete Excercises Developer',
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