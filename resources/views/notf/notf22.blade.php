@extends('notf/notf_base')
@section('notf22')
<script>
      $(document).ready(function(){
            swal({
                    title:"Algo no esta bien!!!!!!",
                    text: "El punto de cuenta ya existe, por favor intente nuvamente",
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
