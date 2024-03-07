@extends('notf/notf_base')
@section('notf16')
<script>
    $(document).ready(function(){
            swal({
                    title:"POA no definido!!!",
                    text: "El Plan Operativo Anual de esta unidad no ha sido, pongase en contacto con el personal de presupuesto para mas información!!!",
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
