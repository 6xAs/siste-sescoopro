<?php

namespace SescoopRO\Http\Controllers;
use Illuminate\Http\Request;
use SescoopRO\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;
use validador;
use Mail;
use Session;
use Redirect;

class ContactController extends Controller
{
    public function sendContato(ContactRequest $request)
    {

        ini_set('display_errors', 1);

        error_reporting(E_ALL);

        // VARIAVEIS POST
        $nome         = $request->input('nome');
        $email        = $request->input('email');
        $assunto      = $request->input('assunto');
        $message      = $request->input('message');

        $from = $email;

        $to = "sistemaocb@ocb-ro.org.br";

        $subject = $assunto;

        $message = $message;


        $headers  = "From: Email do Site < $email >\n";
        $headers .= "Cc: testsite < anderson.seixas@sescoop-ro.org.br >\n";
        $headers .= "X-Sender: testsite < anderson.seixas@sescoop-ro.org.br >\n";
        $headers .= 'X-Mailer: PHP/' . phpversion();
        $headers .= "X-Priority: 1\n"; // Urgent message!
        $headers .= "Return-Path: sistemaocb@ocb-ro.org.br\n"; // Return path for errors
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=iso-8859-1\n";

        mail($to, $subject, $message, $headers);

        $request->session()->flash('message', 'Mensagem enviada com sucesso, logo entraremos em contato.');
        return Redirect::to('contato-sescoop');


    }
}
