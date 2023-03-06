<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Task</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id_task" id="id_task">
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="edit-title">
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" id="edit-description" rows="3"></textarea>
        </div>
        <div class="row">
          <div class="col-8 text-end">
            <label for="add-list" class="visually-hidden">Add List</label>
            <input type="text" class="form-control" id="add-list" placeholder="Add List">
          </div>
          <div class="col-4 text-end">
            <button type="button" class="btn btn-success">Add</button>
          </div>
        </div>
        <br>
        <ul class="list-group" id="list-check">
          <li class="list-group-item">
            <div class="row">
              <div class="col-md-8">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox">
                  <label class="form-check-label" for="flexCheckDefault">
                    Belakang rumah
                  </label>
                </div>
              </div>
              <div class="col-md-4 text-end">
                <a href="#" class="text-decoration-none text-danger"><i
                    class="fa-solid fa-minus text-danger"></i></a>
              </div>
            </div>
          </li>
        </ul>
        <br>
        <br>
        <div class="text-end">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" id="save" onclick="save()">Save</button>
        </div>
      </div>
    </div>
  </div>
</div>
