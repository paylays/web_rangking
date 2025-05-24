<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('siswa.import') }}" method="POST" enctype="multipart/form-data" id="import-form">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Import Excel Alternatif Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Silakan unggah file Excel (.xlsx) sesuai format yang telah disediakan.</p>
                    
                    <div class="mb-3">
                        <label for="file_excel_siswa" class="form-label">Pilih File Excel</label>
                        <input type="file" class="form-control" id="file_excel_siswa" name="file_excel_siswa" required accept=".xlsx,.xls">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Import Sekarang</button>
                </div>
            </div>
        </form>
    </div>
</div>
