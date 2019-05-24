<?php
/*
COMPONENT RESPONSIBLE FOR ACL
*/
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
        //GET CONTROLLER AND ACTION FROM REQUEST
        $controller = $this->request->getParam('controller');
        $action = $this->request->getParam('action');
        
        //ACTIONS THAT MUST BE ALLOWED FOR EVERY USERS
        $allowedActions = [
            'login',
            'logout'
        ];

        //CAKE CLASS ACTIONS THAT REQUIRES READ PERMISSION
        $readActions = [
            'index',
            'view'
        ];

        //CAKE CLASS ACTIONS THAT REQUIRES WRITE PERMISSION
        $writeActions = [
            'add',
            'edit',
            'delete'
        ];

        //RETURN TRUE IF ACTION IS ONE OF ALLOWED ACTIONS
        if(in_array($action, $allowedActions)){
            return true;
        }
        //SET ACTION TO READ IF IT IS ONE OF READ ACTIONS
        else if(in_array($action, $readActions)){
            $action = 'read';
        }
        //SET ACTION TO WRITE IF IT IS ONE OF WRITE ACTIONS
        else if(in_array($action, $writeActions)){
            $action = 'write';
        }

        //VARIABLE TO STORE ROLES OF THE CURRENT USER
        $roleIds = [];

        //GET GROUPS OF THE CURRENT USER
        $userGroups = $this->UserGroups->find('all')->where(['user_id' => $currentUserId]);
        //ITERATE TROUCH EACH USER GROUP
        foreach($userGroups as $userGroup){
            $groupId = $userGroup->group_id;
            //GET ROLES ASSOCIATED TO THIS GROUP
            $groupRoles = $this->GroupRoles->find('all')->where(['group_id' => $groupId]);
            //ITERATE THROUGH EACH ROLE
            foreach($groupRoles as $groupRole){
                //IF ROLE ID IS NOT ALREADY IN ARRAY THEN PUSH IT IN ARRAY OF ROLE IDs
                if(!in_array($groupRole->role_id, $roleIds))
                    $roleIds[] = $groupRole->role_id;                
            }
        }

        //FLAG TO RETURN IF USER HAS ACCESS TO REQUESTED RESOURCE OR NOT
        $allow = false;

        //ITERATE THROUGH EACH ROLE ID
        foreach($roleIds as $roleId){
            //CHECK IF ROLE IS ASSOCIATED WITH REQUESTED RESOURCE
            $count = $this->RoleAccess->find()->where(['role_id' => $roleId, 'controller' => $controller, 'action' => $action])->count();
            if($count > 0){
                $allow = true;
                break;
            }
        }
        return $allow;
    }
}
