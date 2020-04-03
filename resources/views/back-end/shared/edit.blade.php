<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">{{ $pagetitle }}</h4>
                <p class="card-category">{{ $pageDesc }}</p>
            </div>
            <div class="card-body">
                {{ $slot }}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        
        {{isset($md4) ? $md4 : ''}}   
        </div>
    
</div>
