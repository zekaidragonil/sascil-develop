@extends('notf/notf_base')
@section('notf20')
<script>
      $(document).ready(function(){
            swal({
                    title:"POA Cargado!!!",
                    text: "El Plan Operativo Anual se ha registrado de forma satisfactoria",
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
