<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ManagerVehicles</title>

        <!-- Fonts -->
      

        <!-- Styles -->
        
        </head>
</html>
@extends('layouts.admin')
@section('content')
            <div class="page-title">
             <h3><?=$title?></h3>
       
            </div>
            <br>
            <div class="clearfix"></div>
            <form action="{{route('managervehicles',['model'=>$modelName])}}" method="POST" style="background: #FFF;padding: 20px;">
             @csrf
                <fieldset>
                <?php 
                foreach ($configs as $config) {
                    if(!empty($config['filter'])) {
                        switch($config['filter']) {
                            case "equal": ?>
                             <div style="display: inline-block;font-weight: bold;color:black; ">
                            <label><?= $config['name']?>:</label>
                            <input type="text" name="<?=$config['field']?>" value="" style="width: 40px;">
                            </div>
                            <?php
                            break;
                            case "like":?>
                            <div style="display: inline-block;font-weight: bold;color:black; ">
                            <label><?= $config['name']?>:</label>
                            <input type="text" name="<?=$config['field']?>" value="" style="width: 40px;">
                            </div>
                            <?php
                            break;
                        }
                    }
                   
                 }
                 ?>
                    <button type="submit" class="btn btn-primary" style="margin-left: 10px;"><i class="fa fa-search" aria-hidden="true"></i></button>
                </fieldset>
             </form>
            <div>
            <a href="{{route('vehicles.create')}}" class="btn btn-sm btn-primary" style="float: right;">Thêm</a>
            <div class="row" style="display: block;">
              <div class="clearfix"></div>
              <div class="col-md-12 col-sm-12  ">
                  <div class="x_content">

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                        <?php foreach ($configs as $config) { ?>
                          <th><?= $config['name']?></th>
                        <?php } ?>
                       
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($records as $record) { ?>
                        <tr>
                        <?php foreach ($configs as $config) { ?>
                        <?php switch($config['type']) {
                            case "text": ?>
                             <td><?= $record[$config['field']]?></td>
                            <?php 
                            break;
                            case "image": ?>
                              <td style="width: 150px;"><img src="/uploads/image/<?= $record[$config['field']]?>" width="150px" height="100px"></td>
                             <?php 
                             break;
                            case "number": ?>
                                <td><?= number_format($record[$config['field']], 0, ',','')?></td>
                                <?php 
                            break;
                            case "edit": ?>
                                <td><a href="{{route('vehicles.edit',$record->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true" style="margin: 15px 0px 10px 8px;"></i></a></td>
                                <?php 
                            break;
                            case "delete": ?>
                                <td><a href="{{route('vehicles.delete',$record->id)}}"><i class="fa fa-trash" aria-hidden="true"style="margin: 15px 0px 10px 8px;"></i></a></td>
                                <?php
                             break;
                        }?>  
                        <?php } ?>
                        </tr>
                        <?php } ?>
             
                      </tbody>
                    </table>
                    {{$records->links()}}
                  </div>
                
              </div>

              <div class="clearfix"></div>
            </div>
            </div>
          </div>
@endsection