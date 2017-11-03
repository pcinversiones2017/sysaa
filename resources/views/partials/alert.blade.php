@if (session('success'))
    <div class="alert alert-success  alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <a class="alert-link" href="#">{{session('success')}}</a>.
    </div>
@endif

@if (session('danger'))
    <div class="alert alert-danger  alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <a class="alert-link" href="#">{{session('danger')}}</a>.
    </div>
@endif
@if(session('update'))
<div class="alert alert-info  alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <a class="alert-link" href="#">{{session('update')}}</a>.
</div>
@endif