<?php
class AccessCommand extends CConsoleCommand
{
    public function actionAddRules() {
        $auth=Yii::app()->authManager;

        $auth->createOperation('addPlace','create place');
        $auth->createOperation('viewPlace','view place');
        $auth->createOperation('updatePlace','update place');
        $auth->createOperation('deletePlace','delete place');
        $auth->createOperation('viewPlaces','view places');

        $auth->createOperation('addUser','create user');
        $auth->createOperation('viewUser','view user');
        $auth->createOperation('updateUser','update user');
        $auth->createOperation('deleteUser','delete user');
        $auth->createOperation('viewUsers','view users');

        $bizRule='return Yii::app()->user->id==$params["place"]->p_user_id;';
        $task=$auth->createTask('viewOwnPlace', 'view own place', $bizRule);
        $task->addChild('viewPlace');
        $task=$auth->createTask('updateOwnPlace', 'edit own place', $bizRule);
        $task->addChild('updatePlace');
        $task=$auth->createTask('deleteOwnPlace', 'delete own place', $bizRule);
        $task->addChild('deletePlace');

        $role=$auth->createRole('user');
        $role->addChild('addPlace');
        $role->addChild('viewOwnPlace');
        $role->addChild('updateOwnPlace');
        $role->addChild('deleteOwnPlace');
        $role->addChild('viewPlaces');

        $role=$auth->createRole('admin');
        $role->addChild('user');
        $role->addChild('addUser');
        $role->addChild('viewUser');
        $role->addChild('updateUser');
        $role->addChild('deleteUser');
        $role->addChild('viewUsers');
    }

    public function actionAddAdminUser() {
        $auth=Yii::app()->authManager;

        $user = new Users();
        $user->u_name = 'admin';
        $user->u_pass = 'admin';
        $user->u_email = 'admin@site.loc';
        $user->u_role = 'admin';
        $user->save();
    }
}