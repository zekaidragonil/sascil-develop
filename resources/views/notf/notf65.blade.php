@extends('notf/notf_base')
@section('notf65')
<script>
      $(document).ready(function(){
        swal({
                title:"!Actualizacion realizada!",
                text: "¡Se ha revisado la Solicitud de alianza y esta a la espera de su aprobación!",
                type: "success",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('lista_alianzas_aceptadas')}}";
            })
      });
</script>
@endsection