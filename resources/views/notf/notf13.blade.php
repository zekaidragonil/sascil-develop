@extends('notf/notf_base')
@section('notf13')
<script>
      $(document).ready(function(){
            swal({
                    title:"Actualizacion de perfil!!!",
                    text: "El perfil se ha actualizado de forma exitosa!!!",
                    type: "success",
                    timer: 3000,
                    showConfirmButton: false,
                },
                function(){
                    window.location.href = "{{url('principal')}}";
                })
        });
</script>
@endsection
