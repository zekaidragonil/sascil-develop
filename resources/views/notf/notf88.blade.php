@extends('notf/notf_base')
@section('notf88')
<script>
      $(document).ready(function(){
        swal({
                title:"¡Asignacion Exitosa!",
                text: "¡Se ha asignado la solicitud Adjudicada de forma exitosa!",
                type: "success",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('view_asignar_solicitud_contrato')}}";
            })
      });
</script>
@endsection