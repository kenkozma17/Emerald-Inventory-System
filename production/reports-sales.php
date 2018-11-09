<?php include 'top-template.php'; 

if(isset($_POST['dateChange'])){

}

$query = "SELECT * FROM purchases WHERE type = 'Purchase'";

?>

<div class="row">
<form action='reports-sales.php' method='post'>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Top 10 Selling Products <small>basic table subtitle</small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <select name='date'>
            <option>July 2018</option>
          </select>
          <input type='submit' name='dateChange' value='Search' class="btn btn-default"/>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Username</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Larry</td>
              <td>the Bird</td>
              <td>@twitter</td>
            </tr>
          </tbody>
        </table>

      </div>
    </div>
  </div>
  </form>
</div>

<?php include 'bottom-template.php'; ?>