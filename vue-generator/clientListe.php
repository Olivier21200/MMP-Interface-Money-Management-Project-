<?php 

    

    function __clientListAffiche()
    {
        require_once('../class-Manager/comptsManager.php');
        include_once('../bdd/connexion_bdd.php');

        $clientManager = new ClientManager($pdo);
        $res2 = $clientManager->getList(); //lister l’ensemble des animaux
        echo('

        <!-- page start-->
        <div class="content-panel">
          <div class="adv-table">
            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
              <thead>
                <tr>
                  <th class="hidden-phone">Id</th>
                  <th class="hidden-phone">Prenom</th>
                  <th class="hidden-phone">Nom</th>
                  <th class="hidden-phone">Age</th>
                  <th class="hidden-phone">Sexe</th>
                  <th class="hidden-phone">Telephone</th>
                  <th class="hidden-phone">Rue</th>
                  <th class="hidden-phone">Ville</th>
                  <th class="hidden-phone">codePostal</th>
                  <th class="hidden-phone">Mail</th>
                  <th class="hidden-phone">Metier</th>
                  <th class="hidden-phone">nb_Compts</th>
                </tr>
              </thead>'); 
              
              foreach ($res2 as $val) 
              {
                  echo("<tbody> <tr>
                   
                  <td>".$val->id()."</td>
                  <td>".$val->id()."</td>
                  <td>".$val->prenom()."</td>
                  <td>".$val->nom()."</td>
                  <td>".$val->age()."</td> 
                  <td>".$val->sexe()."</td> 
                  <td>".$val->telephone()."</td>  
                  <td>".$val->rue()."</td> 
                  <td>".$val->ville()."</td> 
                  <td>".$val->codePostal()."</td>
                  <td>".$val->mail()."</td>
                  <td>".$val->metier()."</td>
                  <td>".$val->nb_compts()."</td>        

                  </tr> </tbody>");
              }

              echo('</tbody>
            </table>
          </div>
        </div>');
    }

?>