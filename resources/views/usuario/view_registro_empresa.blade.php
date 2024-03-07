@extends('principal')
@section('view_registro_empresa')
<div class="col-lg-12 col-xs-12">    
    <div class="box-content card white">
        <h4 class="box-title">Registro de Empresa</h4>
        <!-- /.box-title -->
        <div class="card-content col-lg-12">
            <form action="{{url('registro_empresa')}}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-group col-lg-12">
                    <div class="col-lg-6">
                        <label for="inp-type-1" class="control-label">Nombre de la Empresa</label>
                        <input type="text" class="form-control" required name="nombre_empresa" id="nombre_empresa" placeholder="Indique el nombre de la empresa a registrar">
                    </div>
                    <div class="col-lg-6">
                        <label for="inp-type-4" class="control-label">Rif</label>
                        <input type="text" class="form-control" required name="rif" id="rif" placeholder="J-123456789">
                    </div>
                    <div class="col-lg-6">
                        <label for="inp-type-2" class="control-label">Email</label>
                        <input type="email" class="form-control" required name="email" id="email" placeholder="Indique el correo Electrónico de la Empresa">
                    </div>
                    <div class="col-lg-6">
                        <label for="inp-type-3" class="control-label">Teléfono</label>
                        <input type="text" class="form-control" onkeypress="return SoloNumeros(event)" required name="telefono" id="telefono" placeholder="Teléfono">
                    </div>
                    <div class="col-lg-6">
                        <label for="inp-type-3" class="control-label">Estado</label>
                        <select class="form-control" required name="estado" id="estado">
                            <option value="" selected>- Seleccione -</option>
                            @foreach ($estado as $key => $value)
                                <option value="{{$value->id}}">{{$value->estado}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="inp-type-3" class="control-label">Municipio</label>
                        <select class="form-control" required name="municipio" id="municipio"></select>
                    </div>
                    <div class="col-lg-6">
                        <label for="inp-type-3" class="control-label">Parroquia</label>
                        <select class="form-control" required name="parroquia" id="parroquia"></select>
                    </div>
                    <div class="col-lg-6">
                        <label for="inp-type-3" class="control-label">Tipo de Empresa</label>
                        <select class="form-control" required name="tipo_empresa">
                            <option value="">- Seleccionar -</option>
                            @foreach ($tipo_empresa as $key => $value)
                                <option value="{{$value->id}}">{{$value->tipo}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="inp-type-5" class="control-label">Dirección</label>
                        <textarea class="form-control"  name="direccion" maxlength="3000" id="textarea" placeholder="Indique la dirección exacta de la Empresa"></textarea>
                    </div>
                    <div class="col-lg-6">
                        <label for="inp-type-5" class="control-label">Objeto de la empresa</label>
                        <textarea class="form-control"  name="objeto_empresa" maxlength="3000" id="textarea" placeholder="Describa el objeto y la actividad comercial realizada por la empresa"></textarea>
                    </div>
                    <div class="col-lg-12">
                        <br><button type="submits" class="btn btn-rounded btn-success btn-effect">Agregar <i class="fa fa-check"></i></button>
                        <a class="btn btn-rounded btn-warning btn-effect" href="{{url('principal')}}"><i class="fa fa-arrow-left"></i> Ir Atras</a>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-content -->
    </div>
    <!-- /.box-content card white -->
    <div class="col-xs-12">
        <div class="box-content">
            <h4 class="box-title">Empresas Registradas</h4>
            <!-- /.dropdown js__dropdown -->
            <br>
            <table id="example" class="table table-striped table-bordered display">
                <thead>
                    <tr>
                        <th>Nombre de le Empresa</th>
                        <th>Rif</th>
                        <th>Tipo de Empresa</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nombre de le Empresa</th>
                        <th>Rif</th>
                        <th>Tipo de Empresa</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($empresa as $key=>$value)
                        <tr>
                            <td>
                                <label>
                                    {{$value->nombre}}
                                </label>
                            </td>
                            <td>
                                <label style="margin-top: 12px;">
                                    {{$value->rif}}
                                </label>
                            </td>
                            <td>
                                <label style="margin-top: 12px;" >
                                    {{$value->tipo}}
                                </label>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="assets/scripts/query-git.js"></script>
<script>
    function SoloNumeros(evt){
        if(window.event){//asignamos el valor de la tecla a keynum
        keynum = evt.keyCode; //IE
        }
        else{
        keynum = evt.which; //FF
        }
        //comprobamos si se encuentra en el rango numérico y que teclas no recibirá.
        if((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6 ){
        return true;
        }
        else{
        return false;
        }
    }
</script>
@endsection