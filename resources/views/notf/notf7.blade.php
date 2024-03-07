@extends('notf/notf_base')
@section('notf7')
<script>
      $(document).ready(function(){
            swal({
                    title:"Unidad administrativa agregada!!!",
                    text: "La unidad administrativa se agrego al ente satisfactoriamente.!!!",
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
