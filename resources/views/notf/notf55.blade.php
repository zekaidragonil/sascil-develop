@extends('notf/notf_base')
@section('notf55')
<script>
      $(document).ready(function(){
        swal({
                title:"Solicitud en Proceso!!!",
                text: "¡Ya existe una solicitud de adisión de esta partida presupuestaria, con este fondo a este proyecto!",
                type: "error",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('añadir_llave_presupuestaria')}}";
            })
      });
</script>
@endsection