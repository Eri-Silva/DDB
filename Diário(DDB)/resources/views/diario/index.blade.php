<!DOCTYPE html>
<html lang="en">
  <head>
    <title>DDB - Diário Digital da Bia</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
	  
	  
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light site-navbar-target" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="/">DDB</a>
	    </div>
	  </nav>

     
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <section class="ftco-section contact-section ftco-no-pb" id="contact-section">
  <div class="container">
        <button type="button" class="btn btn-primary py-3 px-3" data-toggle="modal" data-target="#cadastrarDiarioModal">
  Escrever uma nova página
      </button>
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate fadeInUp ftco-animated">
            <h1 class="big big-2">Diário</h1>
            <h2 class="mb-4">Diário</h2>
          </div>
        </div>
</section>


<!-- 
retirei o id id="contact-section" da section por causa que dava conflito -->
  <section class="ftco-section contact-section ftco-no-pb">
     
        @foreach ($diarios as $diario)

        <div class="row no-gutters block-9">
          <div class="col-md-6 order-md-last d-flex">
            
            <form action="#" class="bg-light p-4 p-md-5 contact-form">

		          <div class="col-md-12 heading-section ftco-animate fadeInUp ftco-animated">
                    <p>{{$diario->titulo}}</p>
		            <ul class="about-info mt-4 px-md-0 px-2">
		            	<li class="d-flex">{{$diario->conteudo}}</li>
		            </ul>
		          </div>

             
              <button type="button" class="btn btn-primary py-3 px-3" data-toggle="modal" data-target="#editarDiarioModal">
  Editar
</button>

<button type="button" class="btn btn-primary py-3 px-3" data-toggle="modal" data-target="#excluirDiarioModal">
  Excluir
</button>

            </form>
            

          </div>
          <div class="col-md-6 d-flex">
          	<div class="img" style="background-image: url(images/capa_caderno.png);"></div>
          </div>
        </div>
      </div>

       @endforeach
    </section>

   

    <!-- Modal "Cadastrar Diário" -->
<div class="modal fade" id="cadastrarDiarioModal" tabindex="-1" role="dialog" aria-labelledby="cadastrarDiarioModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cadastrarDiarioModalLabel" style="color:black">Cadastrar Diário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('diario.store') }}" class="bg-light p-4 p-md-5 contact-form" method="post">
          @csrf
          <div class="form-group">
            <input type="text" name="titulo" class="form-control" placeholder="Título">
          </div>

          <div class="form-group">
            <textarea name="conteudo" cols="30" rows="7" class="form-control" placeholder="Conteúdo da página"></textarea>
          </div>

          <div class="form-group">
            <input type="submit" value="Cadastrar Diário" class="btn btn-primary py-3 px-5">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="close" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal "Editar Página" -->
<div class="modal fade" id="editarDiarioModal" tabindex="-1" role="dialog" aria-labelledby="editarDiarioModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editarDiarioModalLabel" style="color:black">Editar Página</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('diario.update', $diario->id) }}" method="POST" class="bg-light p-4 p-md-5 contact-form">
          @csrf
          @method('PUT')

          <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" class="form-control" value="{{ $diario->titulo }}" placeholder="Digite o título">
          </div>

          <div class="form-group">
            <label for="conteudo">Conteúdo</label>
            <textarea name="conteudo" id="conteudo" cols="30" rows="7" class="form-control" placeholder="Digite o conteúdo">{{ $diario->conteudo }}</textarea>
          </div>

          <div class="form-group">
            <input type="submit" value="Salvar Alterações" class="btn btn-primary py-3 px-5">
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="close" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal "Excluir Diário" -->
<div class="modal fade" id="excluirDiarioModal" tabindex="-1" role="dialog" aria-labelledby="excluirDiarioModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="excluirDiarioModalLabel" style="color:black">Confirmar Exclusão</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Tem certeza de que deseja excluir esta página do diário?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="close" data-dismiss="modal">Cancelar</button>
        
        <!-- Adicionando o formulário de exclusão -->
        <form id="formDelete" action="{{ route('diario.destroy', $diario->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Confirmar Exclusão</button>
        </form>
      </div>
    </div>
  </div>
</div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  
  <script src="js/main.js"></script>
    
  </body>
</html>