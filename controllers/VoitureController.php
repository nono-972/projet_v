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

    public function deleteVoiture($id)
    {
        $this->voitureRepository->delete($id);
        header("location: index.php");
        exit;
    }

}
