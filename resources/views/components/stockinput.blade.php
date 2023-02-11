<div class="row justify-content-center">
    <div class="col-lg-8 col-10">
        <div class="input-group input-group mt-2">
            <span class="input-group-text" id="q">Nama</span>
            <input name="nama" type="text" class="form-control @error('nama')
                is-invalid
            @enderror" aria-describedby="q" value="{{ old('nama', $nama ?? '') }}">
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <hr class="m-4">
        <label class="form-label">Stok</label>
        <select name="persediaan" class="form-select ms-2 fs-5">
            @if (old('persediaan', $persediaan ?? '') == 'ada')
                <option value="ada">ada</option>
            @elseif (old('persediaan', $persediaan ?? '') == 'habis')
                <option value="habis">habis</option>
            @endif
            <option value="ada">ada</option>
            <option value="habis">habis</option>
        </select>
        <hr class="m-4">
        <div class="">
            <label for="r" class="form-label">Gambar<small class="tidak-wajib text-secondary ps-1">(tidak wajib untuk diisi)</small></label>
            <input name="gambar" class="form-control ms-2 @error('gambar')
                is-invalid
            @enderror" type="file" id="r">
            @error('gambar')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <hr class="m-4">
        <div class="">
            <label for="e" class="form-label">Deskripsi<small class="tidak-wajib text-secondary ps-1">(tidak wajib untuk diisi)</small></label>
            <textarea name="deskripsi" class="form-control ms-2" id="e" rows="5">{{ old('deskripsi', $deskripsi ?? '') }}</textarea>
        </div>
        <hr class="m-4">
        <div class="">
            <label for="f" class="form-label">Harga</label>
            <input name="harga" type="number" class="form-control @error('harga')
                is-invalid
            @enderror" aria-describedby="f" value="{{ old('harga', $harga ?? '') }}" placeholder="Rp">
            @error('harga')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        </div>
        <hr class="m-4">
        <div class="mb-5 tombol-submit">
            <button type="submit" class="btn btn-outline-success"><i class="fa-solid fa-plus"></i> Simpan</button>
        </div>
    </div>
</div>
