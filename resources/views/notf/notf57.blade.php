@extends('notf/notf_base')
@section('notf57')
<script>
      $(document).ready(function(){
        swal({
                title:"Error en evio!!!",
                text: "¡La solicitud no se pudo enviar por favor intente nuevamente!",
                type: "error",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('view_solicitar_alianza')}}";
            })
      });
</script>
@endsection