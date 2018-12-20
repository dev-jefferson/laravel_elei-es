<div class="card">
    <div class="card-body">
        <div class="col-10">
            <div class="row">

                <div class="col-8">
                    <div class="row">
                        <div class="col-5">
                            <div class="card bg-dark text-white">
                                <img id="fotoCandidato" style="height:250px;" class="card-img" src="{{ asset('imgs/candidato.png') }}" alt="Card image">
                                <div class="card-img-overlay">
                                </div>
                            </div>
                        </div>
                        <div class="col-7">
                            <blockquote class="blockquote text-center">
                                <footer class="blockquote-footer">Tribunal Regional Eleitoral <cite title="Source Title">TSE</cite></footer>
                                <h3 class="mb-0">{{ $categoria_candidato }}</h3>
                            </blockquote>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <label id="lblNumero" class="control-label lbl">&nbsp;</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label id="lblNome" class="control-label lbl">&nbsp;</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label id="lblPartido" class="control-label lbl">&nbsp;</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Inicio do teclado --}}
                <div class="col-4" style="background-color: #2B3A42;">
                    <br>
                    <div class="row  justify-content-center">
                        <form id="confirmar_voto">
                            <div class="form-group row">
                                @csrf
                                <div class="col-sm-3 offset-sm-3">
                                    <input id="num1" name="num1" type="text" readonly="true" class="form-control form-control-lg">
                                </div>
                                <div class="col-sm-3">
                                    <input id="num2" name="num2" type="text" readonly="true" class="form-control form-control-lg">
                                </div>
                            </div>
                        </form>
                    </div>
                    <br>
                    <br>

                    <div class="row  justify-content-center">
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                <button type="button" class="num btn btn-secondary" value="1">1</button>
                            </div>
                            <div class="btn-group mr-2" role="group" aria-label="Second group">
                                <button type="button" class="num btn btn-secondary" value="2">2</button>
                            </div>
                            <div class="btn-group mr-2" role="group" aria-label="Third group">
                                <button type="button" class="num btn btn-secondary" value="3">3</button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row  justify-content-center">
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                <button type="button" class="num btn btn-secondary" value="4">4</button>
                            </div>
                            <div class="btn-group mr-2" role="group" aria-label="Second group">
                                <button type="button" class="num btn btn-secondary" value="5">5</button>
                            </div>
                            <div class="btn-group mr-2" role="group" aria-label="Third group">
                                <button type="button" class="num btn btn-secondary" value="6">6</button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row  justify-content-center">
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                <button type="button" class="num btn btn-secondary" value="7">7</button>
                            </div>
                            <div class="btn-group mr-2" role="group" aria-label="Second group">
                                <button type="button" class="num btn btn-secondary" value="8">8</button>
                            </div>
                            <div class="btn-group mr-2" role="group" aria-label="Third group">
                                <button type="button" class="num btn btn-secondary" value="9">9</button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="btn-group mr-2" role="group" aria-label="First group">
                        <button type="button" class="num btn btn-secondary" value="0">0</button>
                        </div>
                    </div>
                    <br>
                    <div class="row  justify-content-center">
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                <button id="branco" type="button" class="btn btn-light">Branco</button>
                            </div>
                            <div class="btn-group mr-2" role="group" aria-label="Second group">
                                <button id="corrigir" type="button" class="btn btn-warning">Corrigir</button>
                            </div>
                            <div class="btn-group mr-2" role="group" aria-label="Third group">
                                <button id="confirmar" type="submit" class="btn btn-success">Confirmar</button>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                {{-- Fim do teclado --}}
            </div>
        </div>
    </div>
</div>


@section('js')
    <script>
        $(function () {
            digitacao();
        });

        function digitacao() {
            //alert("ok");
            $('.num').click(function(e){
                var valor = $(this).val();
                //var nome = $(this).attr('name');
                if ($.trim($("#num1").val()) == "") {
                    $('#num1').val(valor);
                } else if ($.trim($("#num2").val()) == "") {
                    $('#num2').val(valor);
                }

                if ($.trim($("#num1").val()) != "" && $.trim($("#num2").val()) != "") {
                    consultar();
                }
            });

            $("#corrigir").click(function (e) {
                e.preventDefault();
                e.stopPropagation();
                limparVoto();
            });
        }

        function consultar() {

            if ($.trim($("#num1").val()) != "" && $.trim($("#num2").val()) != "") {

                var num_pesquisa = $('#num1').val() + $('#num2').val();

                const formData = {
                    '_token'        : "{{ csrf_token() }}",
                    'categoria'     : "{{ $categoria_candidato }}"
                };

                //console.log(formData);


                $.ajax({
                    type        : 'POST',
                    url         : "{{url('consultar_candidato/')}}"+"/"+num_pesquisa,
                    data        : formData,
                    encode      : true,
                    success:function(data) {
                        //console.log(data == "Erro");

                        if (data != null && data != undefined && data != "Erro") {
                            console.log("chegando");

                            $("#lblNumero").text("NÚMERO: " + data.numero);
                            $("#lblNome").text("NOME: " + data.nome);
                            $("#lblPartido").text("PARTIDO: " + data.partido);
                            $("#fotoCandidato").removeAttr("src");
                            $("#fotoCandidato").attr("src", "{{ asset('imgs/') }}"+"/"+data.img);
                            $("#confirmar_voto").attr("action", "{{ route('confirmar_voto') }}");
                            $("#confirmar_voto").attr("method", "post");
                        }else{
                            limpaTela();
                            $("#confirmar_voto").removeAttr("action");
                            $("#confirmar_voto").removeAttr("method");
                            $("#lblNome").text("NÚMERO DE CANDIDATO INVÁLIDO!");
                        }
                    },
                    error:function(data) {
                        console.log("erro");
                    },
                });
            }else{
                console.log("numero incompleto");
            }

        }

        function limparVoto() {
            //console.log("chegando");

            $("#num1").val("");
            $("#num1").removeAttr("placeholder");
            $("#num2").val("");
            $("#num2").removeAttr("placeholder");
            limpaTela();

        }

        function limpaTela() {

            $("#lblNumero").html("&nbsp;");
            $("#lblNome").html("&nbsp;");
            $("#lblPartido").html("&nbsp;");
            $("#fotoCandidato").removeAttr("src");
            $("#fotoCandidato").attr("src", "{{ asset('imgs/candidato.png') }}");
        }


        $("#branco").click(function (e) {
            e.preventDefault();
            e.stopPropagation();
            votoBranco();
        });

        $("#confirmar").click(function (e) {
            e.preventDefault();
            e.stopPropagation();
            confirmarVoto();
        });

        function votoBranco() {
            alert("branco");
        }

        function confirmarVoto() {
            if ($.trim($("#num1").val()) != "" && $.trim($("#num2").val()) != "") {
                $('#confirmar_voto').submit();
                //alert("confirmar");
            }else{
                $("#lblNome").text("DIGITE UM NÚMERO!");
            }
        }

    </script>
@endsection

