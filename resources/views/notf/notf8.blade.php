@extends('notf/notf_base')
@section('notf8')
<script>
      $(document).ready(function(){
            swal({
                    title:"Error al ingresar la unidad!!!",
                    text: "La unidad que intenta ingresar ya existe para este Ente.!!!",
                    type: "error",
                    timer: 3000,
                    showConfirmButton: false,
                },
                function(){
                    window.location.href = "{{url('view_entes')}}";
                })
        });
</script>
@endsection
