<?php
class AccessCommand extends CConsoleCommand
{
    public function actionAddRules() {
        $auth=Yii::app()->authManager;

        $auth->createOperation('addPlace','создание места');
        $auth->createOperation('viewPlace','просмотр места');
        $auth->createOperation('updatePlace','редактирование места');
        $auth->createOperation('deletePlace','удаление места');
        $auth->createOperation('viewPlaces','просмотр мест');

        $bizRule='return Yii::app()->user->id==$params["place"]->p_user_id;';
        $task=$auth->createTask('viewOwnPlace','просмотр своего места',$bizRule);
        $task->addChild('viewPlace');
        $task=$auth->createTask('updateOwnPlace','редактирование своего места',$bizRule);
        $task->addChild('updatePlace');
        $task=$auth->createTask('deleteOwnPlace','удаление своего места',$bizRule);
        $task->addChild('deletePlace');

        $role=$auth->createRole('user');
        $role->addChild('addPlace');
        $role->addChild('viewOwnPlace');
        $role->addChild('updateOwnPlace');
        $role->addChild('deleteOwnPlace');
        $role->addChild('viewPlaces');
    }

    public function actionAddUsers() {
        $auth=Yii::app()->authManager;

        $user1 = new Users();
        $user1->u_name = 'user_1';
        $user1->u_pass = crypt('111', UserIdentity::blowfishSalt());
        $user1->u_email = 'user_1@site.loc';
        $user1->u_role = 'user';
        $user1->save();
        $auth->assign('user', $user1->id);

        $user2 = new Users();
        $user2->u_name = 'user_2';
        $user2->u_pass = crypt('222', UserIdentity::blowfishSalt());
        $user2->u_email = 'user_2@site.loc';
        $user2->u_role = 'user';
        $user2->save();
        $auth->assign('user', $user2->id);

        $user3 = new Users();
        $user3->u_name = 'user_3';
        $user3->u_pass = crypt('333', UserIdentity::blowfishSalt());
        $user3->u_email = 'user_3@site.loc';
        $user3->u_role = 'user';
        $user3->save();
        $auth->assign('user', $user3->id);
    }
}