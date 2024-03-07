@extends('notf/notf_base')
@section('notf71')
<script>
      $(document).ready(function(){
        swal({
                title:"¡Solicitud no recibida!",
                text: "¡La solicitud fue rechazada!",
                type: "warning",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('lista_solicitudes_completas')}}";
            })
      });
</script>
@endsection