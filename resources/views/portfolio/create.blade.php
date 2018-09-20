@if ($has_edit_permission)
    <div class="modal fade" id="modalPortfolio" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Enviar Portifólio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['action' => 'portfolioController@store', 'method' => 'POST']) !!}
                <div class="modal-body">

                        <div class="form-group">
                            <label for="Titulo">Título</label>
                            {{ Form::text('titulo', 'Novo Portfolio', ['class' => 'form-control', 'id' => 'portfolioTitulo']) }}
                        </div>
                            <div class="form-group">
                                <label for="descricao">Descrição</label>
                                {{ Form::textarea('descricao', '', ['class' => 'form-control', 'rows' => '3']) }}
                            </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Voltar</button>
                    {{ Form::submit('Enviar', ['class' => 'btn btn-primary']) }}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function(){
        $('#modalPortfolio').on('shown.bs.modal', function () {
            $('#portifolioTitulo').trigger('focus')
        });
    })
    </script>
@endif
