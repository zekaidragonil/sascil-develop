@extends('notf/notf_base')
@section('notf36')
<script>
      $(document).ready(function(){
        swal({
                title:"Lista vacia!!!",
                text: "La lista de solictud de transferencias esta vacia.",
                type: "warning",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('principal')}}";
            })
      });
</script>
@endsection
