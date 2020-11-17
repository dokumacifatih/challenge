@extends('layouts.app')
@section('title', 'Calculate new')

@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-6">
                <div class="p-5">
                    <form class="user">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="binary" placeholder="Enter the binary number...">
                        </div>
                        <a href="#" class="btn btn-primary btn-user btn-block" onclick="calculate()">
                            Calculate
                        </a>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="big" href="#">Result: <span id=result> NAN </span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
<script>
    function calculate() {
        var pattern = /[^0-1]/;
        if (pattern.test($("#binary").val())) {
            alert('You entered invalid Binary. Please try again.');
            $("#result").html('Invalid Binary');
            return false;
        }

        $.ajax({
            url: "/fsm",
            type: "POST",
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                binary: $("#binary").val()
            },
            success: function(data, textStatus, jqXHR) {
                $("#result").html(data.result + "<br>" +data.detail);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $("#result").html(textStatus + ' - ' + jqXHR.status + ' - ' + errorThrown + ' - ' + jqXHR.responseJSON.message);
            }
        });
    }
</script>

@endsection