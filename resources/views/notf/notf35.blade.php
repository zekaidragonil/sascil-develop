@extends('notf/notf_base')
@section('notf35')
<script>
      $(document).ready(function(){
        swal({
                title:"Recuperación Exitosa!!!",
                text: "Hemos enviado su clave vía correo electrónico.",
                type: "success",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('/')}}";
            })
      });
</script>
@endsection
