<script type="text/javascript">
            // ESTE SERIA O CONTEÚDO DO .js
            var json_subDoc = {
            "docMain": [
             /* Contratos  */
            {
              "value": "Contratos",
              "nome": "Contratos",
              "subDoc": [
                "Extrato de Dispensa",
                "Extrato de Contrato",
                "Extrato de Licitação",
                "Extrato de Inexigibilidade"
              ]
            },
            /* // Contratos  */
            /* Demonstrações Contábeis  */
            {
              "value": "Demonstrações Contábeis",
              "nome": "Demonstrações Contábeis",
              "subDoc": [
                "Balanço Patrimonial",
                "Demonstrações de Patrimônio Social DMPS",
                "Demonstrações do Resultado do Exercício",
                "Fluxo de Caixa",
                "Notas Explicativas",
                "Relatório de Auditoria",
                "Resultado do Exercício"
              ]
            },
            /* // Demonstrações Contábeis  */
            /* Editais e Licitações  */
            {
              "value": "Editais e Licitações",
              "nome": "Editais e Licitações",
              "subDoc": [
                "Licitações por Trimestre"
              ]
            },
            /* // Editais e Licitações  */
            /* Gestão Financeira  */
            {
              "value": "Gestão Financeira",
              "nome": "Gestão Financeira",
              "subDoc": [
                "Balanço Financeiro",
                "Receita"
              ]
            },
            /* // Gestão Financeira  */
            /* Gestão Orçamentária  */
            {
              "value": "Gestão Orçamentária",
              "nome": "Gestão Orçamentária",
              "subDoc": [
                "Orçamento Original",
                "Orçamento Realizado",
                "Orçamento Reformulado",
                "Proposta Orçamentária"
              ]
            },
            /* // Gestão Orçamentária  */
            /* Integridade e Conduta Ética  */
            {
              "value": "Integridade e Conduta Ética",
              "nome": "Integridade e Conduta Ética",
              "subDoc": [
                "Conduda Ética",
                "Sindicância"
              ]
            },
            /* // Integridade e Conduta Ética  */
            /* Normativos  */
            {
              "value": "Normativos",
              "nome": "Normativos",
              "subDoc": [
                "Acordo Coletivo",
                "Diretrizes Internas",
                "Pessoal",
                "Regimento Interno",
                "Segurança",
                "Serviços"
              ]
            },
            /* // Normativos  */
            /* Planejamento  */
            {
              "value": "Planejamento",
              "nome": "Planejamento",
              "subDoc": [
                "Mapa Estratégico",
                "Organograma",
                "Planejamento Estratégico"

              ]
            },
            /* // Planejamento  */
            /* Recursos Humanos  */
            {
              "value": "Recursos Humanos",
              "nome": "Recursos Humanos",
              "subDoc": [
                "Estrutura Remuneratória",
                "Plano de Cargos",
                "Relação de Pessoal"
              ]
            },
            /* // Recursos Humanos  */
            /* Relatório de Gestão  */
            {
              "value": "Relatório de Gestão",
              "nome": "Relatório de Gestão",
              "subDoc": [
                "Relatório de Gestão"
              ]
            },
            /* // Relatório de Gestão  */
            /* Transferências  */
            {
              "value": "Transferências",
              "nome": "Transferências",
              "subDoc": [
                "Contrato de Gestão",
                "Convênio",
                "Federações e Confederações",
                "Patrocíno",
                "Projetos Especiais",
                "Unidades Estaduais"
              ]
            },
            /* // Transferências  */
            ]
            };
            // FIM DO .js
            function selectDocument(e){
            document.querySelector("#subDoc").innerHTML = '';
            var subDoc_select = document.querySelector("#subDoc");
            var num_docMain = json_subDoc.docMain.length;
            var j_index = -1;
            // aqui eu pego o index do Estado dentro do JSON
            for(var x=0;x<num_docMain;x++){
              if(json_subDoc.docMain[x].value == e){
                 j_index = x;
              }
            }
            if(j_index != -1){
              // aqui eu percorro todas as subDoc e crio os OPTIONS
              json_subDoc.docMain[j_index].subDoc.forEach(function(subDoc){
                 var cid_opts = document.createElement('option');
                 cid_opts.setAttribute('value',subDoc)
                 cid_opts.innerHTML = subDoc;
                 subDoc_select.appendChild(cid_opts);
              });
            }else{
              document.querySelector("#subDoc").innerHTML = '';
            }
            }
</script>
