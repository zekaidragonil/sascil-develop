@extends('notf/notf_base')
@section('notf83')
<script>
      $(document).ready(function(){
        swal({
                title:"¡Actualización de Estatus Realizada!",
                text: "¡La actualización del estaus de la solicitud se ha realizado de forma exitosa!",
                type: "success",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('analizar_solicitudes_consultor')}}";
            })
      });
</script>
@endsection