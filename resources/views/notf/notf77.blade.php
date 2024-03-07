@extends('notf/notf_base')
@section('notf77')
<script>
      $(document).ready(function(){
        swal({
                title:"¡Error en asignar número de Solicitud!",
                text: "¡El numero de inicio de proceso no pude ser asignado, por favor intente nuevamente!",
                type: "warning",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('analizar_solicitudes_recibidas')}}";
            })
      });
</script>
@endsection