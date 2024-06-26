<?php

class Erreur extends Controller
{
    protected $exception;

    public function __construct(Exception $e)
    {
        $this->exception = $e;
    }

    public function index()
    {
        $scriptJS = "$(document).ready(function() {
            $('.btn').each(function() {
                $(this).removeClass('btn-info');
                $(this).removeClass('btn-secondary');
                $(this).addClass('btn-info');
            });
        })";

        $message = $this->getCustomErrorMessage();

        $this->render('index', compact('message', 'scriptJS'));
    }

    private function getCustomErrorMessage()
    {
        $errorCode = $this->exception->getCode();
        // à la base quand je voulais supprimer un élément lié à des clés étrangères, il me disait
        // SQLSTATE[23000]: Integrity constraint violation
        if ($errorCode == '23000') {
            $message = '<b>Désolé, supression impossible car cet élément est déjà lié à un ou des élément(s) étranger(s).</b>';
            $error = true;
            $info = "Hop hop hop &#x1F913;";
            $alert = "error";
         
            $this->render(
                'index',
                compact(
                    'message',
                    'error',
                    'info',
                    'alert'
                )
            );
        } else {
            return 'Une erreur s\'est produite : ' . $this->exception->getMessage();
        }
    }
}
