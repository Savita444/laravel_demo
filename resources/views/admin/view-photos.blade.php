@include('admin/header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View / Manage Latest Photo Gallary</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">View / Delete Photos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead valign="center">
                  <tr>
                    <th>Titel of Photo</th>
                    <th>Details of Photo</th>
                    <th>Type of Photo</th>
                    <th>Image Preview</th>
                    <th>Delete Data</th>
                  </tr>
                  </thead>

                  @foreach($arr as $photos)
                   <tr>
                    <td>{{$photos->title}}</td>
                    <td>{{$photos->details}}</td>             
                    <td>{{$photos->type}}</td>             
                    <td align="center">
                      <div style="width: 250px; height: 200px;"><img src="{{asset('images/'.$photos->image)}}" style="height: 100%; width: 100%; object-fit: cover;"></td></div>  
                    <td><a href="/admin/edit-photos/{{$photos->id}}" class="btn btn-primary">Edit</button></td>
                    <td><a href="/admin/view-photos/{{$photos->id}}" class="btn btn-primary">Delete</button></td>
                  </tr>
                  @endforeach

                  <tr>
                   <td height="50" colspan="4" align="center"><a href="/admin/add-photos" class="btn btn-primary">Add New Photos</a></td>
                  </tr>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@include('admin/footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('admin/scripts')
