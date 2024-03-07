@extends('notf/notf_base')
@section('notf26')
<script>
      $(document).ready(function(){
            swal({
                    title:"Algo salio mal!!!",
                    text: "La solicitud no se guardo de forma correcta, por favor intente nuevamente.",
                    type: "error",
                    timer: 3000,
                    showConfirmButton: false,
                },
                function(){
                    window.location.href = "{{url('principal')}}";
                })
        });
</script>
@endsection
