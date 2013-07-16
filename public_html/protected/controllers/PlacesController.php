<?php
class PlacesController extends RestController
{
    public function actionIndex() {
        $this->render('index');
    }

    public function actionList()
    {
        $places = Places::model()->findAll();
        echo CJSON::encode($places);
    }

    public function actionView()
    {
        // TODO: Implement actionView() method.
    }

    public function actionCreate()
    {
        // TODO: Implement actionCreate() method.
    }

    public function actionUpdate()
    {
        // TODO: Implement actionUpdate() method.
    }

    public function actionDelete()
    {
        // TODO: Implement actionDelete() method.
    }
}