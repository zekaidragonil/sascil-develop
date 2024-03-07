@extends('notf/notf_base')
@section('notf61')
<script>
      $(document).ready(function(){
        swal({
                title:"!Error en asignar proceso!",
                text: "¡hubo un inconveniente al momento de asignar elproceso por favor intente nuevamente!",
                type: "error",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('lista_espera')}}";
            })
      });
</script>
@endsection