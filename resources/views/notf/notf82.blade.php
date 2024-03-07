@extends('notf/notf_base')
@section('notf82')
<script>
      $(document).ready(function(){
        swal({
                title:"¡Asignacion de proceso a Analista!",
                text: "¡Se ha asignado el proceso al analista de forma exitosa!",
                type: "success",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('lista_contrataciones_regional')}}";
            })
      });
</script>
@endsection