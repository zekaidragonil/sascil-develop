@extends('notf/notf_base')
@section('notf42')
<script>
      $(document).ready(function(){
        swal({
                title:"Solicitud Rechazada !!!",
                text: "La solicitud de traspaso presupuestario fue rechazada.",
                type: "error",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('transferencia_presupuestaria')}}";
            })
      });
</script>
@endsection
