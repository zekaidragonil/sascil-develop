@extends('notf/notf_base')
@section('notf1')
<script>
    $(document).ready(function(){
            swal({
                    title:"Actualización Exitosa!!!",
                    text: "Los datos del usuario se han actualizado exitosamente!!!",
                    type: "success",
                    timer: 3000,
                    showConfirmButton: false,
                },
                function(){
                    window.location.href = "{{url('consultar_usuario')}}";
                })
        });
</script>

@endsection
