@extends('notf/notf_base')
@section('notf6')
<script>
      $(document).ready(function(){
            swal({
                    title:"No se puede eliminar la unidad!!!",
                    text: "Al parecer la unidad tiene usuarios asignados, debe deshabilitar a los usuarios para eliminar la unidad.!!!",
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
