<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Process\Process;


class TwitterController extends AbstractController
{
    /**
     * @Route("/start-ebooks", name="twitter")
     */
    public function index(): Response
    {
        $exec = exec('cd /var/www/twitter_ebooks && node -r esm test.js');

        return $this->json([
            'message' => $exec,
        ]);
    }
}
