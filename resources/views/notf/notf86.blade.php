@extends('notf/notf_base')
@section('notf86')
<script>
      $(document).ready(function(){
        swal({
                title:"¡Asignación Exitosa!",
                text: "¡Se ha asignado el proceso de alianza al analista seleccionado!",
                type: "success",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('lista_asignar_alianza_analista')}}";
            })
      });
</script>
@endsection