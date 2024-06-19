<div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTaskModalLabel">Tambah Tugas Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/add-task">
                    @csrf
                    <div class="form-group">
                        <label for="taskName">Nama Tugas</label>
                        <input type="text" class="form-control" id="taskName" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="taskName">Deadline</label>
                        <input type="date" class="form-control" id="taskDate" name="due_date" required>
                    </div>
                    <div class="form-group">
                        <label for="taskStatus">Status</label>
                        <select class="form-control" id="taskStatus" name="status" required>
                            <option value="upcoming">Akan Datang</option>
                            <option value="in_process">Proses</option>
                            <option value="completed">Selesai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="taskDescription">Deskripsi</label>
                        <textarea class="form-control" id="taskDescription" name="description" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>