        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Book List</h1>
            <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#formadd"><i class="fas fa-plus fa-sm"></i>Add Book</button>
          </div>
          <!-- Project Card Example -->
          <table class="table table-striped">
            <tr>
              <th>No</th>
              <th>Image</th>
              <th>ISBN</th>
              <th>Title</th>
              <th>Author</th>
              <th>Publisher</th>
              <th>Year</th>
              <th>Weight</th>
              <th>Language</th>
              <th>Category</th>
              <th>Description</th>
              <th>Price</th>
              <th>Stock</th>
              <th colspan="3"></th>
            </tr>
            <?php
            $var = 0;
            if (!empty($barang)) {
              foreach ($barang as $data) {

                $var = $var + 1;
                echo "<tr>
          <td>$var</td>
          <td><img src='" . base_url() . "/uploads/$data->image' width='20'></td>
          <td>" . $data->isbn . "</td>
          <td>" . $data->title . "</td>
          <td>" . $data->author . "</td>
          <td>" . $data->publisher . "</td>
          <td>" . $data->year . "</td>
          <td>" . $data->weight . "</td>
          <td>" . $data->lang . "</td>
          <td>" . $data->category . "</td>
          <td>" . substr($data->description, 0, 50) . "</td>
          <td>" . $data->price . "</td>
          <td>" . $data->stock . "</td>
          <td><a href='" . base_url("admin/gotobookedit/" . $data->isbn) . "'><div class='btn btn-primary btn-sm'><i class='fa fa-edit'></i></div></a></td>
          <td><a href='" . base_url("book/deletebook/" . $data->isbn) . "'><div class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></div></a></td>
          </tr>";
              }
            } else {
              echo "<tr><td align='center' colspan='12'>Empty</td></tr>";
            }
            ?>
          </table>

        </div>
        <!-- /.container-fluid -->
        <div class="modal fade" id="formadd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <?php echo form_open_multipart("book/addbook/"); ?>
              <div class="modal-body">
                <!-- <div class="form-group row"><label for="inputPassword" class="col-sm-2 col-form-label">Password<div class="col-sm-10"><input type="password" class="form-control" id="inputPassword" placeholder="Password"></div></div> -->
                <div class="form-group row"><label for="input_isbn" class="col-sm-2 col-form-label">ISBN</label><div class="col-sm-10"><input type="text" name="input_isbn" class="form-control"></div></div>
                <div class="form-group row"><label for="input_title" class="col-sm-2 col-form-label">Title</label><div class="col-sm-10"><input type="text" name="input_title" class="form-control"></div></div>
                <div class="form-group row"><label for="input_author" class="col-sm-2 col-form-label">Author</label><div class="col-sm-10"><input type="text" name="input_author" class="form-control"></div></div>
                <div class="form-group row"><label for="input_publisher" class="col-sm-2 col-form-label">Publisher</label><div class="col-sm-10"><input type="text" name="input_publisher" class="form-control"></div></div>
                <div class="form-group row"><label for="input_year" class="col-sm-2 col-form-label">Year</label><div class="col-sm-10"><input type="text" name="input_year" class="form-control"></div></div>
                <div class="form-group row"><label for="input_weight" class="col-sm-2 col-form-label">Weight</label><div class="col-sm-10"><input type="text" name="input_weight" class="form-control"></div></div>
                <div class="form-group row"><label for="input_lang" class="col-sm-2 col-form-label">Language</label><div class="col-sm-10">
                      <select name="input_lang" class="form-control">
                        <option value="Indonesia">Indonesia</option>
                        <option value="English">English</option>
                      </select>
                </div></div>
                <div class="form-group row"><label for="inputPassword" class="col-sm-2 col-form-label">Category</label><div class="col-sm-10">
                      <select name="input_category" class="form-control">
                        <option value="School">School</option>
                        <option value="Science">Science</option>
                        <option value="Novel">Novel</option>
                      </select></div></div>
                <div class="form-group row"><label for="input_desc" class="col-sm-2 col-form-label">Description</label><div class="col-sm-10"><textarea name="input_desc" class="form-control"></textarea></div></div>
                <div class="form-group row"><label for="input_price" class="col-sm-2 col-form-label">Price</label><div class="col-sm-10"><input type="text" name="input_price" class="form-control"></div></div>
                <div class="form-group row"><label for="input_stock" class="col-sm-2 col-form-label">Stock</label><div class="col-sm-10"><input type="text" name="input_stock" class="form-control"></div></div>
                <div class="form-group row"><label for="pay" class="col-sm-2 col-form-label">Cover</label><div class="col-sm-10"><input name="pay" type="file" class="form-control"></div></div>
                <hr>
                <!-- <input type="submit" name="submit" value="Save"> -->
                <!-- <a href="<?php echo base_url("book/book_list"); ?>"><input type="button" value="Cancel"></a> -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                <?php echo form_close(); ?>
              </div>
            </div>
          </div>
        </div>