@extends('notf/notf_base')
@section('notf18')
<script>
    $(document).ready(function(){
            swal({
                    title:"Solicitud Agregada!!!",
                    text: "La solicitud de contratación se ha guardado exitosamente!!!",
                    type: "success",
                    timer: 3000,
                    showConfirmButton: false,
                },
                function(){
                    window.location.href = "{{url('solicitud')}}";
                })
        });
</script>

@endsection
