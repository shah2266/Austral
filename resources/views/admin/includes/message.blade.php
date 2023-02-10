<!-- Session message -->
<div class="row">
    <div class="col-md-12">
        @if(Session::get('success'))
        <div class="callout callout-success">
            <p>{{ Session::get('success') }}</p>
        </div>
        @elseif(Session::get('info'))
        <div class="callout callout-info">
            <p>{{ Session::get('info') }}</p>
        </div>
        @elseif(Session::get('danger'))
        <div class="callout callout-danger">
            <p>{{ Session::get('danger') }}</p>
        </div>
        @endif
    </div>
</div>
<!-- #Session message -->