@if (SESSION('success'))  
     <div class="alert alert-success" role="alert">
             {{ session('success') }}
     </div>
@endif

@if (SESSION('warning'))  
     <div class="alert alert-warning" role="alert">
             {{ session('success') }}
     </div>
@endif

@if (SESSION('error'))  
     <div class="alert alert-danger" role="alert">
             {{ session('error') }}
     </div>
@endif