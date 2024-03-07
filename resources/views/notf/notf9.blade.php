@extends('notf/notf_base')
@section('notf9')

<script>
      $(document).ready(function(){
            swal({
                    title:"Actualización exitosa!!!",
                    text: "La unidad administrativa se ha actualizado satisfactoriamente!!!",
                    type: "success",
                    timer: 3000,
                    showConfirmButton: false,
                },
                function(){
                    window.location.href = "{{url('view_entes')}}";
                })
        });
</script>
@endsection
