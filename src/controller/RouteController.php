<?php

namespace src\controller;

use src\controller\ScopeController;

abstract class RouteController {

    public static function redirect(string $viewName, array $scope = null)
    {
        if ($scope !== null) {
            ScopeController::getInstance()->add($scope);
        }
        header("Location: ".$viewName.".php");
    }
}