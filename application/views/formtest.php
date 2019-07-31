<html>
<head>
    <title>Codeigniter Live Table Add Edit Delete using Ajax</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
    body
    {
      margin:0;
      padding:0;
      background-color:#f1f1f1;
    }
    .box
    {
      width:900px;
      padding:20px;
      background-color:#fff;
      border:1px solid #ccc;
      border-radius:5px;
      margin-top:10px;
    }
  </style>
</head>
<body>
  <div class="container box">
    <h3 align="center">Codeigniter Live Table Add Edit Delete using Ajax</h3><br />
    <div class="table-responsive">
      <br />
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Merk</th>
            <th>Kapasitas</th>
            <th>Lokasi</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>   
    </div>
  </div>
</body>
</html>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
  
  function load_data()
  {
    $.ajax({
      url:"<?php echo base_url(); ?>form/load_data",
      dataType:"JSON",
      success:function(data){
        var html = '<tr>';
        html += '<td id="merk" contenteditable placeholder="Enter First Name"></td>';
        html += '<td id="kapasitas" contenteditable placeholder="Enter Last Name"></td>';
        html += '<td id="lokasi" contenteditable></td>';
        html += '<td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-plus"></span></button></td></tr>';
        for(var count = 0; count < data.length; count++)
        {
          html += '<tr>';
          html += '<td class="table_data" data-row_id="'+data[count].id+'" data-column_name="merk" contenteditable>'+data[count].merk+'</td>';
          html += '<td class="table_data" data-row_id="'+data[count].id+'" data-column_name="kapasitas" contenteditable>'+data[count].kapasitas+'</td>';
          html += '<td class="table_data" data-row_id="'+data[count].id+'" data-column_name="lokasi" contenteditable>'+data[count].lokasi+'</td>';
          html += '<td><button type="button" name="delete_btn" id="'+data[count].id+'" class="btn btn-xs btn-danger btn_delete"><span class="glyphicon glyphicon-remove"></span></button></td></tr>';
        }
        $('tbody').html(html);
      }
    });
  }

  load_data();

  $(document).on('click', '#btn_add', function(){
    var merk = $('#merk').text();
    var kapasitas = $('#kapasitas').text();
    var lokasi = $('#lokasi').text();
    if(merk == '')
    {
      alert('Enter Merk');
      return false;
    }
    if(kapasitas == '')
    {
      alert('Enter Kapasitas');
      return false;
    }
    $.ajax({
      url:"<?php echo base_url(); ?>form/insert",
      method:"POST",
      data:{merk:merk, kapasitas:kapasitas, lokasi:lokasi},
      success:function(data){
        load_data();
      }
    })
  });

  $(document).on('blur', '.table_data', function(){
    var id = $(this).data('row_id');
    var table_column = $(this).data('column_name');
    var value = $(this).text();
    $.ajax({
      url:"<?php echo base_url(); ?>livetable/update",
      method:"POST",
      data:{id:id, table_column:table_column, value:value},
      success:function(data)
      {
        load_data();
      }
    })
  });

  $(document).on('click', '.btn_delete', function(){
    var id = $(this).attr('id');
    if(confirm("Are you sure you want to delete this?"))
    {
      $.ajax({
        url:"<?php echo base_url(); ?>livetable/delete",
        method:"POST",
        data:{id:id},
        success:function(data){
          load_data();
        }
      })
    }
  });
  
});
</script>