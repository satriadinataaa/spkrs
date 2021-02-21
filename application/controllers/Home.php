<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('enter_bobot');
	}

    public function result_page()
    {
        if($this->input->post()){
            $data['bobot'] = $this->input->post();

        //Normalisasi bobot
        $data['bobot']['jarak'] = $this->input->post('jarak') / 100;
        $data['bobot']['biaya'] = $this->input->post('biaya') / 100 ;
        $data['bobot']['pelayanan'] = $this->input->post('pelayanan') / 100;
        $data['bobot']['fasilitas'] = $this->input->post('fasilitas') / 100;
        


        $data['rs'] = $this->db->get('rumahsakit');
        $i = 0;
        $HN = array();
        //normalisasi
        foreach($data['rs']->result_array() as $row){
            $HN[$i]["nama_rs"] = $row["nama"];
            //Normalisasi Jarak
            if($row['jarak'] <= 5){
                $norm_jarak[$i]= 1;
            } 
            if($row['jarak'] >= 6 && $row['jarak'] <=10){
                $norm_jarak[$i] = 2;
            } 
            if($row['jarak'] >=11 && $row['jarak'] <=15){
                $norm_jarak[$i] = 3;
            } 

            $HN[$i]["jarak"] = $norm_jarak[$i];

            //Normalisasi Biaya Normal
            if($row['biaya_normal'] >= 3000000 && $row['biaya_normal'] < 7000000 ){
                $norm_biaya_normal[$i] = 1;
            }
            if($row['biaya_normal'] >= 7000000 && $row['biaya_normal'] < 11000000 ){
                $norm_biaya_normal[$i] = 2;
            }
            if($row['biaya_normal'] >= 11000000 && $row['biaya_normal'] < 15000000 ){
                $norm_biaya_normal[$i] = 3;
            }
            if($row['biaya_normal'] >= 15000000 && $row['biaya_normal'] < 20000000 ){
                $norm_biaya_normal[$i] = 4;
            }
            if($row['biaya_normal'] >= 20000000){
                $norm_biaya_normal[$i] = 5;
            }

            $HN[$i]["biaya_normal"] = $norm_biaya_normal[$i];

            // Normalisasi Biaya Caesar
            if($row['biaya_caesar'] >= 3000000 && $row['biaya_caesar'] < 7000000 ){
                $norm_biaya_caesar[$i] = 1;
            }
            if($row['biaya_caesar'] >= 7000000 && $row['biaya_caesar'] < 11000000 ){
                $norm_biaya_caesar[$i] = 2;
            }
            if($row['biaya_caesar'] >= 11000000 && $row['biaya_caesar'] < 15000000 ){
                $norm_biaya_caesar[$i] = 3;
            }
            if($row['biaya_caesar'] >= 15000000 && $row['biaya_caesar'] < 20000000 ){
                $norm_biaya_caesar[$i] = 4;
            }
            if($row['biaya_caesar'] >= 20000000){
                $norm_biaya_caesar[$i] = 5;
            }

            $HN[$i]["biaya_caesar"] = $norm_biaya_caesar[$i];

            if($row['pelayanan'] >= 1 && $row['pelayanan'] <= 5){
                $norm_pelayanan[$i] = 1;
            }
            if($row['pelayanan'] >= 6 && $row['pelayanan'] <= 10){
                $norm_pelayanan[$i] = 2;
            }
            if($row['pelayanan'] >= 11 && $row['pelayanan'] <= 15){
                $norm_pelayanan[$i] = 3;
            }
            if($row['pelayanan'] >= 16 && $row['pelayanan'] <= 20){
                $norm_pelayanan[$i] = 4;
            }
            if($row['pelayanan'] >= 21 && $row['pelayanan'] <= 25){
                $norm_pelayanan[$i] = 5;
            }
            
            $HN[$i]["pelayanan"] = $norm_pelayanan[$i];
            
            if($row['fasilitas'] >= 1 && $row['fasilitas'] <= 5){
                $norm_fasilitas[$i] = 1;
            }
            if($row['fasilitas'] >= 6 && $row['fasilitas'] <= 10){
                $norm_fasilitas[$i] = 2;
            }
            if($row['fasilitas'] >= 11 && $row['fasilitas'] <= 15){
                $norm_fasilitas[$i] = 3;
            }
            if($row['fasilitas'] >= 16 && $row['fasilitas'] <= 20){
                $norm_fasilitas[$i] = 4;
            }
            if($row['fasilitas'] >= 21 && $row['fasilitas'] <= 25){
                $norm_fasilitas[$i] = 5;
            }
            
            $HN[$i]["fasilitas"] = $norm_fasilitas[$i];
            
            $data['normalisasi'] = $HN;
            $i++;
        }

        
        //START OF EDAS

        //Step-1) Determine the average solution (Avj)
        $AVJ['jarak'] = $this->edas_avg($norm_jarak);
        $AVJ['biaya_normal'] = $this->edas_avg($norm_biaya_normal);
        ///$AVJ['biaya_caesar'] = $this->rerata($norm_biaya_caesar);
        $AVJ['pelayanan'] = $this->edas_avg($norm_pelayanan);
        $AVJ['fasilitas'] = $this->edas_avg($norm_fasilitas);

        $data['avj']['jarak']= $AVJ['jarak'];
        $data['avj']['biaya_normal'] = $AVJ['biaya_normal'];
        $data['avj']['pelayanan'] = $AVJ['pelayanan'];
        $data['avj']['fasilitas'] = $AVJ['fasilitas'];

        //Step-2) Calculate the positive distance from average (PDA)
        $i = 0;
        $PDA = $this-> edas_pda($data['rs'],$AVJ,$norm_jarak,$norm_biaya_normal,$norm_biaya_caesar,$norm_pelayanan,$norm_fasilitas);

        //AMBIL NILAI EDAS - PDA UNTUK DITAMPILKAN
        foreach($data['rs']->result_array() as $row){
            $data['pda_jarak'][$i] =  $PDA[$i]['jarak'];
            $data['pda_biaya_normal'][$i] =  $PDA[$i]['biaya_normal'];
            $data['pda_pelayanan'][$i] =  $PDA[$i]['pelayanan'];
            $data['pda_fasilitas'][$i] =  $PDA[$i]['fasilitas'];
            $i++;
        }

        //Step-3) Calculate the negative distance from average (NDA)
         $i=0;
         $NDA = $this-> edas_nda($data['rs'],$AVJ,$norm_jarak,$norm_biaya_normal,$norm_biaya_caesar,$norm_pelayanan,$norm_fasilitas);
         foreach($data['rs']->result_array() as $row){
            
            $data['nda_jarak'][$i] =  $NDA[$i]['jarak'];
            $data['nda_biaya_normal'][$i] =  $NDA[$i]['biaya_normal'];
            $data['nda_pelayanan'][$i] =  $NDA[$i]['pelayanan'];
            $data['nda_fasilitas'][$i] =  $NDA[$i]['fasilitas'];
            $i++;
         }

        //PERHITUNGAN Weight Sum Of PDA
        $WPDA = $this->edas_wpda($data['rs'],$PDA,$data['bobot']);
        $i=0;
        foreach($data['rs']->result_array() as $row){ 
            $data['wpda_jarak'][$i] =  $WPDA[$i]['jarak'];
            $data['wpda_biaya_normal'][$i] =  $WPDA[$i]['biaya_normal'];
            $data['wpda_pelayanan'][$i] =  $WPDA[$i]['pelayanan'];
            $data['wpda_fasilitas'][$i] =  $WPDA[$i]['fasilitas'];
            $data['wpda_SPI'][$i] = $WPDA[$i]['SPI'];
            $i++;
        }

        //PERHITUNGAN Weight Sum Of NDA
        $WNDA = $this->edas_wnda($data['rs'],$NDA,$data['bobot']);
        $i=0;
        foreach($data['rs']->result_array() as $row){ 
            $data['wnda_jarak'][$i] =  $WNDA[$i]['jarak'];
            $data['wnda_biaya_normal'][$i] =  $WNDA[$i]['biaya_normal'];
            $data['wnda_pelayanan'][$i] =  $WNDA[$i]['pelayanan'];
            $data['wnda_fasilitas'][$i] =  $WNDA[$i]['fasilitas'];
            $data['wnda_SNI'][$i] = $WNDA[$i]['SNI'];
            $i++;
        }

        $maxSPI = max($data['wpda_SPI']);
        $maxSNI = max($data['wnda_SNI']);

        //SPI SNI
        $NSPI = $this->edas_wnspi($data['rs'],$data['wpda_SPI'],$maxSPI);
        $NSNI = $this->edas_wnsni($data['rs'],$data['wnda_SNI'],$maxSNI);
        $i=0;
        //GET SPi SNI AND ASI VALUE
        foreach($data['rs']->result_array() as $row){
            $data['rs_akhir'][$i] = $row;
            $data['rs_akhir'][$i]['SPI'] = $data['wpda_SPI'][$i];
            $data['rs_akhir'][$i]['SNI'] = $data['wnda_SNI'][$i];
            $data['rs_akhir'][$i]['NSPI'] = $NSPI[$i];
            $data['rs_akhir'][$i]['NSNI'] = $NSNI[$i];
            $data['rs_akhir'][$i]['ASI'] = 0.5*($NSPI[$i] + $NSNI[$i]);
            $i++;
        }
        //SORT VALUE
        $data['rs_sorted'] = $this->sortAssociativeArrayByKey($data['rs_akhir'],"ASI","DESC");
        
        for($i=0;$i<count($data['rs_sorted']);$i++){
            $data['rs_sorted'][$i]['rank'] = $i+1;
        }

        // END OF EDAS

        //START OF ARAS

        //STEP 1 ARAS
        $OV = $this->aras_ov($data['normalisasi']);
        $data['OV'] = $OV;

        //STEP 2 ARAS
        $MND = $this->aras_mnd($data['normalisasi'],$OV);
        $data['MND'] = $MND;

        //STEP 3 ARAS
        $NBM = $this->aras_nbm($MND,$data['bobot']);
        $data['NBM'] = $NBM;

        //STEP 4 ArAS
        $OPT = $this->aras_opt($NBM);
        $data['OPT'] = $OPT;

        //STEP 5 Ki
        $KI = $this->aras_ki($data['rs'],$OPT);
        $data['KI'] = $KI;
        
        $data['rs_aras_sorted'] = $this->sortAssociativeArrayByKey($data['KI'],"KI","DESC");
        for($i=0;$i<count($data['rs_aras_sorted']);$i++){
            $data['rs_aras_sorted'][$i]['rank'] = $i+1;
        }

        $this->load->view('result_page',$data);
        }
        else{
            echo "Anda Belum Mengisi Form. Harap Isi Form terlebih Dahulu";
        }
    }
    
    public function sortAssociativeArrayByKey($array, $key, $direction){

        switch ($direction){
            case "ASC":
                usort($array, function ($first, $second) use ($key) {
                    return $first[$key] <=> $second[$key];
                });
                break;
            case "DESC":
                usort($array, function ($first, $second) use ($key) {
                    return $second[$key] <=> $first[$key];
                });
                break;
            default:
                break;
        }
    
        return $array;
    }

    //STEP 1 ARAS
    public function aras_ov($data){

        $OV['total']['jarak'] = 0;
        $OV['total']['biaya'] = 0;
        $OV['total']['pelayanan'] = 0;
        $OV['total']['fasilitas'] = 0;
        for($i = 0 ; $i < count($data); $i++){
            $val['jarak'][$i] = $data[$i]['jarak'];
            $val['biaya'][$i] = $data[$i]['biaya_normal'];
            $val['pelayanan'][$i] = $data[$i]['pelayanan'];
            $val['fasilitas'][$i] = $data[$i]['fasilitas'];
            $OV['total']['jarak'] += $val['jarak'][$i]; 
            $OV['total']['biaya'] += $val['biaya'][$i]; 
            $OV['total']['pelayanan'] += $val['pelayanan'][$i]; 
            $OV['total']['fasilitas'] += $val['fasilitas'][$i]; 
        }
        
            $OV['jarak'] = min($val['jarak']);
            $OV['biaya'] =  min($val['biaya']);
            $OV['pelayanan']= max($val['pelayanan']);
            $OV['fasilitas'] = max($val['fasilitas']);
        

        return $OV;
    }
    // STEP 2 ARAS 
    public function aras_mnd($data,$OV){
        $sumJarak = 0;
        $sumBiaya = 0;
        for($i=0;$i<count($data);$i++){
            $MND[$i]['jarak'] = 1/$data[$i]['jarak'];
            $MND[$i]['biaya'] = 1/$data[$i]['biaya_normal'];
            $sumJarak+=$MND[$i]['jarak'];
            $sumBiaya+=$MND[$i]['biaya'];
        }
        for($i=0;$i<count($data);$i++){
            $MND[$i]['jarak'] = $MND[$i]['jarak']/$sumJarak;
            $MND[$i]['biaya'] = $MND[$i]['biaya']/$sumBiaya;
            $MND[$i]['pelayanan'] = $data[$i]['pelayanan'] / $OV['total']['pelayanan'];
            $MND[$i]['fasilitas'] = $data[$i]['fasilitas'] / $OV['total']['fasilitas'];
        }       

        return $MND;
    }
    //STEP 3 ARAS
    public function aras_nbm($MND,$bobot){
        for($i=0;$i<count($MND);$i++){
            $NBM[$i]['jarak'] = $MND[$i]['jarak']*$bobot['jarak'];
            $NBM[$i]['biaya'] = $MND[$i]['biaya']*$bobot['biaya'];
            $NBM[$i]['pelayanan'] = $MND[$i]['pelayanan']*$bobot['pelayanan'];
            $NBM[$i]['fasilitas'] = $MND[$i]['fasilitas']*$bobot['fasilitas'];
        }
        return $NBM;
    }
    //STEP 4 ARAS
    public function aras_opt($NBM){
        $OPT['sum'] = 0;
        for($i=0;$i<count($NBM);$i++){
            $OPT[$i] = $NBM[$i]['jarak']+$NBM[$i]['biaya']+$NBM[$i]['pelayanan']+$NBM[$i]['fasilitas'];
            $OPT['sum'] += $OPT[$i];
        }
        return $OPT;
    }
    public function aras_ki($rs,$OPT){
        $i=0;
        foreach($rs->result_array() as $row){
            $nama_rs = $row['nama'];
            $KI[$i]['nama'] = $nama_rs;
            $KI[$i]['alt'] = 'A'. ($i +1 );
            $KI[$i]['KI'] = $OPT[$i]/$OPT['sum'];
            $i++;
        }
        return $KI;
    }



    //STEP 1 EDAS
    public function edas_avg($data){
        $sum = 0;
        for($i=0;$i<count($data);$i++){
            $sum += $data[$i];
        }
        $sum = $sum / count($data);
        return $sum;
    }
    //STEP 2 EDAS
    public function edas_pda($rs,$AVJ,$norm_jarak,$norm_biaya_normal,$norm_biaya_caesar,$norm_pelayanan,$norm_fasilitas){
        $i=0;
        foreach($rs->result_array() as $row){
            $PDA[$i]['jarak'] = max(0,$AVJ['jarak']-$norm_jarak[$i])/$AVJ['jarak'];
            $PDA[$i]['biaya_normal'] = max(0,$AVJ['biaya_normal']-$norm_biaya_normal[$i])/$AVJ['biaya_normal'];
            //$PDA[$i]['biaya_caesar'] = max(0,$AVJ['biaya_caesar']-$norm_jarak[$i])/$AVJ['biaya_caesar'];
            $PDA[$i]['pelayanan'] = max(0,$norm_pelayanan[$i]-$AVJ['pelayanan'])/$AVJ['pelayanan'];
            $PDA[$i]['fasilitas'] = max(0,$norm_fasilitas[$i]-$AVJ['fasilitas'])/$AVJ['fasilitas'];
            $i++;
        }
        return $PDA;
    }
    //STEP 3 EDAS
    public function edas_nda($rs,$AVJ,$norm_jarak,$norm_biaya_normal,$norm_biaya_caesar,$norm_pelayanan,$norm_fasilitas){
        $i=0;
        foreach($rs->result_array() as $row){
            $NDA[$i]['jarak'] = max(0,$norm_jarak[$i]-$AVJ['jarak'])/$AVJ['jarak'];
            $NDA[$i]['biaya_normal'] = max(0,$norm_biaya_normal[$i]-$AVJ['biaya_normal'])/$AVJ['biaya_normal'];
            //$NDA[$i]['biaya_caesar'] = max(0,$AVJ['biaya_caesar']-$norm_jarak[$i])/$AVJ['biaya_caesar'];
            $NDA[$i]['pelayanan'] = max(0,$AVJ['pelayanan']-$norm_pelayanan[$i])/$AVJ['pelayanan'];
            $NDA[$i]['fasilitas'] = max(0,$AVJ['fasilitas']-$norm_fasilitas[$i])/$AVJ['fasilitas'];
            $i++;
        }
        return $NDA;
    }
    //STEP 4 EDAS
    public function edas_wnspi($rs,$wpda_SPI,$maxSPI){
        $i=0;
        foreach($rs->result_array() as $row){
            $NSPI[$i] = $wpda_SPI[$i] / $maxSPI; 
            $i++;
        }
        return $NSPI;
    }
    
    //STEP 5 EDAS
    public function edas_wnsni($rs,$wnda_SNI,$maxSNI){
        $i=0;
        foreach($rs->result_array() as $row){
            $NSNI[$i] = 1 - ($wnda_SNI[$i]/$maxSNI); 
            $i++;
        }
        return $NSNI;
    }
    //STEP 6 EDAS
    public function edas_wpda($rs,$PDA,$bobot){
        $i=0;
        foreach($rs->result_array() as $row){
            $WPDA[$i]['jarak'] = $PDA[$i]['jarak'] * $bobot['jarak'];
            $WPDA[$i]['biaya_normal'] = $PDA[$i]['biaya_normal'] * $bobot['biaya'];
            //$WDA[$i]['biaya_caesar'] = max(0,$AVJ['biaya_caesar']-$norm_jarak[$i])/$AVJ['biaya_caesar'];
            $WPDA[$i]['pelayanan'] = $PDA[$i]['pelayanan'] * $bobot['pelayanan'];
            $WPDA[$i]['fasilitas'] = $PDA[$i]['fasilitas'] * $bobot['fasilitas'];
            $WPDA[$i]['SPI'] = $WPDA[$i]['jarak'] + $WPDA[$i]['biaya_normal'] + $WPDA[$i]['pelayanan'] + $WPDA[$i]['fasilitas'];
            $i++;
        }
        return $WPDA;
    }

    public function edas_wnda($rs,$NDA,$bobot){
        $i=0;
        foreach($rs->result_array() as $row){
            $WNDA[$i]['jarak'] = $NDA[$i]['jarak'] * $bobot['jarak'];
            $WNDA[$i]['biaya_normal'] = $NDA[$i]['biaya_normal'] * $bobot['biaya'];
            //$WDA[$i]['biaya_caesar'] = max(0,$AVJ['biaya_caesar']-$norm_jarak[$i])/$AVJ['biaya_caesar'];
            $WNDA[$i]['pelayanan'] = $NDA[$i]['pelayanan'] * $bobot['pelayanan'];
            $WNDA[$i]['fasilitas'] = $NDA[$i]['fasilitas'] * $bobot['fasilitas'];
            $WNDA[$i]['SNI'] = $WNDA[$i]['jarak'] + $WNDA[$i]['biaya_normal'] + $WNDA[$i]['pelayanan'] + $WNDA[$i]['fasilitas'];
            $i++;
        }
        return $WNDA;
    }

   
}
