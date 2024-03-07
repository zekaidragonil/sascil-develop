@extends('notf/notf_base')
@section('notf89')
<script>
      $(document).ready(function(){
        swal({
                title:"¡Error en Asignar!",
                text: "¡Ocurrio un error en la asignación por favor intente nuevamente!",
                type: "error",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('lista_asignar_alianza_analista')}}";
            })
      });
</script>
@endsection