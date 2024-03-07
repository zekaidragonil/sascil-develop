@extends('notf/notf_base')
@section('notf11')
<script>
      $(document).ready(function(){
            swal({
                    title:"Nuevo Ente registrado!!!",
                    text: "El ente se guardo de forma satisfactoria!!!",
                    type: "success",
                    timer: 3000,
                    showConfirmButton: false,
                },
                function(){
                    window.location.href = "{{url('view_entes')}}";
                })
        });
</script>
@endsection
