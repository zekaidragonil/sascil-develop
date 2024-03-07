@extends('notf/notf_base')
@section('notf69')
<script>
      $(document).ready(function(){
        swal({
                title:"¡Solicitud Recibida en Procura!",
                text: "¡El proceso de solicitud de contratacion se aceptado de forma Exitosa!",
                type: "success",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('analizar_solicitudes')}}";
            })
      });
</script>
@endsection