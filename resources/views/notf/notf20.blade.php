@extends('notf/notf_base')
@section('notf20')
<script>
      $(document).ready(function(){
            swal({
                    title:"POA Vigente!!!",
                    text: "El plan operativo anual de esta oficina aun esta vigente",
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
