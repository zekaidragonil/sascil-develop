@extends('notf/notf_base')
@section('notf45')
<script>
      $(document).ready(function(){
        swal({
                title:"Actuaización  Rechazada !!!",
                text: "La solicitud no pudo ser actualizada, por favor intente nuevamente.",
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
