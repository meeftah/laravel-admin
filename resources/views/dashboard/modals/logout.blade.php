<div class="modal fade" id="logoutModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white">
                    Logout
                </h5>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin keluar?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Batal</button>
                <a href="javascript: void(0);" class="btn btn-sm btn-danger"
                    onclick="event.preventDefault(); document.getElementById('logoutform').submit();">Logout</a>
                <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>