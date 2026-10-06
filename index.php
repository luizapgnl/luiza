<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Atividades PHP</title>

    <link rel="stylesheet" href="css/index.css">
</head>

<body>

    <header>
        <nav class="navbar">

            <h2 class="logo">Ana Luiza</h2>

            <ul class="menu">
                <li><a href="#inicio">Início</a></li>
                <li><a href="#atividades">Atividades</a></li>
                <li><a href="#sobre">Sobre</a></li>
            </ul>

        </nav>
    </header>


    <!-- INÍCIO -->

    <section class="inicio" id="inicio">

        <div class="inicio-conteudo">

            <p class="saudacao">Bem-vindo!</p>

            <h1>Atividades PHP</h1>

            <h2>Desenvolvimento Web</h2>

            <p>
                Página criada para organizar e acessar as atividades
                desenvolvidas durante as aulas de PHP.
            </p>

            <a href="#atividades" class="botao">
                Ver atividades
            </a>

        </div>

    </section>


    <!-- ATIVIDADES -->

    <section class="secao" id="atividades">

        <h2 class="titulo-secao">Minhas Atividades</h2>

        <p class="subtitulo-secao">
            Selecione uma atividade para acessar.
        </p>


        <div class="projetos-container">


            <!-- IDADE -->

            <div class="projeto-card">

                <div class="projeto-numero">01</div>

                <h3>Verificador de Idade</h3>

                <p>
                    Sistema desenvolvido em PHP para receber
                    nome e idade do usuário.
                </p>

                <div class="tecnologias">
                    <span>HTML</span>
                    <span>PHP</span>
                    <span>CSS</span>
                </div>

                <a href="projetos/idade.php" class="link-projeto">
                    Abrir atividade →
                </a>

            </div>


            <!-- NOTAS -->

            <div class="projeto-card">

                <div class="projeto-numero">02</div>

                <h3>Verificador de Notas</h3>

                <p>
                    Sistema para inserir notas e verificar
                    a situação do aluno.
                </p>

                <div class="tecnologias">
                    <span>HTML</span>
                    <span>PHP</span>
                    <span>CSS</span>
                </div>

                <a href="projetos/notas.php" class="link-projeto">
                    Abrir atividade →
                </a>

            </div>


            <!-- DESAFIO -->

            <div class="projeto-card">

                <div class="projeto-numero">03</div>

                <h3>Desafio de Notas</h3>

                <p>
                    Versão mais completa do sistema de notas,
                    utilizando pesos e média final.
                </p>

                <div class="tecnologias">
                    <span>HTML</span>
                    <span>PHP</span>
                    <span>CSS</span>
                </div>

                <a href="projetos/notas-desafio.php" class="link-projeto">
                    Abrir atividade →
                </a>

            </div>


            <!-- LOGIN -->

            <div class="projeto-card">

                <div class="projeto-numero">04</div>

                <h3>Login Básico</h3>

                <p>
                    Página de autenticação simples utilizando
                    formulário e PHP.
                </p>

                <div class="tecnologias">
                    <span>HTML</span>
                    <span>PHP</span>
                    <span>CSS</span>
                </div>

                <a href="projetos/login-basico.php" class="link-projeto">
                    Abrir atividade →
                </a>

            </div>


            <!-- JOGOS -->

            <div class="projeto-card">

                <div class="projeto-numero">05</div>

                <h3>Cadastro de Jogos</h3>

                <p>
                    Sistema para cadastrar e visualizar
                    informações sobre jogos.
                </p>

                <div class="tecnologias">
                    <span>HTML</span>
                    <span>PHP</span>
                    <span>CSS</span>
                </div>

                <a href="projetos/jogos.php" class="link-projeto">
                    Abrir atividade →
                </a>

            </div>


        </div>

    </section>


    <!-- SOBRE -->

    <section class="secao secao-destaque" id="sobre">

        <h2 class="titulo-secao">Sobre o Projeto</h2>

        <p class="subtitulo-secao">
            Um pouco sobre esta página.
        </p>

        <div class="sobre-conteudo">

            <div class="foto">
                PHP
            </div>

            <div class="sobre-texto">

                <h3>Projeto de Desenvolvimento Web</h3>

                <p>
                    Esta página reúne as atividades realizadas
                    durante as aulas de desenvolvimento web.
                </p>

                <p>
                    Os exercícios utilizam HTML, CSS e PHP para
                    praticar formulários, cálculos, condições,
                    login e conexão com banco de dados.
                </p>

            </div>

        </div>

    </section>


    <!-- RODAPÉ -->

    <footer>

        <p>
            Atividades PHP - Desenvolvimento Web
        </p>

    </footer>

</body>

</html>