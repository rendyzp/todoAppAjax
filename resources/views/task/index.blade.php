@extends('layouts.app')

@push('css')
  <style>
    .card:hover {
      cursor: pointer;
      background-color: #88F180;
    }

    .done {
      background-color: #00FFAB;
    }

    .icon:hover {
      background-color: #88F180;
    }
  </style>
@endpush

@section('search')
  <div class="input-group mt-4">
    <input type="text" class="form-control" id="key" placeholder="Search Task" aria-label="Recipient's username"
      aria-describedby="basic-addon2">
    <button class="btn btn-success" type="button" id="button-add" data-bs-toggle="modal"
      data-bs-target="#exampleModal">Add</button>
  </div>
  @includeif('task.add')
  @includeif('task.edit')

  <div class="list mt-4" id="container-list">
  </div>
@endsection

@push('js')
  <script>
    $('#key').on('keyup', function() {
      let key = $(this).val();

      $.ajax({
        type: "GET",
        url: "{{ route('task.data') }}",
        data: {
          "key": key,
        },
        dataType: "json",
        success: function(response) {
          $('#container-list').html('');
          if (response.length != 0) {
            $.each(response, function(key, item) {
              let s = item.status == 1 ? 'bg-secondary text-white' : '';
              $('#container-list').append(`              
                <div class="card ${s}) mt-3">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <h6 class="text-title">${item.title}</h6>
                      </div>
                      <div class="col-md-6 text-end">
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a href="#" class="btn btn-success btn-sm" onclick="status(${item.id_task})">
                            <i class="fa-solid fa-check"></i>
                          </a>
                          <a href="#" class="btn btn-warning btn-sm edit" data-bs-toggle="modal" data-bs-target="#edit"
                            onclick="show(${item.id_task})"><i class="fa-solid fa-pen-to-square"></i>
                          </a>
                          <a href="#" class="btn btn-danger btn-sm" onclick="trash(${item.id_task})">
                            <i class="fa-solid fa-trash"></i>
                          </a>
                        </div>
                      </div>
                    </div>${item.description}</div>
                </div>
              `);
            });
          } else if (response.length == 0) {
            $('#container-list').append(`
              <div class='alert alert-danger text-center'>
              <h5>Tidak Ditemukan</h5>
              </div>
            `);
          } else {
            dataTask();
          }
        }
      });
    });

    dataTask();

    function dataTask() {
      $.ajax({
        type: "GET",
        url: "{{ route('task.data') }}",
        dataType: "json",
        success: function(response) {
          $('#container-list').html('');
          if (response.length != 0) {
            $.each(response, function(key, item) {
              let s = item.status == 1 ? 'bg-secondary text-white' : '';
              $('#container-list').append(`              
                <div class="card ${s}) mt-3">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <h6 class="text-title">${item.title}</h6>
                      </div>
                      <div class="col-md-6 text-end">
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a href="#" class="btn btn-success btn-sm" onclick="status(${item.id_task})">
                            <i class="fa-solid fa-check"></i>
                          </a>
                          <a href="#" class="btn btn-warning btn-sm edit" data-bs-toggle="modal" data-bs-target="#edit"
                            onclick="show(${item.id_task})"><i class="fa-solid fa-pen-to-square"></i>
                          </a>
                          <a href="#" class="btn btn-danger btn-sm" onclick="trash(${item.id_task})">
                            <i class="fa-solid fa-trash"></i>
                          </a>
                        </div>
                      </div>
                    </div>${item.description}</div>
                </div>
              `);
            });
          }
        }
      });
    }

    function dataSubtask(id_task) {
      $.ajax({
        type: "GET",
        url: "{{ url('/task') }}/" + id_task,
        dataType: "json",
        success: function(response) {
          $('#list-check').html('');
          if (response.subtask.length != 0) {
            $.each(response.subtask, function(key, item) {
              let s = item.status == 1 ? 'checked' : '';
              $('#list-check').append(`
              <li class="list-group-item">
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="${item.id_subtask}" ${s} id="flexCheckDefault" onclick="statusSubtask(${item.id_subtask}, ${item.id_task})">
                      <label class="form-check-label" for="flexCheckDefault">
                        ${item.subtask}
                      </label>
                    </div>
                  </div>
                  <div class="col-md-4 text-end">
                    <a href="#" class="text-decoration-none text-danger" onclick="deleteSubtask(${item.id_subtask}, ${item.id_task})"><i class="fa-solid fa-minus text-danger"></i></a>
                  </div>
                </div>
              </li>
              `);
            });
          } else {
            $('#list-check').append(`
              <div class="alert alert-info text-center">
                <h5>Belum ada subtask</h5>  
              </div>
            `);
          }
        }
      });
    }

    function addTask() {
      $('#add-task').removeAttr('onclick');

      let title = $('#title').val();
      let description = $('#description').val();

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
      });

      $.ajax({
        type: "POST",
        url: "{{ route('task.store') }}",
        data: {
          'title': title,
          'description': description,
        },
        dataType: "json",
        success: function(response) {
          if (response.status == 200) {
            $('#title').val('');
            $('#description').val('');
            $('.modal').removeClass('show');
            $('.modal').css('display', 'none');
            $('.modal-backdrop').remove();
            $('.body').removeAttr('class');
            $('.body').removeAttr('style');
            $('#add-task').attr('onclick', 'addTask()');
            dataTask();
          }
        }
      });
    }

    function status(id_task) {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
      });

      $.ajax({
        type: "PUT",
        url: "{{ url('/status') }}/" + id_task,
        dataType: "json",
        success: function(response) {
          if (response.status == 200) {
            dataTask();
          }
        }
      });
    }

    function show(id_task) {
      $.ajax({
        type: "GET",
        url: "{{ url('/task') }}/" + id_task,
        dataType: "json",
        success: function(response) {
          $('#id_task').val(response.id_task)
          $('#edit-title').val(response.title)
          $('#edit-description').val(response.description)

          if (response.subtask.length != 0) {
            dataSubtask(response.id_task)
          } else {
            $('#list-check').append(`
              <div class="alert alert-info text-center">
                <h5>Belum ada subtask</h5>  
              </div>
            `);
          }
        }
      });
    }

    function trash(id_task) {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
      });

      $.ajax({
        type: "DELETE",
        url: "{{ url('/task') }}/" + id_task,
        dataType: "json",
        success: function(response) {
          if (response.status == 200) {
            dataTask();
          }
        }
      });
    }

    function save() {
      $('#save').removeAttr('onclick');

      let id_task = $('#id_task').val();
      let title = $('#edit-title').val();
      let description = $('#edit-description').val();

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
      });

      $.ajax({
        type: "PUT",
        url: "{{ url('/task') }}/" + id_task,
        data: {
          'title': title,
          'description': description,
        },
        dataType: "json",
        success: function(response) {
          if (response.status == 200) {
            $('.modal').removeClass('show');
            $('.modal').css('display', 'none');
            $('.modal-backdrop').remove();
            $('.body').removeAttr('class');
            $('.body').removeAttr('style');
            $('#save').attr('onclick', 'save()');
            dataTask();
          }
        }
      });
    }
  </script>
@endpush
