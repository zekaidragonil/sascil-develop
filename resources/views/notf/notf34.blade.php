@extends('notf/notf_base')
@section('notf34')
<script>
      $(document).ready(function(){
        swal({
                title:"No ha iniciado Sesión!!!",
                text: "Para ingresar al sistema debe autenticarse.",
                type: "warning",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('/')}}";
            })
      });
</script>
@endsection
