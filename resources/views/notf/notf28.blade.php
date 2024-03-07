@extends('notf/notf_base')
@section('notf28')
<script>
      $(document).ready(function(){
            swal({
                    title:"Algo salio mal!!!",
                    text: "Tuvimos un inconveniente al guardar la certificacion presupuestaria, por favor intente nuevamente.",
                    type: "success",
                    timer: 3000,
                    showConfirmButton: false,
                },
                function(){
                    window.location.href = "{{url('lista_certificacion')}}";
                })
        });
</script>
@endsection
