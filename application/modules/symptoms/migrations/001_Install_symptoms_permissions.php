<?php defined('BASEPATH') || exit('No direct script access allowed');

class Migration_Install_symptoms_permissions extends Migration
{
	/**
	 * @var array Permissions to Migrate
	 */
	private $permissionValues = array(
		array(
			'name' => 'Symptoms.Content.View',
			'description' => 'View Symptoms Content',
			'status' => 'active',
		),
		array(
			'name' => 'Symptoms.Content.Create',
			'description' => 'Create Symptoms Content',
			'status' => 'active',
		),
		array(
			'name' => 'Symptoms.Content.Edit',
			'description' => 'Edit Symptoms Content',
			'status' => 'active',
		),
		array(
			'name' => 'Symptoms.Content.Delete',
			'description' => 'Delete Symptoms Content',
			'status' => 'active',
		),
		array(
			'name' => 'Symptoms.Reports.View',
			'description' => 'View Symptoms Reports',
			'status' => 'active',
		),
		array(
			'name' => 'Symptoms.Reports.Create',
			'description' => 'Create Symptoms Reports',
			'status' => 'active',
		),
		array(
			'name' => 'Symptoms.Reports.Edit',
			'description' => 'Edit Symptoms Reports',
			'status' => 'active',
		),
		array(
			'name' => 'Symptoms.Reports.Delete',
			'description' => 'Delete Symptoms Reports',
			'status' => 'active',
		),
		array(
			'name' => 'Symptoms.Settings.View',
			'description' => 'View Symptoms Settings',
			'status' => 'active',
		),
		array(
			'name' => 'Symptoms.Settings.Create',
			'description' => 'Create Symptoms Settings',
			'status' => 'active',
		),
		array(
			'name' => 'Symptoms.Settings.Edit',
			'description' => 'Edit Symptoms Settings',
			'status' => 'active',
		),
		array(
			'name' => 'Symptoms.Settings.Delete',
			'description' => 'Delete Symptoms Settings',
			'status' => 'active',
		),
		array(
			'name' => 'Symptoms.Developer.View',
			'description' => 'View Symptoms Developer',
			'status' => 'active',
		),
		array(
			'name' => 'Symptoms.Developer.Create',
			'description' => 'Create Symptoms Developer',
			'status' => 'active',
		),
		array(
			'name' => 'Symptoms.Developer.Edit',
			'description' => 'Edit Symptoms Developer',
			'status' => 'active',
		),
		array(
			'name' => 'Symptoms.Developer.Delete',
			'description' => 'Delete Symptoms Developer',
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