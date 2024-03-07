@extends('notf/notf_base')
@section('notf5')
<script>
      $(document).ready(function(){
            swal({
                    title:"Unidad Administrativa eliminada!!!",
                    text: "Se ha eliminado la Administrativa exitosamente!!!",
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
