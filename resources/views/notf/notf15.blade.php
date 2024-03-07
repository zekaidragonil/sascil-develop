@extends('notf/notf_base')
@section('notf15')

<script>
      $(document).ready(function(){
            swal({
                    title:"Unidad administratica no existe!!!",
                    text: "La unidad administrativa al cual esta adscrito no existe!!!",
                    type: "success",
                    timer: 3000,
                    showConfirmButton: false,
                },
                function(){
                    window.location.href = "{{url('consultar_usuario')}}";
                })
        });
</script>

@endsection
