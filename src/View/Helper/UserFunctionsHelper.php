<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;
use Cake\ORM\TableRegistry;

/**
 * UserFunctions helper
 */
class UserFunctionsHelper extends Helper
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public $helpers = ['Html'];

    public function getUserDisplayNameWithLink($userId = null)
    {
        if (empty($userId)) {
            return '';
        }
        $Users = TableRegistry::getTableLocator()->get('Users');
        $user = $Users->get($userId);        
        return $this->Html->link($user->first_name . " " . $user->middle_name . " " . $user->last_name, ['controller' => 'Users', 'action' => 'view', $userId]);
    }
    public function getUserDetails($id = null){
        $user = [];
        if(!empty($id)){
            $Users = TableRegistry::getTableLocator()->get('Users');
            $user = $Users->get($id)->toArray();
        }
        return $user;
    }
}
