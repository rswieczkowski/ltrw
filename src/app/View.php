<?php

namespace App;

use App\Exceptions\ViewNotFoundException;

class View
{

    public function __construct
    (
        protected string $view,
        protected array $params = []
    ) {
    }

    public static function make(string $view, array $params = []): static
    {
        return new static($view, $params);
    }


    public function getLayout(): string
    {
        $layoutFile = VIEW_PATH . '/layout.php';
        ob_start();
        include $layoutFile;
        return (string)ob_get_clean();
    }

    public function getContent(): string
    {
        $viewFile = VIEW_PATH . '/' . $this->view . '.php';

        if (!file_exists($viewFile)) {
            throw new ViewNotFoundException();
        }

        extract($this->params);

        ob_start();
        include $viewFile;
        return (string)ob_get_clean();
    }

    public function render(): string
    {
        $layout = $this->getLayout();
        $content = $this->getContent();

        return str_replace('{{content}}', $content, $layout);
    }


    public function __get(string $name)
    {
        return $this->params[$name] ?? null;
    }

    public function __toString(): string
    {
        return $this->render();
    }


}