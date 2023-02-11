<div class="col-6 col-lg-2 col-md-4">
    <div class="card mb-2">
        <div class="card-header bg-secondary">
            <h3 class="text-light">{{ $nama }}</h3>
        </div>
        <div class="card-body row">
            @if($gambar)
                <img loading="lazy" src="{{ asset('storage/' . $gambar) }}" alt="gambar-produk-{{ $slug }}" height="120" class="mb-3">
            @else
                <small>tidak ada gambar</small>
            @endif
            <hr>
                <small class="text-secondary mb-3">Rp {{ $harga }}</small>
            <hr>
            @if ($persediaan == 'habis')
                <span class="btn btn-outline-secondary disabled">stok habis</span>
            @elseif ($persediaan == 'ada')
                <a href="{{ route('transactionInput', $slug) }}" class="btn btn-outline-secondary">Beli</a>
            @endif
        </div>
    </div>
</div>
