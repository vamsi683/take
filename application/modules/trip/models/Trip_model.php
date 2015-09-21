<?php defined('BASEPATH') || exit('No direct script access allowed');
/**
 * Bonfire
 *
 * An open source project to allow developers to jumpstart their development of
 * CodeIgniter applications.
 *
 * @package   Bonfire
 * @author    Bonfire Dev Team
 * @copyright Copyright (c) 2011 - 2015, Bonfire Dev Team
 * @license   http://opensource.org/licenses/MIT
 * @link      http://cibonfire.com
 * @since     Version 1.0
 * @filesource
 */

/**
 * User Model.
 *
 * The central way to access and perform CRUD on users.
 *
 * @package Bonfire\Modules\Users\Models\User_model
 * @author  Bonfire Dev Team
 * @link    http://cibonfire.com/docs/developer
 */
class Trip_model extends BF_Model
{
    /** @var string Name of the users table. */
    protected $table_name = 'trips';

    /** @var string Name of the roles table. */
    protected $roles_table = 'roles';

    /** @var boolean Use soft deletes or not. */
    protected $soft_deletes = true;

    /** @var string The date format to use. */
    protected $date_format = 'datetime';

    /** @var boolean Set the modified time automatically. */
    protected $set_modified = false;

    /** @var boolean Skip the validation. */
    protected $skip_validation = true;

    //--------------------------------------------------------------------------

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    //--------------------------------------------------------------------------
    // CRUD Method Overrides.
    //--------------------------------------------------------------------------

    /**
     * Count the users in the system.
     *
     * @param boolean $get_deleted If true, count users which have been deleted,
     * else count users which have not been deleted.
     *
     * @return integer The number of users found.
     */
    public function count_all($get_deleted = false)
    {
        if ($get_deleted) {
            // Get only the deleted users
            $this->db->where("{$this->table_name}.deleted !=", 0);
        } else {
            $this->db->where("{$this->table_name}.deleted", 0);
        }

        return $this->db->count_all_results($this->table_name);
    }

    /**
     * Perform a standard delete, but also allow a record to be purged.
     *
     * @param integer $id    The ID of the user to delete.
     * @param boolean $purge If true, the account will be purged from the system.
     * If false, performs a standard delete (with soft-deletes enabled).
     *
     * @return boolean True on success, else false.
     */
    public function delete($id = 0, $purge = false)
    {
        // Temporarily store the current setting for soft-deletes.
        $tempSoftDeletes = $this->soft_deletes;
        if ($purge === true) {
            // Temporarily set the soft_deletes to false to purge the account.
            $this->soft_deletes = false;
        }

        // Reset soft-deletes after deleting the account.
        $result = parent::delete($id);
        $this->soft_deletes = $tempSoftDeletes;

        return $result;
    }

    /**
     * Find a user's record and role information.
     *
     * @param integer $id The user's ID.
     *
     * @return boolean|object An object with the user's information.
     */
    public function find($id = null)
    {
       

        return parent::find($id);
    }

    /**
     * Find all user records and the associated role information.
     *
     * @return boolean An array of objects with each user's information.
     */
    public function find_all()
    {

        return parent::find_all();
    }

    /**
     * Find a single user based on a field/value match, including role information.
     *
     * @param string $field The field to match. If 'both', attempt to find a user
     * with the $value field matching either the username or email.
     * @param string $value The value to search for.
     * @param string $type  The type of where clause to create ('and' or 'or').
     *
     * @return boolean|object An object with the user's info, or false on failure.
     */
    public function find_by($field = null, $value = null, $type = 'and')
    {

        return parent::find_by($field, $value, $type);
    }

    /**
     * Create a new user in the database.
     *
     * @param array $data An array of user information. 'password' and either 'email'
     * or 'username' are required, depending on the 'auth.use_usernames' setting.
     * 'email' or 'username' must be unique. If 'role_id' is not included, the default
     * role from the Roles model will be assigned.
     *
     * @return boolean|integer The ID of the new user on success, else false.
     */
    public function insert($data = array())
    {
        

        $id = parent::insert($data);
        return $id;
    }

    /**
     * Update an existing user. Before saving, it will:
     * - Generate a new password/hash if both password and pass_confirm are provided.
     * - Store the country code.
     *
     * @param integer $id   The user's ID.
     * @param array $data An array of key/value pairs to update for the user.
     *
     * @return boolean True if the update succeeded, null on invalid $id, or false
     * on failure.
     */
    public function update($id = null, $data = array())
    {
        if (empty($id)) {
            return null;
        }

        $result = parent::update($id, $data);

        return $result;
    }

    //--------------------------------------------------------------------------
    // Other BF_Model Method Overrides.
    //--------------------------------------------------------------------------

    
}
//end User_model
