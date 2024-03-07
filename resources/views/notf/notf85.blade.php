@extends('notf/notf_base')
@section('notf85')
<script>
      $(document).ready(function(){
        swal({
                title:"¡Error en Actualizar estatus!",
                text: "¡Hubo un error al actualizar el estatus de la solicitud, intente nuevamente!",
                type: "error",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('analizar_solicitudes_consultor')}}";
            })
      });
</script>
@endsection