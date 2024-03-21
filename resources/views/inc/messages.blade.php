@if ($errors->any())
<div class="alert alert-danger text-start fade show">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (session('success'))
    
    <div class="alert alert-success alert-dismissible">
        {{ session('success') }}
       
    </div>
    
@endif