
<!DOCTYPE HTML>
<html>
<head>

	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="favico">
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Meta tag Keywords -->

	<!-- css files -->
	<link rel="stylesheet" href="css/login.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->

	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext"
	 rel="stylesheet">
	<!-- //web-fonts -->
</head>

<body>
	<div class="main-bg">

		<!-- title -->
		<h1>Triple Forms</h1>
		<!-- //title -->
		<div class="sub-main-w3">

			<div class="image-style">

			</div>
			<!-- vertical tabs -->
			<div class="vertical-tab">

				<div id="section1" class="section-w3ls">
					<input type="radio" name="sections" id="option1" checked>
					<label for="option1" class="icon-left-w3pvt"><span class="fa fa-user-circle" aria-hidden="true"></span>Login</label>
					<article>
						<form action="#" method="post">

							<h3 class="legend">Login</h3>

							<div class="input">
								<span class="fa fa-envelope-o" aria-hidden="true"></span>
								<input type="email" placeholder="Seu E-mail" name="email" required />
							</div>
							<div class="input">
								<span class="fa fa-key" aria-hidden="true"></span>
								<input type="password" placeholder="Sua senha" name="senha" required />
							</div>
							<button type="submit" class="btn submit">Login</button>
							<a href="#" class="bottom-text-w3ls">Esqueceu sua senha?</a>
						</form>
					</article>
				</div>
				<div id="section2" class="section-w3ls">
					<input type="radio" name="sections" id="option2">
					<label for="option2" class="icon-left-w3pvt"><span class="fa fa-pencil-square" aria-hidden="true"></span>Registre-se</label>
                    <!-- Erro Request -->
                    @if(count($errors) > 0)
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach($errors->all() as $error)

                                      <p><b>{!!$error!!}</b></p>

                                  @endforeach
                              </ul>
                          </div>
                    @endif
					<article>
						<form action="/input-participante" method="post">
                            {{ csrf_field() }}
							<h3 class="legend">Registre-se Aqui</h3>
							<div class="input">
								<span class="fa fa-user-o" aria-hidden="true"></span>
								<input type="text" placeholder="Seu Nome" name="nome" required />
							</div>
							<div class="input">
								<span class="fa fa-envelope-o" aria-hidden="true"></span>
								<input type="text" placeholder="Seu E-mail" name="email" required />
							</div>
							<div class="input">
								<span class="fa fa-key" aria-hidden="true"></span>
								<input type="password" placeholder="Senha" name="password" required />
							</div>
							<div class="input">
								<span class="fa fa-key" aria-hidden="true"></span>
								<input type="password" placeholder="Confirme a Senha" name="password" required />
							</div>


							<button type="submit" class="btn submit">Registrar</button>
						</form>
					</article>
				</div>
				<div id="section3" class="section-w3ls">
					<input type="radio" name="sections" id="option3">
					<label for="option3" class="icon-left-w3pvt"><span class="fa fa-lock" aria-hidden="true"></span>Esqueceu sua Senha?</label>
					<article>
						<form action="#" method="post">
                            {{ csrf_field() }}
							<h3 class="legend last">Resetar Senha</h3>
							<p class="para-style">Entre com seu email cadastrado e siga as instruções</p>
                            <div class="input">
								<span class="fa fa-envelope-o" aria-hidden="true"></span>
								<input type="email" placeholder="Email" name="email" required />
							</div>
							<p class="para-style">Se estiver com alguma dúvida ou não conseguiu recuperar sua senha entre com contato.</p>
                            </a></p>
                            <p class="para-style">Fone: (69)3224-6116 / (69)99955-2935</p>

							<button type="submit" class="btn submit last-btn">Enviar</button>
						</form>
					</article>
				</div>
			</div>
			<!-- //vertical tabs -->
			<div class="clear"></div>
		</div>

	</div>

</body>

</html>
