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
     * @Route("/magic", name="twitter")
     */
    public function index(): Response
    {
        $datas = [];
        $frames = [];
        $res = [];
        exec('cd /var/www/twitter_ebooks && node -r esm test.js', $datas);

        foreach ($datas as $key => $string) {
            $res['index'] = $key;
            $res['text'] = $string;
            $frames[] = $res;
        }

        return $this->json([
            "frames" => $frames
        ]);
    }
}
