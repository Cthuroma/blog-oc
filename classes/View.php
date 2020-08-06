<?php


class View
{

    private $page;

    public function __construct($page = null)
    {
        $this->page = $page;
    }

    public function render($params = array())
    {
        extract($params);

        $page = $this->page;
        ob_start();
        include(VIEWS.$page.'.php');
        $pageContent = ob_get_clean();
        include_once (VIEWS.'template.php');
    }

    public function redirect($route)
    {
        header("Location: ".HOST.$route);
        exit;
    }

}
