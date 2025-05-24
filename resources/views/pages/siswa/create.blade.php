<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('siswa.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Tambah Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="kode_siswa">Kode Siswa</label>
                        <input type="text" class="form-control" name="kode_siswa">
                    </div>
                    <div class="mb-3">
                        <label for="nama_siswa">Nama Siswa</label>
                        <input type="text" class="form-control" name="nama_siswa">
                    </div>

                    @foreach (['C1', 'C2', 'C3', 'C4', 'C5', 'C6'] as $kode)
                        <div class="mb-3">
                            <label>Subkriteria {{ $kode }}</label>
                            <select class="form-select" name="subkriteria[{{ $kode }}]">
                                <option value="">-- Pilih --</option>
                                @foreach ($subkriterias[$kode] ?? [] as $sub)
                                    <option value="{{ $sub->id }}">{{ $sub->nama_sub_kriteria }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endforeach
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
