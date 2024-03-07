@extends('notf/notf_base')
@section('notf43')
<script>
      $(document).ready(function(){
        swal({
                title:"Transferencia Realizada!!!",
                text: "La transferencia presupuestaria se realizo de forma exitosa",
                type: "success",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('transferencia_presupuestaria')}}";
            })
      });
</script>
@endsection
