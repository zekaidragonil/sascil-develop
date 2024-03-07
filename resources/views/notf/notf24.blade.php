@extends('notf/notf_base')
@section('notf24')

<script>
      $(document).ready(function(){
            swal({
                    title:"Algo no esta bien!!!",
                    text: "La Solicitud no se actualizo por favor intente de nuevo.",
                    type: "success",
                    timer: 3000,
                    showConfirmButton: false,
                },
                function(){
                    window.location.href = "{{url('solicitud')}}";
                })
        });

</script>
@endsection
