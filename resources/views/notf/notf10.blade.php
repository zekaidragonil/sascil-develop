@extends('notf/notf_base')
@section('notf10')
<script>
      $(document).ready(function(){
            swal({
                    title:"Error al actualizar!!!",
                    text: "Ocurrio un error al momento de la actualización, por favor intente nuevamente!!!",
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
