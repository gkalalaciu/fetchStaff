<?php

namespace Drupal\ciu_employee\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

class convertEmployeeJSONController extends ControllerBase{
  protected $file;

  public function __construct(){
    //read the json file contents
    $this->file = file_get_contents('2023-01-03-cv.json');
  }

  public function extractValues(){
    //convert json object to php associative array
    $datas = json_decode($this->file, true);
    $datas_size = count($datas);

    //$profiles = $datas[]['profile'];
    foreach($datas as $data){
      $profiles[] = $data['profile'];
      $faculties[] = $data['faculties'][0];
      $extensions[] = $data['extension'];
      $office_nos[] = $data['office_no'];
    }

    for($i=0; $i<$datas_size; $i++){

      for($k=0; $k<3; $k++){
        $personnel_titles[$i][] = $datas[$i]['personnel_titles'][$k];
      }

      for($k=0; $k<count($datas[$i]['theses']); $k++){
        $theses[$i][] = $datas[$i]['theses'][$k];
      }

      for($k=0; $k<count($datas[$i]['education_information']); $k++){
        $education_informations[$i][] = $datas[$i]['education_information'][$k];
      }

      for($k=0; $k<count($datas[$i]['publications']); $k++){
        $publications[$i][] = $datas[$i]['publications'][$k];
      }

      for($k=0; $k<count($datas[$i]['projects']); $k++){
        $projects[$i][] = $datas[$i]['projects'][$k];
      }

      for($k=0; $k<count($datas[$i]['administrative_duties']); $k++){
        $administrative_duties[$i][] = $datas[$i]['administrative_duties'][$k];
      }

      for($k=0; $k<count($datas[$i]['memberships']); $k++){
        $memberships[$i][] = $datas[$i]['memberships'][$k];
      }

      for($k=0; $k<count($datas[$i]['awards']); $k++){
        $awards[$i][] = $datas[$i]['awards'][$k];
      }

      for($k=0; $k<count($datas[$i]['other_information']); $k++){
        $other_informations[$i][] = $datas[$i]['other_information'][$k];
      }

      for($k=0; $k<count($datas[$i]['research_areas']); $k++){
        $research_areas[$i][] = $datas[$i]['research_areas'][$k];
      }
    }

		kint($datas);

    return[
      '#theme' => 'employee_template',
      '#items' => $datas,
      '#profiles' => $profiles,
      '#faculties' => $faculties,
      '#extensions' => $extensions,
      '#office_nos' => $office_nos,
      '#personnel_titles' => $personnel_titles,
      '#theses' => $theses,
      '#education_informations' => $education_informations,
      '#publications' => $publications,
      '#projects' => $projects,
      '#administrative_duties' => $administrative_duties,
      '#memberships' => $memberships,
      '#awards' => $awards,
      '#other_informations' => $other_informations,
      '#research_areas' => $research_areas,
      '#title' => $this->t('Employee Theme Template'),
    ];
  }
}