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
        $datas = [];
        exec('cd /var/www/twitter_ebooks && node -r esm test.js', $frames);

        $frames = [];

        foreach ($datas as $key => $string) {
            $frames['index'] = $key;
            $frames['text'] = $string;
        }

        return $this->json([
            $frames
        ]);
    }
}
