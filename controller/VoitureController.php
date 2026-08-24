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
        } else {
            $voitures = $this->voitureRepository->findAll();
        }

        require __DIR__ . "/../views/home.php";
    }
}
