@extends('notf/notf_base')
@section('notf50')
<script>
      $(document).ready(function(){
        swal({
                title:"Solicitud de modificacion Rechazada!!!",
                text: "¡La solicitud de modificacion presupuestaria fue rechazada!",
                type: "success",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('lista_modificacion_presupuestaria')}}";
            })
      });
</script>
@endsection