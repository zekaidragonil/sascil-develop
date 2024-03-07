@extends('notf/notf_base')
@section('notf3')
<script>
     $(document).ready(function(){
            swal({
                    title:"Usuario registrado!!!",
                    text: "El usuario que intenta ingresar ya existe!!!",
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
