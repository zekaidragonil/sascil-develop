@extends('notf/notf_base')
@section('notf64')
<script>
      $(document).ready(function(){
        swal({
                title:"!Asignación Realizada!",
                text: "¡Se ha asignado la solicitud de alianza al analista!",
                type: "success",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('lista_asignar_alianza')}}";
            })
      });
</script>
@endsection