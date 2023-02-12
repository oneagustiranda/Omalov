<div class="col">
    <div class="card">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $user['name'] }} 
                <span class="badge rounded-pill bg-secondary">{{ $user['age'] }} Tahun</span>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $user['city'] }}</h6>
            <p class="card-text">Tanpa filter umur Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            
            <div class="friend-request-status">
                @include('dashboard.component.btn-friendrequest')
            </div>
            
        </div>
    </div>
</div> 