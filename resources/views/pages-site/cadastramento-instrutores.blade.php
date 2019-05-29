
@include('template-site.head')

@include('template-site.topo')

@include('template-site.menu')

<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>

<section class="banner-1">
</section>
<!-- Notice Details -->
<section class="welcome py-5">
    <div class="container py-md-8 mt-md-8">
        <h2 class="heading-agileinfo">Cadastramento de Instrutores<span></span></h2>
        <span class="w3-line black"></span>
        <div class="row about-tp mt-md-5 pt-5">
            <div class="col-md-12">
                <h5>
                    Caro instrutor,

                    Se você tem interesse em atuar como prestador de serviços de instrutoria para o SESCOO/RO é necessário que você participe do processo de
                    cadastramento através do nosso Sistema GDH – Gestão de Desenvolvimento Humano – vinculado ao <u>Edital 001/2019</u> – SESCOOP/RO.
                </h5>
                <h4 class="">O novo cadastramento consiste em duas etapas:</h4>
                <h5>
                    <b>1º </b> O instrutor deverá enviar toda a documentação exigida no <u>Edital 001/2019</u> (disponível logo abaixo) para o e-mail: instrutoria@sescoop-ro.org.br, para a análise e validação dos
                    documentos realizada pelos profissionais do SESCOOP/RO que entrarão em contato com você para solicitar o envio dos mesmos documentos em vias originais em envelope lacrado para o endereço: <br>
                    “Serviço Nacional de Aprendizagem do Cooperativismo no Estado de Rondônia – SESCOOP/RO.
                    Rua Quintino Bacaiúva, 1671. Bairro São Cristóvão.Porto Velho/RO.CEP: 76.804-076″
                    <p></p>
                    <b>2º</b> Após recebimento e análise da documentação, o SESCOOP/RO aprovará o profissional em seu Sistema GDH e enviará ao instrutor login e senha por e-mail, para que o mesmo preencha
                     as demais informações solicitadas no sistema de cadastramento.

                    O Edital de Cadastramento visa:

                    –>  Atualizar a relação de instrutores interessados em prestar serviços de instrutoria às cooperativas do Estado de Rondônia;

                    –> Melhorar os critérios de seleção dos instrutores e temas ministrados de acordo com checagem minuciosa de sua especialidade e área de atuação, facilitando para a cooperativa a identificação
                     do profissional adequado para atender as suas demandas e contribuindo para a assertividade e qualidade do treinamento realizado.

                    Para que você entenda melhor como funciona o cadastro e a contratação é fundamental a leitura do <u>Edital 001/2019</u> e todos seus Anexos na íntegra que encontram-se disponíveis logo abaixo:
                </h5>
                <br>
                <div class="">
                    <table id="customers">
                          <tr>
                            <th>Documentos</th>
                            <th>Downloads</th>
                          </tr>
                          <tr>
                            <td>1 - Edital 001_2019</td>
                            <td><a href="/../doc-instrutores/1 - Edital 001_2019.pdf" target="_blank">DOWNLOAD</a></td>

                          </tr>
                          <tr>
                              <td>2 - Portaria 007_2017</td>
                              <td><a href="/../doc-instrutores/2 - Portaria 007_2017.pdf" target="_blank">DOWNLOAD</a></td>
                          </tr>
                          <tr>
                              <td>3 - Anexo I - Catálogo dos Cursos</td>
                              <td><a href="/../doc-instrutores/3 - Anexo I - Catálogo dos Cursos.pdf" target="_blank">DOWNLOAD</a></td>
                          </tr>
                          <tr>
                              <td>4 - Anexo II – Formulário de Dados Cadastrais e Relato de Experiência de Pessoa Jurídica</td>
                              <td><a href="/../doc-instrutores/4 - Anexo II – Formulário de Dados Cadastrais e Relato de Experiência de Pessoa Jurídica.docx" target="_blank">DOWNLOAD</a></td>
                          </tr>
                          <tr>
                              <td>5 - Anexo III – Formulário de Dados Cadastrais e Relato de Experiência de Profissional Autônomo</td>
                              <td><a href="/../doc-instrutores/5 - Anexo III – Formulário de Dados Cadastrais e Relato de Experiência de Profissional Autônomo.docx" target="_blank">DOWNLOAD</a></td>
                          </tr>
                          <tr>
                              <td>6 - Anexo IV – Formulário de Inscrição de Instrutor</td>
                              <td><a href="/../doc-instrutores/6 - Anexo IV – Formulário de Inscrição de Instrutor.docx" target="_blank">DOWNLOAD</a></td>
                          </tr>
                          <tr>
                              <td>7 - Anexo V - Formulário de Inscrição de Profissional Autônomo</td>
                              <td><a href="/../doc-instrutores/7 - Anexo V - Formulário de Inscrição de Profissional Autônomo.docx" target="_blank">DOWNLOAD</a></td>
                          </tr>
                          <tr>
                              <td>8 - Anexo VI – Declaração de Inexistência de Vínculo De Exclusividade</td>
                              <td><a href="/../doc-instrutores/8 - Anexo VI – Declaração de Inexistência de Vínculo De Exclusividade.docx" target="_blank">DOWNLOAD</a></td>
                          </tr>
                          <tr>
                              <td>9 - Anexo VII - Declaração de Inexistência de Mão-De-Obra De Menores</td>
                              <td><a href="/../doc-instrutores/9 - Anexo VII - Declaração de Inexistência de Mão-De-Obra De Menores.docx" target="_blank">DOWNLOAD</a></td>
                          </tr>
                          <tr>
                              <td>10 - Anexo VIII – Instrumento de Avaliação de Instrutores</td>
                              <td><a href="/../doc-instrutores/10 - Anexo VIII – Instrumento de Avaliação de Instrutores.pdf" target="_blank">DOWNLOAD</a></td>
                          </tr>
                          <tr>
                              <td>11 - Anexo IX – Modelo de Relatório de Curso</td>
                              <td><a href="/../doc-instrutores/11 - Anexo IX – Modelo de Relatório de Curso.docx" target="_blank">DOWNLOAD</a></td>
                          </tr>
                    </table>
                    <br>
                    <div class="">
                        <h5>Em caso de quaisquer dúvidas, entre em contato conosco através do e-mail:</h5>
                        <h5>licitacao@sescoop-ro.org.br</h5>
                    </div>
                </div>
            </div>

</section>
<!-- //Notice Details -->




@include('template-site.infobar')

@include('template-site.footer')

@include('template-site.scriptsjs')
