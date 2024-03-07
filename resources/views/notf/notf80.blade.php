@extends('notf/notf_base')
@section('notf80')
<script>
      $(document).ready(function(){
        swal({
                title:"¡Asignación Exitosa!",
                text: "¡Se ha asignado la solicitud de modificación presupuestaria de forma exitosa!",
                type: "success",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('asignar_modificacion')}}";
            })
      });
</script>
@endsection