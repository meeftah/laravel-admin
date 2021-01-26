<div class="modal fade" id="update-status" data-backdrop="static" data-keyboard="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header panel-heading bg-info text-center">
                <h4 class="modal-title text-white">UPDATA STATUS CALON SISWA</h4>
            </div>
            <div class="modal-body">
                <select id="id_status_casis" name="id_status_casis" class="form-control select2-show-search"
                    style="width: 100%" data-placeholder="PILIH STATUS">
                    <option></option>
                    @foreach ($status_casis as $item)
                    <option value="{{ $item->id_status_casis }}">
                        {{ strtoupper($item->status) }}
                    </option>
                    @endforeach
                </select>
                <p class="mt-4">Apakah anda yakin ingin update status calon siswa ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-sm btn-success" id="btn-update">Ya, Update</button>
            </div>
        </div>
    </div>
</div>