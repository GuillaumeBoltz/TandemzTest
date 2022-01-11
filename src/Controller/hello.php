<?php

namespace App\Controller;

use App\Taxes\Calculator;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class hello
{
    protected $calculator;

    public function __construct(Calculator $calculator)
    {
        $this->calculator = $calculator;
    }

    /**
     * @Route("/hello/{suite?World}", name="hello")
     */
    public function hello(Request $request, $suite, LoggerInterface $logger, Calculator $calculator)
    {
        $logger->info("Mon message de log !");

        $tva = $calculator->calcul(100);
        dump($tva);

        return new Response("hello $suite");
    }
}
