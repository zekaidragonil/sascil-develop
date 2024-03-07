@extends('notf/notf_base')
@section('notf75')
<script>
      $(document).ready(function(){
        swal({
                title:"¡Error en asignar número de alianza!",
                text: "¡El numero de inicio de proceso no pude ser asignado, por favor intente nuevamente!",
                type: "warning",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('lista_alianzas_recibidas')}}";
            })
      });
</script>
@endsection