<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class AccessControlComponent extends Component
{
    private $UserGroups;
    private $GroupRoles;
    private $RoleAccess;

    public function initialize(array $config)
    {
        $this->UserGroups = TableRegistry::getTableLocator()->get('UserGroups');
        $this->GroupRoles = TableRegistry::getTableLocator()->get('GroupRoles');
        $this->RoleAccess = TableRegistry::getTableLocator()->get('RoleAccess');
    }
    public function isAllowed($currentUserId)
    {
        $controller = $this->request->getParam('controller');
        $action = $this->request->getParam('action');
        
        $allowedActions = [
            'login',
            'logout'
        ];
        $readActions = [
            'index',
            'view'
        ];
        $writeActions = [
            'add',
            'edit',
            'delete'
        ];

        if(in_array($action, $allowedActions)){
            return true;
        }
        else if(in_array($action, $readActions)){
            $action = 'read';
        }
        else if(in_array($action, $writeActions)){
            $action = 'write';
        }

        $roleIds = [];
        $userGroups = $this->UserGroups->find('all')->where(['user_id' => $currentUserId]);
        foreach($userGroups as $userGroup){
            $groupId = $userGroup->group_id;
            $groupRoles = $this->GroupRoles->find('all')->where(['group_id' => $groupId]);
            foreach($groupRoles as $groupRole){
                $roleIds[] = $groupRole->role_id;
            }
        }
        $roleIds = array_unique($roleIds);
        $allow = false;
        foreach($roleIds as $roleId){
            $count = $this->RoleAccess->find()->where(['role_id' => $roleId, 'controller' => $controller, 'action' => $action])->count();
            if($count > 0){
                $allow = true;
                break;
            }
        }
        return $allow;
    }
}
