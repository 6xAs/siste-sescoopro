$(document).ready(function(){
	
	/* SESCOOP */	
	var nacSescoop = {
			endereco: 	"SAUS Qd. 4, Bloco \"I\", Ed. Casa do Cooperativismo",
			complemento:"Setor de Autarquias Sul - Brasília-DF",
			cep: 		"70.070-936",
			telefones:	"(61) 3217-2100<br>(61) 3217-1504",
			outros:		"<a href= 'mailto:sescoop@sescoop.coop.br' target='_top'>sescoop@sescoop.coop.br</a><br>",
	};
	var acSescoop = {
			endereco: 	"Rua Coronel Alexandrino, nº 580, 1º andar",
			complemento:"Bosque - Rio Branco-AC",
			cep: 		"69.900-658",
			telefones:	"(68) 3223-8189<br>(68) 3224-9151<br>Fax: (68)3223-7697",
			outros:		"<a href= 'mailto:sescoop.ac@globo.com' target='_top'>sescoop.ac@globo.com</a><br>",
	};
	
	var alSescoop = {
			endereco: 	"Avenida Governador Lamenha Filho, nº 1.880",
			complemento:"Feitosa - Maceió-AL",
			cep: 		"57.043-000",
			telefones:	"(82) 2122-9494<br>Fax: (82) 2122-9464",
			outros:		" <a href='mailto:secretaria@ocb-al.coop.br' target='_top'>secretaria@ocb-al.coop.br </a> <br> <a href='http://www.ocb-al.coop.br' target='_blank'>www.ocb-al.coop.br</a> ",
	};
	
	var amSescoop = {
			endereco: 	"Avenida Japurá, 241",
			complemento:"Centro - Manaus–AM",
			cep: 		"69.025-020",
			telefones:	"(92) 3611-2226<br>(92) 3631-8518 <br>Fax: (92) 3631-8741",
			outros:		" <a href='mailto:secretariaam@ocbam.coop.br' target='_top'>secretariaam@ocbam.coop.br </a> <br> <a href='http://www.ocbam.coop.br' target='_blank'>www.ocbam.coop.br</a> ",
	};
	
	var apSescoop = {
			endereco: 	"Rua Tiradentes, nº 102",
			complemento:"Centro - Macapá-AP",
			cep: 		"68.900-098",
			telefones:	"(96) 3223-0110<br>Fax: (96) 3223-0110",
			outros:		" <a href='mailto:sescoop@sescoop-ap.coop.br' target='_top'>sescoop@sescoop-ap.coop.br</a> <br> <a href='http://www.sescoop-ap.coop.br' target='_blank'>www.sescoop-ap.coop.br</a>",
	};
	
	var baSescoop = {
			endereco: 	"Rua Boulevard Suiço, 129",
			complemento:"Nazaré - Salvador-BA",
			cep: 		"40.050-330",
			telefones:	"(71) 3421-5800",
			outros:		" <a href='mailto:administrativo_ba@oceb.coop.br' target='_top'>administrativo_ba@oceb.coop.br</a> <br> <a href='http://www.bahiacooperativo.coop.br' target='_blank'>www.bahiacooperativo.coop.br</a>",
	};
	
	var ceSescoop = {
			endereco: 	"Rua Ildefonso Albano, 1585 – Salas 02/04",
			complemento:"Aldeota - Fortaleza-CE",
			cep: 		"60.115-000",
			telefones:	"(85) 3535-3650<br>(85) 3535-3670 <br>Fax: (82) 3535-3666",
			outros:		" <a href='mailto:sescoop-ce@ocbce.coop.br' target='_top'>sescoop-ce@ocbce.coop.br</a> <br> <a href='http://www.cearacooperativo.coop.br' target='_blank'>www.cearacooperativo.coop.br</a>",
	};
	
	var dfSescoop = {
			endereco: 	"Setor Comercial Sul Quadra 4, Bloco \"A\", Sala 218/222, Ed. Embaixador",
			complemento:"Brasília-DF",
			cep: 		"70.300-907",
			telefones:	"(61) 3345-3036<br>Fax: (61) 3245-3121",
			outros:		"<a href='mailto:ocdf@ocdf.org.br' target='_top'>ocdf@ocdf.org.br</a> <br> <a href='http://www.dfcooperativo.coop.br' target='_blank'>www.dfcooperativo.coop.br</a>",
	};
	
	var esSescoop = {
			endereco: 	"Avenida Marechal Mascarenhas de Moraes, nº. 2501",
			complemento:"Bento Ferreira - Vitória-ES",
			cep: 		"29.050-625",
			telefones:	"(27) 2125-3200<br>Fax: (27) 2125-3201",
			outros:		"<a href='mailto:ocbes@ocbes.coop.br' target='_top'>ocbes@ocbes.coop.br</a> <br> <a href='http://www.ocbes.coop.br' target='_blank'>www.ocbes.coop.br</a>",
	};
	
	var goSescoop = {
			endereco: 	"Avenida H com Rua 14, nº 550",
			complemento:"Jardim Goiás - Goiânia-GO",
			cep: 		"74.810-070",
			telefones:	"(62) 3240-8900",
			outros:		"<a href='mailto:sescoopgo@sescoopgo.coop.br' target='_top'>sescoopgo@sescoopgo.coop.br</a> <br><a href='http://www.goiascooperativo.coop.br/' target='_blank'>www.goiascooperativo.coop.br</a>",
	};
	
	var maSescoop = {
			endereco: 	"Rua Bartolomeu Gusmão, Quadra A, nº 3",
			complemento:"Ipase - São Luís-MA",
			cep: 		"65.062-070",
			telefones:	"(98) 3302-8431<br>(98) 3302-8414",
			outros:		"<a href='mailto:contato@sescoopma.coop.br' target='_top'>contato@sescoopma.coop.br</a> <br> <a href='http://www.sescoopma.coop.br/' target='_blank'>www.sescoopma.coop.br</a>",
	};
	
	var mgSescoop = {
			endereco: 	"Rua Ceará, 771",
			complemento:"Funcionários - Belo Horizonte-MG",
			cep: 		"30.150-311",
			telefones:	"(31) 3025-7100<br>Fax: (31) 3025-7120",
			outros:		"<a href='mailto:ocemg@minasgerais.org.br' target='_top'>ocemg@minasgerais.org.br</a> <br> <a href='http://www.minasgerais.coop.br' target='_blank'>www.minasgerais.coop.br</a>",
	};
	
	var msSescoop = {
			endereco: 	"Rua Ceará, 2245",
			complemento:"Vila Célia - Campo Grande-MS",
			cep: 		"79.022-390",
			telefones:	"(67) 3389-0200<br>Fax: (67) 3389-0221",
			outros:		"<a href='mailto:ocbms@ocbms.org.br' target='_top'>ocbms@ocbms.org.br</a> <br> <a href='http://www.ocbms.org.br/' target='_blank'>www.ocbms.org.br/</a>",
	};
	
	var mtSescoop = {
			endereco: 	"Rua 2, Quadra 4, Lote 3, Setor A",
			complemento:"Centro Político Administrativo (CPA) - Cuiabá-MT",
			cep: 		"78.049-050",
			telefones:	"(65) 3648-2400<br>Fax: (65) 3648-2306",
			outros:		"<a href='mailto:secretaria@ocbmt.coop.br' target='_top'>secretaria@ocbmt.coop.br</a> <br> <a href='http://www.ocbmt.coop.br' target='_blank'>www.ocbmt.coop.br</a>",
	};
	
	var paSescoop = {
			endereco: 	"Avenida João Paulo II, nº 515",
			complemento:"Marco - Belém-PA",
			cep: 		"66.095-491",
			telefones:	"(91) 3226-5280<br>(91) 3226-4140",
			outros:		"<a href='mailto:secretaria@paracooperativo.coop.br' target='_top'>secretaria@paracooperativo.coop.br</a> <br> <a href='http://www.paracooperativo.coop.br' target='_blank'>www.paracooperativo.coop.br</a>",
	};
	
	var pbSescoop = {
			endereco: 	"Avenida Coremas, 498",
			complemento:"Centro - João Pessoa-PB",
			cep: 		"58.013-430",
			telefones:	"(83) 3222-3660<br>(83) 3222-6268<br>(83) 3221-6753 ",
			outros:		"<a href='mailto:sescooppb@sescooppb.coop.br' target='_top'>sescooppb@sescooppb.coop.br</a> <br> <a href='http://www.paraibacooperativo.coop.br' target='_blank'>www.paraibacooperativo.coop.br</a>",
	};
	
	var peSescoop = {
			endereco: 	"Rua Manuel Joaquim de Almeida, 165",
			complemento:"Iputinga - Recife-PE",
			cep: 		"50.670-370",
			telefones:	"(81) 3032-8300<br>Fax: (81) 3271-4142",
			outros:		"<a href='mailto:sescoop@sescooppe.coop.br' target='_top'>sescoop@sescooppe.coop.br</a> <br> <a href='http://pecooperativo.coop.br/' target='_blank'>www.pecooperativo.coop.br</a>",
	};
	
	var piSescoop = {
			endereco: 	"Rua Jornalista Dondon, nº 2660",
			complemento:" Bairro Horto - Teresina–PI",
			cep: 		"64.052-850",
			telefones:	"(86) 3225-4443<br>(86) 3225-4444<br>Fax: (86) 3214-4265",
			outros:		"<a href='mailto:sescoop@sescoop-pi.coop.br' target='_top'>sescoop@sescoop-pi.coop.br</a> <br> <a href='http://www.sescoop-pi.coop.br/' target='_blank'>www.sescoop-pi.coop.br</a>",
	};
	
	var prSescoop = {
			endereco: 	"Avenida Cândido de Abreu, 501",
			complemento:"Centro Cívico - Curitiva-PR",
			cep: 		"80.530-000",
			telefones:	"(41) 3200-1105<br>Fax: (41) 3200-1199",
			outros:		"<a href='mailto:ocepar@sistemaocepar.coop.br' target='_top'>ocepar@sistemaocepar.coop.br</a> <br> <a href='www.paranacooperativo.coop.br' target='_blank'>www.paranacooperativo.coop.br</a>"
	};
	
	var rjSescoop = {
			endereco: 	"Avenida Presidente Vargas, 583, Sala. 1202 a 1205",
			complemento:"Rio de Janeiro-RJ",
			cep: 		"20.071-003",
			telefones:	"(21) 2232-0133<br>Fax: (21) 2232-0133",
			outros:		"<a href='mailto:sescooprj@sescooprj.coop.br' target='_top'>sescooprj@sescooprj.coop.br</a> <br> <a href='http://sescooprj.coop.br/' target='_blank'>www.sescooprj.coop.br</a>",
	};
	
	var rnSescoop = {
			endereco: 	"Avenida Jerônimo Câmara, 2994",
			complemento:"Nazaré - Natal-RN",
			cep: 		"59.060-300",
			telefones:	"(84) 3605-2531<br>Fax: (84) 3605-2531",
			outros:		"<a href='mailto:sescooprn@sescooprn.coop.br' target='_top'>sescooprn@sescooprn.coop.br</a> <br> <a href='http://www.sescooprn.coop.br/' target='_blank'>www.sescooprn.coop.br</a>",
	};
	
	var rsSescoop = {
			endereco: 	"Rua Félix da Cunha, 12",
			complemento:"Bairro Floresta - Porto Alegre–RS",
			cep: 		"90.570-000",
			telefones:	"(51) 3323-0000<br>Fax: (51) 3323-0026",
			outros:		"<a href='mailto:ocergs@ocergs.coop.br' target='_top'>ocergs@ocergs.coop.br</a> <br> <a href='http://www.ocergs.coop.br/' target='_blank'>www.ocergs.coop.br</a>",
	};
	
	var roSescoop = {
			endereco: 	"Rua Quintino Bocaíuva, 1671",
			complemento:"São Cristóvão - Porto Velho–RO",
			cep: 		"76.804-076",
			telefones:	"(69) 3224-6116<br>(69) 3229-4475<br>Fax: (69) 3229-2866",
			outros:		"<a href='mailto:sistemaocb@ocb-ro.org.br' target='_top'>sistemaocb@ocb-ro.org.br</a> <br> <a href='http://www.sescoop-ro.org.br/' target='_blank'>www.sescoop-ro.org.br</a>",
	};
	
	var rrSescoop = {
			endereco: 	"Avenida Major Williams, 1018",
			complemento:"São Francisco - Boa Vista-RR",
			cep: 		"69.301-110",
			telefones:	"(95) 3623-2912<br>(95) 3623-2312<br>Fax: (95) 3623-0978",
			outros:		"<a href='mailto:sescooprr@yahoo.com.br' target='_top'>sescooprr@yahoo.com.br</a> <br> <a href='http://www.ocbrr.coop.br' target='_blank'>www.ocbrr.coop.br</a>",
	};
	
	var scSescoop = {
			endereco: 	"Avenida Almirante Tamandaré, 633",
			complemento:"Capoeiras - Florianópolis-SC",
			cep: 		"88.080-161",
			telefones:	"(48) 3878-8800<br>Fax: (48) 3878-8815",
			outros:		"<a href='mailto:ocesc@ocesc.org.br' target='_top'>ocesc@ocesc.org.br</a> <br> <a href='http://www.ocesc.org.br' target='_blank'>www.ocesc.org.br</a>",
	};
	
	var seSescoop = {
			endereco: 	"Rua Dr. Leonardo Leite, n° 368",
			complemento:"Bairro São José - Aracaju-SE",
			cep: 		"49.015-000",
			telefones:	"(79) 3259-1134<br>(79) 3259-2752<br>Fax: (79) 3259-1134",
			outros:		"<a href='mailto:ocese@sescoopse.org.br' target='_top'>ocese@sescoopse.org.br</a> ",
	};
	
	var spSescoop = {
			endereco: 	"Rua 13 de maio, 1376",
			complemento:"Bela Vista - São Paulo-SP",
			cep: 		"01.327-002",
			telefones:	"(11) 3146-6200<br>Fax: (11) 3146-6222",
			outros:		"<a href='mailto:atendimento@ocesp.org.br' target='_top'>atendimento@ocesp.org.br</a> <br> <a href='http://www.portaldocooperativismo.org.br' target='_blank'>www.portaldocooperativismo.org.br</a>",
	};
	
	var toSescoop = {
			endereco: 	"Avenida JK, 110 Norte, Lote 11",
			complemento:"Centro - Palmas-TO",
			cep: 		"77.006-130",
			telefones:	"(63) 3215-3291<br>Fax: (63) 3215-3291",
			outros:		"<a href='mailto:secretaria@ocbto.coop.br' target='_top'>secretaria@ocbto.coop.br</a> <br> <a href='http://www.ocbto.coop.br' target='_blank'>www.ocbto.coop.br</a>",
	};
	
	/*CNCOOP*/
	var nacSindical = {
			endereco: 	"SAUS Qd. 4, Bloco \"I\", Ed. Casa do Cooperativismo",
			complemento:"Setor de Autarquias Sul - Brasília-DF",
			cep: 		"70.070-936",
			telefones:	"(61) 3217-2100<br>(61) 3217-1504",
			outros:		"<a href='mailto:cncoop@cncoop.coop.br' target='_top'>cncoop@cncoop.coop.br</a><br>",
	};
	var fecooparSindical = {
			endereco: 	"Avenida Cândido de Abreu, nº 501",
			complemento:"Centro Cívico - Curitiba/PR",
			cep: 		"80.530 - 000",
			telefones:	"(41) 3200-1104 <br>(41) 3200-1105",
			outros:		"<a href= 'mailto:carlos@ocepar.org.br' target='_top'>carlos@ocepar.org.br</a><br",
	};
	
	var fecoopneSindical = {
			endereco: 	"Rua Manoel Joaquim de Almeida, 165",
			complemento:"Bairro Iputinga, Recife-PE",
			cep: 		"50.670-370",
			telefones:	"(81) 3217-1478",
			outros:		"<a href= 'mailto:fecoopne@yahoo.com.br' target='_top'>fecoopne@yahoo.com.br</a>",
	};
	
	var fecoopnorteSindical = {
			endereco: 	"Avenida Japurá, nº 241",
			complemento:"Centro - Manaus–AM",
			cep: 		"69.025-020",
			telefones:	"(92) 3611-2226",
			outros:		"<a href= 'mailto:presidenciafecoopnorte@ocbam.coop.br' target='_top'>presidenciafecoopnorte@ocbam.<br>coop.br</a>",
	};
	
	var fecoopcotoSindical = {
			endereco: 	"QD C-9 LT 9, Avenida H  nº  550",
			complemento:"Jardim Goiás - Goiânia-GO",
			cep: 		"74.810-070",
			telefones:	"(62) 3240-2600",
			outros:		"<a href= 'mailto:ocbgo@ocbgo.org.br' target='_top'>ocbgo@ocbgo.org.br</a>",
	};
	
	var fecoopsuleneSindical = {
			endereco: 	"Avenida Marechal Mascarenhas de Moraes, nº 2.501",
			complemento:"Bento Ferreira - Vitória-ES",
			cep: 		"29.050-625",
			telefones:	"(27) 2125-3200",
			outros:		"<a href= 'mailto:juridico@ocbes.coop.br' target='_top'>juridico@ocbes.coop.br</a>",
	};
	
	var fescoopspSindical = {
			endereco: 	"Rua Treze de Maio, 1376",
			complemento:"Bela Vista - São Paulo-SP",
			cep: 		"01.327-002",
			telefones:	"(11) 3146-6205",
			outros:		"<a href= 'mailto:fescoop-sp@hotmail.com' target='_top'>fescoop-sp@hotmail.com</a>",
	};
	
	
	
	
	/** OCB */
	var nac = {
			endereco: 	"SAUS Qd. 4, Bloco \"I\", Ed. Casa do Cooperativismo",
			complemento:"Setor de Autarquias Sul - Brasília-DF",
			cep: 		"70.070-936",
			telefones:	"(61) 3217-2100<br>(61) 3217-1504",
			outros:		"<a href= 'mailto:ocb@ocb.coop.br' target='_top'>ocb@ocb.coop.br</a><br>",
	};
	var ac = {
			endereco: 	"Rua Coronel Alexandrino, nº 580, 1º andar",
			complemento:"Bosque - Rio Branco-AC",
			cep: 		"69.900-658",
			telefones:	"(68) 3223-8189<br>(68) 3224-9151<br>Fax: (68)3223-7697",
			outros:		"<a href= 'mailto:sescoop.ac@globo.com' target='_top'>sescoop.ac@globo.com</a><br>",
	};
	
	var al = {
			endereco: 	"Avenida Governador Lamenha Filho, nº 1.880",
			complemento:"Feitosa - Maceió-AL",
			cep: 		"57.043-000",
			telefones:	"(82) 2122-9494<br>Fax: (82) 2122-9464",
			outros:		" <a href='mailto:secretaria@ocb-al.coop.br' target='_top'>secretaria@ocb-al.coop.br </a> <br> <a href='http://www.ocb-al.coop.br' target='_blank'>www.ocb-al.coop.br</a> ",
	};
	
	var am = {
			endereco: 	"Avenida Japurá, 241",
			complemento:"Centro - Manaus–AM",
			cep: 		"69.025-020",
			telefones:	"(92) 3611-2226<br>(92) 3631-8518 <br>Fax: (92) 3631-8741",
			outros:		" <a href='mailto:secretariaam@ocbam.coop.br' target='_top'>secretariaam@ocbam.coop.br </a> <br> <a href='http://www.ocbam.coop.br' target='_blank'>www.ocbam.coop.br</a> ",
	};
	
	var ap = {
			endereco: 	"Rua Tiradentes, nº 102",
			complemento:"Centro - Macapá-AP",
			cep: 		"68.900-098",
			telefones:	"(96) 3223-0110<br>Fax: (96) 3223-0110",
			outros:		" <a href='mailto:sescoop@sescoop-ap.coop.br' target='_top'>sescoop@sescoop-ap.coop.br</a> <br> <a href='http://www.sescoop-ap.coop.br' target='_blank'>www.sescoop-ap.coop.br</a>",
	};
	
	var ba = {
			endereco: 	"Rua Boulevard Suiço, 129",
			complemento:"Nazaré - Salvador-BA",
			cep: 		"40.050-330",
			telefones:	"(71) 3421-5800",
			outros:		" <a href='mailto:administrativo_ba@oceb.coop.br' target='_top'>administrativo_ba@oceb.coop.br</a> <br> <a href='http://www.bahiacooperativo.coop.br' target='_blank'>www.bahiacooperativo.coop.br</a>",
	};
	
	var ce = {
			endereco: 	"Rua Ildefonso Albano, 1585 – Salas 02/04",
			complemento:"Aldeota - Fortaleza-CE",
			cep: 		"60.115-000",
			telefones:	"(85) 3535-3650<br>(85) 3535-3670 <br>Fax: (82) 3535-3666",
			outros:		" <a href='mailto:sescoop-ce@ocbce.coop.br' target='_top'>sescoop-ce@ocbce.coop.br</a> <br> <a href='http://www.cearacooperativo.coop.br' target='_blank'>www.cearacooperativo.coop.br</a>",
	};
	
	var df = {
			endereco: 	"Setor Comercial Sul Quadra 4, Bloco \"A\", Sala 218/222, Ed. Embaixador",
			complemento:"Brasília-DF",
			cep: 		"70.300-907",
			telefones:	"(61) 3345-3036<br>Fax: (61) 3245-3121",
			outros:		"<a href='mailto:ocdf@ocdf.org.br' target='_top'>ocdf@ocdf.org.br</a> <br> <a href='http://www.dfcooperativo.coop.br' target='_blank'>www.dfcooperativo.coop.br</a>",
	};
	
	var es = {
			endereco: 	"Avenida Marechal Mascarenhas de Moraes, nº. 2501",
			complemento:"Bento Ferreira - Vitória-ES",
			cep: 		"29.050-625",
			telefones:	"(27) 2125-3200<br>Fax: (27) 2125-3201",
			outros:		"<a href='mailto:ocbes@ocbes.coop.br' target='_top'>ocbes@ocbes.coop.br</a> <br> <a href='http://www.ocbes.coop.br' target='_blank'>www.ocbes.coop.br</a>",
	};
	
	var go = {
			endereco: 	"Avenida H com Rua 14, nº 550",
			complemento:"Jardim Goiás - Goiânia-GO",
			cep: 		"74.810-070",
			telefones:	"(62) 3240-2600",
			outros:		"<a href='mailto:ocbgo@ocbgo.coop.br' target='_top'>ocbgo@ocbgo.coop.br</a> <br><a href='http://www.goiascooperativo.coop.br/' target='_blank'>www.goiascooperativo.coop.br</a>",
	};
	
	var ma = {
			endereco: 	"Rua do Alecrim, 415 Ed. Pal. dos Esportes - 3º andar – Salas 310",
			complemento:"Centro - São Luís-MA",
			cep: 		"65.010-040",
			telefones:	"(98) 3221-3292<br>Fax: (98) 3221-3292",
			outros:		"<a href='mailto:contato@ocbma.coop.br' target='_top'>contato@ocbma.coop.br</a></a>",
	};
	
	var mg = {
			endereco: 	"Rua Ceará, 771",
			complemento:"Funcionários - Belo Horizonte-MG",
			cep: 		"30.150-311",
			telefones:	"(31) 3025-7100<br>Fax: (31) 3025-7120",
			outros:		"<a href='mailto:ocemg@minasgerais.org.br' target='_top'>ocemg@minasgerais.org.br</a> <br> <a href='http://www.minasgerais.coop.br' target='_blank'>www.minasgerais.coop.br</a>",
	};
	
	var ms = {
			endereco: 	"Rua Ceará, 2245",
			complemento:"Vila Célia - Campo Grande-MS",
			cep: 		"79.022-390",
			telefones:	"(67) 3389-0200<br>Fax: (67) 3389-0221",
			outros:		"<a href='mailto:ocbms@ocbms.org.br' target='_top'>ocbms@ocbms.org.br</a> <br> <a href='http://www.ocbms.org.br/' target='_blank'>www.ocbms.org.br/</a>",
	};
	
	var mt = {
			endereco: 	"Rua 2, Quadra 4, Lote 3, Setor A",
			complemento:"Centro Político Administrativo (CPA) - Cuiabá-MT",
			cep: 		"78.049-050",
			telefones:	"(65) 3648-2400<br>Fax: (65) 3648-2306",
			outros:		"<a href='mailto:secretaria@ocbmt.coop.br' target='_top'>secretaria@ocbmt.coop.br</a> <br> <a href='http://www.ocbmt.coop.br' target='_blank'>www.ocbmt.coop.br</a>",
	};
	
	var pa = {
			endereco: 	"Avenida João Paulo II, nº 515",
			complemento:"Marco - Belém-PA",
			cep: 		"66.095-491",
			telefones:	"(91) 3226-5280<br>(91) 3226-4140",
			outros:		"<a href='mailto:secretaria@paracooperativo.coop.br' target='_top'>secretaria@paracooperativo.coop.br</a> <br> <a href='http://www.paracooperativo.coop.br' target='_blank'>www.paracooperativo.coop.br</a>",
	};
	
	var pb = {
			endereco: 	"Avenida Coremas, 498",
			complemento:"Centro - João Pessoa-PB",
			cep: 		"58.013-430",
			telefones:	"(83) 3222-3660<br>(83) 3222-6268<br>(83) 3221-6753 ",
			outros:		"<a href='mailto:ocbpb@ocbpb.coop.br' target='_top'>ocbpb@ocbpb.coop.br</a> <br> <a href='http://www.paraibacooperativo.coop.br' target='_blank'>www.paraibacooperativo.coop.br</a>",
	};
	
	var pe = {
			endereco: 	"Rua Manuel Joaquim de Almeida, 165",
			complemento:"Iputinga - Recife-PE",
			cep: 		"50.670-370",
			telefones:	"(81) 3032-8300<br>Fax: (81) 3271-4142",
			outros:		"<a href='mailto:sescoop@sescooppe.coop.br' target='_top'>sescoop@sescooppe.coop.br</a> <br> <a href='http://pecooperativo.coop.br/' target='_blank'>www.pecooperativo.coop.br</a>",
	};
	
	var pi = {
			endereco: 	"Rua Alto Longá s/n- Edificio Cidapi",
			complemento:"Água Mineral - Teresina–PI",
			cep: 		"64.006-140",
			telefones:	"(86) 3214-1941",
			outros:		"<a href='mailto:ocb.piaui@gmail.com' target='_top'>ocb.piaui@gmail.com </a>",
	};
	
	var pr = {
			endereco: 	"Avenida Cândido de Abreu, 501",
			complemento:"Centro Cívico - Curitiva-PR",
			cep: 		"80.530-000",
			telefones:	"(41) 3200-1105<br>Fax: (41) 3200-1199",
			outros:		"<a href='mailto:ocepar@sistemaocepar.coop.br' target='_top'>ocepar@sistemaocepar.coop.br</a> <br> <a href='http://www.paranacooperativo.coop.br' target='_blank'>www.paranacooperativo.coop.br</a>"
	};
	
	var rj = {
			endereco: 	"Avenida Presidente Vargas, 583, Sala. 1202 a 1205",
			complemento:"Rio de Janeiro-RJ",
			cep: 		"20.071-003",
			telefones:	"(21) 2232-0133<br>Fax: (21) 2232-0133",
			outros:		"<a href='mailto:ocbrj@ocbprj.coop.br' target='_top'>ocbrj@ocbprj.coop.br</a> <br> <a href='http://www.ocbrj.coop.br/' target='_blank'>www.ocbrj.coop.br</a>",
	};
	
	var rn = {
			endereco: 	"Avenida Jerônimo Câmara, 2994",
			complemento:"Nazaré - Natal-RN",
			cep: 		"59.060-300",
			telefones:	"(84) 3605-2531<br>Fax: (84) 3605-2531",
			outros:		"<a href='mailto:secretaria@ocbrn.coop.br' target='_top'>secretaria@ocbrn.coop.br</a> <br> <a href='http://ocbrn.coop.br/' target='_blank'>www.ocbrn.coop.br</a>",
	};
	
	var rs = {
			endereco: 	"Rua Félix da Cunha, 12",
			complemento:"Bairro Floresta - Porto Alegre–RS",
			cep: 		"90.570-000",
			telefones:	"(51) 3323-0000<br>Fax: (51) 3323-0026",
			outros:		"<a href='mailto:ocergs@ocergs.coop.br' target='_top'>ocergs@ocergs.coop.br</a> <br> <a href='http://www.ocergs.coop.br/' target='_blank'>www.ocergs.coop.br</a>",
	};
	
	var ro = {
			endereco: 	"Rua Quintino Bocaíuva, 1671",
			complemento:"São Cristóvão - Porto Velho–RO",
			cep: 		"76.804-076",
			telefones:	"(69) 3224-6116<br>(69) 3229-4475<br>Fax: (69) 3229-2866",
			outros:		"<a href='mailto:sistemaocb@ocb-ro.org.br' target='_top'>sistemaocb@ocb-ro.org.br</a> <br> <a href='http://www.ocb-ro.org.br' target='_blank'>www.ocb-ro.org.br</a>",
	};
	
	var rr = {
			endereco: 	"Avenida Major Williams, 1018",
			complemento:"São Francisco - Boa Vista-RR",
			cep: 		"69.301-110",
			telefones:	"(95) 3623-2912<br>(95) 3623-2312<br>Fax: (95) 3623-0978",
			outros:		"<a href='mailto:ocbroraima@yahoo.com.br' target='_top'>ocbroraima@yahoo.com.br</a> <br> <a href='http://www.ocbrr.coop.br' target='_blank'>www.ocbrr.coop.br</a>",
	};
	
	var sc = {
			endereco: 	"Avenida Almirante Tamandaré, 633",
			complemento:"Capoeiras - Florianópolis-SC",
			cep: 		"88.080-161",
			telefones:	"(48) 3878-8800<br>Fax: (48) 3878-8815",
			outros:		"<a href='mailto:ocesc@ocesc.org.br' target='_top'>ocesc@ocesc.org.br</a> <br> <a href='http://www.ocesc.org.br' target='_blank'>www.ocesc.org.br</a>",
	};
	
	var se = {
			endereco: 	"Rua Dr. Leonardo Leite, n° 368",
			complemento:"Bairro São José - Aracaju-SE",
			cep: 		"49.015-000",
			telefones:	"(79) 3259-1134<br>(79) 3259-2752<br>Fax: (79) 3259-1134",
			outros:		"<a href='mailto:ocese@sescoopse.org.br' target='_top'>ocese@sescoopse.org.br</a> ",
	};
	
	var sp = {
			endereco: 	"Rua 13 de maio, 1376",
			complemento:"Bela Vista - São Paulo-SP",
			cep: 		"01.327-002",
			telefones:	"(11) 3146-6200<br>Fax: (11) 3146-6222",
			outros:		"<a href='mailto:atendimento@ocesp.org.br' target='_top'>atendimento@ocesp.org.br</a> <br> <a href='http://www.portaldocooperativismo.org.br' target='_blank'>www.portaldocooperativismo.org.br</a>",
	};
	
	var to = {
			endereco: 	"Avenida JK, 110 Norte, Lote 11",
			complemento:"Centro - Palmas-TO",
			cep: 		"77.006-130",
			telefones:	"(63) 3215-3291<br>Fax: (63) 3215-3291",
			outros:		"<a href='mailto:secretaria@ocbto.coop.br' target='_top'>secretaria@ocbto.coop.br</a> <br> <a href='http://www.ocbto.coop.br' target='_blank'>www.ocbto.coop.br</a>",
	};

	
	
	/**OCB*/
	$("#info-estado").change(function(){
		var chave = $(this).val();
		var estado = '';
		
		if(chave == ''){
			chave = 'nac';
			estado = 'OCB Nacional';
		} else {
			estado = chave.toUpperCase();
		}
		
		try {
			var dados = eval(chave);
		} catch(ex1) {}
		
		try {
			var dadosSescoop = eval(chave + "Sescoop");
		} catch(ex1) {}
			

		var endereco = typeof dados !== "undefined" ? dados.endereco : (typeof dadosSescoop !== "undefined" ? dadosSescoop.endereco : '');
		var complemento = typeof dados !== "undefined" ? dados.complemento : (typeof dadosSescoop !== "undefined" ? dadosSescoop.complemento : '');
		var cep = typeof dados !== "undefined" ? '<strong>CEP</strong>: ' + dados.cep : (typeof dadosSescoop !== "undefined" ? '<strong>CEP</strong>: ' + dadosSescoop.cep : '');
		var telefone = typeof dados !== "undefined" ? dados.telefones : (typeof dadosSescoop !== "undefined" ? dadosSescoop.telefones : '');
		var outros = typeof dados !== "undefined" ? dados.outros : (typeof dadosSescoop !== "undefined" ? dadosSescoop.outros : '');
		
		$("#info-titulo").html('Sede ' + estado);
		$("#info-endereco").html(endereco);
		$("#info-complemento").html(complemento);
		$("#info-cep").html(cep);
		$("#info-telefone").html(telefone);
		$("#info-outros").html(outros);
	});

	/*CNCOOP*/
	$("#info-estadoSindical").change(function(){
		var chave = $(this).val();
		var estado = '';
		
		if(chave == ''){
			chave = 'nacSindical';
			estado = 'Confederação';
		} else {
			estado = ' ' +chave.replace("Sindical", "").toUpperCase();
		}
		// console.log(chave);
		var dados = eval(chave);
		// console.log(dados);

		$('#image-unidade').attr('src', 'img/mapa-' + chave + '.png')
		
		
		$("#info-titulo").html('Sede ' + estado);
		$("#info-endereco").html(typeof dados !== "undefined" ? dados.endereco : '');
		$("#info-complemento").html(typeof dados !== "undefined" ? dados.complemento : '');
		$("#info-cep").html(typeof dados !== "undefined" ? '<strong>CEP</strong>: ' + dados.cep : '');
		$("#info-telefone").html(typeof dados !== "undefined" ? dados.telefones : '');
		$("#info-outros").html(typeof dados !== "undefined" ? dados.outros : '');
	});
	
	
	
	
	/*SESCOOP*/
	$("#info-estadoSescoop").change(function(){
		var chave = $(this).val();
		var estado = '';
		
		if(chave == ''){
			chave = 'nacSescoop';
			estado = 'Sescoop Nacional';
		} else {
			estado = 'Sescoop-' +chave.replace("Sescoop", "").toUpperCase();
		}
		console.log(chave);
		var dados = eval(chave);
		console.log(dados);
		
		
		$("#info-titulo").html('Sede ' + estado);
		$("#info-endereco").html(typeof dados !== "undefined" ? dados.endereco : '');
		$("#info-complemento").html(typeof dados !== "undefined" ? dados.complemento : '');
		$("#info-cep").html(typeof dados !== "undefined" ? '<strong>CEP</strong>: ' + dados.cep : '');
		$("#info-telefone").html(typeof dados !== "undefined" ? dados.telefones : '');
		$("#info-outros").html(typeof dados !== "undefined" ? dados.outros : '');
	});
	
	
	
	// Disparando eventos
	$("#info-estado").change();
	$("#info-estadoSescoop").change();
	$("#info-estadoSindical").change();
	
});