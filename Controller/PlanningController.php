<?php
class PlanningController {
    public function index() {
        $page = "planning/calendrier";
        require_once("./View/main.php");
    }

    public function selectedYear(){
        $date = $_POST['annee'];
        $cpt = 0;
        $page = 'planning/calendrier';
        $dates = $this->getCalendar($date);
        require_once('./view/main.php');
    }

    public function getCalendar($date){
        $dates = [];
        $firstMondayOfCurrentYear = new DateTime(date('d-m-Y', strtotime("first monday of january")));
        for ($i = 0; $i < 208; $i++) {
            $dates[] = $firstMondayOfCurrentYear->format("d/m/Y");
            $firstMondayOfCurrentYear->modify('+1 week');
        }
        if($date == '2022'){  
            $dates = array_slice($dates,52,52);
            return $dates;
        }else if($date == '2023'){
            $dates = array_slice($dates,104,52);
            return $dates;
        }else if($date == '2024'){
            $dates = array_slice($dates,156,52);
            return $dates;
        }
        $dates = array_slice($dates,0,52);
        return $dates;
    }
}
?>
