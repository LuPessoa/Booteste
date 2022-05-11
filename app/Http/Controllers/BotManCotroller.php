<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use Botman\BotMan\Messages\Incoming\Answer;

class BotManCotroller extends Controller
{
    public function handle()
    {
        $botman = app("botman");

        $botman->hears("{message}", function ($botman, $message)
        {
            if ($message == "Oi") {
                $this->askName($botman);
            }
            else
            {
               $botman->replay("OLA COMO VAI");
            }
        });
        $botman->listen();
    }


    public function askName($botman)
    {
        $botman->ask("Hello what is your name", function (Answer $answer) {
            $name = $answer->getText();
            $this->say("Nice to meet you". $name);

        });
    }
}
