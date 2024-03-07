@extends('notf/notf_base')
@section('notf66')
<script>
      $(document).ready(function(){
        swal({
                title:"!Error en Actualizar Estatus de Solicitud!",
                text: "¡Ocurrio un error al momento de actualizar el estatud de la solicitud, por favor intente nuevamente!",
                type: "error",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('analisis_alianza')}}";
            })
      });
</script>
@endsection