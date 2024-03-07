@extends('notf/notf_base')
@section('notf4')
<script>
      $(document).ready(function(){
            swal({
                    title:"Registro exitoso!!!",
                    text: "El usuarios se a creado satisfactoriamente!!!",
                    type: "success",
                    timer: 3000,
                    showConfirmButton: false,
                },
                function(){
                    window.location.href = "{{url('principal')}}";
                })
        });
</script>
@endsection
