<?php


abstract class Controller
{
    protected $urlArgs;
    protected $request;

    public function __construct(Request $req, Array $urlArgs)
    {
        $this->request = $req;
        $this->urlArgs = $urlArgs;
    }
}
