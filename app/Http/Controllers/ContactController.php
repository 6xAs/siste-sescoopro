<?php

namespace SescoopRO\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;
use validador;
use Session;
use Redirect;

class ContactController extends Controller
{
    public function sendContato(Request $request)
    {
            // VARIAVEIS POST
            $nome         = $request->input('nome');
            $email        = $request->input('email');
            $assunto      = $request->input('assunto');
            $message      = $request->input('message');

          //enviar

          // emails para quem será enviado o formulário
          $emailenviar = "sistemaocb@ocb-ro.org.br";
          $destino = $emailenviar;

          // É necessário indicar que o formato do e-mail é html
          $headers  = 'MIME-Version: 1.0' . "\r\n";
          $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
          $headers .= 'From: $nome <$email>';
          //$headers .= "Bcc: $EmailPadrao\r\n";

          $enviaremail = mail($destino, $assunto, $message, $headers);
          if($enviaremail){
            $request->session()->flash('message', 'Mensagem Enviada com Sucesso');

          }
}
