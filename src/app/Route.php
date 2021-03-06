<?php

namespace src\app;

use src\app\UserMessage;
use src\controller\ScopeController;

abstract class Route {

    public static function redirect(string $viewName, array $scope = null, UserMessage $userMessage = null)
    {
        if ($scope !== null) {
            ScopeController::getInstance()->add($scope);
        }
        if ($userMessage != null) {
            $userMessage->add();
        }
        header("Location: ".$viewName.".php");
    }
}