@extends('notf/notf_base')
@section('notf70')
<script>
      $(document).ready(function(){
        swal({
                title:"¡Numero de Solicitud Asignado!",
                text: "¡EL número de solicitud de contratación a sido asignado!",
                type: "success",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('lista_solicitudes_completas')}}";
            })
      });
</script>
@endsection