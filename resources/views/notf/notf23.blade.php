@extends('notf/notf_base')
@section('notf23')

<script>
    $(document).ready(function(){
            swal({
                    title:"Estatus actualizado!!!",
                    text: "Se ha actualizado el estatus de la solicitud.",
                    type: "success",
                    timer: 3000,
                    showConfirmButton: false,
                },
                function(){
                    window.location.href = "{{url('lista_solicitudes_completas')}}";
                })
        });

</script>
@endsection
