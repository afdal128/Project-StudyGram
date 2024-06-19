<div class="modal fade" id="editTaskModal" tabindex="-1" aria-labelledby="editTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('editTask') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="editTaskModalLabel">Edit Tugas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="task_id" value="{{ $selectedTask->id }}">
                    <div class="form-group">
                        <label for="name">Nama Tugas</label>
                        <input type="text" name="name" class="form-control" value="{{ $selectedTask->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea name="description" class="form-control" required>{{ $selectedTask->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="upcoming" {{ $selectedTask->status == 'upcoming' ? 'selected' : '' }}>Akan Datang</option>
                            <option value="in_process" {{ $selectedTask->status == 'in_process' ? 'selected' : '' }}>Proses</option>
                            <option value="completed" {{ $selectedTask->status == 'completed' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="due_date">Tanggal Tenggat</label>
                        <input type="date" name="due_date" class="form-control" value="{{ $selectedTask->due_date }}" required>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>