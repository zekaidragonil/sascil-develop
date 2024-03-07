@extends('notf/notf_base')
@section('notf54')
<script>
      $(document).ready(function(){
        swal({
                title:"Solicitud enviada con Exito!!!",
                text: "¡Se ha solicitado una nueva partida presupuestaria para este proyecto!",
                type: "success",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('añadir_llave_presupuestaria')}}";
            })
      });
</script>
@endsection