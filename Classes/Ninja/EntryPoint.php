<?php

namespace Ninja;

use \Ijdb\IjdbRoutes;
// use \Ninja\Authentication;

class EntryPoint
{
    private $route;
    private $method;
    private $routes;
    private $authentication;
    public function __construct(string $route, string $method, \Ninja\routes $routes)
    {
        $this->route = $route;
        $this->routes = $routes;
        $this->method = $method;
        $this->checkUrl();
        $this->authentication = $routes->getAuthentication();
    }
    private function checkUrl()
    {
        if ($this->route !== strtolower($this->route)) {
            http_response_code(301);
            header('location: ' . strtolower($this->route));
        }
    }
    private function loadTemplate(
        $templateFileName,
        $variables = []
    ) {
        extract($variables);
        ob_start();
        include __DIR__ . '/../../Templates/' . $templateFileName;
        return ob_get_clean();
    }
    public function run()
    {
        $routes = $this->routes->getRoutes();
        if (
            
            isset($routes[$this->route]['login']) &&
            isset($routes[$this->route]['login']) &&
           !$this->authentication->isLoggedIn()
        ) {
            header('location: /login/error');
        } else {
            $controller = $routes[$this->route][$this->method]['controller'];
            $action = $routes[$this->route][$this->method]['action'];
            $page = $controller->$action();
            $title = $page['title'];
            if (isset($page['variables'])) {
                $output = $this->loadTemplate(
                    $page['template'],
                    $page['variables']
                );
            } else {
                $output = $this->loadTemplate($page['template']);
            }
            echo $this->loadTemplate('layout.html.php', ['loggedIn' => $this->authentication->isLoggedIn(),
'output' => $output,
'title' => $title
]);
        }
    }
}
