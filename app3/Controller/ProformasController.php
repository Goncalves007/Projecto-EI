<?php 
class ProformasController extends AppController{
  
  public $helpers=array('Html','Form');
  public $components = array('Mail');

  /*function to display all files details*/
  public function index() {
   $this->set('Proformas', $this->Proforma->find('all'));
        }

  public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid Proforma'));
        }

        $Proforma = $this->Proforma->findById($id);
        if (!$Proforma) {
            throw new NotFoundException(__('Invalid Proforma'));
        }
        $this->set('Proforma', $Proforma);
    }
  
  /*function to add file record into the database */
  public function add($lastID=null, $ref=null, $title=null, $desc=null,$idUsr=null, $correio=null) {
         $correios = $correio;
        if ($this->request->is('post')) {
            $this->Proforma->create();
  if(empty($this->data['Proforma']['report']['name'])){
         unset($this->request->data['Proforma']['report']);
    }
   if(!empty($this->data['Proforma']['report']['name'])){
       $file=$this->data['Proforma']['report'];
       $file['name']=$this->sanitize($file['name']);
       $this->request->data['Proforma']['report'] = time().$file['name'];
                 if($this->Proforma->save($this->request->data)) {
                  $text = 'Ha Uma Nova Requisicao Feita, com a Referencia: '.$ref;
                 $this->email($text, $correios);
       move_uploaded_file($file['tmp_name'], APP . 'outsidefiles' .DS. time().$file['name']);  
       //$this->Session->setFlash(__('Your Proforma has been saved.'));
               return $this->redirect(array('controller' => 'reports', 'action' => 'index', $idUsr));
          }
     }
                  //$this->Session->setFlash(__('Unable to add your Proforma.'));
        }
        $this->set('ref', $ref);
        $this->set('lastID', $lastID);
        $this->set('title', $title);
        $this->set('desc', $desc);
        $this->set('correio', $correio);
    }


  function sanitize($string, $force_lowercase = true, $anal = false) {
    $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]","}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;","â€”", "â€“", ",", "<",">", "/", "?");
    $clean = trim(str_replace($strip, "", strip_tags($string)));
    $clean = preg_replace('/\s+/', "-", $clean);
    $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;
    return ($force_lowercase) ?
        (function_exists('mb_strtolower')) ?
            mb_strtolower($clean, 'UTF-8') :
            strtolower($clean) :
        $clean;
  }

  public function viewdown($id=null,$download=false) {
     if($download){
      $download=true;
     }

     $files=$this->Proforma->findById($id);
      $filename=$files['Proforma']['report'];
      $name=explode('.',$filename);
     $this->viewClass = 'Media';
     
      // path will be app/outsidefiles/yourfilename.pdf
      $params = array(
            'id'        => $filename,
            'name'      => $name[0],
             'download'  => $download,
            'extension' => 'pdf',
            'path'      => APP . 'outsidefiles' . DS
        );
        
     $this->set($params);
    }

    public function email($text, $correio){
    $this->Mail->email($text, $correio);
  }
 
} 
?>