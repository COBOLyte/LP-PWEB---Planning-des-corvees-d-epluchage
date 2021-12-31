<?php
class PlanningController {
    private $userManager;
    
    public function __construct($db) {
        require_once("./Model/User/userManager.php");
        $this->userManager = new UserManager($db);
    }
    
    public function index() {
        $annee = "2021";
        if (isset($_POST['annee'])) header("Location: ./index.php?ctrl=planning&method=index&annee=" . $_POST['annee']);
        if (isset($_GET['annee'])) $annee = $_GET['annee'];
        
        $column = 0;
        $dates = $this->getCalendar($annee);
        $anneesOptions = [2021, 2022, 2023, 2024, 2025];
        $users = $this->userManager->findAll();
        //$agendas = $this->userManager->getEachAgendaLengthInAscOrder();
        //var_dump($agendas);
        $page = "planning/calendrier";
        require_once("./View/main.php");
    }
    
    public function updatePlanning() {
        $dates = $this->getCalendar($_POST['currentYear']);
        foreach($dates as $d) {
            $userAlreadyHavingTheDate = $this->userManager->findByDate($d);
            var_dump($userAlreadyHavingTheDate);
            if ($_POST[$d] != "-") {
                if ($userAlreadyHavingTheDate) $this->userManager->removeDate($userAlreadyHavingTheDate->email, $d);
                $this->userManager->addDate($_POST[$d], $d);
            } else {
                if ($userAlreadyHavingTheDate) $this->userManager->removeDate($userAlreadyHavingTheDate->email, $d);
            }
        }
        
        header("Location: ./index.php?ctrl=planning&method=index&annee=" . $_POST['currentYear']);
    }
    
    private function getCalendar($annee) {
        $dates = [];
        $weekMonday = new DateTime(date('d-m-Y', strtotime("first monday of january " . $annee)));
        while ($weekMonday->format("Y") == $annee) {
            $dates[] = $weekMonday->format("d/m/Y");
            $weekMonday->modify('+1 week');
        }
        return $dates;
    }
}
?>
