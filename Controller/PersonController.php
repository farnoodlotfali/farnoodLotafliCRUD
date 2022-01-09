<?php

namespace CRUD\Controller;

use CRUD\Helper\PersonHelper;
use CRUD\Model\Actions;

class PersonController
{
    public function switcher($uri, $request)
    {

        switch ($uri) {

            case Actions::CREATE:
                $this->createAction($request);
                break;
            case Actions::UPDATE:
                $this->updateAction($request);
                break;
            case Actions::READ:
                echo "READ";
                $this->readAction($request);
                break;
            case Actions::READ_ALL:
                $this->readAllAction($request);
                break;
            case Actions::DELETE:
                $this->deleteAction($request);
                break;
            default:
                echo "default";
                break;
        }
    }

    public function createAction($request)
    {
        $PersonHelper = new PersonHelper();

        $PersonHelper->insert();

    }

    public function updateAction($request)
    {
        $PersonHelper = new PersonHelper();
        $PersonHelper->update();

    }

    public function readAction($request)
    {

        echo "readAction";
        echo $request['id'];
        echo $_GET['id'];
        $PersonHelper = new PersonHelper();

        $PersonHelper->fetch($request['id']);

    }
    public function readAllAction($request)
    {
        echo "readAllAction";
        $PersonHelper = new PersonHelper();

        $PersonHelper->fetchAll();

    }

    public function deleteAction($request)
    {
        $PersonHelper = new PersonHelper();
        $PersonHelper->delete();
        echo "deleteAction";

    }

}
