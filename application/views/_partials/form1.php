<style type="text/css">
.tg  
{
    border-collapse:collapse;
    border-spacing:0;
}
.tg td
{
   padding:10px 5px;
    border-style:solid;
    border-width:1px;
    overflow:hidden;
    word-break:normal;
    border-color:black;
}
.tg th
{
   
    padding:10px 5px;
    border-style:solid;
    border-width:1px;
    overflow:hidden;
    word-break:normal;
    border-color:black;
}
.tg .tg-1zis
{
    color:#000000;
    border-color:#000000;
    text-align:center;
    vertical-align:top;
    font-size: 12pt;
}
.tg .tg-73oq
{
    border-color:#000000;
    text-align:left;
    vertical-align:top
}
</style>
 <!--------------------<START THEAD>------------------------------------------------>
<table class="tg display compact nowrap dataTable no-footer dtr-inline collapsed" >
<thead>
  <tr>
    <th class="tg-1zis" rowspan="2"><br><br>No<br></th>
    <th class="tg-1zis" rowspan="2"><br><br>Merk<br></th>
    <th class="tg-1zis" colspan="7">Tindak Pemeriksaan</th>
    <th class="tg-1zis" rowspan="2"><br><br>Tanggal</th>
    <th class="tg-1zis" rowspan="2"><br><br>Petugas</th>
    <th class="tg-1zis" rowspan="2"><br><br>Action  </th>
  </tr>
  
  <tr>
    <td class="tg-1zis" colspan="1">Filter Udara</td>
    <td class="tg-1zis" colspan="1">Evaporator</td>
    <td class="tg-1zis" colspan="1">Fan Blower</td>
    <td class="tg-1zis" colspan="1">Drainase</td>
    <td class="tg-1zis" colspan="1">Electric V</td>
    <td class="tg-1zis" colspan="1">Electric A</td>
    <td class="tg-1zis" colspan="1">Electric P</td>
  </tr>
</thead>
 <!--------------------------</END THEAD>------------------------------------------>
 <!-------------------------------<START TBODY>------------------------------------>
<tbody>
  <?php foreach($records as $row):?>
  <tr>
    <td><?php echo $row['id'];?></td>
    <td><p data-editable><?php echo $row['aset'];?></p></td>
    <?php foreach ($row['kondisi'] as $kond): ?>
    <td><?php echo $kond['nilai'];?></td>
    <?php endforeach ?>
    <td><?php echo $row['tanggal'];?></td>
    <td><?php echo $row['petugas'];?></td>
    <td><button href="">Edit</button></td>
  </tr>
  <?php endforeach; ?>
    <?php echo form_close();?>
  <tr>
    <td class="tg-73oq" colspan="18" rowspan="2"></td>
  </tr>
 
  </tbody>
  <!--------------------------------</END TBODY>------------------------------------>
</table>
