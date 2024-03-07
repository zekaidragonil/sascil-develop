@extends('notf/notf_base')
@section('notf32')
<script>
      $(document).ready(function(){
        swal({
                title:"Error al Cargar la asignación!!!",
                text: "No es posible que asignar una partida presupuestaria a este proyecto.",
                type: "error",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('lista_poa')}}";
            })
      });
</script>
@endsection
