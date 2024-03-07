@extends('notf/notf_base')
@section('notf79')
<script>
      $(document).ready(function(){
        swal({
                title:"¡Error al asignar el traspaso!",
                text: "¡El proceso de traspaso no pudo ser asignado por favor intente nuevamente!",
                type: "error",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('asignar_traspaso')}}";
            })
      });
</script>
@endsection