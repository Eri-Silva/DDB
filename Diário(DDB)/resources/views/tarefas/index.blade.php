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

<!-- O Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color:black">Adicionar Anotação</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


            <form action="{{route('tarefas.store')}}" method="POST" class="bg-light p-4 p-md-5 contact-form">
              @csrf
              <div class="form-group">
                <input type="text" name="titulo" class="form-control" placeholder="Anotação">
              </div>
              <div class="form-group">
                <textarea name="tarefa" id="" cols="30" rows="7" class="form-control" placeholder="Descrição"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Adicionar anotação" class="btn btn-primary py-3 px-5">
              </div>
            </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="close" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>


        <!-- <div class="row d-flex contact-info mb-5">

          <div class="col-md-6 col-lg-3 d-flex ftco-animate fadeInUp ftco-animated">

          	<div class="align-self-stretch box p-4 text-center">
                @foreach($anotacoes as $anotacao)
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-map-signs"></span>
          		</div>
          		<h3 class="mb-4">{{$anotacao->titulo}}</h3>
	            <p>{{$anotacao->tarefa}}</p>
              <div class="form-group">

                <button type="button" class="btn btn-primary py-1 px-3" data-toggle="modal" data-target="#editarModal">
                  Editar
                </button>
                <button type="button" class="btn btn-primary py-1 px-3" data-toggle="modal" data-target="#excluirModal">
                  Excluir
                </button>
@endforeach
              </div>

	          </div>

          </div> -->

          <section class="ftco-section contact-section ftco-no-pb" id="contact-section">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate fadeInUp ftco-animated">
            <h1 class="big big-2">Anotações</h1>
            <h2 class="mb-4">Anotações</h2>
            <p> <!-- Botão que abre o modal -->
          <div class="form-group">
<button type="button" class="btn btn-primary py-3 px-5" data-toggle="modal" data-target="#myModal">
Adicionar +
</button>

  </div></p>
  @if(session('success'))
    <div class="alert alert-primary">
        {{ session('success') }}
    </div>
@endif
          </div>
        </div>


        <div class="row d-flex contact-info mb-5">

@foreach($anotacoes as $anotacao)
          <div class="col-md-6 col-lg-3 d-flex ftco-animate fadeInUp ftco-animated">
          <div class="align-self-stretch box p-4 text-center">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-map-signs"></span>
          		</div>
          		<h3 class="mb-4">{{$anotacao->titulo}}</h3>
	            <p>{{$anotacao->tarefa}}</p>

              <button type="button" class="btn btn-primary py-1 px-3" data-toggle="modal" data-target="#editarModal{{ $anotacao->id }}">
                  Editar
                </button>
                <button type="button" class="btn btn-primary py-1 px-3" data-toggle="modal" data-target="#excluirModal{{ $anotacao->id }}">
                  Excluir
                </button>

            </div>
          </div>

 <!-- Modal "Editar" -->
 <div class="modal fade" id="editarModal{{ $anotacao->id }}" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editarModalLabel" style="color:black">Editar Anotação</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form action="{{ route('tarefas.update', ['tarefa' => $anotacao->id]) }}" method="POST">
                @csrf
                @method('PUT')
            <div class="form-group">
              <input type="text" name="titulo" class="form-control" value="{{$anotacao->titulo}}" placeholder="Nova Anotação">
            </div>
            <div class="form-group">
              <textarea name="tarefa" id="" cols="30" rows="7" class="form-control" placeholder="Nova Descrição">{{$anotacao->tarefa}}</textarea>
            </div>
            <div class="form-group">
              <button class="btn btn-primary py-3 px-5">Salvar Alterações"</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="close" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal "Excluir" -->
<div class="modal fade" id="excluirModal{{ $anotacao->id }}" tabindex="-1" role="dialog" aria-labelledby="excluirModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="excluirModalLabel" style="color:black">Confirmar Exclusão</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Tem certeza de que deseja excluir este item?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="close" data-dismiss="modal">Cancelar</button>
                <form action="{{ route('tarefas.destroy', ['tarefa' => $anotacao->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Confirmar Exclusão</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endforeach
  </div>

  <!-- end -->


        </div>

    </section>


    <footer class="ftco-footer ftco-section">
      <div class="container">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright ©<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        </div>
      </div>
    </footer>
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

  <script>
    function mostrar_modal() {
            let idModal = document.getElementById('caixa_lancamento');
            let modal_lancamento = new bootstrap.Modal(idModal);
            modal_lancamento.show();
        }

        function mostrar_modal_2() {
            let idModal = document.getElementById('caixa_lancamento_2');
            let modal_lancamento = new bootstrap.Modal(idModal);
            modal_lancamento.show();
        }

        function mostrar_modal_3() {
            let idModal = document.getElementById('caixa_lancamento_3');
            let modal_lancamento = new bootstrap.Modal(idModal);
            modal_lancamento.show();
        }
  </script>

  </body>
</html>
