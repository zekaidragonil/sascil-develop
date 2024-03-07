@extends('notf/notf_base')
@section('notf1')
{{--
<div class="example-content">
	<div class="notf1" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<img src="assets/images/Deletet1.gif" alt="">
				<div class="modal-header">
					<h4 class="modal-title">Acceso Denegado!!!</h4>
				</div>
				<div class="modal-body">
					<p>Usuario y/o Clave incorrecto&hellip;</p>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</div>
--}}
<script>

$(document).ready(function(){
            swal({
                    title: "¡Error en Autenticación!",
                    text:  "Usuario y/o clave incorrecta intente nuevamente",
                    type:  "error",
                    showConfirmButton: false,
                    timer: 3000
                },
                function(){
                    window.location.href = "{{url('/')}}";
                })
        });

</script>

@endsection
