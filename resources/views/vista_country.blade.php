<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Paises del mundo </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script type="text/javascript" src="jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#countries").change(function(){
                    /* alert ("Hola JQuery"); */
                    //Oculta la tabla con hide, en caso de querer ocultar todo se pone "body"
                    //$("table").hide();

                    //Eimina elementos con remove
                    /* $("img").remove(); */
                    var code = $(this).val();
                    var param = {"code":code};
                    $.ajax({
                        url:'consultar',
                        data:param,
                        success:function(data){
                            var obj = JSON.parse(data);
                            $(".filas").hide();
                            $("#paginas").hide();
                            var code   = obj['Code'];
                            var name   = obj['Name'];
                            var region = obj['Region'];
                            var anno   = obj['IndepYear'];
                            var pop    = obj['Populaion'];
                            var area   = obj['SurfaceArea'];
                            var expec  = obj['LifeExpectancy'];
                            var band   = obj['imagen'];
                            //alert(code+"/"+name+"/"+region+"/"+anno+"/"+pop+"/"+area+"/"+expec+"/"+band);
                            $("table").append("<tr><td>1</td><td>"+code+"</td><td>"+name+"</td><td>"+region+"</td><td>"+anno+"</td><td>"+pop+"</td><td>"+area+"</td><td>"+expec+"</td><td><img class='bandera' width='70' height='60' src='http://localhost/DWI/storage/app/banderas/"+band+"'></td><td><a href='eliminar?code="+code+"'><img width='40' height='40' src='images/eliminar.png'></a><a href='modificar?code="+code+"'><img width='40' height='40' src='images/modificar.png'></a><a href='subirfoto?code="+code+"'><img width='40' height='40' src='images/foto.png'></a></td></tr>"); 
                        }
                    });

                    $.ajax({
                        url: 'consultar2',
                        data: param,
                        success: function(data){
                            var ct = JSON.parse(data);
                            $("option").remove();
                            for(a=0; a<ct.length; a++){
                                $("#cities").append("<option>"+ct[a]['Name']+"</option>")
                            }
                        }
                    });

                });
                   
                    //Volver a mostrar  los elementos que se ocultaron
                    /* $("#Buscar").click(function(){
                        $("img").show();
                    }); */
                    
                $("#Buscar").click(function(){
                    $("form").append("<input type='reset' value='Cancelar'>");
                    $("form").append("<input type='text' name='caja'>");
                    $("form").before("<input type='radio' name='radio'>");
                    $("form").after("<input type='checkbox' name='radio'>");    
                });

                $("#criterio").keyup(function(){
                    /* var a=$(this).val();
                    var b=a.toUpperCase();
                    //alert(b);
                    $(this).val(b); */
                    $(this).val($(this).val().toUpperCase());
                });

                /* $(".bandera").mouseover(function(){
                    //alert ("Este es una imagen");
                    $(this).attr("width",150);
                    $(this).attr("height",140);
                }); */

                $(document).on("mouseover",".bandera",function(){
                    //alert ("Este es una imagen");
                    $(this).attr("width",150);
                    $(this).attr("height",140);
                });

                /* $(".bandera").mouseout(function(){
                    //alert ("Este es una imagen");
                    $(this).attr("width",70);
                    $(this).attr("height",60);
                }); */  

                $(document).on("mouseout",".bandera",function(){
                    //alert ("Este es una imagen");
                    $(this).attr("width",70);
                    $(this).attr("height",60);
                });

            });
        </script>
    
</head>
<body>
    <div class="container">
        <form action="{{ route('country')}}" method="GET" class="form-inline">
            <div class="row">
                <div class="col-12">
                    <div class="col-5">
                        <div>
                            <input type="text" name="criterio" id="criterio" class="form-control">
                        </div>
                    </div> 
                    <div class="col-2">
                        <div>
                            <input type="buuton" id="Buscar" value="Buscar" class="btn btn-primary">
                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <select name="countries" id="countries" class="btn btn-outline dark form-select" >
                                @foreach($countries2 as $ct2)
                                    <option value={{ $ct2->Code }}>{{ $ct2->Code}} - {{ $ct2->Name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <select name="cities" id="cities" class="btn btn-outline dark form-select" >
                               
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-11">
            <table class="table table-info table-hover table-striped table-bordered border-info table-sm align-middle caption-top table-responsive">
            <caption>Listado de paises del mundo con información respectiva</caption>
                <tr>
                    <th align> No.</th>
                    <th>Code</th>
                    <th class="table-active">Nombre</th>
                    <th>Región</th>
                    <th class="table-active">Año Independencia</th>
                    <th>Población</th>
                    <th class="table-active">Área</th>
                    <th>Expectativa de vida</th>
                    <th class="table-active">Bandera</th>
                    <th>Operaciones</th>
                </tr>
                <?php $n=1 ?>
                @foreach($countries as $ct)
                <tr class="filas">
                    <td class="table-success">{{ $n++ }}</td>
                    <td>{{ $ct->Code }}</td>
                    <td>{{ $ct->Name }}</td>
                    <td>{{ $ct->Region }}</td>
                    <td>{{ $ct->IndepYear }}</td>
                    <td>{{ $ct->Population }}</td>
                    <td>{{ $ct->SurfaceArea }}</td>
                    <td>{{ $ct->LifeExpectancy }}</td>
                    <td><img class="bandera" width="70" height="60" src="http://localhost/dwi/storage/app/banderas/{{$ct->imagen}}"></td>
                    <td>
                    <a href="{{route('eliminar', [ 'code'=> $ct->Code ]) }}"><img width="40" height="40" src="images/eliminar.png"></a>
                    <a href="{{route('modificar', [ 'code'=> $ct->Code ]) }}"><img width="40" height="40" src="images/modificar.png"></a>
                    <a href="{{route('subirfoto', [ 'code'=> $ct->Code ]) }}"><img width="40" height="40" src="images/foto.png"></a>
                    </td>
                </tr>
                @endforeach
                <tfoot>
                    <tr class="table-sm">
                        <th>No.</th>
                        <th>Code</th>
                        <th>Nombre</th>
                        <th>Región</th>
                        <th>Año Independencia</th>
                        <th>Población</th>
                        <th>Área</th>
                        <th>Expectativa de vida</th>
                        <th>Bandera</th>
                        <th>Operaciones</th>
                    </tr>
                </tfoot> 
            </table>
            <div id="paginas">
                {{$countries->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
            </div>

            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

</body>
</html>