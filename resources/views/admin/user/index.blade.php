@extends('template.admin')

@section('title', 'Admin | Usuários')

@section('content')


    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Usuários</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="m-t-0 header-title"><b>Lista de Usuários</b></h4>
                            <p class="text-muted font-14 m-b-30">Tabela com lista de Usuários e suas informações.</p>
                        </div>
                        <div>
                            <a href="#modal-create" data-toggle="modal" class="btn btn-primary">Cadastrar Usuário</a>
                        </div>
                    </div>

                    <table class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Permissões</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->is_produto) Produto @endif
                                    @if($user->is_categoria) Categoria @endif
                                    @if($user->is_marca)  Marca @endif
                                </td>
                                <td>
                                    <a href="#modal-edit" class="btn btn-warning" data-toggle="modal" data-url="{{ route('admin.user.show', $user->id) }}" data-id="{{ $user->id }}"><i class="dripicons-pencil"></i></a>
                                    <a href="#modal-delete" class="btn btn-danger" data-toggle="modal" data-url="{{ route('admin.user.destroy', $user->id) }}"><i class="dripicons-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end row -->

        <!-- Modal Criar -->
        <div id="modal-create" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cadastrar Usuário</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.user.store') }}" method="POST" id="create-user" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Nome</label>
                                    <input type="text" id="name" name="name" class="form-control" require>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" name="email" class="form-control" require>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="permissao">Permissões</label>
                                    <div class="row ml-1">
                                        <div class="col-md-3 col-12">
                                            <input class="form-check-input" type="checkbox" value="1" name="produto">
                                            <label class="form-check-label" for="produto">
                                            Produto
                                            </label>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <input class="form-check-input" type="checkbox" value="1" name="categoria">
                                            <label class="form-check-label" for="categoria">
                                            Categoria
                                            </label>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <input class="form-check-input" type="checkbox" value="1" name="marca">
                                            <label class="form-check-label" for="marca">
                                            Marca
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" form="create-user">Cadastrar</button>
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Editar -->
        <div id="modal-edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cadastrar Usuário</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form action="#" method="POST" id="edit-user" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Nome</label>
                                    <input type="text" id="edit_name" name="name" class="form-control" require>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="text" id="edit_email" name="email" class="form-control" require>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="permissao">Permissões</label>
                                    <div class="row ml-1">
                                        <div class="col-md-3 col-12">
                                            <input class="form-check-input" type="checkbox" value="1" name="produto" id="produto">
                                            <label class="form-check-label" for="produto">
                                            Produto
                                            </label>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <input class="form-check-input" type="checkbox" value="1" name="categoria" id="categoria">
                                            <label class="form-check-label" for="categoria">
                                            Categoria
                                            </label>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <input class="form-check-input" type="checkbox" value="1" name="marca" id="marca">
                                            <label class="form-check-label" for="marca">
                                            Marca
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="edit_id" name="id">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" form="edit-user">Cadastrar</button>
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Desativar -->
        <div id="modal-delete" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Deletar Usuário</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">Tem certeza de que quer deletar esse usuário?</div>
                    <div class="modal-footer">
                        <form id="form-delete" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')

                            <button type="submit" form="form-delete" class="btn btn-danger">Deletar</button>
                        </form>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- end container -->


@endsection

@section('style')

<!-- DataTables -->
<link href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@endsection

@section('script')

<!-- Required datatable js -->
<script src="{{ asset('assets/js/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {

        var table = $('.datatable').DataTable({
            "language": {
                "sProcessing": "Aguarde enquanto os dados são carregados ...",
                "sLengthMenu": "Mostrar _MENU_ registros por pagina",
                "sZeroRecords": "Nenhum registro correspondente ao criterio encontrado",
                "sInfoEmtpy": "Exibindo 0 a 0 de 0 registros",
                "sInfo": "Exibindo de _START_ a _END_ de _TOTAL_ registros",
                "sInfoFiltered": "",
                "sSearch": "Procurar",
                "oPaginate": {
                    "sFirst": "Primeiro",
                    "sPrevious": "Anterior",
                    "sNext": "Próximo",
                    "sLast": "Último"
                }
            }
        });

        /* js para abrir Modal de deletar de forma dinâmica */
        $('#modal-delete').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            this.querySelector("form#form-delete").action = button.data('url')
        })

         /* js para abrir Modal de editar de forma dinâmica */
        $('#modal-edit').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            let modal = $(this)

            const id = button.data('id')

            $("#produto").attr("checked", false);
            $("#categoria").attr("checked", false);
            $("#marca").attr("checked", false);

            $.getJSON(button.data('url'), (resposta) => {
               
                modal.find('#edit_name').val(resposta.name)
                modal.find('#edit_email').val(resposta.email)
                modal.find('#edit_id').val(resposta.id)
                modal.find("#editar-contato").attr('action', button.data('url'));
                // Check

                if(resposta.is_produto == 1) $("#produto").attr("checked", true);
                if(resposta.is_categoria == 1) $("#categoria").attr("checked", true);
                if(resposta.is_marca == 1) $("#marca").attr("checked", true);
                //action form
                $('#edit-user').attr('action','user/' + id)
            });
        })

    });
</script>

@endsection