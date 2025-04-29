<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Michellangelo</title>
    <link rel="icon" href="../public/images/graos-de-cafe.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/home_style.css">

    <style>
        header {
            background-image: url('../public/images/header-bg.jpeg');
        }
    </style>
    
</head>
<body>
    
    <?php include 'templates/navbar.php'; ?>
    
    <main>

        <header class="text-white text-center py-5 d-flex align-items-center justify-content-center">
            <div class="container">
                <h1>Paixão pelo Café, Compromisso com a Qualidade</h1>
                <p>Unimos tecnologia e amor para transformar cada torra em uma experiência única</p>
            </div>
        </header>
        
        <section id="produtos" class="container my-5">
            <h2 class="text-right">Nossos Produtos</h2>
            <div class="row mt-4 align-items-center">
                <div class="col-md-6 position-sticky" style="top: 0;">
                    <div class="p-3">
                        <h4>Hardware de Ponta</h4>
                        <p>Desenvolvemos um produto pensado tanto para os amantes de café que buscam uma imersão completa no processo de torra, 
                            quanto para os profissionais que desejam elevar a qualidade de seus grãos. 
                            O Projeto <b>Michelangelo</b> combina tecnologia de ponta e sensores avançados, 
                            oferecendo precisão e controle total no monitoramento e análise do café durante a torra.</p>    
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-6">
                            <img src="../public/images/modelo3dFrente.jpeg" alt="Futuro 1" class="img-fluid rounded">
                        </div>
                        <div class="col-6">
                            <img src="../public/images/modelo3dLado.jpeg" alt="Futuro 2" class="img-fluid rounded">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4 align-items-center">
                <div class="col-md-5 position-sticky " style="top: 0;">
                    <div class="p-3">
                        <img src="../public/images/logoMichelangelo.png" alt="Futuro 1" class="img-fluid rounded">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-12">
                            <h4>Nosso Futuro</h4>
                            <p>
                                Atualmente, nosso sistema utiliza o software Artisan para a leitura e monitoramento de gráficos durante a torra. 
                                No entanto, nosso objetivo é alcançar independência tecnológica, integrando todo o processo de monitoramento diretamente em nossa plataforma, 
                                com um ambiente intuitivo, amigável e profissional.
                                </br>
                                Além disso, visamos expandir nossa solução para além do universo do café, 
                                aplicando nossa tecnologia e sensores em diversos processos do setor agropecuário, promovendo inovação, precisão e sustentabilidade no campo.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="servicos" class="container my-5">
            <h2 class="text-center titulo_section">Nossos Serviços</h2>
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="p-3">
                        <h4>Tecnologia e Inovação</h4>
                        <p>Integramos sensores inteligentes e soluções eletrônicas ao processo de torra para garantir precisão, automação e controle em tempo real da produção de café.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3">
                        <h4>Plataforma Web</h4>
                        <p>Oferecemos uma interface amigável para análise dos dados de torra, controle de qualidade e registro completo das etapas, tudo em um só lugar.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3">
                        <h4>Qualidade e Análise Sensorial</h4>
                        <p>Ferramentas para registrar e avaliar sensorialmente cada café, promovendo consistência, padronização e evolução contínua na produção.</p>
                    </div>
                </div>
            </div>
        </section>
    
    </main>
    
    <?php include 'templates/footer.php'; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>