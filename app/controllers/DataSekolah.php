<?php

class dataSekolah extends Controller
{
  public function index()
  {
    $data['tittle'] = 'Data Sekolah';
    $this->view('template/header', $data);
    $this->view('template/navbar');
    $this->view('dataSekolah/dataSekolah');
    $this->view('template/footer');
  }
}
