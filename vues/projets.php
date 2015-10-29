<?php 
$cnx = mysql_connect("localhost","root","");
 $db= mysql_select_db("crowdfunding");
$sql = 'SELECT id_projet, nom_projet, proprietaire_projet, somme_recolte,montant_total, description, date_debut,date_fin FROM projet ';
 $req = mysql_query($sql,$cnx) or die(mysql_error());
 
?>
<div class="row">
  
					<?php  while ($data = mysql_fetch_array($req)) 
					{  echo" <div class='col-md-3'>
        <div class='thumbnail'>
            <div class='project_image'>
                <a href='images/300x200.png'><img src='images/300x200.png' alt='image.jpg' /></a>
            </div>
            <div class='caption project_description'>
                <div class=''>
                    <h5><a href='#'><strong> ";
					
					
					$a=($data['somme_recolte']/$data['montant_total'])*100;
					echo $data['nom_projet']; 
					  echo "</strong></a><br/><a href='#' class='auteur'> par ";
					  echo $data['proprietaire_projet']; 
					  echo"  </a> </h5> </div> <div class='content'> <p>";
					  echo $data['description']; 
					  echo "</p> </div> <div class='footer'>
					  <div class=' progress progress-striped active";
					  echo "' style='margin-bottom: 10px'>
                        <div class='";
					  // test de couleur de l'avancement
					  if($a<=50){
					 echo" progress-bar progress-bar-danger'";
					 }
					  if(($a>50) && ($a<=100)){
					 echo" progress-bar progress-bar-success'";
					 }
					   if($a>100) {
					 echo" progress-bar progress-bar-info'";
					 }
					 echo " style='width: "; echo $a;echo "%'>";
						echo number_format($a,2);
						echo " % </div></div><ul class='nav nav-pills'>
						<li data-toggle='popover' class='pop' data-content='Objectif'><span class='glyphicon glyphicon-hand-right'>
						</span><strong>&nbsp";
						
						echo $data['montant_total'];
					
						echo "FCFA</strong></li>
						      <li class='pull-right pop' data-toggle='popover' data-content='Jours restants'><span class='glyphicon glyphicon-time'>
							  </span> J- 32<strong>";
							  // difference de jrs
							  $j=GETDATE();
							//  echo $j[mon];
							 // datediff(day,$j[year]-$j[mon]-$j[mday],$data['date_fin']);
							  echo "</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
						";
					}
					  ?>
                      
                  
    <div class="col-md-3">
        <div class="thumbnail">
            <div class="project_image">
                <a href="images/300x200.png"><img src="images/300x200.png" alt="image.jpg" /></a>
            </div>
            <div class="caption project_description">
                <div class="">
                    <h5><a href="#"><strong>Project Title</strong></a><br/>
                        <a href="#" class="auteur">par MastaFlex</a>
                    </h5>
                </div>
                <div class="content">
                    <p>
                        Cras justo odio, dapibus ac facilisis in, egestas eget quam.
                        Donec id elit non mi porta gravida at eget metus. Nullam id dolor
                        id nibh ultricies vehicula ut id elit...
                    </p>
                </div>
                <div class="footer">
                    <div class="progress progress-striped active" style="margin-bottom: 10px">
                        <div class="progress-bar progress-bar-info" style="width: 100%">
                            124%
                        </div>
                    </div>
                    <ul class="nav nav-pills">
                        <li data-toggle="tooltip" title="Objectif"><span class="glyphicon glyphicon-hand-right"></span><strong>&nbsp; 200.000 FCFA</strong></li>
                        <li class="pull-right" data-toggle="tooltip" title="Jours restants"><span class="glyphicon glyphicon-time"></span> J- <strong>78</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
  
    <div class="col-md-3">
        <div class="thumbnail">
            <div class="project_image">
                <a href="images/300x200.png"><img src="images/300x200.png" alt="image.jpg" /></a>
            </div>
            <div class="caption project_description">
                <div class="">
                    <h5><a href="#"><strong>Project Title</strong></a><br/>
                        <a href="#" class="auteur">par MastaFlex</a>
                    </h5>
                </div>
                <div class="content">
                    <p>
                        Cras justo odio, dapibus ac facilisis in, egestas eget quam.
                        Donec id elit non mi porta gravida at eget metus. Nullam id dolor
                        id nibh ultricies vehicula ut id elit...
                    </p>
                </div>

                <div class="footer">
                    <div class="progress progress-striped active" style="margin-bottom: 10px">
                        <div class="progress-bar progress-bar-success" style="width: 81%">
                            81%
                        </div>
                    </div>
                    <ul class="nav nav-pills">
                        <li data-toggle="tooltip" title="Objectif"><span class="glyphicon glyphicon-hand-right"></span><strong>&nbsp; 500.000 FCFA</strong></li>
                        <li class="pull-right" data-toggle="tooltip" title="Jours restants"><span class="glyphicon glyphicon-time"></span> J- <strong>55</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>