@extends('notf/notf_base')
@section('notf76')
<script>
      $(document).ready(function(){
        swal({
                title:"¡Número de Inicio de Proceso Asignado!",
                text: "¡Se asigno el número de inicio del proceso para la solicitud!",
                type: "success",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('analizar_solicitudes_recibidas')}}";
            })
      });
</script>
@endsection