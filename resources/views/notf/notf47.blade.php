@extends('notf/notf_base')
@section('notf47')
<script>
      $(document).ready(function(){
        swal({
                title:"Solicitud Rechazada !!!",
                text: "La solicitud no se ha podido enciar, por favor intente nuevamente.",
                type: "error",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('presupuestaria')}}";
            })
      });
</script>
@endsection
