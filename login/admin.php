<?php



include_once 'lavageesManager.php';


if(isset($_POST['addClient'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $etat = $_POST['etat'];
    $prix = $_POST['prix'];
    $matricule = $_POST['matricule'];
    $lavageeManager = new lavageesManager($nom,$prenom,$etat,$prix,$matricule);
    $result = $lavageeManager->insertLavage($connect);
    if($result){
        header("location: admin.php");
    }
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav  class="navBarContainer">
            <div>
                <section class="navbar w-100   bg-light d-flex  justify-content-around ">
                    <div >
                        <img class="img" src="../img/car wash (4).png">
                    </div>
                    <div>
                      <a class="btn   btn-md rounded-3 btn-danger logOut"   href="logout.php">log out</a>
                    </div>
                  
                </section>
            </div>



        </nav>
    </header>
    <main>
        <section class='w-100  text-center mt-4'>
            <h1 class='text-info t-align '>Car Wash</h1>
        </section>
        <section>
            <div class='container mt-5 mb-5 w-100 '>
                <a class="btn btn-info" onclick='show()'>Add new client</a> 

            </div>
            <table class="container bg-light border broder-rounded w-100 px-5 table">
                
                <div class='tableTittles ms-2'>
                    <tr class=''>
                        <th >Matricule</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>La date</th>                     
                        <th>Etat</th>
                        <th>Le prix<th>
                        <th>Action</th>
                    </tr> 
                <div>

                <section class='popupForm w-100  h-100'>
                    <div class="subFormContainer border rounded-2 bg-white w-75">

                   
                    <div id="closeMark" class="close cursor-pointer float-end fs-3 	 me-4   " onclick="hide()">x</div>

                        <div class="formContainer ms-auto me-auto pt-1 pb-2 ">
                            <form method="post" enctype="multipart/form-data"  >
                                <input class="d-block form-control w-50 mt-2" type="text" name="nom" required placeholder="Nom">
                                <input class="d-block form-control w-50 mt-2" type ="text" name="prenom" required placeholder="Prénom">
                                    <select name="etat" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" style="width:300px;margin-top:10px;">
                                        <option value="">Select etat</option>
                                        <option value="En cours">En cours</option>
                                        <option value="Terminer">Terminer</option>
                                    </select>
                                    <select name="prix" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" style="width:300px;">
                                        <option value="">Select prix</option>
                                        <option value="60 DH">60 DH</option>
                                        <option value="100 DH">100 DH</option>
                                        <option value="150 DH">150 DH</option>
                                    </select>
                                    <input class="form-control w-50 mt-2" type="text" name="matricule" placeholder="Matricule" required>
                                <input class="    buttonAdd btn-md d-block btn btn-info mt-2 mb-2  " type="submit"  name="addClient" value ="Add client">
                            </form>
                            </div>
                        </div>
                    
                </section>
                

                <?php
                $table = new display_client();
                $result_table = $table->displayClient($connect);
                while($lavagee = $result_table->fetch_assoc()){

                
            ?>
                <div class="tableElements mt-2">
                    <tr>

                        <td><?php echo $lavagee['matricule'];?></td>
                        <td><?php echo $lavagee['nom'];?></td>
                        <td><?php  echo $lavagee['prenom'];?></td>
                        <td><?php  echo $lavagee['date'];?></td>
                        <td><?php  echo $lavagee['etat'];?></td>
                        <td><?php  echo $lavagee['prix'];?></td>
                        <td><a class= ' mt-2 mb-2  btn btn-success' id="buttonEdit" href="edit.php?id=<?php echo $lavagee['ID']; ?>" >edit</a></td>
                        <td><a class=' btn  mt-2 mb-2 btn-md btn-danger' href="delete.php?id=<?php  echo $lavagee['ID'];?>">delete</a></td>
                    
                    
                    </tr>      
                    <?php }?>
                <div>

            </table>
       
        </section>
    </main>
    <script src="../script/app.js"></script>
</body>
</html>