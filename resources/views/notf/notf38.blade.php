@extends('notf/notf_base')
@section('notf38')
<script>
      $(document).ready(function(){
        swal({
                title:"Carga masiva Exitosa!!!",
                text: "La carga de proyectos y Partidas presupuestarias se realizao de forma exitosa.",
                type: "success",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('principal')}}";
            })
      });
</script>
@endsection
