@extends('notf/notf_base')
@section('notf96')
<script>
      $(document).ready(function(){
        swal({
                title:"¡Traspaso Realizado!",
                text: "¡Movimiento prespuestario realizado de forma exitosa!",
                type: "success",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('view_traspaso_entre_unidades')}}";
            })
      });
</script>
@endsection