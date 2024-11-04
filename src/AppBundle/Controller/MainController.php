<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

class MainController extends AbstractController
{
    public function homepageAction(): Response
    {
        return $this->render('@App/Main/homepage.html.twig');
    }

    public function sseAction(): Response
    {
        $response = new StreamedResponse(function () {
            while (true) {
                // Generate the current time or any other data you want to send
                $time = date('H:i:s');

                // Format data as an SSE event
                echo "data: Server time: {$time}\n\n";

                // Flush the output to send the message immediately
                ob_flush();
                flush();

                // Delay next message by 1 second
                sleep(1);
            }
        });

        // Set headers to ensure proper handling of SSE
        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('Cache-Control', 'no-cache');
        $response->headers->set('Connection', 'keep-alive');
        $response->headers->set('X-Accel-Buffering', 'no'); // Important for some proxies

        return $response;
    }
}
