@extends('notf/notf_base')
@section('notf56')
<script>
      $(document).ready(function(){
        swal({
                title:"Solicitud Enviada!!!",
                text: "¡La solicitud de alianza ha sido enviada!",
                type: "success",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('view_solicitar_alianza')}}";
            })
      });
</script>
@endsection