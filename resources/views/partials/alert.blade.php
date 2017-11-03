@if (session('success'))
    <div class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        {!! session('success') !!}.
    </div>
@endif

@if (session('danger'))
    <div class="alert alert-danger alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        {!! session('danger') !!}.
    </div>
@endif