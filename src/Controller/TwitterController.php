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
    public function index()
    {

        $pathToScript = "/var/www/twitter_ebooks";
        $process = new Process(['node -r esm test.js', $pathToScript]);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        echo $process->getOutput();
    }
}
