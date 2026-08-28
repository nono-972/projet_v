<?php 


class VoitureController {
    private VoitureRepository $voitureRepository;
    private MarqueRepository $marqueRepository;

    public function __construct (
     VoitureRepository $v,
     MarqueRepository $m

    ){
     $this-> voitureRepository = $v ;
     $this-> marqueRepository = $m ;
    }

    public function home(): void
    {
        $marques = $this->marqueRepository->findAll();

        if (isset($_GET['marque'])) {
            $voitures = $this->voitureRepository->findByMarqueId((int)$_GET['marque']);
           require __DIR__ . "/../views/home.php";

        } else {
                $voitures = $this->voitureRepository->findAll();
            require __DIR__ . "/../views/home.php";
        }

    }

    public function createMarque(): void 
    {

       $titre = "Editer une marque";
        $button ="Modifier";
      $marques = $this->marqueRepository->findAll();

      if($_SERVER["REQUEST_METHOD"] === "POST"){
        $nom = $_POST["nom"];
        $marque = new Marque(0, $nom);
        $this->marqueRepository->create($marque);
        header("location: index.php");
        exit;
      }
      require __DIR__ . "/../views/formMarque.php";
        echo "<div style= background: white'>";
        
        var_dump($_POST,$_GET);
        echo "<div>";
    }

    public function createVoiture(): void
    {
      $button = "Creer";
      $marques = $this->marqueRepository->findAll();

      if($_SERVER["REQUEST_METHOD"] === 'POST') {
          $nom = $_POST["nom"];
          $puissance = $_POST["puissance"];
          $prix = $_POST["prix"];
          $marque_id = $_POST["marque"];

          $voiture = new Voiture(
            0,
            $nom,
            $puissance,
            $prix,
            $marque_id
          );

          $id = $this->voitureRepository->create($voiture);
          header("location: index.php");
          exit;
      }

      require __DIR__ . "/../views/formvoiture.php";

    }

    public function editVoiture(): void
    {
        $marques = $this->marqueRepository->findAll();
        $titre = "Editer une voiture";
        $button ="Modifier";
        $id = $_GET["id"];
        $voiture = $this->voitureRepository->findById($id);

        if ($_SERVER["REQUEST_METHOD"]=== "POST"){

          $voiture->nom = $_POST["nom"];
          $voiture->puissance = $_POST["puissance"];
          $voiture->prix = $_POST["prix"];
          $voiture->marque_id = $_POST["marque"];

          $this->voitureRepository->edit($voiture);

          header("Location: index.php");
          exit;
        }

        require __DIR__ . "/../views/formvoiture.php";
    }

    public function editMarque(): void
    {
        $marques = $this->marqueRepository->findAll();
        $titre = "Editer une Marque";
        $button ="Modifier";
        $id = $_GET["id"];
        $marque = $this->marqueRepository->findById($id);

        if ($_SERVER["REQUEST_METHOD"]=== "POST"){

          $marque->nom = $_POST["nom"];

          $this->MarqueRepository->edit($marque);

          header("Location: index.php");
          exit;
        }

        require __DIR__ . "/../views/formMarque.php";
    }

       
    public function AllMarques(): void
    {
        $marques = $this->marqueRepository->findAll();
        require __DIR__ . "/../views/marques.php";
    }


    public function deleteVoiture($id)
    {
        $this->voitureRepository->delete($id);
        header("location: index.php");
        exit;
    }

    public function deleteMarque($id)
    {
        try {
            
            $this->marqueRepository->delete($id);
            header("location: index.php");
            exit;
        } catch (Exception $e) {
            $marques = $this->marqueRepository->findAll();
            $message = $e->getMessage();
            require __DIR__ . "/../views/home.php";
           
        }
    }


}
